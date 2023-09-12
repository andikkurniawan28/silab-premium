<?php

namespace App\Http\Controllers;

use App\Http\Requests\IndicatorStoreRequest;
use App\Http\Requests\IndicatorUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Indicator;
// use Illuminate\Http\Request;

class IndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Indicator::all();
        return view("indicator.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("indicator.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IndicatorStoreRequest $request)
    {
        Indicator::create($request->all());
        ActivityLog::write("Create", "indicator", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Indicator::whereId($id)->get()->last();
        return view("indicator.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Indicator::whereId($id)->get()->last();
        return view("indicator.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IndicatorUpdateRequest $request, $id)
    {
        $data = Indicator::whereId($id)->get()->last();
        Indicator::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "indicator", "{$data->name} to {$request->name}, device {$data->device_id} to {$request->device_id}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Indicator::whereId($id)->get()->last();
        Indicator::whereId($id)->delete();
        ActivityLog::write("Delete", "indicator", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
