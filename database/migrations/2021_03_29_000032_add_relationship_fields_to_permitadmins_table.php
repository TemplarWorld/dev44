<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPermitadminsTable extends Migration
{
    public function up()
    {
        Schema::table('permitadmins', function (Blueprint $table) {
            $table->unsignedBigInteger('name_id')->nullable();
            $table->foreign('name_id', 'name_fk_3523943')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_number_id')->nullable();
            $table->foreign('project_number_id', 'project_number_fk_3523944')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_manager_id')->nullable();
            $table->foreign('project_manager_id', 'project_manager_fk_3523945')->references('id')->on('users');
            $table->unsignedBigInteger('project_coordinator_id')->nullable();
            $table->foreign('project_coordinator_id', 'project_coordinator_fk_3523946')->references('id')->on('users');
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3523948')->references('id')->on('teams');
            $table->unsignedBigInteger('project_site_id')->nullable();
            $table->foreign('project_site_id', 'project_site_fk_3523950')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_building_id')->nullable();
            $table->foreign('project_building_id', 'project_building_fk_3523951')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_area_id')->nullable();
            $table->foreign('project_area_id', 'project_area_fk_3523952')->references('id')->on('time_projects');
            $table->unsignedBigInteger('iso_1_contractor_id')->nullable();
            $table->foreign('iso_1_contractor_id', 'iso_1_contractor_fk_3523962')->references('id')->on('contractors');
            $table->unsignedBigInteger('permit_approved_by_id')->nullable();
            $table->foreign('permit_approved_by_id', 'permit_approved_by_fk_3523980')->references('id')->on('approvals');
            $table->unsignedBigInteger('contractor_name_id')->nullable();
            $table->foreign('contractor_name_id', 'contractor_name_fk_3525522')->references('id')->on('contractors');
            $table->unsignedBigInteger('site_supervisor_tel_id')->nullable();
            $table->foreign('site_supervisor_tel_id', 'site_supervisor_tel_fk_3525523')->references('id')->on('id_tags');
            $table->unsignedBigInteger('site_supervisor_email_id')->nullable();
            $table->foreign('site_supervisor_email_id', 'site_supervisor_email_fk_3525524')->references('id')->on('id_tags');
            $table->unsignedBigInteger('iso_contractor_supervisor_id')->nullable();
            $table->foreign('iso_contractor_supervisor_id', 'iso_contractor_supervisor_fk_3525525')->references('id')->on('id_tags');
            $table->unsignedBigInteger('iso_supervisor_tel_id')->nullable();
            $table->foreign('iso_supervisor_tel_id', 'iso_supervisor_tel_fk_3525526')->references('id')->on('id_tags');
            $table->unsignedBigInteger('iso_supervisor_email_id')->nullable();
            $table->foreign('iso_supervisor_email_id', 'iso_supervisor_email_fk_3525527')->references('id')->on('id_tags');
            $table->unsignedBigInteger('contractor_supervisor_id')->nullable();
            $table->foreign('contractor_supervisor_id', 'contractor_supervisor_fk_3525529')->references('id')->on('id_tags');
            $table->unsignedBigInteger('submitted_by_id')->nullable();
            $table->foreign('submitted_by_id', 'submitted_by_fk_3525635')->references('id')->on('users');
            $table->unsignedBigInteger('work_type_id')->nullable();
            $table->foreign('work_type_id', 'work_type_fk_3541881')->references('id')->on('time_work_types');
        });
    }
}
