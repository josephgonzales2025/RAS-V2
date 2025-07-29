<?php

namespace App\Modules\Drivers\Repositories\Eloquent;

use App\Modules\Drivers\Exceptions\DriverNotFoundException;
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
        $driver = Driver::find($id);

        if(!$driver)
        {
            throw new DriverNotFoundException('Driver not found');
        }
        
        return $driver;
    }

    public function updateDriver(array $data, $id)
    {
        $driver = $this->getById($id);
        $driver->update($data);
        return $driver->fresh();
    }

    public function deleteDriver($id)
    {
        $driver = $this->getById($id);
        $driver->delete();
    }
}