@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="page-header">
            <h1 class="text-uppercase">{{ $author->name }}</h1>

            <a class="btn btn-default" href="{{ url('/authors', [$author->id, 'edit']) }}">Изменить</a>
            {!! Form::model($author, ['method' => 'DELETE', 'action' => ['AuthorsController@destroy', $author->id], 'style' => 'display:inline-block']) !!}
            <button class="btn btn-danger" type="submit">Удалить</button>
            {!! Form::close() !!}
        </div>
        <ul class="list-group">
            <li class="list-group-item">С {{ $author->born }} по {{ $author->died }} </li>
        </ul>
        <hr>
        <article>
            {{ $author->biography }}
        </article>
    </div>
@stop