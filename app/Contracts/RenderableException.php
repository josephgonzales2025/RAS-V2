<?php

namespace App\Contracts;

interface RenderableException
{
    public function getStatusCode(): int;
    public function getErrorResponse(): array;
}