<?php

namespace App\Modules\Dispatches\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Dispatch extends Model
{
    protected $fillable = [
        'dispatch_date',
        'driver_name',
        'driver_license',
        'transport_company_ruc',
        'transport_company_name',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    /* public function merchandiseEntries() : HasMany
    {
        return $this->hasMany(MerchandiseEntry::class);
    } */
}