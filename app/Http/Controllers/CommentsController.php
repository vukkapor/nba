<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Team;
use App\Comment;
use App\Mail\CommentReceived;

class CommentsController extends Controller
{
    public function store($teamId)
    {
         $team = Team::find($teamId);
         /*
        \Log::info($team);

        $this->validate(request(), Comment::STORE_RULES);

        $team->comments()->create(request()->all());
 */
        $comment = new Comment;

        $comment->content = request('content');
        $comment->team_id = $teamId;
        $comment->user_id = auth()->user()->id;

        $comment->save();
        \Mail::to($team->email)->send(new CommentReceived($team, $comment));
        return redirect()->route('single-team', ['team_id' => $teamId]);
    }
}
