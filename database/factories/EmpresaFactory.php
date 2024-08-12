<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->unique()->firstName(),           
            'description' => fake()->realText(),           
            'direccion' => fake()->address(),            
            'tlf_1' => fake()->phoneNumber(),
            'tlf_2' => fake()->phoneNumber(),
            'email' => fake()->companyEmail(),
            'photo' => fake()->image('public/storage/empresas',676,676,null,false,true,null,false,'png'),           
        ];
    }
}
