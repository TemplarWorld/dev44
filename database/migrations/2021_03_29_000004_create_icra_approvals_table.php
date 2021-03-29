<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcraApprovalsTable extends Migration
{
    public function up()
    {
        Schema::create('icra_approvals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('icra_app_dept')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
