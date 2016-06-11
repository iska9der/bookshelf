<div class="form-group">
    {!! Form::label('name', 'Имя') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('born', 'Родился') !!}
    {!! Form::date('born', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('died', 'Умер') !!}
    {!! Form::date('died', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('biography', 'Биография') !!}
    {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>