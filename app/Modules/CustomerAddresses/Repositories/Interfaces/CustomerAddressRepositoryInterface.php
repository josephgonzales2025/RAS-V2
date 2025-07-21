<?php

namespace App\Modules\CustomerAddresses\Repositories\Interfaces;

use App\Modules\Customers\Models\Customer;

interface CustomerAddressRepositoryInterface
{
    public function create(Customer $customer,array $data);

    public function update(array $data, $id);

    public function findById($id);

    public function delete($id);
}
