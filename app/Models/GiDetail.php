<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiDetail extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false;

    protected $fillable = [
        'issued_qty',
        'notes',
    ];

    // Relations
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
