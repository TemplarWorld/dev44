<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteIdsTable extends Migration
{
    public function up()
    {
        Schema::create('site_ids', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('site_name')->nullable();
            $table->string('site_address_1')->nullable();
            $table->string('site_address_2')->nullable();
            $table->string('site_city')->nullable();
            $table->string('site_state')->nullable();
            $table->string('site_country')->nullable();
            $table->string('site_telephone')->nullable();
            $table->string('site_email')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
