<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\User;
use App\Models\Notification;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
class NotificationController extends Controller
{

    public function show (){
        $notifications=Notification::all();
        return view('dashboard.products.notification',compact('notifications'));
    }


    public function destroy($id){

    $data =Notification::find($id);
    $data->delete();
    if($data){
        return back()->with('error','Notification Deleted Successfully..');
    }
    }
    public function create(Request $request){

        $data =new Notification;
        $data->title=$request->title;
        $data->body=$request->body;
        $data->save();
        if($data){
            $this->sendNotificationby($data->id);
            return back()->with('status','Notification Inserted Successfully..');
            }
    }

    public function sendNotificationby($id){

        $notify=Notification::find($id);
        $firebaseTokens =  [];
    
        $users=User::where('is_deleted', 0)->get();

        foreach($users as $user){
            $firebaseTokens[]  =  $user->device_token;
        }

        $this->sendGroupNotification($firebaseTokens, $notify);
        if($firebaseTokens){
            return redirect('notification')->with('status','Notification Sended Successfully..');
        }
    }
    public function sendGroupNotification(array $firebaseTokens, $notification)
    {

        $SERVER_API_KEY = 'AAAA5PyOoKI:APA91bHyIKHxktnAYW_a8C0-q5pYcm8l34NiFN2mv2PkwDc-QgyGr912leKksyfgWMVqB6WgvG88Ft9mK7b467n7In1VnYPs8yEjVU-K3Sxth76RGIF7glIZtz_1fGYNm-icL8Q4Yk51';

        $data = [
            "registration_ids" =>$firebaseTokens,
            "notification" => [
                "title" => $notification->title,
                "body" => $notification->body,
            ]
        ];

        $dataString = json_encode($data);
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
        $response = curl_exec($ch);

    }
}
