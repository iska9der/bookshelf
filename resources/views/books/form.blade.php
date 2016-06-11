
<div class="form-group">
    {!! Form::label('title', 'Название') !!}
    {!! Form::text('title', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('author_id', 'Автор') !!}
    {!! Form::text('author_id', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('genre_id', 'Жанр') !!}
    {!! Form::text('genre_id', null, ['class' => 'form-control']) !!}
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