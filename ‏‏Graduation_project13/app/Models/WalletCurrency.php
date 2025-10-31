<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletCurrency extends Model
{
    use HasFactory;

    protected $table = 'wallet_currencies';

    protected $fillable = [
        'wallet_id',
        'currency_id',
        'balance',
        'pending_balance',
    ];


    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }


    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }


    public function walletRequests()
    {
        return $this->hasMany(WalletRequest::class);
    }
}
