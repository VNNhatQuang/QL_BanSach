<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bill>
 */
class BillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'makh' => function () {
                return \App\Models\Customer::pluck('makh')->random();
            },
            'ngaymua' => fake()->date(),
            'damua' => fake()->numberBetween(0, 1),
            'diachi' => fake()->address(),
            'sodienthoai' => fake()->phoneNumber(),
        ];
    }
}
