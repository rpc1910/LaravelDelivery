<?php

namespace LaravelDelivery\Http\Requests;

use LaravelDelivery\Http\Requests\Request;

class AdminPedidoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'status' => 'required',
            'entregador_id' => 'required'
        ];
    }
}
