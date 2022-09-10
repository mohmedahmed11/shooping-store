<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use Brian2694\Toastr\Facades\Toastr;


class AdminsController extends Controller
{
    public function show()
    {
        $admins = User::selection()->get();
        return view('dashboard.admins.index', compact('admins'));
    }
    // public function create()
    // {
    //     return view('dashboard.admins.create');
    // }
    public function store(Request $request)
    {
        // dd($request->all());
        $request_data = $request->except(['password','_token','permissions']);
        $request_data['password'] = bcrypt($request->password);

        $user = User::create($request_data);
        $user->attachRole('admin');
        $user->syncPermissions($request->permissions);

        Toastr::success('تم الاضافه بنجاح', 'success');

        return redirect()->route('admins');
    }

    public function edit(Request $request, $id)
    {
        $admin = User::selection()->find($id);
        return view('dashboard.admins.edit', compact('admin'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $request_data = $request->except(['password','_token','permissions']);
        $request_data['password'] = bcrypt($request->password);

        $user = User::find($id);
        $user->update($request_data);
        $user->syncPermissions($request->permissions);

        Toastr::success('تم الاضافه بنجاح', 'success');
        return redirect()->route('admins');
    }
    public function destroy($id)
    {
        $admin = User::find($id);
        $admin->delete();

        Toastr::success('تم الحذف بنجاح', 'success');
        return redirect()->route('admins');
    }




}
