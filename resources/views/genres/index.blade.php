@extends('layouts.app')

@section('content')
    @include(
    'partials.banner', [
        'header' => 'Жанры',
        'body' => 'Список всех имеющихся жанров в нашей базе данных'
        ]
    )

    <div class="container">
        @foreach (array_chunk($genres->all(), 4) as $fourGenres)
            <div class="row">
                @foreach($fourGenres as $genre)
                    <div class="col-md-3">
                        <h1 class="heading">
                            <a href="{{ url('/genres', $genre->id) }}">
                                {{ $genre->name }}
                            </a>
                        </h1>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop