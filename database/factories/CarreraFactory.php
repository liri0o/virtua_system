<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Carrera>
 */
class CarreraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->randomElement($name = [

                'Ingeniería de Sistemas',
                'Ingeniería Civil',
                'Ingeniería Industrial',
                'Ingeniería Electrónica',
                'Ingeniería Eléctrica',
                'Ingeniería Química',
                'Ingeniería Mtto. Mecánico',
                'Ingeniería en Petróleo'

            ]),

            'code' => fake()->unique()->numberBetween($int = '40', $int2 = '50'),
        ];
    }
}
