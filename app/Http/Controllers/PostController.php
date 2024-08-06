<?php

namespace App\Http\Controllers;

use Storage;
use Exception;
use App\Models\Post;
use App\Models\Author;
use App\Models\Course;
use App\Models\Midjourney;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PrivateLesson;
use Illuminate\Support\Facades\DB;
use App\Jobs\SendPromptToMidjourney;
use Illuminate\Support\Facades\Cache;
use Spatie\MediaLibrary\Models\Media;
use function PHPUnit\Framework\returnArgument;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Course $course, PrivateLesson $privateLesson)
    {
        $posts = Post::latest('published_at')->where('index_is_visible', true)->addSelect('title', 'featured_image', 'author_id', 'slug', 'published_at',
            DB::raw('substr(content, 1, 140) as preview'))->get();

        // $media = $posts->getFirstMediaUrl('PostImages');

//        $courses = Course::all();

//        $privateLessons = PrivateLesson::all();

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();

        if ($post) {
            $ctaHtml = Cache::remember('ctaHtmlCacheKey', now()->addHours(1), function () {
                return view('components.cta.blog.learning-paths.thai.ordering-street-food')->render();
            });

            $post->content = str_replace('[cta-learning-path]', $ctaHtml, $post->content);

            return view('blog.post', [
                'post' => $post,                
            ]);
        }



        // No match was found
        abort(404);
    }

    public function create() {
        $authors = Author::all();
        return view('posts.create', compact('authors'));
    }

    public function store(Request $request) {

        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'required|string|unique:posts|max:255',
            'featured_image' => 'required',
            'author_id' => 'required|integer',
            'published_at' => 'required',
        ]);

        $contentWithTableOfContents = $this->createTableOfContents($data['content']);

        $data['content'] = $contentWithTableOfContents;

        $post = Post::create($data);

        return redirect(config('app_url') . '/blog/' . $post->slug);
    }

    public function adminIndex() {
        $posts = Post::all();

        return view('posts.index', ['posts' => $posts]);
    }

    public function edit($id) {

        $post = Post::find($id);

        $authors = Author::all();

        return view('posts.edit', ['post' => $post, 'authors' => $authors]);
    }

    public function update(Request $request) {

        $data = $this->validate($request, [
            'title' => 'required|string|max:255',
            'content' => 'required',
            'slug' => 'required|string|max:255',
            'author_id' => 'required|integer',
            'published_at' => 'required',
        ]);

        $post = Post::find($request->post_id);

        $post->update($data);

        return redirect(config('app_url') . '/blog/' . $post->slug);
    }

    public function addTableOfContentsToPost(Request $request) {
        $post = Post::find($request->post_id);

        $contentWithTableOfContents = $this->createTableOfContents($post->content);

        $post->content = $contentWithTableOfContents;

        $post->save();

        return redirect(config('app_url') . '/blog/' . $post->slug);
    }

    public function createTableOfContents($content) {
        // Process the blog post content using the custom function
        $processedContent = $this->processPostContent($content);

        // Now, $processedContent contains the modified blog post content with filtered headings

        // Next, generate the table of contents for the processed content
        $tableOfContents = $this->generateTableOfContents($processedContent);

        // Find the position of the first <h2> tag in the content
        $h2Position = strpos($processedContent, '<h2');

        if ($h2Position !== false) {
            // Insert the table of contents before the first <h2> tag
            $contentWithTableOfContents = substr_replace($processedContent, $tableOfContents, $h2Position, 0);
        }

        else {
            // Insert the table of contents at the beginning of the content
            $contentWithTableOfContents = $tableOfContents . $processedContent;
        }

        return $contentWithTableOfContents;

        // Pass the processed content and table of contents to the view
    }

    function processPostContent($content)
    {
        // Regular expression to match headings from h1 to h4
        $pattern = '/<(h[1-3])\b[^>]*>(.*?)<\/\1>/i';

        // Process and replace headings in the content using a callback function
        $processedContent = preg_replace_callback($pattern, function ($matches) {
            $headingTag = $matches[1];
            $headingText = $matches[2];

            // Extract stop words from the heading text
            $stopWords = ['a', 'an', 'the', 'in', 'on', 'at', 'to', 'is', 'are', 'and'];
            $headingTextWords = explode(' ', $headingText);
            $filteredHeadingText = array_diff($headingTextWords, $stopWords);
            $filteredHeadingText = implode(' ', $filteredHeadingText);

            // Sanitize the "id" attribute and heading text by removing special characters
            $idAttribute = preg_replace('/[^a-z0-9]+/i', '-', strtolower(html_entity_decode($filteredHeadingText, ENT_QUOTES, 'UTF-8')));
            $idAttribute = rtrim($idAttribute, '-');
//            $headingText = preg_replace('/[^a-zA-Z0-9\s]+/', '', html_entity_decode($headingText, ENT_QUOTES, 'UTF-8'));
            $headingText = html_entity_decode($headingText, ENT_QUOTES, 'UTF-8');

            // Generate a new version of the heading with stop words removed from id attribute
            $newHeading = "<{$headingTag} id=\"{$idAttribute}\">{$headingText}</{$headingTag}>";

            return $newHeading;
        }, $content);

        return $processedContent;
    }

    function generateTableOfContents($content)
    {
        // Regular expression to match headings with ids
        $pattern = '/<(h[1-3])\s+id="([^"]+)"[^>]*>(.*?)<\/\1>/i';

        // Process and extract headings with ids from the content
        preg_match_all($pattern, $content, $matches);

        $tableOfContents = '<div class="table-of-contents"><span class="text-2xl">Table of contents:</span><ol>';

        // Initialize an array to keep track of heading levels
        $headingLevels = [1 => &$tableOfContents]; // We start with level 1 (h1) which contains the root ordered list

        $currentLevel = 1;

        foreach ($matches[1] as $index => $headingTag) {
            $headingLevel = (int)substr($headingTag, 1);
            $headingId = html_entity_decode($matches[2][$index], ENT_QUOTES, 'UTF-8'); // Decode HTML entities in the "id" attribute
            $headingText = html_entity_decode($matches[3][$index], ENT_QUOTES, 'UTF-8'); // Decode HTML entities

            // If the heading level is greater than the current level, open a new ordered list
            if ($headingLevel > $currentLevel) {
                $tableOfContents .= '<ol>';
                $currentLevel = $headingLevel;
            }

            // If the heading level is less than the current level, close the ordered list(s)
            while ($headingLevel < $currentLevel) {
                $tableOfContents .= '</ol>';
                $currentLevel--;
            }

            // Append list items for each heading with the anchor link
            $tableOfContents .= "<li><a href=\"#{$headingId}\">{$headingText}</a></li>";
        }

        // Close any remaining ordered lists
        while ($currentLevel > 1) {
            $tableOfContents .= '</ol>';
            $currentLevel--;
        }

        $tableOfContents .= '</ol></div>';

        return $tableOfContents;
    }


    public function getH2TextsFromContent($postContent)
    {
        $pattern = '/<(h2)\b[^>]*>(.*?)<\/\1>/i';

        // Initialize an empty array to store the sanitized h2 tag texts
        $sanitizedH2Texts = [];

        // Use preg_match_all to find all occurrences of h2 tags in the content
        preg_match_all($pattern, $postContent, $matches);

        // Iterate through the matched h2 tags and extract the text
        foreach ($matches[2] as $headingText) {
            // Sanitize the text by removing any HTML tags and special characters
            $sanitizedText = strip_tags($headingText);
            $sanitizedH2Texts[] = $sanitizedText;
        }

        // Return the array of sanitized h2 tag texts
        foreach($sanitizedH2Texts as $h2Text)
        {
            SendPromptToMidjourney::dispatch($h2Text);
        }

        return $sanitizedH2Texts;
    }

}
