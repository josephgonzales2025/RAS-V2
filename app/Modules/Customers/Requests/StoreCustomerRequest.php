<?php

namespace App\Modules\Customers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ruc_dni' => 'required|string|min:8|max:11|unique:customers,ruc_dni',
            'business_name' => 'required|string|max:255',
            // Datos de la dirección
            'address.address' => 'required|string|max:255',
            'address.department' => 'required|string',
            'address.province' => 'required|string',
            'address.district' => 'required|string'
        ];
    }
}
