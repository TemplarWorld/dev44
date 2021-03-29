<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorsTable extends Migration
{
    public function up()
    {
        Schema::create('contractors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('contractor_contact');
            $table->string('contractor_street_address');
            $table->string('contractor_city');
            $table->string('contractor_state');
            $table->string('contractor_zip');
            $table->string('contractor_tel')->nullable();
            $table->string('contractor_247_tel');
            $table->string('contractor_tel_2')->nullable();
            $table->string('contractor_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
