<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Network extends Model
{
    protected $table='networks';
    protected $fillable=['id','network'];
    public $timestamps=true;
}
