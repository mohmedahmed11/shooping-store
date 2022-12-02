<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ExpensesRequest;



class ExpensesController extends Controller
{
    public function show()
    {
        $expenses = Expenses::selection()->where('type',1)->get();
        // return  $expenses;
        return view('dashboard.expenses.index', compact('expenses'));
    }//end of show

    public function store(ExpensesRequest $request)
    {
        $data_request = $request->except('_token');
        $data_request['type'] = 1;

        Expenses::create($data_request);

        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('expenses');

    }//end of store

    public function destroy($id)
    {
        $expenses = Expenses::where('type',1)->find($id);
        // return $expenses;
        $expenses->delete();

        Toastr::success('تم الحذف بنجاح', 'success');

        return redirect()->route('expenses');
    }




}//end of cntroller


