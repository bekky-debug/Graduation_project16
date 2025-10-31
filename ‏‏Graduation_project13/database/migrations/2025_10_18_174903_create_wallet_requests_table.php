<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateWalletRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('wallet_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('wallet_currency_id')->constrained('wallet_currencies')->onDelete('cascade');
            $table->decimal('amount', 30, 8);
            $table->enum('status', ['pending','approved','rejected'])->default('pending');
            $table->foreignId('approved_by')->nullable()->constrained('users')->nullOnDelete();
            $table->text('admin_note')->nullable();
            $table->string('reference')->nullable();
            $table->string('receipt_path')->nullable(); // optional uploaded receipt
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('wallet_requests');
    }
}
