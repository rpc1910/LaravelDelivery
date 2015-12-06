<div class="form-group">
	{!! Form::label('nome', 'Nome:') !!}
	{!! Form::text('usuario[name]', null, ['class' => 'form-control', 'placeholder' => 'Nome']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'E-mail:') !!}
	{!! Form::text('usuario[email]', null, ['class' => 'form-control', 'placeholder' => 'E-mail']) !!}
</div>

<div class="form-group">
	{!! Form::label('telefone', 'Telefone:') !!}
	{!! Form::text('telefone', null, ['class' => 'form-control', 'placeholder' => 'Telefone']) !!}
</div>

<div class="form-group">
	{!! Form::label('endereco', 'Endereço:') !!}
	{!! Form::text('endereco', null, ['class' => 'form-control', 'placeholder' => 'Endereço']) !!}
</div>

<div class="form-group">
	{!! Form::label('cidade', 'Cidade:') !!}
	{!! Form::text('cidade', null, ['class' => 'form-control', 'placeholder' => 'Cidade']) !!}
</div>

<div class="form-group">
	{!! Form::label('estado', 'Estado:') !!}
	{!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'Estado']) !!}
</div>

<div class="form-group">
	{!! Form::label('cep', 'CEP:') !!}
	{!! Form::text('cep', null, ['class' => 'form-control', 'placeholder' => 'CEP']) !!}
</div>



<div class="form-group">
	{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
</div>