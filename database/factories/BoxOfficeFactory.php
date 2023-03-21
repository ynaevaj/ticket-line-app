<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\BoxOffice;
use App\Enums\StatusEnum;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BoxOffice>
 */
class BoxOfficeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'box_office_name' => $this->faker->words(2, true),
            'box_office_status' => StatusEnum::Active,
        ];
    }
}
