<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExchangeRate extends Model
{
    use HasFactory;
    protected $table = 'exchanges';


    protected $fillable = [
        'id',
        'from_currency',
        'to_currency',
        'amount',
        'rate',
        'converted_amount',
    ];

    public function fromCurrency()
    {
        return $this->belongsTo(Currency::class, 'from_currency');
    }

    public function toCurrency()
    {
        return $this->belongsTo(Currency::class, 'to_currency');
    }
}
