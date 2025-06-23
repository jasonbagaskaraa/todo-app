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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // kolom id
            $table->string('judul'); // kolom judul task
            $table->text('deskripsi'); // kolom deskripsi task
            $table->enum('status', ['pending', 'in_progress', 'selesai'])->default('pending'); // kolom status task
            $table->timestamps(); // kolom created_at dan updated
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
