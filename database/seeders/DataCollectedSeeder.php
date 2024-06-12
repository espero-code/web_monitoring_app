<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DataCollected;

class DataCollectedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataCollected::factory()->count(500)->create();
    }
}
