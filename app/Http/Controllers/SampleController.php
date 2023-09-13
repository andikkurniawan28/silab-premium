<?php

namespace App\Http\Controllers;

use App\Http\Requests\SampleStoreRequest;
use App\Http\Requests\SampleUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Sample;
// use Illuminate\Http\Request;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Sample::all();
        return view("sample.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("sample.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SampleStoreRequest $request)
    {
        Sample::create($request->all());
        ActivityLog::write("Create", "sample", $request->description);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Sample::whereId($id)->get()->last();
        return view("sample.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Sample::whereId($id)->get()->last();
        return view("sample.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SampleUpdateRequest $request, $id)
    {
        $data = Sample::whereId($id)->get()->last();
        Sample::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "sample", "{$data->description} to {$request->description}, material {$data->material_id} to {$request->material_id}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Sample::whereId($id)->get()->last();
        Sample::whereId($id)->delete();
        ActivityLog::write("Delete", "sample", $data->description);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
