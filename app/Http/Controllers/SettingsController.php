<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $settings = Setting::first();
        return view('admin.settings.setting')->with('settings', $settings);
    }

    public function update()
    {
        $this->validate(request(), [
            'site_name' => 'required',
            'contact_email' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required'
        ]);

        $settings = Setting::first();
        $settings->site_name = request()->site_name;
        $settings->contact_email = request()->contact_email;
        $settings->contact_number = request()->contact_number;
        $settings->contact_email = request()->contact_email;
        $settings->address = request()->address;
        $settings->save();

        Session::flash('success', 'Site settings updated');
        return redirect()->back();
    }
}
