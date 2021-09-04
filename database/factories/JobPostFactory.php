<?php

namespace Database\Factories;

use App\Enums\JobType;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\JobPost;

class JobPostFactory extends Factory
{
    protected $model = JobPost::class;

    public function definition(): array
    {
        return [
            'position_title' => $this->faker->realText(20),
            'company_name' => $this->faker->realText(20),
            'type' => JobType::getRandomValue(),
            'link' => $this->faker->url(),
            'application_closed_at' => $this->faker->dateTime(),
        ];
    }
}
