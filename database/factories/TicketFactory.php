<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ticket;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'event_id' => rand(1,10),
            'ticket_type_id' => rand(1,5),
            'is_valid' => true,
            'is_scanned' => false,
        ];
    }
}
