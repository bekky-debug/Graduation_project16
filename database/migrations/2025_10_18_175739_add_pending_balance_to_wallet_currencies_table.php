<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('wallet_currencies', function (Blueprint $table) {
            if (!Schema::hasColumn('wallet_currencies', 'pending_balance')) {
                $table->decimal('pending_balance', 20, 8)->default(0)->after('balance');
            }
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wallet_currencies', function (Blueprint $table) {
            $table->dropColumn('pending_balance');
        });
    }
};
