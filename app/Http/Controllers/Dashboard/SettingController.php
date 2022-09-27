<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;

class SettingController extends Controller
{
    //
    function index() {
        $about = DB::table('settings')
        ->get()->first();
        if ($about) {
            return ["status" => true, "data" => $about];
        } else {
            return ["status" => false, "data" => null];
        }
    }

    function token(Request $req) {
        $user = Customer::find($req->user_id);
        $user->device_token = $req->token;
        $result = $user->save();
        if ($result) {
            return ["status" => true, "data" => $user];
        } else {
            return ["status" => false, "data" => null];
        }
    }
}
