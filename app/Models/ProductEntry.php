<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductEntry extends Model
{
    protected $fillable = [
        'merchandise_entries_id',
        'product_name',
        'quantity',
        'type',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function merchandiseEntry() : BelongsTo
    {
        return $this->belongsTo(MerchandiseEntry::class, 'merchandise_entries_id');
    }
}
