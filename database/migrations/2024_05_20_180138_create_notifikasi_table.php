<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('notifikasi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('penerima_id');
            $table->boolean('status_dilihat');
            $table->text('pesan');
            $table->unsignedBigInteger('history_id');
            $table->timestamps();
            $table->foreign('penerima_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('history_id')->references('id')->on('history');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
