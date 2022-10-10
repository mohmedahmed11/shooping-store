<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ExpensesRequest;




class RevenuesController extends Controller
{
    public function show()
    {
        $expenses = Expenses::selection()->where('type',2)->get();
        // return  $expenses;
        return view('dashboard.revenues.index', compact('expenses'));
    }//end of show

    public function store(ExpensesRequest $request)
    {
        $data_request = $request->except('_token');
        $data_request['type'] = 2;

        Expenses::create($data_request);
        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('revenues');

    }//end of store

    public function destroy($id)
    {
        $revenues = Expenses::where('type',2)->find($id);
        // return $revenues;
        $revenues->delete();

        Toastr::success('تم الحذف بنجاح', 'success');

        return redirect()->route('revenues');
    }




}//end of cntroller
