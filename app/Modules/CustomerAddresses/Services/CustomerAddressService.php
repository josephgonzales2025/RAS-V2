<?php

namespace App\Modules\CustomerAddresses\Services;

use App\Modules\CustomerAddresses\Repositories\Interfaces\CustomerAddressRepositoryInterface;
use App\Modules\Customers\DTOs\CustomerDTO;

class CustomerAddressService
{
    protected $customerAddressRepository;

    public function __construct(CustomerAddressRepositoryInterface $customerAddressRepository)
    {
        $this->customerAddressRepository = $customerAddressRepository;
    }

    public function createCustomerAddress(CustomerDTO $customerDTO)
    {
        return $this->customerAddressRepository->create($customerDTO->toArray());
    }

    public function getByIdCustomerAddress($id)
    {
        return $this->customerAddressRepository->findById($id);
    }

    public function updateCustomerAddress(CustomerDTO $customerDTO, $id)
    {
        return $this->customerAddressRepository->update($customerDTO->toArray(), $id);
    }

    public function deleteCustomerAddress($id)
    {
        return $this->customerAddressRepository->delete($id);
    }
}
