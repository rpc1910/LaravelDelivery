<?php

namespace LaravelDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LaravelDelivery\Repositories\PedidoProdutoRepository;
use LaravelDelivery\Models\PedidoProduto;

/**
 * Class PedidoProdutoRepositoryEloquent
 * @package namespace LaravelDelivery\Repositories;
 */
class PedidoProdutoRepositoryEloquent extends BaseRepository implements PedidoProdutoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return PedidoProduto::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
