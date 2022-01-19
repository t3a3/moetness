-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2022-01-19 16:58:30
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
-- テーブルの構造 `survey_table`
--

CREATE TABLE `survey_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `gender` text COLLATE utf8mb4_bin NOT NULL,
  `age` text COLLATE utf8mb4_bin NOT NULL,
  `answer` text COLLATE utf8mb4_bin NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `survey_table`
--

INSERT INTO `survey_table` (`id`, `user_id`, `gender`, `age`, `answer`, `created_at`) VALUES
(15, 56, '男性', '20代', '雑誌をみて', '2022-01-20 00:46:42'),
(16, 57, '男性', '10代', 'SNS', '2022-01-20 00:48:28'),
(17, 59, '男性', '40代', 'ネットニュース', '2022-01-20 00:48:43'),
(18, 60, '女性', '20代', 'SNS', '2022-01-20 00:48:58'),
(19, 58, '男性', '40代', 'ネットニュース', '2022-01-20 00:49:27'),
(20, 61, '男性', '80代以上', 'その他', '2022-01-20 00:50:34');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `survey_table`
--
ALTER TABLE `survey_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `survey_table`
--
ALTER TABLE `survey_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
