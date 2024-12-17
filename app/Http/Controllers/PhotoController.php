<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::with('user', 'comments', 'votes')->latest()->get();
        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('photos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $imageName = uniqid() . '.' . $request->image . $request->image->extension();
        $imagePath = $request->image->move(public_path('photos'), $imageName);

        Photo::create([
            'title' => $request->title,
            'image_path' => $imagePath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('photos.index')->with('success', 'Photo uploaded successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('photos.show', $id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('photos.edit', $id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);
        $request->validate([
            'title' => 'max:255',
        ]);
        $photo->update($request->title);

        return redirect()->back()-with('success', 'Photo updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();

        return redirect()->back()-with('success', 'Photo deleted successfully!');
    }
}
