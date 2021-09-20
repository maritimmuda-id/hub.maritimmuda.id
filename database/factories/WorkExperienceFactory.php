<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\WorkExperience;

class WorkExperienceFactory extends Factory
{
    protected $model = WorkExperience::class;

    public function definition(): array
    {
        $startDate = $this->faker->dateTime();
        $endDate = $this->faker->dateTimeBetween($startDate, 'tomorrow');

        return [
            'user_id' => User::factory(),
            'position_title' => $this->faker->realText(20),
            'company_name' => $this->faker->realText(20),
            'start_date' => $startDate,
            'end_date' => $this->faker->randomElement([$endDate, null]),
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
