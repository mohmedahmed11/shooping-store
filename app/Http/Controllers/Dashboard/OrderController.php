<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Regon;

class OrderController extends Controller
{
    //(`id`, `user_id`, `lat`, `lng`, `total`, `delivery_cost`, `delivery_period`, `items_count`, `note`, `created_at`, `updated_at`)
    function add (Request $req) {
        $order = new Order;
        $order->user_id = $req->user_id;
        $order->regon_id = $req->regon_id;
        $order->address = $req->address;
        $order->total = $req->total;
        $order->delivery_cost = $req->delivery_cost;
        $order->delivery_period = $req->delivery_period;
        $order->items_count = $req->items_count;
        $order->note = $req->note;
        $order->order_from = $req->order_from;
        $order->status = 0;
        $result = $order->save();
        
        if($result) {
            $items = array();
            foreach ($req->items as $key => $item) {
                # code...
                $orderItem = new OrderItem;
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item['product_id'];
                $orderItem->count = $item['count'];

                $orderItem->save();
                array_push($items, $orderItem);
                 
            }
            $order->items = $items;
            return ["status" => true, "data" => $order, "message" => NULL];
        }else {
            return ["status" => false, "data" => NULL, "message" => "فشل في إنشاء الطلب"];
        }
    }

    function history($id) {
        if (Order::where('user_id', $id)->get()){
            $orders = Order::where('user_id', $id)->get();
            foreach ($orders as $key => $value) {
                $orders[$key] = $this->order_data($value->id);
            }
            return $orders;

        }else {
            return [];
        }
    }

    function order_info($id) {
        if (Order::find($id)){

            $order = $this->order_data($id);
      
            if($order) {
                return ["status" => true, "data" => $order, "message" => NULL];
            }else {
                return ["status" => false, "data" => NULL, "message" => "فشل في عرض الطلب"];
            }
        }else {
            return ["status" => false, "data" => NULL, "message" => "فشل في عرض الطلب"];
        }
    }

    function order_data($id) {
        $order = Order::with('items')->find($id);

        $order->regon = Regon::find($order->regon_id)->name;

        foreach ($order->items as $key => $value) {
            $product = Product::find($value->product_id);

            $value->product = $this->prepareProductData($product);
            $value->name = $product->name;
            $value->image = $product->image;
            $value->price = $product->price;

            $order->items[$key] = $value;
        }

        return $order;
    }

    function prepareProductData($product) {

        $images = DB::table('product_images')
        
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

        $newProduct = DB::table('new_products')
        ->where('product_id', $product->id)
        ->get()->first();
        if ($newProduct) {
            $product-> is_new = 1;
        }

        return $product;
    }
}
