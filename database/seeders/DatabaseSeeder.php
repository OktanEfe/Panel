<?php

namespace Database\Seeders;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    $this->call(RoleSeeder::class);
    $adminRole = Role::create(['name' => 'Admin']);
    $supervisorRole = Role::create(['name' => 'Supervisor']);
    $operatorRole = Role::create(['name' => 'Operator']);

    // İzinleri oluştur
    Permission::create(['name' => 'view_admin_dashboard']);
    Permission::create(['name' => 'manage_users']);
    Permission::create(['name' => 'view_reports']);
    Permission::create(['name' => 'manage_tasks']);

    // Rollere izinleri ata
    $adminRole->givePermissionTo(['view_admin_dashboard', 'manage_users', 'view_reports', 'manage_tasks']);
    $supervisorRole->givePermissionTo(['view_reports', 'manage_tasks']);
    $operatorRole->givePermissionTo(['view_reports']);
  }
  //   $adminRole = Role::create(['name' => 'admin']);

  // $user = User::create([
  //  'name' => 'Admin User',
  //     'surname' => 'Admin User',
  //    'email' => 'admin@example.com',
  //    'password' => bcrypt('password'),
  // 'phone_number' =>'05513943738'
  //  ]);

  //  $user->roles()->attach($adminRole->id);
}
