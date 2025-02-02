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
        Schema::create('sub_topiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('topik_id');
            $table->string('subtopik');
            $table->timestamps();

            // Definisi Foreign Key
            $table->foreign('topik_id')->references('id')->on('topiks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_topiks');
    }
};
