<?php

namespace App\Http\Controllers;

use App\Models\CustomerParkingSlot;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->guard('admin')->user()->hasRole('Admin')) {
            $bookings = CustomerParkingSlot::paginate(10);
            if ($request->search) {
                $bookings = CustomerParkingSlot::whereHas('customer', function ($query) use ($request) {
                    $query->where('phone', 'like', '%'.$request->search.'%');
                })
                    ->paginate(10);
                $bookings->appends(['search' => $request->search]);
            }
        } else {
            $bookings = CustomerParkingSlot::whereHas('parkingSlot', function ($query) {
                $query->where('user_id', auth()->guard('admin')->user()->id);
            })
                ->paginate(10);
            if ($request->search) {
                $bookings = CustomerParkingSlot::whereHas('parkingSlot', function ($query) {
                    $query->where('user_id', auth()->guard('admin')->user()->id);
                })
                    ->whereHas('customer', function ($query) use ($request) {
                        $query->where('phone', 'like', '%'.$request->search.'%');
                    })
                    ->paginate(10);
                $bookings->appends(['search' => $request->search]);
            }
        }

        $data = [
            'bookings' => $bookings,
        ];

        return view('booking-parking.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerParkingSlot $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(CustomerParkingSlot $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CustomerParkingSlot $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(CustomerParkingSlot $booking)
    {
        //
    }

    public function approveBookingParking($id)
    {
        try {
            DB::beginTransaction();

            $booking = CustomerParkingSlot::find($id);

            $startTime = $booking->start_time;
            $endTime = $booking->end_time;
            $checkExists = CustomerParkingSlot::where('status', 'Đã duyệt')
                ->where(function ($query) use ($startTime, $endTime) {
                    $query->whereBetween('start_time', [$startTime, $endTime])
                        ->orWhereBetween('end_time', [$startTime, $endTime]);
                })
                ->exists();

            if ($checkExists) {
                return redirect()->back()->with('alert-error', 'Thời gian thuê vị trí gửi xe đã được đặt!');
            }

            $booking->update(['status' => 'Đã Duyệt']);

            DB::commit();

            return redirect()->back()->with('alert-success', 'Duyệt thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Duyệt thất bại!');
        }
    }

    public function cancelAppointment($id)
    {
        CustomerParkingSlot::find($id)->update(['status' => 'Đã hủy']);

        return redirect()->back()->with('alert-success', 'Huỷ thành công!');
    }
}
