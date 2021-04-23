<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Event extends Model
{
    use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'user_id',
        'open_event_datetime',
        'close_event_datetime',
        'cost_per_bid',
        'preliminary_publish_list_time',
        'bid_end_time',
        'list_published_time',
        'lottery_draw_time'
    ];

}
