<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\Category;
// use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = Category::all();
        return view("category.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("category.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        Category::create($request->all());
        ActivityLog::write("Create", "category", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = Category::whereId($id)->get()->last();
        return view("category.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = Category::whereId($id)->get()->last();
        return view("category.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $data = Category::whereId($id)->get()->last();
        Category::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "category", "{$data->name} to {$request->name}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Category::whereId($id)->get()->last();
        Category::whereId($id)->delete();
        ActivityLog::write("Delete", "category", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
