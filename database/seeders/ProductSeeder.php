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
                ['Wireless Keyboard Pro', 250000, '1780974976_Rapoo 9010M Multi-Device Keyboard and Mouse Combo….jpg'],
                ['Gaming Keyboard USB', 450000, '1780975042_T-WOLF TF200 Gaming Keyboard USB Floating….jpg'],
                ['Mechanical RGB Keyboard', 350000, '1780975123_awesome Geek GK64 64 Key Gateron Switch  Swappable….jpg'],
                ['Keyboard Laptop HP 250', 275000, '1780975206_HP Stylish Ultra-Slim Design Wireless Keyboard and….jpg'],
                ['Keyboard Mekanik Redragon K552', 520000, '1780974023_RGB Keyboard.jpg'],
            ],
            'mouse' => [
                ['Gaming Mouse RGB', 200000, '1781154192_Redragon M602 RGB Wired Gaming Mouse RGB Spectrum….jpg'],
                ['Wireless Mouse Silent', 100000, '1781154276_Drahtlose Maus Stille Maus 2,4 GHz Tragbare Mobile….jpg'],
                ['Mouse Gaming 12000 DPI', 235000, '1781154336_DESIGNED WITH DOCTORS - ELECOM worked with top….jpg'],
                ['Mouse Kantor Simpel', 45000, '1781154389_•Smooth, precise and affordable USB-connected….jpg'],
                ['Mouse Logitech G102', 285000, '1781154435_318418636180962448.jpg'],
            ],
            'headset' => [
                ['Headset Gaming RGB', 275000, '1781154485_앱코 가상 7_1 RGB 노이즈 캔슬링 마이크 3D 게이밍 헤드셋, HACKER….jpg'],
                ['Headset Office Clear', 150000, '1781154531_Wireless Earbuds, Bluetooth 5_4 Headphones in Ear….jpg'],
                ['Headset WirelessANC', 685000, '1781154589_BENGOO G9000 Stereo Gaming Headset for PS4 PC Xbox….jpg'],
                ['Headset Studio Monitor', 420000, '1781154666_Professional Monitor Recording Headphones with….jpg'],
                ['Headset Gaming 7.1', 380000, '1781154718_314689092727153043.jpg'],
            ],
            'monitor' => [
                ['Monitor 24 inch IPS', 1850000, '1781154773_Amazon Basics 24 Inch (23_8 inch viewable)….jpg'],
                ['Monitor 22 inch VA', 1350000, '1781154824_Gawfolk 34 Inch Curved Gaming Monitor 165Hz….jpg'],
                ['Monitor Gaming 27 inch 144Hz', 2450000, '1781154879_KTC 27" 180Hz QHD(2560× 1440p) Gaming Monitor….jpg'],
                ['Monitor 21.5 inch Office', 1100000, '1781154925_MSI PRO MP242 E14A 24_ IPS Full HD 144Hz 1ms VGA….jpg'],
                ['Monitor Ultrawide 29 inch', 3250000, '1781154970_IDEAL PARA SEU SETUP!___Eleve sua produtividade e….jpg'],
            ],
            'storage' => [
                ['SSD 1TB NVMe', 1350000, '1781155020_Goldenfir M2 SSD NVMe 128GB 256GB 512GB 1TB….jpg'],
                ['SSD 500GB SATA', 750000, '1781155068_KingSpec M2 Sata3 Ssd 2280 512gb 256gb 128gb 1TB….jpg'],
                ['Hard Disk 2TB HDD', 720000, '1781155112_Features_ The 2_5inch hard disk box can be easily….jpg'],
                ['Flash Drive 64GB', 95000, '1781155251_Upgrade your gaming rig, content-creation setup….jpg'],
                ['RAM DDR4 16GB', 620000, '1781155156_Samsung 990 PRO NVMe M_2 SSD , 1 TB, PCIe 4.0…'],
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
