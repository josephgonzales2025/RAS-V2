<?php

namespace App\Modules\Customers\Requests;

use App\Domains\Customers\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $customerId = $this->route('customer');
        return [
            'ruc_dni' => ['required', 'string', 'min:8', 'max:11', Rule::unique('customers', 'ruc_dni')->ignore($customerId)],
            'business_name' => 'required|string|max:255',
            // Datos de la dirección
            'address.id' => 'required',
            'address.address' => 'required|string|max:255',
            'address.department' => 'required|string',
            'address.province' => 'required|string',
            'address.district' => 'required|string'
        ];
    }

}
