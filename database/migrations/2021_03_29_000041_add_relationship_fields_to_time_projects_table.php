<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToTimeProjectsTable extends Migration
{
    public function up()
    {
        Schema::table('time_projects', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3523836')->references('id')->on('users');
            $table->unsignedBigInteger('roles_id')->nullable();
            $table->foreign('roles_id', 'roles_fk_3523843')->references('id')->on('users');
            $table->unsignedBigInteger('project_coordinator_id')->nullable();
            $table->foreign('project_coordinator_id', 'project_coordinator_fk_3523844')->references('id')->on('users');
            $table->unsignedBigInteger('contractor_name_id')->nullable();
            $table->foreign('contractor_name_id', 'contractor_name_fk_3525051')->references('id')->on('contractors');
            $table->unsignedBigInteger('site_supervisor_tel_id')->nullable();
            $table->foreign('site_supervisor_tel_id', 'site_supervisor_tel_fk_3525100')->references('id')->on('id_tags');
            $table->unsignedBigInteger('contractor_supervisor_id')->nullable();
            $table->foreign('contractor_supervisor_id', 'contractor_supervisor_fk_3525254')->references('id')->on('id_tags');
            $table->unsignedBigInteger('site_supervisor_email_id')->nullable();
            $table->foreign('site_supervisor_email_id', 'site_supervisor_email_fk_3525269')->references('id')->on('id_tags');
            $table->unsignedBigInteger('work_type_id')->nullable();
            $table->foreign('work_type_id', 'work_type_fk_3541880')->references('id')->on('time_work_types');
        });
    }
}
