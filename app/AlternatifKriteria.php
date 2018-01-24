<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlternatifKriteria extends Model
{
    protected $table = 'alternatif_kriteria';
    protected $fillable =['al_k1','al_k2','al_k3','al_k4'];

    public function alterkriteria()
    {
    	return $this->belongsTo('App\Alternatif','id_alternatif');
    }
}
