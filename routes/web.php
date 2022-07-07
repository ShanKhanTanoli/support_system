<?php

use App\Models\User;
use App\Helpers\Answer;
use App\Helpers\Ticket;
use App\Models\Customer;
use App\Helpers\Question;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\PersonalAccessToken;


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


Route::get('/', function () {
    return view('welcome');
});

Route::get('debug', function () {

    $customer = Customer::find(1);

    //$token = $customer->createToken('auth-token')->plainTextToken;

    $customer_token = "1|sW164uAsN1WVG67FwLgtEGiAaPvti77cURHvP9Zo";

    //dd($token);

    $agent = User::find(1);

    //$agent_token = $agent->createToken('auth-token')->plainTextToken;

    //dd(PersonalAccessToken::findToken($agent_token)->tokenable);

    //Open a Ticket
    //$ticket = Ticket::Open($customer, 'Technical Support');

    $ticket = Ticket::Find(1);

    //Ask a Question
    //$question = Question::Start($customer, $ticket, 'Hello there');

    $question = Question::Find(1);

    //Answer to the question
    //$answer = Answer::Start($agent, $ticket, $question, "How may i help you ?");

    $answer = Answer::Find(1);

    $token = PersonalAccessToken::findToken($customer_token);

    dd($token);

    //return Ticket::MarkSpam($ticket);

    
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
