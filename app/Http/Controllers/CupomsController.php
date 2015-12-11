<?php

namespace LaravelDelivery\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDelivery\Http\Requests\AdminCupomRequest;
use LaravelDelivery\Http\Controllers\Controller;

use LaravelDelivery\Repositories\CupomRepository;

class CupomsController extends Controller {

	private $repositorie;

	public function __construct(CupomRepository $repositorie) {
		$this->repositorie = $repositorie;
	}
    
    public function getIndex() {
    	$cupoms = $this->repositorie->paginate();
    	return view('admin.cupoms.index', ['cupoms' => $cupoms]);
    }

    public function getCriar() {
    	return view('admin.cupoms.criar');
    }

    public function postSalvar(AdminCupomRequest $request) {
    	$this->repositorie->create($request->all());
    	return redirect()->route('admin.cupoms');
    }

    public function getEditar($id) {
    	$cupom = $this->repositorie->find($id);
    	return view('admin.cupoms.editar', ['cupom' => $cupom]);
    }

    public function postEditar(AdminCupomRequest $request, $id) {
    	$this->repositorie->update($request->all(), $id);
    	return redirect()->route('admin.cupoms');
    }
}
