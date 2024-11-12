<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
  public function run()
  {
    // Admin rolünü al
    $adminRole = Role::where('name', 'admin')->first();

    // Admin rolüne izinleri atayalım
    $permissions = Permission::all(); // Tüm izinleri admin rolüne atamak istiyorsanız
    $adminRole->syncPermissions($permissions);
  }
}
