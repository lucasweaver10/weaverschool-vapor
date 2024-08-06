<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickNoteExplanation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function quickNote()
    {
        return $this->belongsTo(QuickNote::class, 'quick_note_id');
    }
}
