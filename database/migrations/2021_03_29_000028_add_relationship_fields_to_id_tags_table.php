<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToIdTagsTable extends Migration
{
    public function up()
    {
        Schema::table('id_tags', function (Blueprint $table) {
            $table->unsignedBigInteger('contractor_company_id');
            $table->foreign('contractor_company_id', 'contractor_company_fk_3525084')->references('id')->on('contractors');
        });
    }
}
