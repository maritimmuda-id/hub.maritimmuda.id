<?php

namespace Database\Seeders;

use App\Models\AchievementHistory;
use App\Models\Dedication;
use App\Models\EducationHistory;
use App\Models\OrganizationHistory;
use App\Models\Publication;
use App\Models\Research;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->useExistingData()->create([
            'name' => 'Zainal Hasan',
            'email' => 'mail@zhanang.id',
            'password' => Hash::make('123123123'),
            'is_admin' => true,
            'province_id' => 1,
            'first_expertise_id' => 1,
            'second_expertise_id' => 2,
        ]);

        User::factory()->useExistingData()->create(['locale' => 'id']);
        User::factory()->useExistingData()->create();

        for ($i=0; $i < 10; $i++) {
            EducationHistory::factory()->useExistingData()->create();
            WorkExperience::factory()->useExistingData()->create();
            OrganizationHistory::factory()->useExistingData()->create();
            Dedication::factory()->useExistingData()->create();
            Publication::factory()->useExistingData()->create();
            AchievementHistory::factory()->useExistingData()->create();
            Research::factory()->useExistingData()->create();
        }

        // Generate fake user with general profile only
        for ($i = 0; $i < 9; $i++) {
            User::factory()->useExistingData()->create();
        }
    }
}
