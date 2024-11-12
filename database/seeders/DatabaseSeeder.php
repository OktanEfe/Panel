<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    // Rolleri oluştur
    $adminRole = Role::create(['name' => 'Admin']);
    $supervisorRole = Role::create(['name' => 'Supervisor']);
    $operatorRole = Role::create(['name' => 'Operator']);

    // İzinleri oluştur
    $permissions = [
      'view_admin_dashboard',
      'manage_users',
      'view_reports',
      'manage_tasks',
    ];

    foreach ($permissions as $permission) {
      Permission::create(['name' => $permission]);
    }

    // Rollere izinleri ata
    $adminRole->givePermissionTo(['view_admin_dashboard', 'manage_users', 'view_reports', 'manage_tasks']);
    $supervisorRole->givePermissionTo(['view_reports', 'manage_tasks']);
    $operatorRole->givePermissionTo(['view_reports']);

    // Admin kullanıcı oluştur ve admin rolünü ata
    $adminUser = User::create([
      'name' => 'Admin User',
      'surname' => 'Admin',
      'email' => 'admin@example.com',
      'password' => bcrypt('password'),
      'phone_number' => '05513943738',
    ]);

    // Admin rolünü admin kullanıcıya ata
    $adminUser->assignRole($adminRole);
  }
}
