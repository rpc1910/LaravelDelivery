<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(LaravelDelivery\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(LaravelDelivery\Models\Categoria::class, function(Faker\Generator $faker) {
	return [
		'nome' => $faker->word
	];
});

$factory->define(LaravelDelivery\Models\Produto::class, function(Faker\Generator $faker) {
	return [
		'nome' => $faker->word,
		'descricao' => $faker->sentence(),
		'preco' => $faker->numberBetween(10,50)
	];
});

$factory->define(LaravelDelivery\Models\Cliente::class, function(Faker\Generator $faker) {
	return [
		'telefone' => $faker->phoneNumber,
		'endereco' => $faker->address,
		'cidade' => $faker->city,
		'estado' => $faker->state,
		'cep' => $faker->postcode,
	];
});

$factory->define(LaravelDelivery\Models\Pedido::class, function(Faker\Generator $faker) {
	return [
		'cliente_id' => rand(1,10),
		// 'entregador_id' => 0,
		'total' => rand(50,100),
		'status' => 0
	];
});

$factory->define(LaravelDelivery\Models\PedidoProduto::class, function(Faker\Generator $faker) {
	return [
		
	];
});

$factory->define(LaravelDelivery\Models\Cupom::class, function(Faker\Generator $faker) {
	return [
		'codigo' => rand(100,1000),
		'valor' => rand(50,100)
	];
});