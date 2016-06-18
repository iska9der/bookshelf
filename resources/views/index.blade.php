@extends('layouts.app')

@section('content')
    @include(
    'partials.banner', [
        'header' => 'Последние рецензии',
        'body' => ' '
        ]
    )

    <div class="container">
        @foreach($reviews as $review)
            <div class="row">
                <h5 class="text-uppercase" style="display:inline-block">
                    {{ $review->user->name }}
                </h5>
                <small>написал рецензию к книге</small>
                <h3 style="display:inline-block">
                    <a class="text-uppercase" href="{{ url('/books', [$review->book->id]) }}">
                    {{ $review->book->title }}
                    </a>
                </h3>
                <p>{!! nl2br(e(strip_tags(str_limit($review->body, $limit = 150, $end = '...')))) !!} </p>
            </div>
        @endforeach
    </div>

@stop
