@extends('layouts.app')

@section('content')
    @include(
    'partials.banner', [
        'header' => 'Жанры',
        'body' => 'Список всех существующих жанров в нашей базе.'
        ]
    )

    <div class="container">
        @foreach (array_chunk($genres->all(), 4) as $fourGenres)
            <div class="row">
                @foreach($fourGenres as $genre)
                    <div class="col-md-3">
                        <h1 class="heading">
                            <a href="{{ url('/genres', $genre->id) }}">
                                {{ $genre->genre }}
                            </a>
                        </h1>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@stop