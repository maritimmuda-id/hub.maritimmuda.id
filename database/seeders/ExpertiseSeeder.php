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
            'Bisnis Kelautan dan Perikanan',
            'Ekonomi Sumber Daya Kelautan',
            'Geologi Kelautan',
            'Hubungan Internasional dan Hukum Maritim',
            'Keamanan Maritim',
            'Kedokteran Kelautan',
            'Kesehatan Masyarakat Pesisir',
            'Klimatologi dan Meteorologi Kelautan',
            'Komunikasi dan Sosiologi Maritim',
            'Logistik dan Ekonomi Maritim',
            'Manajemen Pesisir Terpadu dan Tata Kelola Laut',
            'Olahraga Bahari',
            'Oseanografi Biologi, Oseanografi Perikanan',
            'Oseanografi Fisika, Pemodelan Laut',
            'Oseanografi Kimia, Pencemaran Laut',
            'Pariwisata Bahari',
            'Pendidikan Kelautan dan Perikanan',
            'Perikanan Budidaya',
            'Perikanan Tangkap',
            'Sistem Informasi, Penginderaan Jauh, dan Instrumentasi Kelautan',
            'Teknik Kelautan, Energi Laut',
            'Teknik Perkapalan, Sistem Perkapalan',
            'Transportasi Laut dan Pelayaran',
        ];
    }
}
