<?php

namespace App\Modules\Customers\Services;

use App\Modules\Customers\DTOs\CustomerDTO;
use App\Modules\Customers\Repositories\Interface\CustomerRepositoryInterface;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAllCustomers()
    {
        return $this->customerRepository->getAll();
    }

    public function createCustomer(CustomerDTO $customerDTO)
    {
        return $this->customerRepository->create($customerDTO->toArray());
    }

    public function findCustomerById($id)
    {
        return $this->customerRepository->findById($id);
    }

    public function updateCustomer(CustomerDTO $customerDTO, $id)
    {
        return $this->customerRepository->update($customerDTO->toArray(), $id);
    }

    public function deleteCustomer($id)
    {
        return $this->customerRepository->delete($id);
    }
}
