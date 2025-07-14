<?php

namespace App\Modules\Suppliers\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['ruc_dni', 'business_name'];

    protected $hidden = ['created_at', 'updated_at'];

}
