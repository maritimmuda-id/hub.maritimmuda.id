<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AchievementHistory;
use App\Models\User;

class AchievementHistoryFactory extends Factory
{
    protected $model = AchievementHistory::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'award_name' => $this->faker->realText(20),
            'appreciator' => $this->faker->realText(20),
            'event_name' => $this->faker->realText(20),
            'event_level' => $this->faker->realText(20),
            'achieved_at' => $this->faker->date(),
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
