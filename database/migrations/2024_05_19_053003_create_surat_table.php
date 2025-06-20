<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Constants\Status;
use App\Constants\TipeSurat;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surat', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat', 100);
            $table->enum('tipe_surat', array_keys(TipeSurat::allTipeSurat()));
            $table->text('judul');
            $table->text('dari');
            $table->text('perihal');
            $table->text('kepada');
            $table->enum('status', array_keys(Status::allStatus()));
            $table->string('nama_file', 150);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::dropIfExists('surat');
    }
};
