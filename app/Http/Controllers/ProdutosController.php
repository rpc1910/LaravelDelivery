<?php

namespace LaravelDelivery\Http\Controllers;

use Illuminate\Http\Request;

use LaravelDelivery\Http\Requests\AdminProdutoRequest;
use LaravelDelivery\Http\Controllers\Controller;

use LaravelDelivery\Repositories\ProdutoRepository;
use LaravelDelivery\Repositories\CategoriaRepository;

class ProdutosController extends Controller {

	private $repositorie;

    private $CategoriaRepository;

	public function __construct(ProdutoRepository $repositorie, CategoriaRepository $cat) {
		$this->repositorie = $repositorie;
        $this->CategoriaRepository = $cat;
	}
    
    public function getIndex() {
    	$produtos = $this->repositorie->paginate();
    	return view('admin.produtos.index', ['produtos' => $produtos]);
    }

    public function getCriar() {
        $categorias = $this->CategoriaRepository->lists();
    	return view('admin.produtos.criar', compact('categorias'));
    }

    public function postSalvar(AdminProdutoRequest $request) {
    	$this->repositorie->create($request->all());
    	return redirect()->route('admin.produtos');
    }

    public function getEditar($id) {
    	$produto = $this->repositorie->find($id);
        $categorias = $this->CategoriaRepository->lists();
    	return view('admin.produtos.editar', ['produto' => $produto, 'categorias' => $categorias]);
    }

    public function postAtualizar(AdminProdutoRequest $request, $id) {
    	$this->repositorie->update($request->all(), $id);
    	return redirect()->route('admin.produtos');
    }

    public function getExcluir($id) {
        $this->repositorie->delete($id);
        return redirect()->route('admin.produtos');
    }
}
