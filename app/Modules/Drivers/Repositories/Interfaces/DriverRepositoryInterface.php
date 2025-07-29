<?php

namespace App\Modules\Drivers\Repositories\Interfaces;

use App\Modules\Drivers\Models\Driver;

interface DriverRepositoryInterface
{
    public function getAll();

    public function createDriver(array $data);

    public function getById($id);

    public function updateDriver(array $data, $id);

    public function deleteDriver($id);
}