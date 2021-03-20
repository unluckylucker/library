<div class="col-sm-12 itemBlock">
    <span>Id: {{$book->id}}</span>
    <span>Название: <a href="{{\Illuminate\Support\Facades\Storage::url($book->file)}}">{{$book->name}}</a></span>
    <span>Рейтинг: <span class="js_ratingValue">{{$book->rating}}</span></span>

    @isset($book->author)
    <span>Автор: {{$book->author->name}}</span>
    @endisset
    @if (Route::has('login'))
        @auth
            <form class="rate-form" action="{{route('rate')}}">
                @csrf
                <input type="hidden" name="id" value="{{$book->id}}">
                <input type="radio" value="1" name="rate" class="rating">
                <input type="radio" value="2" name="rate" class="rating">
                <input type="radio" value="3" name="rate" class="rating">
                <input type="radio" value="4" name="rate" class="rating">
                <input type="radio" value="5" name="rate" checked class="rating">
                <button class="btn js_rate">Оценить</button>
            </form>
        @endauth
    @endif
    @isset($user)
        @if($user->is_admin)
            <form action="{{ route('book.destroy', $book) }}" method="POST">
                <a class="btn btn-success" type="button" href="{{ route('book.show', $book) }}">Открыть</a>
                <a class="btn btn-warning" type="button" href="{{ route('book.edit', $book) }}">Редактировать</a>
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Удалить"></form>
        @endif
    @endisset
</div>