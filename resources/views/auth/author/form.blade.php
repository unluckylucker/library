@extends('app')
@isset($author)
    @section('title', 'Редактировать автора '. $author->name)
@else
    @section('title', 'Создать автора')
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
              @isset($author)
              action="{{route('author.update', $author)}}"
              @else
              action="{{route('author.store')}}"
                @endisset

        >
            @csrf
            <div>
                @isset($author)
                    @method('PUT')
                @endisset

                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Название: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($author){{$author->name}}@endisset">
                    </div>
                </div>
                <br>

                <button class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
    </div>

@endsection