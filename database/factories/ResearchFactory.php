<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Research;
use App\Models\User;

class ResearchFactory extends Factory
{
    protected $model = Research::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->realText(10),
            'role' => $this->faker->realText(10),
            'institution_name' => $this->faker->realText(20),
            'sponsor_name' => $this->faker->realText(20),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->randomElement([$this->faker->date(), null]),
            'order_column' => 1,
        ];
    }

    public function useExistingData(): self
    {
        return $this->state([
            'user_id' => User::query()->dontCache()->inRandomOrder()->first()->id,
        ]);
    }
}
