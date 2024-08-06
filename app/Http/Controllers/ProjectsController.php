<?php

namespace App\Http\Controllers;

use App\Models\Project;

use Illuminate\Http\Request;

class ProjectsController extends Controller
{
   public function index()

    {

      $projects = Project::all();

      return view('projects.index', ['projects' => $projects ]);

    }


    public function show(Project $project)

        {

           return view('projects.show', compact ('project'));

        }



    public function create()

    {

        return view('projects.create');

    }



    public function store()

    {

        $attributes = request()->validate([

            'title' => 'required',

            'description' => 'required'

          ]);


        Project::create($attributes);


        return redirect('/projects');

    }


    public function edit(Project $project)

        {

          return view('projects.edit', compact ('project'));

        }


    public function update(Project $project)

        {

           $project->update(request(['title', 'description']));


           return redirect('/projects');

        }


    public function destroy(Project $project)

        {

           $project->delete();

           return redirect('/projects');

        }




}
