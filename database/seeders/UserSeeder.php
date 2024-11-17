<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo admin
        User::create([
            'code' => 'ADMIN',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'gender' => 'Nam',
            'password' => bcrypt('123123123'),
            'birthday' => '2000-08-17',
            'phone' => '0394121584',
            'address' => 'Sóc Trăng - Cần Thơ',
        ]);
    }
}
