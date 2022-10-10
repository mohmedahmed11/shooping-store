<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ExpensesRequest;



class CapitalController extends Controller
{
    public function show()
    {
        $expenses = Expenses::selection()->where('type',0)->get();
        // return  $expenses;
        return view('dashboard.capital.index', compact('expenses'));
    }//end of show

    public function store(ExpensesRequest $request)
    {
        $data_request = $request->except('_token');
        $data_request['type'] = 0;

        Expenses::create($data_request);

        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('capital');

    }//end of store

    public function destroy($id)
    {
        $capital = Expenses::where('type',0)->find($id);
        // return $capital;
        $capital->delete();

        Toastr::success('تم الحذف بنجاح', 'success');

        return redirect()->route('capital');
    }




}//end of cntroller


