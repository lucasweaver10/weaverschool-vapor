<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WrittenExample extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
    
    public function grammarTopics() {
        return $this->belongsToMany(GrammarTopic::class, 'grammar_topic_written_example');
    }

    public function speakingTopics() {
        return $this->belongsToMany(SpeakingTopic::class);
    }

    public function vocabularyWords()
    {
        return $this->belongsToMany(VocabularyWord::class, 'written_example_vocabulary_word');
    }
}
