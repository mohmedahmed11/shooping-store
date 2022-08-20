<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Banner;

class BannerController extends Controller
{
    //
    function index() {
        if (Banner::where('status', 1)->get()){

            $banners = Banner::where('status', 1)->get();

            foreach ($banners as $key => $banner) {
                if ($banner->has_product == 1) {
                    
                    $product = DB::table('products')
                    ->where('id', $banner->product_id)
                    ->get()->first();
                    if ($product){
                        $banners[$key]->product = $this->prepareProductData($product);
                    } else {
                        $banners[$key]->product = NULL;
                    }
                } else {
                    $banners[$key]->product = NULL;
                }
            }

            return $banners;
        }else {
            return [] ;
        }
    }

    function prepareProductData($product) {
        
        $images = DB::table('images')
        ->where('product_id', $product->id)
        ->get();

        if ($images) {
            $product->images = $images;
        }else {
            $product->images = [];
        }

        $properties = DB::table('product_properties')
        ->join('properties', 'properties.id', '=', 'product_properties.property_id')
        ->where('product_id', $product->id)
        ->get();

        if ($properties) {
            $product->properties = $properties;
        }else {
            $product->properties = [];
        }

        $categories = DB::table('categories')
        ->where('id', $product->category_id)
        ->get()->first();

        $product->category = $categories;
        

        $offer = DB::table('product_offers')
        ->where('product_id', $product->id)
        ->get()->first();
        $product->offer = $offer;


        $newProducts = DB::table('new_products')
        ->where('product_id', $product->id)
        ->where('status', 1)
        ->get()->first();
        $product->is_new = $newProducts ? 1 : 0 ;



        return $product;
    }
}
