<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Mail\TicketAnswered;
use Illuminate\Support\Facades\Mail;
use App\Models\Ticket as TicketModel;

class Ticket
{
    //Agent will answer
    public static function Open($customer, $support_type)
    {
        //Create ticket and return it
        return TicketModel::create([
            'ticket' => strtoupper(Str::random(10)),
            'customer_name' => $customer->name,
            'customer_email' => $customer->email,
            'support_type' => $support_type,
        ]);
    }

    //Find Ticket
    public static function Find($id)
    {
        return TicketModel::find($id);
    }

    //Mark as answered
    public static function MarkAnswered($customer, $ticket)
    {
        //pass the data to view
        $data = [
            'to' => $customer->email,
            'subject' => 'Ticket Answered',
            'customer_name' => $customer->name,
            'ticket' => $ticket->ticket,
            'support_type' => $ticket->support_type,
            'status' => "answered",
        ];

        //Mail To
        Mail::send(new TicketAnswered($data));

        return $ticket->update([
            'status' => "answered",
        ]);
    }

    //Mark as spam
    public static function MarkSpam($ticket)
    {
        return $ticket->update([
            'status' => "spam",
        ]);
    }
}
