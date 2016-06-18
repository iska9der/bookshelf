@extends('layouts.app')

@section('content')
    <h1>Редактирование текста</h1>

    <hr>
    @include('errors.list')

    {!! Form::model($book, ['method' => 'PATCH', 'action' => ['ReviewController@update', $book->id]]) !!}
        @include('books.reviews.form', ['submitButtonText' => 'Внести изменения'])
    {!! Form::close() !!}

@stop