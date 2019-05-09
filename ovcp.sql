-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2019 at 06:21 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ovcp`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `product_id` varchar(128) DEFAULT NULL,
  `price` varchar(128) DEFAULT NULL,
  `static` tinyint(1) DEFAULT '0',
  `cleared` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `username`, `product_id`, `price`, `static`, `cleared`) VALUES
(2, 'owner', '1', '23232', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

CREATE TABLE `clinic` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `schedule_from` varchar(200) NOT NULL,
  `schedule_to` varchar(200) NOT NULL,
  `schedule_time` varchar(200) NOT NULL,
  `schedule_time2` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `salt` varchar(128) DEFAULT NULL,
  `valid` tinyint(1) DEFAULT '0',
  `picture` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`id`, `name`, `address`, `email`, `phone`, `username`, `password`, `schedule_from`, `schedule_to`, `schedule_time`, `schedule_time2`, `description`, `salt`, `valid`, `picture`) VALUES
(1, 'asdsa', NULL, 'emo_jeeru@yahoo.com', '2323', 'aws', 'e7e7cbdd60f4d6ee0a3ccd8e60c5a6777b70606d9fd42d463f93e9cd6b02c467f9ffa318badfa4ef2bb84c8bc7ea4d8b1e9255881103b4d2a19d2c58cdecb155', '', '', '', '', '', '10454c26e7c627ca7678e00914edfe907722527a17655b7ea5a717cbe83613a042f0a8240e65db3708bd915b4d5143d4ef00b1cad37b9ce6026501585b775b0a', 0, 'aws_18.png'),
(2, 'Nice', NULL, 'nice@yahoo.com', '12121', 'test1', '48decbfa59040549e79923af61fd2407e77f25c01cea0fbb3adea57221e23b3b404eedb864a8a08579eaaa5fd78988606636ea0ccc370ecd2827066512fa3b6c', '', '', '', '', '', 'e215fc64a9db62db13eaedde26588b6b1c271534ec63afc1a297acc3b497ae730e94bddbf9f6eb4fa32bc38e03fcc489bd1d27e6fce9bcd4b877292a5384dfb9', 0, NULL),
(3, 'Plankton', 'Lucban,Quezon', 'nice@yahoo.com', '12345', 'vet', '4522202ebaf7fdbd5d773c463cbedb5894f0ff5f7c7e9eb1b3ee5c00bddd83877f5d8fdcf7f77e435bb555f6d87225b6d6f90b0933ab6217027868944c9de67c', 'Friday', 'Wednesday', '02:12', '12:23', 'fdsfsdfds', '0608390e3aac4e1d686dc41fd657a4ee4af8277b2623bd5eebe260c8a3759fc12080ca3990d49f957403796804f1756d5d1e6fc56151edc3e69f6855f779c00f', 0, 'vet_56.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `consult`
--

CREATE TABLE `consult` (
  `id` int(11) NOT NULL,
  `message` varchar(200) NOT NULL,
  `consult_date` varchar(200) NOT NULL,
  `consult_by` varchar(200) NOT NULL,
  `approve` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consult`
--

INSERT INTO `consult` (`id`, `message`, `consult_date`, `consult_by`, `approve`) VALUES
(1, 'fsdfdss', '', 'breeee', '0'),
(2, 'fsdfdss', '', 'breeee', '0'),
(3, 'dsadsa', '2019-05-08', 'dsadsa', '0');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender` varchar(128) DEFAULT NULL,
  `recipient` varchar(128) DEFAULT NULL,
  `content` varchar(128) DEFAULT NULL,
  `filelocation` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `price` varchar(128) DEFAULT NULL,
  `image` varchar(128) DEFAULT NULL,
  `vet_uname` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `image`, `vet_uname`) VALUES
(1, 'Medicine', '23232', 'Medicine_10.jpg', 'vet');

-- --------------------------------------------------------

--
-- Table structure for table `sickness`
--

CREATE TABLE `sickness` (
  `id` int(11) NOT NULL,
  `Animal` varchar(200) NOT NULL,
  `Sickness` varchar(200) NOT NULL,
  `Cure` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `username` varchar(128) DEFAULT NULL,
  `password` varchar(128) DEFAULT NULL,
  `salt` varchar(128) DEFAULT NULL,
  `static` tinyint(1) DEFAULT '0',
  `cleared` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `username`, `password`, `salt`, `static`, `cleared`) VALUES
(1, 'Nice wan', 'nice2@yahoo.com', '124343', 'test2', '8995a59e17e5dbcaa0ee24bd27f8ef0e7c790733ef078db00ec16f0546a4324b7bc571b819fe575860fcf02cddacf2db8435ce306c02af727dbe5bcfb3e8595b', 'e6b186cc435ea4c7aada620d30682184a9b2bcdd6a0cb9fb1693a90b25656dcad3eef4c0bb8c8df7b80f51d3fd3694f3781bbb5471004a9c72855923223eb654', 0, 0),
(2, 'Owner', 'zah@gmail.com', '12345', 'owner', 'ad13f0e5d57095798bc7222293242a27f8756d907c0a280c04e25276a5c4a15982b888b16924b872d92f603af47c2e4d19e2bcbd98d143a158f862f66791149a', '403b99f1f242d98a18d58de42ffab39a405b312577527432908ff19a021259bd73cb78f5d49610bd75bf5679f3f1d25a91c86c568f530909419b1c48020a22a8', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vet`
--

CREATE TABLE `vet` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `avatar` varchar(128) DEFAULT NULL,
  `academe` varchar(128) DEFAULT NULL,
  `vet_uname` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vet`
--

INSERT INTO `vet` (`id`, `name`, `avatar`, `academe`, `vet_uname`) VALUES
(1, 'Nice wan', 'Nice wan_68.png', 'SLSU', 'vet');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consult`
--
ALTER TABLE `consult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sickness`
--
ALTER TABLE `sickness`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vet`
--
ALTER TABLE `vet`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clinic`
--
ALTER TABLE `clinic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `consult`
--
ALTER TABLE `consult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sickness`
--
ALTER TABLE `sickness`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vet`
--
ALTER TABLE `vet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
