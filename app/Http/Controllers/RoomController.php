<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRoomRequest;
use App\Http\Requests\UpdateRoomRequest;
use DB;
use Illuminate\Support\Facades\Storage;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rooms = Room::paginate(10);

        if ($request->search) {
            $rooms = Room::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $rooms->appends(['search' => $request->search]);
        }

        $data = [
            'rooms' => $rooms
        ];

        return view('room.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRoomRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $file_path = '';
            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path = 'uploads/image/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('image/product', $request->image, $name);
            }

            $create = Room::create([
                'code' => '',
                'name' => $request->name,
                'acreage' => $request->acreage,
                'address' => $request->address,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $file_path,
                'status' => 0,
            ]);

            $create->update([
                'code' => 'P'.str_pad($create->id, 6, '0', STR_PAD_LEFT)
            ]);
            
            DB::commit();
            return redirect()->route('rooms.index')->with('alert-success','Thêm phòng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm phòng thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $data = [
            'data_edit' => $room
        ];

        return view('room.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRoomRequest $request, Room $room)
    {
        try {
            DB::beginTransaction();

            if ($request->file('image')) {
                $name = time().'_'.$request->image->getClientOriginalName();
                $file_path = 'uploads/image/product/'.$name;
                Storage::disk('public_uploads')->putFileAs('image/product', $request->image, $name);
                
                $room->update([
                    'name' => $request->name,
                    'acreage' => $request->acreage,
                    'address' => $request->address,
                    'description' => $request->description,
                    'price' => $request->price,
                    'image' => $file_path,
                ]);
            }
            else {
                $room->update([
                    'name' => $request->name,
                    'acreage' => $request->acreage,
                    'address' => $request->address,
                    'description' => $request->description,
                    'price' => $request->price,
                ]);
            }

            
            DB::commit();
            return redirect()->route('rooms.index')->with('alert-success','Sửa phòng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa phòng thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        try {
            DB::beginTransaction();

            if ($room->status == 1) {
                return redirect()->back()->with('alert-error','Xóa phòng thất bại! Phòng '.$room->name.' đang có người thuê.');
            }

            $room->destroy($room->id);
            
            DB::commit();
            return redirect()->route('rooms.index')->with('alert-success','Xóa phòng thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa phòng thất bại!');
        }
    }
}
