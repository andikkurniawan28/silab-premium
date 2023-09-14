<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\ActivityLog;
use App\Models\GlobalData;
use App\Models\User;
// use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $global_data = GlobalData::run();
        $data = User::all();
        return view("user.index", compact("global_data", "data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $global_data = GlobalData::run();
        return view("user.create", compact("global_data"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserStoreRequest $request)
    {
        $request->request->add(["password" => bcrypt($request->password)]);
        User::create($request->all());
        ActivityLog::write("Create", "user", $request->name);
        return redirect()->back()->with("success", "Data has been stored!");
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $global_data = GlobalData::run();
        $data = User::whereId($id)->get()->last();
        return view("user.show", compact("global_data", "data"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $global_data = GlobalData::run();
        $data = User::whereId($id)->get()->last();
        return view("user.edit", compact("global_data", "data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $data = User::whereId($id)->get()->last();
        User::whereId($id)->update($request->except(["_token", "_method"]));
        ActivityLog::write("Update", "user", "{$data->name} to {$request->name}");
        return redirect()->back()->with("success", "Data has been updated!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = User::whereId($id)->get()->last();
        User::whereId($id)->delete();
        ActivityLog::write("Delete", "user", $data->name);
        return redirect()->back()->with("success", "Data has been deleted!");
    }
}
