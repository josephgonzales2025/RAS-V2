<?php

namespace App\Modules\Suppliers\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Suppliers\DTOs\SupplierDTO;
use App\Modules\Suppliers\Exceptions\SupplierNotFoundException;
use App\Modules\Suppliers\Requests\StoreSupplierRequest;
use App\Modules\Suppliers\Requests\UpdateSupplierRequest;
use App\Modules\Suppliers\Services\SupplierService;
use Illuminate\Http\JsonResponse;

class SupplierController extends Controller
{
    private $supplierService;

    public function __construct(SupplierService $supplierService)
    {
        $this->supplierService = $supplierService;
    }

    public function index() : JsonResponse
    {
        $suppliers = $this->supplierService->getAllSuppliers();

        if ($suppliers->isEmpty()){
            return new JsonResponse([
                'message' => 'There are no registered suppliers'
            ], 404);
        }

        return new JsonResponse($suppliers, 200);
    }

    public function store(StoreSupplierRequest $request) : JsonResponse
    {
        $supplierDTO = new SupplierDTO($request->validated());
        $supplier = $this->supplierService->createSupplier($supplierDTO);

        return new JsonResponse($supplier, 201);
    }

    public function show($id): JsonResponse
    {
        $supplier = $this->supplierService->getSupplierById($id);

        return new JsonResponse($supplier, 200);
    }

    public function update(UpdateSupplierRequest $request, $id) : JsonResponse
    {
        $supplierDTO = new SupplierDTO($request->validated());
        $updatedSupplier = $this->supplierService->updateSupplier($supplierDTO, $id);

        return new JsonResponse($updatedSupplier, 200);
    }

    public function destroy($id): JsonResponse
    {
        $this->supplierService->deleteSupplier($id);

        return new JsonResponse(['message' => 'Supplier deleted successfully'], 200);
    }

}
