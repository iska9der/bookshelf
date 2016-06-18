@extends('layouts.app')


@section('content')
        <div class="row">
            @include('errors.list')
            @include('books.reviews.create')
        </div>
        <h1>Последнии рецензии</h1>
        <section class="reviews">
            @foreach($book->reviews as $review)
                <article class="review row">
                    <a href="{{ url('/users', [$review->user->id]) }}">
                        {{ $review->user->username }}
                    </a>
                    <p>{{ $review->body }}</p>
                </article>
            @endforeach
        </section>
@stop