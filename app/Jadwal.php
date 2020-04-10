<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $table = 'tb_jadwal';
    protected $guarded = [];

    public function prodi(){
        return $this->belongsTo('App\Prodi');
    }

    public function konsentrasi(){
        return $this->belongsTo('App\Konsentrasi');
    }

    public function matkul(){
        return $this->belongsTo('App\Matkul','matkul_id','kode_matkul');
    }

    public function dosen(){
        return $this->belongsTo('App\Dosen','dosen_id','nip');
    }
}
