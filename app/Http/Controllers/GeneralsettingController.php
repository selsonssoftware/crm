<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\general_settings;

class GeneralsettingController extends Controller
{
    public function generalsettings()
    {
        $generalsettings = general_settings::first();
        return view('Generalsetting.generalsettings', compact('generalsettings'));
    }

    public function generalsettingsstore(Request $request)
    {
        $generalsettings= $request->validate([
            'company_name' => 'nullable|string',
            'gst_number'   => 'nullable|string',
            'email'        => 'nullable|email',
            'phone'        => 'nullable|string',
            'address'      => 'nullable|string',
            'country'      => 'nullable|string',
            'state'        => 'nullable|string',
            'city'         => 'nullable|string',
            'pincode'      => 'nullable|string',
            'logo'         => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            $filename = time().'.'.$request->logo->extension();
            $request->logo->move(public_path('uploads/generalsettings'), $filename);
            $generalsettings['logo'] = $filename;
        }

        general_settings::updateOrCreate(
            ['id' => 1], 
            $generalsettings
        );

        return redirect()->back()->with('success', 'Settings updated successfully');
    }
}



 
        




