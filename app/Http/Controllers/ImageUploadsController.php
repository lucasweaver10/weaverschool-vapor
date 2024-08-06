<?php

namespace App\Http\Controllers;

use App\Models\ImageUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibrary\Models\Media;

class ImageUploadsController extends Controller
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
    public function create()
    {
        abort_unless(env('APP_ENV') == 'local', 403);

        return view('imageupload.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(ImageUpload $imageupload, Request $request)
//    {
//        $attributes = request()->validate([
//            'image' => 'nullable'
//        ]);
//
//        ImageUpload::create($attributes)
//            ->addMediaFromRequest('image')
//            ->withResponsiveImages()
//            ->toMediaCollection('WebsiteImages');
//
//
//        return redirect('image-uploads/create');
//    }

    public function store(Request $request)
    {
        $image = $request->file('file');

        $extension = $image->getClientOriginalExtension();

        $originalFileName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);

        $sanitizedFileName = str_replace(' ', '_', $originalFileName);

        $filename = $sanitizedFileName . '_' . now()->timestamp . '.' . $extension;

        $path = $image->storeAs('/images/blog/content-images/', $filename, 's3-public');

        $content_image_url = 'https://we-public.s3.eu-north-1.amazonaws.com/images/blog/content-images/' . $filename;

        session()->flash('success', 'Image (' . $content_image_url . ') added successfully!');

        return response()->json(['location' => $content_image_url, 'status'=> true, 'id' => null]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function show(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function edit(ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ImageUpload $imageUpload)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ImageUpload  $imageUpload
     * @return \Illuminate\Http\Response
     */
    public function destroy(ImageUpload $imageUpload)
    {
        //
    }
}
