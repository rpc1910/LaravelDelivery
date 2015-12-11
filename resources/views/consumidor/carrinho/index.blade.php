@extends('app')


@section('content')
<div class="container">
	<h1>Pedidos</h1>
	
	<p><a href="{{route('consumidor.carrinho.novo')}}" class="btn btn-default">Novo Pedido</a></p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Total</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			@foreach($pedidos as $pedido)
			<tr>
				<td>{{$pedido->id}}</td>
				<td>{{$pedido->total}}</td>
				<td>{{$pedido->status}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

	{!! $pedidos->render() !!}
</div>
@endsection


@section('scripts')

@endsection