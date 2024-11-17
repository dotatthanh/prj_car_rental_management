<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkingSlotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_slots', function (Blueprint $table) {
            $table->id();
            $table->string('slot')->unique(); // Mã vị trí (VD: A1, B2)
            $table->enum('status', ['Còn trống', 'Đã có xe', 'Đã đặt trước'])->default('Còn trống');
            $table->enum('vehicle_type', ['Ô tô', 'Xe gắn máy']); // Loại xe
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
        Schema::dropIfExists('parking_slots');
    }
}
