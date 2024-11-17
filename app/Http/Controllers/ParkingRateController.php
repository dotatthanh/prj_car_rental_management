<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateParkingRateRequest;
use App\Models\ParkingRate;
use Illuminate\Http\Request;

class ParkingRateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'data' => ParkingRate::paginate(10),
        ];

        return view('parking-rate.index', $data);
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
    public function show(ParkingRate $parkingRate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(ParkingRate $parkingRate)
    {
        $data = [
            'data_edit' => $parkingRate,
        ];

        return view('parking-rate.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateParkingRateRequest $request, ParkingRate $parkingRate)
    {
        $parkingRate->update($request->all());

        return redirect()->route('parking_rates.index')->with('alert-success', 'Sửa chỗ gửi xe thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ParkingRate $parkingRate)
    {
        //
    }
}
