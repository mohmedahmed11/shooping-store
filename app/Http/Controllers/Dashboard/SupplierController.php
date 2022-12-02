<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class SupplierController extends Controller
{
    public function show()
    {
        $suppliers = Supplier::all();
        return view('dashboard.suppliers.index', compact('suppliers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        $request_data = $request->except(['_token']);

        Supplier::create($request_data);

        Toastr::success('تم الاضافه بنجاح', 'success');

        return redirect()->route('suppliers');
    }

    public function edit(Request $request, $id)
    {
        $supplier = Supplier::find($id);
        return view('dashboard.suppliers.edit', compact('supplier'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        // dd($request->all());
        $request_data = $request->except(['_token']);

        $customer = Supplier::find($id);
        $customer->update($request_data);

        Toastr::success('تم التحديث بنجاح', 'success');
        return redirect()->route('suppliers');
    }
    public function destroy($id)
    {
        $admin = Supplier::find($id);
        $admin->delete();

        Toastr::success('تم الحذف بنجاح', 'success');
        return redirect()->route('suppliers');
    }





}


