<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $guarded = [];

    public function grammarTopics() {
        return $this->hasMany(GrammarTopic::class);
    }
    public function speakingTopics() {
        return $this->hasMany(SpeakingTopic::class);
    }
    public function vocabularyWords() {
        return $this->hasMany(VocabularyWord::class);
    }
    public function discussionQuestions() {
        return $this->hasMany(DiscussionQuestion::class);
    }
    public function writtenExamples() {
        return $this->hasMany(WrittenExample::class);
    }
    public function lessonPlan()
    {
        return $this->belongsTo('App\Models\LessonPlan');
    }
    public function course()
    {
        return $this->belongsTo('App\Models\Course');
    }
    public function exercises()
    {
        return $this->hasMany(Exercise::class);
    }

    public function quiz()
    {
        return $this->hasOne(Quiz::class);
    }

    public function progress()
    {
        return $this->hasOne(LessonProgress::class);
    }

    public function videos()
    {
        return $this->hasMany(LessonVideo::class);
    }

    public function worksheets()
    {
        return $this->hasMany(LessonWorksheet::class);
    }

    public function flashcardSet()
    {
        return $this->hasOne(FlashcardSet::class);
    }
}
