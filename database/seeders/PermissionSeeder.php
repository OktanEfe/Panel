<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      Permission::create(['name' => 'create-user', 'description' => 'Can create users']);
      Permission::create(['name' => 'edit-user', 'description' => 'Can edit users']);
      Permission::create(['name' => 'delete-user', 'description' => 'Can delete users']);
    }
}
