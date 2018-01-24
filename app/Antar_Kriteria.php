<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Antar_Kriteria extends Model
{
    protected $table='antar_kriteria';
    protected $fillable=['bobot','total_pembanding','normalisasi'];

    public function alternatif()
    {
    	return $this->hasMany('App\Alternatif', 'id_kpertama');
    }

    public function datakriteria()
    {
    	return $this->belongsTo('App\Datakriteria','id_kpertama');
    }

    public function datakriteriadua()
    {
    	return $this->belongsTo('App\Datakriteria','id_kkedua');
    }
}
