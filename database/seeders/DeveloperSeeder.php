<?php

namespace Database\Seeders;

use App\Models\Developer;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'AWAN',
                'image' => 'https://i.imgur.com/P8Dae4E.jpeg',
                'role' => 'maritimmuda.id',
                'github_link' => 'https://github.com/yoga-nditya',
                'instagram_link' => 'https://www.instagram.com/yoga_nditya',
                'linkedin_link' => 'https://www.linkedin.com/in/yoga-aditya-5559851b5',
            ],
            [
                'name' => 'AWAN',
                'image' => 'https://i.imgur.com/P8Dae4E.jpeg',
                'role' => 'theblueeconomist.org',
                'github_link' => 'https://github.com/yoga-nditya',
                'instagram_link' => 'https://www.instagram.com/yoga_nditya',
                'linkedin_link' => 'https://www.linkedin.com/in/yoga-aditya-5559851b5',
            ],
            [
                'name' => 'AWAN',
                'image' => 'https://i.imgur.com/P8Dae4E.jpeg',
                'role' => 'becdex.com',
                'github_link' => 'https://github.com/yoga-nditya',
                'instagram_link' => 'https://www.instagram.com/yoga_nditya',
                'linkedin_link' => 'https://www.linkedin.com/in/yoga-aditya-5559851b5',
            ],
            [
                'name' => 'AWAN',
                'image' => 'https://i.imgur.com/P8Dae4E.jpeg',
                'role' => 'TheBlue',
                'github_link' => 'https://github.com/yoga-nditya',
                'instagram_link' => 'https://www.instagram.com/yoga_nditya',
                'linkedin_link' => 'https://www.linkedin.com/in/yoga-aditya-5559851b5',
            ],
            [
                'name' => 'AWAN',
                'image' => 'https://i.imgur.com/P8Dae4E.jpeg',
                'role' => 'TheBlue',
                'github_link' => 'https://github.com/yoga-nditya',
                'instagram_link' => 'https://www.instagram.com/yoga_nditya',
                'linkedin_link' => 'https://www.linkedin.com/in/yoga-aditya-5559851b5',
            ],
        ];

        $client = new Client();

        foreach ($data as $item) {
            $response = $client->request('GET', $item['image']);
            $extension = pathinfo($item['image'], PATHINFO_EXTENSION);
            $imageName = uniqid() . '.' . $extension;

            Storage::put('public/assets/team/' . $imageName, $response->getBody());

            Developer::insert([
                'id' => Str::uuid(),
                'name' => $item['name'],
                'image' => 'assets/team/' . $imageName,
                'role' => $item['role'],
                'github_link' => $item['github_link'],
                'instagram_link' => $item['instagram_link'],
                'linkedin_link' => $item['linkedin_link'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
