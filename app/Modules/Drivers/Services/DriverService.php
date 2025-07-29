<?php

namespace App\Modules\Drivers\Services;

use App\Modules\Drivers\DTOs\DriverDTO;
use App\Modules\Drivers\Exceptions\DriverNotFoundException;
use App\Modules\Drivers\Models\Driver;
use App\Modules\Drivers\Repositories\Interfaces\DriverRepositoryInterface;

class DriverService
{
    protected $driverRepository;

    public function __construct(DriverRepositoryInterface $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }

    public function getAllDrivers()
    {
        return $this->driverRepository->getAll();
    }

    public function createDriver(DriverDTO $driverDTO)
    {
        return $this->driverRepository->createDriver($driverDTO->toArray());
    }

    public function findDriverById($id)
    {
        return $this->driverRepository->getById($id);
    }

    public function updateDriver(DriverDTO $driverDTO, $id)
    {
        return $this->driverRepository->updateDriver($driverDTO->toArray(), $id);
    }

    public function deleteDriver($id)
    {
        $this->driverRepository->deleteDriver($id);
    }
}