<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transaction_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // agar log ikut terhapus jika user dihapus
            $table->string('user_name')->nullable(); // arsip nama user
            $table->unsignedBigInteger('transaction_id'); // hanya menyimpan ID transaksi
            $table->string('admin_name')->nullable(); // nama admin yang melakukan aksi
            $table->string('action'); // create, update, delete
            $table->json('before_data')->nullable();
            $table->json('after_data')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('transaction_logs');
    }
};
