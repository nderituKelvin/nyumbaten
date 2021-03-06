<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration{
    public function up(){
        Schema::create('locations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('constituency');
            $table->string('coord')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('locations');
    }
}
