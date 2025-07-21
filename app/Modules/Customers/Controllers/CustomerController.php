<?php

namespace App\Modules\Customers\Controllers;

use App\Modules\Customers\DTOs\CustomerDTO;
use App\Modules\Customers\Requests\StoreCustomerRequest;
use App\Modules\Customers\Requests\UpdateCustomerRequest;
use App\Modules\Customers\Services\CustomerService;
use App\Http\Controllers\Controller;
use App\Modules\CustomerAddresses\DTOs\CustomerAddressDTO;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index() : JsonResponse
    {
        $customers = $this->customerService->getAllCustomers();

        if ($customers->isEmpty()) {
            return new JsonResponse(['message' => 'No customers found'], 404);
        }

        return new JsonResponse($customers, 200);
    }

    public function store(StoreCustomerRequest $request) : JsonResponse
    {
        $validatedData = $request->validated();

        $customer = $this->customerService->createCustomer($validatedData);

        return new JsonResponse($customer, 201);
    }

    public function show($id) : JsonResponse
    {
        $customer = $this->customerService->findCustomerById($id);

        return new JsonResponse($customer, 200);
    }

    public function update(UpdateCustomerRequest $request, $id) : JsonResponse
    {
        $validatedData = $request->validated();

        $updatedCustomer = $this->customerService->updateCustomer($validatedData, $id);

        return new JsonResponse($updatedCustomer, 200);
    }

    public function destroy($id) : JsonResponse
    {
        $this->customerService->deleteCustomer($id);

        return new JsonResponse(['message' => 'Customer deleted successfully'], 200);
    }
}
