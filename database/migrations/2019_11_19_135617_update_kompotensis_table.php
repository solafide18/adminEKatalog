<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKompotensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kompetensis', function (Blueprint $table) {
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')
            ->on('kategori_kompetensis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kompotensis', function (Blueprint $table) {
            //
        });
    }
}
