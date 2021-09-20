<?php

namespace Database\Factories;

use App\Enums\EducationLevel;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\EducationHistory;
use App\Models\User;

class EducationHistoryFactory extends Factory
{
    protected $model = EducationHistory::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'institution_name' => $this->faker->realText(20),
            'major' => $this->faker->realText(20),
            'level' => EducationLevel::getRandomValue(),
            'graduation_date' => $this->faker->date(),
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
