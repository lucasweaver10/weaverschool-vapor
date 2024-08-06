<?php

namespace App\Http\Controllers;

use App\Models\LevelTest;
use App\Models\LevelTestQuestion;
use App\Models\LevelTestAnswer;
use Illuminate\Http\Request;

class LevelTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createEnglish()
    {
        $levelTest = LevelTest::find(1);

        return view('level-test.create', [
            'levelTest' => $levelTest,
            ]);
    }

    public function createDutch()
    {
        $levelTest = LevelTest::find(2);

        return view('level-test.create', [
            'levelTest' => $levelTest,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // option 1
        // we get an array of $responses with $answerIds
        // we then get a collection all $answers with those $answerIds
        // we then output $answer->question->text, $answer->text to sheets
        // calculate sum of $answer->point_values
        // store name, email, score as submission

        // option 2
        // on each "next" button @click have an event called "handleChoice" which adds the $answer->point_value to the $score
        // on form submit send a $data payload that has an array of responses and the $score object
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LevelTest  $levelTest
     * @return \Illuminate\Http\Response
     */
    public function show(LevelTest $levelTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LevelTest  $levelTest
     * @return \Illuminate\Http\Response
     */
    public function edit(LevelTest $levelTest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LevelTest  $levelTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LevelTest $levelTest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LevelTest  $levelTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(LevelTest $levelTest)
    {
        //
    }
}
