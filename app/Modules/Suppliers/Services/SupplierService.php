<?php

namespace App\Modules\Suppliers\Services;

use App\Modules\Suppliers\DTOs\SupplierDTO;
use App\Modules\Suppliers\Repositories\Interfaces\SupplierRepositoryInterface;

class SupplierService
{
    private $supplierRepository;

    public function __construct(SupplierRepositoryInterface $supplierRepository)
    {
        $this->supplierRepository = $supplierRepository;
    }

    public function getAllSuppliers()
    {
        return $this->supplierRepository->getAll();
    }

    public function createSupplier(SupplierDTO $supplierDTO)
    {
        return $this->supplierRepository->create($supplierDTO->toArray());
    }

    public function getSupplierById($id)
    {
        return $this->supplierRepository->findById($id);
    }

    public function updateSupplier(SupplierDTO $supplierDTO, $id)
    {
        return $this->supplierRepository->update($supplierDTO->toArray(), $id);
    }

    public function deleteSupplier($id)
    {
        return $this->supplierRepository->delete($id);
    }
}
