<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Scholarship;

class ScholarshipFactory extends Factory
{
    protected $model = Scholarship::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'provider_name' => $this->faker->realText(100),
            'registration_link' => $this->faker->url(),
            'submission_deadline' => $this->faker->dateTime(),
        ];
    }
}
