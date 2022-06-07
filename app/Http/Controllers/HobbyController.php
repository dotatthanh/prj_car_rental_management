<?php

namespace App\Http\Controllers;

use App\Models\Hobby;
use Illuminate\Http\Request;
use App\Http\Requests\StoreHobbyRequest;
use DB;

class HobbyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $hobbys = Hobby::paginate(10);

        if ($request->search) {
            $hobbys = Hobby::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $hobbys->appends(['search' => $request->search]);
        }

        $data = [
            'hobbys' => $hobbys
        ];

        return view('hobby.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('hobby.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHobbyRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $create = Hobby::create([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('hobbys.index')->with('alert-success','Thêm sở thích thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm sở thích thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function show(Hobby $hobby)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function edit(Hobby $hobby)
    {
        $data = [
            'data_edit' => $hobby
        ];

        return view('hobby.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHobbyRequest $request, Hobby $hobby)
    {
        try {
            DB::beginTransaction();

            $hobby->update([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('hobbys.index')->with('alert-success','Sửa sở thích thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa sở thích thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hobby  $hobby
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hobby $hobby)
    {
        try {
            DB::beginTransaction();

            if ($hobby->hobbyRooms->count() > 0) {
                return redirect()->back()->with('alert-error','Xóa sở thích thất bại! Sở thích '.$hobby->name.' đang thuộc các phòng.');
            }

            $hobby->destroy($hobby->id);
            
            DB::commit();
            return redirect()->route('hobbys.index')->with('alert-success','Xóa sở thích thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa sở thích thất bại!');
        }
    }
}
