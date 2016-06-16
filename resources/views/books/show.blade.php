@extends('layouts.app')

@section('content')
    <div class="page-header">
        <h1 class="text-uppercase">{{ $book->title }}</h1>
        @if (Auth::user())
            @if ($book->isOwner(Auth::user()) or Auth::user()->isAdmin())
                <a class="btn btn-default" href="{{ url('/books', [$book->id, 'edit']) }}">Изменить</a>
                {!! Form::model($book, ['method' => 'DELETE', 'action' => ['BooksController@destroy', $book->id], 'style' => 'display:inline-block']) !!}
                <button class="btn btn-danger" type="submit">Удалить</button>
            @endif
        @endif
        {!! Form::close() !!}
    </div>
    <ul class="list-group">
        @unless ($book->authors->isEmpty())
            <li class="list-group-item">
                Автор:
                @foreach($book->authors as $author)
                    <b><a href="{{ url('/authors', [$author->id]) }}">{{ $author->name }}</a></b>
                @endforeach
            </li>
        @endunless
        @unless ($book->genres->isEmpty())
            <li class="list-group-item">
                Жанр:
                @foreach($book->genres as $genre)
                    <b><a href="{{ url('/genres', [$genre->id]) }}">{{ $genre->name }}</a></b>
                @endforeach
            </li>
        @endunless
        <li class="list-group-item">
            Опубликована в <b>{{ $book->published_at }}</b> году
        </li>
    </ul>
    <hr>
    <article>
        {{ $book->description }}
    </article>
    <hr>
    <div class="page-header">
        <h1 class="text-uppercase">Рецензии</h1>
    </div>
@stop