<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    //
    function index() {
        if (Banner::where('status', 1)->get()){
            return  Banner::where('status', 1)->get();
        }else {
            return [] ;
        }
    }
}
