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
        Schema::create('youtubes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pdf_id'); // Kolom untuk foreign key
            $table->string('judul');
            $table->string('keterangan');
            $table->string('link');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('pdf_id')->references('id')->on('pdfs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('youtubes');
    }
};
