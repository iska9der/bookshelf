{{--@include('errors.list')--}}

{!! Form::model($review = new App\Review, ['url' => 'books/reviews']) !!}
    @include('books.reviews.form', ['submitButtonText' => 'Добавить'])
{!! Form::close() !!}
