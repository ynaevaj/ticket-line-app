<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'event_name' => $this->faker->sentence(),
            'event_uuid' =>  Str::uuid(),
            'event_date' => $this->faker->dateTimeBetween('+1 days', '+1 month'),
            'box_office_id' => rand(1,3),
            'notes' => $this->faker->paragraph(),
        ];
    }
}
