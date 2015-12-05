<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(LaravelDelivery\Models\Categoria::class, 10)->create()->each(function($a){
        	for($i=0; $i<=5; $i++) {
        		$a->produtos()->save(factory(LaravelDelivery\Models\Produto::class)->make());
        	}
        });
    }
}
