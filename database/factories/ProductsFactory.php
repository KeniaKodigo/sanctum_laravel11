<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $productNames = [
            'Camiseta deportiva',
            'Zapatos de cuero',
            'Teléfono móvil',
            'Laptop gamer',
            'Audífonos inalámbricos'
        ];

        return [
            'name' => $this->faker->randomElement($productNames), // Selecciona un nombre de la lista
            'price' => $this->faker->randomFloat(2, 10, 100),
            'stock' => $this->faker->numberBetween(1, 50),
            'user_id' => User::factory()
        ];
    }
}
