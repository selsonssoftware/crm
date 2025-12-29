<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function expenses(Request $request)
{
    $expenses = Expense::latest()->get();
    return view('Expense.expenses', compact('expenses'));
}


 public function expensesstore(Request $request)
{
        $request->validate([
            'category'        => 'required|string|max:255',
            'expense_date'    => 'required|date',
            'amount'          => 'nullable|numeric',
            'payment_method'  => 'nullable|string|max:50',
        ]);

        Expense::create([
            'category'        => $request->category,
            'expense_date'    => $request->expense_date,
            'amount'          => $request->amount,
            'payment_method'  => $request->payment_method,
        ]);

        return redirect()->back()->with('success', 'Expense added successfully');
}


public function expensessave(Request $request)
{
        $request->validate([
            'expense_id'      => 'required|exists:expenses,expense_id',
            'category'        => 'required|string|max:255',
            'expense_date'    => 'required|date',
            'amount'          => 'nullable|numeric',
            'payment_method'  => 'nullable|string|max:50',
        ]);

        Expense::where('expense_id', $request->expense_id)->update([
            'category'        => $request->category,
            'expense_date'    => $request->expense_date,
            'amount'          => $request->amount,
            'payment_method'  => $request->payment_method,
        ]);

        return redirect()->back()->with('success', 'Expense updated successfully');
}


 public function delete_expenses(Request $request)
{
        Expense::where('expense_id', $request->expense_id)->delete();

        return redirect()->back()->with('delete', 'Expense deleted successfully');
}

        



}
