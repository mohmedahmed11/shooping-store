<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class UserController extends Controller
{
    //
    function index($id) {
        $user = User::find($id);
        if ($user) {
            return ["status" => true, "data" => $user];
        } else {
           return ["status" => false, "data" => null, "message" => "no user fund"];
<<<<<<< HEAD:app/Http/Controllers/Dashboard/UserController.php
        }
    }


    function update(Request $req) {
        $user = User::find($req->id);
        $user->name = $req->name;
        $user->password = $req->password;
        $result = $user->save();
        if ($result) {
            return ["status" => true, "data" => $user];
        } else {
            return ["status" => false, "data" => null];

=======
>>>>>>> c00423c9393d6f88643c21f3af616728cbe315ca:app/Http/Controllers/UserController.php
        }
    }

    function login(Request $req) {
        $user = User::where('phone','=',$req->phone)->first();

        if ($user) {
            $users = User::where('phone',$req->phone)->where('password', $req->password)->first();
            if ($users) {
                return ["status" => true, "data" => $users];
            } else {
                return ["status" => false, "data" => null, "message" => "كلمة المرور غير متطابقة"];
            }
        }else {

            $validator = Validator::make($req->all(), [
                "phone"  => "required|size:9",
                "password"    => "required|min:6",
            ]);
            if (!$validator->fails()) {
                $user = new User;
                // $user->name = $req->name;
                $user->phone = $req->phone;
                $user->password = $req->password;
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

 
}
