<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SyntheticVoice extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    public static function getVoiceId($targetLocale, $voiceGender)
    {
        $voice = SyntheticVoice::where('locale', $targetLocale)->where('ssml_gender', $voiceGender)->first();
        if ($voice) {
            return $voice->id;
        }
    }
}
