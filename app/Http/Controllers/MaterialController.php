<?php

namespace App\Http\Controllers;

use App\Http\Requests\MaterialStoreRequest;
use App\Http\Requests\MaterialUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Material;
// use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Material::all();
        return view("material.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("material.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialStoreRequest $request)
    {
        Material::create($request->all());
        ActivityLog::write("Create", "material", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Material::whereId($id)->get()->last();
        return view("material.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Material::whereId($id)->get()->last();
        return view("material.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialUpdateRequest $request, $id)
    {
        $data = Material::whereId($id)->get()->last();
        Material::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "material", "{$data->name} to {$request->name}, category {$data->category_id} to {$request->category_id}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Material::whereId($id)->get()->last();
        Material::whereId($id)->delete();
        ActivityLog::write("Delete", "material", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
