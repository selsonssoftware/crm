<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function holidays(Request $request)
{
    $holidays = Holiday::latest()->get();
    return view('Holiday.holidays', compact('holidays'));
}


public function holidaysstore(Request $request)
{
    $request->validate([
        'title'        => 'required|string|max:255',
        'holiday_date' => 'required|date',
        'description'  => 'nullable|string',
    ]);

    $holiday = new Holiday();
    $holiday->title = $request->title;
    $holiday->holiday_date = $request->holiday_date;
    $holiday->description = $request->description;
    $holiday->save();

    return redirect()->back()->with('success', 'Holiday added successfully');
}

public function holidayssave(Request $request)
{
    $request->validate([
        'holiday_id'   => 'required',
        'title'        => 'required|string|max:255',
        'holiday_date' => 'required|date',
        'description'  => 'nullable|string',
        'status'       => 'required|in:0,1',
    ]);

    Holiday::where('holiday_id', $request->holiday_id)->update([
        'title'        => $request->title,
        'holiday_date' => $request->holiday_date,
        'description'  => $request->description,
        'status'       => $request->status, 
    ]);

    return redirect()->back()->with('success', 'Holiday updated successfully');
}

public function delete_holidays(Request $request)
{
    Holiday::where('holiday_id', $request->holiday_id)->delete();
    return redirect()->back()->with('delete', 'Holiday deleted successfully');
}

        



}
