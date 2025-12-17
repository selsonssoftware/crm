<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\users;

class UserManagementController extends Controller
{
    //showing
    public function usermanagememnt(Request $request){
        $variable=users::all();
        return view('UserManagement.Users',compact('variable'));
    }

    //storing
    // public function userinformation(Request $request){


    //     $users = new users();
    //     $users->first_name=$request->Input('first_name');
    //     $users->last_name=$request->Input('last_name');
    //     $users->email = $request->Input('email');
    //     $users->phone = $request->Input('phone');
    //     $users->dob = $request->Input('dob');
    //     $users->save();

        
    //     $variable=new employees();
    //     $variable->first_name=$request->Input('first_name');
    //     $variable->last_name=$request->Input('last_name');
    //     $variable->email = $request->Input('email');
    //     $variable->phone = $request->Input('phone');
    //     $variable->dob = $request->Input('dob');
    //     $variable->date_joined = $request->Input('date_joined');
    //     $variable->status = $request->Input('status');
    //     if ($request->hasFile('logo')) {

    //         $file = $request->file('logo');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $file->move(public_path('uploads/logo'), $filename);
    //         $variable->logo = $filename;
    //     }
    //     $variable->save();
    //     return redirect()->back()->with('success',' Employee added Their Details Successfully');
    // }


    // public function employeedb(Request $request)
    //  {

    //     $employee = employees::where('employee_id', $request->employee_id)->first();

    //     if (!$employee) {
    //         return back()->with('error', 'Employee not found');
    //     }

    //     $employee->update([
    //         'first_name' => $request->first_name,
    //         'last_name'  => $request->last_name,
    //         'email'      => $request->email,
    //         'phone'      => $request->phone,
    //         'status'     => $request->status,
    //         'date_joined'=> $request->date_joined,
    //     ]);

    //     // Remove old image
    //     if ($request->remove_logo == "1") {
    //         if ($employee->logo && file_exists(public_path('uploads/logo/'.$employee->logo))) {
    //             unlink(public_path('uploads/logo/'.$employee->logo));
    //         }
    //         $employee->logo = null;
    //         $employee->save();
    //     }

    //     // Upload New Image
    //     if ($request->hasFile('logo')) {
    //         $file = $request->file('logo');
    //         $filename = time().'.'.$file->getClientOriginalExtension();
    //         $file->move(public_path('uploads/logo'), $filename);
    //         $employee->logo = $filename;
    //         $employee->save();
    //     }

    //     return redirect()->back()->with('success', 'Employee updated successfully');
    // }

        // public function delete_employee(Request $request)
        // {
        //     employees::where('employee_id', $request->employee_id)->delete();

        //     return redirect()->back()->with('success', 'Employee Deleted Successfully');
        // }


}
