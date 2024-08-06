<?php

namespace App\Livewire\Posts;

use App\Models\Post;
use Illuminate\Support\Str;
use Livewire\Component;

class Edit extends Component
{

    public $post;
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

    public function update()
    {
        $this->post->update([
            'title' => $this->title,
            'content' => Str::of($this->content)->markdown(),
            'slug' => $this->slug,
            'featured_image' => $this->featuredImage,
            'author_id' => $this->authorId,
            'published_at' => $this->publishedAt,
        ]);

//        $this->validateOnly('slug');

//        $post->save();

        session()->flash('success', 'Post updated!');

    }

    public function mount()
    {
        $this->title = $this->post->title;
        $this->slug = $this->post->slug;
        $this->content = Str::of($this->post->content)->markdown();
        $this->authorId = $this->post->author_id;
        $this->featuredImage = $this->post->featured_image;
        $this->publishedAt = $this->post->published_at;
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }
}
