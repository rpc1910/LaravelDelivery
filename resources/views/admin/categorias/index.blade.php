@extends('app')


@section('content')
<div class="container">
	<h1>Categorias</h1>
	<p>
		<a href="{{ route('admin.categorias.criar') }}" class="btn btn-success">Inserir</a>
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
		@foreach($categorias as $categoria)
			<tr>
				<td>{{ $categoria->id }}</td>
				<td>{{ $categoria->nome }}</td>
				<td>
					<a href="{{ route('admin.categorias.editar', ['id' => $categoria->id]) }}" class="btn btn-warning">Editar</a>
				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	{!! $categorias->render() !!}
</div>
@endsection