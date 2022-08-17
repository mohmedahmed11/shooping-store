<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    //
    function index($product_id) {
        $product = DB::table('products')
        ->select('products.*')
        ->where('products.id', $product_id)
        ->get();

        if ($product){
            $product = $this->prepareProductData($product);
            
            return ["status" => true, "data" => $product];
        }else {
            return ["status" => false, "data" => NULL];
        }
    }

    function productsList($category_id) {
        $products = DB::table('products')
        ->select('products.*')
        ->where('products.category_id', $category_id)
        ->get();

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [];
        }
    }

    function bestSeller() {
        $products = DB::table('best_seller_products')
        ->join('products', 'products.id', '=', 'best_seller_products.product_id')
        ->select('products.*')
        ->where('best_seller_products.status', 1)
        ->get();

        

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [] ;
        }
    }

    function latest() {
        $products = DB::table('latest_products')
        ->join('products', 'products.id', '=', 'latest_products.product_id')
        ->select('products.*')
        ->where('latest_products.status', 1)
        ->get();

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [] ;
        }
    }

    function similarProducts($id) {
        $products = DB::table('similar_products')
        ->join('products', 'products.id', '=', 'similar_products.similar_product_id')
        ->select('products.*')
        ->where('similar_products.product_id', $id)
        ->get();

        if ($products){
            foreach ($products as $key => $product) {
                $products[$key] = $this->prepareProductData($product);
            }
            return $products;
        }else {
            return [];
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
        ->get()->first();
        $product->is_new = $newProducts ? 1 : 0 ;



        return $product;
    }
}
