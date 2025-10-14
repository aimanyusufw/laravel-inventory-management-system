<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Unit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    // Relasi
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function items(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
