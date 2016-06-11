
<div class="form-group">
    {!! Form::label('genre', 'Название жанра') !!}
    {!! Form::text('genre', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>