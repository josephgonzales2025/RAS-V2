<?php

namespace App\Providers;

use App\Modules\CustomerAddresses\Repositories\Interfaces\CustomerAddressRepositoryInterface;
use App\Modules\CustomerAddresses\Repositories\Eloquent\CustomerAddressRepository;
use App\Modules\Customers\Repositories\Eloquent\CustomerRepository;
use App\Modules\Customers\Repositories\Interface\CustomerRepositoryInterface;
use App\Modules\Suppliers\Repositories\Eloquent\SupplierRepository;
use App\Modules\Suppliers\Repositories\Interfaces\SupplierRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CustomerAddressRepositoryInterface::class, CustomerAddressRepository::class);
        $this->app->bind(SupplierRepositoryInterface::class, SupplierRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
