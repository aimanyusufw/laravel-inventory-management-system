<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WorkOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'wo_number',
        'qty_to_produce',
        'date_scheduled',
        'status',
        'priority',
        'completed_at',
    ];

    protected $casts = [
        'date_scheduled' => 'date',
        'completed_at' => 'datetime',
    ];

    // Relasi
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function materialRequests(): HasMany
    {
        return $this->hasMany(MaterialRequest::class);
    }
}
