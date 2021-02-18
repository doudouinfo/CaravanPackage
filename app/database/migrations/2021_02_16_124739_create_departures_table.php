<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeparturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departures', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('package_id')->unsigned()->index('package_id');
            $table->date('departure_date');
            $table->date('return_date');
            $table->integer('number_seats');
            $table->string('means_transport', 191);
            $table->text('itinerary')->nullable();
            $table->integer('flight_id')->unsigned()->index('flight_id');
            $table->integer('transport')->nullable();
            $table->boolean('visa')->default(0);
            $table->float('fee_visa', 10, 0)->default(0);
            $table->boolean('transfer')->default(0);
            $table->float('fee_transfer', 10, 0)->default(0);
            $table->text('hotel');// Array
            $table->float('fee_ini', 10, 0)->default(0);
            $table->integer('promotion')->nullable();
            $table->float('fee_promo', 10, 0)->default(0);
            $table->text('includes')->nullable();
            $table->text('excludes')->nullable();
            $table->text('program')->nullable();// Array
            $table->integer('booked_seats')->default(0);
            $table->integer('user_id')->unsigned()->index('user_id');
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
        Schema::dropIfExists('departures');
    }
}
