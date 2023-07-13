<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'masach' => fake()->firstName(),
            'tensach' => fake()->lastName(),
            'soluong' => fake()->numberBetween(10),
            'gia' => fake()->numberBetween(10000, 50000),
            'maloai' => function () {
                return \App\Models\Category::pluck('maloai')->random();
            },
            'sotap'=> fake()->numberBetween(1, 10),
            'anh' => fake()->imageUrl(),
            'ngaynhap' => fake()->date(),
            'tacgia' => fake()->name(),
        ];
    }
}
