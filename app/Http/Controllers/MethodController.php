<?php

namespace App\Http\Controllers;

use App\Http\Requests\MethodStoreRequest;
use App\Http\Requests\MethodUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Method;
// use Illuminate\Http\Request;

class MethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Method::all();
        return view("method.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("method.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MethodStoreRequest $request)
    {
        Method::create($request->all());
        ActivityLog::write("Create", "method", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Method::whereId($id)->get()->last();
        return view("method.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Method::whereId($id)->get()->last();
        return view("method.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MethodUpdateRequest $request, $id)
    {
        $data = Method::whereId($id)->get()->last();
        Method::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "method", "{$data->name} to {$request->name}, {$data->description} to {$request->description}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Method::whereId($id)->get()->last();
        Method::whereId($id)->delete();
        ActivityLog::write("Delete", "method", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
