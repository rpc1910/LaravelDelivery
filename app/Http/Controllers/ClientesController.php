<?php

namespace LaravelDelivery\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDelivery\Http\Requests\AdminClienteRequest;
use LaravelDelivery\Http\Controllers\Controller;

use LaravelDelivery\Repositories\ClienteRepository;

use LaravelDelivery\Services\ClienteService;

class ClientesController extends Controller {

	private $repositorie;

    private $clienteService;

	public function __construct(ClienteRepository $repositorie, ClienteService $clienteService) {
		$this->repositorie = $repositorie;
        $this->clienteService = $clienteService;
	}
    
    public function getIndex() {
    	$clientes = $this->repositorie->paginate();

        // dd($clientes);

    	return view('admin.clientes.index', ['clientes' => $clientes]);
    }

    public function getCriar() {
    	return view('admin.clientes.criar');
    }

    public function postSalvar(AdminClienteRequest $request) {
    	$this->clienteService->create($request->all());
    	return redirect()->route('admin.clientes');
    }

    public function getEditar($id) {
    	$cliente = $this->repositorie->find($id);
    	return view('admin.clientes.editar', ['cliente' => $cliente]);
    }

    public function postEditar(AdminClienteRequest $request, $id) {
    	$this->clienteService->update($request->all(), $id);
    	return redirect()->route('admin.clientes');
    }
}
