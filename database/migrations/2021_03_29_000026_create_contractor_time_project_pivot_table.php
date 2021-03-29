<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractorTimeProjectPivotTable extends Migration
{
    public function up()
    {
        Schema::create('contractor_time_project', function (Blueprint $table) {
            $table->unsignedBigInteger('time_project_id');
            $table->foreign('time_project_id', 'time_project_id_fk_3525052')->references('id')->on('time_projects')->onDelete('cascade');
            $table->unsignedBigInteger('contractor_id');
            $table->foreign('contractor_id', 'contractor_id_fk_3525052')->references('id')->on('contractors')->onDelete('cascade');
        });
    }
}
