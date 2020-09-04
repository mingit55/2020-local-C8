-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 20-06-14 09:16
-- 서버 버전: 10.1.30-MariaDB
-- PHP 버전: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `housing8`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `expert_reviews`
--

CREATE TABLE `expert_reviews` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `eid` int(11) NOT NULL,
  `contents` text NOT NULL,
  `price` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `expert_reviews`
--

INSERT INTO `expert_reviews` (`id`, `uid`, `eid`, `contents`, `price`, `score`) VALUES
(1, 1, 1, 'qwe', 10000, 1),
(2, 1, 1, 'qwe', 10000, 5),
(3, 1, 1, '124', 10000, 4);

-- --------------------------------------------------------

--
-- 테이블 구조 `knowhows`
--

CREATE TABLE `knowhows` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `contents` text NOT NULL,
  `before_img` varchar(30) NOT NULL,
  `after_img` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `knowhows`
--

INSERT INTO `knowhows` (`id`, `uid`, `contents`, `before_img`, `after_img`, `created_at`) VALUES
(1, 6, 'sdfdsvd', 'before_1592114011.jpg', 'after_1592114011.jpg', '2020-06-14 05:53:31'),
(2, 6, '22', 'before_1592115104.jpg', 'after_1592115104.jpg', '2020-06-14 06:11:44'),
(3, 3, '33', 'before_1592115259.jpg', 'after_1592115259.jpg', '2020-06-14 06:14:19'),
(4, 6, '44', 'before_1592115324.jpg', 'after_1592115324.jpg', '2020-06-14 06:15:24');

-- --------------------------------------------------------

--
-- 테이블 구조 `knowhow_reviews`
--

CREATE TABLE `knowhow_reviews` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `kid` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `knowhow_reviews`
--

INSERT INTO `knowhow_reviews` (`id`, `uid`, `kid`, `score`) VALUES
(1, 1, 1, 5),
(2, 2, 1, 1),
(3, 3, 1, 5),
(4, 1, 2, 1),
(5, 2, 2, 5),
(8, 3, 2, 1),
(9, 2, 3, 1),
(10, 1, 3, 5),
(11, 6, 3, 5),
(12, 1, 4, 5),
(13, 2, 4, 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `start_date` date NOT NULL,
  `contents` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `requests`
--

INSERT INTO `requests` (`id`, `uid`, `sid`, `start_date`, `contents`) VALUES
(1, 6, 1, '2020-07-03', 'fdg');

-- --------------------------------------------------------

--
-- 테이블 구조 `responses`
--

CREATE TABLE `responses` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `qid` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `responses`
--

INSERT INTO `responses` (`id`, `uid`, `qid`, `price`) VALUES
(1, 1, 1, 10000);

-- --------------------------------------------------------

--
-- 테이블 구조 `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `photo` varchar(30) NOT NULL,
  `auth` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 테이블의 덤프 데이터 `users`
--

INSERT INTO `users` (`id`, `user_id`, `password`, `user_name`, `photo`, `auth`) VALUES
(1, 'specialist1', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '전문가1', 'specialist1.jpg', 1),
(2, 'specialist2', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '전문가2', 'specialist2.jpg', 1),
(3, 'specialist3', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '전문가3', 'specialist3.jpg', 1),
(4, 'specialist4', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '전문가4', 'specialist4.jpg', 1),
(6, 'user1', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '일유저', '1592112792.jpg', 0),
(8, 'user2', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4', '이유저', '1592112898.jpg', 0);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `expert_reviews`
--
ALTER TABLE `expert_reviews`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `knowhows`
--
ALTER TABLE `knowhows`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `knowhow_reviews`
--
ALTER TABLE `knowhow_reviews`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `responses`
--
ALTER TABLE `responses`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `expert_reviews`
--
ALTER TABLE `expert_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `knowhows`
--
ALTER TABLE `knowhows`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `knowhow_reviews`
--
ALTER TABLE `knowhow_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- 테이블의 AUTO_INCREMENT `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `responses`
--
ALTER TABLE `responses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 테이블의 AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
