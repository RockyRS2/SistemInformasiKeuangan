<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // relasi ke users
        $table->enum('type', ['income', 'expense']); // jenis transaksi
        $table->decimal('amount', 15, 2); // jumlah uang
        $table->text('description')->nullable(); // keterangan transaksi
        $table->date('transaction_date'); // tanggal transaksi
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
