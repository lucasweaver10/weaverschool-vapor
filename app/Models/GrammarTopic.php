<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrammarTopic extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lesson() {
        return $this->belongsTo(Lesson::class);
    }
    public function discussionQuestions() {
        return $this->belongsToMany(DiscussionQuestion::class, 'grammar_topic_discussion_question');
    }
    public function writtenExamples() {
        return $this->belongsToMany(WrittenExample::class , 'grammar_topic_written_example');
    }
}
