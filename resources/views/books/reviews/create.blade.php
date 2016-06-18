{{--@include('errors.list')--}}

{!! Form::model($review = new App\Review, ['url' => ['books', $book->id, 'reviews']]) !!}
    @include('books.reviews.form', ['submitButtonText' => 'Добавить'])
{!! Form::close() !!}
