@extends('app')
@section('title', 'Главная')
@section('content')


        <div class="container position-ref full-height">


            <div class="content">
                <h1 class="title">
                    Библиотека
                </h1>

                <form action="{{route('search')}}" method="POST" class="search-form">
                    <input type="text" name = 'q' placeholder="Поиск книг" class="js_search-input">
                    @csrf
                    <button class="js_search-btn">Поиск</button>
                </form>

                <form action="{{route('sort')}}" method="POST" class="sort-form">
                    <label for="asc">По возрастанию<input type="radio" value="asc" name="sortDirection"></label>
                    <label for="desc">По убыванию<input type="radio" value="desc" name="sortDirection" checked></label>
                    <input type="hidden" value="rating" name="sort">
                    @csrf
                    <button class="js_search-btn">Сортировка</button>
                </form>
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <h2>Книги</h2>
                            <div class="result-search">
                                @foreach($books as $book)
                                    @include('layouts.book', compact('book'))
                                @endforeach
                            </div>

                    </div>
                    <div class="col-sm-12 col-md-6">
                        <h2>Авторы</h2>
                        @foreach($authors as $author)
                            @include('layouts.author', compact('author'))
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    @endsection
