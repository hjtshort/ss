<?php
/**
 * Created by PhpStorm.
 * User: MAP
 * Date: 8/9/2018
 * Time: 9:50 PM
 */

namespace App\Repository;


use App\models\Manage;

class ModelManage extends AbtractClass
{
    public function getModel()
    {
        return $manage= new Manage();
    }
    public function getIdCustomer()
    {
        $data=[];
        $result=$this->model->select('Customer_id')->get();
        if(count($result)>0){
            foreach ($result as $k=>$v){
                $data[]=$v->Customer_id;
            }
        }
        return $data;
    }
}