<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelKompetensisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_kompetensis', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->integer('level')->unique();
            $table->string('level_description');
            $table->timestamps();

        });

        Schema::table('level_kompetensis', function (Blueprint $table) {
            $table->unsignedBigInteger('kompetensi_id');
            $table->foreign('kompetensi_id')->references('id')
            ->on('kompetensis')
            ->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('level_kompetensis');
    }
}