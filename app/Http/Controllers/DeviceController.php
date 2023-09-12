<?php

namespace App\Http\Controllers;

use App\Http\Requests\DeviceStoreRequest;
use App\Http\Requests\DeviceUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Device;
// use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Device::all();
        return view("device.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("device.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DeviceStoreRequest $request)
    {
        Device::create($request->all());
        ActivityLog::write("Create", "device", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Device::whereId($id)->get()->last();
        return view("device.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Device::whereId($id)->get()->last();
        return view("device.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DeviceUpdateRequest $request, $id)
    {
        $data = Device::whereId($id)->get()->last();
        Device::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "device", "{$data->name} to {$request->name}, vendor {$data->vendor_id} to {$request->vendor_id}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Device::whereId($id)->get()->last();
        Device::whereId($id)->delete();
        ActivityLog::write("Delete", "device", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
