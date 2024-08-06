<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickNote extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flashcardSet()
    {
        return $this->hasOne(FlashcardSet::class);
    }
    
    public function quickNoteSet()
    {
        return $this->belongsTo(QuickNoteSet::class);
    }

    public function explanation()
    {
        return $this->hasOne(QuickNoteExplanation::class, 'quick_note_id');
    }
}
