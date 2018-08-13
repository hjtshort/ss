<?php
/**
 * Created by PhpStorm.
 * User: MAP
 * Date: 8/9/2018
 * Time: 12:29 AM
 */

namespace App\Repository;


use App\models\Customer;
use Illuminate\Support\Facades\DB;

class ModelCustomer extends AbtractClass
{
    public function getModel()
    {
        return $customer = new Customer();
    }

    public function getCustomer(int $row = 15, $network = null, $search = null, $id = null)
    {
        $data = $this->model->join('networks', 'customers.Network_id', '=', 'networks.id')
            ->select(['customers.id', 'Customer_name', 'Customer_address', 'Customer_phone', 'Customer_sex', 'Network', 'Customer_email', 'Manager_id']);
        $url = '?';
        if ($id != null) {
            $data = $data->where('Ctv_id', $id);
        }
        if ($network != null) {
            $data = $data->where('Network_id', $network);

            $url .= 'network=' . $network . '&';
        }
        if ($search != null) {
            $data = $data->where('Customer_name', 'like', '%' . $search . '%')->orWhere('Customer_phone', $search)->orWhere('Customer_address', 'like', '%' . $search . '%');
            $url .= 'search=' . $search . '&';
        }
        if ($url != '?')
            $data = $data->paginate($row)->withPath(substr($url, 0, strlen($url) - 1));
        else
            $data = $data->paginate($row);
        return $data;
    }

    public function deleteMultipleId(array $data)
    {
        return $this->model->whereIn('id', $data)->delete();
    }

    public function getRandomCustomer(int $limit = 10, array $id = [])
    {
        return $this->model->where('Manager_id', 0)->inRandomOrder()->limit($limit)->get();
    }

    public function setManager(int $id, array $data)
    {
        return $this->model->whereIn('id', $data)->update(['Manager_id' => $id]);
    }

    public function destroyManager(int $id)
    {
        return $this->model->where('Manager_id', $id)->update(['Manager_id' => 0]);
    }

    public function getCustomersByEmployeeId(int $id, $search = null, $row = 15)
    {
        $result = $this->model->where('Manager_id', $id);
        $check = true;
        if ($search != null) {
            $result = $result->Where('Customer_name', 'like', '%' . $search . '%')->orWhere('Customer_phone',$search)
            ->orWhere('Customer_address','like','%'.$search.'%');
            $check = false;
        }
        $result = $result->paginate($row);
        if (!$check) {
            $result = $result->withPath('?search=' . $search);
        }
        return $result;
    }

    public function countCustomerInDay()
    {
        return $this->model->where('created_at', 'like', '%' . date('Y-m-d') . '%')->get()->count();
    }

    public function countCustomersNotManage()
    {
        return $this->model->where('Manager_id',0)->count();
    }
    public function topTenManager()
    {
        return $this->model->join('users','customers.Manager_id','=','users.id')
            ->select('Manager_id',DB::raw("count(*) as countCustomer"),'name')
            ->groupBy('Manager_id','name')->orderBy(DB::raw("count(*)"),'desc')->limit(10)->get();
    }
    public function topTenNetwork()
    {
        return $this->model->join('networks','customers.Network_id','=','networks.id')
            ->select('Network_id',DB::raw("count(*) as countNetwork"),'Network')
            ->groupBy('Network_id','Network')->orderBy(DB::raw("count(*)"),'desc')->get();
    }

}