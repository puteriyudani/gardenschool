<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubtopikIdToPdfsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pdfs', function (Blueprint $table) {
            $table->unsignedBigInteger('subtopik_id')->nullable(); // Menambahkan kolom subtopik_id

            // Menambahkan foreign key yang merujuk ke tabel subtopiks
            $table->foreign('subtopik_id')->references('id')->on('sub_topiks')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pdfs', function (Blueprint $table) {
            $table->dropForeign(['subtopik_id']); // Menghapus foreign key
            $table->dropColumn('subtopik_id'); // Menghapus kolom subtopik_id
        });
    }
}
