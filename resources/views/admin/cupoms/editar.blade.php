@extends('app')


@section('content')
<div class="container">
	<h1>Editar Cupom</h1>
	
	@include('errors.errors_formularios')

	{!! Form::model($cupom, ['route' => ['admin.cupoms.atualizar', $cupom->id]]) !!}
		
		@include('admin.cupoms.formulario')
		
	{!! Form::close() !!}
</div>
@endsection