@extends('layouts.app')

@section('content')
    @foreach ($books as $book)
        <article>
            <h2 style="display: inline-block">
                <a href="{{ url('/books', $book->id) }}">
                    {{ $book->title }}
                </a>
            </h2>
            <h3 style="display: inline-block; font-size: 12px">{{ $book->published_at }}</h3>
            <div class="description">{{ $book->description }}</div>
        </article>
    @endforeach
@stop