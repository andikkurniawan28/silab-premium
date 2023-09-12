<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConsumableStoreRequest;
use App\Http\Requests\ConsumableUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Consumable;
// use Illuminate\Http\Request;

class ConsumableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Consumable::all();
        return view("consumable.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("consumable.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ConsumableStoreRequest $request)
    {
        Consumable::create($request->all());
        ActivityLog::write("Create", "consumable", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Consumable::whereId($id)->get()->last();
        return view("consumable.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Consumable::whereId($id)->get()->last();
        return view("consumable.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ConsumableUpdateRequest $request, $id)
    {
        $data = Consumable::whereId($id)->get()->last();
        Consumable::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "consumable", "{$data->name} to {$request->name}, vendor {$data->vendor_id} to {$request->vendor_id}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Consumable::whereId($id)->get()->last();
        Consumable::whereId($id)->delete();
        ActivityLog::write("Delete", "consumable", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
