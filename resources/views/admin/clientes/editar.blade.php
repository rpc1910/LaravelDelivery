@extends('app')


@section('content')
<div class="container">
	<h1>Editar Cliente: {{$cliente->usuario->name}}</h1>
	
	@include('errors.errors_formularios')

	{!! Form::model($cliente, ['route' => ['admin.clientes.atualizar', $cliente->id]]) !!}
		
		@include('admin.clientes.formulario')
		
	{!! Form::close() !!}
</div>
@endsection