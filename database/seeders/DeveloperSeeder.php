<?php

namespace Database\Seeders;

use App\Models\Developer;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

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
            // [
            //     'name' => 'AWAN',
            //     'image' => 'https://i.imgur.com/wK5aLmB.jpeg',
            //     'role' => 'becdex.com',
            //     'github_link' => 'https://github.com/kurniawanzwz',
            //     'instagram_link' => 'https://www.instagram.com/kurni_cloud/',
            //     'linkedin_link' => 'https://www.linkedin.com/in/muhamad-kurniawan-22309722a/',
            //     'order' => 2,
            // ],
            // [
            //     'name' => 'DARMA',
            //     'image' => 'https://i.imgur.com/1HnpyO3.jpeg',
            //     'role' => 'ibec.stei.ac.id',
            //     'github_link' => 'https://github.com/MDarmawijaya',
            //     'instagram_link' => 'https://www.instagram.com/mhmdrma__?igsh=MTJ4cTh4Nmp6bjZsYw==',
            //     'linkedin_link' => 'https://www.linkedin.com/in/mdarmawijaya',
            //     'order' => 3,
            // ],
            // [
            //     'name' => 'ALESSANDRO',
            //     'image' => 'https://i.imgur.com/smW6Zrd.jpeg',
            //     'role' => 'theblueeconomist.org',
            //     'github_link' => 'https://github.com/aledhita02',
            //     'instagram_link' => 'https://www.instagram.com/alpraznolimitz/',
            //     'linkedin_link' => 'www.linkedin.com/in/alessandrosetyawan',
            //     'order' => 1,
            // ],
            // [
            //     'name' => 'DZAKY',
            //     'image' => 'https://i.imgur.com/UV9dfzW.jpeg',
            //     'role' => 'maritimmuda.id',
            //     'github_link' => 'https://github.com/dzkyydn',
            //     'instagram_link' => 'https://www.instagram.com/mhmdrma__?igsh=MTJ4cTh4Nmp6bjZsYw==',
            //     'linkedin_link' => 'https://www.linkedin.com/in/dzakiyyudin/',
            //     'order' => 4,
            // ],
            // [
            //     'name' => 'SALSYA',
            //     'image' => 'https://i.imgur.com/MKAoBxd.jpeg',
            //     'role' => 'geomuda.id',
            //     'github_link' => 'https://github.com/SalsyaNA',
            //     'instagram_link' => 'https://www.instagram.com/salsyaaa.na?igsh=MXdrbnQzbnhxcHM3Zg==',
            //     'linkedin_link' => '',
            //     'order' => 5,
            // ],
            // [
            //     'name' => 'ULFA',
            //     'image' => 'https://i.imgur.com/8b6CPct.jpeg',
            //     'role' => 'maritimmuda.id',
            //     'github_link' => 'https://github.com/ulfa03',
            //     'instagram_link' => 'https://www.instagram.com/fa.ulpaaa?igsh=MXdtMHlkaHlpbjg0ZQ==',
            //     'linkedin_link' => 'http://www.linkedin.com/in/ulfa-damayanti-',
            //     'order' => 10,
            // ],
            // [
            //     'name' => 'YOGA',
            //     'image' => 'https://i.imgur.com/SwDBPlq.jpeg',
            //     'role' => 'maritimmuda.id',
            //     'github_link' => 'https://github.com/MDarmawijaya',
            //     'instagram_link' => 'https://www.instagram.com/mhmdrma__?igsh=MTJ4cTh4Nmp6bjZsYw==',
            //     'linkedin_link' => 'https://www.linkedin.com/in/mdarmawijaya',
            //     'order' => 6,
            // ],
            // [
            //     'name' => 'JEFRI',
            //     'image' => 'https://i.imgur.com/PNkXJne.jpeg',
            //     'role' => 'iyel.or.id',
            //     'github_link' => 'https://github.com/Jevone',
            //     'instagram_link' => 'https://www.instagram.com/acikiwirkurlala?igsh=MTRtazVwcG1xM3Y0Mw==',
            //     'linkedin_link' => '',
            //     'order' => 12,
            // ],
            // [
            //     'name' => 'NANDO',
            //     'image' => 'https://i.imgur.com/eGQDSIF.jpeg',
            //     'role' => 'iyel.or.id',
            //     'github_link' => 'https://github.com/nandopuntodewo',
            //     'instagram_link' => 'https://www.instagram.com/nandopuntodewo_/',
            //     'linkedin_link' => 'https://www.linkedin.com/in/deanandro-puntodewo-0580ab225/',
            //     'order' => 13,
            // ],
            // [
            //     'name' => 'HANSEN',
            //     'image' => 'https://i.imgur.com/gbqDJEk.jpeg',
            //     'role' => 'iyel.or.id',
            //     'github_link' => '',
            //     'instagram_link' => '',
            //     'linkedin_link' => 'https://www.linkedin.com/in/hansencandra123/',
            //     'order' => 14,
            // ],
            // [
            //     'name' => 'ANNI',
            //     'image' => 'https://i.imgur.com/bE3OwxO.jpeg',
            //     'role' => 'geomuda.id',
            //     'github_link' => 'https://github.com/anisetyowa',
            //     'instagram_link' => 'https://www.instagram.com/annisetyow_?igsh=bGFlYmlwdjNkbXVv',
            //     'linkedin_link' => 'https://www.linkedin.com/in/anisetyoww/',
            //     'order' => 15,
            // ],
            // [
            //     'name' => 'ZAHY',
            //     'image' => 'https://i.imgur.com/JoCLLfv.jpeg',
            //     'role' => 'becdex.com',
            //     'github_link' => 'https://github.com/zahytsaniii',
            //     'instagram_link' => 'https://www.instagram.com/zahytsani/',
            //     'linkedin_link' => 'https://www.linkedin.com/in/zahytsani/',
            //     'order' => 7,
            // ],
            // [
            //     'name' => 'MARIANNE',
            //     'image' => 'https://i.imgur.com/vsDARlO.jpeg',
            //     'role' => 'geoparksyouth.net',
            //     'github_link' => 'https://github.com/darkcesla',
            //     'instagram_link' => 'https://instagram.com/mariannewensesla',
            //     'linkedin_link' => '',
            //     'order' => 11,
            // ],
            // [
            //     'name' => 'LEONARDO',
            //     'image' => 'https://i.imgur.com/OAk0utC.jpeg',
            //     'role' => 'theblueeconomist.org',
            //     'github_link' => 'https://github.com/leonardojeremy',
            //     'instagram_link' => 'https://www.instagram.com/leonardo_jeremy',
            //     'linkedin_link' => 'https://www.linkedin.com/in/leonardojeremy',
            //     'order' => 8,
            // ],
            // [
            //     'name' => 'ARVIN',
            //     'image' => 'https://i.imgur.com/BHjprvM.jpeg',
            //     'role' => 'nextgen',
            //     'github_link' => '',
            //     'instagram_link' => 'https://www.instagram.com/mohamadarvin25?igsh=N3dpYmhiejhpa2h2',
            //     'linkedin_link' => 'https://www.linkedin.com/in/mohamad-arvin-a21560236/',
            //     'order' => 16,
            // ],
            // [
            //     'name' => 'FARHAN',
            //     'image' => 'https://i.imgur.com/vLZpjF7.jpeg',
            //     'role' => 'theblueeconomist.org',
            //     'github_link' => 'https://github.com/farhanyuswa',
            //     'instagram_link' => 'https://www.instagram.com/frhnyswa',
            //     'linkedin_link' => 'https://www.linkedin.com/in/farhanyuswabiyanto',
            //     'order' => 9,
            // ],
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
                'order' => $item['order'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
