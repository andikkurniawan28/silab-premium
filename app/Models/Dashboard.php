<?php

namespace App\Models;

use App\Models\User;
use App\Models\Sample;
use App\Models\Analysis;
use App\Models\Material;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Session;

class Dashboard extends Model
{
    use HasFactory;

    public static function index(){
        $data["user"] = User::count("id");
        $data["sample"] = Sample::whereBetween("created_at", [Session::get("start"), Session::get("end")])->count("id");
        $data["analysis"] = Analysis::whereBetween("created_at", [Session::get("start"), Session::get("end")])->count("id");
        $data["material"] = Material::get();
        return $data;
    }
}
