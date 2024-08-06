<?php

namespace App\Jobs;

use App\Models\QuickNote;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use App\Http\Controllers\OpenAiController;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateExplanationFromQuickNote implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 300;
    public $tries = 3;
    public $backoff = 60;

    protected $text;
    protected $quickNoteId;
    
    /**
     * Create a new job instance.
     */
    public function __construct($text, $quickNoteId)
    {
        $this->text = $text;
        $this->quickNoteId = $quickNoteId;
    }    

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $quickNote = QuickNote::find($this->quickNoteId);
        
        $openAiController = new OpenAiController();
        $explanation = $openAiController->createExplanationFromQuickNote($this->text);
        
        $quickNote->explanation()->create([
            'text' => $explanation,
        ]);
    }
}
