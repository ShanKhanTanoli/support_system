<?php

namespace App\Helpers;

use App\Models\Thread as ThreadModel;

class Thread
{
    //Start the thread
    public static function Start($user, $ticket, $question)
    {
        //Return this thread
        return ThreadModel::create([
            'user_id' => $user->id,
            'ticket_id' => $ticket->id,
            'question' => $question,
        ]);
    }

    //Find Thread
    public static function Find($id)
    {
        return ThreadModel::find($id);
    }
}
