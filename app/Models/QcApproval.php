<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class QcApproval extends Model
{
    use HasFactory, SoftDeletes;
    public $timestamps = false; // Disable timestamps if not needed

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

    // Relations
    public function inventory(): BelongsTo
    {
        return $this->belongsTo(Inventory::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
