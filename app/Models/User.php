<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // ✳️ الحقول القابلة للتعبئة
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'phone'
    ];

    // ✳️ الحقول المخفية عند الإرجاع كـ JSON
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // ✳️ التحويلات التلقائية للأنواع
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ✳️ علاقة المستخدم مع المحفظة (1:1)
    public function wallet()
    {
        return $this->hasOne(Wallet::class);
    }


    // ✳️ علاقة المستخدم مع العمليات (1:N)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function walletRequests()
    {
        return $this->hasMany(WalletRequest::class);
    }

    public function wallets()
    {
        return $this->hasMany(WalletCurrency::class, 'user_id');
    }





}

