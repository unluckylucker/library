@extends('app')

@section('title', 'Книга: '.$book->name)
@section('content')
    <div class="container">
        <h1><a href="{{\Illuminate\Support\Facades\Storage::url($book->file)}}">{{$book->name}}</a></h1>
        <span>Id: {{$book->id}}</span>

        <span>Рейтинг: {{$book->rating()}}</span>

        @isset($book->author)
            <span>Автор: {{$book->author->name}}</span>
        @endisset
    </div>

@endsection