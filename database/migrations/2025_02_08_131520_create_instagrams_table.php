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
        Schema::create('instagrams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('subtopik_id'); // Kolom untuk foreign key
            $table->string('judul');
            $table->string('link');
            $table->timestamps();

            // Definisi foreign key
            $table->foreign('subtopik_id')->references('id')->on('sub_topiks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instagrams');
    }
};
