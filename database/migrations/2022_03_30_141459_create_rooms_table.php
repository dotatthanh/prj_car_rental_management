<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('acreage');
            $table->string('address');
            $table->string('image');
            $table->longText('description');
            $table->integer('price');
            $table->integer('status');
            $table->integer('amount');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('university_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('university_id')->references('id')->on('universities');
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
        Schema::dropIfExists('rooms');
    }
}
