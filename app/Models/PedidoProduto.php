<?php

namespace LaravelDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class PedidoProduto extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
    	'produto_id',
    	'pedido_id',
    	'preco',
    	'quantidade',
    ];

    public function produto() {
    	return $this->belongsTo(Produto::class);
    }

}
