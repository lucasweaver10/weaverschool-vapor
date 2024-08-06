<?php

namespace App\Http\Controllers;

use App\Models\LearningPath;
use Illuminate\Http\Request;

class AdminLearningPathController extends Controller
{
    public function vocabularyIndex($id)
    {        
        // Make $learningPaths in descending order from the latest
        $learningPath = LearningPath::with(['vocabularyWords'])->find($id);        
        
        return view('admin.learning-paths.vocabulary.index', compact('learningPath'));
    }

    public function vocabularyShow($id, $vocabularyId)
    {
        $learningPath = LearningPath::with(['vocabularyWords'])->find($id);
        $vocabularyWord = $learningPath->vocabularyWords()->find($vocabularyId);
        
        return view('admin.learning-paths.vocabulary.show', compact('vocabularyWord'));
    }
}
