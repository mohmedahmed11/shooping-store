<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expenses;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Requests\ExpensesRequest;



class RetrieverController extends Controller
{
    public function show()
    {
        $expenses = Expenses::selection()->where('type',3)->get();
        // return  $expenses;
        return view('dashboard.retriever.index', compact('expenses'));
    }//end of show

    public function store(ExpensesRequest $request)
    {
        $data_request = $request->except('_token');
        $data_request['type'] = 3;

        Expenses::create($data_request);

        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('retriever');

    }//end of store

    public function destroy($id)
    {
        $retriever = Expenses::where('type',3)->find($id);
        // return $retriever;
        $retriever->delete();

        Toastr::success('تم الحذف بنجاح', 'success');

        return redirect()->route('retriever');
    }




}//end of cntroller


