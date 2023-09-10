<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
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

    }
}
