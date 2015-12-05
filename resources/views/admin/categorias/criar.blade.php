@extends('app')


@section('content')
<div class="container">
	<h1>Inserir Categorias</h1>
	
	@include('errors.errors_formularios')

	{!! Form::open(['route' => 'admin.categorias.salvar']) !!}
	
	@include('admin.categorias.formulario')
		
	{!! Form::close() !!}
</div>
@endsection