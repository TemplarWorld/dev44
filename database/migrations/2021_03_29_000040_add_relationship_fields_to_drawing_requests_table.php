<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDrawingRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('drawing_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3523901')->references('id')->on('teams');
            $table->unsignedBigInteger('project_name_id')->nullable();
            $table->foreign('project_name_id', 'project_name_fk_3542034')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_manager_id')->nullable();
            $table->foreign('project_manager_id', 'project_manager_fk_3542035')->references('id')->on('users');
            $table->unsignedBigInteger('project_coordinator_id')->nullable();
            $table->foreign('project_coordinator_id', 'project_coordinator_fk_3542036')->references('id')->on('users');
            $table->unsignedBigInteger('project_group_id')->nullable();
            $table->foreign('project_group_id', 'project_group_fk_3542037')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_building_id');
            $table->foreign('project_building_id', 'project_building_fk_3542038')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_area_id')->nullable();
            $table->foreign('project_area_id', 'project_area_fk_3542039')->references('id')->on('time_projects');
            $table->unsignedBigInteger('dr_approval_id')->nullable();
            $table->foreign('dr_approval_id', 'dr_approval_fk_3542133')->references('id')->on('approvals');
        });
    }
}
