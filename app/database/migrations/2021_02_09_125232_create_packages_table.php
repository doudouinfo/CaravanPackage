<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_type', 50);
            $table->string('package_name', 100);
            $table->string('package_status', 50);
            $table->string('category', 191)->nullable();
            $table->string('package_destination', 191)->nullable();
            $table->text('package_description', 65535)->nullable();
            $table->string('package_featured_image', 100)->nullable();
            $table->string('package_gallery', 191)->nullable();
            $table->integer('user_id')->unsigned()->index('user_offers');
            $table->integer('agency_id')->unsigned()->index('agency_offer');
            $table->string('sharing', 191)->nullable()->default('1');
            $table->integer('sharing_all')->nullable()->default(0);
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
        Schema::dropIfExists('packages');
    }
}
