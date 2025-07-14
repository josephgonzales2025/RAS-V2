<?php

namespace App\Modules\Suppliers\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateSupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $supplierId = $this->route('supplier');
        return [
            'ruc_dni' => ['required', 'string', 'min:8', 'max:11', Rule::unique('suppliers', 'ruc_dni')->ignore($supplierId)],
            'business_name' => 'sometimes|string|max:255'
        ];
    }
}
