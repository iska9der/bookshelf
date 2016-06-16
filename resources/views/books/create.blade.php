@extends('layouts.app')

@section('content')
    <h1>Добавить книгу</h1>

    <hr>
    @include('errors.list')

    {!! Form::model($book = new App\Book, ['url' => 'books']) !!}
    @include('books.form', ['submitButtonText' => 'Добавить'])
    {!! Form::close() !!}

@stop