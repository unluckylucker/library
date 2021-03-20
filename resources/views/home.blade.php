@extends('app')

@section('title', 'Админка')
@section('content')

    <div class="container">
        <h1>Панель админа</h1>
        <a href="{{ route('book.index')}}">Книги</a>
        <a href="{{ route('author.index')}}">Авторы</a>
    </div>

@endsection