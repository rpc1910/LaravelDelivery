<?php

namespace LaravelDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cliente extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'usuario_id',
        'telefone',
        'endereco',
        'cidade',
        'estado',
        'cep',
    ];

    public function usuario() {
        return $this->hasOne(User::class);
    }

}
