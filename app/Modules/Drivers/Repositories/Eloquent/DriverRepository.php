<?php

namespace App\Modules\Drivers\Repositories\Eloquent;

use App\Modules\Drivers\Models\Driver;
use App\Modules\Drivers\Repositories\Interfaces\DriverRepositoryInterface;

class DriverRepository implements DriverRepositoryInterface
{
    public function getAll()
    {
        return Driver::all();
    }

    public function createDriver(array $data)
    {
        return Driver::create($data);
    }

    public function getById($id)
    {
        return Driver::find($id);
    }

    public function updateDriver(array $data, Driver $driver)
    {
        $driver->update($data);
        return $driver->fresh();
    }

    public function deleteDriver(Driver $driver)
    {
        $driver->delete();
    }
}