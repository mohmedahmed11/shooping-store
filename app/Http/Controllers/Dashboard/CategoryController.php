<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    function index() {
        if (Category::where('is_deleted', 0)->get()){
            $categories = Category::where('is_deleted', 0)->get();

            foreach ($categories as $key => $category) { 
                $newProducts = DB::table('new_products')
                ->where('category_id', $category->id)
                ->get()
                ->count();
                if ($newProducts > 0) {
                    $category->new_items = $newProducts;
                    $categories[$key] = $category;
                }else {
                    $category->new_items = 0;
                    $categories[$key] = $category;
                }
            }

            return $categories;
        }else {
            return [] ;
        }
        //all();
    }
}
