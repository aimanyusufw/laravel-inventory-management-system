<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GrDetail extends Model
{
    use HasFactory;
    public $timestamps = false; // Bagian dari GR, tidak perlu timestamps sendiri

    protected $fillable = [
        'received_qty',
        'lot_number',
        'is_verified',
        'notes',
    ];

    protected $casts = [
        'received_qty' => 'decimal:4',
        'is_verified' => 'boolean',
    ];

    // Relasi
    public function goodsReceipt(): BelongsTo
    {
        return $this->belongsTo(GoodsReceipt::class, 'gr_id');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }

    public function putawayLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'putaway_location_id');
    }
}
