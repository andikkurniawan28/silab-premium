<?php

namespace App\Http\Controllers;

use App\Models\GlobalData;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ActivityLogController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $global_data = GlobalData::run();
        $data = ActivityLog::whereBetween("created_at", [Session::get("start"), Session::get("end")])->orderBy("id", "desc")->get();
        return view("activity_log.index", compact("global_data", "data"));
    }
}
