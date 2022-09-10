<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
