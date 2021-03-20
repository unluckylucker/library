@extends('app')

@section('title', 'Автор: '.$author->name)
@section('content')
    <div class="container">
        <h1>{{$author->name}}</h1>
        <span>Id: {{$author->id}}</span><br>

        <span>Рейтинг: {{$author->rating()}}</span>

    </div>

@endsection