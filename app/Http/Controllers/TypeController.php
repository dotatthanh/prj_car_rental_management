<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTypeRequest;
use DB;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $types = Type::paginate(10);

        if ($request->search) {
            $types = Type::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $types->appends(['search' => $request->search]);
        }

        $data = [
            'types' => $types
        ];

        return view('type.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $create = Type::create([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('types.index')->with('alert-success','Thêm loại xe thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm loại xe thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        $data = [
            'data_edit' => $type
        ];

        return view('type.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTypeRequest $request, Type $type)
    {
        try {
            DB::beginTransaction();

            $type->update([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('types.index')->with('alert-success','Sửa loại xe thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa loại xe thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        try {
            DB::beginTransaction();

            if ($type->roomTypes->count() > 0) {
                return redirect()->back()->with('alert-error','Xóa loại xe thất bại! Loại xe '.$type->name.' đang thuộc các xe.');
            }

            $type->destroy($type->id);
            
            DB::commit();
            return redirect()->route('types.index')->with('alert-success','Xóa loại xe thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa loại xe thất bại!');
        }
    }
}
