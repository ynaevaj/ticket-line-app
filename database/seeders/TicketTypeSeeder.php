<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TicketType;


class TicketTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ticket_types = ["General Admission", "VIP", "Early Bird", "One-day Pass", "Multi-day Pass"];

        for($i=0; $i<sizeof($ticket_types); $i++){
            TicketType::create([
                'ticket_type_name' => $ticket_types[$i],
            ]);
        }
    }
}
