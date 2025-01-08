<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $user_photos = Photo::with('comments', 'votes')->where('user_id', $user->id)->get();

        $comments = 0;
        $votes = 0;
        $photos = $user_photos->count();

        foreach ($user_photos as $photo) {
            $comments += $photo->comments->count();
            $votes += $photo->votes->count();
        }

        return view('dashboard', compact('photos', 'comments', 'votes'));
    }
}
