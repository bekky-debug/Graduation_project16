<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class AddRelatedRequestToTransactions extends Migration
{
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            if (!Schema::hasColumn('transactions','related_request_id')) {
                $table->foreignId('related_request_id')->nullable()->constrained('wallet_requests')->nullOnDelete();
            }
        });
    }


    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropColumn('related_request_id');
        });
    }
}
