<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\Designation;
use App\Models\Department;
use App\Models\users;
class EmployeeDetailsController extends Controller
{
     //showing
    public function show_employee(Request $request){
          
   
    $variable=$query = employees::get();
   
    if ($request->has('designation_id') && $request->designation_id != '') {
        
    $variable = employees::where('designation_id', $request->designation_id)->get();
    }
    
    $designation=Designation::all();
    $department = Department::join('designations','departments.department_id','=','designations.department_id')->select(
            'departments.*',    
            'designations.*'
        )
        ->get();
    return view('Employee.Employee_Details',compact('variable','department','designation'));
    }
 

    //storing
    public function userinformation(Request $request){

        $lastUser = users::orderBy('user_id', 'DESC')->first();
        if ($lastUser) {
            $lastIdNumber = intval(substr($lastUser->user_id, 3)); // Remove prefix "USR"
            $newIdNumber = $lastIdNumber + 1;
            $newUserId = 'USR' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $newUserId = 'USR001';
        }
        $users = new users();
        $users->user_id = $newUserId;
        $users->first_name=$request->Input('first_name');
        $users->last_name=$request->Input('last_name');
        $users->email = $request->Input('email');
        $users->phone = $request->Input('phone');
        $users->dob = $request->Input('dob');
        $users->save();

        


          // Generate Employee ID (EMP001, EMP002, ...)
        $lastEmployee = employees::orderBy('emp_id', 'DESC')->first();

        if ($lastEmployee) {
            $lastIdNumber = intval(substr($lastEmployee->emp_id, 3)); 
            $newIdNumber = $lastIdNumber + 1;
            $newEmployeeId = 'EMP' . str_pad($newIdNumber, 3, '0', STR_PAD_LEFT);
        } else {
            $newEmployeeId = 'EMP001';
        }
        $variable=new employees();
        $variable->emp_id = $newEmployeeId;
        $variable->first_name=$request->Input('first_name');
        $variable->last_name=$request->Input('last_name');
        $variable->email = $request->Input('email');
        $variable->phone = $request->Input('phone');
        $variable->dob = $request->Input('dob');
        $variable->date_joined = $request->Input('date_joined');
        $variable->status = $request->Input('status');
         $variable->department_id   = $request->department_id;
    $variable->designation_id  = $request->designation_id;
        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logo'), $filename);
            $variable->logo = $filename;
        }
        $variable->save();
        return redirect()->back()->with('success',' Employee added Their Details Successfully');
    }


    public function employeedb(Request $request)
     {
          $employee = employees::where('employee_id', $request->employee_id)->first();

        if (!$employee) {
            return back()->with('error', 'Employee not found');
        }

        $employee->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'status'     => $request->status,
            'date_joined'=> $request->date_joined,
            'department_id'     => $request->department_id,
            'designation_id'=> $request->designation_id,
            
       ]);

        // Remove old image
        if ($request->remove_logo == "1") {
            if ($employee->logo && file_exists(public_path('uploads/logo/'.$employee->logo))) {
                unlink(public_path('uploads/logo/'.$employee->logo));
            }
            $employee->logo = null;
            $employee->save();
        }

        // Upload New Image
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('uploads/logo'), $filename);
            $employee->logo = $filename;
            $employee->save();
        }

        return redirect()->back()->with('success', 'Employee updated successfully');
    }

        public function delete_employee(Request $request)
        {
            employees::where('employee_id', $request->employee_id)->delete();

            return redirect()->back()->with('success', 'Employee Deleted Successfully');
        }

}
