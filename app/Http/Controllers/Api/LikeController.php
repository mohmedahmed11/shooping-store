<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;


class LikeController extends Controller
{
    use GeneralTrait;

    public function index(Request $request)
    {
        $like = Like::where(['customer_id'=>$request->customer_id , 'product_id'=>$request->product_id])->get()->first();
        if($like){
            if($like->status == $request->status){
                $like->delete();
                return $this->returnSuccessMessage('delete');
            }else{
                $like->status = $request->status;
                $like->update();
                return $this->returnSuccessMessage('update');
            }
        }else {//end if
            Like::create([
                'customer_id'=>$request->customer_id,
                'product_id'=>$request->product_id,
                'status'=>$request->status,
                ]);
            return $this->returnSuccessMessage('create');
        }
    }//end of index


}//end of controller
