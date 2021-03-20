@foreach($result as $book)
    @include('layouts.book', compact('book'))
@endforeach
@if(empty($result['items']))
    По вашему запросу ничего не найдено
@endif