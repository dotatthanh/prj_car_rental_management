<?php

namespace App\Http\Controllers;

use App\Models\University;
use Illuminate\Http\Request;
use App\Http\Requests\StoreUniversityRequest;
use DB;

class UniversityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $universities = University::paginate(10);

        if ($request->search) {
            $universities = University::where('name', 'like', '%'.$request->search.'%')->paginate(10);
            $universities->appends(['search' => $request->search]);
        }

        $data = [
            'universities' => $universities
        ];

        return view('university.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUniversityRequest $request)
    {
        try {
            DB::beginTransaction();
            
            $create = University::create([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('universities.index')->with('alert-success','Thêm trường đại học thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Thêm trường đại học thất bại!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function show(University $university)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function edit(University $university)
    {
        $data = [
            'data_edit' => $university
        ];

        return view('university.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUniversityRequest $request, University $university)
    {
        try {
            DB::beginTransaction();

            $university->update([
                'name' => $request->name,
            ]);
            
            DB::commit();
            return redirect()->route('universities.index')->with('alert-success','Sửa trường đại học thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Sửa trường đại học thất bại!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\University  $university
     * @return \Illuminate\Http\Response
     */
    public function destroy(University $university)
    {
        try {
            DB::beginTransaction();

            // if ($university->medicines->count() > 0) {
            //     return redirect()->back()->with('alert-error','Xóa trường đại học thất bại! Trường đại học '.$university->name.' đang có thuốc.');
            // }

            $university->destroy($university->id);
            
            DB::commit();
            return redirect()->route('universities.index')->with('alert-success','Xóa trường đại học thành công!');
        } catch (Exception $e) {
            DB::rollback();
            return redirect()->back()->with('alert-error','Xóa trường đại học thất bại!');
        }
    }
}
