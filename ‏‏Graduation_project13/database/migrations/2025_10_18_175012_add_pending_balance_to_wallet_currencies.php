<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddPendingBalanceToWalletCurrencies extends Migration
{
    public function up()
    {
        Schema::table('wallet_currencies', function (Blueprint $table) {
            if (!Schema::hasColumn('wallet_currencies','pending_balance')){
                $table->decimal('pending_balance', 30, 8)->default(0);
            }
            if (!Schema::hasColumn('wallet_currencies','address')){
                $table->string('address')->nullable();
            }
        });
    }


    public function down()
    {
        Schema::table('wallet_currencies', function (Blueprint $table) {
            $table->dropColumn(['pending_balance','address']);
        });
    }
}
