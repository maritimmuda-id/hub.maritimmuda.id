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
            UserSeeder::class,
        ]);

        Event::factory(15)->create();
        JobPost::factory(15)->create();
        Scholarship::factory(15)->create();
    }
}
