<?php

use App\Constants\Aktivitas;
use App\Constants\DetailAktivitas;
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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('surat_id');
            $table->enum('aktivitas', array_keys(Aktivitas::allAktivitas()));
            $table->text('komentar')->nullable(true);
            $table->enum('detail_aktivitas', array_keys(DetailAktivitas::allDetailAktivitas()));
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('surat_id')->references('id')->on('surat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {


        Schema::dropIfExists('history');
    }
};
