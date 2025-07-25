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
        $driver = $this->driverRepository->getById($id);

        if(!$driver)
        {
            throw new DriverNotFoundException('Driver not found');
        }

        return $driver;
    }

    public function updateDriver(DriverDTO $driverDTO, $id)
    {
        $driver = $this->findDriverById($id);

        return $this->driverRepository->updateDriver($driverDTO->toArray(), $driver);
    }

    public function deleteDriver($id)
    {
        $driver = $this->findDriverById($id);

        $this->driverRepository->deleteDriver($driver);
    }
}