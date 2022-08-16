<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function index() {
        if (Category::where('is_deleted', 0)->get()){
            return Category::where('is_deleted', 0)->get();
        }else {
            return [] ;
        }
        //all();
    }
}
