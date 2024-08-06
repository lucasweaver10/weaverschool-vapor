<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpeakingTopic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }

    public function vocabularyWords() {
        return $this->belongsToMany(VocabularyWord::class, 'vocabulary_word_speaking_topic');
    }

    public function discussionQuestions() {
        return $this->belongsToMany(DiscussionQuestion::class, 'speaking_topic_discussion_question');
    }

    public function writtenExamples() {
        return $this->belongsToMany(WrittenExample::class);
    }
}
