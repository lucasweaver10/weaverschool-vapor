<?php

namespace App\Livewire\Flashcards\Sets\Create;

use App\Jobs\createFlashcardSetFromExtractedTextFromFile;
use OpenAI;
use Livewire\Component;
use Spatie\PdfToText\Pdf;
use App\Models\FlashcardSet;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Log;
use App\Jobs\CreateFlashcardsWithOpenAI;
use App\Services\OpenAiService;
use thiagoalessio\TesseractOCR\TesseractOCR;

class FromFile extends Component
{
    use WithFileUploads;

    public $setTitle;
    public $setDescription;
    public $flashcards;
    public $targetLanguage;
    public $nativeLanguage;
    public $voiceGender;
    public $imagesSelected = true;
    public $voiceExamplesSelected = true;
    public $type;
    public $text;
    public $uploads = [];

    public function store()
    {
        $this->validate([
            'setTitle' => 'required|string|max:255',
            'setDescription' => 'nullable|string|max:255',
            'targetLanguage' => 'required|string|max:255',
            'nativeLanguage' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'uploads.*' => 'required|file|mimes:pdf,jpg,jpeg,png,tiff',
        ]);

        $flashcardSet = FlashcardSet::create([
            'title' => $this->setTitle,
            'description' => $this->setDescription,
            'user_id' => auth()->user()->id,                       
        ]);

        // attach the flashcard set to the user as flashcard sets studying
        auth()->user()->flashcardSetsStudying()->attach($flashcardSet->id);
        
        $key = config('services.openai.key');
        $client = OpenAI::client($key);

        if ($this->uploads) {
            foreach ($this->uploads as $upload) {
                // Define the file path and extension //
                $filePath = $upload->getRealPath();
                $extension = $upload->getClientOriginalExtension();
                // Check if extension is a pdf or not, if pdf then convert to image //
                if ($extension == 'pdf') {
                    $this->text = Pdf::getText($filePath);
                } else {
                    $this->text = (new TesseractOCR($filePath))
                        ->lang($this->targetLanguage)
                        ->run();
                }
                try {                    
                    $openAiService = new OpenAiService();
                    if ($this->type == 'definitions') {
                        // FlashcardSet::createUsingDefinitionModeFromExtractedTextFromFile($this->text, $this->targetLanguage, $this->nativeLanguage, $flashcardSet->id, auth()->user()->id, $this->imagesSelected, $this->voiceExamplesSelected, $this->voiceGender);                        
                        $this->dispatch('error', message: 'Definition mode is currently under maintenance. Sorry for the inconvenience.');   
                    } elseif ($this->type == 'translations') {                                                
                        createFlashcardSetFromExtractedTextFromFile::dispatch($this->text, $this->targetLanguage, $this->nativeLanguage, $flashcardSet->id, auth()->user()->id, $this->imagesSelected, $this->voiceExamplesSelected, $this->voiceGender);
                    }                                                           
                    $this->dispatch('success', message: 'Flashcards are processing, check your flashcard sets page in a few minutes.');   

                } catch (\Exception $e) {
                    Log::error($e->getMessage());                    
                    return back()->with('error', __('Error processing your request. Please try again later.'));
                }
            }
        }
    }    

    public function mount()
    {
        $this->setTitle = old('setTitle', '');
        $this->setDescription = old('setDescription', '');
        $this->targetLanguage = old('targetLanguage', '');
        $this->nativeLanguage = old('nativeLanguage', '');
        $this->type = old('type', '');
    }
    
    public function render()
    {
        return view('livewire.flashcards.sets.create.from-file');
    }
}
