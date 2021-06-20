-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 20 Haz 2021, 21:21:31
-- Sunucu sürümü: 10.4.18-MariaDB
-- PHP Sürümü: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yonetim_paneli`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_isim` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`category_id`, `category_isim`) VALUES
(1, 'elektronik'),
(2, 'moda'),
(3, 'ev/yaşam'),
(4, 'yapı/market'),
(5, 'oyuncak'),
(6, 'spor'),
(7, 'kozmetik'),
(8, 'süpermarket'),
(10, 'film/kitap');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `product`
--

CREATE TABLE `product` (
  `urun_id` int(11) NOT NULL,
  `urun_isim` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `urun_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_gorsel_url` text COLLATE utf8_turkish_ci NOT NULL,
  `urun_fiyat` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `urun_kategori_id` int(11) NOT NULL,
  `urun_statu` enum('0','1') COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `product`
--

INSERT INTO `product` (`urun_id`, `urun_isim`, `urun_aciklama`, `urun_gorsel_url`, `urun_fiyat`, `urun_kategori_id`, `urun_statu`) VALUES
(1, 'samsung s20 plus', 'samsung türkiye garantili telefon', 'https://cdn.vatanbilgisayar.com/Upload/PRODUCT/samsung/thumb/TeoriV2-106096-5_large.jpg', '6,782', 1, '1'),
(2, 'samsung note 10', 'türkiye garantili', 'https://cdn.vatanbilgisayar.com/Upload/PRODUCT/samsung/thumb/TeoriV2-106096-5_large.jpg', '4000', 1, '1'),
(6, 'beyaz gömlek', 'yakalı beyaz gömlek', 'https://www.germirli.com.tr/germirli-non-iron-beyaz-oxford-dugmeli-yaka-tailor-fit-gomlek-non-iron-germirli-7129-35-B.jpg', '36.85', 2, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `todolist`
--

CREATE TABLE `todolist` (
  `gorev_id` int(11) NOT NULL,
  `gorev_adi` varchar(200) COLLATE utf8_turkish_ci NOT NULL,
  `gorev_ekleyen` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `gorev_aciklama` text COLLATE utf8_turkish_ci NOT NULL,
  `gorev_tarih` datetime NOT NULL DEFAULT current_timestamp(),
  `gorev_durum` varchar(50) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `todolist`
--

INSERT INTO `todolist` (`gorev_id`, `gorev_adi`, `gorev_ekleyen`, `gorev_aciklama`, `gorev_tarih`, `gorev_durum`) VALUES
(1, 'arama algoritması değiştirilecek', 'admin@gmail.com', 'açıklama yok', '2021-06-20 21:47:59', 'tamamlandı'),
(2, 'kategoriler değiştirilecek', 'admin@gmail.com', '', '2021-06-20 21:48:22', 'tamamlanmadı');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_isim` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `uye_soyisim` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `uye_mail` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `uye_parola` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_isim`, `uye_soyisim`, `uye_mail`, `uye_parola`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Tablo için indeksler `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`urun_id`);

--
-- Tablo için indeksler `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`gorev_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Tablo için AUTO_INCREMENT değeri `product`
--
ALTER TABLE `product`
  MODIFY `urun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `todolist`
--
ALTER TABLE `todolist`
  MODIFY `gorev_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
