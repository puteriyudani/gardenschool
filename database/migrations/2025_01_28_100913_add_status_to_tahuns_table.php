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
        Schema::table('tahuns', function (Blueprint $table) {
            $table->string('status')->default('active')->after('tahun'); // Tambahkan kolom status setelah kolom tahun
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tahuns', function (Blueprint $table) {
            $table->dropColumn('status'); // Hapus kolom status jika migration di-rollback
        });
    }
};
