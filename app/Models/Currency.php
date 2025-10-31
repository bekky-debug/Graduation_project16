<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'symbol',
        'logo_url',
    ];

    public function wallets()
    {
        return $this->belongsToMany(Wallet::class, 'currency_wallet')
            ->withPivot('balance')
            ->withTimestamps();
    }


    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function fromRates()
    {
        return $this->hasMany(ExchangeRate::class, 'from_currency');
    }

    public function toRates()
    {
        return $this->hasMany(ExchangeRate::class, 'to_currency');
    }
}
