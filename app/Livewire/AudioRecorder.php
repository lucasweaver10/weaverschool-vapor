<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On; 
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AudioRecorder extends Component
{
    use WithFileUploads;
    
    public $audio;
    public $identifier;
    public $submitted = false;
    public $processing = false;
    public $instructionText = '';

    #[On('audio-uploaded')] 
    public function processAudio($audioPath, $identifier)
    {
        // Since the file comes over as a temporary uploaded file, you'll need to handle it accordingly
        // This might involve saving the file to storage and processing it as needed        
        if($this->identifier == $identifier) {     
            $this->dispatch('audio-processed', $audioPath, $this->identifier);               
        }      
    }
    
    #[On('audio-saved')]
    public function toggleSubmitted($identifier)
    {        
        if($identifier == $this->identifier) {            
            $this->processing = false;
            $this->submitted = true;          
        }        
    }

    #[On('audio-error')]
    public function handleError($identifier)
    {
        if($identifier == $this->identifier) {
            $this->processing = false;
            $this->submitted = false;
        }
    }    
    
    public function render()
    {
        return view('livewire.audio-recorder');
    }
}
