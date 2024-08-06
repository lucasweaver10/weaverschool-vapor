<?php

namespace App\Console\Commands;

use App\Models\SyntheticVoice;
use Illuminate\Console\Command;
use App\Jobs\GenerateVocabularyWordAudio;

class GenerateAudioUrlsForVocabularyWords extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-audio-urls-for-vocabulary-words {start} {end} {targetLocale} {voiceGender}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $startId = $this->argument('start');
        $endId = $this->argument('end');
        $targetLocale = $this->argument('targetLocale');
        $voiceGender = $this->argument('voiceGender');

        $voiceId = SyntheticVoice::getVoiceId($targetLocale, $voiceGender);

        for ($id = $startId; $id <= $endId; $id++) {
            GenerateVocabularyWordAudio::dispatch($id, $targetLocale, $voiceId);
        }        
    }
}
