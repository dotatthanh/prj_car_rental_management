<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateParkingRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parking_rates', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_type'); // Loại xe: ô tô, xe máy/xe đạp
            $table->integer('hourly_rate'); // Giá thuê theo giờ (đơn vị: đồng)
            $table->integer('daily_rate'); // Giá thuê theo ngày (đơn vị: đồng)
            $table->integer('monthly_rate'); // Giá thuê theo tháng (đơn vị: đồng)
            $table->timestamps();
        });

        // Seed initial data
        DB::table('parking_rates')->insert([
            ['vehicle_type' => 'Ô tô', 'hourly_rate' => 20000, 'daily_rate' => 150000, 'monthly_rate' => 2000000],
            ['vehicle_type' => 'Xe gắn máy', 'hourly_rate' => 5000, 'daily_rate' => 30000, 'monthly_rate' => 500000],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parking_rates');
    }
}
