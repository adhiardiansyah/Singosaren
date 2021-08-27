<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            [
                'name' => 'Adhi Ardiansyah',
                'email' => 'adhiardiansyah23@gmail.com',
                'phone_number' => '081234567891',
                'address' => 'Jalan Ir. Sutami No.36, Kentingan, Jebres, Surakarta',
                'password' => Hash::make('Adhie313Sullivan'),
                'id_group' => 1
            ],
            [
                'name' => 'Akmal Tajuddin',
                'email' => 'akmaltajuddin@gmail.com',
                'phone_number' => '082321437856',
                'address' => ' Jalan Kolonel Sutarto 150K, Jebres, Surakarta',
                'password' => Hash::make('Akmal123'),
                'id_group' => 2
            ],
        ]);

        DB::table('products')->insert([
            [
                'name' => 'Apple iPhone 12 mini 256GB, RED',
                'id_brand' => 10,
                'price' => 13999000,
                'description' => 'Isi Kotak :
• iPhone dengan iOS 14.
• Kabel USB-C ke Lightning.
• Buku Manual dan dokumentasi lain.

Ukuran layar: 5.4 inci, 1080 x 2340 pixels, Super Retina XDR OLED, HDR10, 625 nits (typ), 1200 nits (peak)
Memori: RAM 4 GB, ROM 256 GB
Sistem operasi: iOS 14
CPU: Apple A14 Bionic (5 nm), Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)
GPU: Apple GPU (4-core graphics)
Kamera: 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS. 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6". Depan 12 MP, f/2.2, 23mm (wide), 1/3.6"
SIM: Nano-SIM/eSIM
Baterai: Li-Ion 2227 mAh
Dimensi: 131.5 x 64.2 x 7.4 mm
Berat: 135 gr
Garansi Resmi',
                'picture' => '10.jpg'
            ],
            [
                'name' => 'Apple iPhone 12 mini 64GB, Black',
                'id_brand' => 10,
                'price' => 10999000,
                'description' => 'Isi Kotak :
• iPhone dengan iOS 14.
• Kabel USB-C ke Lightning.
• Buku Manual dan dokumentasi lain.

Ukuran layar: 5.4 inci, 1080 x 2340 pixels, Super Retina XDR OLED, HDR10, 625 nits (typ), 1200 nits (peak)
Memori: RAM 4 GB, ROM 64 GB
Sistem operasi: iOS 14
CPU: Apple A14 Bionic (5 nm), Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)
GPU: Apple GPU (4-core graphics)
Kamera: 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS. 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6". Depan 12 MP, f/2.2, 23mm (wide), 1/3.6"
SIM: Nano-SIM/eSIM
Baterai: Li-Ion 2227 mAh
Dimensi: 131.5 x 64.2 x 7.4 mm
Berat: 135 gr
Garansi Resmi',
                'picture' => '11.jpg'
            ],
            [
                'name' => 'realme Narzo 30A 4GB 64GB - Black',
                'id_brand' => 13,
                'price' => 1999000,
                'description' => 'Ukuran layar: 6.5 inci, 720 x 1600 pixels, IPS LCD
Memori: RAM 4 GB, ROM 64 GB, MicroSD slot
Sistem operasi: Android 10, Realme UI
CPU: MediaTek Helio G85 (12nm) Octa-core up to 2.0 GHz
GPU: Mali-G52 MC2
Kamera: Dual 13 MP, f/2.2, 26mm (wide) &amp; 2 MP B/W, f/2.4, depan 8 MP, f/2.0, 26mm (wide)
SIM: Dual SIM (Nano-SIM)
Baterai: Non-removable Li-Po 6000 mAh
Berat: 207 gram
Garansi Resmi',
                'picture' => '12.jpg'
            ],
            [
                'name' => 'realme C20 2GB 32GB - Blue',
                'id_brand' => 13,
                'price' => 1299000,
                'description' => 'Ukuran layar: 6.5 inches, 720 x 1600 pixels (~270 ppi density) IPS LCD
Memori: RAM 2GB, ROM 32GB, microSDXC Slot
Sistem operasi: Android 11; Realme UI
CPU: MediaTek Helio G35 (12 nm), Octa-core (4x2.3 GHz Cortex-A53 &amp; 4x1.8 GHz Cortex-A53)
GPU: PowerVR GE8320
Kamera Belakang: 8 MP f/2.0 AF (wide)
Kamera Depan: 5 MP f/2.2 (wide)
SIM: Dual SIM (Nano-SIM, dual stand-by)
Baterai: Li-Po 5000 mAh, non-removable
Berat: 190 gr
Garansi Resmi',
                'picture' => '13.jpg'
            ],
            [
                'name' => 'realme 8 Pro 8GB 128GB - Blue',
                'id_brand' => 13,
                'price' => 4499000,
                'description' => 'Ukuran layar: 6.4 inci, 1080 x 2400 pixels, Super AMOLED
Memori: RAM 8 GB, ROM 128 GB, MicroSD slot
Sistem operasi: Android 11, Realme UI 2.0
CPU: Qualcomm SM7125 Snapdragon 720G (8 nm) Octa-core up to 2.3 GHz
GPU: Adreno 618
Kamera: Quad 108 MP, f/1.88, 26mm (wide); 8 MP, f/2.25, 119˚, 16mm (ultrawide); 2 MP, f/2.4, (macro); 2 MP, f/2.4, (depth), depan 16 MP, f/2.45, (wide)
SIM: Dual SIM (Nano-SIM)
Baterai: Li-Po 4500 mAh, non-removable
Berat: 176 gram
Garansi Resmi',
                'picture' => '14.jpg'
            ],
            [
                'name' => 'vivo Y12 3GB 32GB - Thunder Black',
                'id_brand' => 14,
                'price' => 1999000,
                'description' => 'Ukuran layar: 6.35 inci, 720 x 1544 pixels, IPS LCD capacitive touchscreen, 16M colors
Memori: RAM 3 GB, ROM 32 GB, MicroSD up to 256 GB
Sistem operasi: Android 9.0 (Pie); Funtouch 9
CPU: Mediatek MT6762 Helio P22 (12 nm) Octa-core 2.0 GHz Cortex-A53
GPU: PowerVR GE8320
Kamera: Triple 13 MP, f/2.2, PDAF; 8 MP, f/2.2, 16mm (ultrawide); 2 MP, f/2.4, depth sensor, depan 8 MP, f/1.8
SIM: Dual SIM (Nano-SIM)
Baterai: Non-removable Li-Po 5000 mAh
Berat: 190.5 gram
Garansi Resmi',
                'picture' => '15.jpg'
            ],
            [
                'name' => 'vivo Y51A 8/128GB - Titanium Sapphire',
                'id_brand' => 14,
                'price' => 3399000,
                'description' => 'Ukuran layar: 6.58 inci, 1080 x 2408 pixels, 21:9 ratio, IPS LCD
Memori: RAM 8 GB, ROM 128 GB, microSDXC slot
Sistem operasi: Android 11; Funtouch 11
CPU: Qualcomm SDM6115 Snapdragon 662 11 nm (Octa-core 4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)
GPU: Adreno 610
Kamera: Triple 48 MP f/1.8, (wide) PDAF, 8 MP f/2.2 120˚(ultrawide), 2 MP f/2.4 (macro). Depan 16 MP f/2.0 (wide)
SIM: Dual SIM (Nano-SIM, dual stand-by)
Baterai: Li-Po 5000 mAh, non-removable
Berat: 188 gr
Garansi Resmi',
                'picture' => '16.jpg'
            ],
            [
                'name' => 'vivo Y51A 8GB 128GB - Crystal Symphony',
                'id_brand' => 14,
                'price' => 3399000,
                'description' => 'Ukuran layar: 6.58 inci, 1080 x 2408 pixels, 21:9 ratio, IPS LCD
Memori: RAM 8 GB, ROM 128 GB, microSDXC slot
Sistem operasi: Android 11; Funtouch 11
CPU: Qualcomm SDM6115 Snapdragon 662 11 nm (Octa-core 4x2.0 GHz Kryo 260 Gold &amp; 4x1.8 GHz Kryo 260 Silver)
GPU: Adreno 610
Kamera: Triple 48 MP f/1.8, (wide) PDAF, 8 MP f/2.2 120˚(ultrawide), 2 MP f/2.4 (macro). Depan 16 MP f/2.0 (wide)
SIM: Dual SIM (Nano-SIM, dual stand-by)
Baterai: Li-Po 5000 mAh, non-removable
Berat: 188 gr
Garansi Resmi',
                'picture' => '17.jpg'
            ],
            [
                'name' => 'Xiaomi Redmi 9 3/32GB - Sunset Purple',
                'id_brand' => 11,
                'price' => 1599000,
                'description' => 'Ukuran layar: 6.53 inci, 1080 x 2340 pixels, 19.5:9 ratio, IPS LCD capacitive touchscreen, 16M colors
Memori: RAM 3 GB, ROM 32 GB, microSD Slot
Sistem operasi: Android 10; MIUI 12
CPU: Mediatek Helio G80 12 nm (Octa-core 2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)
GPU: Mali-G52 MC2
Kamera: Belakang Quad 13 MP f/2.2 28mm (wide) PDAF, 8 MP f/2.2 118˚(ultrawide), 5 MP f/2.4 (macro), 2 MP f/2.4 (depth); Depan Single 8 MP f/2.0 27mm (wide)
SIM: Dual SIM (Nano-SIM, dual stand-by)
Baterai: Non-removable Li-Po 5020 mAh
Berat: 198 gr
Garansi Resmi',
                'picture' => '18.jpg'
            ],
            [
                'name' => 'Xiaomi Redmi 9T 4/64GB - Ocean Green',
                'id_brand' => 11,
                'price' => 1999000,
                'description' => 'Ukuran layar: 6.53 inci, 1080 x 2340 pixels, IPS LCD, 400 nits
Memori: RAM 4 GB, ROM 64 GB, MicroSD up to 512GB
Sistem operasi: Android 10, MIUI 12
CPU: Qualcomm SM6115 Snapdragon 662 (11 nm) Octa-core up to 2.0 GHz
GPU: Adreno 610
Kamera: Quad 48 MP, f/1.79, 26mm (wide), PDAF; 8 MP, f/2.2, 120˚ (ultrawide), 1/4.0", 1.12µm; 2 MP, f/2.4, (macro); 2 MP, f/2.4, (depth), depan 8 MP, f/2.05, 27mm (wide)
SIM: Dual SIM (Nano-SIM)
Baterai: Non-removable Li-Po 6000 mAh
Berat: 198 gram
Garansi Resmi',
                'picture' => '19.jpg'
            ],
            [
                'name' => 'Xiaomi Poco F3 6/128GB - Deep Ocean Blue',
                'id_brand' => 11,
                'price' => 4999000,
                'description' => 'Ukuran layar: 6.67 inches, 1080 x 2400 pixels (~395 ppi density) AMOLED, 120Hz, HDR10+
Memori: RAM 6GB, ROM 128GB
Sistem operasi: Android 11; MIUI 12
CPU: Qualcomm SM8250-AC Snapdragon 870 5G (7 nm), Octa-core (1x3.2 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.80 GHz Kryo 585)
GPU: Adreno 650
Kamera Belakang: 48 MP f/1.8 26mm PDAF (wide), 8 MP f/2.2 119˚(ultrawide), & 5 MP f/2.4 50mm (macro)
Kamera Depan: 20 MP f/2.5 (wide)
SIM: Dual SIM (Nano-SIM, dual stand-by)
Baterai: Li-Po 4520 mAh, non-removable
Berat: 196 gr
Garansi Resmi',
                'picture' => '20.jpg'
            ],
            [
                'name' => 'Xiaomi Redmi 9 3/32GB - Lunar Gold Free Mi In-Ear Headphones Basic',
                'id_brand' => 11,
                'price' => 1649000,
                'description' => 'Ukuran layar: 6.53 inci, 1080 x 2340 pixels, 19.5:9 ratio, IPS LCD capacitive touchscreen, 16M colors
Memori: RAM 3 GB, ROM 32 GB, microSD Slot
Sistem operasi: Android 10; MIUI 12
CPU: Mediatek Helio G80 12 nm (Octa-core 2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)
GPU: Mali-G52 MC2
Kamera: Belakang Quad 13 MP f/2.2 28mm (wide) PDAF, 8 MP f/2.2 118˚(ultrawide), 5 MP f/2.4 (macro), 2 MP f/2.4 (depth); Depan Single 8 MP f/2.0 27mm (wide)
SIM: Dual SIM (Nano-SIM, dual stand-by)
Baterai: Non-removable Li-Po 5020 mAh
Berat: 198 gr
Garansi Resmi',
                'picture' => '21.jpg'
            ],
        ]);

        DB::table('brand')->insert([
            [
                'id_brand' => 10,
                'nama' => 'Apple'
            ],
            [
                'id_brand' => 11,
                'nama' => 'Xiaomi'
            ],
            [
                'id_brand' => 13,
                'nama' => 'Realme'
            ],
            [
                'id_brand' => 14,
                'nama' => 'Vivo'
            ],
        ]);

        DB::table('auth_groups')->insert([
            [
                'id' => 1,
                'role' => 'admin',
                'description' => 'Site Administrator'
            ],
            [
                'id' => 2,
                'role' => 'user',
                'description' => 'Regular User'
            ],
        ]);
    }
}
