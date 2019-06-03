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
@endsection
