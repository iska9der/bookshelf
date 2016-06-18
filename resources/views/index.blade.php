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
                <h4 style="display:inline-block">{{ $review->user->name }}  </h4>
                <small>написал рецензию к книге</small>
                <h2 style="display:inline-block">
                    <a href="{{ url('/books', [$review->book->id]) }}">
                    {{ $review->book->title }}
                    </a>
                </h2>
                <p>{!! nl2br(e($review->body)) !!} </p>
            </div>
        @endforeach
    </div>

@stop
