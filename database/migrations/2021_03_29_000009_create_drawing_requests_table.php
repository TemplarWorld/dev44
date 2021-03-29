<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrawingRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('drawing_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tracking_number')->nullable();
            $table->string('dr_requested_by');
            $table->datetime('date_required');
            $table->string('project_building_2')->nullable();
            $table->string('project_area_2')->nullable();
            $table->string('project_building_3')->nullable();
            $table->string('project_area_3')->nullable();
            $table->string('dr_1_discipline')->nullable();
            $table->string('dr_2_discipline')->nullable();
            $table->string('dr_1_civil')->nullable();
            $table->string('dr_2_civil')->nullable();
            $table->string('civil_other')->nullable();
            $table->longText('project_description');
            $table->longText('drawing_number_title')->nullable();
            $table->string('dr_1_type')->nullable();
            $table->string('dr_1_type_description')->nullable();
            $table->string('dr_2_type')->nullable();
            $table->string('dr_2_type_description')->nullable();
            $table->string('dr_3_type')->nullable();
            $table->string('civil_descrip')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
