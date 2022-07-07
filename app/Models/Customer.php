<?php

namespace App\Models;

use App\Models\Ticket;
use App\Models\Question;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    //Customer has many tickets
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    //Customer has many questions
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
