<?php

namespace App\Modules\Customers\Repositories\Eloquent;

use App\Modules\Customers\Models\Customer;
use App\Modules\Customers\Repositories\Interface\CustomerRepositoryInterface;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function getAll()
    {
        return Customer::all();
    }

    public function create($data)
    {
        return Customer::create($data);
    }

    public function findById($id)
    {
        return Customer::find($id);
    }

    public function update($data, $id)
    {
        $customer = Customer::find($id);
        $customer->update($data);
        return $customer;
    }

    public function delete($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();
        return $customer;
    }
}
