<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    // ✳️ اسم الجدول (اختياري إذا الاسم مختلف عن plural)
    protected $table = 'wallets';

    // ✳️ الحقول القابلة للتعبئة
    protected $fillable = [
        'user_id',
        'id',
    ];

    // ✳️ العلاقة مع المستخدم (1:1)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function currencies()
    {
        return $this->belongsToMany(Currency::class, 'currency_wallet')
            ->withPivot('balance')
            ->withTimestamps();
    }


    // ✳️ علاقة العمليات (إذا أردت ربط العمليات بالمحفظة مستقبلاً)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
