<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiscussionQuestion extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function grammarTopics() 
    {
        return $this->belongsToMany(GrammarTopic::class, 'grammar_topic_discussion_question');
    }

    public function speakingTopics() 
    {
        return $this->belongsToMany(SpeakingTopic::class, 'speaking_topic_discussion_question');
    }

    public function vocabularyWords()
    {
        return $this->belongsToMany(VocabularyWord::class, 'discussion_question_vocabulary_word');
    }
}
