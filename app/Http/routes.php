<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Cria todas as urls da API de forma automática
// Route::resource('admin/categorias', 'CategoriasController');

Route::group(['prefix' => 'admin', 'as' => 'admin', 'middleware'=>'auth.checkrole'], function(){
	Route::controller('categorias', 'CategoriasController',[
		'getIndex' => '.categorias',
		'getCriar' => '.categorias.criar',
		'postSalvar' => '.categorias.salvar',
		'getEditar' => '.categorias.editar',
		'postEditar' => '.categorias.atualizar',
	]);

	Route::controller('produtos', 'ProdutosController',[
		'getIndex' => '.produtos',
		'getCriar' => '.produtos.criar',
		'postSalvar' => '.produtos.salvar',
		'getEditar' => '.produtos.editar',
		'postAtualizar' => '.produtos.atualizar',
		'getExcluir' => '.produtos.excluir',
	]);	

	Route::controller('clientes', 'ClientesController',[
		'getIndex' => '.clientes',
		'getCriar' => '.clientes.criar',
		'postSalvar' => '.clientes.salvar',
		'getEditar' => '.clientes.editar',
		'postEditar' => '.clientes.atualizar',
	]);

	Route::controller('pedidos', 'PedidosController',[
		'getIndex' => '.pedidos',
		'getEditar' => '.pedidos.editar',
		'postEditar' => '.pedidos.atualizar',
	]);
});

