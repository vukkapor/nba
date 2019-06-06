@extends('layouts.master')
@section('title')
    {{ $news->title }}
@endsection

@section('content')
    <h1>{{ $news->title }}</h1>

    <p>{{ $news->content }}</p>

    <hr>

    <p>Author: {{ $news->user->name }}</p>
@endsection
