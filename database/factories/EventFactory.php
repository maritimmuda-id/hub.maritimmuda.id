<?php

namespace Database\Factories;

use App\Enums\EventType;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Event;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition(): array
    {
        $startDate = $this->faker->dateTime();
        $endDate = $this->faker->dateTimeBetween($startDate, 'tomorrow');

        return [
            'name' => $this->faker->realText(20),
            'organizer_name' => $this->faker->realText(20),
            'type' => EventType::getRandomValue(),
            'external_url' => $this->faker->url(),
            'start_date' => $startDate,
            'end_date' => $this->faker->randomElement([$endDate, null]),
        ];
    }
}
