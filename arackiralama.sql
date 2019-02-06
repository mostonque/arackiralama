-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 06 Şub 2019, 16:46:12
-- Sunucu sürümü: 10.1.36-MariaDB
-- PHP Sürümü: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `arackiralama`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) DEFAULT NULL,
  `soyad` varchar(100) DEFAULT NULL,
  `sifre` varchar(50) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `telefon` varchar(11) DEFAULT NULL,
  `sonGirisTarihi` int(20) DEFAULT NULL,
  `sonGirisIpAdresi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `ad`, `soyad`, `sifre`, `mail`, `telefon`, `sonGirisTarihi`, `sonGirisIpAdresi`) VALUES
(1, 'serhat', 'pekedis', 'sanane123', 'serhatpekedis@gmail.com', '05354023454', NULL, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `araclar`
--

CREATE TABLE `araclar` (
  `id` int(11) NOT NULL,
  `marka` varchar(100) DEFAULT NULL,
  `seri` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `yil` int(4) DEFAULT NULL,
  `yakit` varchar(25) DEFAULT NULL,
  `vites` varchar(25) DEFAULT NULL,
  `km` int(6) DEFAULT NULL,
  `kasaTipi` varchar(25) DEFAULT NULL,
  `cekis` varchar(25) DEFAULT NULL,
  `motorGucu` int(6) DEFAULT NULL,
  `motorHacmi` int(6) DEFAULT NULL,
  `durum` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `araclar`
--

INSERT INTO `araclar` (`id`, `marka`, `seri`, `model`, `yil`, `yakit`, `vites`, `km`, `kasaTipi`, `cekis`, `motorGucu`, `motorHacmi`, `durum`) VALUES
(1, 'mercedes', 'e', 'e 250 maybach pro ultimate super hydro', 2010, 'dizel', 'otomatik', 60000, 'sedan', 'arkadan itis', 400, 1499, 1),
(3, 'BMW', 'M', '525d xdrive', 2016, 'dizel', 'otomatik', 10000, 'sedan', 'önden çekiş', 600, 3978, 1),
(5, 'audi', 'a', '200', 2010, 'benzin', 'otomatik', 3000, 'hatchbag', 'ortadan itis', 400, 1499, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `ad` varchar(100) DEFAULT NULL,
  `soyad` varchar(100) DEFAULT NULL,
  `tc` varchar(11) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `sifre` varchar(100) DEFAULT NULL,
  `telefon` varchar(11) DEFAULT NULL,
  `sonGirisTarih` int(20) DEFAULT NULL,
  `sonGirisIp` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `ad`, `soyad`, `tc`, `mail`, `sifre`, `telefon`, `sonGirisTarih`, `sonGirisIp`) VALUES
(80, 'serhat', 'pekedis', '31241231231', 'mertfender12367@gmail.com', '1241231', '12122131231', NULL, NULL),
(105, 'mert', 'fender', '22222222222', 'mertfender123@gmail.com', 'asdasd', '11111111111', NULL, NULL),
(106, 'serhat', 'pekedis', '11111111111', 'serhatpekedis@gmail.com', 'asdasd', '22222222222', NULL, NULL);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Tablo için indeksler `araclar`
--
ALTER TABLE `araclar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tc` (`tc`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `araclar`
--
ALTER TABLE `araclar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
