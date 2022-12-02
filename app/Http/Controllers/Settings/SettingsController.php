<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;


class SettingsController extends Controller
{
    public function show()
    {
        $settings = Setting::select()->get()->first();
        // return $settings;
        return view('dashboard.settings.show', compact('settings'));
    }

    public function update(Request $request)
    {
        // return $request;
        $id = $request->id;
        $request->validate([
            'about' => 'required',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'twitter' => 'required',
            'delivery_cost' => 'required',
        ]);

        $request_data = $request->except(['_token']);
        $settings =Setting::where('id', $id)->update($request_data);
        Toastr::success('تم التحديث بنجاح', 'success');

        return redirect()->back();
    }









}
