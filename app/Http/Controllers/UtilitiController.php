<?php

namespace App\Http\Controllers;

use App\Models\Utiliti;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUtilitiRequest;
use DB;

class UtilitiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $utilities = Utiliti::paginate(10);

        if ($request->search) {
            $utilities = Utiliti::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $utilities->appends(['search' => $request->search]);
        }

        $data = [
            'utilities' => $utilities
        ];

        return view('utiliti.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('utiliti.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUtilitiRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $create = Utiliti::create([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('utilities.index')->with('alert-success','Thêm tiện ích thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm tiện ích thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function show(Utiliti $utiliti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function edit(Utiliti $utility)
    {
        $data = [
            'data_edit' => $utility
        ];

        return view('utiliti.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUtilitiRequest $request, Utiliti $utility)
    {
        try {
            DB::beginTransaction();

            $utility->update([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('utilities.index')->with('alert-success','Sửa tiện ích thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa tiện ích thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Utiliti  $utiliti
     * @return \Illuminate\Http\Response
     */
    public function destroy(Utiliti $utility)
    {
        try {
            DB::beginTransaction();

            if ($utility->roomUtilities->count() > 0) {
                return redirect()->back()->with('alert-error','Xóa tiện ích thất bại! Tiện ích '.$utility->name.' đang thuộc các phòng.');
            }

            $utility->destroy($utility->id);
            
            DB::commit();
            return redirect()->route('utilities.index')->with('alert-success','Xóa tiện ích thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa tiện ích thất bại!');
        }
    }
}
