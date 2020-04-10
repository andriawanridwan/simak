<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    protected $table = 'tb_krs';
    protected $guarded = [];

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','nim','nim');
    }

    public function jadwal(){
        return $this->belongsTo('App\Jadwal');
    }
}
