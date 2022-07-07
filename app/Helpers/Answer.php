<?php

namespace App\Helpers;

use App\Models\Answer as AnswerModel;

class Answer
{
    //Agent will answer
    public static function Start($agent, $ticket, $question, $answer)
    {
        //If status is not in_progress then update the status
        if ($ticket->status !== "in_progress") {
            //Update Ticket Status
            $ticket->update(['status' => 'in_progress']);
        }

        //Answer that question
        $answer = AnswerModel::create([
            'user_id' => $agent->id,
            'ticket_id' => $ticket->id,
            'question_id' => $question->id,
            'answer' => $answer,
        ]);

        //Return the answer variable
        return $answer;
    }


    //Find Answer
    public static function Find($id)
    {
        return AnswerModel::find($id);
    }
}
