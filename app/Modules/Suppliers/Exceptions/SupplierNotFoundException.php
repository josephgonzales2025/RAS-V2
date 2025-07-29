<?php

namespace App\Modules\Suppliers\Exceptions;

use App\Exceptions\BaseNotFoundException;

class SupplierNotFoundException extends BaseNotFoundException
{
    public function __construct($message = 'Supplier not found')
    {
        parent::__construct($message);
    }

}
