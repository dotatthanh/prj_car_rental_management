<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WebLoginRequest;
use Auth;
use DB;
use App\Models\Room;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Prescription;
use App\Models\Booking;
use App\Models\HealthCertification;

class WebController extends Controller
{
    public function index()
    {
        $rooms = Room::where('status', 0)->paginate(12);

        $data = [
            'rooms' => $rooms,
        ];

    	return view('web.index', $data);
    }

    public function login()
    {
    	return view('web.login');
    }

    public function postLogin(WebLoginRequest $request) {
        $data = $request->all();
        if (Auth::guard('web')->attempt([
            'email' => $data['email'],
            'password' => $data['password'],
        ])) {
            return redirect()->route('home');
        } else {
            return redirect()->back()->with('alert-error', 'Sai email hoặc mật khẩu. Vui lòng thử lại!');
        }
    }

    public function logout()
    {
    	Auth::guard('web')->logout();
        return redirect()->route('home');
    }

    public function register()
    {
    	return view('web.register');
    }

    public function postRegister(StoreCustomerRequest $request)
    {
        try {
            DB::beginTransaction();

            $file_path = '';
            if ($request->file('avatar')) {
                $name = time().'_'.$request->avatar->getClientOriginalName();
                $file_path = 'uploads/avatar/customer/'.$name;
                Storage::disk('public_uploads')->putFileAs('avatar/customer', $request->avatar, $name);
            }

            $create = Customer::create([
                'code' => '',
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'birthday' => date("Y-m-d", strtotime($request->birthday)),
                'phone' => $request->phone,
                'address' => $request->address,
                'avatar' => $file_path,
                'password' => Hash::make($request->password),
            ]);

            $create->update([
                'code' => 'KH'.str_pad($create->id, 6, '0', STR_PAD_LEFT)
            ]);
            
            DB::commit();
            return redirect()->route('web.login')->with('alert-success','Đăng ký thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Đăng ký thất bại!');
        }
    }

    public function profile() {
        return view('web.profile');
    }

    public function changeProfile() {
        return view('web.change-profile');
    }

    public function postChangeProfile(UpdateProfileRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $customer = Customer::find($id);

            $file_path = '';
            if ($request->file('avatar')) {
                $name = time().'_'.$request->avatar->getClientOriginalName();
                $file_path = 'uploads/avatar/customer/'.$name;
                Storage::disk('public_uploads')->putFileAs('avatar/customer', $request->avatar, $name);
            }
            
            $customer->update([
                'name' => $request->name,
                'email' => $request->email,
                'gender' => $request->gender,
                'birthday' => date("Y-m-d", strtotime($request->birthday)),
                'phone' => $request->phone,
                'address' => $request->address,
                'avatar' => $file_path,
            ]);
            
            DB::commit();
            return redirect()->route('web.profile')->with('alert-success','Cập nhật thông tin thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Cập nhật thông tin thất bại!');
        }
    }

    public function changePassword() 
    {
        return view('web.change-password');
    }

    public function postChangePassword(ChangePasswordRequest $request, $id) 
    {
        try {
            DB::beginTransaction();
            
            $customer = Customer::find($id);
            if (Hash::check($request->password_old, $customer->password)) {
                $customer->update([
                    'password' => Hash::make($request->password),
                ]);
            }

            DB::commit();
        	return redirect()->route('home')->with('alert-success','Đổi mật khẩu thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Đổi mật khẩu thất bại!');
        }
    }


    // public function prescriptionDetail($id)
    // {
    //     $prescription = Prescription::find($id);

    //     $data = [
    //         'prescription' => $prescription
    //     ];

    //     return view('web.prescription-detail', $data);
    // }

    // public function bookingExamination()
    // {
    //     return view('web.booking-examination');
    // }

    public function booking(BookingRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            
            $customer = auth()->guard('web')->user();

            Booking::create([
                'status' => 0,
                'customer_id' => $customer->id,
                'room_id' => $id,
                'from_date' => date("Y-m-d", strtotime($request->from_date)),
                'to_date' => date("Y-m-d", strtotime($request->to_date)),
            ]);

            DB::commit();
            return redirect()->route('home')->with('alert-success','Đặt thuê phòng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Đặt thuê phòng thất bại!');
        }
    }

    public function infoBooking()
    {
        $bookings = Booking::where('customer_id', auth()->guard('web')->user()->id)->get();

        $data = [
            'bookings' => $bookings,
        ];

        return view('web.info-booking', $data);
    }

    public function cancelAppointment($id)
    {
        try {
            DB::beginTransaction();
            
            Booking::find($id)->update([
                'status' => -1,
            ]);

            DB::commit();
            return redirect()->back()->with('alert-success','Huỷ đặt thuê phòng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Huỷ đặt thuê phòng thất bại!');
        }
    }

    public function roomDetail($id)
    {
        $room = Room::find($id);

        $data = [
            'room' => $room
        ];

        return view('web.room-detail', $data);
    }
}
