<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    protected $table='alternatif';
    protected $fillable=[
        'nama_alternatif',
        'jk',
        'tempat_lahir',
        'fakultas',
        'jurusan',
        'semester',
        'penghasilan_ortu',
        'ipk',
        'video',
        'dokpres',
        'prestasi'
    ];

    protected $dates = ['tanggal_lahir'];

    public function nilaireal()
    {
        return $this->hasOne('App\Nilaireal','id_alternatif');
    }

    public function wa()
    {
    	return $this->hasOne('App\WA','id_alternatif');
    }

    public function hitungpe()
    {
    	return $this->hasOne('App\HitungPe','id_alternatif');
    }

    public function hasil()
    {
    	return $this->hasOne('App\Hasil','id_alternatif');
    }

    public function alterkriteria()
    {
    	return $this->hasOne('App\AlternatifKriteria','id_alternatif');
    }
}
