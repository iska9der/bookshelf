@extends('layouts.app')

@section('content')
    <h1>{{ $book->title }}</h1>

    <article>
        {{ $book->description }}
    </article>
@stop