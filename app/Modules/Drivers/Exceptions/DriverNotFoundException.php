<?php

namespace App\Modules\Drivers\Exceptions;

use App\Exceptions\BaseNotFoundException;

class DriverNotFoundException extends BaseNotFoundException
{
    public function __construct($message = 'Driver not found')
    {
        parent::__construct($message);
    }
}