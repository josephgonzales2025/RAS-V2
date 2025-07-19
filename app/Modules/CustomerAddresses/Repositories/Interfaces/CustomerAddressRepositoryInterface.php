<?php

namespace App\Modules\CustomerAddresses\Repositories\Interfaces;

interface CustomerAddressRepositoryInterface
{
    public function create(array $data);

    public function update(array $data, $id);

    public function findById($id);

    public function delete($id);
}
