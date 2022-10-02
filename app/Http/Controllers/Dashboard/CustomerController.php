<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class CustomerController extends Controller
{
    public function show()
    {
        $customers = Customer::all();
        return view('dashboard.customers.index', compact('customers'));
    }
   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        $request_data = $request->except(['password','_token']);
        $request_data['password'] = bcrypt($request->password);

        Customer::create($request_data);
       

        Toastr::success('تم الاضافه بنجاح', 'success');

        return redirect()->route('customers');
    }

    public function edit(Request $request, $id)
    {
        $customer = Customer::find($id);
        return view('dashboard.customers.edit', compact('customer'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
        ]);
        // dd($request->all());
        $request_data = $request->except(['password','_token']);
        $request_data['password'] = bcrypt($request->password);

        $customer = Customer::find($id);
        $customer->update($request_data);

        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('customers');
    }
    public function destroy($id)
    {
        $admin = Customer::find($id);
        $admin->delete();

        Toastr::success('تم الحذف بنجاح', 'success');
        return redirect()->route('customers');
    }





}


