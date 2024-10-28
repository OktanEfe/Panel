<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MachineFactory extends Factory
{
  protected $model = Machine::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'machine_name' => $this->faker->word,
      'parts_count' => $this->faker->numberBetween(1, 5),

    ];
  }
}
