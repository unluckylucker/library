@extends('app')

@section('title', 'Админка')
@section('content')

    <div class="container">
        <h1>Книги</h1>
        <div class="row">
            <div class="col-sm-12">

                @foreach($books as $book)
                    @include('layouts.book', compact('book', 'user'))
                @endforeach
            </div>
        </div>
        <br><br><br><br><br>
        <a class="btn btn-success" href="{{route('book.create')}}">Создать</a>
    </div>

@endsection