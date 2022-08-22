<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Regon;
use Brian2694\Toastr\Facades\Toastr;


class RegonsController extends Controller
{
    public function show()
    {
        $regons = Regon::selection()->get();
        // return $regons;
        return view('dashboard.regons.index', compact('regons'));
    }

    public function store(Request $request)
    {
        // return $request;

        if (!$request->has('status'))
            $request->request->add(['status' => 0]);
        else
            $request->request->add(['status' => 1]);

        $request->validate([
            'name' => 'required',
            'delivery_cost' => 'required',
        ]);

        $request_data = $request->except(['_token']);

        $regon = Regon::create($request_data);

        Toastr::success('تم الاضافه بنجاح', 'success');

        return redirect()->route('regon');
    }//end of store

    public function edit(Request $request, $id)
    {
        $regon = Regon::selection()->find($id);
        // return $regon;
        return view('dashboard.regons.edit', compact('regon'));
    }


public function update(Request $request, $id)
    {
        // return $request ;
        $request->validate([
            'name' => 'required',
            'delivery_cost' => 'required',
        ]);

        if (!$request->has('status'))
            $request->request->add(['status' => 0]);
        else
            $request->request->add(['status' => 1]);

        $request_data = $request->except(['_token']);

        Regon::where('id',$id)->update($request_data);

        Toastr::success('تم التحديث بنجاح', 'success');
        return redirect()->route('regon');
    }

    public function destroy($id)
    {
        $regon = Regon::find($id);
        $regon->delete();
        Toastr::success('تم الحذف بنجاح', 'error');
        return redirect()->route('regon');
    }

    public function status($id)
        {
            $regon = Regon::find($id);
            $status =  $regon -> status  == 0 ? 1 : 0;
            // return $status;
            $regon -> update(['status'=>$status ]);
            Toastr::success(' تم تغيير الحالة بنجاح ', 'success');
            return redirect()->route('regon');
        }












}
