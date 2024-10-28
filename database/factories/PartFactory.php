<?php

namespace Database\Factories;

use App\Models\Part;
use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;

class PartFactory extends Factory
{
  protected $model = Part::class;

  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => $this->faker->word,
      'machine_id' => Machine::factory(), // ilişkilendirilmiş makine
      'expiry_date' => $this->faker->date

    ];
  }
}
