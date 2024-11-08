<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;

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
