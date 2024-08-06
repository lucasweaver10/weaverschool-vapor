<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickNoteSet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function quickNotes()
    {
        return $this->hasMany(QuickNote::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function flashcardSet()
    {
        return $this->hasOne(FlashcardSet::class, 'quick_note_set_id');
    }
}
