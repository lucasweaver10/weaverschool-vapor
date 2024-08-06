<?php

namespace App\Models;

use App\Services\OpenAiService;
use App\Services\SimilarityService;
use Illuminate\Support\Facades\Log;
use App\Services\GoogleCloudService;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LearningPathEmbedding extends Model
{
    use HasFactory;

    protected $casts = [
        'embedding' => 'array',
    ];

    protected $guarded = [];

    public function learningPath()
    {
        return $this->belongsTo(LearningPath::class, 'learning_path_id');
    }

    public static function store($embedding, $learningPathId)
    {
        return self::create([
            'embedding' => $embedding,
            'learning_path_id' => $learningPathId,
        ]);
    }

    public static function generateEmbeddingWithOpenAi($learningPathId)
    {
        $learningPath = LearningPath::find($learningPathId);
        $input = "{$learningPath->title}: {$learningPath->description}";
        $translatedInput = self::translateInput($input);        

        $openAiService = new OpenAIService();
        $embedding = $openAiService->generateEmbedding($translatedInput);

        $embedding = LearningPathEmbedding::create([
            'embedding' => $embedding,
            'learning_path_id' => $learningPathId,
        ]);

        return $embedding->id;
    }

    public static function generateLearningPathEmbeddingFromArrayWithOpenAi($learningPathData)
    {
        $openAiService = new OpenAiService();
        $input = "{$learningPathData['title']}: {$learningPathData['description']}";        
        $translatedInput = self::translateInput($input);        
        $embedding = $openAiService->generateEmbedding($translatedInput);

        return $embedding;
    }

    protected static function findSimilarLearningPathId($embedding)
    {
        $existingLearningPathEmbeddings = LearningPathEmbedding::all();

        foreach ($existingLearningPathEmbeddings as $existingEmbedding) {
            $similarLearningPathId = self::isLearningPathEmbeddingSimilar($embedding, $existingEmbedding);
            if ($similarLearningPathId !== null) {
                return $similarLearningPathId;
            }
        }
    }

    protected static function isLearningPathEmbeddingSimilar($embedding, $existingEmbedding)
    {
        $similarityService = new SimilarityService();
        $similarity = $similarityService->calculateCosineSimilarity($embedding, $existingEmbedding->embedding);

        $threshold = 0.95;

        if ($similarity > $threshold) {
            return $existingEmbedding->learning_path_id;
        }

        return null;
    }

    public static function translateInput($input)
    {
        $googleCloudService = new GoogleCloudService();
        $translatedInput = $googleCloudService->translateText($input, 'en');

        return $translatedInput;
    }
}
