<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GiDetail extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'issued_qty',
        'notes',
    ];

    // Relasi
    public function goodsIssue(): BelongsTo
    {
        return $this->belongsTo(GoodsIssue::class, 'gi_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function pickingLocation(): BelongsTo
    {
        return $this->belongsTo(Location::class, 'picking_location_id');
    }
}
