@extends('app')


@section('content')
<div class="container">
	<h1>Inserir Produtos</h1>
	
	@include('errors.errors_formularios')

	{!! Form::open(['route' => 'admin.produtos.salvar']) !!}
	
	@include('admin.produtos.formulario')
		
	{!! Form::close() !!}
</div>
@endsection