<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMahasiswa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_mahasiswa', function (Blueprint $table) {
            $table->integer('nim')->primary();
            $table->string('nama');
            $table->string('jk');
            $table->string('agama');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->integer('tahun_angkatan_id');
            $table->integer('prodi_id');
            $table->integer('konsentrasi_id');
            $table->string('alamat');
            $table->integer('nik_ayah');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->integer('nik_ibu');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
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
        Schema::dropIfExists('tb_mahasiswa');
    }
}
