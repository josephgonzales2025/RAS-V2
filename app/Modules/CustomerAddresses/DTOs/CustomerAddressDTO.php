<?php

namespace App\Modules\CustomerAddresses\DTOs;

class CustomerAddressDTO
{
    public $customer_id;
    public $address;
    public $department;
    public $province;
    public $district;

    public function __construct(array $data)
    {
        $this->customer_id = $data['customer_id'];
        $this->address = $data['address'];
        $this->department = $data['department'];
        $this->province = $data['province'];
        $this->district = $data['district'];
    }

    public function toArray()
    {
        return [
            'customer_id' => $this->customer_id,
            'address' => $this->address,
            'department' => $this->department,
            'province' => $this->province,
            'district' => $this->district,
        ];
    }
}
