<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tạo vai trò
        $admin = Role::create(['guard_name' => 'admin','name' => 'Admin']);

        // Gán vai trò
        User::find(1)->assignRole('Admin');

        $view_room = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách phòng']);
        $create_room = Permission::create(['guard_name' => 'admin','name' => 'Thêm phòng']);
        $edit_room = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa phòng']);
        $delete_room = Permission::create(['guard_name' => 'admin','name' => 'Xóa phòng']);

        $admin->givePermissionTo($view_room);
        $admin->givePermissionTo($create_room);
        $admin->givePermissionTo($edit_room);
        $admin->givePermissionTo($delete_room);

        $view_customer = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách khách hàng']);
        $create_customer = Permission::create(['guard_name' => 'admin','name' => 'Thêm khách hàng']);
        $edit_customer = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa khách hàng']);
        $delete_customer = Permission::create(['guard_name' => 'admin','name' => 'Xóa khách hàng']);

        $admin->givePermissionTo($view_customer);
        $admin->givePermissionTo($create_customer);
        $admin->givePermissionTo($edit_customer);
        $admin->givePermissionTo($delete_customer);

        $view_user = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách tài khoản']);
        $create_user = Permission::create(['guard_name' => 'admin','name' => 'Thêm tài khoản']);
        $edit_user = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa tài khoản']);
        $delete_user = Permission::create(['guard_name' => 'admin','name' => 'Xóa tài khoản']);

        $admin->givePermissionTo($view_user);
        $admin->givePermissionTo($create_user);
        $admin->givePermissionTo($edit_user);
        $admin->givePermissionTo($delete_user);

        $view_role = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách vai trò']);
        $create_role = Permission::create(['guard_name' => 'admin','name' => 'Thêm vai trò']);
        $edit_role = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa vai trò']);
        $delete_role = Permission::create(['guard_name' => 'admin','name' => 'Xóa vai trò']);

        $admin->givePermissionTo($view_role);
        $admin->givePermissionTo($create_role);
        $admin->givePermissionTo($edit_role);
        $admin->givePermissionTo($delete_role);

        $view_permission = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách quyền']);
        $view_permission_detail = Permission::create(['guard_name' => 'admin','name' => 'Xem quyền']);
        $edit_permission = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa quyền']);

        $admin->givePermissionTo($view_permission);
        $admin->givePermissionTo($view_permission_detail);
        $admin->givePermissionTo($edit_permission);

        $view_booking = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách đặt thuê phòng']);
        $approve_booking = Permission::create(['guard_name' => 'admin','name' => 'Duyệt đặt thuê phòng']);
        $cancel_appointment_booking = Permission::create(['guard_name' => 'admin','name' => 'Huỷ đặt thuê phòng']);

        $admin->givePermissionTo($view_booking);
        $admin->givePermissionTo($approve_booking);
        $admin->givePermissionTo($cancel_appointment_booking);

        $view_utiliti = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách tiện ích']);
        $create_utiliti = Permission::create(['guard_name' => 'admin','name' => 'Thêm tiện ích']);
        $edit_utiliti = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa tiện ích']);
        $delete_utiliti = Permission::create(['guard_name' => 'admin','name' => 'Xóa tiện ích']);

        $admin->givePermissionTo($view_utiliti);
        $admin->givePermissionTo($create_utiliti);
        $admin->givePermissionTo($edit_utiliti);
        $admin->givePermissionTo($delete_utiliti);

        $view_hobby = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách sở thích']);
        $create_hobby = Permission::create(['guard_name' => 'admin','name' => 'Thêm sở thích']);
        $edit_hobby = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa sở thích']);
        $delete_hobby = Permission::create(['guard_name' => 'admin','name' => 'Xóa sở thích']);

        $admin->givePermissionTo($view_hobby);
        $admin->givePermissionTo($create_hobby);
        $admin->givePermissionTo($edit_hobby);
        $admin->givePermissionTo($delete_hobby);

        $view_type = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách loại phòng']);
        $create_type = Permission::create(['guard_name' => 'admin','name' => 'Thêm loại phòng']);
        $edit_type = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa loại phòng']);
        $delete_type = Permission::create(['guard_name' => 'admin','name' => 'Xóa loại phòng']);

        $admin->givePermissionTo($view_type);
        $admin->givePermissionTo($create_type);
        $admin->givePermissionTo($edit_type);
        $admin->givePermissionTo($delete_type);

        $view_university = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách trường đại học']);
        $create_university = Permission::create(['guard_name' => 'admin','name' => 'Thêm trường đại học']);
        $edit_university = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa trường đại học']);
        $delete_university = Permission::create(['guard_name' => 'admin','name' => 'Xóa trường đại học']);

        $admin->givePermissionTo($view_university);
        $admin->givePermissionTo($create_university);
        $admin->givePermissionTo($edit_university);
        $admin->givePermissionTo($delete_university);
    }
}
