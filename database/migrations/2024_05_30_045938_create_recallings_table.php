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
        Schema::create('recallings', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->bigInteger('siswa_id');
            $table->string('indikator');
            $table->string('keterangan');
            $table->string('notifikasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recallings');
    }
};
