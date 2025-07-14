<?php

namespace App\Modules\Suppliers\Repositories\Interfaces;

interface SupplierRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function findById($id);

    public function update(array $data, $id);

    public function delete($id);
}
