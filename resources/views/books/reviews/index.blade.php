@extends('layouts.app')


@section('content')
        <div class="row">
            @if (Auth::user())
                @include('errors.list')
                @include('books.reviews.create')
            @endif
        </div>
        <h1>Последнии рецензии</h1>
        <section class="reviews">
            @foreach($reviews as $review)
                <article class="review row">
                    <a href="{{ url('/users', [$review->user->id]) }}">
                        {{ $review->user->username }}
                    </a>
                    <small>{{ $review->created_at }}</small>
                    @if (Auth::user())
                        @if (Auth::user()->isAdmin())
                            <a class="btn btn-default btn-sm" href="{{ url('/books', [$book->id, 'reviews', 'edit']) }}">Изменить</a>
                            {!! Form::model($review, ['method' => 'DELETE', 'action' => ['ReviewController@destroy', $review->id], 'style' => 'display:inline-block']) !!}
                                <button class="btn btn-danger btn-sm" type="submit">Удалить</button>
                            {!! Form::close() !!}
                        @endif
                    @endif
                    <p>{{ $review->body }}</p>
                </article>
            @endforeach
        </section>
@stop