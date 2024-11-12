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
    $permissions = [
      'view_dashboard',
      'manage_users',
      'edit_posts',
      // Diğer izinleri buraya ekleyin
    ];
    foreach ($permissions as $permission) {
      Permission::create(['name' => $permission, 'guard_name' => 'web']);
    }
  }
}
