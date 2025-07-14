<?php

namespace App\Modules\Suppliers\Exceptions;

use Exception;

class SupplierNotFoundException extends Exception
{
    public function __construct($message = 'Supplier not found')
    {
        parent::__construct($message);
    }

}
