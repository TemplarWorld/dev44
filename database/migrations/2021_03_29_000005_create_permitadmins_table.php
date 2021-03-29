<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitadminsTable extends Migration
{
    public function up()
    {
        Schema::create('permitadmins', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('permit_approval')->nullable();
            $table->string('workorder_1')->nullable();
            $table->string('workorder_2')->nullable();
            $table->longText('permit_description')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('system_isolation_1')->nullable();
            $table->date('start_date_iso_1')->nullable();
            $table->date('end_date_iso_1');
            $table->time('start_time_iso_1')->nullable();
            $table->time('end_time_iso_1');
            $table->string('system_iso_1_description');
            $table->string('related_permit')->nullable();
            $table->boolean('hot_work_req')->default(0)->nullable();
            $table->boolean('icra_req')->default(0)->nullable();
            $table->boolean('hoarding_req')->default(0)->nullable();
            $table->boolean('area_hazard')->default(0)->nullable();
            $table->boolean('welding_brazing_silfoss')->default(0)->nullable();
            $table->string('type_of_abatement')->nullable();
            $table->boolean('jha_swp')->default(0)->nullable();
            $table->string('fall_protection_plan')->nullable();
            $table->boolean('confined_space_entry_plan')->default(0)->nullable();
            $table->boolean('mold_removal_plan')->default(0)->nullable();
            $table->longText('site_conditions')->nullable();
            $table->longText('additional_information')->nullable();
            $table->datetime('permit_approval_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
