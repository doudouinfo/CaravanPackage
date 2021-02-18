<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeparturePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departure_prices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('departure_id');
            $table->string('rooms_type',255);
            $table->float('single_price', 10, 0);
            $table->float('double_price', 10, 0);
            $table->float('triple_price', 10, 0);
            $table->float('family_price', 10, 0);
            $table->integer('children_price_type')->default(0);
            $table->float('children_price_1', 10, 0);
            $table->string('children_age_1',50);
            $table->float('children_price_2', 10, 0);
            $table->string('children_age_2',50);
            $table->float('children_price_3', 10, 0);
            $table->string('children_age_3',50);
            $table->float('baby_price', 10, 0);
            $table->string('commission_type', 20);
            $table->float('adult_commission', 10,0);
            $table->float('children_commission_1', 10,0);
            $table->float('children_commission_2', 10,0);
            $table->float('children_commission_3', 10,0);
            $table->float('baby_commission', 10,0);
            $table->integer('cancelable')->default(0);
            $table->string('penalty_type')->default('percentage');
            $table->text('cancellation_policy')->nullable(); //Array
            $table->integer('deadline')->default(48);
            $table->string('extras',255);
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
        Schema::dropIfExists('departure_prices');
    }
}
