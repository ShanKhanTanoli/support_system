<?php

namespace App\Models;

use App\Models\Answer;
use App\Models\Ticket;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'ticket_id',
        'question',
    ];

    //Question belongs to this ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    //Question has many answers
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    //Question belongs to this customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
