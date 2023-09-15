<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\GlobalData;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $global_data = GlobalData::run();
        $data = Dashboard::index();
        return view("dashboard", compact("global_data", "data"));
    }
}
