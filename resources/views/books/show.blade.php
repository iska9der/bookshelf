@extends('layouts.app')

@section('content')
        <div class="page-header">
            <h1 class="text-uppercase">{{ $book->title }}</h1>
            <a class="btn btn-default" href="{{ url('/books', [$book->id, 'edit']) }}">Изменить</a>
            {!! Form::model($book, ['method' => 'DELETE', 'action' => ['BooksController@destroy', $book->id], 'style' => 'display:inline-block']) !!}
            <button class="btn btn-danger" type="submit">Удалить</button>
            {!! Form::close() !!}
        </div>
        <ul class="list-group">
            <li class="list-group-item">
                Автор: <b>{{ isset($book->author_id) ? $book->author->name : 'Не указан'}}</b>
            </li>
            @unless ($book->genres->isEmpty())
                <li class="list-group-item">
                    Жанр:
                    @foreach($book->genres as $genre)
                        <b>{{ $genre->name }}</b>
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
@stop