<?php

namespace Database\Seeders;

use App\Support\CategoryMap;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $catalog = [
            'keyboard' => [
                ['Wireless Keyboard Pro', 250000, 'Rapoo 9010M Multi-Device Keyboard'],
                ['Gaming Keyboard USB', 450000, 'Rexus Daiva 78 keys'],
                ['Mechanical RGB Keyboard', 350000, 'NYK Nemesis V2'],
                ['Keyboard Laptop HP 250', 275000, 'Kompatibel HP 250 G7'],
                ['Keyboard Mekanik Redragon K552', 520000, 'Redragon K552 RGB'],
            ],
            'mouse' => [
                ['Gaming Mouse RGB', 200000, 'NYK Nemesis X9'],
                ['Wireless Mouse Silent', 100000, 'Logitech M331 Silent'],
                ['Mouse Gaming 12000 DPI', 235000, 'Rexus Zowie XA'],
                ['Mouse Kantor Simpel', 45000, 'A4Tech U350'],
                ['Mouse Logitech G102', 285000, 'Logitech G102 Lightsync'],
            ],
            'headset' => [
                ['Headset Gaming RGB', 275000, 'Onikuma X15 7.1'],
                ['Headset Office Clear', 150000, 'Rexus Phonic XH-01'],
                ['Headset WirelessANC', 685000, 'JBL Tune 710BT'],
                ['Headset Studio Monitor', 420000, 'Sennheiser HD 206'],
                ['Headset Gaming 7.1', 380000, 'Logitech G432'],
            ],
            'monitor' => [
                ['Monitor 24 inch IPS', 1850000, 'LG 24MK430H'],
                ['Monitor 22 inch VA', 1350000, 'Samsung C22F350'],
                ['Monitor Gaming 27 inch 144Hz', 2450000, 'Xiaomi Redmi G24'],
                ['Monitor 21.5 inch Office', 1100000, 'HP V22'],
                ['Monitor Ultrawide 29 inch', 3250000, 'LG 29WN500'],
            ],
            'storage' => [
                ['SSD 1TB NVMe', 1350000, 'Kingston NV2 1TB'],
                ['SSD 500GB SATA', 750000, 'Samsung 870 EVO 500GB'],
                ['Hard Disk 2TB HDD', 720000, 'Seagate BarraCuda 2TB'],
                ['Flash Drive 64GB', 95000, 'SanDisk Cruzer 64GB'],
                ['RAM DDR4 16GB', 620000, 'Corsair Vengeance LPX'],
            ],
        ];

        foreach ($catalog as $slug => $rows) {
            $model = CategoryMap::model($slug);

            foreach ($rows as [$nama, $harga, $gambar]) {
                $model::firstOrCreate(
                    ['nama' => $nama],
                    ['harga' => $harga, 'gambar' => $gambar]
                );
            }
        }
    }
}
