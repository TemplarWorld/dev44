<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToInformationRequestsTable extends Migration
{
    public function up()
    {
        Schema::table('information_requests', function (Blueprint $table) {
            $table->unsignedBigInteger('team_id')->nullable();
            $table->foreign('team_id', 'team_fk_3523917')->references('id')->on('teams');
            $table->unsignedBigInteger('project_manager_id')->nullable();
            $table->foreign('project_manager_id', 'project_manager_fk_3544911')->references('id')->on('users');
        });
    }
}
