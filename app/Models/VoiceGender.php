<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoiceGender extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function ensureVoiceGenderExists($voiceGender, $targetLocale)
    {
        // Check if the provided gender exists
        $voice = SyntheticVoice::where('locale', $targetLocale)->where('ssml_gender', $voiceGender)->first();

        // If the provided gender exists, return it
        if ($voice) {
            return $voiceGender;
        }

        // Otherwise, switch to the alternative gender and return it
        return ($voiceGender == 'MALE') ? 'FEMALE' : 'MALE';
    }

    public function learningPaths()
    {
        return $this->belongsToMany(LearningPath::class, 'learning_path_voice_gender');
    }
}
