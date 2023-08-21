<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->data() as $row) {
            Province::query()->insert([
                'name' => $row[0],
                'code' => $row[1],
            ]);
        }
    }

    private function data(): array
    {
        return [
            ['Aceh', '01'],
            ['Bali', '02'],
            ['Banten', '03'],
            ['Bengkulu', '04'],
            ['DI Yogyakarta', '05'],
            ['DKI Jakarta', '06'],
            ['Gorontalo', '07'],
            ['Jambi', '08'],
            ['Jawa Barat', '09'],
            ['Jawa Tengah', '10'],
            ['Jawa Timur', '11'],
            ['Kalimantan Barat', '12'],
            ['Kalimantan Selatan', '13'],
            ['Kalimantan Tengah', '14'],
            ['Kalimantan Timur', '15'],
            ['Kalimantan Utara', '16'],
            ['Kepulauan Bangka Belitung', '17'],
            ['Kepulauan Riau', '18'],
            ['Lampung', '19'],
            ['Maluku', '20'],
            ['Maluku Utara', '21'],
            ['Nusa Tenggara Barat', '22'],
            ['Nusa Tenggara Timur', '23'],
            ['Papua', '24'],
            ['Papua Barat', '25'],
            ['Riau', '26'],
            ['Sulawesi Barat', '27'],
            ['Sulawesi Selatan', '28'],
            ['Sulawesi Tengah', '29'],
            ['Sulawesi Tenggara', '30'],
            ['Sulawesi Utara', '31'],
            ['Sumatera Barat', '32'],
            ['Sumatera Selatan', '33'],
            ['Sumatera Utara', '34'],
        ];
    }
}
