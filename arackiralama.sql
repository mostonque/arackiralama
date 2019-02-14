-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 14 Şub 2019, 15:04:16
-- Sunucu sürümü: 10.1.37-MariaDB
-- PHP Sürümü: 7.3.1

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
(1, 'serhat', 'sanane123', 'serhatpekedis@gmail.com', '2019-02-14 13:54:19', '::1');

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
(1, 'mercedes', 'e', 'e 250 maybach pro ultimate super hydro', '2010', 'dizel', 'otomatik', '60000', 'sedan', 'arkadan itis', '400', '1499', 0),
(3, 'BMW', 'M', '525d xdrive', '2016', 'dizel', 'otomatik', '10000', 'sedan', 'önden çekiş', '600', '3978', 2),
(5, 'audi', 'a', '200', '2010', 'benzin', 'otomatik', '3000', 'hatchbag', 'ortadan itis', '400', '1499', 0),
(6, 'tofaş', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0),
(7, 'astra', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0),
(8, 'egea', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0),
(9, 'Q7', 'e', '5', '2001', 'benzin-gaz', 'otomatik', '3000', 'sedan', 'arkadan itis', '400', '1499', 0);

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

--
-- Tablo döküm verisi `kiralanmisaraclar`
--

INSERT INTO `kiralanmisaraclar` (`id`, `idArac`, `idUser`, `kiraGun`, `kiraTarih`) VALUES
(6, '3', '106', '4', '2019-02-14 13:54:38'),
(7, '3', '106', '4', '2019-02-14 13:55:00');

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
(28, '3', '106', '4', '2019-02-14 13:54:04', 2);

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
(106, 'test', 'testts', '11111111111', 'serhatpekedis@gmail.com', 'asdasd', '22222222222', '2019-02-14 13:52:25', '::1');

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
-- Tablo döküm verisi `yorumlar`
--

INSERT INTO `yorumlar` (`id`, `idUser`, `nameUser`, `idArac`, `yorum`, `durum`) VALUES
(5, '106', 'serhat', '5', 'asdasdasd', 1),
(6, '104', 'temel', '3', 'BEN TEMEL', 1),
(7, '124', 'osman', '5', 'BEN osman\r\n', 1),
(8, '106', 'serhat', '3', 'selam ben serhat ve denemeyim', 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `kiralanmisaraclar`
--
ALTER TABLE `kiralanmisaraclar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `rezervearac`
--
ALTER TABLE `rezervearac`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- Tablo için AUTO_INCREMENT değeri `yorumlar`
--
ALTER TABLE `yorumlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
