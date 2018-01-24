<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table='hasil';
    protected $fillable=['hasil_pedoman','hasil_ahp'];

    public function hasil()
    {
    	return $this->belongsTo('App\Alternatif','id_alternatif');
    }
}
