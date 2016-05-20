@extends('layouts.app')

@section('content')
    <h1>Add a new book</h1>

    <hr>
    {!! Form::open(['url' => 'books']) !!}
        <div class="form-group">
            {!! Form::label('title', 'Название') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('genre_id', 'Жанр') !!}
            {!! Form::text('genre_id', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('published_at', 'Год публикации') !!}
            {!! Form::number('published_at', null, ['class' => 'form-control', 'maxlength' => '4', 'max' => '9999']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description', 'Описание') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Добавить книгу', ['class' => 'btn btn-primary form-control']) !!}
        </div>



    {!! Form::close() !!}
@stop