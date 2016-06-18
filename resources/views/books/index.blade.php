@extends('layouts.app')

@section('content')
    @include(
    'partials.banner', [
        'header' => 'Книги',
        'body' => 'Список имеющихся книг в нашей базе данных'
        ]
    )

    <div class="container">
        @foreach (array_chunk($books->all(), 4) as $fourBooks)
            <div class="row">
                @foreach($fourBooks as $book)
                    <div class="col-md-3">
                        <h1 class="heading">
                            <a href="{{ url('/books', $book->id) }}">
                                {{ $book->title }}
                            </a>
                            <small>
                                {{ $book->published_at }}
                            </small>
                        </h1>
                        <p> {{ strip_tags(str_limit($book->description, $limit = 140, $end = '...'))  }} </p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop