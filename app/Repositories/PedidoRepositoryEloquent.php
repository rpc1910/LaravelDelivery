<?php

namespace LaravelDelivery\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use LaravelDelivery\Repositories\PedidoRepository;
use LaravelDelivery\Models\Pedido;

/**
 * Class PedidoRepositoryEloquent
 * @package namespace LaravelDelivery\Repositories;
 */
class PedidoRepositoryEloquent extends BaseRepository implements PedidoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pedido::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
