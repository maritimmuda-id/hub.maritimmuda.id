<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\JobPost;
use App\Models\Scholarship;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            ProvinceSeeder::class,
            ExpertiseSeeder::class,
            UserSeeder::class,
        ]);

        Event::factory(12)->create();
        JobPost::factory(12)->create();
        Scholarship::factory(12)->create();
    }
}
