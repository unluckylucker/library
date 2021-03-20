@extends('app')
@isset($book)
    @section('title', 'Редактировать книгу '. $book->name)
@else
    @section('title', 'Создать книгу')
@endisset

@section('content')
    <div class="container">
        <div class="col-md-12">
        <h1>@yield('title')</h1>

        @foreach($errors->all() as $error)
            {{$error}}
            <br>
        @endforeach
        <form method="POST" enctype="multipart/form-data"
              @isset($book)
              action="{{route('book.update', $book)}}"
              @else
              action="{{route('book.store')}}"
                @endisset

        >
            @csrf
            <div>
                @isset($book)
                    @method('PUT')
                @endisset

                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($book){{$book->name}}@endisset">
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="category" class="col-sm-2 col-form-label">Автор: </label>
                    <div class="col-sm-6">
                        <select name="author_id" id="author_id">
                            @foreach($authors as $author)
                                <option value="{{$author->id}}"
                                        @isset($book)
                                        @if($author->id == $book->author_id)
                                        selected
                                        @endif
                                        @endisset
                                >
                                    {{$author->name}}
                                </option>
                            @endforeach
                        </select>

                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Файл:  </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Загрузить <input type="file" style="display: none;" name="file" id="file">
                        </label>
                    </div>
                </div>
                <br>

                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
    </div>

@endsection