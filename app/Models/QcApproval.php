<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QcApproval extends Model
{
    use HasFactory;
    public $timestamps = false; // Karena hanya punya approved_at

    protected $fillable = [
        'inventory_id', // FK
        'user_id', // FK
        'approved_at',
        'result',
        'notes',
        'qc_batch_number',
    ];

    protected $casts = [
        'approved_at' => 'datetime',
    ];

    // Relasi
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
