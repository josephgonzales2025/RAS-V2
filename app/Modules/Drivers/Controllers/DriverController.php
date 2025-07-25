<?php

namespace App\Modules\Drivers\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Drivers\DTOs\DriverDTO;
use App\Modules\Drivers\Requests\StoreDriverRequest;
use App\Modules\Drivers\Requests\UpdateDriverRequest;
use App\Modules\Drivers\Services\DriverService;
use Illuminate\Http\JsonResponse;

class DriverController extends Controller
{
    protected $driverService;

    public function __construct(DriverService $driverService)
    {
        $this->driverService = $driverService;
    }

    public function index() : JsonResponse
    {
        $drivers = $this->driverService->getAllDrivers();

        if (!$drivers)
        {
            return new JsonResponse(['message' => 'No drivers found'], 404);
        }

        return new JsonResponse($drivers, 200);
    }

    public function store(StoreDriverRequest $request) : JsonResponse
    {
        $driverDTO = new DriverDTO($request->validated());

        $driver = $this->driverService->createDriver($driverDTO);

        return new JsonResponse($driver, 201);
    }

    public function show($id) : JsonResponse
    {
        $driver = $this->driverService->findDriverById($id);

        return new JsonResponse($driver, 200);
    }

    public function update(UpdateDriverRequest $request, $id) : JsonResponse
    {
        $driverDTO = new DriverDTO($request->validated());
        $driver = $this->driverService->updateDriver($driverDTO, $id);

        return new JsonResponse($driver, 200);
    }

    public function destroy($id) : JsonResponse
    {
        $this->driverService->deleteDriver($id);

        return new JsonResponse(['message' => 'Driver deleted successfully']);
    }
}