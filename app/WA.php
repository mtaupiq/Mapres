<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WA extends Model
{
    protected $table = 'wa';
    protected $fillable = ['nilai_k1','nilai_k2','nilai_k3','nilai_k4'];

    public function wa()
    {
        return $this->belongsTo('App\Alternatif','id_alternatif');
    }
}
