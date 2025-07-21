<?php

namespace App\Modules\Customers\Services;

use App\Modules\CustomerAddresses\Repositories\Interfaces\CustomerAddressRepositoryInterface;
use App\Modules\Customers\DTOs\CustomerDTO;
use App\Modules\Customers\Repositories\Interface\CustomerRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CustomerService
{
    protected $customerRepository, $customerAddressRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository, CustomerAddressRepositoryInterface $customerAddressRepository)
    {
        $this->customerRepository = $customerRepository;
        $this->customerAddressRepository = $customerAddressRepository;
    }

    public function getAllCustomers()
    {
        $customers = $this->customerRepository->getAll();
        return $customers->load('customerAddresses');
    }

    public function createCustomer(array $customerDTO, array $customerAddressDTO)
    {
        return DB::transaction(function () use ($customerDTO, $customerAddressDTO){
           $customer = $this->customerRepository->create([
            'ruc_dni' => $customerDTO['ruc_dni'],
            'business_name' => $customerDTO['business_name']
           ]);

           $this->customerAddressRepository->create($customer, $customerAddressDTO);

           return $customer->load('customerAddresses');
        });
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
