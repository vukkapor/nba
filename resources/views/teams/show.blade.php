@extends('layouts.master')
@section('title')
    {{$team->name}}
@endsection

@section('content')
    <h1>{{$team->name}}</h1>
    <p>{{$team->email}}</p>
    <p>{{$team->address}}</p>
    <ul>
        @foreach ($team->players as $player)
            <li><a href="/players/{{$player->id}}">{{$player->first_name}} {{$player->last_name}}</a> <br> {{$player->email}}</li>
        @endforeach
    </ul>
    @if(count($team->comments))
        <hr/>
        <h4>Comments:</h4>
        <ul class="list-unstyled">
            @foreach($team->comments as $comment)
                <li>
                    <p>
                        <strong>Author:</strong> {{ $comment->user->name }}
                    </p>
                    <p>
                        {{ $comment->content }}
                    </p>
                </li>
            @endforeach
        </ul>
    @endif
    <h4>Post a comment</h4>
    <form method="POST" action="{{ route('comments-team', ['team_id' => $team->id, 'user_id' => Auth()->user()->id]) }}">

        @csrf

        <div class="form-group">
            <label for="content">Comment:</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </form>
    @if (count($errors->all())>0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <li>{{ $error }}</li>
            </div>
        @endforeach
    @endif

@endsection
