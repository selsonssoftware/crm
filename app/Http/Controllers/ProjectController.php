<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\projects;
use App\Models\contacts;
use App\Models\tasks;
use App\Models\employees;
class ProjectController extends Controller
{
     public function show_project(Request $request){
      $variable=projects::join('contacts','projects.client_id','=','contacts.contact_id')
        ->select(
            'contacts.first_name as first_name',
            'contacts.last_name as last_name',
            'projects.*'
        )->get();
        $contacts=contacts::all();
        return view('Projects.project',compact('variable','contacts'));
    }

    //storing
    public function store_project(Request $request){
        $variable=new projects();
        $variable->name=$request->Input('name');
        $variable->start_date=$request->Input('start_date');
        $variable->end_date = $request->Input('end_date');
        $variable->priority = $request->Input('priority');
        $variable->project_value= $request->Input('project_value');
        $variable->price_type = $request->Input('price_type');
        $variable->client_id = $request->Input('client_id');
        $variable->status = $request->Input('status');

            // Upload Logo
        if ($request->hasFile('logo')) {

            $file = $request->file('logo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/logo'), $filename);
            $variable->logo = $filename;
        }

        if ($request->hasFile('project_file')) {

            $file = $request->file('project_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/files'), $fileName);
            $variable->project_file = $fileName;
        }

        $variable->save();
        return redirect()->back()->with('success',' Project Details Added Successfully');
    }


    public function project_db(Request $request) 
    {
        $project = projects::where('project_id', $request->project_id)->first();

        if (!$project) {
            return back()->with('error', 'Project not found');
        }

        // Prepare data to update
        $updateData = [
            'client_id' => $request->client_id,
            'name' => $request->name,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'priority' => $request->priority,
            'project_value' => $request->project_value,
            'price_type' => $request->price_type,
            'status' => $request->status,
        ];

        if ($request->hasFile('logo')) {

            // Delete old logo if exists
            if ($project->logo && file_exists(public_path('uploads/logo/' . $project->logo))) {
                unlink(public_path('uploads/logo/' . $project->logo));
            }

            // Upload new logo
            $file = $request->file('logo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/logo'), $filename);

            $updateData['logo'] = $filename;
        }

        if ($request->hasFile('project_file')) {

            // Delete old file
            if ($project->project_file && file_exists(public_path('uploads/files/' . $project->project_file))) {
                unlink(public_path('uploads/files/' . $project->project_file));
            }

            // Upload new file
            $file = $request->file('project_file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/files'), $filename);

            $updateData['project_file'] = $filename;
        }

        // Update in DB
        $project->update($updateData);

        return redirect()->back()->with('success', 'Project Updated Successfully');
    }

    public function delete_project(Request $request)
    {
        projects::where('project_id', $request->project_id)->delete();

        return redirect()->back()->with('success', 'Employee Deleted Successfully');
    }



    //TASKS
    public function show_tasks(Request $request){
        $variable=tasks::all();
        $projects=projects::all();
        $employees=employees::all();

        $tasks = collect(); // empty collection
    
        if ($request->project_id) {
        // $tasks = tasks::where('project_id', $request->project_id)->get();
          $tasks = tasks::join('employees', 'tasks.employee_id', '=', 'employees.employee_id')
            ->select(
                'tasks.*',
                'employees.first_name',
                'employees.logo'
            )
            ->where('tasks.project_id', $request->project_id)
            ->get();
         }
        return view('Projects.tasks',compact('variable','projects','employees','tasks'));
    }

     //storing
    public function store_tasks(Request $request){
        $variable=new tasks();
        $variable->title=$request->Input('title');
        $variable->due_date=$request->Input('due_date');
        $variable->description = $request->Input('description');
        $variable->project_id = $request->Input('project_id');
        $variable->employee_id = $request->Input('employee_name');
        $variable->status = $request->Input('status');

        if ($request->hasFile('task_file')) {

            $file = $request->file('task_file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/files'), $fileName);
            $variable->task_file = $fileName;
        }

        $variable->save();
        return redirect()->back()->with('success',' Project Details Added Successfully');
    }

    public function task_db(Request $request) 
    { 
        tasks::where('task_id', $request->task_id) 
        ->update([ 
        'due_date' => $request->due_date, 
        'status' => $request->status, 
        'description' => $request->description,
        ]);
        return redirect()->back()->with('success', 'Task Updated successfully'); 
    }

    public function delete_task(Request $request)
    {
        tasks::where('task_id', $request->task_id)->delete();

        return redirect()->back()->with('success', 'Task Deleted Successfully');
    }

}
