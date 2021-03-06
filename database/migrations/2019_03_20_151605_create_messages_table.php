<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagesTable extends Migration{
    public function up(){
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('message');
            $table->integer('user');
            $table->integer('group');
            $table->string('coord')->nullable();
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('messages');
    }
}
