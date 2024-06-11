<?php

namespace Database\Factories;

use App\Models\DataCollected;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataCollected>
 */
class DataCollectedFactory extends Factory
{
    protected $model = DataCollected::class;

    public function definition()
    {
        $createdAt = $this->faker->dateTimeBetween('-30 days');
        return [
            'module_id' => Module::inRandomOrder()->first()->id,
            'measured_value' => $this->faker->randomFloat(2, 0, 100),
            'running_time' => $this->faker->randomFloat(2, 0, 10000),
            'running_status' => $this->faker->boolean,
            'data_count' => $this->faker->numberBetween(1, 1000),
            'created_at' => $createdAt,
            'updated_at' => $createdAt,
        ];
    }
}
