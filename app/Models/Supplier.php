<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = ['ruc_dni', 'business_name'];

    protected $hidden = ['created_at', 'updated_at'];

    public function merchandiseEntries() : HasMany
    {
        return $this->hasMany(MerchandiseEntry::class);
    }
}
