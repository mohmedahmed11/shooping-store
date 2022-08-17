<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Regon;

class RegonController extends Controller
{
    //
    function index() {
        if (Regon::where('status', 1)->get()){
            return Regon::where('status', 1)->get();
        }else {
            return [] ;
        }
    }
}
