<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai_Eigen extends Model
{
    protected $table='nilai_eigen';
    protected $fillable=['nilai'];

    public function kriteria()
    {
    	return $this->belongsTo('App\Datakriteria','id_kriteria');
    }
}
