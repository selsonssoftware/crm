<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Designation;
use Illuminate\Support\Facades\DB;
class departmentController extends Controller
{
  
  public function departments(Request $request){
        $variable = Department::latest()->get();
        return view ('Employee.departments', compact('variable'));
    }

    public function departmentsstore(Request $request) {
         $variable=new Department();
         $variable->name=$request->Input('name');
         $variable->status = $request->Input('status');
         $variable->save();
         return redirect()->back()->with('success', 'Department inserted successfully');
    }

    public function departmentssave(Request $request)
{

    $request->validate([
        'department_id' => 'required|exists:departments,department_id',
        'name' => 'required|string|max:255',
        'status' => 'required|string',
    ]);

    $updated = Department::where('department_id', $request->department_id)
        ->update([
            'name' => $request->name,
            'status' => $request->status,
        ]);

     return redirect()->back()->with('success', 'Updated Department data successfully');
  }

    public function delete_departments(Request $request)
        {
            Department::where('department_id', $request->department_id)->delete();

            return redirect()->back()->with('delete', 'Department Successfully');
        }



    //designations
  public function testing(Request $request)
{
    // Fetch designations with department names
    $designations = DB::table('designations')
        ->leftJoin('departments', 'designations.department_id', '=', 'departments.department_id')
        ->select(
            'designations.designation_id',
            'designations.title',
            'designations.status',
            'designations.department_id', // for edit modal pre-selection
            'departments.name as department_name' // department name from departments table
        )
        ->latest('designations.created_at')
        ->get();

    // Fetch all departments for Add/Edit dropdowns
    $departments = DB::table('departments')->get();

    return view('Employee.designations', compact('designations', 'departments'));
}

    public function designationsstore(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'department_id' => 'required|exists:departments,department_id',
            'status' => 'required|in:0,1',
        ]);

        Designation::create([
            'title' => $request->title,
            'department_id' => $request->department_id,
            'status' => $request->status
        ]);

        return back()->with('success', 'Designation created successfully');
    }

    public function designationssave(Request $request)
    {
        $request->validate([
            'designation_id' => 'required|exists:designations,designation_id',
            'title' => 'required',
            'department_id' => 'required|exists:departments,department_id',
            'status' => 'required|in:0,1',
        ]);

        Designation::where('designation_id', $request->designation_id)
            ->update([
                'title' => $request->title,
                'department_id' => $request->department_id,
                'status' => $request->status
            ]);

        return back()->with('success', 'Updated Designation data successfully');
    }

    public function delete_designations(Request $request)
    {
        Designation::where('designation_id', $request->designation_id)->delete();

        return back()->with('delete', 'Designation Successfully Deleted');
    }

}
