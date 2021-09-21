<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\OrganizationHistory;
use App\Models\User;

class OrganizationHistoryFactory extends Factory
{
    protected $model = OrganizationHistory::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'organization_name' => $this->faker->realText(20),
            'role' => $this->faker->realText(20),
            'period_start_date' => $this->faker->date(),
            'period_end_date' => $this->faker->date(),
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
