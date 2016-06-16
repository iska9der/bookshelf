@extends('layouts.app')

@section('content')
    <h1>Редактирование</h1>

    <hr>
    @include('errors.list')

    {!! Form::model($author, ['method' => 'PATCH', 'action' => ['AuthorsController@update', $author->id]]) !!}
    @include('authors.form', ['submitButtonText' => 'Внести изменения'])
    {!! Form::close() !!}

@stop