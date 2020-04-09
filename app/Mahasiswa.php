<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'tb_mahasiswa';
    protected $primaryKey = 'nim';
    protected $guarded = [];
    
    public function prodi(){
        return $this->belongsTo('App\Prodi');
    }

    public function konsentrasi(){
        return $this->belongsTo('App\Konsentrasi');
    }

    public function tahun_angkatan(){
        return $this->belongsTo('App\TahunAngkatan');
    }
}
