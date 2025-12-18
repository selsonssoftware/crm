<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\employees;
use App\Models\payroll;
use App\Models\designations;
class PayrollController extends Controller
{
    public function employee_salary(Request $request){
        $employee=employees::all();
      $variable=payroll::join('employees','payroll.employee_id','=','employees.employee_id')
       ->leftJoin('designations', 'employees.designation_id', '=', 'designations.designation_id')
        ->select(
            'employees.first_name',
            'employees.last_name',
            'employees.emp_id',
            'employees.logo',
            'designations.title',
            'payroll.*'
        )->get();
        return view('Payroll.Employee_Salary',compact('employee','variable'));
    } 

    //storing
    public function store_employee_salary(Request $request){

     
        $variable = new payroll();
        $variable->employee_id = $request->Input('employee_id');
        $variable->tds = $request->Input('tds');
        $variable->esi=$request->Input('esi');
        $variable->pf=$request->Input('pf');
        $variable->net_salary = $request->Input('net_salary');
        $variable->basic_salary = $request->Input('basic_salary');
        $variable->da = $request->Input('da');
        $variable->hra=$request->Input('hra');
        $variable->conveyance=$request->Input('conveyance');
        $variable->allowance = $request->Input('allowance');
        $variable->medical_allowance = $request->Input('medical_allowance');
        $variable->others = $request->Input('others');
        $lastPayroll = payroll::latest('payroll_id')->first();
        $lastNumber = $lastPayroll ? intval(preg_replace('/[^0-9]/', '', $lastPayroll->payslip_number)) : 0;
        $newNumber = $lastNumber + 1;
        $variable->payslip_number = '#PS' . str_pad($newNumber, 6, '0', STR_PAD_LEFT);

        $variable->save();
         return redirect()->back()->with('success',' Employee Salary Added Successfully');
    }

    //DELETE
    public function delete_employee_salary(Request $request)
    {
        payroll::where('payroll_id', $request->payroll_id)->delete();

        return redirect()->back()->with('success', 'Employee_Salary Deleted Successfully');
    }

    //DATABASE DATA
     public function db_employee_salary(Request $request)
    {
        $request->validate([
            'payroll_id' => 'required|exists:payroll,payroll_id',
            'employee_id' => 'required|exists:employees,employee_id',
        ]);

        $salary = payroll::find($request->payroll_id);

        if (!$salary) {
            return back()->with('error', 'Employee salary not found');
        }

        $salary->update([
            'employee_id'        => $request->employee_id,
            'tds'                => $request->tds,
            'esi'                => $request->esi,
            'pf'                 => $request->pf,
            'net_salary'         => $request->net_salary,
            'basic_salary'       => $request->basic_salary,
            'da'                 => $request->da,
            'hra'                => $request->hra,
            'conveyance'         => $request->conveyance,
            'allowance'          => $request->allowance,
            'medical_allowance'  => $request->medical_allowance,
            'others'             => $request->others,
        ]);

        return redirect()->back()->with('success', 'Employee Salary updated successfully');
    }


    public function view_payslips($payroll_id)
{
    $payslip = payroll::join('employees','payroll.employee_id','=','employees.employee_id')
        ->leftJoin('designations', 'employees.designation_id', '=', 'designations.designation_id')
        ->where('payroll.payroll_id', $payroll_id)
        ->select(
            'employees.first_name',
            'employees.last_name',
            'employees.email',
            'employees.phone',
            'employees.emp_id',
            'employees.logo',
            'designations.title',
            'payroll.*'
        )
        ->firstOrFail();
        $totalEarnings =($payslip->basic_salary ?? 0) +($payslip->hra ?? 0) +($payslip->conveyance ?? 0) +($payslip->allowance ?? 0);

        $totalDeductions =($payslip->tds ?? 0) +($payslip->pf ?? 0) +($payslip->esi ?? 0)+($payslip->da ?? 0);

        $netSalary = $totalEarnings - $totalDeductions;

    return view('Payroll.payslip', compact('payslip','totalEarnings','totalDeductions','netSalary'));
}


}
