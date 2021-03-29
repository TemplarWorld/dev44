<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIcrasTable extends Migration
{
    public function up()
    {
        Schema::table('icras', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3523870')->references('id')->on('teams');
            $table->unsignedBigInteger('project_name_id')->nullable();
            $table->foreign('project_name_id', 'project_name_fk_3524982')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_number_id')->nullable();
            $table->foreign('project_number_id', 'project_number_fk_3524983')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_manager_id')->nullable();
            $table->foreign('project_manager_id', 'project_manager_fk_3524984')->references('id')->on('users');
            $table->unsignedBigInteger('project_coordinator_id')->nullable();
            $table->foreign('project_coordinator_id', 'project_coordinator_fk_3524985')->references('id')->on('users');
            $table->unsignedBigInteger('contractor_name_id')->nullable();
            $table->foreign('contractor_name_id', 'contractor_name_fk_3524986')->references('id')->on('contractors');
            $table->unsignedBigInteger('project_description_id')->nullable();
            $table->foreign('project_description_id', 'project_description_fk_3524991')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_site_id')->nullable();
            $table->foreign('project_site_id', 'project_site_fk_3524992')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_building_id')->nullable();
            $table->foreign('project_building_id', 'project_building_fk_3524993')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_area_id')->nullable();
            $table->foreign('project_area_id', 'project_area_fk_3524994')->references('id')->on('time_projects');
            $table->unsignedBigInteger('icra_approved_by_1_id')->nullable();
            $table->foreign('icra_approved_by_1_id', 'icra_approved_by_1_fk_3524995')->references('id')->on('icra_approvals');
            $table->unsignedBigInteger('icra_approved_by_2_id')->nullable();
            $table->foreign('icra_approved_by_2_id', 'icra_approved_by_2_fk_3524996')->references('id')->on('icra_approvals');
            $table->unsignedBigInteger('icra_approved_by_3_id')->nullable();
            $table->foreign('icra_approved_by_3_id', 'icra_approved_by_3_fk_3524997')->references('id')->on('icra_approvals');
            $table->unsignedBigInteger('icra_approved_by_4_id')->nullable();
            $table->foreign('icra_approved_by_4_id', 'icra_approved_by_4_fk_3524998')->references('id')->on('icra_approvals');
            $table->unsignedBigInteger('contractor_supervisor_id')->nullable();
            $table->foreign('contractor_supervisor_id', 'contractor_supervisor_fk_3525563')->references('id')->on('id_tags');
            $table->unsignedBigInteger('site_supervisor_tel_id')->nullable();
            $table->foreign('site_supervisor_tel_id', 'site_supervisor_tel_fk_3525564')->references('id')->on('id_tags');
            $table->unsignedBigInteger('work_type_id')->nullable();
            $table->foreign('work_type_id', 'work_type_fk_3541882')->references('id')->on('time_work_types');
        });
    }
}
