<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCommissioningsTable extends Migration
{
    public function up()
    {
        Schema::table('commissionings', function (Blueprint $table) {
            $table->unsignedBigInteger('project_name_id')->nullable();
            $table->foreign('project_name_id', 'project_name_fk_3546726')->references('id')->on('time_projects');
            $table->unsignedBigInteger('project_manager_id');
            $table->foreign('project_manager_id', 'project_manager_fk_3546727')->references('id')->on('users');
            $table->unsignedBigInteger('project_coordinator_id')->nullable();
            $table->foreign('project_coordinator_id', 'project_coordinator_fk_3546728')->references('id')->on('users');
            $table->unsignedBigInteger('project_number_id')->nullable();
            $table->foreign('project_number_id', 'project_number_fk_3546729')->references('id')->on('time_projects');
        });
    }
}
