<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Expertise;

class ExpertiseFactory extends Factory
{
    protected $model = Expertise::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->realText(20),
        ];
    }
}
