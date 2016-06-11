@extends('layouts.app')

@section('content')
    <h1>Добавить жанр</h1>

    <hr>
    @include('errors.list')

    {!! Form::open(['url' => 'genres']) !!}
        @include('genres.form', ['submitButtonText' => 'Добавить'])
    {!! Form::close() !!}

@stop