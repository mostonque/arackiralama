-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Şub 2019, 14:47:58
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
  `yoneticiAd` varchar(100) DEFAULT NULL,
  `sifre` varchar(50) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL,
  `sonGirisTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sonGirisIpAdresi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `admins`
--

INSERT INTO `admins` (`id`, `yoneticiAd`, `sifre`, `mail`, `sonGirisTarihi`, `sonGirisIpAdresi`) VALUES
(1, 'serhat', 'sanane123', 'serhatpekedis@gmail.com', '2019-02-21 10:40:51', '::1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `araclar`
--

CREATE TABLE `araclar` (
  `id` int(11) NOT NULL,
  `marka` varchar(100) DEFAULT NULL,
  `seri` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `yil` varchar(4) DEFAULT NULL,
  `yakit` varchar(25) DEFAULT NULL,
  `vites` varchar(25) DEFAULT NULL,
  `km` varchar(6) DEFAULT NULL,
  `kasaTipi` varchar(25) DEFAULT NULL,
  `cekis` varchar(25) DEFAULT NULL,
  `motorGucu` varchar(3) DEFAULT NULL,
  `motorHacmi` varchar(4) DEFAULT NULL,
  `durum` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `araclar`
--

INSERT INTO `araclar` (`id`, `marka`, `seri`, `model`, `yil`, `yakit`, `vites`, `km`, `kasaTipi`, `cekis`, `motorGucu`, `motorHacmi`, `durum`) VALUES
(1, 'mercedes', 'e5asd', 'e 250 maybach', '2010', 'dizel', 'otomatik', '60000', 'sedan', 'arkadan itis', '400', '1499', 0),
(3, 'BMW', 'M', '245', '2015', 'hava', 'manuel', '61234', 'sedan', 'ortadan', '512', '5234', 3),
(5, 'audi', 'a', '200', '2010', 'benzin', 'otomatik', '3000', 'hatchbag', 'ortadan itis', '400', '1499', 0),
(6, 'tofaş', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0),
(7, 'astra', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0),
(8, 'egea', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0),
(9, 'Q7', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0),
(12, 'BMW', 'asdas', 'asd', '1242', 'asdasdas', 'asdasd', '1234', 'asdfqw', 'test', '512', '5234', 0),
(13, 'BMW', 'asdas', 'asd', '1242', 'asdasdas', 'asdasd', '1234', 'asdfqw', 'test', '512', '5234', 0),
(14, 'BMW', 'asdas', 'asd', '1242', 'asdasdas', 'asdasd', '1234', 'asdfqw', 'test', '512', '5234', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kiralanmisaraclar`
--

CREATE TABLE `kiralanmisaraclar` (
  `id` int(11) NOT NULL,
  `idArac` varchar(11) NOT NULL,
  `idUser` varchar(11) NOT NULL,
  `kiraGun` varchar(11) NOT NULL,
  `kiraTarih` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `rezervearac`
--

CREATE TABLE `rezervearac` (
  `id` int(11) NOT NULL,
  `idArac` varchar(11) NOT NULL,
  `idUser` varchar(11) NOT NULL,
  `rezerveGun` varchar(11) NOT NULL,
  `rezTarihi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `durum` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `rezervearac`
--

INSERT INTO `rezervearac` (`id`, `idArac`, `idUser`, `rezerveGun`, `rezTarihi`, `durum`) VALUES
(31, '3', '106', '4', '2019-02-21 06:35:42', 3);

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
  `sonGirisTarih` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sonGirisIp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `ad`, `soyad`, `tc`, `mail`, `sifre`, `telefon`, `sonGirisTarih`, `sonGirisIp`) VALUES
(105, 'mert', 'fender', '22222222222', 'mertfender123@gmail.com', 'asdasd', '11111111111', '2019-02-13 19:06:05', '::1'),
(106, 'serhat', 'pekedis', '11111111111', 'serhatpekedis@gmail.com', 'asdasd', '22222222222', '2019-02-21 12:58:15', '::1'),
(107, 'test', 'test', '11111111122', 'test@gmail.com', 'asdasd', '42222222222', '2019-02-21 11:41:59', NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yorumlar`
--

CREATE TABLE `yorumlar` (
  `id` int(11) NOT NULL,
  `idUser` varchar(11) DEFAULT NULL,
  `nameUser` varchar(100) DEFAULT NULL,
  `idArac` varchar(11) DEFAULT NULL,
  `yorum` varchar(255) DEFAULT NULL,
  `durum` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
-- Tablo için indeksler `kiralanmisaraclar`
--
ALTER TABLE `kiralanmisaraclar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `rezervearac`
--
ALTER TABLE `rezervearac`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tc` (`tc`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- Tablo için indeksler `yorumlar`
--
ALTER TABLE `yorumlar`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Tablo için AUTO_INCREMENT değeri `kiralanmisaraclar`
--
ALTER TABLE `kiralanmisaraclar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Tablo için AUTO_INCREMENT değeri `rezervearac`
--
ALTER TABLE `rezervearac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
