<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\invoices;
use App\Models\contacts;
use App\Models\invoice_items;
use App\Models\general_settings;
class InvoiceController extends Controller
{
    public function view_invoice(Request $request){
      $invoices = invoices::join('contacts','invoices.customer','=','contacts.contact_id')
       ->select(
        'invoices.*',
        'contacts.*'
       )->get();
        return view ('Invoice.invoice',compact('invoices'));
    }
    

    public function add_invoice(Request $request){
        $clients=contacts::all();
        $site_details=general_settings::all();
        return view ('Invoice.Add_Invoice',compact('clients','site_details'));
    }

      public function store_invoice(Request $request)
      {
        $variable = new invoices();
        $variable->invoice_title = $request->Input('invoice_title');
        $variable->invoice_no = $request->Input('invoice_no');
        $variable->invoice_date=$request->Input('invoice_date');
        $variable->due_date=$request->Input('due_date');
        $variable->customer=$request->Input('contact_id');
        $variable->reference_no = $request->Input('reference_no');
        $variable->payment_type = $request->Input('payment_type');
        $variable->bank_details = $request->Input('bank_details');
        $variable->invoice_description=$request->Input('invoice_description');
        $variable->notes=$request->Input('notes');
        $variable->invoice_number = 'INV-' . mt_rand(1000, 9999);
        $variable->amount = $request->Input('amount');
        $variable->total = $request->Input('grand_total');
        $variable->tax=$request->Input('tax');
        $variable->discount=$request->discount;
        $variable->save();

        $descriptions = is_array($request->description) ? $request->description : [$request->description];
        $quantities   = is_array($request->quantity) ? $request->quantity : [$request->quantity];
        //$discounts    = is_array($request->discount) ? $request->discount : [$request->discount];
        $rates        = is_array($request->rate) ? $request->rate : [$request->rate];
        foreach ($descriptions as $key => $desc) {
            invoice_items::create([
                'invoice_id' => $variable->invoice_id,
                'description' => $desc,
                'quantity' => $quantities[$key] ?? 0,
                //'discount' => $discounts[$key] ?? 0,
                'rate' => $rates[$key] ?? 0,
            ]);
        }

         return redirect()->back()->with('success','Invoice Generated Successfully');
    }

    // public function invoice_details(Request $request){
    //     return view ('Invoice.Invoice_Details');
    // }

    public function edit_invoice(Request $request){
        $site_details=general_settings::all();
        $clients=contacts::all();
       $updateddata=invoices::where('invoice_id',$request->invoice_id)->first();
       $items = invoice_items::where('invoice_id', $request->invoice_id)->get();
        return view ('Invoice.Edit_Invoice',compact('site_details','clients','updateddata','items'));
    }

    public function updated_invoice(Request $request)
{
    $invoice = invoices::findOrFail($request->invoice_id);

    $invoice->invoice_title = $request->input('invoice_title');
    $invoice->invoice_no = $request->input('invoice_no');
    $invoice->invoice_date = $request->input('invoice_date');
    $invoice->due_date = $request->input('due_date');
    $invoice->customer = $request->input('contact_id');
    $invoice->reference_no = $request->input('reference_no');
    $invoice->payment_type = $request->input('payment_type');
    $invoice->bank_details = $request->input('bank_details');
    $invoice->invoice_description = $request->input('invoice_description');
    $invoice->notes = $request->input('notes');
    $invoice->amount = $request->input('amount');
    $invoice->total = $request->input('grand_total');
    $invoice->tax = $request->input('tax');
    $invoice->discount = $request->input('discount');

    $invoice->save();

    // Update items: optional - you may want to delete old items and insert new
    invoice_items::where('invoice_id', $invoice->invoice_id)->delete();

    $descriptions = is_array($request->description) ? $request->description : [$request->description];
    $quantities = is_array($request->quantity) ? $request->quantity : [$request->quantity];
    $rates = is_array($request->rate) ? $request->rate : [$request->rate];

    foreach ($descriptions as $key => $desc) {
        invoice_items::create([
            'invoice_id' => $invoice->invoice_id,
            'description' => $desc,
            'quantity' => $quantities[$key] ?? 0,
            'rate' => $rates[$key] ?? 0,
        ]);
    }

    return redirect()->route('show')->with('success', 'Invoice updated successfully');
}
    public function download_invoice($invoice_id)
{
  $download = invoices::join('contacts', 'invoices.customer', '=', 'contacts.contact_id')
    //->join('invoice_items','invoices.invoice_id','=','invoice_items.invoice_id')
        ->where('invoices.invoice_id', $invoice_id)
        ->select(
            'invoices.*',
            'contacts.first_name',
            'contacts.last_name',
            'contacts.email',
            'contacts.phone',
            //'invoice_items.*'
        )
        ->get(); // SINGLE invoice

    if (!$download) {
        return redirect()->back()->with('error', 'Invoice not found');
    }
    $items = invoice_items::where('invoice_id',$invoice_id)->get();
    $details = general_settings::first();
    $data=$download;
    return view('Invoice.Download_Invoice', compact('download', 'details','items','data'));
}
public function delete_invoice(Request $request)
    {
        invoices::where('invoice_id', $request->invoice_id)->delete();

        return redirect()->back()->with('success', 'Invoice Deleted Successfully');
    }

}
