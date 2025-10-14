<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaterialRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'requested_qty',
        'picked_qty',
        'status',
        'picked_at',
    ];

    protected $casts = [
        'requested_qty' => 'decimal:4',
        'picked_qty' => 'decimal:4',
        'picked_at' => 'datetime',
    ];

    // Relasi
    public function workOrder(): BelongsTo
    {
        return $this->belongsTo(WorkOrder::class, 'wo_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function pickedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'picked_by_user_id');
    }
}
