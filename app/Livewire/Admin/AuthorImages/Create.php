<?php

namespace App\Livewire\Admin\AuthorImages;

use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    public $image;
    public $timeout = 360;

    use WithFileUploads;

//    protected $listeners = ['authorImageAdded' => '$refresh'];

    public function store()
    {
        $this->validate([
            'image' => 'image|max:1024'
        ]);

        $extension = $this->image->getClientOriginalExtension();

        $originalFileName = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);

        $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

        $path = $this->image->storeAs('/images/authors/', $filename, 's3-public');

        session()->flash('success', 'Author image (' . $path . ') added successfully!');

        $author_image_url = 'https://we-public.s3.eu-north-1.amazonaws.com/images/authors/' . $filename;

        $this->dispatch('author-image-url-updated', ['authorImageUrl' => $author_image_url]);
    }

    public function render()
    {
        return view('livewire.admin.author-images.create');
    }
}
