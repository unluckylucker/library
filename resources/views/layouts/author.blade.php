<div class="col-sm-12 itemBlock">
    <span>Id: {{$author->id}}</span>
    <span>Имя: {{$author->name}}</span><br>

    <span>Рейтинг автора: <span class="js_ratingValue">{{$author->rating}}</span></span><br>

    @if($author->books->count() > 0)
    <ul>
        @foreach($author->books as $book)
           <li><a href="{{\Illuminate\Support\Facades\Storage::url($book->file)}}">{{$book->name}}</a> - с рейтингом {{$book->rating()}}</li>
        @endforeach
    </ul>
    @endif
    @if (Route::has('login'))
        @auth
            <form class="rate-form" action="{{route('rateAuthors')}}">
                @csrf
                <input type="hidden" name="id" value="{{$author->id}}">
                <input type="radio" value="1" name="rate" class="rating">
                <input type="radio" value="2" name="rate" class="rating">
                <input type="radio" value="3" name="rate" class="rating">
                <input type="radio" value="4" name="rate" class="rating">
                <input type="radio" value="5" name="rate" checked class="rating">
                <button class="btn js_rate">Оценить автора</button>
            </form>
        @endauth
    @endif
    @isset($user)
        @if($user->is_admin)
            <form action="{{ route('author.destroy', $author) }}" method="POST">
                <a class="btn btn-success" type="button" href="{{ route('author.show', $author) }}">Открыть</a>
                <a class="btn btn-warning" type="button" href="{{ route('author.edit', $author) }}">Редактировать</a>
                @csrf
                @method('DELETE')
                <input class="btn btn-danger" type="submit" value="Удалить"></form>
        @endif
    @endisset
</div>