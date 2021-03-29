<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIdTagsTable extends Migration
{
    public function up()
    {
        Schema::create('id_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('ic_tel');
            $table->string('idtag_em_contact');
            $table->string('idtag_em_contact_tel');
            $table->string('idtag_address')->nullable();
            $table->string('idtag_city')->nullable();
            $table->string('idtag_state')->nullable();
            $table->string('idtag_zip')->nullable();
            $table->boolean('idtag_verified')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
