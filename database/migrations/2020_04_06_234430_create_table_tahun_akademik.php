<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTahunAkademik extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_tahun_akademik', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tahun_akademik');
            $table->string('keterangan');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
public function down()
    {
        Schema::dropIfExists('tb_tahun_akademik');
    }
}
