<?php

namespace LaravelDelivery\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'LaravelDelivery\Repositories\CategoriaRepository',
            'LaravelDelivery\Repositories\CategoriaRepositoryEloquent'
        );

        $this->app->bind(
            'LaravelDelivery\Repositories\ClienteRepository',
            'LaravelDelivery\Repositories\ClienteRepositoryEloquent'
        );

        $this->app->bind(
            'LaravelDelivery\Repositories\PedidoProdutoRepository',
            'LaravelDelivery\Repositories\PedidoProdutoRepositoryEloquent'
        );

        $this->app->bind(
            'LaravelDelivery\Repositories\PedidoRepository',
            'LaravelDelivery\Repositories\PedidoRepositoryEloquent'
        );

        $this->app->bind(
            'LaravelDelivery\Repositories\ProdutoRepository',
            'LaravelDelivery\Repositories\ProdutoRepositoryEloquent'
        );

        $this->app->bind(
            'LaravelDelivery\Repositories\UserRepository',
            'LaravelDelivery\Repositories\UserRepositoryEloquent'
        );

        $this->app->bind(
            'LaravelDelivery\Repositories\CupomRepository',
            'LaravelDelivery\Repositories\CupomRepositoryEloquent'
        );
    }
}
