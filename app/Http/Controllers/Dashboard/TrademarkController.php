<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Trademark;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class TrademarkController extends Controller
{
    public function show()
    {
        $customers = Trademark::all();
        return view('dashboard.trademarks.index', compact('customers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);
        $request_data = $request->except(['_token','image']);
        if ($request->image) {

            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg',
            ]);
            $fileName = $this->uploadImage('assets/admin/uploads',$request->image);
            $request_data['image'] = $fileName;
        }//end if

        Trademark::create($request_data);

        Toastr::success('تم الاضافه بنجاح', 'success');

        return redirect()->route('trademarks');
    }

    public function edit(Request $request, $id)
    {
        $customer = Trademark::find($id);
        return view('dashboard.trademarks.edit', compact('customer'));
    }//edn of edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $request_data = $request->except(['_token','image']);
        if ($request->image) {
            $request->validate([
                'image'=>'required|mimes:png,jpg,jpeg',
            ]);
            $fileName = $this->uploadImage('assets/admin/uploads',$request->image);
            $request_data['image'] = $fileName;
        }//end if

        Trademark::where('id',$id)->update($request_data);

        Toastr::success('تم التحديث بنجاح', 'success');
        return redirect()->route('trademarks');
    }
    public function destroy($id)
    {
        $admin = Trademark::find($id);
        $admin->delete();

        Toastr::success('تم الحذف بنجاح', 'success');
        return redirect()->route('trademarks');
    }



    protected function uploadImage($folder,$image)
    {
        $fileExtension = $image->getClientOriginalExtension();
        $fileName = time().rand(1,99).'.'.$fileExtension;
        $image->move($folder,$fileName);
        return $fileName;

    }//end of uploadImage

}


