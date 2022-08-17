<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

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
        $order->status = 0;
        $order->order_from = "application";
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
            return ["status" => true, "data" => $order];
        }else {
            return ["status" => false, "data" => NULL, "message" => "يوجد خطاء في بيانات الطلب"];
        }
    }

    function history($user_id) {

        if (Order::where('user_id', $user_id)->get()){
            $orders = Order::where('user_id', $user_id)
            ->join('regons', 'regons.id', '=', 'orders.regon_id')
            ->select('orders.*','regons.name AS regon')
            ->orderBy('orders.id', 'DESC')->get();

            foreach ($orders as $key => $order) {
                $orders[$key] = $this->prepareOrderData($order);
            }
            

        return $orders;

        }else {
            return [] ;
        }

    }

    function order_info($order_id) {

        if (Order::where('id', $order_id)->get()){
            $order = Order::where('orders.id', $order_id)
            ->join('regons', 'regons.id', '=', 'orders.regon_id')
            ->select('orders.*','regons.name AS regon')
            ->orderBy('orders.id', 'DESC')->first();

            $order = $this->prepareOrderData($order);
            
            
                return ["status" => true, "data" => $order];
            } else {
                return ["status" => false, "data" => null, "message" => "فشل في عرض الطلب"];
            }

    }

    function prepareOrderData($order) {
        $items = DB::table('order_items')
        ->join('products', 'products.id', '=', 'order_items.product_id')
        ->select('order_items.*','products.name', 'products.image', 'products.price')
        ->where('order_items.order_id', $order->id)
        ->get();

        foreach ($items as $key => $item) {
            $product = DB::table('products')
            ->select('products.*')
            ->where('products.id', $item->product_id)
            ->first();

        
            if ($product) {
                $items[$key]->product =  $this->prepareProductData($product);
            }
        }

        if ($items) {
            $order->items = $items;
        }else {
            $order->items = [];
        }

        return $order;
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
        return $product;
    }
}
