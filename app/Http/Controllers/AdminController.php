<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\models\Customer;
use App\models\Network;
use App\Repository\ModelCustomer;
use App\Repository\ModelManage;
use App\Repository\ModelNetwork;
use App\Repository\ModelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;


class AdminController extends Controller
{
    private $user;
    private $network;
    private $customer;
    private $manage;

    public function __construct(ModelUser $user, ModelNetwork $network, ModelCustomer $customer, ModelManage $manage)
    {
        $this->user = $user;
        $this->network = $network;
        $this->customer = $customer;
        $this->manage=$manage;
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password), false)) {
            return redirect()->route('index');
        } else {
            return back()->with(['errorLogin' => 'Email hoặc Password không đúng!']);
        }
    }

    public function logout()
    {
        if (Auth::check()) {
            Auth::logout();
            return redirect()->route('login');
        } else {
            return redirect()->route('login');
        }
    }

    public function customer(Request $request)
    {
        if (Auth::user()->roles == 0) {

            $data['customer'] = $this->customer->getCustomer(15, $request->network, $request->search);
        } else {
            $data['customer'] = $this->customer->getCustomer(15, $request->network, $request->search, Auth::user()->id);
        }
        $data['network'] = $this->network->getAll();
        return view('modules.customer', $data);
    }

    public function createCustomer(Request $request)
    {
        $message = [
            'Customer_name.required' => 'Tên  không được bỏ trống!',
            'Customer_email.required' => 'Email không đươc bỏ trống!',
            'Customer_email.email' => 'Email sai cú pháp!',
            'Customer_phone.required' => 'Số điện thoại không được để trống!',
            'Customer_phone.min' => 'Số điện thoại không hợp lệ',
            'Customer_phone.max' => 'Số điện thoại không hợp lệ',
            'Customer_address.required' => 'Địa chỉ không được bỏ trống!',
            'Customer_sex.required' => 'Bạn chưa chọn giới tính!',
        ];
        $validator = Validator::make($request->all(), [
            'Customer_name' => 'required',
            'Customer_email' => 'required|email|unique:customers',
            'Customer_phone' => 'required|min:10|max:11',
            'Customer_address' => 'required',
            'Customer_sex' => 'required'
        ], $message);
        if ($validator->fails()) {
            return Response()->json($validator->errors()->all());
        }
        try {
            $data=$request->all();

            if(Auth::user()->roles==1)
                $data['Manager_id']=Auth::user()->id;
            $this->customer->create($data);
            $this->user->update(Auth::user()->id, ['bonus' => Auth::user()->bonus + 1]);
            return 'ok';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'error';
        }
    }

    public function register(RegisterRequest $request)
    {
        try {
            $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
                'address' => $request->address,
                'sex' => $request->sex,
                'roles' => 2
            ]);
            return redirect()->route('login')->with(['email' => $request->email, 'password' => 'password']);

        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()->back();
        }
    }

    public function getCustomer(Request $request)
    {
        return $this->customer->find($request->id);
    }

    public function editCustomer(Request $request)
    {
//        return $request->all();
        $message = [
            'Customer_name.required' => 'Tên  không được bỏ trống!',
            'Customer_email.required' => 'Email không đươc bỏ trống!',
            'Customer_email.email' => 'Email sai cú pháp!',
            'Customer_phone.required' => 'Số điện thoại không được để trống!',
            'Customer_phone.min' => 'Số điện thoại không hợp lệ',
            'Customer_phone.max' => 'Số điện thoại không hợp lệ',
            'Customer_address.required' => 'Địa chỉ không được bỏ trống!',
            'Customer_sex.required' => 'Bạn chưa chọn giới tính!',
        ];
        $validator = Validator::make($request->all(), [
            'Customer_name' => 'required',
            'Customer_email' => 'required|email',
            'Customer_phone' => 'required|min:10|max:11',
            'Customer_address' => 'required',
            'Customer_sex' => 'required'
        ], $message);
        if ($validator->fails()) {
            return Response()->json($validator->errors()->all());
        }
        try {

            $this->customer->update(intval($request->Customer_id), [
                'Customer_name' => $request->Customer_name,
                'Customer_phone' => $request->Customer_phone,
                'Customer_address' => $request->Customer_address,
                'Customer_email' => $request->Customer_email,
                'Customer_sex' => $request->Customer_sex,
                'Network_id' => $request->Network_id
            ]);
            return 'ok';

        } catch (\Illuminate\Database\QueryException $e) {
            return 'error';
        }
    }

    public function deleteCustomer(Request $request)
    {
        try {
            $this->customer->delete($request->id);
            return 'ok';

        } catch (\Illuminate\Database\QueryException $e) {
            return 'error';
        }
    }

    public function deleteMultipleCustomer(Request $request)
    {
        try {
            $this->customer->deleteMultipleId($request->id);
            return 'ok';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'error';
        }
    }

    public function employee(Request $request)
    {

        $data['employee'] = $this->user->getEmployee(15,$request->search);
        $data['customers']=$this->customer->getRandomCustomer(10);
        return view('modules.employee', $data);
    }

    public function createEmployee(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required|min:10|max:11',
            'address' => 'required',
            'sex' => 'required',
            'password' => 'required|min:6|regex:/^[a-zA-Z0-9!$#%]+$/|confirmed',
            'password_confirmation' => 'required'
        ]);
        if ($validator->fails()) {
            return Response()->json($validator->errors()->all());
        }
        try {

            $this->user->create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'address' => $request->address,
                'sex' => $request->sex,
                'roles' => 1
            ]);
            return 'ok';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'error';
        }
    }

    public function getEmployee(Request $request)
    {
        return $this->user->find($request->id);
    }

    public function editEmployee(Request $request)
    {
        if ($request->password) {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|min:10|max:11',
                'address' => 'required',
                'sex' => 'required',
                'password' => 'required|min:6|regex:/^[a-zA-Z0-9!$#%]+$/',
            ]);
            if ($validator->fails()) {
                return Response()->json($validator->errors()->all());
            }
            try {

                $this->user->update($request->id, [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'password' => bcrypt($request->password),
                    'address' => $request->address,
                    'sex' => $request->sex,
                ]);
                return 'ok';
            } catch (\Illuminate\Database\QueryException $e) {
                return 'error';
            }
        } else {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'phone' => 'required|min:10|max:11',
                'address' => 'required',
                'sex' => 'required',
            ]);
            if ($validator->fails()) {
                return Response()->json($validator->errors()->all());
            }
            try {

                $this->user->update($request->id, [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'sex' => $request->sex,
                ]);
                return 'ok';
            } catch (\Illuminate\Database\QueryException $e) {
                return 'error';
            }
        }
    }

    public function deleteEmployee(Request $request)
    {
        try {
            $this->customer->destroyManager($request->id);
            $this->user->delete($request->id);

            return 'ok';
        } catch (\Illuminate\Database\QueryException $e) {
            return 'error';
        }
    }
    public function addManage(Request $request)
    {

        if(is_array($request->id)){
           $this->customer->setManager($request->employee_id,$request->id);
                   return 'ok';
        }else{
            return 'error';
        }
    }
    public function listCustomer(Request $request)
    {
        $data['customers']=$this->customer->getCustomersByEmployeeId(Auth::user()->id,$request->search);
        return view('modules.listcustomer',$data);
    }
    public function sendMail(Request $request)
    {
        Mail::to($request->email)->send(new sendMail());
        return 'ok';
    }
}
