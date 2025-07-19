<?php

namespace App\Modules\CustomerAddresses\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomerAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'address' => 'sometimes|string|max:255',
            'deparment' => 'sometimes|string',
            'province' => 'sometimes|string',
            'district' => 'sometimes|string'
        ];
    }
}
