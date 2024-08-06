<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class FileUpload extends Component
{
    use WithFileUploads;

    public $photo;

    public function upload()
    {
        $this->validate([
            'file' => 'file|max:1024', // 1MB Max
        ]);

        $this->file->store('attachments');
    }

    public function render()
    {
        return view('livewire.file-upload');
    }
}
