<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Datakriteria extends Model
{
    protected $table='data_kriteria';
    protected $fillable=['nama_kriteria'];

    public function dataantarkriteria()
    {
    	return $this->hasMany('App\Dataantarkriteria', 'id_kpertama');
    }

    public function kriteriaalternatif()
    {
    	return $this->hasMany('App\Kriteria_Alternatif','id_kriteria');
    }

    public function kriteria()
    {
        return $this->hasOne('App\Nilai_Eigen','id_kriteria');
    }
}
