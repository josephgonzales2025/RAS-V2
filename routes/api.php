<?php

use App\Modules\Customers\Controllers\CustomerController;
use App\Modules\Drivers\Controllers\DriverController;
use App\Modules\Suppliers\Controllers\SupplierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('suppliers', SupplierController::class);

Route::apiResource('customers', CustomerController::class);

Route::apiResource('drivers', DriverController::class);
