-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: mysql
-- Üretim Zamanı: 16 Kas 2024, 06:02:13
-- Sunucu sürümü: 5.7.22
-- PHP Sürümü: 8.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `medescare`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `Medias`
--

CREATE TABLE `Medias` (
  `Id` int(11) NOT NULL,
  `uid` varchar(255) COLLATE utf8_turkish_ci NOT NULL,
  `Title` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `File` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Cover` varchar(255) COLLATE utf8_turkish_ci DEFAULT NULL,
  `Info` text COLLATE utf8_turkish_ci,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('0','1') COLLATE utf8_turkish_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `Medias`
--
ALTER TABLE `Medias`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `Medias`
--
ALTER TABLE `Medias`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
