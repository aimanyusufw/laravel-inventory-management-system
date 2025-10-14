<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventory extends Model
{
    use HasFactory;

    // Non-fillable karena harus diproses saat GR/Picking
    protected $guarded = [
        'id',
        'item_id',
        'location_id',
        'received_at' // Diisi saat penerimaan
    ];

    protected $casts = [
        'quantity' => 'decimal:4',
        'reserved_qty' => 'decimal:4',
        'received_at' => 'datetime',
        'last_counted_at' => 'datetime',
    ];

    // Relasi
    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function location(): BelongsTo
    {
        return $this->belongsTo(Location::class);
    }

    public function qcApprovals(): HasMany
    {
        return $this->hasMany(QcApproval::class);
    }
}
