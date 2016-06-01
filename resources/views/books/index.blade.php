@extends('layouts.app')

@section('content')
    @include(
    'partials.banner', [
        'header' => 'Книги',
        'body' => 'Список всех существующих книг в нашей базе.'
        ]
    )

    <div class="container">
        <div class="row">
            @foreach ($books as $book)
                <div class="col-md-3">
                    <h2 style="display: inline-block">
                        <a href="{{ url('/books', $book->id) }}">
                            {{ $book->title }}
                        </a>
                    </h2>
                    <h3 style="display: inline-block; font-size: 12px">{{ $book->published_at }}</h3>
                    <div class="description">{{ $book->description }}</div>
                </div>
            @endforeach
        </div>
    </div>
@stop