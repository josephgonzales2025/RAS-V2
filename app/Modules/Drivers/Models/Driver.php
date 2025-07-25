<?php

namespace App\Modules\Drivers\Models;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = ['name', 'license'];

    protected $hidden =['created_at', 'updated_at'];
}