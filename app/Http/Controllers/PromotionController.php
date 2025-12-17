<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Promotion;

class PromotionController extends Controller
{
    public function promotions()
    {
        $promotions = DB::table('promotions')
            ->join('employees', 'employees.employee_id', '=', 'promotions.employee_id')
            ->join('departments', 'departments.department_id', '=', 'employees.department_id')
            ->join('designations as old_des', 'old_des.designation_id', '=', 'promotions.old_designation_id')
            ->join('designations as new_des', 'new_des.designation_id', '=', 'promotions.new_designation_id')
            ->select(
                'promotions.*',
                DB::raw("CONCAT(employees.first_name, ' ', employees.last_name) as employee_name"),
                'employees.logo as employee_logo', 
                'departments.name as department_name',
                'old_des.title as old_designation',
                'new_des.title as new_designation'
            )
            ->distinct()
            ->orderByDesc('promotions.promotion_id')
            ->get();

        $employees    = DB::table('employees')->get();
        $designations = DB::table('designations')->get();

        return view('Promotion.promotions', compact('promotions','employees','designations'));
    }

    public function promotionsstore(Request $request)
    {
        $request->validate([
            'employee_id'        => 'required|integer',
            'old_designation_id' => 'required|integer',
            'new_designation_id' => 'required|integer',
            'promotion_date'     => 'required|date',
        ]);

        DB::table('promotions')->insert([
            'employee_id'        => $request->employee_id,
            'old_designation_id' => $request->old_designation_id,
            'new_designation_id' => $request->new_designation_id,
            'promotion_date'     => $request->promotion_date,
            'created_at'         => now(),
            'updated_at'         => now(),
        ]);

        return redirect()->back()->with('success', 'promotion added successfully');

    }

    public function promotionssave(Request $request)
    {
        $request->validate([
            'promotion_id'       => 'required|exists:promotions,promotion_id',
            'employee_id'        => 'required|integer',
            'old_designation_id' => 'required|integer',
            'new_designation_id' => 'required|integer',
            'promotion_date'     => 'required|date',
        ]);

        DB::table('promotions')
            ->where('promotion_id', $request->promotion_id)
            ->update([
                'employee_id'        => $request->employee_id,
                'old_designation_id' => $request->old_designation_id,
                'new_designation_id' => $request->new_designation_id,
                'promotion_date'     => $request->promotion_date,
                'updated_at'         => now(),
            ]);

        return back()->with('success', 'Promotion updated successfully');
    }

    public function delete_promotions(Request $request)
    {
        Promotion::where('promotion_id', $request->promotion_id)->delete();
        return back()->with('delete', 'Promotion deleted successfully');
    }
}
