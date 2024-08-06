<?php

namespace App\Livewire\Flashcards;

use OpenAI;
use Livewire\Component;
use Spatie\PdfToText\Pdf;
use Livewire\WithFileUploads;
use App\Models\EssaySubmission;
use App\Models\CompletedHomework;
use Illuminate\Support\Facades\Log;
use App\Jobs\CreateFlashcardsWithOpenAI;
use thiagoalessio\TesseractOCR\TesseractOCR;

class CreateFromFile extends Component
{
    use WithFileUploads;

    public $flashcardSet;
    public $flashcards;
    public $targetLanguage;
    public $nativeLanguage;
    public $type;
    public $uploads = [];

    public function store()
    {
        $key = config('services.openai.key');
        $client = OpenAI::client($key);
        if ($this->uploads)
        {
            foreach ($this->uploads as $upload)
            {
                // Define the file path and extension //
                $filePath = $upload->getRealPath();
                $extension = $upload->getClientOriginalExtension();
                // Check if extension is a pdf or not, if pdf then convert to image //
                if ($extension == 'pdf')
                {
                    $text = Pdf::getText($filePath);
                } else
                {
                    $text = (new TesseractOCR($filePath))
                        ->lang($this->targetLanguage)
                        ->run();
                }
                try
                {
                    CreateFlashcardsWithOpenAI::dispatch($this->flashcardSet, $text, $this->targetLanguage, $this->nativeLanguage, $this->type, auth()->user()->id);
                    $this->dispatch('success', message: 'Your request is being processed. Please check the flashcard set page in a few minutes for your flashcards.');
                    // session()->flash('success', __('Your request is being processed. Please check the flashcard set page in a few minutes for your flashcards.'));
                }
                catch (\Exception $e)
                {
                    Log::error($e->getMessage());                    
                    return back()->with('error', __('Error processing your request. Please try again later.'));
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.flashcards.create-from-file');
    }
}
