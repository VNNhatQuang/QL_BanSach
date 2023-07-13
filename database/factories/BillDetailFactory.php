<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BillDetail>
 */
class BillDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'masach' => function() {
                return \App\Models\Book::pluck('masach')->random();
            },
            'soluongmua' => fake()->numberBetween(0, 1),
            'mahoadon' => function() {
                return \App\Models\Bill::pluck('mahoadon')->random();
            },
        ];
    }
}
