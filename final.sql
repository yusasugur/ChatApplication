-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1:3306
-- Üretim Zamanı: 05 Haz 2020, 12:10:26
-- Sunucu sürümü: 5.7.21
-- PHP Sürümü: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `final`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  `content` varchar(200) COLLATE utf8mb4_turkish_ci NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;

--
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `nick`, `content`, `created`) VALUES
(78, 'Prometheus', 'Hello guys.', '2020-06-05 14:12:01'),
(79, 'Dr. House', 'Fine, what about u?', '2020-06-05 15:01:26'),
(80, 'Prometheus', 'I\'m doing well.', '2020-06-05 15:01:52'),
(81, 'Prometheus', 'Did you hear that?', '2020-06-05 15:02:03'),
(83, 'Dr. House', 'Whaaa??', '2020-06-05 15:02:50'),
(84, 'Prometheus', 'Last of us 2 is coming out soon', '2020-06-05 15:03:53'),
(85, 'Dr. House', 'Really?', '2020-06-05 15:04:01');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `nickinuse`
--

DROP TABLE IF EXISTS `nickinuse`;
CREATE TABLE IF NOT EXISTS `nickinuse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nick` varchar(50) COLLATE utf8mb4_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_turkish_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
