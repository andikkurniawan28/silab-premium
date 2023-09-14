<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumableLogStoreRequest;
use App\Http\Requests\ConsumableLogUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\ConsumableLog;
// use Illuminate\Http\Request;

class ConsumableLogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = ConsumableLog::all();
        return view("consumable_log.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("consumable_log.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsumableLogStoreRequest $request)
    {
        ConsumableLog::create($request->all());
        ActivityLog::write("Create", "consumable_log", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = ConsumableLog::whereId($id)->get()->last();
        return view("consumable_log.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = ConsumableLog::whereId($id)->get()->last();
        return view("consumable_log.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsumableLogUpdateRequest $request, $id)
    {
        $data = ConsumableLog::whereId($id)->get()->last();
        ConsumableLog::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "consumable_log", "{$data->name} to {$request->name}, consumable {$data->consumable_id} to {$request->consumable_id}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = ConsumableLog::whereId($id)->get()->last();
        ConsumableLog::whereId($id)->delete();
        ActivityLog::write("Delete", "consumable_log", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
