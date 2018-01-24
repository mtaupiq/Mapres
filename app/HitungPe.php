<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HitungPe extends Model
{
    protected $table='hitung_p';
    protected $fillable=['nilai_k1','nilai_k2','nilai_k3','nilai_k4'];

    public function hitungpe()
    {
    	return $this->belongsTo('App\Alternatif','id_alternatif');
    }
}
