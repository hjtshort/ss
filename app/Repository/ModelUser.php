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
    public function getEmployee(int $row=15,$search=null)
    {
        $data=$this->model->where('roles',1);
        $check=true;
        if($search!=null){
            $data=$data->where('name','like','%'.$search.'%')->orWhere('phone',$search);
            $check=false;
        }
        $data=$data->paginate($row);
        if($check){
            return $data;
        }else{
            return $data->withPath('?search='.$search);
        }
    }
    public function getFullEmployees()
    {
        return $this->model->where('roles',1)->get();
    }
    public function countCollaborators()
    {
        return $this->model->where('roles',2)->count();
    }
    public function countEmployee()
    {
        return $this->model->where('roles',1)->count();
    }
    public function topBonus()
    {
        return $this->model->where('roles',2)->where('bonus','>',0)->orderBy('bonus','desc')->limit(10)->get();
    }
    public function getCollaborators(int $row=15,$search=null)
    {
        $data=$this->model->where('roles',2);
        $check=true;
        if($search!=null){
            $data=$data->where('name','like','%'.$search.'%')->orWhere('phone',$search);
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