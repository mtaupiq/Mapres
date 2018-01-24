<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Analisa extends Model
{
    protected $table='analisa';
    protected $fillable=['ci','ri','cr'];
}
