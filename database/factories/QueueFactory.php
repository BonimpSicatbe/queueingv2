<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Queue>
 */
class QueueFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'queue_type' => $this->faker->randomElement(['compliance', 'inquiry, rfa, or others', 'receiving', 'sena inquiry']),
            'status' => 'waiting',
            'fullname' => $this->faker->name(),
            'company' => $this->faker->company(),
            'address' => $this->faker->address(),
            'contact_number' => $this->faker->phoneNumber(),
        ];
    }
}
