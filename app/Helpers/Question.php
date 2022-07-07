<?php

namespace App\Helpers;

use App\Models\Question as QuestionModel;

class Question
{
    //Agent will answer
    public static function Start($customer, $ticket, $question)
    {
        //Create a Question
        $question = QuestionModel::create([
            'customer_id' => $customer->id,
            'ticket_id' => $ticket->id,
            'question' => $question,
        ]);
        //Return the question variable
        return $question;
    }

    //Find Question
    public static function Find($id)
    {
        return QuestionModel::find($id);
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
}
