<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\Bidder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BidderController extends Controller
{
    public function getAvailableCarsForBid(){

        // get all rows for open_cars: apiV-1
        $data = DB::table('cars')->get();
        return response()->json([
            'success' => true,
            'data' => $data->toArray()
        ]);
    }

    public function sendNewBids(Request $request){
        $input = $request->all();
        foreach ($input['data'] as $item){
            Bid::create([
                'car_number' => $item['carNumber'],
                'number_of_bids' => 1,
                'name' => $input['bidder'],
                'total_price_lottery_tickets' => '*',
                'invoice_sent' => 0,
                'paid_by_vips' => '*',
                'paid_manually' => '*',
                'ready_for_draw' => 0,
                'tickets_created' => '*'
            ]);
        }
        $bids = DB::table('bids')->where('name', $input['bidder'])->get();
        return response()->json($bids);
    }

    public function regBidder(Request $request){
        $input = $request->all();

        return Bidder::create([
            'name' => $input['userName'],
            'phone_number' => $input['phoneNumber']
        ]);
    }
}
