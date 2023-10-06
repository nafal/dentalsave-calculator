<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePrefixNetworksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prefix_networks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('network_id')->unsigned()->index();
            $table->foreign('network_id')->references('id')->on('networks');
             $table->integer('pincode_id')->unsigned()->index();
            $table->foreign('pincode_id')->references('id')->on('pincodes');
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
        Schema::dropIfExists('prefix_networks');
    }
}
