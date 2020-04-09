<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Registrasi extends Model
{
    protected $table = 'tb_registrasi';
    protected $guarded = [];

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','nim','nim');
    }

    public function tahun_akademik(){
        return $this->belongsTo('App\TahunAkademik');
    }

}
