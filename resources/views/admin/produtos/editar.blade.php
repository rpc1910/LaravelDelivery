@extends('app')


@section('content')
<div class="container">
	<h1>Editar Produtos</h1>
	
	@include('errors.errors_formularios')

	{!! Form::model($produto, ['route' => ['admin.produtos.atualizar', $produto->id]]) !!}
		
		@include('admin.produtos.formulario')
		
	{!! Form::close() !!}
</div>
@endsection