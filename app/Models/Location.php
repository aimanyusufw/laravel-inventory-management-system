<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'type',
        'is_active',
        'capacity',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'capacity' => 'decimal:2',
    ];

    // Relasi
    public function inventory(): HasMany
    {
        return $this->hasMany(Inventory::class);
    }

    public function grDetailsPutaway(): HasMany
    {
        return $this->hasMany(GrDetail::class, 'putaway_location_id');
    }

    public function giDetailsPicking(): HasMany
    {
        return $this->hasMany(GiDetail::class, 'picking_location_id');
    }
}
