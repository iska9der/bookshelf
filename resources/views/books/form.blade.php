    <div class="form-group">
        {!! Form::label('title', 'Название') !!}
        {!! Form::text('title', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('genre_list', 'Жанры') !!}
        {!! Form::select('genre_list[]', $genres, null, ['id'=> 'genre_list', 'class' => 'form-control', 'multiple']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('published_at', 'Год публикации') !!}
        {!! Form::number('published_at', date('Y'), ['class' => 'form-control', 'maxlength' => '4', 'max' => '9999']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('description', 'Описание') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
    </div>

    @section('footer')
        <script>
            $('#genre_list').select2({
                placeholder: 'Выберите жанр'
            });
        </script>
    @endsection