<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\WebLoginRequest;
use Auth;
use DB;
use App\Models\Room;
use App\Models\Customer;
use App\Models\Province;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\BookingRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Prescription;
use App\Models\Booking;
use App\Models\HealthCertification;
use App\Models\University;
use App\Models\Utiliti;
use App\Models\Type;
use App\Models\Hobby;

class WebController extends Controller
{
    public function index(Request $request)
    {
        $rooms = Room::where('status', 0);
        $utilities = Utiliti::all();
        $types = Type::all();
        $hobbys = Hobby::all();

        if(auth()->guard('web')->user())
        {
            $suggests = Room::where('status', 0)->where('university_id', auth()->guard('web')->user()->university_id)
            ->orWhere('district_id', auth()->guard('web')->user()->district_id)
            ->get();

            if ($suggests->count() > 5) {
                $suggests = $suggests->random(5);
            }
        }
        else {
            $suggests = Room::where('status', 0)->get();

            if ($suggests->count() > 5) {
                $suggests = $suggests->random(5);
            }
        }

        if (isset($request->utilities)) 
        {
            $rooms = $rooms->whereHas('utilities', function ($query) use ($request) {
                $query->whereIn('utiliti_id', $request->utilities);
            });
        }

        if (isset($request->hobbys)) 
        {
            $rooms = $rooms->whereHas('hobbys', function ($query) use ($request) {
                $query->whereIn('hobby_id', $request->hobbys);
            });
        }

        if (isset($request->types)) 
        {
            $rooms = $rooms->whereHas('types', function ($query) use ($request) {
                $query->whereIn('type_id', $request->types);
            });
        }

        if (isset($request->price)) 
        {
            if($request->price == "Dưới 1 triệu")
            {
                $rooms = $rooms->where('price', '<', 1000000);
            }
            if($request->price == "1 triệu - 2 triệu")
            {
                $rooms = $rooms->where('price', '>=', 1000000)->where('price', '<=', 2000000);
            }
            if($request->price == "2 triệu - 3 triệu")
            {
                $rooms = $rooms->where('price', '>=', 2000000)->where('price', '<=', 3000000);
            }
            if($request->price == "3 triệu - 4 triệu")
            {
                $rooms = $rooms->where('price', '>=', 3000000)->where('price', '<=', 4000000);
            }
            if($request->price == "4 triệu - 5 triệu")
            {
                $rooms = $rooms->where('price', '>=', 4000000)->where('price', '<=', 5000000);
            }
            if($request->price == "Trên 5 triệu")
            {
                $rooms = $rooms->where('price', '>', 5000000);
            }
        }
        $rooms = $rooms->orderBy('id', 'desc')->paginate(12);

        $data = [
            'rooms' => $rooms,
            'suggests' => $suggests,
            'utilities' => $utilities,
            'types' => $types,
            'hobbys' => $hobbys,
            'request' => $request,
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
        $provinces = Province::all();
        $universities = University::all();

        $data = [
            'provinces' => $provinces,
            'universities' => $universities,
        ];

    	return view('web.register', $data);
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
                'province_id' => $request->province_id,
                'district_id' => $request->district_id,
                'university_id' => $request->university_id,
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
        $provinces = Province::all();
        $universities = University::all();

        $data = [
            'provinces' => $provinces,
            'universities' => $universities,
        ];

        return view('web.change-profile', $data);
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
                'province_id' => $request->province_id,
                'district_id' => $request->district_id,
                'university_id' => $request->university_id,
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
            $room = Room::find($id);
            if ($room->hired < $room->amount) {
                Booking::create([
                    'status' => 0,
                    'customer_id' => $customer->id,
                    'room_id' => $id,
                    'from_date' => date("Y-m-d", strtotime($request->from_date)),
                    'to_date' => date("Y-m-d", strtotime($request->to_date)),
                ]);
            }
            else {
                return redirect()->back()->with('alert-error','Phòng này đã hết chỗ!');
            }

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

    public function getDistrict(Request $request)
    {
        $respon = [
            'districts' => Province::findOrFail($request->id)->districts()->orderBy('name')->get(),
        ];
        return response()->json($respon);
    }

    public function blog()
    {
        return view('web.blog');
    }

    public function blogdetail()
    {
        return view('web.blog-detail');
    }
    
}
