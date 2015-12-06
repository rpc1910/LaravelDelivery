<?php

namespace LaravelDelivery\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDelivery\Http\Requests\AdminPedidoRequest;
use LaravelDelivery\Http\Controllers\Controller;

use LaravelDelivery\Repositories\PedidoRepository;
use LaravelDelivery\Repositories\UserRepository;

class pedidosController extends Controller {

    private $repositorie;
	private $userRepositorie;

	public function __construct(PedidoRepository $repositorie, UserRepository $userRepositorie) {
		$this->repositorie = $repositorie;
        $this->userRepositorie = $userRepositorie;
	}
    
    public function getIndex() {
    	$pedidos = $this->repositorie->paginate();
    	return view('admin.pedidos.index', ['pedidos' => $pedidos]);
    }

    public function getEditar($id) {
        $lista_status = [
            0 => 'Aguardando',
            1 => 'A caminho',
            2 => 'Entregue'
        ];

        $lista_entregadores = $this->userRepositorie->getEntregadores();

    	$pedido = $this->repositorie->find($id);
    	return view('admin.pedidos.editar', compact('pedido','lista_status', 'lista_entregadores'));
    }

    public function postEditar(AdminPedidoRequest $request, $id) {
    	$this->repositorie->update($request->all(), $id);
    	return redirect()->route('admin.pedidos');
    }
}
