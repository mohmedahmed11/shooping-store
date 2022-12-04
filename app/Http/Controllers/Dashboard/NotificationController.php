<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Admins;
use App\Models\Customer;
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
            self::sendNotificationby($data->id);
            return back()->with('status','Notification Inserted Successfully..');
            }
    }

    static function sendNotificationby($id){

        $notify=Notification::find($id);
        return self::sendNotificationTo("to", "/topics/general", $notify );
        // if($firebaseTokens){
        //     return redirect('notification')->with('status','Notification Sended Successfully..');
        // }
    }

    static function sendGroupNotification(array $firebaseTokens, $notification)
    {
      sendNotificationTo("registration_ids", $firebaseTokens, $notification );
        
    }

    static function sendNotificationTo($to, $firebaseSender, $notification) {
      $SERVER_API_KEY = 'AAAA5PyOoKI:APA91bHyIKHxktnAYW_a8C0-q5pYcm8l34NiFN2mv2PkwDc-QgyGr912leKksyfgWMVqB6WgvG88Ft9mK7b467n7In1VnYPs8yEjVU-K3Sxth76RGIF7glIZtz_1fGYNm-icL8Q4Yk51';

      $data = [
        $to => $firebaseSender,
          "notification" => [
              "title" => $notification['title'],
              "body" => $notification['body'],
          ],
            'android' => [
              'notification'=> [
                'imageUrl'=> 'https://foo.bar.pizza-monster.png'
              ]
          ],
            'apns'=> [
              'payload'=> [
                'aps'=> [
                  'mutable-content'=> 1
                ]
                ],
              'fcm_options'=> [
                'image'=> 'https://foo.bar.pizza-monster.png'
              ]
              ],
            'webpush'=> [
              'headers'=> [
                'image'=> 'https://foo.bar.pizza-monster.png'
      ]
          ],

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

      return $response;
    }
}
