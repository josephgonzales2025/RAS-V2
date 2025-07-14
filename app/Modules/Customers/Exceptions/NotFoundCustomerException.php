<?php

namespace App\Modules\Customers\Exceptions;

use Exception;

class NotFoundCustomerException extends Exception
{
    public function __construct($message = "Customer not found")
    {
        parent::__construct($message);
    }

}
