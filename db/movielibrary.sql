-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2015 at 09:55 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `movielibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`admin_id` int(3) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `name`) VALUES
(1, 'johnolwamba', 'olwashop', 'Johnstone Ananda'),
(2, 'admin', '123', 'Ken');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE IF NOT EXISTS `borrow` (
`borrow_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `movie_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `date` datetime NOT NULL,
  `cost` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `approval_date` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `user_id`, `movie_id`, `name`, `date`, `cost`, `status`, `approval_date`) VALUES
(15, 2, 26, 'About Last Night', '2015-03-02 13:03:43', '0', '2', '2015-03-02 14:03:46'),
(16, 2, 12, 'Hobbit', '2015-03-02 14:03:46', '0', '2', '2015-03-02 14:03:46'),
(22, 3, 17, 'Monkey Shines', '2015-03-03 08:03:55', '0', '1', ''),
(23, 3, 22, 'A Good Man', '2015-03-03 08:03:58', '0', '1', ''),
(26, 2, 4, 'Expendables 3', '2015-03-03 09:03:02', '0', '0', ''),
(27, 2, 8, 'Outsider', '2015-03-03 09:03:05', '0', '3', ''),
(28, 2, 7, 'Sleeping Beauty', '2015-03-03 09:03:46', '0', '3', ''),
(29, 3, 6, 'Rio 2', '2015-03-03 09:03:05', '0', '0', ''),
(30, 3, 9, 'Robo Cop', '2015-03-03 09:03:09', '0', '0', ''),
(31, 3, 10, 'Exodus', '2015-03-03 09:03:12', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
`contact_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `message`) VALUES
(1, 'Johnstone Ananda', 'Test', 'Test message Dear client, Thank you for opening my bid. My main objective for joining Odesk is to use my skills and abilities as well as meet my clients'' satisfaction and deliver quality work. Why you should hire me: 1. Experienced in SEO, web design and development. 2. Excellen'),
(2, 'John Gich', 'jolwamba@yahoo.com', 'test'),
(3, 'Johnie', 'njoro@yahoo.com', 'tester');

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE IF NOT EXISTS `movies` (
`movie_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `year` varchar(300) NOT NULL,
  `cost` float NOT NULL,
  `category` varchar(100) NOT NULL,
  `classification` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movie_id`, `name`, `year`, `cost`, `category`, `classification`, `date`, `photo`) VALUES
(2, 'Lets be corps', '2014', 0, 'Comedy', 'Trending', '2015/02/26', 'lets be cops.jpg'),
(3, 'Pompei', '2014', 0, 'Thriller', 'General', '2015/02/26', 'pompei.jpg'),
(4, 'Expendables 3', '2013', 0, 'Thriller', 'Recommended', '2015/02/26', 'expandables 2.jpg'),
(5, 'Ninja Turtles', '2013', 0, 'Cartoon', 'General', '2015/02/26', 'ninja turtles.jpg'),
(6, 'Rio 2', '2012', 0, 'Cartoon', 'Recommended', '2015/02/26', 'rio2.jpg'),
(7, 'Sleeping Beauty', '2012', 0, 'Cartoon', 'Cartoon', '2015/02/26', 'sleeping beauty.jpg'),
(8, 'Outsider', '2012', 0, 'Thriller', 'General', '2015/02/26', 'outsider.jpg'),
(9, 'Robo Cop', '2013', 0, 'Comedy', 'Recommended', '2015/02/26', 'robocop.jpg'),
(10, 'Exodus', '2013', 0, 'Thriller', 'General', '2015/02/26', 'exodus.jpg'),
(11, 'Lego Movie', '2012', 0, 'Cartoon', 'General', '2015/02/26', 'lego movie.jpg'),
(12, 'Hobbit', '2014', 0, 'Thriller', 'Latest', '2015/02/26', 'hobbit.jpg'),
(13, 'Maze Runner', '2014', 0, 'Thriller', 'General', '2015/02/26', 'maze runner.jpg'),
(14, 'X-Men', '2013', 0, 'Thriller', 'Latest', '2015/02/26', 'xmen.jpg'),
(15, 'Life After beth', '2012', 0, 'Comedy', 'Recommended', '2015/02/26', 'life after beth.jpg'),
(16, 'Mummy Ressurected', '2013', 0, 'Horror', 'General', '2015/02/26', 'Mummy Resurrected.jpg'),
(17, 'Monkey Shines', '2014', 0, 'Cartoon', 'Latest', '2015/02/26', 'monkey shines.jpg'),
(18, 'Harry Porter', '2010', 0, 'Cartoon', 'Trending', '2015/02/26', 'harry porter.jpg'),
(19, 'Lucy', '2014', 0, 'Thriller', 'Recommended', '2015/02/26', 'lucy.jpg'),
(20, 'Sinestro', '2013', 0, 'Cartoon', 'Latest', '2015/02/26', 'sinestro.jpg'),
(21, 'Divergent', '2012', 0, 'Thriller', 'General', '2015/02/26', 'divergent.jpg'),
(22, 'A Good Man', '2010', 0, 'Thriller', 'General', '2015/02/26', 'AGoodManCoverart.jpg'),
(23, 'Amazing Spiderman', '2010', 0, 'Cartoon', 'General', '2015/02/26', 'amazing spiderman.jpg'),
(24, '3 Days to Kill', '2009', 0, 'Thriller', 'Trending', '2015/02/26', '3 days to kill.jpg'),
(25, '22 Jump Street', '2014', 0, 'Comedy', 'General', '2015/02/26', '22 jump street.jpg'),
(26, 'About Last Night', '2012', 0, 'Comedy', 'General', '2015/02/26', 'about last night.jpg'),
(27, 'Annabelle', '2010', 0, 'Horror', 'General', '2015/02/26', 'annabelle.jpg'),
(28, 'Avatar', '2013', 0, 'Cartoon', 'Latest', '2015/02/26', 'avatar.jpg'),
(29, 'Avengers', '2012', 0, 'Cartoon', 'Trending', '2015/02/26', 'avengers.jpg'),
(30, 'Awkward Moment', '2012', 0, 'Comedy', 'General', '2015/02/26', 'awkward moment.jpg'),
(31, 'Big Bang', '2009', 0, 'Comedy', 'General', '2015/02/26', 'bangbang.jpg'),
(32, 'Batman', '2011', 0, 'Cartoon', 'General', '2015/02/26', 'batman.jpg'),
(33, 'Boom Clap', '2009', 0, 'Thriller', 'General', '2015/02/26', 'boom clap.jpg'),
(34, 'Broken', '2009', 0, 'Thriller', 'General', '2015/02/26', 'broken.jpg'),
(35, 'Frankenstein', '2014', 0, 'Thriller', 'General', '2015/02/26', 'frankeisteni.jpg'),
(36, 'Future 100', '2012', 0, 'Thriller', 'General', '2015/02/26', 'future 100.jpg'),
(37, 'Godzilla', '2008', 0, 'Cartoon', 'General', '2015/02/26', 'godzilla.jpg'),
(38, 'Guardians Of the galaxy', '2014', 0, 'Thriller', 'Latest', '2015/02/26', 'guardians of the galaxy.jpg'),
(39, 'Wrong Turn 6', '2014', 0, 'Horror', 'General', '2015/02/26', 'wrong turn 6.jpg'),
(40, 'Wolves', '2011', 0, 'Thriller', 'General', '2015/02/26', 'wolves.jpg'),
(41, 'Walk of Shame', '2013', 0, 'Comedy', 'General', '2015/02/26', 'walk of shame.jpg'),
(42, 'The Drop', '2013', 0, 'Thriller', 'General', '2015/02/26', 'the drop.jpg'),
(43, 'Mr Pearbody', '2014', 0, 'Cartoon', 'Latest', '2015/02/26', 'mr pearbody.jpg'),
(44, 'Stalingrad', '2012', 0, 'Thriller', 'General', '2015/02/26', 'stalingrad.jpg'),
(45, 'Tarzan', '2009', 0, 'Cartoon', 'General', '2015/02/26', 'tarzan.jpg'),
(46, 'Reasonable Doubt', '2010', 0, 'Comedy', 'General', '2015/02/26', 'reasonable doubt.jpg'),
(47, 'Teen Titans', '2010', 0, 'Cartoon', 'General', '2015/02/26', 'teen titans.jpg'),
(48, 'No Llores Vuella', '2010', 0, 'Thriller', 'Latest', '2015/02/26', 'llores vuela.jpg'),
(49, 'Maleficient', '2009', 0, 'Thriller', 'General', '2015/02/28', 'angelina-jolie-maleficent-movie-cover-photo-for-facebook-maleficent-facebook-cover-photo1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(3) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `id_no` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `dob`, `email`, `username`, `password`, `phone`, `id_no`, `date`) VALUES
(1, 'Johnstone Ananda', '22/07/1993', 'johnolwamba@gmail.com', 'johnolwamba', 'olwashop', '0718694198', '29722724', '2015/03/03'),
(3, 'Ken Coder', '22/07/1993', 'ken@gmail.com', 'ken', '123', '0718694198', '22722724', '2015/03/03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
 ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
 ADD PRIMARY KEY (`movie_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
MODIFY `borrow_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
MODIFY `contact_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
MODIFY `movie_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
