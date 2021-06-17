<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToInputAspirasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('input_aspirasis', function (Blueprint $table) {
            $table->foreign("nik")->on("penduduks")->references("nik")
            ->onUpdate("cascade")->onDelete("cascade");

            $table->foreign("id_kategori")->on("kategoris")->references("id_kategori")
            ->onUpdate("cascade")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('input_aspirasis', function (Blueprint $table) {
            //
        });
    }
}
