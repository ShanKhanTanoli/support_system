<?php

namespace App\Helpers;

use Illuminate\Support\Str;
use App\Mail\TicketAnswered;
use App\Models\Customer;
use Illuminate\Support\Facades\Mail;
use App\Models\Ticket as TicketModel;
use App\Models\User;

class Ticket
{
    //Agent will answer
    public static function Open($customer, $support_type)
    {
        //Create a Question
        $ticket = TicketModel::create([
            'ticket' => strtoupper(Str::random(10)),
            'customer_name' => $customer->name,
            'customer_email' => $customer->email,
            'support_type' => $support_type,
        ]);

        //Return the question variable
        return $ticket;
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

    //All questions on this ticket
    public static function Questions($ticket)
    {
        return $ticket->questions;
    }

    //All answers on this ticket
    public static function Answers($ticket)
    {
        return $ticket->answers;
    }

    //Belongs to a customer
    public static function Customer($ticket)
    {
        $email = $ticket->customer_email;
        return Customer::where('email', $email)->first();
    }
}
