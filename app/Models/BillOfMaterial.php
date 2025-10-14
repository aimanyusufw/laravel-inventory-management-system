<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BillOfMaterial extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
        'required_qty',
        'notes',
        'is_optional',
    ];

    protected $casts = [
        'required_qty' => 'decimal:4',
        'is_optional' => 'boolean',
    ];

    // Relasi
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class);
    }
}
