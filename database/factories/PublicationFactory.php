<?php

namespace Database\Factories;

use App\Enums\PublicationType;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Publication;
use App\Models\User;

class PublicationFactory extends Factory
{
    protected $model = Publication::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => $this->faker->realText(10),
            'author_name' => $this->faker->realText(20),
            'type' => PublicationType::getRandomValue(),
            'publisher' => $this->faker->realText(20),
            'city' => $this->faker->realText(10),
            'publish_date' => $this->faker->date(),
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
