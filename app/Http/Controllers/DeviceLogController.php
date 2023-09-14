<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceLogStoreRequest;
use App\Http\Requests\DeviceLogUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\DeviceLog;
// use Illuminate\Http\Request;

class DeviceLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = DeviceLog::all();
        return view("device_log.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("device_log.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeviceLogStoreRequest $request)
    {
        DeviceLog::create($request->all());
        ActivityLog::write("Create", "device_log", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = DeviceLog::whereId($id)->get()->last();
        return view("device_log.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = DeviceLog::whereId($id)->get()->last();
        return view("device_log.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeviceLogUpdateRequest $request, $id)
    {
        $data = DeviceLog::whereId($id)->get()->last();
        DeviceLog::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "device_log", "{$data->name} to {$request->name}, device {$data->device_id} to {$request->device_id}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = DeviceLog::whereId($id)->get()->last();
        DeviceLog::whereId($id)->delete();
        ActivityLog::write("Delete", "device_log", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
