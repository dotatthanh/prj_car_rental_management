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
        $doctor = Role::create(['guard_name' => 'admin','name' => 'Bác sĩ']);

        // Gán vai trò
        User::find(1)->assignRole('Admin');

        // Tạo quyền
        $view_health_certification = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách giấy khám bệnh']);
        $view_detail_health_certification = Permission::create(['guard_name' => 'admin','name' => 'Xem thông tin giấy khám bệnh']);
        $create_health_certification = Permission::create(['guard_name' => 'admin','name' => 'Thêm giấy khám bệnh']);
        $edit_health_certification = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa giấy khám bệnh']);
        $delete_health_certification = Permission::create(['guard_name' => 'admin','name' => 'Xóa giấy khám bệnh']);
        $conclude_health_certification = Permission::create(['guard_name' => 'admin','name' => 'Kết luận khám giấy khám bệnh']);
        $print_health_certification = Permission::create(['guard_name' => 'admin','name' => 'In giấy khám bệnh']);
        $list_prescription = Permission::create(['guard_name' => 'admin','name' => 'Kê đơn thuốc']);

        // Set quyền cho vai trò admin
        $admin->givePermissionTo($view_health_certification);
        $admin->givePermissionTo($view_detail_health_certification);
        $admin->givePermissionTo($create_health_certification);
        $admin->givePermissionTo($edit_health_certification);
        $admin->givePermissionTo($delete_health_certification);
        $admin->givePermissionTo($conclude_health_certification);
        $admin->givePermissionTo($print_health_certification);
        $admin->givePermissionTo($list_prescription);

        $view_prescription = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách đơn thuốc']);
        $view_detail_prescription = Permission::create(['guard_name' => 'admin','name' => 'Xem thông tin đơn thuốc']);
        $create_prescription = Permission::create(['guard_name' => 'admin','name' => 'Thêm đơn thuốc']);
        $edit_prescription = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa đơn thuốc']);
        $delete_prescription = Permission::create(['guard_name' => 'admin','name' => 'Xóa đơn thuốc']);
        $confirm_payment_prescription = Permission::create(['guard_name' => 'admin','name' => 'Xác nhận thanh toán đơn thuốc']);
        $print_prescription = Permission::create(['guard_name' => 'admin','name' => 'In đơn thuốc']);

        $admin->givePermissionTo($view_prescription);
        $admin->givePermissionTo($view_detail_prescription);
        $admin->givePermissionTo($create_prescription);
        $admin->givePermissionTo($edit_prescription);
        $admin->givePermissionTo($delete_prescription);
        $admin->givePermissionTo($confirm_payment_prescription);
        $admin->givePermissionTo($print_prescription);

        $view_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách phiếu dịch vụ']);
        $view_detail_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Xem thông tin phiếu dịch vụ']);
        $create_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Thêm phiếu dịch vụ']);
        $edit_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa phiếu dịch vụ']);
        $delete_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Xóa phiếu dịch vụ']);
        $complete_examination_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Hoàn thành khám phiếu dịch vụ']);
        $conclude_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Kết luận khám phiếu dịch vụ']);
        $print_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'In phiếu dịch vụ']);

        $admin->givePermissionTo($view_service_voucher);
        $admin->givePermissionTo($view_detail_service_voucher);
        $admin->givePermissionTo($create_service_voucher);
        $admin->givePermissionTo($edit_service_voucher);
        $admin->givePermissionTo($delete_service_voucher);
        $admin->givePermissionTo($complete_examination_service_voucher);
        $admin->givePermissionTo($conclude_service_voucher);
        $admin->givePermissionTo($print_service_voucher);

        $view_room = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách phòng']);
        $create_room = Permission::create(['guard_name' => 'admin','name' => 'Thêm phòng']);
        $edit_room = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa phòng']);
        $delete_room = Permission::create(['guard_name' => 'admin','name' => 'Xóa phòng']);

        $admin->givePermissionTo($view_room);
        $admin->givePermissionTo($create_room);
        $admin->givePermissionTo($edit_room);
        $admin->givePermissionTo($delete_room);

        $view_medical_service = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách dịch vụ khám']);
        $create_medical_service = Permission::create(['guard_name' => 'admin','name' => 'Thêm dịch vụ khám']);
        $edit_medical_service = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa dịch vụ khám']);
        $delete_medical_service = Permission::create(['guard_name' => 'admin','name' => 'Xóa dịch vụ khám']);

        $admin->givePermissionTo($view_medical_service);
        $admin->givePermissionTo($create_medical_service);
        $admin->givePermissionTo($edit_medical_service);
        $admin->givePermissionTo($delete_medical_service);

        $view_type = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách loại thuốc']);
        $create_type = Permission::create(['guard_name' => 'admin','name' => 'Thêm loại thuốc']);
        $edit_type = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa loại thuốc']);
        $delete_type = Permission::create(['guard_name' => 'admin','name' => 'Xóa loại thuốc']);

        $admin->givePermissionTo($view_type);
        $admin->givePermissionTo($create_type);
        $admin->givePermissionTo($edit_type);
        $admin->givePermissionTo($delete_type);

        $view_medicine = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách thuốc']);
        $create_medicine = Permission::create(['guard_name' => 'admin','name' => 'Thêm thuốc']);
        $edit_medicine = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa thuốc']);
        $delete_medicine = Permission::create(['guard_name' => 'admin','name' => 'Xóa thuốc']);

        $admin->givePermissionTo($view_medicine);
        $admin->givePermissionTo($create_medicine);
        $admin->givePermissionTo($edit_medicine);
        $admin->givePermissionTo($delete_medicine);

        $view_patient = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách bệnh nhân']);
        $create_patient = Permission::create(['guard_name' => 'admin','name' => 'Thêm bệnh nhân']);
        $edit_patient = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa bệnh nhân']);
        $delete_patient = Permission::create(['guard_name' => 'admin','name' => 'Xóa bệnh nhân']);

        $admin->givePermissionTo($view_patient);
        $admin->givePermissionTo($create_patient);
        $admin->givePermissionTo($edit_patient);
        $admin->givePermissionTo($delete_patient);

        $view_customer = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách khách hàng']);
        $create_customer = Permission::create(['guard_name' => 'admin','name' => 'Thêm khách hàng']);
        $edit_customer = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa khách hàng']);
        $delete_customer = Permission::create(['guard_name' => 'admin','name' => 'Xóa khách hàng']);

        $admin->givePermissionTo($view_customer);
        $admin->givePermissionTo($create_customer);
        $admin->givePermissionTo($edit_customer);
        $admin->givePermissionTo($delete_customer);

        $view_health_insurance_card = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách thẻ BHYT']);
        $create_health_insurance_card = Permission::create(['guard_name' => 'admin','name' => 'Thêm thẻ BHYT']);
        $edit_health_insurance_card = Permission::create(['guard_name' => 'admin','name' => 'Chỉnh sửa thẻ BHYT']);
        $delete_health_insurance_card = Permission::create(['guard_name' => 'admin','name' => 'Xóa thẻ BHYT']);

        $admin->givePermissionTo($view_health_insurance_card);
        $admin->givePermissionTo($create_health_insurance_card);
        $admin->givePermissionTo($edit_health_insurance_card);
        $admin->givePermissionTo($delete_health_insurance_card);

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

        $view_cashier_health_certificate = Permission::create(['guard_name' => 'admin','name' => 'Xem thu ngân giấy khám bệnh']);
        $view_cashier_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Xem thu ngân phiếu dịch vụ']);
        $confirm_payment_health_certificate = Permission::create(['guard_name' => 'admin','name' => 'Xác nhận thanh toán giấy khám bệnh']);
        $confirm_payment_service_voucher = Permission::create(['guard_name' => 'admin','name' => 'Xác nhận thanh toán phiếu dịch vụ']);

        $admin->givePermissionTo($view_cashier_health_certificate);
        $admin->givePermissionTo($view_cashier_service_voucher);
        $admin->givePermissionTo($confirm_payment_health_certificate);
        $admin->givePermissionTo($confirm_payment_service_voucher);

        $view_booking = Permission::create(['guard_name' => 'admin','name' => 'Xem danh sách đặt thuê phòng']);
        $approve_booking = Permission::create(['guard_name' => 'admin','name' => 'Duyệt đặt thuê phòng']);
        $cancel_appointment_booking = Permission::create(['guard_name' => 'admin','name' => 'Huỷ đặt thuê phòng']);

        $admin->givePermissionTo($view_booking);
        $admin->givePermissionTo($approve_booking);
        $admin->givePermissionTo($cancel_appointment_booking);
    }
}
