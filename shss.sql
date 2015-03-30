-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2015 at 06:04 PM
-- Server version: 5.5.39
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shss`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE IF NOT EXISTS `files` (
`id` int(11) NOT NULL,
  `name` varchar(225) NOT NULL,
  `type` varchar(225) NOT NULL,
  `description` varchar(225) NOT NULL,
  `uploader` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `icon_path` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `type`, `description`, `uploader`, `date`, `icon_path`) VALUES
(1, 'DieselEngine', 'ppt', 'Презентация на Немски Език  за дизеловите двигатели', 'admin', '2014-12-08', 'img/file_types/ppt.png'),
(2, 'logo', 'png', 'Снимка на училищната фасада', 'admin', '2014-12-10', 'img/file_types/png.png');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
`id` int(11) NOT NULL,
  `sender` varchar(225) NOT NULL,
  `reciever` varchar(225) NOT NULL,
  `topic` varchar(225) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL,
  `viewed` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `sender`, `reciever`, `topic`, `text`, `date`, `viewed`) VALUES
(1, 'test', 'admin', 'Test message', 'alaliasdufgdbpaisudbhfpiuabhsdpfiubgapsuiodfhbipaujsdbfpiuabsdpfouiabsihdfbpasuibdfp', '2014-12-12', 'No'),
(2, 'admin', 'test', 'kjHASDfoasdgbofa', 'asiukdgfoaisdgfpiaousgdvfpiuabspdf', '2014-12-17', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
`id` int(11) NOT NULL,
  `by` varchar(225) NOT NULL,
  `topic` varchar(225) NOT NULL,
  `text` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `by`, `topic`, `text`, `date`) VALUES
(1, 'admin', 'Примерна тема', 'Lorem Ipsum е елементарен примерен текст, използван в печатарската и типографската индустрия. Lorem Ipsum е индустриален стандарт от около 1500 година, когато неизвестен печатар взема няколко печатарски букви и ги разбърква, за да напечата с тях книга с примерни шрифтове. ', '2014-12-06'),
(2, 'Директор', 'Съвет', 'Коглеги, моля да се явите в учителската стая точно в 13:00 за поредния скучен учителски съвет. На него ще се дискутират следните теми: 1) Чистота; 2) Пушене; 3) Пиене!', '2014-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `role` varchar(225) NOT NULL,
  `secret_key` varchar(225) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `avatar_source` varchar(225) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `secret_key`, `first_name`, `last_name`, `avatar_source`) VALUES
(1, 'admin', '7dd75c55c0f3a84969cacc5fcdbbd980', 'admin@shss.eu', 'admin', '912ec803b2ce49e4a541068d495ab570', 'Niko', 'Mitov', 'img/user.png'),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', 'test@test.test', 'user', '098f6bcd4621d373cade4e832627b4f6', 'Test', 'Testov', 'img/user.png'),
(3, 'ivan', '098f6bcd4621d373cade4e832627b4f6', 'ivan@company.com', 'user', '098f6bcd4621d373cade4e832627b4f6', 'Ivan', 'Ivanov', 'img/user.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
