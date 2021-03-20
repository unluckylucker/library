@extends('app')

@section('title', 'Регистрация')
@section('content')
    <div class="container">
    @foreach($errors->all() as $error)
        <li>{{$error}}</li>
    @endforeach
    @if($errors->get('email'))
        <div class="alert alert-danger">
            @foreach($errors->get('email') as $error)
                <li>{{$error}}</li>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{route('register')}}" aria-label="Register">
        @csrf
        <div class="form-group row"><label for="name" class="col-md-4 col-form-label text-md-right">Имя</label>
            <div class="col-md-6"><input id="name" type="text" name="name" value=""
                                         required="required" autofocus="autofocus"
                                         class="form-control"></div>
        </div>
        <div class="form-group row"><label for="email"
                                           class="col-md-4 col-form-label text-md-right">E-Mail</label>
            <div class="col-md-6"><input id="email" type="email" name="email" value=""
                                         required="required" class="form-control"></div>
        </div>
        <div class="form-group row"><label for="password"
                                           class="col-md-4 col-form-label text-md-right">Пароль</label>
            <div class="col-md-6"><input id="password" type="password" name="password"
                                         required="required" class="form-control"></div>
        </div>
        <div class="form-group row"><label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-right">Подтвердите
                пароль</label>
            <div class="col-md-6"><input id="password-confirm" type="password"
                                         name="password_confirmation" required="required"
                                         class="form-control"></div>
        </div>
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    Зарегистрироваться
                </button>
            </div>
        </div>
    </form>
    </div>
@endsection