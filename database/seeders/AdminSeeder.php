<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->email = "admin@eteredicions.com";
        $admin->email_verified_at = now();
        $admin->first_name = "admin";
        $admin->last_name = "admin";
        $admin->password = Hash::make("admin");
        $admin->phone = "123456789";
        $admin->role_id = 1;
        $admin->save();

    }
}
