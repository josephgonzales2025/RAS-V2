<?php

namespace App\Domains\CustomerAddresses\Models;

use App\Modules\Customers\Models\Customer;
use Illuminate\Database\Eloquent\Model;

class CustomerAddress extends Model
{
    protected $fillable = [
        'customer_id',
        'address',
        'deparment',
        'province',
        'district',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
