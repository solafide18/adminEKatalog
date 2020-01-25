<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKompetensiPegawaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kompetensi_pegawais', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('pegawai_id');
            $table->string('pegawai_name')->nullable();
            $table->string('nip')->nullable();
            $table->timestamps();
        });

        Schema::table('kompetensi_pegawais', function (Blueprint $table) {

            $table->unsignedBigInteger('level_kompetensi_id');
            $table->foreign('level_kompetensi_id')->references('id')->on('level_kompetensis')->onDelete('cascade');

            $table->integer('nilai')->nullable();
            $table->integer('gap')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kompetensi_pegawais');
    }
}
