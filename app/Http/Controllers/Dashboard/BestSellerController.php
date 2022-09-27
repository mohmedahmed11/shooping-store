<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BestSellerProducts;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\SimilerProduct;
class BestSellerController extends Controller

{
    public function show() {

    $products = Product::all();

    $bestSellers=BestSellerProducts::with('bestProduct')->get();
    return view('dashboard.homeApp.show',compact('products','bestSellers'));
    }

    public function create(Request $request){

        $data = new BestSellerProducts();

        $data->product_id = $request->product_id;

         $data->save();

        if($data){
            return redirect('/homeApp')->with('success', 'successfully add');
            // Toastr::success('تمت اضافة الاكثر مبيعاً ', 'success');
            // return redirect()->back();
        }
        else{
            return redirect('/homeApp')->with('error', 'successfully Delete');
            // Toastr::success('خطأ..!', 'fail');
            // return redirect()->back();
        }
    }
    public function destroy($id){
        $data = BestSellerProducts::find($id);
        $data->delete();
        if($data){

    return redirect('/homeApp')->with('error', 'successfully Delete');
    }
}

}
