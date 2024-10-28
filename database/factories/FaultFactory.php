<?php

namespace Database\Factories;

use App\Models\Fault;
use App\Models\Machine;
use App\Models\Part;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class FaultFactory extends Factory
{
  protected $model = Fault::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'description' => $this->faker->sentence,
      'machine_id' => Machine::factory(),
      'part_id' => Part::factory(),
      'user_id' => User::factory(),
      'created' => $this->faker->date,
      'cause_of_malfunction' => $this->faker->name

    ];
  }
}
