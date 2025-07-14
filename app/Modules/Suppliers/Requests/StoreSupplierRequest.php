<?php

namespace App\Modules\Suppliers\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ruc_dni' => 'required|string|min:8|max:11|unique:suppliers,ruc_dni',
            'business_name' => 'required|string|max:255'
        ];
    }
}