<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('university_id')->nullable();
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('province_id');
            $table->string('address');
            $table->string('code');
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('gender');
            $table->date('birthday');
            $table->string('phone');
            $table->string('password');
            $table->string('email')->unique();
            $table->timestamps();
            $table->foreign('district_id')->references('id')->on('districts');
            $table->foreign('province_id')->references('id')->on('provinces');
            $table->foreign('university_id')->references('id')->on('universities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
