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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->json('dokumen'); // Menyimpan dokumen dalam format JSON
            $table->decimal('total_harga', 10, 2);
            $table->string('status')->default('pending'); // pending, paid, expired
            $table->string('payment_link')->nullable();
            $table->string('download_token')->nullable();
            $table->timestamp('url_kadaluarsa')->nullable();
            $table->string('invoice_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
