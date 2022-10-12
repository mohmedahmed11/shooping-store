<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use GuzzleHttp\Promise\Create;
use App\Models\Notification;
use App\Models\Customer;
use App\Http\Controllers\Dashboard\NotificationController;

class OrderApisController extends Controller
{

    public function test()
    {
    return response()->json(['message'=>'Api Successfull'],200);

        // $orders = OrderItem::all();
        // $order = Order::with('regon','user','items')->find($id);
        // return response()->json(['order'=>$order]);
    }



    public function getOrder($id)
    {
        // $orders = OrderItem::all();
        $order = Order::with('regon','user','items')->find($id);
        return response()->json(['order'=>$order]);
    }

    public function getOrders(){
        $orders = Order::with('regon','user','items')->get();
        if ($orders) {
            return $this->api_rsponse(true, $orders, null, 200);
        }else {
            return $this->api_rsponse(false, null, "no orders", 200);
        }

    }

    public function createOrder(Request $request){
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
        $order =new Order;
        $order->user_id=$request->user_id;
        $order->regon_id=$request->regon_id;
        $order->address=$request->address;
        $order->total=$request->total;
        $order->delivery_cost=$request->delivery_cost;
        $order->delivery_period=$request->delivery_period;
        $order->items_count=$request->items_count;
        $order->status=$request->status;
        $order->order_from=$request->order_from;
        $order->note=$request->note;
        $order->save();
        $order_id = $order->id;
        foreach($request->items as $key => $item) {
            $order_item = new OrderItem;
            $order_item->order_id = $order_id;
            $order_item->product_id = $item['product_id'];
            $order_item->count = $item['count'];
            $order_item->save();
        }
        return response()->json(['message'=>'Order Added Successfull'],200);
    }

    public function updateOrder(Request $request,$id){

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
        $order = Order::find($id);

        if($order){
            $order->user_id = $request->user_id;
            $order->regon_id = $request->regon_id;
            $order->address = $request->address;
            $order->total = $request->total;
            $order->delivery_cost = $request->delivery_cost;
            $order->delivery_period = $request->delivery_period;
            $order->items_count = $request->items_count;
            $order->status = $request->status;
            $order->order_from = $request->order_from;
            $order->note = $request->note;
            $update = $order->update();

            if ($update) {
                $order_id = $order->id;

                $all_items = $request->items;

                $products = [];
                foreach($request->items as $key => $item) {
                    $products[] = $item['product_id'];
                }
                // return $products;

                $order_item = OrderItem::where('order_id',$id)
                ->whereNotIn('product_id', $products)->delete();

                $orderExistItems = OrderItem::where('order_id',$id)->whereIn('product_id', $products)->get();
                // return  $orderExistItems;
                foreach($orderExistItems as $key => $item) {

                    $filtredItem = collect($request->items)->where('product_id', $item['product_id'])->first();

                    $item['count'] = $filtredItem['count'];

                    $item->update();

                    foreach($all_items as $key1 => $item1) {
                        if ($item1['product_id'] == $item['product_id']) {
                            unset($all_items[$key1]);
                        }

                    }

                }

                foreach ($all_items as $key => $item) {
                    # code...
                    $order_item = new OrderItem;
                    $order_item->order_id = $order_id;
                    $order_item->product_id = $item['product_id'];
                    $order_item->count = $item['count'];
                    $order_item->save();
                }
                return $this->api_rsponse(true, $order, null, 200);
            } else {
                return$this->api_rsponse(false, null, "order no faound", 200);
            }


        }else{
            return $this->api_rsponse(false, null, "order no faound", 404);//response()->json(['status'=>false , 'data'=> null, 'message'=>"failuer message"],200);
        }
    }

    function updateStatus($id, $status) {
      $order = Order::find($id);
        // $data->user_id->$status->user_id->$this->sendNotificationby($status->id);
        // eSOwb0_8lEnDu_l73_Unx_:APA91bELmc_Vzp9S1wEu72bLhb4RcEJX1b_EDa8_jUz8wsZjnjTWqPoMsRrNv8WpaoASPvd9wG1juLWr86j3OQ-YM7wQrRreftMlW9aJDmte0Awh5XgYqQFVtMlTMVJS9s89D6b0xLWT
        // fvh_O69CTDGPUtMtQbMnPH:APA91bEHkkNe01wHs7c-1KSpvbAgNastOmu_XfzrFRbakp_8dir8hT9FXmUO33dZYn8cgtngOQurVsgHxdfcH-1bXTZAf8NaVFiLB0kuAZwM6e26VnZ8lqkU3ZAuPcjELxB8Q9xXtcuA
        // eSOwb0_8lEnDu_l73_Unx_:APA91bELmc_Vzp9S1wEu72bLhb4RcEJX1b_EDa8_jUz8wsZjnjTWqPoMsRrNv8WpaoASPvd9wG1juLWr86j3OQ-YM7wQrRreftMlW9aJDmte0Awh5XgYqQFVtMlTMVJS9s89D6b0xLWT
        $order->status = $status;
        $order->update();


        $firebaseTokens =  [];

        $user=Customer::find($order->user_id);
        $firebaseTokens[] = $user->device_token;

        if($status==0)
        {
            $notify = ["title"=>"dfd" ,"body"=>"ddd"];
            NotificationController::sendGroupNotification($firebaseTokens, $notify);
            return $this->api_rsponse(true, $order,"جديد", 200);
        }
        elseif($status==1) {
<<<<<<< HEAD
            $notify = ["title"=>"الطلبات : رقم الطلب $id#" ,"body"=>"تم قبول طلبك"];
=======
            $notify = ["title"=>"الطلبات : رقم الطلب $id #" ,"body"=>"تم قبول طلبك"];
>>>>>>> cdacdd5414eeb98773a731ae16ad444032d23d04
            NotificationController::sendGroupNotification($firebaseTokens, $notify);
            return $this->api_rsponse(true, $order, "مقبول", 200);
        }
        elseif($status==2) {
            // +
<<<<<<< HEAD
            $notify = ["title"=>"الطلبات : رقم الطلب $id#" ,"body"=>"قيد التوصيل"];
=======
            $notify = ["title"=>"الطلبات : رقم الطلب $id #" ,"body"=>"قيد التوصيل"];
>>>>>>> cdacdd5414eeb98773a731ae16ad444032d23d04
            NotificationController::sendGroupNotification($firebaseTokens, $notify);
            return $this->api_rsponse(true, $order, "طلب رقم $id قيد التوصيل", 200);
        }
        elseif($status==3) {
<<<<<<< HEAD
            $notify = ["title"=>"الطلبات : رقم الطلب $id#" ,"body"=>"تم التسليم بنجاح"];
=======
            $notify = ["title"=>"الطلبات : رقم الطلب $id #" ,"body"=>"تم التسليم بنجاح"];
>>>>>>> cdacdd5414eeb98773a731ae16ad444032d23d04
            NotificationController::sendGroupNotification($firebaseTokens, $notify);
            return $this->api_rsponse(true, $order, "تم التسليم", 200);
        }
        elseif($status==4) {
<<<<<<< HEAD
            $notify = ["title"=>"الطلبات : رقم الطلب $id#" ,"body"=>"تم إلغاء الطلب"];
=======
            $notify = ["title"=>"الطلبات : رقم الطلب $id #" ,"body"=>"تم إلغاء الطلب"];
>>>>>>> cdacdd5414eeb98773a731ae16ad444032d23d04
            NotificationController::sendGroupNotification($firebaseTokens, $notify);
            return $this->api_rsponse(true, $order, "تم الإلغاء", 200);
        }
    }

    public function destroy($id){
        $data = Order::find($id);
        if($data){
            $data->delete();
            return response()->json(['message'=>'Order Deleted Successfull'],200);
        }
        else{
            return response()->json(['message'=>'Order Not Found'],404);
        }
    }


    function api_rsponse($status, $data, $message, $code) {
        return response()->json(['status'=>$status , 'data'=> $data, 'message'=>$message], $code);
    }


}
