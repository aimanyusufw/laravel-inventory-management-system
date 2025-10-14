<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GoodsIssue extends Model
{
    use HasFactory;

    protected $fillable = [
        'gi_number',
        'issue_date',
        'status',
        'carrier_name',
        'tracking_number',
    ];

    protected $casts = [
        'issue_date' => 'date',
    ];

    // Relasi
    public function salesOrder(): BelongsTo
    {
        return $this->belongsTo(SalesOrder::class, 'so_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(GiDetail::class, 'gi_id');
    }
}
