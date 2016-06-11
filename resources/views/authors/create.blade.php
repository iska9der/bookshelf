@extends('layouts.app')

@section('content')
    <h1>Добавить автора</h1>

    <hr>
    @include('errors.list')

    {!! Form::open(['url' => 'authors']) !!}
    @include('authors.form', ['submitButtonText' => 'Добавить'])
    {!! Form::close() !!}

@stop