<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterGapConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('gap_configs', function (Blueprint $table) {
            $table->dropForeign('gap_configs_kompetensi_id_foreign');
            $table->dropColumn('kompetensi_id');
            $table->unsignedBigInteger('level_kompetensi_id');
            $table->foreign('level_kompetensi_id')->references('id')->on('level_kompetensis')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
