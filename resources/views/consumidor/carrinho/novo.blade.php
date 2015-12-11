@extends('app')


@section('content')
<div class="container">
	<h1>Carrinho</h1>
	
	@include('errors.errors_formularios')

	{!! Form::open(['route' => 'consumidor.carrinho.salvar']) !!}
	
		<div class="form-group">
			<label for="">Total</label>
			<p id="total"></p>
		</div>

		<p><a href="#" id="adicionarItem" class="btn btn-primary">Novo item</a></p>

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Produto</th>
					<th>Quantidade</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<select name="items[0][produto_id]" class="form-control">
							@foreach($produtos as $p)
								<option value="{{ $p->id }}" data-valor="{{ $p->preco }}">{{$p->nome}} - R$ {{$p->preco}}</option>
							@endforeach
						</select>
					</td>
					<td>{!! Form::text('items[0][quantidade]', 1, ['class' => 'form-control']) !!}</td>
				</tr>
			</tbody>
		</table>

		<div class="form-group">
			{!! Form::submit('Enviar', ['class' => 'btn btn-primary']) !!}
		</div>
		
	{!! Form::close() !!}
</div>
@endsection


@section('scripts')
<script>
	$("#adicionarItem").click(function(){
		var linha = $("table tbody > tr:last"),
			novaLinha = linha.clone(),
			total = $("table tbody tr").length;

		novaLinha.find('td').each(function(){
			var campos = $(this).find('input,select');
			var nomes = campos.attr('name');

			campos.attr('name', nomes.replace((total-1) + "", total + ""));
		});

		novaLinha.find('input').val(1);
		novaLinha.insertAfter(linha);
		total();
	});

	function total() {
		var total = 0;
		var linhas = $("table tbody tr").length;
		var tr = null, preco, quantidade;

		for(i = 0; i < linhas; i++) {
			tr = $('table tbody tr').eq(i);
			preco = tr.find(':selected').data('valor');
			quantidade = parseInt(tr.find('input').val());

			total += preco*quantidade;
		}

		$("#total").html(total);
	}

	$(document.body).on('click', 'select', function(){
		total();
	});

	$(document.body).on('blur', 'input', function(){
		total();
	});
</script>
@endsection