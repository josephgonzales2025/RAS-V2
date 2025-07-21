<?php

namespace App\Modules\Customers\Services;

use App\Modules\CustomerAddresses\DTOs\CustomerAddressDTO;
use App\Modules\CustomerAddresses\Repositories\Interfaces\CustomerAddressRepositoryInterface;
use App\Modules\Customers\DTOs\CustomerDTO;
use App\Modules\Customers\Exceptions\NotFoundCustomerException;
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

    public function createCustomer(array $validatedData)
    {
        $customerDTO = new CustomerDTO([
            'ruc_dni' => $validatedData['ruc_dni'],
            'business_name' => $validatedData['business_name']
        ]);

        $customerAddressDTO = new CustomerAddressDTO([
            'address' => $validatedData['address']['address'],
            'department' => $validatedData['address']['department'],
            'province' => $validatedData['address']['province'],
            'district' => $validatedData['address']['district']
        ]);

        return DB::transaction(function () use ($customerDTO, $customerAddressDTO){
           $customer = $this->customerRepository->create($customerDTO->toArray());

           $this->customerAddressRepository->create($customer, $customerAddressDTO->toArray());

           return $customer->load('customerAddresses');
        });
    }

    public function findCustomerById($id)
    {
        $customer = $this->customerRepository->findById($id);

        if(!$customer)
        {
            throw new NotFoundCustomerException();
        }

        return $customer;
    }

    public function updateCustomer(array $validatedData, $id)
    {
        $customer = $this->findCustomerById($id);
        $customerDTO = new CustomerDTO([
            'ruc_dni' => $validatedData['ruc_dni'],
            'business_name' => $validatedData['business_name']
        ]);

        $customerAddressId = $validatedData['address']['id'];
        $customerAddressDTO = new CustomerAddressDTO([
            'address' => $validatedData['address']['address'],
            'department' => $validatedData['address']['department'],
            'province' => $validatedData['address']['province'],
            'district' => $validatedData['address']['district']
        ]);

        return DB::transaction(function () use ($customer, $customerAddressId, $customerDTO, $customerAddressDTO){
            $this->customerAddressRepository->update($customerAddressDTO->toArray(), $customerAddressId);

            $customer = $this->customerRepository->update($customerDTO->toArray(), $customer->id);

            return $customer->load('customerAddresses');
        });

    }

    public function deleteCustomer($id)
    {
        $this->customerRepository->delete($id);
    }
}
