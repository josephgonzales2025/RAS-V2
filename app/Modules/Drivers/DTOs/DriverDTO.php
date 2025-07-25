<?php

namespace App\Modules\Drivers\DTOs;

class DriverDTO
{
    public $name;
    public $license;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
        $this->license = $data['license'];
    }

    public function toArray()
    {
        return [
            'name' => $this->name,
            'license' => $this->license
        ];
    }
}