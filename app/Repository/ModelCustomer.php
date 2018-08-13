<?php
/**
 * Created by PhpStorm.
 * User: MAP
 * Date: 8/9/2018
 * Time: 12:29 AM
 */

namespace App\Repository;


use App\models\Customer;

class ModelCustomer extends AbtractClass
{
    public function getModel()
    {
        return $customer = new Customer();
    }
    public function getCustomer(int $row=15,$network=null,$search=null,$id=null)
    {
          $data= $this->model->join('networks','customers.Network_id','=','networks.id')
                ->select(['customers.id','Customer_name','Customer_address','Customer_phone','Customer_sex','Network','Customer_email']);
            $url='?';
            if($id!=null){
                $data=$data->where('Ctv_id',$id);
            }
          if($network!=null){
              $data=$data->where('Network_id',$network);

              $url.='network='.$network.'&';
          }
          if($search!=null){
              $data=$data->where('Customer_name','like','%'.$search.'%')->orWhere('Customer_phone',$search)->orWhere('Customer_address','like','%'.$search.'%');
                $url.='search='.$search.'&';
          }
          if($url!='?')
            $data= $data->paginate($row)->withPath(substr($url,0,strlen($url)-1));
          else
              $data= $data->paginate($row);
          return $data;
    }
    public function deleteMultipleId(array $data)
    {
        return $this->model->whereIn('id',$data)->delete();
    }
    public function getRandomCustomer(int $limit=10,array $id=[])
    {
        return $this->model->where('Manager_id',0)->inRandomOrder()->limit($limit)->get();
    }
    public function setManager(int $id,array $data)
    {
        return $this->model->whereIn('id',$data)->update(['Manager_id'=>$id]);
    }
    public function destroyManager(int $id)
    {
        return $this->model->where('Manager_id',$id)->update(['Manager_id'=>0]);
    }
    public function getCustomersByEmployeeId(int $id,$search=null,$row=15)
    {
        $result=$this->model->where('Manager_id',$id);
        $check=true;
        if($search!=null){
            $result=$result->orWhere('Customer_name','like','%'.$search.'%');
            $check=false;
        }
        $result=$result->paginate($row);
        if(!$check){
            $result=$result->withPath('?search='.$search);
        }
        return $result;
    }
}