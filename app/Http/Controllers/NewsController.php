<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\Team;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $news=News::latest()->paginate(15);
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news= News::findOrFail($id);

        return view('news.show', compact('news'));
    }

    public function showTeam($teamName)
    {
        $team = Team::without('players', 'comments')->where('name', $teamName)->first();
        $news = $team->news()->paginate(10);
        \Log::info($news);

        return view('news.teams', compact('news'));
    }

    public function create()
    {
        $teams = Team::all();

        return view('news.create', compact('teams'));
    }

    public function store()
    {
        $news = new News;

        $news->title = request("title");
        $news->content = request("content");
        $news->user_id = auth()->user()->id;

        $news->save();

        $news->teams()->attach(request('teams'));
        session()->flash("message", "Thank you for publishing article on www.nba.com");
        return redirect()->route('news');
    }
}
