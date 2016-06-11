@extends('layouts.app')

@section('content')
    <h1>Редактирование</h1>

    <hr>
    @include('errors.list')

    {!! Form::model($genre, ['method' => 'PATCH', 'action' => ['GenresController@update', $genre->id]]) !!}
        @include('authors.form', ['submitButtonText' => 'Внести изменения'])
    {!! Form::close() !!}

@stop