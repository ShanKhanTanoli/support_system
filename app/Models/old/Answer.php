<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_id',
        'question_id',
        'answer',
    ];


    //Answer belongs to this ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    //Answer belongs to this question
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
