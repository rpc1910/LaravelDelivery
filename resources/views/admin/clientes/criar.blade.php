@extends('app')


@section('content')
<div class="container">
	<h1>Inserir Cliente</h1>
	
	@include('errors.errors_formularios')

	{!! Form::open(['route' => 'admin.clientes.salvar']) !!}
	
	@include('admin.clientes.formulario')
		
	{!! Form::close() !!}
</div>
@endsection