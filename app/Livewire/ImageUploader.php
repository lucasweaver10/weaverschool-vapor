<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageUploader extends Component
{
    public $image;
    public $timeout = 360;

    use WithFileUploads;

    public function store()
    {
        $this->validate([
            'image' => 'required|file|image|mimes:png,jpeg,jpg,gif,webp|max:20480'
        ]);

        $extension = $this->image->getClientOriginalExtension();

        $originalFileName = pathinfo($this->image->getClientOriginalName(), PATHINFO_FILENAME);

        $filename = $originalFileName . '_' . now()->timestamp . '.' . $extension;

        $path = $this->image->storeAs('/images/user-uploads/', $filename, 's3-public');

        // session()->flash('success', 'Featured image (' . $path . ') added successfully!');

        $this->dispatch('success', 'Image uploaded successfully');

        $imageUrl = 'https://we-public.s3.eu-north-1.amazonaws.com/images/user-uploads/' . $filename;

        $this->dispatch('image-url-generated', imageUrl: $imageUrl);
    }
    
    public function render()
    {
        return view('livewire.image-uploader');
    }
}
