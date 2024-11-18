<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDriverRequest;
use App\Models\Driver;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $drivers = Driver::paginate(10);

        if ($request->search) {
            $drivers = Driver::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $drivers->appends(['search' => $request->search]);
        }

        $data = [
            'data' => $drivers,
        ];

        return view('driver.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('driver.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDriverRequest $request)
    {
        Driver::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => date('Y-m-d', strtotime($request->birthday)),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('drivers.index')->with('alert-success', 'Thêm tài xế thành công!');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Driver $driver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Driver $driver)
    {

        $data = [
            'data_edit' => $driver,
        ];

        return view('driver.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDriverRequest $request, Driver $driver)
    {
        $driver->update([
            'name' => $request->name,
            'gender' => $request->gender,
            'birthday' => date('Y-m-d', strtotime($request->birthday)),
            'phone' => $request->phone,
            'address' => $request->address,
        ]);

        return redirect()->route('drivers.index')->with('alert-success', 'Sửa tài xế thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Driver $driver)
    {
        $driver->destroy($driver->id);

        return redirect()->route('drivers.index')->with('alert-success', 'Xóa tài xế thành công!');
    }
}
