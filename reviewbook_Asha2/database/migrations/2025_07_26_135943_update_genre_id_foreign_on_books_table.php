<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateGenreIdForeignOnBooksTable extends Migration
{
    public function up()
    {
        Schema::table('books', function (Blueprint $table) {
            // Drop FK lama
            $table->dropForeign(['genre_id']);

            // Ubah kolom jadi nullable
            $table->unsignedBigInteger('genre_id')->nullable()->change();

            // Tambah FK baru dengan SET NULL saat genre dihapus
            $table->foreign('genre_id')
                  ->references('id')->on('genres')
                  ->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('books', function (Blueprint $table) {
            // Drop FK SET NULL
            $table->dropForeign(['genre_id']);

            // Balikin jadi NOT NULL
            $table->unsignedBigInteger('genre_id')->nullable(false)->change();

            // Tambahin FK biasa
            $table->foreign('genre_id')->references('id')->on('genres');
        });
    }
}
