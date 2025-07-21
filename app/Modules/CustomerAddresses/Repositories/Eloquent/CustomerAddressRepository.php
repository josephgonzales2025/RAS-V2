<?php

namespace App\Modules\CustomerAddresses\Repositories\Eloquent;

use App\Modules\CustomerAddresses\Models\CustomerAddress;
use App\Modules\CustomerAddresses\Repositories\Interfaces\CustomerAddressRepositoryInterface;
use App\Modules\Customers\Models\Customer;

class CustomerAddressRepository implements CustomerAddressRepositoryInterface
{
    public function create(Customer $customer,array $data)
    {
        return $customer->customerAddresses()->create([
            'address' => $data['address'],
            'department' => $data['department'],
            'province' => $data['province'],
            'district' => $data['district']
        ]);
    }

    public function update(array $data, $id)
    {
        $customerAddress = CustomerAddress::find($id);
        return $customerAddress->update($data);
    }

    public function findById($id)
    {
        return CustomerAddress::find($id);
    }

    public function delete($id)
    {
        $customerAddress = CustomerAddress::find($id);
        return $customerAddress->delete();
    }
}
