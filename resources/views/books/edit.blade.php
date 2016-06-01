@extends('layouts.app')

@section('content')
    <h1>Редактирование</h1>

    <hr>
    @include('errors.list')

    {!! Form::model($book, ['method' => 'PATCH', 'action' => ['BooksController@update', $book->id]]) !!}
        @include('books.form', ['submitButtonText' => 'Внести изменения'])
    {!! Form::close() !!}

@stop