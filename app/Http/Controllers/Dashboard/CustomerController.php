<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;

class CustomerController extends Controller
{
    //
    function index($id) {
        $user = Customer::find($id);
        if ($user) {
            return ["status" => true, "data" => $user];
        } else {
           return ["status" => false, "data" => null, "message" => "no user fund"];

        }
    }


    function update(Request $req) {
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
