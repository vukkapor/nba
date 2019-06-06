@extends('layouts.master')
@section('title')
    All news
@endsection

@section('content')
    <ul>
        @foreach ($news as $singleNews)
            <h2 class="blog-post-title"><a href="{{ route('single-news', ['id' => $singleNews->id]) }}">{{ $singleNews->title }}</a></h2>
            <p>User who posted the news: {{ $singleNews->users->name }}</p>

        @endforeach
    </ul>

    {{ $news->links() }}
@endsection

