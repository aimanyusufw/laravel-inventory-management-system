<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'part_number',
        'name',
        'is_injection_part',
        'is_raw_material',
        'safety_stock',
        'notes',
    ];

    protected $casts = [
        'is_injection_part' => 'boolean',
        'is_raw_material' => 'boolean',
        'safety_stock' => 'decimal:4',
    ];

    // Relastions
    public function unit(): BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    public function grDetails(): HasMany
    {
        return $this->hasMany(GrDetail::class);
    }

    public function billOfMaterials(): HasMany
    {
        return $this->hasMany(BillOfMaterial::class);
    }

    public function materialRequests(): HasMany
    {
        return $this->hasMany(MaterialRequest::class);
    }
}
