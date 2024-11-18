<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (auth()->guard('admin')->user()->hasRole('Admin')) {
            $bookings = Booking::paginate(10);
            if ($request->search) {
                $bookings = Booking::whereHas('customer', function ($query) use ($request) {
                    $query->where('phone', 'like', '%'.$request->search.'%');
                })
                    ->paginate(10);
                $bookings->appends(['search' => $request->search]);
            }
        } else {
            $bookings = Booking::whereHas('room', function ($query) {
                $query->where('user_id', auth()->guard('admin')->user()->id);
            })
                ->paginate(10);
            if ($request->search) {
                $bookings = Booking::whereHas('room', function ($query) {
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

        return view('booking.index', $data);
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
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function approveBooking($id)
    {
        try {
            DB::beginTransaction();

            $booking = Booking::find($id);

            if ($booking->room->status == 1) {
                return redirect()->back()->with('alert-error', 'Xe này đã được thuê!');
            }

            $booking->update([
                'status' => 1,
            ]);

            DB::commit();

            return redirect()->back()->with('alert-success', 'Duyệt thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Duyệt thất bại!');
        }
    }

    public function cancelAppointment($id)
    {
        try {
            DB::beginTransaction();

            Booking::find($id)->update([
                'status' => -1,
            ]);

            DB::commit();

            return redirect()->back()->with('alert-success', 'Huỷ thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Huỷ thất bại!');
        }
    }
}
