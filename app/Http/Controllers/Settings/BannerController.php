<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Product;
use Brian2694\Toastr\Facades\Toastr;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function show()
    {
        $banners = Banner::selection()->get();
        foreach ($banners as $key => $banner) {
            # code...
            if ($banner->has_product == 1) {
                $product = Product::find($banner->product_id);
                $banners[$key]->product_name = $product->name;
            }else {
                $banners[$key]->product_name = null;
            }
        }
        $products = Product::selection()->get();
        return view('dashboard.banner.index', compact('banners','products'));
    }

    public function create()
    {
        $banners = Banner::selection()->get();
        $products = Product::selection()->get();
        return view('dashboard.banner.create', compact('banners','products'));
    }

    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'image' => 'image|required',
        ]);
        // if ($request->product_id) {
        //     $product = Product::where('id',$request->product_id)->get();
        // }
        if ($request->has('product_id'))
            $request->request->add(['has_product' => 1]);
        else
            $request->request->add(['has_product' => 0]);


        $request_data = $request->except(['image','status','_token']);

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('banners/' . $request->image->hashName()));

            $request_data['image'] = 'banners/' .$request->image->hashName();

        }//end of if

        $banner = Banner::create($request_data);

        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('banner');
    }

    public function edit(Request $request , $id)
    {
        $banner = Banner::selection()->find($id);
        if ($banner->has_product == 1) {
            $product = Product::find($banner->product_id);
            $banner->product_name = $product->name;
            $banner->product_image = $product->image;
        }else {
            $banner->product_name = null;
            $banner->product_image = null;
        }
        $products = Product::selection()->get();
        // return $banner;
        return view('dashboard.banner.edit', compact('banner','products'));
    }

    public function update(Request $request ,$id)
    {
        $request->validate([
            'image' => 'image|required',
        ]);
        // if ($request->product_id) {
        //     $product = Product::where('id',$request->product_id)->get();
        // }
        if ($request->has('product_id'))
            $request->request->add(['has_product' => 1]);
        else
            $request->request->add(['has_product' => 0]);


        $request_data = $request->except(['image','status','_token']);

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('banners/' . $request->image->hashName()));

            $request_data['image'] = 'banners/' .$request->image->hashName();

        }//end of if

        Banner::where('id',$id)->update($request_data);

        Toastr::success('تم التحديث بنجاح', 'success');
        return redirect()->route('banner');
    }

    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();
        Toastr::success('تم الحذف بنجاح', 'error');
        return redirect()->route('banner');
    }

    public function status($id)
    {
        $banner = Banner::find($id);
        $status =  $banner -> status  == 0 ? 1 : 0;
        // return $status;
        $banner -> update(['status'=>$status ]);
        Toastr::success(' تم تغيير الحالة بنجاح ', 'success');
        return redirect()->route('banner');
    }

    function find_product($id) {
        $product = Product::find($id);

        return $product;//redirect()->route('dashboard.banner.create')->with('selectedProduct', $product);
    }






}
