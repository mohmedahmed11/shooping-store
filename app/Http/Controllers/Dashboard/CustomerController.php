<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Str;


class CustomerController extends Controller
{
    public function show()
    {
        $customers = Customer::all();
        return view('dashboard.customers.index', compact('customers'));
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $request_data = $request->except(['password','_token']);
        $request_data['password'] = bcrypt($request->password);

        Customer::create($request_data);
       

        Toastr::success('تم الاضافه بنجاح', 'success');

        return redirect()->route('customers');
    }

    public function edit(Request $request, $id)
    {
        $customer = Customer::find($id);
        return view('dashboard.customers.edit', compact('customer'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        // dd($request->all());
        $request_data = $request->except(['password','_token']);
        $request_data['password'] = bcrypt($request->password);

        $customer = Customer::find($id);
        $customer->update($request_data);

        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('customers');
    }
    public function destroy($id)
    {
        $admin = Customer::find($id);
        $admin->delete();

        Toastr::success('تم الحذف بنجاح', 'success');
        return redirect()->route('customers');
    }
    function index($id) {
        $user = Customer::find($id);
        if ($user) {
            return ["status" => true, "data" => $user];
        } else {
           return ["status" => false, "data" => null, "message" => "no user fund"];

        }
    }


    function updateApi(Request $req) {
        $user = Customer::find($req->id);
        $user->name = $req->name;
        $user->phone = $req->phone;
        $result = $user->save();
        if ($result) {
            return ["status" => true, "data" => $user];
        } else {
            return ["status" => false, "data" => null];
        }
    }

    function login(Request $req) {
        $user = Customer::where('phone','=',$req->phone)->first();

        if ($user) {
            $users = Customer::where('phone',$req->phone)->first();
            if ($users) {
                return ["status" => true, "data" => $users];
            } else {
                return ["status" => false, "data" => null, "message" => "كلمة المرور غير متطابقة"];
            }
        }else {

            $validator = Validator::make($req->all(), [
                "phone"  => "required|size:9",
                "name"    => "required|min:3",
            ]);
            if (!$validator->fails()) {
                $user = new Customer;
                $user->name = $req->name;
                $user->phone = $req->phone;
                $user->password = '';
                $user->save();
                if ($user) {
                    return ["status" => true, "data" => $user];
                } else {
                    return ["status" => false, "data" => null];
                }
            }else {
                return ["status" => false, "data" => null, "message" =>  "يوجد خطاء في البيانات المدخلة"];
            }
            
        }

        
    }


    function delete_account($id) {
        $user = Customer::find($id);
        $user->phone = $user->phone.'_deleted';
        $result = $user->save();
        if ($result) {
            return ["status" => true, "data" => $user];
        } else {
            return ["status" => false, "data" => null];
        }
    }




}

