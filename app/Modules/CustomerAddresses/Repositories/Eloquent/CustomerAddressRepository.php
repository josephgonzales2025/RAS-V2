<?php

namespace App\Modules\CustomerAdresses\Repositories\Eloquent;

use App\Modules\CustomerAddresses\Models\CustomerAddress;
use App\Modules\CustomerAddresses\Repositories\Interfaces\CustomerAddressRepositoryInterface;

class CustomerAddressRepository implements CustomerAddressRepositoryInterface
{
    public function create(array $data)
    {
        return CustomerAddress::create($data);
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
