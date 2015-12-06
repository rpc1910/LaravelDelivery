<?php

use Illuminate\Database\Seeder;
use LaravelDelivery\Models\Pedido;
use LaravelDelivery\Models\Produto;
use LaravelDelivery\Models\PedidoProduto;

class OrderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Pedido::class, 10)->create()->each(function($p){
        	for($i=0; $i<=2; $i++) {
        		$p->items()->save(factory(PedidoProduto::class)->make([
					'produto_id' => rand(1,50),
					// 'pedido_id' => '',
					'preco' => '50',
					'quantidade' => '2',
        		]));
        	}
        });
    }
}
