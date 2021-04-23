<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bids', function (Blueprint $table) {
            $table->increments('id');
            $table->string('car_number');
            $table->string('number_of_bids');
            $table->string('name');
            $table->string('total_price_lottery_tickets');
            $table->boolean('invoice_sent');
            $table->string('paid_by_vips');
            $table->string('paid_manually');
            $table->boolean('ready_for_draw');
            $table->string('tickets_created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bids');
    }
}
