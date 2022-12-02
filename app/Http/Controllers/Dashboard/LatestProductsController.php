<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LatestProducts;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
class LatestProductsController extends Controller
{
    public function show() {

        $products = Product::all();
        $lastedAdd=LatestProducts::with('lastProduct')->get();
        return view('dashboard.latestproducts.show',compact('products','lastedAdd'));
        }


    public function createlatest(Request $request){

        $data = new LatestProducts();

        $data->product_id = $request->product_id;

         $data->save();

        if($data){
            Toastr::success('تمت اضافة حدث جديد  ', 'success');
            return redirect()->back();
        }
        else{
            Toastr::success('خطأ..!', 'fail');
            return redirect()->back();
        }
    }
    public function destroy($id){
        $data = LatestProducts::find($id);
        $data->delete();
        if($data){
    return redirect('/latestproducts')->with('error', 'تم حذف الحدث');
    }
}

}
