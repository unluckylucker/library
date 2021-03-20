@extends('app')

@section('title', 'Админка')
@section('content')

    <div class="container">
        <h1>Авторы</h1>
        <div class="row">
            <div class="col-sm-12">

                @foreach($authors as $author)
                    @include('layouts.author', compact('author', 'user'))
                @endforeach
            </div>
        </div>
        <br><br><br><br><br>
        <a class="btn btn-success" href="{{route('author.create')}}">Создать</a>
    </div>

@endsection