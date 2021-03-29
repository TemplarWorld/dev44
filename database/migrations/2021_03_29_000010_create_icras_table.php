<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIcrasTable extends Migration
{
    public function up()
    {
        Schema::create('icras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('start_date')->nullable();
            $table->datetime('end_date')->nullable();
            $table->boolean('type_a')->default(0)->nullable();
            $table->boolean('type_b')->default(0)->nullable();
            $table->boolean('type_c')->default(0)->nullable();
            $table->boolean('type_d')->default(0)->nullable();
            $table->boolean('group_1')->default(0)->nullable();
            $table->boolean('group_2')->default(0)->nullable();
            $table->boolean('group_3')->default(0)->nullable();
            $table->boolean('group_4')->default(0)->nullable();
            $table->string('icra_pmd')->nullable();
            $table->longText('icra_additional')->nullable();
            $table->string('icra_requested_by')->nullable();
            $table->longText('icra_notes')->nullable();
            $table->string('icra_program')->nullable();
            $table->string('icra_areas_impact_side_a')->nullable();
            $table->string('icra_areas_impact_side_b')->nullable();
            $table->string('icra_areas_impact_side_c')->nullable();
            $table->string('icra_areas_impact_side_d')->nullable();
            $table->string('icra_hoarding_type')->nullable();
            $table->string('icra_ante_pressure')->nullable();
            $table->string('icra_const_area_pressure')->nullable();
            $table->string('icra_hepa_unit')->nullable();
            $table->string('icra_exhaust')->nullable();
            $table->boolean('icra_pressure_mon')->default(0)->nullable();
            $table->datetime('icra_approval_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
