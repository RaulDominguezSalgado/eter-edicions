<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new Role();
        $admin->name = "admin";
        $admin->save();

        $contentManager = new Role();
        $contentManager->name = "content manager";
        $contentManager->save();
    }
}
