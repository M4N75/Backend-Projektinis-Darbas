<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Strawpoll extends Migration
{
    public function up()
    {
        Schema::create('strawpoll', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('question');
            $table->string('answers'); //pirmas ats|antras ats|trcias......
            $table->string('votes'); //73|123|52......
            $table->dateTime('delete_at');
            $table->string('creator');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::dropIfExists('strawpoll');
    }
}
