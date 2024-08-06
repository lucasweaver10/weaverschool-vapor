<?php

namespace App\Services;

class SimilarityService
{
    public function calculateCosineSimilarity(array $vectorA, array $vectorB): float
    {
        $dotProduct = $this->dotProduct($vectorA, $vectorB);
        $normA = $this->norm($vectorA);
        $normB = $this->norm($vectorB);

        if ($normA == 0 || $normB == 0) {
            return 0; // Avoid division by zero
        }

        return $dotProduct / ($normA * $normB);
    }

    protected function dotProduct(array $vectorA, array $vectorB): float
    {
        $result = array_map(function ($x, $y) {
            return $x * $y;
        }, $vectorA, $vectorB);
        return array_sum($result);
    }

    protected function norm(array $vector): float
    {
        $squareSum = array_sum(array_map(function ($x) {
            return $x ** 2;
        }, $vector));
        return sqrt($squareSum);
    }
}
