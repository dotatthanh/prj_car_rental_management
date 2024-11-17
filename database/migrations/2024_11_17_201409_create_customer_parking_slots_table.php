<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerParkingSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_parking_slots', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('parking_slot_id');
            $table->enum('form_rent', ['Thuê theo giờ', 'Thuê theo ngày', 'Thuê theo tháng']);
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->enum('status', ['Chờ duyệt', 'Đã duyệt', 'Đã hủy'])->default('Còn trống');
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
        Schema::dropIfExists('customer_parking_slots');
    }
}
