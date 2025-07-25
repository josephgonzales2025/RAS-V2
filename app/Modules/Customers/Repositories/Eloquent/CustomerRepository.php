<?php

namespace App\Modules\Customers\Repositories\Eloquent;

use App\Modules\Customers\Exceptions\NotFoundCustomerException;
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

    public function update($data, Customer $customer)
    {
        $customer->update($data);
        return $customer;
    }

    public function delete($id)
    {
        $customer = $this->findById($id);

        if(!$customer)
        {
            throw new NotFoundCustomerException();
        }
        
        $customer->delete();
    }
}
