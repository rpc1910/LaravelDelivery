<?php

namespace LaravelDelivery\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDelivery\Http\Requests\AdminCategoriaRequest;
use LaravelDelivery\Http\Controllers\Controller;

use LaravelDelivery\Repositories\PedidoRepository;
use LaravelDelivery\Repositories\UserRepository;
use LaravelDelivery\Repositories\ProdutoRepository;

use LaravelDelivery\Services\PedidoService;

use Illuminate\Support\Facades\Auth;

class CarrinhoController extends Controller {

    private $repository;
    private $userRepository;
    private $produtoRepository;
	private $pedidoService;

	public function __construct(PedidoRepository $repository, UserRepository $userRepository, ProdutoRepository $produtoRepository, PedidoService $pedidoService) {
        $this->repository = $repository;
        $this->userRepository = $userRepository;
		$this->produtoRepository = $produtoRepository;
        $this->pedidoService = $pedidoService;
	}
    
    public function getIndex() {
    	$cliente = $this->userRepository->find(Auth::user()->id)->cliente->id;
        $pedidos = $this->repository->scopeQuery(function($query) use ($cliente) {
            return $query->where('cliente_id', '=', $cliente);
        })->paginate();

        return view('consumidor.carrinho.index', compact('pedidos'));
    }

    public function getNovo() {
        $produtos = $this->produtoRepository->lists();
        return view('consumidor.carrinho.novo', compact('produtos'));
    }

    public function postSalvar(Request $request) {
        $dados = $request->all();
        $cliente = $this->userRepository->find(Auth::user()->id)->cliente->id;

        $dados['cliente_id'] = $cliente;

        $this->pedidoService->criar($dados);

        return redirect()->route('consumidor.carrinho');
    }
}
