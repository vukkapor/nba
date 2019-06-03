@extends('layouts.master')

@section('title')
    Teams
@endsection

@section('content')
    <ul>
        @foreach($teams as $team)
            <h2 class="blog-post-title"><a href="{{ route('single-team', ['id' => $team->id]) }}">{{ $team->name }}</a></h2>

        @endforeach
    </ul>
@endsection
