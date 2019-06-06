@extends('layouts.master')
@section('title')
    All news
@endsection

@section('content')
    <ul>
        @foreach ($news as $news)
            <h2 class="blog-post-title"><a href="{{ route('single-news', ['id' => $news->id]) }}">{{ $news->title }}</a></h2>
            <p>User who posted the news: </p> <a href=""></a>
        @endforeach
    </ul>
@endsection
