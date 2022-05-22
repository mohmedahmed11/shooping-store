<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    //(`id`, `user_id`, `lat`, `lng`, `total`, `delivery_cost`, `delivery_period`, `items_count`, `note`, `created_at`, `updated_at`)
    function add (Request $req) {
        $order = new Order;
        $order->user_id = $req->user_id;
        $order->lat = $req->lat;
        $order->lng = $req->lng;
        $order->total = $req->total;
        $order->delivery_cost = $req->delivery_cost;
        $order->delivery_period = $req->delivery_period;
        $order->items_count = $req->items_count;
        $order->note = $req->note;
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
            return ["status" => false, "data" => NULL];
        }
    }
}
