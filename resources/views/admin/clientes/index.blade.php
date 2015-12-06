@extends('app')


@section('content')
<div class="container">
	<h1>Clientes</h1>
	<p>
		<a href="{{ route('admin.clientes.criar') }}" class="btn btn-success">Inserir</a>
	</p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nome</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
		@foreach($clientes as $cliente)
			<tr>
				<td>{{ $cliente->id }}</td>
				<td>{{ $cliente->usuario->name }}</td>
				<td>
					<a href="{{ route('admin.clientes.editar', ['id' => $cliente->id]) }}" class="btn btn-warning">Editar</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	{!! $clientes->render() !!}
</div>
@endsection