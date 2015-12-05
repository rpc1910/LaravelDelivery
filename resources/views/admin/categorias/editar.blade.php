@extends('app')


@section('content')
<div class="container">
	<h1>Editar Categorias</h1>
	
	@include('errors.errors_formularios')

	{!! Form::model($categoria, ['route' => ['admin.categorias.atualizar', $categoria->id]]) !!}
		
		@include('admin.categorias.formulario')
		
	{!! Form::close() !!}
</div>
@endsection