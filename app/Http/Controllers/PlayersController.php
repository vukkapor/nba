<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;

class PlayersController extends Controller
{
    public function __construct() {
        $this->middleware(["auth",'verified']);
    }
    public function show($id)
    {
        $player = Player::with("team")->findOrFail($id);
        \Log::info($player);
        return view("players.show", compact("player"));
    }
}
