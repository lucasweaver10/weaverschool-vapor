<?php

namespace App\Livewire\Posts;

use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Post;

class Create extends Component
{

    public $title;
    public $content;
    public $slug;
    public $featuredImage;
    public $authorId;
    public $publishedAt;

    protected $rules = [
        'title' => 'required|min:6',
        'authorId' => 'required',
        'slug' => 'required|unique:posts',
        'content' => 'required|min:1',
    ];


    public function store()
    {
        $data = [
            'title' => $this->title,
            'content' => Str::of($this->content)->markdown(),
            'slug' => $this->slug,
            'featured_image' => 'this-image.png',
            'author_id' => $this->authorId,
            'published_at' => $this->publishedAt,
        ];

        $this->validateOnly('slug');

        $post = Post::create($data);

        session()->flash('success', 'Post created!');

    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
