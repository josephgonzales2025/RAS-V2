<?php

namespace App\Modules\Customers\Models;

use App\Domains\CustomerAddresses\Models\CustomerAddress;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['ruc_dni', 'business_name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function customerAddresses()
    {
        return $this->hasMany(CustomerAddress::class);
    }
}
