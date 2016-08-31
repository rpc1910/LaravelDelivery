<?php

namespace LaravelDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;



class Pedido extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'cliente_id',
        'entregador_id',
        'total',
        'status',
    ];

    public function items() {
        return $this->hasMany(PedidoProduto::class);
    }

    public function comprador() {
        return $this->hasOne(Cliente::class, 'id', 'cliente_id');
    }

    public function entregador() {
        return $this->belongsTo(User::class);
    }

    public function cupoms() {
        return $this->belongsTo(Cupom::class);
    }

}
