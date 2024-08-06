<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Language extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function getOrCreateLanguageId($iso6393Code, $languageName, $locale)
    {
        $language = Language::where('iso_639_3_code', $iso6393Code)->first();
        if ($language) {
            return $language->id;
        } else {
            return Language::create([
                'iso_639_3_code' => $iso6393Code,
                'slug' => Str::slug($languageName, '-'),
                'name' => $languageName,
                'description' => 'Learn ' . $languageName,
                'locale' => $locale,
                'active' => true,
            ])->id;
        }
    }

    public function learningPaths()
    {
        return $this->hasMany(LearningPath::class, 'language_id');
    }

    public function nativeLearningPaths()
    {
        return $this->belongsToMany(LearningPath::class, 'learning_path_native_language');
    }
}
