<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'cpf'           => fake()->cpf(),
            'name'          => fake()->name(),
            'date_of_birth' => fake()->dateTime(),
            'gender'        => fake()->randomElement(['F', 'M']),
            'address'       => fake()->streetAddress(),
            'state'         => fake()->stateAbbr(),
            'city'          => fake()->city()
        ];
    }
}
