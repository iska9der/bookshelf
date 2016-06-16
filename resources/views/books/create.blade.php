    {{--@include('errors.list')--}}

    {!! Form::model($review = new App\Review, ['url' => 'books']) !!}
        @include('books.reviews.form', ['submitButtonText' => 'Добавить'])
    {!! Form::close() !!}
