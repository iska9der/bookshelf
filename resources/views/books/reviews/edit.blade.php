@extends('layouts.app')

@section('content')
    <h1>Редактирование текста</h1>

    <hr>
    @include('errors.list')

    {!! Form::model($review, ['method' => 'PATCH', 'action' => ['ReviewController@update', $book, $review->id]]) !!}
        @include('books.reviews.form', ['submitButtonText' => 'Внести изменения'])
    {!! Form::close() !!}

@stop