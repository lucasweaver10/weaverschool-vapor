<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorController extends Controller
{
    public function index()
    {
        $authors = Author::all();
        return view('admin.authors.index', compact('authors'));
    }

    public function publicIndex()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function publicShow($id)
    {
        $author = Author::find($id);
        return view('authors.show', compact('author'));
    }

    public function create() 
    {
        return view('admin.authors.create');
    }

    public function store(Request $request) 
    {
        $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'author_image' => 'required',
            'about' => 'required',
        ]);
        
        
        $data = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $request->author_image,
            'about' => $request->about,
        ];

        $author = Author::create($data);

        session()->flash('success', 'Author created successfully!');
        return redirect()->route('authors.index');

        
    }
}
