<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(6),
            'short_description' => $this->faker->sentence(15),
            'content' => $this->faker->paragraphs(3, true),
            'preview_image' => 'preview.jpg',
            'full_image' => 'full.jpeg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}