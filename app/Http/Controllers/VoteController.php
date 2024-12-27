<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\Vote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VoteController extends Controller
{
    public function store(Request $request)
    {
        $voteType = $request->vote;
        $photo_id = $request->photo_id;

        if (!$voteType || !$photo_id) {
            return response()->json(['error' => 'Invalid data'], 422);
        }

        $user = Auth::user();
        $vote = Vote::where('photo_id', $photo_id)->where('user_id', $user->id)->first();

        if ($vote) {
            return VoteController::update($vote, $voteType);
        }

        Vote::create([
            'vote' => $voteType,
            'user_id' => $user->id,
            'photo_id' => $photo_id,
        ]);

        // return response()->json(['new vote clicked' => true]);
    }

    public function update(Vote $vote, string $voteType)
    {
        if ($vote->vote == $voteType) {
            $vote->update([
                'vote' => '',
                'user_id' => $vote->user_id,
                'photo_id' => $vote->photo_id,
            ]);
            // return response()->json(['btn_clicked' => 'false']);

        } else {
            $vote->update([
                'vote' => $voteType,
                'user_id' => $vote->user_id,
                'photo_id' => $vote->photo_id,
            ]);
            // return response()->json(['clicked' => true]);
        }
    }
}
