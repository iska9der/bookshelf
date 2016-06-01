@extends('layouts.app')

@section('content')
    <h1>Добавить новую книгу</h1>

    <hr>
    @include('errors.list')

    {!! Form::open(['url' => 'books']) !!}
        @include('books.form', ['submitButtonText' => 'Добавить книгу'])
    {!! Form::close() !!}

@stop