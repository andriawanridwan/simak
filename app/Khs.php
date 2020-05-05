<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Khs extends Model
{
    protected $table= 'tb_khs';
    protected $guarded = [];

    public function krs(){
        return $this->belongsTo('App\Krs');
    }

    public function mahasiswa(){
        return $this->belongsTo('App\Mahasiswa','nim','nim');
    }
}
