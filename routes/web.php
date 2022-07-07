<?php

use App\Models\User;
use App\Helpers\Answer;
use App\Helpers\Ticket;
use App\Helpers\Question;
use App\Models\Customer;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Support System

Route::get('email', function () {
    return view('emails.notification-email');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('debug', function () {

    $customer = Customer::find(1);

    $agent = User::find(1);

    //Open a Ticket
    $ticket = Ticket::Open($customer, 'Technical Support');

    $ticket = Ticket::Find(1);

    //Ask a Question
    //$question = Question::Start($customer, $ticket, 'Hello there');

    $question = Question::Find(1);

    //Answer to the question
    //$answer = Answer::Start($agent, $ticket, $question, "How may i help you ?");

    $answer = Answer::Find(1);

    //return Ticket::MarkSpam($ticket);

    dd(Ticket::Customer($ticket));
});
