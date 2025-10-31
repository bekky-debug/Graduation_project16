<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class WalletRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','wallet_currency_id','amount','status','reference','receipt_path','admin_note','approved_by'
    ];


    public function user(){ return $this->belongsTo(User::class); }
    public function walletCurrency(){ return $this->belongsTo(WalletCurrency::class); }
    public function approver(){ return $this->belongsTo(User::class,'approved_by'); }
}
