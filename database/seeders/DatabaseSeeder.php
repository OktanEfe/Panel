<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   */
  public function run(): void
  {
    \App\Models\User::factory(10)->create();
    \App\Models\Machine::factory(5)->create()->each(function ($machine) {
      $machine->parts()->saveMany(\App\Models\Part::factory(3)->make());
      $machine->faults()->saveMany(\App\Models\Fault::factory(2)->make());
    });
  }
}
