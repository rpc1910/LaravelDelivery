@extends('app')


@section('content')
<div class="container">
	<h1>Inserir Cupons</h1>
	
	@include('errors.errors_formularios')

	{!! Form::open(['route' => 'admin.cupoms.salvar']) !!}
	
	@include('admin.cupoms.formulario')
		
	{!! Form::close() !!}
</div>
@endsection