<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColleaguesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleagues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('image');
            $table->integer('sociability')->nullable(true)->default(0);
            $table->integer('engineering_skill')->nullable(true)->default(0);
            $table->integer('time_management')->nullable(true)->default(0);
            $table->integer('lang')->nullable(true)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('colleagues');
    }
}
