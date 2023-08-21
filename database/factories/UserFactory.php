<?php

namespace Database\Factories;

use App\Enums\Gender;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Expertise;
use App\Models\Province;
use App\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'uid' => null,
            'serial_number' => null,
            'name' => $this->faker->firstName() . ' ' . $this->faker->lastName(),
            'gender' => Gender::getRandomValue(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'place_of_birth' => $this->faker->randomElement([$this->faker->realText(), null]),
            'date_of_birth' => $this->faker->randomElement([$this->faker->date(), null]),
            'remember_token' => Str::random(60),
            'linkedin_profile' => 'https://www.linkedin.com/in/user',
            'instagram_profile' => 'https://instagram.com/user',
            'province_id' => Province::factory(),
            'first_expertise_id' => Expertise::factory(),
            'second_expertise_id' => Expertise::factory(),
            'permanent_address' => $this->faker->text(100),
            'residence_address' => $this->faker->text(100),
            'bio' => $this->faker->text(),
        ];
    }

    public function useExistingData(): self
    {
        $expertises = Expertise::query()->dontCache()->inRandomOrder()->limit(2)->get();

        return $this->state([
            'province_id' => Province::query()->dontCache()->inRandomOrder()->first()->id,
            'first_expertise_id' => $expertises[0]->id,
            'second_expertise_id' => $expertises[1]->id,
        ]);
    }

    public function admin(): self
    {
        return $this->state([
            'is_admin' => true,
        ]);
    }
}
