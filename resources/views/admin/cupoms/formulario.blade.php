<div class="form-group">
	{!! Form::label('codigo', 'Código do Cupom:') !!}
	{!! Form::text('codigo', null, ['class' => 'form-control', 'placeholder' => 'Código do Cupom']) !!}
</div>

<div class="form-group">
	{!! Form::label('valor', 'Valor:') !!}
	{!! Form::text('valor', null, ['class' => 'form-control', 'placeholder' => 'Valor do cupom']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
</div>