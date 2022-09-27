<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\OrderItem;use App\Models\User;
use App\Models\Regon;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Setting;
use Brian2694\Toastr\Facades\Toastr;
use PDF;

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
            $orders = Order::where('user_id', $id)->with('items','items.product')->orderBy('created_at', 'desc')->get();
            // foreach ($orders as $key => $value) {
            //     $orders[$key] = $this->order_data($value->id);
            // }
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

    function cancel_order(Request $req) {
        $order = Order::find($req->id);
        $order->status = 4;
        $order->save();

        if ($order) {
            return ["status" => true, "data" => $order, "message" => NULL];
        }else {
            return ["status" => false, "data" => NULL, "message" => "فشل في إلغاء الطلب"];
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
        $products = Product::selection()->get();
        $settings = Setting::selection()->get();
        $order_items = session('order_items');
        $categories = Category::with('products')->get();

        // return $settings;
        // session()->pull('order_items');
        // return view('dashboard.order.create',compact('users','regons','products','order_items','settings'));
        return view('dashboard.order.store',compact('users','regons','products','order_items','settings','categories'));

    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'regon_id'=>'required',
            'address'=>'required',
            'delivery_period'=>'required',
            'note'=>'required',
        ]);
        $items = session('order_items');
        $request_data = $request->except(['_token','phone','name','count']);
        $customer = Customer::where('phone',$request->phone)->get();
        // return  $customer;
        if(!$customer->isEmpty()) {
            $cust = Customer::where('phone',$request->phone)->get()->first();
            $request_data['user_id'] = $cust->id;
        }else {
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->phone = $request->phone;
            $customer->save();
            $request_data['user_id'] = $customer->id;
        }

        $request_data['items_count'] =  count($items);
        $request_data['order_from'] = 'dashboard';


        $request_data['delivery_cost'] = $request->delivery_cost;
        $request_data['total'] = 1324;

        // return $request_data;

        $order = Order::create($request_data);
        if ($order) {
            foreach ($items as $key => $item) {
                # code...
                $order_item = new OrderItem;
                $order_item->order_id = $order->id;
                $order_item->product_id = $item->id;
                $order_item->count = $item->count;
                $order_item->save();
            }
            session()->pull('order_items');
            Toastr::success('تم الاضافه بنجاح', 'success');
            return redirect()->route('order');
        }else {
            Toastr::error('فشل في إنشاء الطلب', 'error');
            return redirect()->route('order');
        }
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

    public function status($id, $status)
    {
        $order = Order::find($id);
        $status =  $status ;
        $order -> update(['status'=>$status ]);
        // Toastr::success(' تم تغيير الحالة بنجاح ', 'success');
        return  redirect()->route('order');
    }

    function setToSession($id,$count) {

        $items = session('order_items');
        $product = Product::select('id','name','price','image')->find($id);
        $product->count = $count;
        $items[] = $product;
        session(['order_items' => $items]);
        return $items;//redirect()->back()->with('order_items',$items);
    }

    function deleteItemFromSession($index) {
        $items = session('order_items');
        unset($items[$index]);
        session(['order_items' => $items]);
        return redirect()->back()->with('order_items',$items);
    }









}
