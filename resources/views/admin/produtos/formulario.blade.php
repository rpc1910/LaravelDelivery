<div class="form-group">
	{!! Form::label('categoria_id', 'Categoria:') !!}
	{!! Form::select('categoria_id', $categorias, null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('nome', 'Nome do produto:') !!}
	{!! Form::text('nome', null, ['class' => 'form-control', 'placeholder' => 'Nome do produto']) !!}
</div>

<div class="form-group">
	{!! Form::label('descricao', 'Descrição:') !!}
	{!! Form::textarea('descricao', null, ['class' => 'form-control', 'placeholder' => 'Descrição']) !!}
</div>

<div class="form-group">
	{!! Form::label('preco', 'Preço:') !!}
	{!! Form::text('preco', null, ['class' => 'form-control', 'placeholder' => 'Preço']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
</div>