<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis_model extends Model
{
    protected $table="jenis_buku";
    protected $primarykey="id_jenis_buku";
    public $timestamps=false;
    protected $fillable = [
        'nama_jenis', 
    ];
}
