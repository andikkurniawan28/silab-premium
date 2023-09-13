<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use App\Models\Device;
use App\Models\Method;
use App\Models\Sample;
use App\Models\Vendor;
use App\Models\Category;
use App\Models\Material;
use App\Models\Indicator;
use App\Models\Consumable;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $role = [
            ["name" => ucfirst("user")],
            ["name" => ucfirst("admin")],
            ["name" => ucfirst("manager")],
        ];
        Role::insert($role);

        $user = [
            ["role_id" => 1, "username" => "user", "password" => bcrypt("user"), "name" => ucfirst("user")],
            ["role_id" => 2, "username" => "admin", "password" => bcrypt("admin"), "name" => ucfirst("admin")],
            ["role_id" => 3, "username" => "manager", "password" => bcrypt("manager"), "name" => ucfirst("manager")],
        ];
        User::insert($user);

        $vendor = [];
        for($i=1; $i<=20; $i++){
            $vendor[$i]["name"]     = "Vendor {$i}";
            $vendor[$i]["email"]    = "vendor{$i}@gmail.com";
            $vendor[$i]["phone"]    = "08123456789{$i}";
            $vendor[$i]["user_id"]  = 2;
        }
        Vendor::insert($vendor);

        $consumable = [];
        for($i=1; $i<=20; $i++){
            $consumable[$i]["name"]         = "Consumable {$i}";
            $consumable[$i]["vendor_id"]    = $i;
            $consumable[$i]["user_id"]      = 2;
        }
        Consumable::insert($consumable);

        $device = [];
        for($i=1; $i<=20; $i++){
            $device[$i]["name"]         = "Device {$i}";
            $device[$i]["vendor_id"]    = $i;
            $device[$i]["user_id"]      = 2;
        }
        Device::insert($device);

        $method = [];
        for($i=1; $i<=20; $i++){
            $method[$i]["name"]         = "Method {$i}";
            $method[$i]["description"]  = "This is how method {$i} works.";
            $method[$i]["user_id"]      = 2;
        }
        Method::insert($method);

        $category = [];
        for($i=1; $i<=20; $i++){
            $category[$i]["name"]       = "Category {$i}";
            $category[$i]["user_id"]    = 2;
        }
        Category::insert($category);

        $indicator = [];
        for($i=1; $i<=20; $i++){
            $indicator[$i]["name"]      = "Indicator {$i}";
            $indicator[$i]["unit"]      = "%";
            $indicator[$i]["device_id"] = $i;
            $indicator[$i]["method_id"] = $i;
            $indicator[$i]["user_id"]   = 2;
        }
        Indicator::insert($indicator);

        $material = [];
        for($i=1; $i<=20; $i++){
            $material[$i]["name"]           = "Material {$i}";
            $material[$i]["category_id"]    = $i;
            $material[$i]["user_id"]        = 2;
        }
        Material::insert($material);

        $sample = [];
        for($i=1; $i<=20; $i++){
            $sample[$i]["description"]    = "This is test {$i}";
            $sample[$i]["material_id"]    = $i;
            $sample[$i]["user_id"]        = 2;
        }
        Sample::insert($sample);

    }
}
