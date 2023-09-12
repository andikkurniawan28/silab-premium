<?php

namespace App\Models;

use App\Models\Device;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class GlobalData extends Model
{
    use HasFactory;

    public static function run(){
        $data["vendor"] = Vendor::select(["id", "name"])->orderBy("id", "asc")->get();
        $data["device"] = Device::select(["id", "name"])->orderBy("id", "asc")->get();
        return $data;
    }
}
