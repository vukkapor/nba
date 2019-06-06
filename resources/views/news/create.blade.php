@extends('layouts.master')
@section('title')
    Create a news
@endsection

@section('content')

<h2 class="blog-post-title">Create new news</h2>

<form method="POST" action="{{ route('create-news') }}">

    @csrf

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title"/>
    </div>

    <div class="form-group">
        <label for="content">Content</label>
        <textarea class="form-control" id="content" name="content"></textarea>
    </div>

    <div class="form-group">
        <label for="teams[]">Teams</label>
        @foreach ($teams as $team)
            <br><input type="checkbox" name="teams[]" value ="{{ $team->id }}" id="teams[]"> {{ $team->name }}
        @endforeach
    </div
    >
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

</form>
@endsection
