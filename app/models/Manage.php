<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Manage extends Model
{
    protected $table='manages';
    protected $fillable=['Employee_id','Customer_id','sendmail'];
    public $timestamps=true;
}
