<?php

namespace LaravelDelivery\Services;

use LaravelDelivery\Repositories\PedidoRepository;
use LaravelDelivery\Repositories\CupomRepository;
use LaravelDelivery\Repositories\ProdutoRepository;



class PedidoService {

	private $repository;
    private $cupomRepository;
	private $produtoRepository;

	public function __construct(PedidoRepository $repository, CupomRepository $cupomRepository, ProdutoRepository $produtoRepository) {
        $this->repository = $repository;
        $this->cupomRepository = $cupomRepository;
		$this->produtoRepository = $produtoRepository;
	}


	public function criar(array $dados) {
		\DB::beginTransaction();
		try {


			$dados['status'] = 0;
			if(isset($dados['codigo_cupom'])) {
				$cupom = $this->cupomRepository->findByField('codigo', $dados['codigo_cupom'])->first();

				$dados['cupom_id'] = $cupom->id;
				$cupom->used = 1;
				$cupom->save();

				unset($dados['codigo_cupom']);
			}

			$items = $dados['items'];

			unset($dados['items']);

			$pedido = $this->repository->create($dados);
			$total = 0;

			foreach ($items as $item) {
				$item['preco'] = $this->produtoRepository->find($item['produto_id'])->preco;
				$pedido->items()->create($item);

				$total += $item['preco'] * $item['quantidade'];
			}

			$pedido->total = $total;

			if(isset($cupom)) {
				$pedido->total = $total - $cupom->valor;
			}

			$pedido->save();
			\DB::commit();
		}
		catch(\Exception $e) {
			DB::rollback();
			throw $e;
			
		}
	}
}