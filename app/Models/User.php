<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login' => 'datetime',
        'is_active' => 'boolean',
    ];

    // Relasi
    public function goodsReceipts(): HasMany
    {
        return $this->hasMany(GoodsReceipt::class);
    }

    public function qcApprovals(): HasMany
    {
        return $this->hasMany(QcApproval::class);
    }

    public function materialRequests(): HasMany
    {
        return $this->hasMany(MaterialRequest::class, 'picked_by_user_id');
    }

    public function goodsIssues(): HasMany
    {
        return $this->hasMany(GoodsIssue::class);
    }
}
