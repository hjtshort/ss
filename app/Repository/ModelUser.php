<?php
/**
 * Created by PhpStorm.
 * User: MAP
 * Date: 8/9/2018
 * Time: 12:01 AM
 */

namespace App\Repository;


use App\models\User;

class ModelUser extends AbtractClass
{
    /**
     * @return mixed
     */
    public function getModel()
    {
        return $user = new User();
    }
    public function getCustomer(int $id,int $row=0)
    {
        return $this->model->find($id)->Customer()->paginate($row);
    }
    public function getEmployee(int $row=15,$search=null){
        $data=$this->model->where('roles',1);
        $check=true;
        if($search!=null){
            $data=$data->where('name','like','%'.$search.'%');
            $check=false;
        }
        $data=$data->paginate($row);
        if($check){
            return $data;
        }else{
            return $data->withPath('?search='.$search);
        }
    }
}