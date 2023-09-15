<?php

namespace App\Http\Controllers;

use App\Models\Sample;
use App\Models\GlobalData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ResultController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $global_data = GlobalData::run();
        $data = Sample::whereBetween("created_at", [Session::get("start"), Session::get("end")])->orderBy("id", "desc")->get();
        return view("result.index", compact("global_data", "data"));
    }
}
