<div class="form-group @if($errors->first('inputname')) has-error @endif">
	{!! Form::label('nome', 'Nome da categoria:') !!}
	{!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome da categoria']) !!}
	<small class="text-danger">{{ $errors->first('inputname') }}</small>
</div>

<div class="form-group">
	{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
</div>