<?php

namespace App\Modules\Customers\Controllers;

use App\Modules\Customers\DTOs\CustomerDTO;
use App\Modules\Customers\Exceptions\NotFoundCustomerException;
use App\Modules\Customers\Requests\StoreCustomerRequest;
use App\Modules\Customers\Requests\UpdateCustomerRequest;
use App\Modules\Customers\Services\CustomerService;
use App\Http\Controllers\Controller;
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
        $customerDTO = new CustomerDTO($request->validated());
        $customer = $this->customerService->createCustomer($customerDTO);

        return new JsonResponse($customer, 201);
    }

    public function show($id) : JsonResponse
    {
        $customer = $this->customerService->findCustomerById($id);

        if (!$customer) {
            throw new NotFoundCustomerException();
        }

        return new JsonResponse($customer, 200);
    }

    public function update(UpdateCustomerRequest $request, $id) : JsonResponse
    {
        $customer = $this->customerService->findCustomerById($id);

        if (!$customer) {
            return new JsonResponse(['message' => 'Customer not found'], 404);
        }

        $customerDTO = new CustomerDTO($request->validated());
        $updatedCustomer = $this->customerService->updateCustomer($customerDTO, $id);

        return new JsonResponse($updatedCustomer, 200);
    }

    public function destroy($id) : JsonResponse
    {
        $customer = $this->customerService->findCustomerById($id);

        if (!$customer) {
            return new JsonResponse(['message' => 'Customer not found'], 404);
        }

        $this->customerService->deleteCustomer($id);

        return new JsonResponse(['message' => 'Customer deleted successfully'], 200);
    }
}
