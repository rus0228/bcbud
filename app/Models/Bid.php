<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    //

    protected $fillable = [
        'car_number',
        'number_of_bids',
        'name',
        'total_price_lottery_tickets',
        'invoice_sent',
        'paid_by_vips',
        'paid_manually',
        'ready_for_draw',
        'tickets_created'
    ];

}
