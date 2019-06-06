<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        $news=News::paginate(15);
        return view('news.index', compact('news'));
    }

    public function show($id)
    {
        $news= News::findOrFail($id);

        return view('news.show', compact('news'));
    }
}
