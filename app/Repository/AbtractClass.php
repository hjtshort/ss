<?php
/**
 * Created by PhpStorm.
 * User: MAP
 * Date: 8/8/2018
 * Time: 11:50 PM
 */

namespace App\Repository;


abstract class AbtractClass implements RepositoryInterface
{
    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function getModel();

    public function setModel()
    {
        $this->model = $this->getModel();
    }

    public function all($row = 15)
    {
       return $this->model->paginate($row);
    }
    public function find(int $id)
    {
        return $this->model->find($id);
    }
    public function create(array $data)
    {
        if($this->model->create($data)){
            return true;
        }else{
            return false;
        }
    }
    public function update(int $id, array $data)
    {
       $value=$this->find($id);
       if($data){
           $value->update($data);
           return true;
       }else{
           return false;
       }
    }
    public function delete(int $id)
    {
        if($this->find($id)->delete()){
            return true;
        }else{
            return false;
        }
    }
}