@extends('layouts.app')

@section('content')
    @include(
    'partials.banner', [
        'header' => 'Авторы',
        'body' => 'Список всех имеющихся авторов в нашей базе данных'
        ]
    )

    <div class="container">
        @foreach (array_chunk($authors->all(), 4) as $fourAuthors)
            <div class="row">
                @foreach($fourAuthors as $author)
                    <div class="col-md-3">
                        <h1 class="heading">
                            <a href="{{ url('/authors', $author->id) }}">
                                {{ $author->name }}
                            </a>
                            <small>
                                {{ strip_tags(str_limit($author->born, $limit = 4, $end = '')) }} 
                                @if ($author->died > 1)
                                    - {{ strip_tags(str_limit($author->died, $limit = 4, $end = '')) }}
                                @endif
                            </small>
                        </h1>
                        <p> {{ strip_tags(str_limit($author->biography, $limit = 140, $end = '...'))  }} </p>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop