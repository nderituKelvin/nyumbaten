<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVillagesTable extends Migration{
    public function up(){
        Schema::create('villages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('location');
            $table->string('coord')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('villages');
    }
}
