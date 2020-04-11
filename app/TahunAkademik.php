<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    protected $table = 'tb_tahun_akademik';
    protected $fillable = ['tahun_akademik','keterangan','status'];
    protected $guarded = [];
}
