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
        Schema::table('lunchs', function (Blueprint $table) {
            $table->dropColumn('menu_id'); // Hapus kolom menu_id
            $table->string('menu'); // Tambahkan kolom menu dengan tipe string
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lunchs', function (Blueprint $table) {
            $table->dropColumn('menu'); // Hapus kolom menu jika rollback
            $table->bigInteger('menu_id'); // Tambahkan kembali kolom menu_id dengan tipe bigInteger
        });
    }
};
