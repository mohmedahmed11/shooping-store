<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    function index() {
        if (Category::where('is_deleted', 0)->get()){

            $categories = Category::where('is_deleted', 0)->get();

            foreach ($categories as $key => $category) {

                $newProducts = DB::table('new_products')
                ->where('category_id', $category->id)
                ->where('status', 1)
                ->get()->count();
                $categories[$key]->new_items = $newProducts;
            }

            return $categories;
        }else {
            return [] ;
        }
        //all();
    }
}
