<?php

namespace App\Models;

use App\Models\Device;
use App\Models\Method;
use App\Models\Category;
use App\Models\Material;
use App\Models\Indicator;
use App\Models\Consumable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GlobalData extends Model
{
    use HasFactory;

    public static function run(){
        $data["vendor"]     = Vendor::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["consumable"] = Consumable::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["device"]     = Device::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["method"]     = Method::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["category"]   = Category::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["material"]   = Material::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["indicator"]  = Indicator::select(["id", "name"])->orderBy("id", "asc")->get();
        return $data;
    }
}
