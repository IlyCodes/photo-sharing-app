<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $photo_id) {
        $request->validate([
            'text' => 'max:255'
        ]);

        Comment::create([
            'text' => $request->comment,
            'user_id' => Auth::user()->id,
            'photo_id' => $photo_id,
        ]);

        return redirect()->route('photos.show', $photo_id);
    }

    public function destroy($id) {
        $comment = Comment::find($id);
        $comment->delete();

        return redirect()->back()->with('success', 'Your comment has been deleted successfully!');
    }
}
