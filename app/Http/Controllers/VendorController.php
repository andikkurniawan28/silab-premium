<?php

namespace App\Http\Controllers;

use App\Http\Requests\VendorStoreRequest;
use App\Http\Requests\VendorUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Vendor;
// use Illuminate\Http\Request;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Vendor::all();
        return view("vendor.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("vendor.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VendorStoreRequest $request)
    {
        Vendor::create($request->all());
        ActivityLog::write("Create", "vendor", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Vendor::whereId($id)->get()->last();
        return view("vendor.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Vendor::whereId($id)->get()->last();
        return view("vendor.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VendorUpdateRequest $request, $id)
    {
        $data = Vendor::whereId($id)->get()->last();
        Vendor::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "vendor", "{$data->name} to {$request->name}, {$data->email} to {$request->email}, {$data->phone} to {$request->phone}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Vendor::whereId($id)->get()->last();
        Vendor::whereId($id)->delete();
        ActivityLog::write("Delete", "vendor", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
