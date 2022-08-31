<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use App\Models\Regon;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use PDF;

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
    ###########################################################################

    public function show()
    {
        $orders = Order::with(['user','regon'])->selection()->get();
        // return $orders;
        return view('dashboard.order.index',compact('orders'));
    }

    public function create()
    {
        $users = User::all();
        $regons = Regon::selection()->get();
        return view('dashboard.order.create',compact('users','regons'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'user_id'=>'required',
            'regon_id'=>'required',
            'address'=>'required',
            'total'=>'required',
            'delivery_cost'=>'required',
            'delivery_period'=>'required',
            'items_count'=>'required',
            'status'=>'required',
            'order_from'=>'required',
            'note'=>'required',
        ]);

        $request_data = $request->except(['_token']);
        $order = Order::create($request_data);
        Toastr::success('تم الاضافه بنجاح', 'success');

        return redirect()->route('order');
    }

    function find_order($id) {
        $order = Order::with(['user','regon','items'])->selection()->find($id);
        foreach ($order->items as $key => $item) {
            # code...
            $product = Product::find($item->product_id);
            $order->items[$key]->name = $product->name;
        }
        return $order;
    }

    public function status(Request $request)
    {
        // $order = Order::find($id);
        // $status =  $request -> status ;
        // $order -> update(['status'=>$status ]);
        // Toastr::success(' تم تغيير الحالة بنجاح ', 'success');
        return $request; // redirect()->route('order');
    }












}
