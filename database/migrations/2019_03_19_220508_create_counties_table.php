<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountiesTable extends Migration{
    public function up(){
        Schema::create('counties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('coord')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('counties');
    }
}
