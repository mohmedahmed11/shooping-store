<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class RateController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $likes = Rate::with(['customer','product'])->get();
        return response()->json($likes);
    }//end of index

    public function rateProduct(Request $request)
    {
        $product = Product::find($request->id);
        if(!$product)
            return $this->returnError('201','هذا المنتج غير موجود');

        $product = Product::find($request->id)->with(['rates','rates.customer'])->get();

        return $this->returnData('product',$product,'تم جلب البيانات بنجاح');
    }//end of likeProduct

}//end of controller
