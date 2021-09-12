<?php

namespace Database\Seeders;

use App\Models\Expertise;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExpertiseSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->data() as $value) {
            DB::table((new Expertise())->getTable())
                ->insert([
                    'name' => $value
                ]);
        }
    }

    public function data()
    {
        return [
            'Arkeologi, Sejarah, dan Budaya Maritim',
            'Bioteknologi, Biokimia, dan Pengolahan Produk Kelautan',
            'Geologi Kelautan',
            'Kedokteran Kelautan',
            'Klimatologi dan Meteorologi Kelautan',
            'Logistik dan Ekonomi Maritim',
            'Oseanografi Biologi, Oseanografi Perikanan',
            'Oseanografi Fisika, Pemodelan Laut',
            'Oseanografi Kimia, Pencemaran Laut',
            'Perikanan Tangkap',
            'Perikanan Budidaya',
            'Sistem Informasi, Penginderaan Jauh, dan Instrumentasi Kelautan',
            'Teknik Kelautan, Energi Laut',
            'Teknik Perkapalan, Sistem Perkapalan',
            'Pariwisata Bahari',
            'Pendidikan Kelautan dan Perikanan',
            'Bisnis Kelautan dan Perikanan',
            'Komunikasi dan Sosiologi Maritim',
            'Ekonomi Sumber Daya Kelautan',
            'Manajemen Pesisir Terpadu dan Tata Kelola Laut',
            'Hubungan Internasional dan Hukum Maritim',
        ];
    }
}
