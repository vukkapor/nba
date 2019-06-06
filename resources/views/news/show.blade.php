@extends('layouts.master')
@section('title')
    {{ $news->title }}
@endsection

@section('content')
    <h1>{{ $news->title }}</h1>

    <p>{{ $news->content }}</p>

    <hr>

    <p>Author: {{ $news->users->name }}</p>
@endsection

@section('sidebar')
<div class="sidebar-module sidebar-module-inset">

    @foreach ($news->teams as $team)
    <p><a href="{{ route('single-team-news', ['teamName' => $team->name]) }}">{{ $team->name }}</a></p>
    @endforeach

@endsection
