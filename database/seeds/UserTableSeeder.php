<?php

use Illuminate\Database\Seeder;
use LaravelDelivery\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class)->create([
            'name' => 'Usuário',
            'email' => 'usuario@rodrigop.com.br',
            'password' => bcrypt('usuario'),
            'remember_token' => str_random(10),
        ])->cliente()->save(factory(LaravelDelivery\Models\Cliente::class)->make());

        factory(User::class)->create([
            'name' => 'Admin',
            'email' => 'admin@rodrigop.com.br',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'remember_token' => str_random(10),
        ])->cliente()->save(factory(LaravelDelivery\Models\Cliente::class)->make());

        factory(User::class, 5)->create([
            'role' => 'entregador'
        ]);

        factory(User::class, 10)->create()->each(function($u){
        	$u->cliente()->save(factory(LaravelDelivery\Models\Cliente::class)->make());
        });
    }
}
