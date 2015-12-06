@extends('app')


@section('content')
<div class="container">
	<h1>Pedido #{{ $pedido->id }}</h1>

	<h3>Data: {{ $pedido->created_at }}</h3>

	<h3>Endereço</h3>
	<p>{{$pedido->comprador->endereco}}, {{$pedido->comprador->cidade}} - {{$pedido->comprador->estado}}</p>
	
	@include('errors.errors_formularios')

	{!! Form::model($pedido, ['route' => ['admin.pedidos.atualizar', $pedido->id]]) !!}
		
		@include('admin.pedidos.formulario')
		
	{!! Form::close() !!}
</div>
@endsection