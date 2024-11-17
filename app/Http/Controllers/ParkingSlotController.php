<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreParkingSlotRequest;
use App\Http\Requests\UpdateParkingSlotRequest;
use App\Models\ParkingSlot;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ParkingSlotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ParkingSlot::query();
        if ($request->search) {
            $query->where('slot', 'like', '%'.$request->search.'%');
        }
        $parkingSlots = $query->paginate(10)->appends($request->only('search'));

        $data = [
            'data' => $parkingSlots,
        ];

        return view('parking-slot.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parking-slot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreParkingSlotRequest $request)
    {
        ParkingSlot::create($request->all());

        return redirect()->route('parking_slots.index')->with('alert-success', 'Thêm chỗ gửi xe thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(ParkingSlot $parkingSlot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ParkingSlot $parkingSlot)
    {
        $data = [
            'data_edit' => $parkingSlot,
        ];

        return view('parking-slot.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParkingSlotRequest $request, ParkingSlot $parkingSlot)
    {
        $parkingSlot->update($request->all());

        return redirect()->route('parking_slots.index')->with('alert-success', 'Sửa chỗ gửi xe thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkingSlot $parkingSlot)
    {
        try {
            DB::beginTransaction();

            if ($parkingSlot->status != 'Còn trống') {
                return redirect()->back()->with('alert-error', 'Xóa chỗ gửi xe thất bại! Chỗ gửi xe '.$parkingSlot->slot.' đang được thuê.');
            }

            $parkingSlot->destroy($parkingSlot->id);

            DB::commit();

            return redirect()->route('parking_slots.index')->with('alert-success', 'Xóa chỗ gửi xe thành công!');
        } catch (Exception $e) {
            DB::rollback();

            return redirect()->back()->with('alert-error', 'Xóa chỗ gửi xe thất bại!');
        }
    }
}
