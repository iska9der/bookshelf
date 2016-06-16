@extends('layouts.app')

@section('content')
    <h1>Добавить автора</h1>

    <hr>
    @include('errors.list')

    {!! Form::model($author = new App\Author, ['url' => 'authors']) !!}
        @include('authors.form', ['submitButtonText' => 'Добавить'])
    {!! Form::close() !!}

@stop