<?php

namespace App\Modules\CustomerAddresses\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomerAddressRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_id' => 'required|exists:customers,id',
            'address' => 'required|string|max:255',
            'deparment' => 'required|string',
            'province' => 'required|string',
            'district' => 'required|string'
        ];
    }
}
