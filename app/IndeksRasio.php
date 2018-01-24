<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IndeksRasio extends Model
{
    protected $table='indeks_rasio';
    protected $fillable=['n', 'nilai'];
}
