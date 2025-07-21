<?php

namespace App\Modules\CustomerAddresses\DTOs;

class CustomerAddressDTO
{
    public $address;
    public $department;
    public $province;
    public $district;

    public function __construct(array $data)
    {
        $this->address = $data['address'];
        $this->department = $data['department'];
        $this->province = $data['province'];
        $this->district = $data['district'];
    }

    public function toArray()
    {
        return [
            'address' => $this->address,
            'department' => $this->department,
            'province' => $this->province,
            'district' => $this->district,
        ];
    }
}
