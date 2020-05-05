<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    protected $table = 'tb_matkul';
    protected $primaryKey = 'kode_matkul';
    public $incrementing = false;
    protected $guarded = [];

}
