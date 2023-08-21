<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Dedication;
use App\Models\User;

class DedicationFactory extends Factory
{
    protected $model = Dedication::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->realText(20),
            'role' => $this->faker->realText(20),
            'institution_name' => $this->faker->realText(20),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'order_column' => 1,
        ];
    }

    public function useExistingData(): self
    {
        return $this->state([
            'user_id' => User::query()->inRandomOrder()->first()->id,
        ]);
    }
}
