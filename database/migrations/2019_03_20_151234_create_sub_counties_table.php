<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCountiesTable extends Migration{
    public function up(){
        Schema::create('sub_counties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('county');
            $table->string('coord')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('sub_counties');
    }
}
