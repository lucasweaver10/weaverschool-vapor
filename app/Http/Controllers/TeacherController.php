<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $teachers = Teacher::where('active', 1)->get();
        $englishTeachers = Teacher::where('active', 1)->where('subcategory_id', 1)->inRandomOrder()->get();
        $dutchTeachers = Teacher::where('active', 1)->where('subcategory_id', 2)->inRandomOrder()->get();
        $subcategories = Subcategory::all();

        return view('teachers.index', ['englishTeachers' => $englishTeachers,
            'dutchTeachers' => $dutchTeachers, 'subcategories' => $subcategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'about' => 'nullable',
            'nationality' => 'nullable',
            'specialty' => 'nullable',
            'fun_fact' => 'nullable',
            'email' => 'nullable',
            'phone_number' => 'nullable',
            'image' => 'nullable',

        ]);

        Teacher::create($attributes);

        return redirect('/teachers');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        return view('teachers.show', compact('teacher'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        return view('teachers.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        $teacher->update(request()->validate([
            'name' => 'required',
            'about' => 'nullable',
            'nationality' => 'nullable',
            'specialty' => 'nullable',
            'fun_fact' => 'nullable',
            'email' => 'nullable',
            'phone_number' => 'nullable',
            'image' => 'nullable',
        ]));

        return redirect('/teachers/' . $teacher->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $Teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
    }

    public function meetings($id)
    {
        $teacher = Teacher::where('id', $id)->first();

        return view('teachers.meetings', compact('teacher'));
    }
}
