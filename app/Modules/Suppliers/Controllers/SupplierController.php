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
                'message' => 'No suppliers found'
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

        if (!$supplier) {
            throw new SupplierNotFoundException();
        }

        return new JsonResponse($supplier, 200);
    }

    public function update(UpdateSupplierRequest $request, $id) : JsonResponse
    {
        $supplier = $this->supplierService->getSupplierById($id);

        if (!$supplier) {
            throw new SupplierNotFoundException();
        }

        $supplierDTO = new SupplierDTO($request->validated());
        $updatedSupplier = $this->supplierService->updateSupplier($supplierDTO, $id);

        return new JsonResponse($updatedSupplier, 200);
    }

    public function delete($id): JsonResponse
    {
        $supplier = $this->supplierService->getSupplierById($id);

        if (!$supplier) {
            throw new SupplierNotFoundException();
        }

        $supplier->delete();

        return new JsonResponse(['message' => 'Supplier deleted successfully'], 200);
    }

}
