<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Vote;
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
        $votes = Vote::where('user_id', Auth::id())->get();
        foreach ($photos as $photo) {
            $photo->isUpvoted = $votes->contains(fn($vote) => $vote->photo_id == $photo->id && $vote->vote == "up");
            $photo->isDownvoted = $votes->contains(fn($vote) => $vote->photo_id == $photo->id && $vote->vote == "down");
            $photo->count_upvotes = '';
            $count_upvotes = Vote::where('vote', 'up')->where('photo_id', $photo->id)->count();

            if ($count_upvotes > 0) {
                $photo->count_upvotes = $count_upvotes;
            }
        };

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

        $imageName = uniqid() . '.' . $request->image->extension();
        $imagePath = 'imgs/' . $imageName;
        $request->image->move(public_path('imgs'), $imageName);

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
        $photo = Photo::find($id);
        $comments = $photo->comments;

        return view('photos.show', compact('photo', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $photo = Photo::find($id);
        return view('photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $photo = Photo::find($id);
        $old_photo = $photo->image_path;

        $request->validate([
            'title' => 'max:255',
        ]);

        $photo->update([
            'title' => $request->title,
            'image_path' => $old_photo
        ]);

        return redirect()->route('photos.show', $photo->id)->with('success', 'Photo updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();

        return redirect()->route('photos.my-gallery')->with('success', 'Photo deleted successfully!');
    }

    public function myGallery()
    {
        $photos = Photo::where('user_id', Auth::id())->latest()->get();
        return view('photos.my-gallery', compact('photos'));
    }
}
