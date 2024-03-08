<?php

namespace Database\Seeders;

use Carbon\Carbon;
use GuzzleHttp\Client;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class StoreSeeder extends Seeder
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
                'name' => 'Americano',
                'category' => 'Coffe',
                'price' => 150000,
                'image' => 'https://images.unsplash.com/photo-1580661869408-55ab23f2ca6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80',
                'link' => 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462'
            ],
            [
                'name' => 'Americano',
                'category' => 'Coffe',
                'price' => 150000,
                'image' => 'https://images.unsplash.com/photo-1580661869408-55ab23f2ca6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80',
                'link' => 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462'
            ],
            [
                'name' => 'Americano',
                'category' => 'Coffe',
                'price' => 150000,
                'image' => 'https://images.unsplash.com/photo-1580661869408-55ab23f2ca6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80',
                'link' => 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462'
            ],
            [
                'name' => 'Americano',
                'category' => 'Coffe',
                'price' => 150000,
                'image' => 'https://images.unsplash.com/photo-1580661869408-55ab23f2ca6e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80',
                'link' => 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462'
            ]
        ];

        $client = new Client();

        foreach ($data as $item) {
            $response = $client->request('GET', $item['image']);
            $extension = pathinfo($item['image'], PATHINFO_EXTENSION);
            $imageName = uniqid() . '.' . $extension;
            $imageData = $response->getBody()->getContents();
            $filePath = 'public/' . $imageName; // Direktori tujuan untuk menyimpan gambar
            Storage::put($filePath, $imageData);

            Store::insert([
                'name' => $item['name'],
                'category' => $item['category'],
                'price' => $item['price'],
                'link' => $item['link'],
                'image' => $imageName,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
