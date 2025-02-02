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
        Schema::create('topiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tema_id');
            $table->string('topik');
            $table->timestamps();

            // Definisi Foreign Key
            $table->foreign('tema_id')->references('id')->on('temas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topiks');
    }
};
