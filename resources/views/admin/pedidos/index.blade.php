@extends('app')


@section('content')
<div class="container">
	<h1>Pedidos</h1>
	
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Cliente</th>
				<th>Produtos</th>
				<th>Valor</th>
				<th>Status</th>
				<th>Entregador</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
		@foreach($pedidos as $pedido)
			<tr>
				<td>{{ $pedido->id }}</td>
				<td>{{ $pedido->comprador->usuario->name }}</td>
				<td>
					<ul>
						@foreach($pedido->items as $item)
							<li>{{ $item->produto->nome }}</li>
						@endforeach
					</ul>
				</td>
				<td>{{ $pedido->total }}</td>
				<td>{{ $pedido->status }}</td>
				<td>
					@if($pedido->entregador)
						{{$pedido->entregador->name}}
					@else
						--
					@endif
				</td>
				<td>
					<a href="{{ route('admin.pedidos.editar', ['id' => $pedido->id]) }}" class="btn btn-warning">Editar</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	{!! $pedidos->render() !!}
</div>
@endsection