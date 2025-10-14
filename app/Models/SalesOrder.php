<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SalesOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'so_number',
        'customer_name',
        'date',
        'status',
        'shipping_address',
        'due_date',
    ];

    protected $casts = [
        'date' => 'date',
        'due_date' => 'date',
    ];

    // Relasi
    public function goodsIssues(): HasMany
    {
        return $this->hasMany(GoodsIssue::class, 'so_id');
    }
}
