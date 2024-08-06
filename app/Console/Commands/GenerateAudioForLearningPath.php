<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\GenerateKeyPhrasesExamplesAudios;
use App\Jobs\GenerateVocabularyExamplesAudios;
use App\Jobs\GenerateKeyPhraseAudioForLearningPath;
use App\Jobs\GenerateVocabularyWordAudioForLearningPath;

class GenerateAudioForLearningPath extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:generate-audio-for-learning-path {learning_path_id} {target_locale} {voice_gender}';

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
        $learningPathId = $this->argument('learning_path_id');
        $targetLocale = $this->argument('target_locale');
        $voiceGender = $this->argument('voice_gender');

        GenerateVocabularyExamplesAudios::dispatch($learningPathId, $targetLocale, $voiceGender);
        GenerateVocabularyWordAudioForLearningPath::dispatch($learningPathId, $targetLocale, $voiceGender);
        GenerateKeyPhraseAudioForLearningPath::dispatch($learningPathId, $targetLocale, $voiceGender);
        GenerateKeyPhrasesExamplesAudios::dispatch($learningPathId, $targetLocale, $voiceGender);
        
    }
}
