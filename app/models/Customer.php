<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
    protected $fillable=['id','Customer_name','Customer_sex','Customer_email','Customer_phone','Customer_address','Network_id','Ctv_id','Manager_id'];
    public $timestamps=true;
}
