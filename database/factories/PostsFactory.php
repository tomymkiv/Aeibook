<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Posts>
 */
class PostsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere numquam quia aut harum nesciunt quasi! Velit impedit, nisi numquam nam soluta maxime animi quas eaque assumenda quo blanditiis distinctio sit.',
            'image' => fake()->imageUrl(),
        ];
    }
}
