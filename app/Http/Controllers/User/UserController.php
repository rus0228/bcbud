<?php

namespace App\Http\Controllers\User;

use App\Models\Employee;
use App\Models\Event;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('users.index');
    }

    public function get_users(){
        $users = DB::table('users')->get();
        return view('users.get', ['users' => $users]);
    }

    public function add_user(){
        return view('users.add');
    }

    public function insert_user(Request $request, Faker $faker){
        $input = $request->all();
        User::create([
            'name' => $input['name'],
            'email' => $faker->unique()->safeEmail,
            'password' => Hash::make('000000'),
            'can_add_user' => $input['can_add_user'] == '1' ? true : false,
            'phone_number' => $input['phone_number']
        ]);
        return 'success';
    }

    public function get_events(){
        $events = DB::table('events')->get();
        return view('users.events.index', ['events' => $events]);
    }

    public function add_event(){
        return view('users.events.add');
    }

    public function insert_event(Request $request){
        $input = $request->all();
        Event::create([
            'name' => $input['name'],
            'open_event_datetime' => $input['open_event'],
            'user_id' => auth()->id(),
            'close_event_datetime' => $input['close_event'],
            'cost_per_bid' => $input['cost_per_bid'],
            'preliminary_publish_list_time' => $input['preliminary_publish_list_time'],
            'bid_end_time' => $input['bid_end_time'],
            'list_published_time' => $input['list_published_time'],
            'lottery_draw_time' => $input['lottery_draw_time'],
        ]);
        return 'success';
    }

    public function get_employees(){
        $employees = DB::table('employees')->get();
        return view('users.employees.index', ['employees' => $employees]);
    }

    public function add_employee(){
        $events = DB::table('events')->where('user_id', auth()->id())->get();
        return view('users.employees.add', ['events' => $events]);
    }

    public function insert_employee(Request $request){
        $input = $request->all();
        Employee::create([
            'event' => $input['event'],
            'name' => $input['name'],
            'phone_number' => $input['phone_number'],
            'password' => Hash::make('000000'),
        ]);
        return 'success';
    }
}

