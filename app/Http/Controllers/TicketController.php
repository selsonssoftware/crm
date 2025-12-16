<?php

namespace App\Http\Controllers;
use App\Models\tickets;
use App\Models\employees;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function show_tickets(Request $request){
        $employees=employees::all();
    //    $variable=tickets::join('employees','tickets.assign_to','=','employees.employee_id')
    //     ->select(
    //         'employees.logo',
    //         'employees.first_name',
    //         'tickets.*'
    //     )->get();
        $variable = tickets::join('employees', 'tickets.assign_to', '=', 'employees.employee_id')
            ->select(
                'employees.logo',
                'employees.first_name',
                'employees.last_name',
                'tickets.*'
            );

        //STATUS FILTER
        if ($request->has('status') && $request->status != '') {
            $variable->where('tickets.status', $request->status);
        }

        $variable = $variable->get();
        $newTickets = tickets::whereDate('created_at', Carbon::today())->count();
        $openTickets=tickets::where('status','Open')->count();
        $closeTicket=tickets::where('status','Close')->count();
        $onProcess=tickets::where('status','On Process')->count();
        return view('Tickets.tickets',compact('employees','variable','newTickets','openTickets','closeTicket','onProcess'));
    }

    public function store_tickets(Request $request){
         $lastTicket = tickets::orderBy('ticket_id', 'desc')->first();

            if ($lastTicket && $lastTicket->ticket_number) {
                $lastNumber = (int) str_replace('TCN-', '', $lastTicket->ticket_number);
                $nextNumber = $lastNumber + 1;
            } else {
                $nextNumber = 1;
            }

            $ticketNo = 'TCN-' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

        $variable=new tickets();
         $variable->ticket_number = $ticketNo;
        $variable->title=$request->Input('title');
        $variable->event_category=$request->Input('event_category');
        $variable->subject = $request->Input('subject');
        $variable->assign_to = $request->Input('assign_to');
        $variable->ticket_description= $request->Input('ticket_description');
        $variable->priority = $request->Input('priority');
        $variable->status = $request->Input('status');
        $variable->save();
         return redirect()->back()->with('success',' Ticket Details Added Successfully');
    }



public function ticket_details($ticket_id)
{
  $ticket =tickets::join('employees', 'employees.employee_id', '=', 'tickets.assign_to')
    ->where('tickets.ticket_id', $ticket_id)
    ->select('tickets.*', 'employees.first_name', 'employees.last_name','employees.logo')
    ->firstOrFail();
   $employees=employees::all();
    return view('Tickets.ticket_details', compact('ticket','employees'));
}

public function db_tickect(Request $request, $ticket_id)
{
    $ticket = tickets::findOrFail($ticket_id);

    $ticket->assign_to = $request->assign_to;
    $ticket->priority  = $request->priority;
    $ticket->status    = $request->status;
    $ticket->save();

    return redirect()->back()->with('success', 'Ticket Details Updated Successfully');
}


}
