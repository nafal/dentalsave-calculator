<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDentalFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dental_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('procedure_id');
            $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->integer('network_id');
            $table->integer('pincode_id');
            $table->string('dental_fees');
            $table->string('status');
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
        Schema::dropIfExists('dental_fees');
    }
}
