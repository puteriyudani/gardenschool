<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->integer('kalori')->nullable(); // Sesuaikan tipe datanya
        });

        // Salin data dari kolom lama ke kolom baru
        DB::statement('UPDATE menus SET kalori = vitmineral');

        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('vitmineral');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->integer('vitmineral')->nullable();
        });

        // Kembalikan data ke kolom lama
        DB::statement('UPDATE menus SET vitmineral = kalori');

        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('kalori');
        });
    }
};
