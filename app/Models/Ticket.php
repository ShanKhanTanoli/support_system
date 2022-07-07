<?php

namespace App\Models;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['ticket', 'status', 'customer_name', 'customer_email', 'support_type'];


    //Ticket has many questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    //Ticket has many answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
