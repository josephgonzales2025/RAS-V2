<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MerchandiseEntry extends Model
{
    protected $fillable = [
        'reception_date',
        'guide_number',
        'supplier_id',
        'customer_id',
        'address',
        'weight',
        'freight',
        'description',
        'status',
        'dispatch_id',
    ];

    protected $hidden = ['created_at', 'updated_at'];

    public function supplier() : BelongsTo
    {
        return $this->belongsTo(Supplier::class);
    }

    public function customer() : BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function dispatch() : BelongsTo
    {
        return $this->belongsTo(Dispatch::class);
    }

    public function productEntries() :HasMany
    {
        return $this->hasMany(ProductEntry::class, 'merchandise_entries_id');
    }
}
