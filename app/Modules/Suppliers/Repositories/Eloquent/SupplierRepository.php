<?php

namespace App\Modules\Suppliers\Repositories\Eloquent;

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
        return Supplier::find($id);
    }

    public function create(array $data)
    {
        return Supplier::create($data);
    }

    public function update(array $data, $id)
    {
        $supplier = Supplier::find($id);
        return $supplier->update($data);
    }

    public function delete($id)
    {
        $supplier = Supplier::find($id);
        return $supplier->delete();
    }
}
