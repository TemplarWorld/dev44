<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeProjectsTable extends Migration
{
    public function up()
    {
        Schema::create('time_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('project_number')->nullable();
            $table->string('project_group')->nullable();
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->string('account_number')->nullable();
            $table->string('site')->nullable();
            $table->longText('project_description')->nullable();
            $table->string('project_area')->nullable();
            $table->string('project_building')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
