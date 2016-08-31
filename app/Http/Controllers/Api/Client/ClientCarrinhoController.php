<?php

namespace LaravelDelivery\Http\Controllers\Api\Client;

use Illuminate\Http\Request;

use LaravelDelivery\Http\Requests\AdminCategoriaRequest;
use LaravelDelivery\Http\Controllers\Controller;

use LaravelDelivery\Repositories\PedidoRepository;
use LaravelDelivery\Repositories\UserRepository;
use LaravelDelivery\Repositories\ProdutoRepository;

use LaravelDelivery\Services\PedidoService;

use LucaDegasperi\OAuth2Server\Facades\Authorizer;

class ClientCarrinhoController extends Controller {

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
    
    public function index() {
        $id = Authorizer::getResourceOwnerId();
        $cliente = $this->userRepository->find($id)->cliente->id;
        $pedidos = $this->repository->with(['items'])->scopeQuery(function($query) use ($cliente) {
            return $query->where('cliente_id', '=', $cliente);
        })->paginate();

        return $pedidos;
    }

    public function store(Request $request) {
        $id = Authorizer::getResourceOwnerId();

        $dados = $request->all();
        $cliente = $this->userRepository->find($id)->cliente->id;

        $dados['cliente_id'] = $cliente;

        $pedido = $this->pedidoService->criar($dados);
        
        return $this->repository->with('items')->find($pedido->id);
    }

    public function show($id) {
        $pedido = $this->repository->with(['items', 'comprador', 'entregador', 'cupoms'])->find($id);

        $pedido->items->each(function($item){
            $item->produto;
        });
        return $pedido;
    }
}
