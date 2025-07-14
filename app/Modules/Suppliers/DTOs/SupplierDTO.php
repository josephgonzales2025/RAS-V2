<?php

namespace App\Modules\Suppliers\DTOs;

class SupplierDTO
{
    public $ruc_dni;
    public $business_name;

    public function __construct(array $data)
    {
        $this->ruc_dni = $data['ruc_dni'];
        $this->business_name = $data['business_name'];
    }

    public function toArray()
    {
        return [
            'ruc_dni' => $this->ruc_dni,
            'business_name' => $this->business_name,
        ];
    }
}
