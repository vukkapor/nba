@extends('layouts.master')
@section('title')
    {{$player->first_name}}
@endsection

@section('content')
    <h1>{{$player->first_name}} {{$player->last_name}}</h1>
    <p>{{$player->email}}</p>
    <a href="/teams/{{$player->team->id}}"><p>{{$player->team->name}}</p></a>
@endsection
