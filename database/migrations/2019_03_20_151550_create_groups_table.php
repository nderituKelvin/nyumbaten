<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration{
    public function up(){
        Schema::create('groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('village');
            $table->integer('admin');
            $table->string('coord')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('groups');
    }
}
