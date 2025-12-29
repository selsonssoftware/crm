<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;
use App\Models\Contact;
use App\Models\projects;
use App\Models\Estimate_items;

class EstimateController extends Controller
{
    public function estimate(Request $request)
    {

        $contact = contact::all();
         $data = Estimate::leftJoin('contacts', 'contacts.contact_id', '=', 'estimate.client_id')->leftJoin('projects', 'projects.project_id', '=', 'estimate.employee_id')->select('estimate.*', 'projects.name', 'contacts.first_name', 'contacts.last_name')->latest()->get();
        $projects = projects::all();
        $estimate_items = estimate_items::all();

        return view('sales.estimate', compact('data', 'contact', 'projects', 'estimate_items'));
    }

    public function store_estimate(Request $request)
    {

        $total = 0;

        foreach ($request->unit_cost as $i => $cost) {
            $qty = $request->qty[$i] ?? 1;
            $amount = $cost * $qty;
            $total += $amount;
        }


        $taxPercent = $request->tax ?? 0;
        $discountPercent = $request->discount ?? 0;

        $discountAmount = ($total * $discountPercent) / 100;
        $subTotal = $total - $discountAmount;

        $taxAmount = ($subTotal * $taxPercent) / 100;

        $grandTotal = $subTotal + $taxAmount;

        $estimate = Estimate::create([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'client_address' => $request->client_address,
            'billing_address' => $request->billing_address,
            'estimate_date' => date('Y-m-d', strtotime($request->estimate_date)),
            'expiry_date' => date('Y-m-d', strtotime($request->expiry_date)),
            'total' => $total,
            'tax' => $taxPercent,
            'discount' => $discountPercent,
            'grand_total' => $grandTotal,
            'other_information' => $request->other_information,
        ]);


        foreach ($request->item as $i => $itemName) {
            Estimate_items::create([
                'estimate_Id' => $estimate->estimate_Id,
                'items' => $itemName,
                'description' => $request->description[$i] ?? '',
                'quantity' => $request->qty[$i] ?? 0,
                'unit_cost' => $request->unit_cost[$i] ?? 0,
                'amount' => ($request->unit_cost[$i] ?? 0) * ($request->qty[$i] ?? 0),
            ]);
        }

        return redirect()->back()->with('success', 'Estimate added successfully!');
    }


    public function update_estimate(Request $request)
    {
        
        $estimate = Estimate::where('estimate_Id', $request->estimate_Id)->firstOrFail();

        $total = 0;

        if ($request->has('unit_cost')) {
            foreach ($request->unit_cost as $i => $cost) {
                $qty = $request->qty[$i] ?? 1;
                $total += ($cost * $qty);
            }
        }

        $taxPercent = $request->tax ?? 0;
        $discountPercent = $request->discount ?? 0;

       $discountAmount = ($total * $discountPercent) / 100;
        $subTotal = $total - $discountAmount;

        $taxAmount = ($subTotal * $taxPercent) / 100;

        $grandTotal = $subTotal + $taxAmount;


        $estimate->update([
            'client_id' => $request->client_id,
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'client_address' => $request->client_address,
            'billing_address' => $request->billing_address,
            'estimate_date' => date('Y-m-d', strtotime($request->estimate_date)),
            'expiry_date' => date('Y-m-d', strtotime($request->expiry_date)),
            'total' => $total,
            'tax' => $taxPercent,
            'discount' => $discountPercent,
            'grand_total' => $grandTotal,
            'other_information' => $request->other_information,
        ]);

        Estimate_items::where('estimate_Id', $estimate->estimate_Id)->delete();

        if ($request->has('item')) {
            foreach ($request->item as $i => $itemName) {

                Estimate_items::create([
                    'estimate_Id' => $estimate->estimate_Id,
                    'items' => $itemName,
                    'description' => $request->description[$i] ?? '',
                    'quantity' => $request->qty[$i] ?? 0,
                    'unit_cost' => $request->unit_cost[$i] ?? 0,
                    'amount' => ($request->unit_cost[$i] ?? 0) * ($request->qty[$i] ?? 0),
                ]);
            }
        }

        return redirect()->back()->with('success', 'Estimate updated successfully!');
    }


    public function delete_estimate(Request $request)
    {
        Estimate::where('estimate_Id', $request->estimate_Id)->delete();

        return redirect()->back()->with('delete', 'Estimate Details Deleted Successfully');
    }

}
