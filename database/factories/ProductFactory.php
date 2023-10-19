<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [
            'slug'=>Str::random(4),
            'category_id'=>1,
            'title' => fake()->title,
            'description' => fake()->text,
            'picture' => 'picture',
            'price' => 5,
            'balance' => 1,
        ];
    }
}
