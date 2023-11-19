<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Product;

class CommentController extends Controller
{
    public function getAllComents(){
            $coments = Product::with('coment');
            if ($coments) {
                return $this->api_rsponse(true, $coments, "Success", 200);
            }else {
                return $this->api_rsponse(false, null, "no Coments", 200);
            }
    }
    public function getComments($product_id){

        $coments = Comment::where('product_id', $product_id)->with('user','replaies','replaies.user')->orderBy('created_at', 'desc')->get();
         $total=$coments->count();
        if ($coments) {
            return $this->api_rsponse(true, $coments, "all Coments is: $total", 200);
        }else {
            return $this->api_rsponse(false, null, "no Coments", 200);
        }
    }

    public function create(Request $request){
        $request->validate([
            'user_id'=>'required',
            'body'=>'required',
            'product_id'=>'required',
        ]);
        $comment =new Comment();
        $comment->user_id=$request->user_id;
        $comment->body=$request->body;
        $comment->product_id=$request->product_id;
        $comment->save();
        return response()->json(['message'=>'comment Added Successfull'],200);
    }

    public function destroy($id){
            $coment=Comment::find($id);
            $coment->delete();
            if ($coment) {
                return $this->api_rsponse(true, $coment, "coment Delted Successfull", 200);
            }else {
                return $this->api_rsponse(false, null, "no Coments", 200);
            }
    }

    function api_rsponse($status, $data, $message, $code) {
        return response()->json(['status'=>$status , 'data'=> $data, 'message'=>$message], $code);
    }

}
