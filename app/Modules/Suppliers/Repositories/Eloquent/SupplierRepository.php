<?php

namespace App\Modules\Suppliers\Repositories\Eloquent;

use App\Modules\Suppliers\Exceptions\SupplierNotFoundException;
use App\Modules\Suppliers\Models\Supplier;
use App\Modules\Suppliers\Repositories\Interfaces\SupplierRepositoryInterface;

class SupplierRepository implements SupplierRepositoryInterface
{

    public function getAll()
    {
        return Supplier::all();
    }


    public function findById($id)
    {
        $supplier = Supplier::find($id);

        if (!$supplier) {
            throw new SupplierNotFoundException();
        }

        return $supplier;
    }

    public function create(array $data)
    {
        return Supplier::create($data);
    }

    public function update(array $data, $id)
    {
        $supplier = $this->findById($id);
        $supplier->update($data);

        return $supplier;
    }

    public function delete($id)
    {
        $supplier = $this->findById($id);
        return $supplier->delete();
    }
}
