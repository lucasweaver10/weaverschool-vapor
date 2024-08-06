<?php

namespace App\Livewire\Admin\BlogFeaturedImages;

use Livewire\Component;
use Livewire\WithFileUploads;


class Create extends Component
{
    public $image;
    public $timeout = 360;

    use WithFileUploads;

//    protected $listeners = ['featuredImageAdded' => '$refresh'];

    public function store()
    {
        $this->validate([
            'image' => 'image|max:1024'
        ]);

        $extension = $this->image->getClientOriginalExtension();

        $originalFileName = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);

        $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

        $path = $this->image->storeAs('/images/blog/featured-images/', $filename, 's3-public');

        session()->flash('success', 'Featured image (' . $path . ') added successfully!');

        $featured_image_url = 'https://we-public.s3.eu-north-1.amazonaws.com/images/blog/featured-images/' . $filename;
                
        $this->dispatch('featured-image-url-updated', featuredImageUrl: $featured_image_url);        
    }



    public function render()
    {
        return view('livewire.admin.blog-featured-images.create');
    }
}
