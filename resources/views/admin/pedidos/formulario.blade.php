<div class="form-group">
	{!! Form::label('status', 'Status:') !!}
	{!! Form::select('status', $lista_status, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('entregador_id', 'Entregador:') !!}
	{!! Form::select('entregador_id', $lista_entregadores, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
</div>