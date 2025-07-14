<?php

namespace App\Modules\Customers\Repositories\Interface;

interface CustomerRepositoryInterface
{
    public function getAll();

    public function create(array $data);

    public function findById($id);

    public function update(array $data, $id);

    public function delete($id);
}
