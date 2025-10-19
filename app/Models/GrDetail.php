<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class GrDetail extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false; // Because part of Goods Receipt

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

    // Relations
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
