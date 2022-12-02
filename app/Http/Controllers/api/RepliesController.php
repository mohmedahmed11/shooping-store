<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Comment;
use App\Models\Replies;

class RepliesController extends Controller
{
    public function getAllreplies(){
        $replies = Replies::all();
        if ($replies) {
            return $this->api_rsponse(true, $replies, "Success", 200);
        }else {
            return $this->api_rsponse(false, null, "No Replies", 200);
        }
}
public function getreplies($comment_id){
    $Replies = Replies::where('comment_id', $comment_id)->with('user')->get();
    $total=$Replies->count();
    if ($Replies) {
        return $this->api_rsponse(true, $Replies, "all Replies is: $total", 200);
    }else {
        return $this->api_rsponse(false, null, "no Replies", 200);
    }
}

function api_rsponse($status, $data, $message, $code) {
    return response()->json(['status'=>$status , 'data'=> $data, 'message'=>$message], $code);
}

}
