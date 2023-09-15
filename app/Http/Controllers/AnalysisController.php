<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnalysisStoreRequest;
use App\Http\Requests\AnalysisUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Analysis;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AnalysisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Analysis::whereBetween("created_at", [Session::get("start"), Session::get("end")])->get();
        return view("analysis.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("analysis.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AnalysisStoreRequest $request)
    {
        Analysis::create($request->all());
        ActivityLog::write("Create", "analysis", $request->sample_id);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Analysis::whereId($id)->get()->last();
        return view("analysis.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Analysis::whereId($id)->get()->last();
        return view("analysis.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnalysisUpdateRequest $request, $id)
    {
        $data = Analysis::whereId($id)->get()->last();
        Analysis::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "analysis", "{$data->sample_id} to {$request->sample_id}, indicator {$data->indicator_id} to {$request->indicator_id}, value {$data->value} to {$request->value}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Analysis::whereId($id)->get()->last();
        Analysis::whereId($id)->delete();
        ActivityLog::write("Delete", "analysis", $data->sample_id);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
