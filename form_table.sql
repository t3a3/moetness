-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-17 09:22:27
-- サーバのバージョン： 10.4.22-MariaDB
-- PHP のバージョン: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `moetness_test`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `form_table`
--

CREATE TABLE `form_table` (
  `id` int(11) NOT NULL,
  `form_name` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `form_email` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `form_text` text COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `form_table`
--

INSERT INTO `form_table` (`id`, `form_name`, `form_email`, `form_text`, `created_at`, `updated_at`) VALUES
(1, '山田太郎', 'yamadataro@sql.com', '今日は火曜日', '2021-12-14 18:56:29', '2021-12-14 18:56:29'),
(2, '武豊', 'take@sql.com', 'ありがとうございます！', '2021-12-14 20:41:15', '2021-12-14 20:41:15'),
(3, '武豊', 'take@sql.com', '有馬記念勝ちます！', '2021-12-14 20:52:46', '2021-12-14 20:52:46'),
(4, '武幸四郎', 'take@sql.com', 'ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。ウォーターナビレラが阪神JSで3着となりました。', '2021-12-14 20:58:46', '2021-12-14 20:58:46'),
(5, '福永祐一', 'fukunaga@sql.com', 'コントレイルのラストラン！', '2021-12-14 23:02:34', '2021-12-14 23:02:34'),
(6, '高田航希', 'takata@sql.com', 'お問い合わせ', '2021-12-16 00:03:29', '2021-12-16 00:03:29');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `form_table`
--
ALTER TABLE `form_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `form_table`
--
ALTER TABLE `form_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
