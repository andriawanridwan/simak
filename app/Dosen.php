<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $table = 'tb_dosen';
    protected $primaryKey = 'nip';
    protected $guarded = [];
    protected $fillable = ['nip','nama','no_telp','email','prodi'];

    public function prodi(){
        return $this->belongsTo('App\Prodi');
    }
}
