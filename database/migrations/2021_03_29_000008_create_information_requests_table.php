<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('information_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('requested_by');
            $table->string('project_name');
            $table->string('req_email');
            $table->datetime('info_date_req');
            $table->string('info_tel')->nullable();
            $table->longText('info_descrip');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
