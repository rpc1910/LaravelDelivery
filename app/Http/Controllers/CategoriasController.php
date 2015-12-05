<?php

namespace LaravelDelivery\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDelivery\Http\Requests\AdminCategoriaRequest;
use LaravelDelivery\Http\Controllers\Controller;

use LaravelDelivery\Repositories\CategoriaRepository;

class CategoriasController extends Controller {

	private $repositorie;

	public function __construct(CategoriaRepository $repositorie) {
		$this->repositorie = $repositorie;
	}
    
    public function getIndex() {
    	$categorias = $this->repositorie->paginate();
    	return view('admin.categorias.index', ['categorias' => $categorias]);
    }

    public function getCriar() {
    	return view('admin.categorias.criar');
    }

    public function postSalvar(AdminCategoriaRequest $request) {
    	$this->repositorie->create($request->all());
    	return redirect()->route('admin.categorias');
    }

    public function getEditar($id) {
    	$categoria = $this->repositorie->find($id);
    	return view('admin.categorias.editar', ['categoria' => $categoria]);
    }

    public function postEditar(AdminCategoriaRequest $request, $id) {
    	$this->repositorie->update($request->all(), $id);
    	return redirect()->route('admin.categorias');
    }
}
