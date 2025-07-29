<?php

namespace App\Exceptions;

use App\Contracts\RenderableException;
use Exception;

abstract class BaseNotFoundException extends Exception implements RenderableException
{
    public function getStatusCode(): int
    {
        return 404;
    }

    public function getErrorResponse(): array
    {
        return ['message' => $this->getMessage()];
    }
}
