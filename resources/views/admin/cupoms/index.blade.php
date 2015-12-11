@extends('app')


@section('content')
<div class="container">
	<h1>Cupons</h1>
	<p>
		<a href="{{ route('admin.cupoms.criar') }}" class="btn btn-success">Inserir</a>
	</p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Código</th>
				<th>Valor</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
		@foreach($cupoms as $cupom)
			<tr>
				<td>{{ $cupom->id }}</td>
				<td>{{ $cupom->codigo }}</td>
				<td>{{ $cupom->valor }}</td>
				<td>
					<a href="{{ route('admin.cupoms.editar', ['id' => $cupom->id]) }}" class="btn btn-warning">Editar</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	{!! $cupoms->render() !!}
</div>
@endsection