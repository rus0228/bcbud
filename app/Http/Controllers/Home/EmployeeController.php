<?php

namespace App\Http\Controllers\Home;

use App\Exports\BidsExport;
use App\Http\Controllers\Controller;
use App\Imports\CarsImport;
use App\Models\Bid;
use App\Models\Bidder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;
use App\Exports\BiddersExport;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.employee');
    }


    // Car::
    public function get_open_cars(){
        $cars = DB::table('cars')
            ->where('event', auth()->user()->event)
            ->get();
        return view('home.cars.index', ['cars' => $cars]);
    }

    public function import_cars(){
        Excel::import(new CarsImport, request()->file('file'));
        return back();
    }

    public function publish_cars_present(){
        $event = auth()->user()->event;
        DB::table('events')
            ->where('name', $event)
            ->update([
                'preliminary_publish_list_time' => Carbon::now()->toDateTime(),
            ]);
        return redirect('employee/open_cars')
            ->with('status', 'Current cars list published to the present time.');
    }

    public function set_bidding_end_time(Request $request){
        $input = $request->all();
        $event = auth()->user()->event;
        DB::table('events')
            ->where('name', $event)
            ->update([
                'bid_end_time' => $input['set_bidding_end_time'],
            ]);
        return redirect('employee/open_cars')
            ->with('status', 'Bidding end time was just set successfully.');
    }

    public function set_estimated_draw_time(Request $request){
        $input = $request->all();
        $event = auth()->user()->event;
        DB::table('events')
            ->where('name', $event)
            ->update([
                'lottery_draw_time' => $input['set_estimated_draw_time'],
            ]);
        return redirect('employee/open_cars')
            ->with('status', 'Estimated draw time was just set successfully.');
    }


    // Bidder::
    public function get_bidders(){
        $bidders = DB::table('bidders')->get();
        return view('home.bidders.index', ['bidders' => $bidders]);
    }

    public function add_bidder(){
        return view('home.bidders.add');
    }

    public function insert_bidder(Request $request){
        $input = $request->all();
        Bidder::create([
            'name' => $input['name'],
            'phone_number' => $input['phone_number']
        ]);
        return redirect('employee/get_bidders')
            ->with('status', 'Bidder "' . $input['name'] . '" was just added manually.');
    }

    public function edit_bidder($id){
        $bidders = DB::table('bidders')
            ->where('id', $id)
            ->get();
        return view('home.bidders.edit', ['bidder' => $bidders[0]]);
    }

    public function update_bidder(Request $request){
        $input = $request->all();
        DB::table('bidders')
            ->where('id', $input['id'])
            ->update([
                'name' => $input['name'],
                'phone_number' => $input['phone_number']
            ]);
        return redirect('employee/get_bidders')
            ->with('status', 'Bidder "' . $input['name'] . '" was just updated manually.');
    }

    public function delete_bidder($id){
        DB::table('bidders')->where('id', $id)->delete();
        return redirect('employee/get_bidders')
            ->with('status', 'Bidder whose id is ' . $id . ' has just been deleted successfully.');
    }

    public function export_bidder(){
        return Excel::download(new BiddersExport, 'bidders'.time().'.xlsx');
    }


    // Bid::

    public function get_bids(){
        $bids = DB::table('bids')->get();
        return view('home.bids.index', ['bids' => $bids]);
    }

    public function add_bid(){
        $cars = DB::table('cars')->get();
        return view('home.bids.add', ['cars' => $cars]);
    }

    public function insert_bid(Request $request){
        $input = $request->all();

        Bid::create([
            'car_number' => $input['car_number'],
            'number_of_bids' => $input['number_of_bids'],
            'name' => $input['name'],
            'total_price_lottery_tickets' => $input['total_price_lottery_tickets'],
            'invoice_sent' => $input['invoice_sent'] == '1' ? true : false,
            'paid_by_vips' => $input['paid_by_vips'],
            'paid_manually' => $input['paid_manually'],
            'ready_for_draw' => $input['ready_for_draw'] == '1' ? true : false,
            'tickets_created' => $input['tickets_created']
        ]);

        return redirect('employee/get_bids')
            ->with('status', 'Bid "' . $input['name'] . '" was just added manually.');
    }

    public function export_bid(){
        return Excel::download(new BidsExport, 'bids'.time().'.xlsx');
    }
}
