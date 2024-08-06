<?php

namespace App\Models;

use App\Services\OpenAiService;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CulturalNote extends Model
{
    use HasFactory;
    use HasTranslations;

    public $translatable = [
        'title',
        'content',
    ];

    protected $guarded = [];

    public function learningPath()
    {
        return $this->belongsTo(LearningPath::class);
    }

    public static function generate($learningPathId, $targetLanguage, $nativeLanguage, $nativeLocale)
    {
        $learningPath = LearningPath::find($learningPathId);

        $prompt = "A language student is studying the learning path of: {$learningPath->title}.
        Please provide them with any cultural notes that would be useful for them to know about the target language of: {$targetLanguage}.
        Their native language is {$nativeLanguage}, so please provide the instruction in that language, and format it in markdown.
        You should return a JSON array named 'cultural_notes' with the following structure: 
          ['cultural_notes' => ['title' => 'A short title for the note','content' => 'A paragraph form note in markdown format about an element of the culture they need to understand for the learning path topic']]";

        $openAiService = new OpenAiService();
        $response = $openAiService->generateArrayResponse($prompt);

        $culturalNotes = $response['cultural_notes'];

        foreach ($culturalNotes as $culturalNote) {
            $newNote = CulturalNote::create([
                'title' => [                    
                    $nativeLocale => $culturalNote['title'],
                ],
                'content' => [
                    $nativeLocale => $culturalNote['content'],
                ],                
            ]);

            $learningPath = LearningPath::find($learningPathId);
            if ($learningPath) {
                $learningPath->culturalNotes()->attach($newNote);
            }
        }

        return true;
    }
}
