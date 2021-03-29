<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissioningsTable extends Migration
{
    public function up()
    {
        Schema::create('commissionings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comm_system_1')->nullable();
            $table->string('comm_location_1')->nullable();
            $table->string('comm_description_1')->nullable();
            $table->date('comm_datestart_1')->nullable();
            $table->date('comm_enddate_1')->nullable();
            $table->time('comm_starttime_1')->nullable();
            $table->time('comm_endtime')->nullable();
            $table->string('comm_1_worko')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
