<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class SalesOrder extends Model
{
    use HasFactory, SoftDeletes;

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

    // Relations
    public function goodsIssues(): HasMany
    {
        return $this->hasMany(GoodsIssue::class, 'so_id');
    }
}
