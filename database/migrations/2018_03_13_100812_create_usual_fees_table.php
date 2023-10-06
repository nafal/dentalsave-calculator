<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsualFeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usual_fees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->index();
            $table->foreign('course_id')->references('id')->on('courses');
            $table->integer('network_id');
            $table->integer('pincode_id');
            $table->string('fees');
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
        Schema::dropIfExists('usual_fees');
    }
}
