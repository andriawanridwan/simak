<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableKhs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_khs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nim');
            $table->integer('krs_id');
            $table->integer('kehadiran')->nullable();
            $table->integer('tugas')->nullable();
            $table->integer('mutu')->nullable();
            $table->string('grade')->nullable();
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
        Schema::dropIfExists('tb_khs');
    }
}
