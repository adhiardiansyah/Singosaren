-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2021 at 09:43 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `singosaren`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_groups`
--

CREATE TABLE `auth_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_groups`
--

INSERT INTO `auth_groups` (`id`, `role`, `description`) VALUES
(1, 'admin', 'Site Administrator'),
(2, 'user', 'Regular User');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id_brand` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id_brand`, `nama`) VALUES
(10, 'Apple'),
(11, 'Xiaomi'),
(13, 'Realme'),
(14, 'Vivo');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_orders`
--

CREATE TABLE `detail_orders` (
  `id_detailOrder` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_07_26_115305_create_products_table', 1),
(4, '2021_08_04_133936_brand', 1),
(5, '2021_08_07_074914_cart', 1),
(6, '2021_08_12_042817_orders', 1),
(7, '2021_08_12_051541_detail_orders', 1),
(8, '2021_08_17_082950_auth_groups', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id_order` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `code_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_order` datetime NOT NULL,
  `destination` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id_product` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_brand` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id_product`, `name`, `id_brand`, `price`, `description`, `picture`) VALUES
(1, 'Apple iPhone 12 mini 256GB, RED', 10, 13999000, 'Isi Kotak :\n• iPhone dengan iOS 14.\n• Kabel USB-C ke Lightning.\n• Buku Manual dan dokumentasi lain.\n\nUkuran layar: 5.4 inci, 1080 x 2340 pixels, Super Retina XDR OLED, HDR10, 625 nits (typ), 1200 nits (peak)\nMemori: RAM 4 GB, ROM 256 GB\nSistem operasi: iOS 14\nCPU: Apple A14 Bionic (5 nm), Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)\nGPU: Apple GPU (4-core graphics)\nKamera: 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS. 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\". Depan 12 MP, f/2.2, 23mm (wide), 1/3.6\"\nSIM: Nano-SIM/eSIM\nBaterai: Li-Ion 2227 mAh\nDimensi: 131.5 x 64.2 x 7.4 mm\nBerat: 135 gr\nGaransi Resmi', '10.jpg'),
(2, 'Apple iPhone 12 mini 64GB, Black', 10, 10999000, 'Isi Kotak :\n• iPhone dengan iOS 14.\n• Kabel USB-C ke Lightning.\n• Buku Manual dan dokumentasi lain.\n\nUkuran layar: 5.4 inci, 1080 x 2340 pixels, Super Retina XDR OLED, HDR10, 625 nits (typ), 1200 nits (peak)\nMemori: RAM 4 GB, ROM 64 GB\nSistem operasi: iOS 14\nCPU: Apple A14 Bionic (5 nm), Hexa-core (2x3.1 GHz Firestorm + 4x1.8 GHz Icestorm)\nGPU: Apple GPU (4-core graphics)\nKamera: 12 MP, f/1.6, 26mm (wide), 1.4µm, dual pixel PDAF, OIS. 12 MP, f/2.4, 120˚, 13mm (ultrawide), 1/3.6\". Depan 12 MP, f/2.2, 23mm (wide), 1/3.6\"\nSIM: Nano-SIM/eSIM\nBaterai: Li-Ion 2227 mAh\nDimensi: 131.5 x 64.2 x 7.4 mm\nBerat: 135 gr\nGaransi Resmi', '11.jpg'),
(3, 'realme Narzo 30A 4GB 64GB - Black', 13, 1999000, 'Ukuran layar: 6.5 inci, 720 x 1600 pixels, IPS LCD\nMemori: RAM 4 GB, ROM 64 GB, MicroSD slot\nSistem operasi: Android 10, Realme UI\nCPU: MediaTek Helio G85 (12nm) Octa-core up to 2.0 GHz\nGPU: Mali-G52 MC2\nKamera: Dual 13 MP, f/2.2, 26mm (wide) &amp; 2 MP B/W, f/2.4, depan 8 MP, f/2.0, 26mm (wide)\nSIM: Dual SIM (Nano-SIM)\nBaterai: Non-removable Li-Po 6000 mAh\nBerat: 207 gram\nGaransi Resmi', '12.jpg'),
(4, 'realme C20 2GB 32GB - Blue', 13, 1299000, 'Ukuran layar: 6.5 inches, 720 x 1600 pixels (~270 ppi density) IPS LCD\nMemori: RAM 2GB, ROM 32GB, microSDXC Slot\nSistem operasi: Android 11; Realme UI\nCPU: MediaTek Helio G35 (12 nm), Octa-core (4x2.3 GHz Cortex-A53 &amp; 4x1.8 GHz Cortex-A53)\nGPU: PowerVR GE8320\nKamera Belakang: 8 MP f/2.0 AF (wide)\nKamera Depan: 5 MP f/2.2 (wide)\nSIM: Dual SIM (Nano-SIM, dual stand-by)\nBaterai: Li-Po 5000 mAh, non-removable\nBerat: 190 gr\nGaransi Resmi', '13.jpg'),
(5, 'realme 8 Pro 8GB 128GB - Blue', 13, 4499000, 'Ukuran layar: 6.4 inci, 1080 x 2400 pixels, Super AMOLED\nMemori: RAM 8 GB, ROM 128 GB, MicroSD slot\nSistem operasi: Android 11, Realme UI 2.0\nCPU: Qualcomm SM7125 Snapdragon 720G (8 nm) Octa-core up to 2.3 GHz\nGPU: Adreno 618\nKamera: Quad 108 MP, f/1.88, 26mm (wide); 8 MP, f/2.25, 119˚, 16mm (ultrawide); 2 MP, f/2.4, (macro); 2 MP, f/2.4, (depth), depan 16 MP, f/2.45, (wide)\nSIM: Dual SIM (Nano-SIM)\nBaterai: Li-Po 4500 mAh, non-removable\nBerat: 176 gram\nGaransi Resmi', '14.jpg'),
(6, 'vivo Y12 3GB 32GB - Thunder Black', 14, 1999000, 'Ukuran layar: 6.35 inci, 720 x 1544 pixels, IPS LCD capacitive touchscreen, 16M colors\nMemori: RAM 3 GB, ROM 32 GB, MicroSD up to 256 GB\nSistem operasi: Android 9.0 (Pie); Funtouch 9\nCPU: Mediatek MT6762 Helio P22 (12 nm) Octa-core 2.0 GHz Cortex-A53\nGPU: PowerVR GE8320\nKamera: Triple 13 MP, f/2.2, PDAF; 8 MP, f/2.2, 16mm (ultrawide); 2 MP, f/2.4, depth sensor, depan 8 MP, f/1.8\nSIM: Dual SIM (Nano-SIM)\nBaterai: Non-removable Li-Po 5000 mAh\nBerat: 190.5 gram\nGaransi Resmi', '15.jpg'),
(7, 'vivo Y51A 8/128GB - Titanium Sapphire', 14, 3399000, 'Ukuran layar: 6.58 inci, 1080 x 2408 pixels, 21:9 ratio, IPS LCD\nMemori: RAM 8 GB, ROM 128 GB, microSDXC slot\nSistem operasi: Android 11; Funtouch 11\nCPU: Qualcomm SDM6115 Snapdragon 662 11 nm (Octa-core 4x2.0 GHz Kryo 260 Gold & 4x1.8 GHz Kryo 260 Silver)\nGPU: Adreno 610\nKamera: Triple 48 MP f/1.8, (wide) PDAF, 8 MP f/2.2 120˚(ultrawide), 2 MP f/2.4 (macro). Depan 16 MP f/2.0 (wide)\nSIM: Dual SIM (Nano-SIM, dual stand-by)\nBaterai: Li-Po 5000 mAh, non-removable\nBerat: 188 gr\nGaransi Resmi', '16.jpg'),
(8, 'vivo Y51A 8GB 128GB - Crystal Symphony', 14, 3399000, 'Ukuran layar: 6.58 inci, 1080 x 2408 pixels, 21:9 ratio, IPS LCD\nMemori: RAM 8 GB, ROM 128 GB, microSDXC slot\nSistem operasi: Android 11; Funtouch 11\nCPU: Qualcomm SDM6115 Snapdragon 662 11 nm (Octa-core 4x2.0 GHz Kryo 260 Gold &amp; 4x1.8 GHz Kryo 260 Silver)\nGPU: Adreno 610\nKamera: Triple 48 MP f/1.8, (wide) PDAF, 8 MP f/2.2 120˚(ultrawide), 2 MP f/2.4 (macro). Depan 16 MP f/2.0 (wide)\nSIM: Dual SIM (Nano-SIM, dual stand-by)\nBaterai: Li-Po 5000 mAh, non-removable\nBerat: 188 gr\nGaransi Resmi', '17.jpg'),
(9, 'Xiaomi Redmi 9 3/32GB - Sunset Purple', 11, 1599000, 'Ukuran layar: 6.53 inci, 1080 x 2340 pixels, 19.5:9 ratio, IPS LCD capacitive touchscreen, 16M colors\nMemori: RAM 3 GB, ROM 32 GB, microSD Slot\nSistem operasi: Android 10; MIUI 12\nCPU: Mediatek Helio G80 12 nm (Octa-core 2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)\nGPU: Mali-G52 MC2\nKamera: Belakang Quad 13 MP f/2.2 28mm (wide) PDAF, 8 MP f/2.2 118˚(ultrawide), 5 MP f/2.4 (macro), 2 MP f/2.4 (depth); Depan Single 8 MP f/2.0 27mm (wide)\nSIM: Dual SIM (Nano-SIM, dual stand-by)\nBaterai: Non-removable Li-Po 5020 mAh\nBerat: 198 gr\nGaransi Resmi', '18.jpg'),
(10, 'Xiaomi Redmi 9T 4/64GB - Ocean Green', 11, 1999000, 'Ukuran layar: 6.53 inci, 1080 x 2340 pixels, IPS LCD, 400 nits\nMemori: RAM 4 GB, ROM 64 GB, MicroSD up to 512GB\nSistem operasi: Android 10, MIUI 12\nCPU: Qualcomm SM6115 Snapdragon 662 (11 nm) Octa-core up to 2.0 GHz\nGPU: Adreno 610\nKamera: Quad 48 MP, f/1.79, 26mm (wide), PDAF; 8 MP, f/2.2, 120˚ (ultrawide), 1/4.0\", 1.12µm; 2 MP, f/2.4, (macro); 2 MP, f/2.4, (depth), depan 8 MP, f/2.05, 27mm (wide)\nSIM: Dual SIM (Nano-SIM)\nBaterai: Non-removable Li-Po 6000 mAh\nBerat: 198 gram\nGaransi Resmi', '19.jpg'),
(11, 'Xiaomi Poco F3 6/128GB - Deep Ocean Blue', 11, 4999000, 'Ukuran layar: 6.67 inches, 1080 x 2400 pixels (~395 ppi density) AMOLED, 120Hz, HDR10+\nMemori: RAM 6GB, ROM 128GB\nSistem operasi: Android 11; MIUI 12\nCPU: Qualcomm SM8250-AC Snapdragon 870 5G (7 nm), Octa-core (1x3.2 GHz Kryo 585 & 3x2.42 GHz Kryo 585 & 4x1.80 GHz Kryo 585)\nGPU: Adreno 650\nKamera Belakang: 48 MP f/1.8 26mm PDAF (wide), 8 MP f/2.2 119˚(ultrawide), & 5 MP f/2.4 50mm (macro)\nKamera Depan: 20 MP f/2.5 (wide)\nSIM: Dual SIM (Nano-SIM, dual stand-by)\nBaterai: Li-Po 4520 mAh, non-removable\nBerat: 196 gr\nGaransi Resmi', '20.jpg'),
(12, 'Xiaomi Redmi 9 3/32GB - Lunar Gold Free Mi In-Ear Headphones Basic', 11, 1649000, 'Ukuran layar: 6.53 inci, 1080 x 2340 pixels, 19.5:9 ratio, IPS LCD capacitive touchscreen, 16M colors\nMemori: RAM 3 GB, ROM 32 GB, microSD Slot\nSistem operasi: Android 10; MIUI 12\nCPU: Mediatek Helio G80 12 nm (Octa-core 2x2.0 GHz Cortex-A75 & 6x1.8 GHz Cortex-A55)\nGPU: Mali-G52 MC2\nKamera: Belakang Quad 13 MP f/2.2 28mm (wide) PDAF, 8 MP f/2.2 118˚(ultrawide), 5 MP f/2.4 (macro), 2 MP f/2.4 (depth); Depan Single 8 MP f/2.0 27mm (wide)\nSIM: Dual SIM (Nano-SIM, dual stand-by)\nBaterai: Non-removable Li-Po 5020 mAh\nBerat: 198 gr\nGaransi Resmi', '21.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.svg',
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_group` int(10) UNSIGNED DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_image`, `phone_number`, `address`, `password`, `id_group`) VALUES
(1, 'Adhi Ardiansyah', 'adhiardiansyah23@gmail.com', 'default.svg', '081234567891', 'Jalan Ir. Sutami No.36, Kentingan, Jebres, Surakarta', '$2y$10$RhCik1ESMep/oT75tcUbzepic1ucysEGVzW7WRbnYb2vYZl3mMnmS', 1),
(2, 'Akmal Tajuddin', 'akmaltajuddin@gmail.com', 'default.svg', '082321437856', ' Jalan Kolonel Sutarto 150K, Jebres, Surakarta', '$2y$10$hw0tWMGhmVgF/biFy1qgwe8HYHo/V0vLEWZcUFlpQhQuecJXjR.c6', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_groups`
--
ALTER TABLE `auth_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id_brand`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD UNIQUE KEY `cart_product_id_unique` (`product_id`),
  ADD KEY `cart_user_id_index` (`user_id`),
  ADD KEY `cart_price_index` (`price`);

--
-- Indexes for table `detail_orders`
--
ALTER TABLE `detail_orders`
  ADD PRIMARY KEY (`id_detailOrder`),
  ADD KEY `detail_orders_order_id_index` (`order_id`),
  ADD KEY `detail_orders_product_id_index` (`product_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `orders_user_id_index` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `products_id_brand_index` (`id_brand`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_group_index` (`id_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auth_groups`
--
ALTER TABLE `auth_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id_brand` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_orders`
--
ALTER TABLE `detail_orders`
  MODIFY `id_detailOrder` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id_order` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id_product` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
