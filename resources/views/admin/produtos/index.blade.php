@extends('app')


@section('content')
<div class="container">
	<h1>Produtos</h1>
	<p>
		<a href="{{ route('admin.produtos.criar') }}" class="btn btn-success">Inserir</a>
	</p>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Produto</th>
				<th>Categoria</th>
				<th>Preço</th>
				<th>Ações</th>
			</tr>
		</thead>
		<tbody>
		@foreach($produtos as $produto)
			<tr>
				<td>{{ $produto->id }}</td>
				<td>{{ $produto->nome }}</td>
				<td>{{ $produto->categoria->nome }}</td>
				<td>{{ $produto->preco }}</td>
				<td>
					<a href="{{ route('admin.produtos.editar', ['id' => $produto->id]) }}" class="btn btn-warning">Editar</a>
					<a href="{{ route('admin.produtos.excluir', ['id' => $produto->id]) }}" class="btn btn-danger">Excluir</a>

				</td>
			</tr>
		@endforeach
		</tbody>
	</table>

	{!! $produtos->render() !!}
</div>
@endsection