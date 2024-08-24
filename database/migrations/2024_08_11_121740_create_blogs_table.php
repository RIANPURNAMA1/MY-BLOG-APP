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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('image')->nullable();  // Image bisa nullable jika tidak wajib
            $table->string('title');
            $table->enum('category', ['general', 'entertainment', 'health', 'science', 'sports', 'technology']);
            $table->text('description');  // Relasi dengan tabel categories
            $table->date('tanggal');  // Menggunakan tipe data date untuk tanggal
            $table->timestamps();  // Otomatis menambahkan created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
