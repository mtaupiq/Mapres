<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilaireal extends Model
{
    protected $table='nilai_real';
    protected $fillable=['nilai_k1','nilai_k2','nilai_k3','nilai_k4'];

    public function nilaireal()
    {
    	return $this->belongsTo('App\Alternatif','id_alternatif');
    }
}
