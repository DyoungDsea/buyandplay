-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2020 at 06:06 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buyandbet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `id` int(11) NOT NULL,
  `dname` varchar(200) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `demail` varchar(30) NOT NULL,
  `pword` varchar(60) NOT NULL,
  `dposition` varchar(30) NOT NULL DEFAULT 'subadmin',
  `dwallet` float NOT NULL DEFAULT 0,
  `dprivileges` varchar(100) CHARACTER SET latin1 NOT NULL,
  `dstatus` varchar(20) NOT NULL DEFAULT 'active',
  `lastlogin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`id`, `dname`, `userid`, `demail`, `pword`, `dposition`, `dwallet`, `dprivileges`, `dstatus`, `lastlogin`) VALUES
(1, 'Admin', '2147483647', 'admin@buyandbet.com', '21232f297a57a5a743894a0e4a801fc3', 'administrator', 4625, '', 'active', '2020-02-27 00:00:00'),
(2, 'Elefiku Young', '2220202020', 'youngelefiku44@gmail.com', 'f6182f0359f72aae12fb90d305ccf9eb', 'subadmin', 0, 'Funding Request,Withdrawal Request,Forecast,Results,Testimonial,Mail,', 'active', '0000-00-00 00:00:00'),
(3, 'Duru Dozie', '05262020260105', 'duru@gmail.com', 'd9b687af2e555d05fb30f8ef7298a79a', 'subadmin', 0, 'Forecast Registration,Games,Users,Blog,Ranking Fees,', 'active', '0000-00-00 00:00:00'),
(4, 'LUZOMA HUB', '15412020411115', 'admin@luzoma.com', '339a65e93299ad8d72c42b263aa23117', 'subadmin', 0, 'Games,Awaiting Payment,', 'active', '0000-00-00 00:00:00'),
(5, 'Aderopo', '29442020441129', 'aderopo33@gmail.com', 'a562cfa07c2b1213b3a5c99b756fc206', 'subadmin', 0, 'Funding Request,Games,Awaiting Payment,', 'active', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `admin_settings`
--

CREATE TABLE `admin_settings` (
  `id` int(2) NOT NULL,
  `dwallet_main` varchar(20) NOT NULL DEFAULT '0',
  `dwallet_escrow` varchar(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_settings`
--

INSERT INTO `admin_settings` (`id`, `dwallet_main`, `dwallet_escrow`) VALUES
(1, '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `time_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `content`, `img`, `time_created`) VALUES
(1, 'Corona-virus  stops football Love', '&lt;p&gt;The 21-year-old was spotted playing football with West Ham midfielder Declan Rice at a centre in London on Sunday.&lt;/p&gt;&lt;p&gt;It comes after Chelsea revealed in the early hours of Friday that winger Callum Hudson-Odoi had tested positive for coronavirus.&lt;/p&gt;&lt;p&gt;As a result, the full men\'s squad, coaching staff and a number of the backroom team were forced to self-isolate in line with government health guidelines.&lt;/p&gt;&lt;p&gt;Mount broke those self-isolation guidelines when he met up with Rice and will be reminded of his responsibilities by the Blues.&lt;/p&gt;&lt;p&gt;The Premier League is currently suspended until April 4 due to the coronavirus pandemic&lt;/p&gt;', '202003154419-1', '2020-03-16 15:44:20'),
(2, 'Corona-virus  stops football', '&lt;p&gt;The U\'s said no one in the first-team has shown any symptoms of the virus but the League Two club have decided to take conservative action.&lt;/p&gt;&lt;p&gt;â€œCambridge United can today confirm the football club has taken the decision to self-isolate the entire first team playing and coaching staff for the next week,â€ the club said in a statement on their website.&lt;/p&gt;&lt;p&gt;â€œWhilst no member of the first team has shown symptoms of COVID-19, the club have been made aware of a first-team player who had previously been exposed to someone who last week tested positive for the virus.&lt;/p&gt;', '202003162424-1', '2020-03-16 16:24:24'),
(3, 'Sport hit by coronavirus: Road to Tokyo Olympic qualifier called off as boxing', '&lt;p&gt;A statement read: &quot;In light of significant recent changes in the Coronavirus situation and growing concerns relating to the welfare of athletes, officials, staff and volunteers, the IOC\'s Boxing Task Force (BTF) has taken the decision to cancel the rest of the Road to Tokyo Boxing Qualifier from Tuesday 17 March 2020.&lt;/p&gt;&lt;p&gt;&quot;The decision has been made in conjunction with the Local Organising Committee (LOC) of the Boxing Road to Tokyo Qualifying event amid the increasing global travel restrictions and quarantine measures which are impacting on the travel plans of athletes, teams and officials and affecting their ability to return home.&quot;&lt;/p&gt;&lt;p&gt;The International Olympic Committee was already due to meet officials from national Olympic committees and sports federations on Tuesday to discuss qualification procedures for the Games.&lt;/p&gt;&lt;p&gt;Officials in London had initially taken the decision to move the competition behind closed doors on Monday.&lt;/p&gt;', '202003143756-1', '2020-03-17 15:15:55'),
(9, 'COVID 19', '&lt;p&gt;The U\'s said no one in the first-team has shown any symptoms of the virus but the League Two club have decided to take conservative action.&lt;/p&gt;&lt;p&gt;â€œCambridge United can today confirm the football club has taken the decision to self-isolate the entire first team playing and coaching staff for the next week,â€ the club said in a statement on their website.&lt;/p&gt;&lt;p&gt;â€œWhilst no member of the first team has shown symptoms of COVID-19, the club have been made aware of a first-team player who had previously been exposed to someone who last week tested positive for the virus.&lt;/p&gt;', '202004133622-1', '2020-04-21 13:36:23'),
(10, 'COVID 19 in Nigeria', '&lt;p&gt;A statement read: &quot;In light of significant recent changes in the Coronavirus situation and growing concerns relating to the welfare of athletes, officials, staff and volunteers, the IOC\'s Boxing Task Force (BTF) has taken the decision to cancel the rest of the Road to Tokyo Boxing Qualifier from Tuesday 17 March 2020.&lt;/p&gt;&lt;p&gt;&quot;The decision has been made in conjunction with the Local Organising Committee (LOC) of the Boxing Road to Tokyo Qualifying event amid the increasing global travel restrictions and quarantine measures which are impacting on the travel plans of athletes, teams and officials and affecting their ability to return home.&quot;&lt;/p&gt;&lt;p&gt;The International Olympic Committee was already due to meet officials from national Olympic committees and sports federations on Tuesday to discuss qualification procedures for the Games.&lt;/p&gt;&lt;p&gt;Officials in London had initially taken the decision to move the competition behind closed doors on Monday.&lt;/p&gt;', '202004135542-1', '2020-04-21 13:55:42');

-- --------------------------------------------------------

--
-- Table structure for table `dbooking_code`
--

CREATE TABLE `dbooking_code` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `dcode` varchar(20) NOT NULL,
  `dcode2` varchar(20) NOT NULL,
  `dcode3` varchar(20) NOT NULL,
  `dweb_name1` varchar(100) NOT NULL,
  `dweb_name2` varchar(100) NOT NULL,
  `dweb_name3` varchar(100) NOT NULL,
  `dwebsite1` varchar(300) NOT NULL,
  `dwebsite2` varchar(50) NOT NULL,
  `dwebsite3` varchar(50) NOT NULL,
  `dcoupon` varchar(20) NOT NULL,
  `cweb_name` varchar(100) NOT NULL,
  `daccumulator` varchar(20) NOT NULL,
  `dstart_game_time` varchar(30) NOT NULL,
  `dodd` varchar(20) NOT NULL,
  `dtotal_odd` varchar(20) NOT NULL,
  `bstatus` varchar(10) NOT NULL DEFAULT 'pending',
  `dresult` varchar(10) NOT NULL DEFAULT 'pending',
  `don_and_off` varchar(10) NOT NULL DEFAULT 'on',
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbooking_code`
--

INSERT INTO `dbooking_code` (`id`, `booking_id`, `userid`, `dcode`, `dcode2`, `dcode3`, `dweb_name1`, `dweb_name2`, `dweb_name3`, `dwebsite1`, `dwebsite2`, `dwebsite3`, `dcoupon`, `cweb_name`, `daccumulator`, `dstart_game_time`, `dodd`, `dtotal_odd`, `bstatus`, `dresult`, `don_and_off`, `ddate`) VALUES
(3, '412020044116', '43062020024306', 'ZZ675Z9', 'GTRYNFB', 'JKHIMFF', 'bet9ja', 'betking', 'merrybet', 'bet9ja.com', 'betking.com', 'merrybet.com', 'ZZ67DKY', '', '2', '2020-03-17 05:50:00', '280120202816', '4.25', 'Approved', 'won', 'off', '2020-03-17 16:41:16'),
(4, '132020021337', '43062020024306', 'ZZ675Z9', 'GTRYNFB', 'JKHIMFF', 'betking', 'bet9ja', 'merrybet', 'betking.com', 'bet9ja.com', 'merrybet.com', 'ZZ67DKY', '', '4', '2020-03-18 04:30:00', '280120202816', '4.25', 'Approved', 'won', 'off', '2020-03-18 14:13:37'),
(6, '152020011510', '43062020024306', 'ZW675Z9', 'BTRYNFB', '', 'betking', 'bet9ja', '', 'betking.com', 'bet9ja.com', '', 'GYRHJFH', '', '3', '2020-03-19 02:10:00', '280120202816', '3.60', 'Approved', 'won', 'off', '2020-03-19 13:15:10'),
(7, '262020042651', '43062020024306', 'WBSPPB', 'BTRYNFB', '', 'betking', 'bet9ja', '', 'betking.com', 'bet9ja.com', '', 'GYRHJFH', '', '4', '2020-03-20 05:30:00', '280120202816', '4.25', 'Approved', 'won', 'off', '2020-03-20 16:26:51'),
(8, '292020042910', '43062020024306', 'DRFEDS', 'GTRYNFB', '', 'betking', 'merrybet', '', 'betking.com', 'merrybet.com', '', 'HYRHJFH', '', '2', '2020-03-20 05:25:00', '280120202816', '4.0', 'Approved', 'won', 'off', '2020-03-20 16:29:10'),
(9, '332020043307', '43062020024306', 'LKFEWDA', '', '', 'betking', '', '', 'betking.com', '', '', 'GYRHJFH', '', '2', '2020-03-20 04:32:00', '280120202816', '4.0', 'Approved', 'won', 'off', '2020-03-20 16:33:07'),
(10, '342020043447', '43062020024306', 'SUN0006', '', '', 'betking', '', '', 'betking.com', '', '', 'ZZ67DKY', '', '4', '2020-03-20 04:34:00', '280120202816', '3.6', 'Approved', 'won', 'off', '2020-03-20 16:34:47'),
(11, '362020043629', '43062020024306', 'AZZ675Z9', '', '', 'bet9ja', '', '', 'bet9ja.com', '', '', 'ZZ67DKY', '', '2', '2020-03-20 04:36:00', '280120202816', '4.25', 'Approved', 'lost', 'off', '2020-03-20 16:36:29'),
(12, '382020043856', '43062020024306', 'SUN0006', 'BTRYNFB', '', 'bet9ja', 'bet9ja', '', 'bet9ja.com', 'bet9ja.com', '', 'HYRHJFH', '', '4', '2020-03-20 04:38:00', '280120202816', '4.25', 'Approved', 'lost', 'off', '2020-03-20 16:38:56'),
(13, '402020044000', '43062020024306', 'ZZ675Z9', '', '', 'bet9ja', '', '', 'bet9ja.com', '', '', 'ZZ67DKY', '', '2', '2020-03-20 04:39:00', '280120202816', '4.0', 'Approved', 'lost', 'off', '2020-03-20 16:40:00'),
(14, '402020044047', '43062020024306', 'WBSP', '', '', 'betking', '', '', 'betking.com', '', '', 'GYRHJFH', '', '4', '2020-03-20 04:40:00', '280120202816', '4.0', 'Approved', 'lost', 'off', '2020-03-20 16:40:47'),
(15, '462020044611', '43062020024306', 'SUN0003', '', '', 'betking', '', '', 'betking.com', '', '', 'ZZ67DKY', '', '2', '2020-03-20 04:45:00', '280120202816', '3.6', 'Approved', 'won', 'off', '2020-03-20 16:46:11'),
(16, '482020044818', '43062020024306', 'SUN0006', '', '', 'bet9ja', '', '', 'bet9ja.com', '', '', 'ZZ67DKY', '', '3', '2020-03-20 04:48:00', '280120202816', '4.0', 'Approved', 'won', 'off', '2020-03-20 16:48:18'),
(17, '492020044931', '43062020024306', 'SUN0006', '', '', 'betking', '', '', 'betking.com', '', '', 'ZZ67DKY', '', '4', '2020-03-20 04:49:00', '280120202816', '4.0', 'Approved', 'won', 'off', '2020-03-20 16:49:31'),
(18, '272020102750', '43062020024306', 'ZZ675Z9', 'BTRYNFB', '', 'bet9ja', 'merrybet', '', 'bet9ja.com', 'merrybet.com', '', 'ZZ67DKY', '', '4', '2020-03-31 10:27:00', '300120203024', '4.25', 'Approved', 'lost', 'off', '2020-03-31 22:27:50'),
(19, '152020111539', '43062020024306', 'ZZ675Z9', 'BTRYNFB', '', 'merrybet', 'bet9ja', '', 'merrybet.com', 'bet9ja.com', '', 'GYRHJFH', '', '2', '2020-03-31 11:15:00', '280120202816', '4.0', 'Approved', 'won', 'off', '2020-03-31 23:15:39'),
(20, '172020111722', '43062020024306', 'FEWDA', '', '', 'merrybet', '', '', 'merrybet.com', '', '', 'ZZ67DKY', '', '4', '2020-03-31 11:17:00', '280120202816', '3.6', 'Approved', 'won', 'off', '2020-03-31 23:17:22'),
(21, '987654323489', '43062020024306', 'NGHDVS', 'BGFTSR', '', 'testing', 'testing', 'testing', 'testing', 'testing', 'testing', 'BGVGCGB', '', '11', '2020-04-02 00:00:00', '344120203026', '10.8', 'Approved', 'won', 'off', '2020-04-02 20:23:24'),
(22, '562020115659', '49032020114903', 'ZZ675Z9', 'GTRYNFB', '', 'bet9ja', 'merrybet', '', 'bet9ja.com', 'merrybet.com', '', 'HYRHJFH', '', '4', '2020-04-04 11:56:00', '280120202816', '4.87', 'Approved', 'won', 'off', '2020-04-04 11:56:59'),
(23, '472020024746', '43062020024306', 'ZZ675Z9', 'BTRYNFB', '', 'bet9ja', 'merrybet', '', 'bet9ja.com', 'merrybet.com', '', 'GYRHJFH', '', '4', '2020-04-09 07:45:00', '280120202816', '4.66', 'Approved', 'won', 'off', '2020-04-06 14:47:46'),
(24, '572020025754', '43062020024306', 'ZZ675Z9', 'BTRYNFB', '', 'bet9ja', 'betking', '', 'bet9ja.com', 'betking.com', '', 'HYRHJFH', '', '3', '2020-04-09 02:57:00', '300120203024', '3.88', 'Approved', 'won', 'off', '2020-04-06 14:57:54'),
(25, '382020033809', '49032020114903', 'FEWDA', '', '', 'merrybet', '', '', 'merrybet.com', '', '', 'GYRHJFH', '', '2', '2020-04-09 09:30:00', '280120202816', '4.55', 'Approved', 'won', 'off', '2020-04-06 15:38:09'),
(26, '272020022702', '47402020124740', 'BGBGTR', 'NHNHGF', 'LKOJUYH', 'bet9ja', 'merrybet', 'betking', 'bet9ja.com', 'merrybet.com', 'betking.com', 'XXXVGFT', '', '5', '2020-04-11 04:30:00', '280120202816', '4.77', 'Approved', 'won', 'off', '2020-04-08 14:27:02'),
(27, '542020085412', '43062020024306', 'DOLKJI', 'BGTFRE', '', 'bet9ja', 'merrybet', '', 'bet9ja.com', 'merrybet.com', '', 'POLOKI', '', '6', '2020-04-15 15:00:00', '280120202816', '4.55', 'Approved', 'lost', 'off', '2020-04-14 08:54:12'),
(28, '572020085719', '43062020024306', 'MNJHGF', 'NHBGVF', '', 'merrybet', 'betking', '', 'merrybet.com', 'betking.com', '', 'KLJHGF', '', '9', '2020-04-15 14:30:00', '300120203024', '5.99', 'Approved', 'won', 'off', '2020-04-14 08:57:19'),
(29, '042020090413', '47402020124740', 'NBHGVF', 'BGVTRE', '', 'betking', 'merrybet', '', 'betking.com', 'merrybet.com', '', 'VCFDER', '', '7', '2020-04-15 14:00:00', '280120202816', '3.90', 'Approved', 'won', 'off', '2020-04-14 09:04:13'),
(30, '262020102630', '49032020114903', 'SPOKHB', 'BHNGCF', 'HYTDRS', 'betking', 'bet9ja', 'merrybet', 'betking.com', 'bet9ja.com', 'merrybet.com', 'BGTRES', '', '2', '2020-04-15 15:00:00', '280120202816', '4.88', 'Approved', 'won', 'off', '2020-04-14 10:26:30'),
(33, '532020115342', '43062020024306', 'ZZ675Z9', 'GTRYNFB', 'JKHIMFF', 'bet9ja', 'merrybet', 'betking', 'bet9ja.com', 'merrybet.com', 'betking.com', 'XXXVGFT', 'betking', '10', '2020-04-18 11:52:16', '344120203026', '10.90', 'Approved', 'won', 'off', '2020-04-17 11:53:42'),
(34, '442020124455', '47402020124740', 'SUN0006', '', '', 'bet9ja', '', '', 'bet9ja.com', '', '', 'KLJHGF', 'betking', '4', '2020-04-18 12:44:18', '280120202816', '3.6', 'Approved', 'won', 'off', '2020-04-17 12:44:55'),
(35, '512020125145', '43062020024306', 'ZZ675Z9', 'BTRYNFB', '', 'bet9ja', 'betking', '', 'bet9ja.com', 'betking.com', '', 'GYRHJFH', 'betking', '4', '2020-04-18 12:51:14', '280120202816', '4.55', 'Approved', 'won', 'off', '2020-04-17 12:51:45'),
(36, '012020010148', '49032020114903', 'FEWDA', 'GTRYNFB', 'LKOJUYH', 'betking', 'bet9ja', 'merrybet', 'betking.com', 'bet9ja.com', 'merrybet.com', 'POLOKI', 'betking', '6', '2020-04-18 01:01:09', '344120203026', '10.95', 'Approved', 'won', 'off', '2020-04-17 13:01:48'),
(37, '582020085849', '21172020092117', 'GTFREX', 'BGFTRE', '', 'bet9ja', 'betking', '', 'bet9ja.com', 'betking.com', '', 'BGVFTN', 'bet9ja', '6', '2020-04-25 02:30:00pm', '280120202816', '4.50', 'Approved', 'won', 'off', '2020-04-23 20:58:49'),
(38, '592020085958', '49032020114903', 'ZZ675Z9', 'BTRYNFB', '', 'bet9ja', 'merrybet', '', 'bet9ja.com', 'merrybet.com', '', 'KLJHGF', 'bet9ja', '5', '2020-04-25 01:00:00pm', '280120202816', '4.89', 'Approved', 'won', 'off', '2020-04-23 20:59:58'),
(39, '012020090106', '47412020124741', 'BGFGFD', 'OKIJUY', 'NBHGTV', 'bet9ja', 'betking', 'merrybet', 'bet9ja.com', 'betking.com', 'merrybet.com', 'BGFTRN', 'bet9ja', '3', '2020-04-25 09:00:17pm', '280120202816', '4.88', 'Approved', 'won', 'off', '2020-04-23 21:01:06'),
(40, '542020095403', '43062020024306', 'HGHGTF', 'BHGFTR', '', 'Bet9ja', 'Bet9ja', '', 'bet9ja.com', 'bet9ja.com', '', 'BVGFDE', 'Bet9ja', '6', '2020-04-25 09:53:08pm', '344120203026', '4.90', 'Approved', 'lost', 'off', '2020-04-23 21:54:03'),
(41, '292020102929', '49032020114903', 'ZZ675Z9', 'NHBGVF', '', 'Bet9ja', 'Bet9ja', '', 'bet9ja.com', 'bet9ja.com', '', 'HYRHJFH', 'Bet9ja', '4', '2020-05-02 03:00:50', '344120203026', '11.60', 'Approved', 'pending', 'on', '2020-04-27 10:29:29'),
(42, '342020103418', '49032020114903', 'WBSPSW', 'GTRYNFB', '', 'Bet9ja', 'Bet9ja', '', 'bet9ja.com', 'bet9ja.com', '', 'GYRHJFH', 'Bet9ja', '5', '2020-05-02 03:00:17', '280120202816', '4.77', 'Approved', 'cancelled', 'on', '2020-04-27 10:34:18'),
(43, '382020103803', '47412020124741', 'JKIUYT', 'NBHGFT', 'BHGFTR', 'Bet9ja', 'Bet9ja', 'Bet9ja', 'bet9ja.com', 'bet9ja.com', 'bet9ja.com', 'VBGFDC', 'Bet9ja', '3', '2020-05-02 03:00:00', '280120202816', '4.79', 'Approved', 'pending', 'on', '2020-04-27 10:38:03'),
(44, '502020105016', '43062020024306', 'JNFHBG', 'BHGTRE', '', 'Bet9ja', 'Bet9ja', '', 'bet9ja.com', 'bet9ja.com', '', 'CFDETR', 'Bet9ja', '4', '2020-05-02 02:30:00', '280120202816', '4.55', 'Approved', 'pending', 'on', '2020-04-27 10:50:16'),
(45, '512020105131', '43062020024306', 'JNFHBH', 'XSCDER', '', 'Bet9ja', 'Bet9ja', '', 'bet9ja.com', 'bet9ja.com', '', 'VFREDC', 'Bet9ja', '4', '2020-05-02 04:00:00', '300120203024', '9.60', 'Approved', 'pending', 'on', '2020-04-27 10:51:31'),
(46, '522020105256', '43062020024306', 'JNFHXX', 'XXVGFD', '', 'Bet9ja', 'Bet9ja', '', 'bet9ja.com', 'bet9ja.com', '', 'BGVFDJ', 'Bet9ja', '9', '2020-05-02 05:00:00', '344120203026', '15.30', 'Approved', 'pending', 'on', '2020-04-27 10:52:56'),
(48, '552020045501', '47402020124740', 'BGFGFD', '', '', 'Bet9ja', '', '', 'bet9ja.com', '', '', 'VCFDER', 'Bet9ja', 'NULL', '2020-05-02 03:00:00pm', '344120203026', '15.60', 'Approved', 'pending', 'on', '2020-04-28 16:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `dbronze_odd`
--

CREATE TABLE `dbronze_odd` (
  `id` int(11) NOT NULL,
  `dgame_won` int(11) NOT NULL,
  `dstar` int(11) NOT NULL,
  `dstatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dbronze_odd`
--

INSERT INTO `dbronze_odd` (`id`, `dgame_won`, `dstar`, `dstatus`) VALUES
(1, 5, 3, 'bronze'),
(2, 6, 4, 'silver'),
(3, 7, 5, 'gold'),
(4, 4, 0, 'free');

-- --------------------------------------------------------

--
-- Table structure for table `dcategory_subscriptions`
--

CREATE TABLE `dcategory_subscriptions` (
  `id` int(11) NOT NULL,
  `dcategory_id` varchar(20) NOT NULL,
  `dgame_cat_id` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `dsubscriber_email` varchar(30) NOT NULL,
  `dcategory` varchar(100) DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'pending',
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcategory_subscriptions`
--

INSERT INTO `dcategory_subscriptions` (`id`, `dcategory_id`, `dgame_cat_id`, `userid`, `dsubscriber_email`, `dcategory`, `status`, `ddate`) VALUES
(6, '020510202002', '280120202816', '43062020024306', 'youngelefiku44@gmail.com', '3+ Odds', 'active', '2020-03-17 10:02:05'),
(7, '220212202022', '300120203024', '43062020024306', 'youngelefiku44@gmail.com', '5+ Odds ', 'active', '2020-03-17 12:22:02'),
(8, '545611202054', '280120202816', '49032020114903', 'paulelefiku44@gmail.com', '3+ Odds', 'active', '2020-04-04 11:54:56'),
(9, '245702202024', '280120202816', '47402020124740', 'rock1@gmail.com', '3+ Odds', 'active', '2020-04-08 14:24:57'),
(11, '381704202038', '344120203026', '43062020024306', 'youngelefiku44@gmail.com', '10+ Odds ', 'active', '2020-04-16 16:38:17'),
(12, '581812202058', '344120203026', '49032020114903', 'paulelefiku44@gmail.com', '10+ Odds', 'active', '2020-04-17 12:58:18'),
(13, '251401202025', '344120203026', '47402020124740', 'rock1@gmail.com', '10+ Odds', 'active', '2020-04-17 13:25:14'),
(15, '373209202037', '3336475876', '47412020124741', 'rock@gmail.com', 'NAP', 'active', '2020-04-19 21:37:32'),
(16, '084412202008', '5366475876', '47412020124741', 'rock@gmail.com', 'Winning Line', 'active', '2020-04-20 12:08:44'),
(17, '142608202014', '3336475876', '49032020114903', 'paulelefiku44@gmail.com', 'NAP', 'active', '2020-04-23 20:14:26'),
(18, '252708202025', '3336475876', '21172020092117', 'youngelefiku@gmail.com', 'NAP', 'active', '2020-04-23 20:25:27'),
(19, '535508202053', '280120202816', '21172020092117', 'youngelefiku@gmail.com', '3+ Odds', 'active', '2020-04-23 20:53:55'),
(20, '560008202056', '280120202816', '47412020124741', 'rock@gmail.com', '3+ Odds', 'active', '2020-04-23 20:56:00'),
(21, '424209202042', '3336475876', '43062020024306', 'youngelefiku44@gmail.com', 'NAP', 'active', '2020-04-28 09:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `dcontact`
--

CREATE TABLE `dcontact` (
  `id` int(11) NOT NULL,
  `con_id` varchar(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `text` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `dstatus` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dcontact`
--

INSERT INTO `dcontact` (`id`, `con_id`, `fullname`, `email`, `phone`, `text`, `created_date`, `dstatus`) VALUES
(1, '503120200523', 'Elefiku Young', 'youngelefiku44@gmail.com', '08061382683', 'Test', '2020-04-23 17:31:50', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `dgame_categories`
--

CREATE TABLE `dgame_categories` (
  `id` int(11) NOT NULL,
  `category_id` varchar(20) NOT NULL,
  `dcategory` varchar(200) NOT NULL,
  `dfee` varchar(20) NOT NULL,
  `dgame` varchar(10) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dgame_categories`
--

INSERT INTO `dgame_categories` (`id`, `category_id`, `dcategory`, `dfee`, `dgame`, `dstatus`) VALUES
(1, '280120202816', '3+ Odds', '2500', 'bronze', 'active'),
(3, '300120203024', '5+ Odds', '5000', 'silver', 'active'),
(4, '344120203026', '10+ Odds', '10000', 'gold', 'active'),
(6, '230120202314', 'Free', '0', 'free', 'active'),
(8, '160620201600', '2+ Odds', '1000', '', 'active'),
(9, '170820201718', '15 + Odds', '6000', '', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `dgame_market`
--

CREATE TABLE `dgame_market` (
  `id` int(11) NOT NULL,
  `transid` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `booking_id` varchar(20) NOT NULL,
  `dresult` varchar(20) NOT NULL DEFAULT 'pending',
  `dprice` varchar(100) NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dgame_market`
--

INSERT INTO `dgame_market` (`id`, `transid`, `user_id`, `booking_id`, `dresult`, `dprice`, `ddate`) VALUES
(5, 'am592020105937', '21172020092117', '472020024746', 'won', '2000', '2020-04-07 10:59:37'),
(6, 'am192020111907', '49032020114903', '472020024746', 'won', '2000', '2020-04-07 11:19:07'),
(8, 'pm532020015355', '47412020124741', '472020024746', 'won', '1000', '2020-04-08 13:53:55'),
(9, 'am412020094110', '47412020124741', '042020090413', 'won', '1000', '2020-04-14 09:41:10'),
(10, 'am332020093322', '47402020124740', '112020121129', 'lost', '2000', '2020-04-21 09:33:22'),
(11, 'pm322020013217', '21172020092117', '152020111528', 'won', '2000', '2020-04-23 13:32:17'),
(12, 'pm382020013809', '21172020092117', '112020121129', 'lost', '2000', '2020-04-23 13:38:09'),
(13, 'pm302020033008', '21172020092117', '252020032549', 'won', '500', '2020-04-23 15:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `dgame_offers`
--

CREATE TABLE `dgame_offers` (
  `id` int(11) NOT NULL,
  `demail` varchar(30) DEFAULT NULL,
  `dname` varchar(40) DEFAULT NULL,
  `dstar_rating` int(2) DEFAULT 0,
  `dcategory` varchar(250) DEFAULT NULL,
  `dprice` varchar(30) NOT NULL DEFAULT '0',
  `dtime_created` datetime DEFAULT NULL,
  `dtime_expire` datetime DEFAULT NULL,
  `dstatus` varchar(20) NOT NULL DEFAULT 'pending',
  `gameid` varchar(30) DEFAULT NULL,
  `dapproved` varchar(10) NOT NULL DEFAULT 'No'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dgame_offers_list`
--

CREATE TABLE `dgame_offers_list` (
  `id` int(10) NOT NULL,
  `gameid` varchar(20) DEFAULT NULL,
  `dgame_detail` varchar(500) NOT NULL,
  `dstatus` varchar(30) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dgame_sales`
--

CREATE TABLE `dgame_sales` (
  `id` int(11) NOT NULL,
  `transid` varchar(30) DEFAULT NULL,
  `gameid` varchar(30) DEFAULT NULL,
  `dcategory` varchar(250) DEFAULT NULL,
  `demail_seller` varchar(30) DEFAULT NULL,
  `dname_seller` varchar(40) DEFAULT NULL,
  `demail_buyer` varchar(30) DEFAULT NULL,
  `dname_buyer` varchar(40) DEFAULT NULL,
  `dprice` varchar(30) NOT NULL DEFAULT '0',
  `dtime` datetime DEFAULT NULL,
  `dstatus_game` varchar(20) NOT NULL DEFAULT 'pending',
  `dstatus_transaction` varchar(20) NOT NULL DEFAULT 'pending',
  `dstatus_payment` varchar(20) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dgeneral_booking`
--

CREATE TABLE `dgeneral_booking` (
  `id` int(11) NOT NULL,
  `dcat_id` varchar(20) NOT NULL,
  `dcategory` varchar(200) NOT NULL,
  `dgame_won` int(11) NOT NULL,
  `dstar` int(11) NOT NULL,
  `dstatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dgeneral_booking`
--

INSERT INTO `dgeneral_booking` (`id`, `dcat_id`, `dcategory`, `dgame_won`, `dstar`, `dstatus`) VALUES
(1, '280120202816', '3+ Odds', 5, 3, 'bronze'),
(2, '280120202816', '3+ Odds', 6, 4, 'silver'),
(3, '280120202816', '3+ Odds', 7, 5, 'gold'),
(4, '280120202816', '3+ Odds', 4, 0, 'Free'),
(5, '300120203024', '5+ Odds', 3, 0, 'Free'),
(6, '300120203024', '5+ Odds', 4, 3, 'bronze'),
(7, '300120203024', '5+ Odds', 5, 4, 'silver'),
(8, '300120203024', '5 + Odds', 6, 5, 'gold'),
(9, '344120203026', '10+ Odds', 2, 0, 'Free'),
(10, '344120203026', '10+ Odds', 3, 3, 'bronze'),
(11, '344120203026', '10+ Odds', 4, 4, 'silver'),
(12, '344120203026', '10+ Odds', 5, 5, 'gold'),
(13, '160620201600', '2+ Odds', 0, 0, 'Free'),
(14, '160620201600', '2+ Odds', 6, 3, 'bronze'),
(15, '160620201600', '2+ Odds', 7, 4, 'silver'),
(16, '160620201600', '2+ Odds', 8, 5, 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `dgold_odd`
--

CREATE TABLE `dgold_odd` (
  `id` int(11) NOT NULL,
  `dgame_won` int(11) NOT NULL,
  `dstar` int(11) NOT NULL,
  `dstatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dgold_odd`
--

INSERT INTO `dgold_odd` (`id`, `dgame_won`, `dstar`, `dstatus`) VALUES
(1, 2, 0, 'free'),
(2, 3, 3, 'bronze'),
(3, 4, 4, 'silver'),
(4, 5, 5, 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `dmessage_sent`
--

CREATE TABLE `dmessage_sent` (
  `id` int(11) NOT NULL,
  `dsender` varchar(20) NOT NULL,
  `dreceiver` varchar(20) NOT NULL,
  `dsubject` varchar(100) NOT NULL,
  `dmessage` varchar(2000) NOT NULL,
  `dtime` datetime NOT NULL DEFAULT current_timestamp(),
  `dstatus` varchar(10) NOT NULL DEFAULT 'unread',
  `transid` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dmessage_sent`
--

INSERT INTO `dmessage_sent` (`id`, `dsender`, `dreceiver`, `dsubject`, `dmessage`, `dtime`, `dstatus`, `transid`) VALUES
(2, '43062020024306', '2147483647', 'Testing', 'Stev\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam animi omnis aut ex repellendus suscipit veniam obcaecati nam odio sed?', '2020-03-11 14:38:17', 'unread', '38172020023817'),
(3, '21172020092117', '2147483647', 'testing', 'gnfd', '2020-04-07 15:12:04', 'unread', '12042020031204'),
(4, '47412020124741', '2147483647', 'testing', 'Testing', '2020-04-08 14:02:01', 'unread', '02012020020201');

-- --------------------------------------------------------

--
-- Table structure for table `dmessaging`
--

CREATE TABLE `dmessaging` (
  `id` int(11) NOT NULL,
  `dsender` varchar(30) DEFAULT NULL,
  `dreceiver` varchar(30) DEFAULT NULL,
  `dsubject` varchar(100) DEFAULT NULL,
  `dmessage` varchar(2000) NOT NULL,
  `dtime` datetime NOT NULL DEFAULT current_timestamp(),
  `dstatus` varchar(20) NOT NULL DEFAULT 'unread',
  `transid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dmessaging`
--

INSERT INTO `dmessaging` (`id`, `dsender`, `dreceiver`, `dsubject`, `dmessage`, `dtime`, `dstatus`, `transid`) VALUES
(1, '43062020024306', '2147483647', 'testing', 'lorem', '2020-03-10 14:03:52', 'unread', '18522020031852'),
(2, '43062020024306', '2147483647', 'testing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptatibus, rerum quaerat dolor suscipit provident tempore error adipisci consequatur eum voluptatum repellat voluptates eaque. Deserunt dolorem molestias laudantium quis distinctio minus sapiente. Voluptas accusamus ipsa ea, possimus et culpa architecto natus magnam dolores veritatis, ab illo repellat eos excepturi fugit.', '2020-03-10 14:27:52', 'unread', '20492020032049'),
(3, '43062020024306', '2147483647', 'testing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptatibus, rerum quaerat dolor suscipit provident tempore error adipisci consequatur eum voluptatum repellat voluptates eaque. Deserunt dolorem molestias laudantium quis distinctio minus sapiente. Voluptas accusamus ipsa ea, possimus et culpa architecto natus magnam dolores veritatis, ab illo repellat eos excepturi fugit.', '2020-03-10 14:23:52', 'unread', '21342020032134'),
(4, '43062020024306', '2147483647', 'testing for this is another', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptatibus, rerum quaerat dolor suscipit provident tempore error adipisci consequatur eum voluptatum repellat voluptates eaque. Deserunt dolorem molestias laudantium quis distinctio minus sapiente. Voluptas accusamus ipsa ea, possimus et culpa architecto natus magnam dolores veritatis, ab illo repellat eos excepturi fugit.', '2020-03-10 15:23:52', 'read', '23522020032352'),
(5, '2147483647', '43062020024306', 'testing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta autem tenetur, rerum excepturi reiciendis magnam beatae neque. Consectetur, aut nihil.', '2020-03-10 15:27:44', 'unread', '213341224344'),
(7, '2147483647', '43062020024306', 'testing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dicta autem tenetur, rerum excepturi reiciendis magnam beatae neque. Consectetur, aut nihil.', '2020-03-10 15:56:50', 'delete', '238454362'),
(8, '43062020024306', '2147483647', 'testing', 'Re:\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Dicta autem tenetur, rerum excepturi reiciendis magnam beatae neque. Consectetur, aut nihil.', '2020-03-10 17:27:39', 'unread', '27392020052739'),
(9, '43062020024306', '2147483647', 'testing', 'Re:\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Dicta autem tenetur, rerum excepturi reiciendis magnam beatae neque. Consectetur', '2020-03-11 13:42:04', 'delete', '238454362'),
(10, '43062020024306', '2147483647', 'Testing', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam animi omnis aut ex repellendus suscipit veniam obcaecati nam odio sed?', '2020-03-11 14:35:11', 'read', '35112020023511'),
(11, '43062020024306', '2147483647', 'Testing', 'Stev\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam animi omnis aut ex repellendus suscipit veniam obcaecati nam odio sed?', '2020-03-11 14:38:17', 'read', '38172020023817'),
(12, '21172020092117', '2147483647', 'testing', 'gnfd', '2020-04-07 15:12:04', 'unread', '12042020031204'),
(13, '47412020124741', '2147483647', 'testing', 'Testing', '2020-04-08 14:02:01', 'delete', '02012020020201'),
(14, '2147483647', '43062020024306', 'Warning', '&lt;p&gt;This is just a test&lt;/p&gt;', '2020-04-22 06:37:16', 'read', '37160637202016'),
(15, '2147483647', '49032020114903', 'Warning', '&lt;p&gt;This is just a test&lt;/p&gt;', '2020-04-22 06:37:16', 'read', '37160637202016'),
(16, '2147483647', '21172020092117', 'Warning', '&lt;p&gt;This is just a test&lt;/p&gt;', '2020-04-22 06:37:17', 'read', '37160637202016'),
(17, '2147483647', '47402020124740', 'Warning', '&lt;p&gt;This is just a test&lt;/p&gt;', '2020-04-22 06:37:17', 'read', '37160637202016'),
(18, '2147483647', '47412020124741', 'Warning', '&lt;p&gt;This is just a test&lt;/p&gt;', '2020-04-22 06:37:17', 'read', '37160637202016'),
(19, '2147483647', '36172020103617', 'Warning', '&lt;p&gt;This is just a test&lt;/p&gt;', '2020-04-22 06:37:17', 'read', '37160637202016'),
(20, '2147483647', '43062020024306', 'Warning to Tipsters', '&lt;p&gt;This is the last warning&lt;/p&gt;', '2020-04-22 06:39:38', 'read', '39380639202038'),
(21, '2147483647', '49032020114903', 'Warning to Tipsters', '&lt;p&gt;This is the last warning&lt;/p&gt;', '2020-04-22 06:39:39', 'read', '39380639202038'),
(22, '2147483647', '47402020124740', 'Warning to Tipsters', '&lt;p&gt;This is the last warning&lt;/p&gt;', '2020-04-22 06:39:39', 'read', '39380639202038'),
(23, '2147483647', '47412020124741', 'Warning to Tipsters', '&lt;p&gt;This is the last warning&lt;/p&gt;', '2020-04-22 06:39:39', 'read', '39380639202038'),
(24, '2147483647', '43062020024306', 'RE: Testing for this is another', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nobis voluptatibus, rerum quaerat dolor suscipit provident tempore error adipisci consequatur eum voluptatum repellat voluptates eaque. Deserunt dolorem molestias laudantium quis distinctio minus sapiente. Voluptas accusamus ipsa ea, possimus et culpa architecto natus magnam dolores veritatis, ab illo repellat eos excepturi fugit.', '2020-04-22 10:23:52', 'read', '23522020032352');

-- --------------------------------------------------------

--
-- Table structure for table `dnewletter`
--

CREATE TABLE `dnewletter` (
  `id` int(11) NOT NULL,
  `news_id` varchar(20) NOT NULL,
  `demail` varchar(50) NOT NULL,
  `dsubject` varchar(100) NOT NULL,
  `dtext` text NOT NULL,
  `dstatus` varchar(20) NOT NULL DEFAULT 'pending',
  `created_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dpercentage`
--

CREATE TABLE `dpercentage` (
  `id` int(11) NOT NULL,
  `dadmin` float NOT NULL,
  `dusers` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpercentage`
--

INSERT INTO `dpercentage` (`id`, `dadmin`, `dusers`) VALUES
(1, 25, 75);

-- --------------------------------------------------------

--
-- Table structure for table `dpercentage_return`
--

CREATE TABLE `dpercentage_return` (
  `id` int(11) NOT NULL,
  `dadmin` float NOT NULL,
  `dusers` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpercentage_return`
--

INSERT INTO `dpercentage_return` (`id`, `dadmin`, `dusers`) VALUES
(1, 0, 100);

-- --------------------------------------------------------

--
-- Table structure for table `dpools`
--

CREATE TABLE `dpools` (
  `id` int(11) NOT NULL,
  `dcategory_ids` varchar(20) NOT NULL,
  `dpool` varchar(30) NOT NULL,
  `dfee` varchar(100) NOT NULL,
  `dgame` varchar(20) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpools`
--

INSERT INTO `dpools` (`id`, `dcategory_ids`, `dpool`, `dfee`, `dgame`, `dstatus`) VALUES
(1, '5366475876', 'Winning Line', '200', 'bronze', 'active'),
(2, '3336475876', 'NAP', '400', 'silver', 'active'),
(3, '540820205420', 'Sures', '600', '', 'inactive'),
(4, '140920201437', 'Sure', '600', '', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `dpool_bronze`
--

CREATE TABLE `dpool_bronze` (
  `id` int(11) NOT NULL,
  `dgame_won` int(11) NOT NULL,
  `dstar` int(11) NOT NULL,
  `dstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpool_bronze`
--

INSERT INTO `dpool_bronze` (`id`, `dgame_won`, `dstar`, `dstatus`) VALUES
(1, 3, 0, 'free'),
(2, 4, 3, 'bronze'),
(3, 5, 4, 'silver'),
(4, 6, 5, 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `dpool_code`
--

CREATE TABLE `dpool_code` (
  `id` int(11) NOT NULL,
  `pool_id` varchar(20) NOT NULL,
  `duserid` varchar(20) NOT NULL,
  `dgames` varchar(100) NOT NULL,
  `pstatus` varchar(10) NOT NULL DEFAULT 'pending',
  `dresult` varchar(10) NOT NULL DEFAULT 'pending',
  `don_and_off` varchar(5) NOT NULL DEFAULT 'on',
  `dodd` varchar(20) NOT NULL,
  `dstart_time` varchar(30) NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpool_code`
--

INSERT INTO `dpool_code` (`id`, `pool_id`, `duserid`, `dgames`, `pstatus`, `dresult`, `don_and_off`, `dodd`, `dstart_time`, `ddate`) VALUES
(3, '152020111528', '47412020124741', '23, 14, 33', 'Approved', 'won', 'off', '3336475876', '2020-04-25 01:00:00pm', '2020-04-20 11:15:28'),
(4, '112020121129', '47412020124741', '23, 14, 33, 8, 12, 17', 'Approved', 'lost', 'off', '5366475876', '2020-04-25 12:11:22pm', '2020-04-20 12:11:29'),
(5, '162020031607', '47412020124741', '10, 24, 40', 'Approved', 'won', 'off', '3336475876', '2020-04-25 03:15:39pm', '2020-04-23 15:16:07'),
(6, '182020031825', '47412020124741', '15, 29, 38, 16, 28, 31', 'Approved', 'won', 'off', '5366475876', '2020-04-25 03:17:46pm', '2020-04-23 15:18:25'),
(7, '252020032549', '47412020124741', '11, 10, 30', 'Approved', 'won', 'off', '3336475876', '2020-04-25 03:25:22pm', '2020-04-23 15:25:49'),
(8, '262020032643', '47412020124741', '11, 10, 30, 20, 17, 27', 'Approved', 'won', 'off', '5366475876', '2020-04-25 03:26:36pm', '2020-04-23 15:26:43'),
(9, '242020082437', '49032020114903', '23, 14, 33', 'Approved', 'won', 'off', '3336475876', '2020-04-25 01:00:00pm', '2020-04-23 20:24:37'),
(10, '262020082639', '21172020092117', '28, 40, 2, 4', 'Approved', 'won', 'off', '3336475876', '2020-04-25 01:00:00pm', '2020-04-23 20:26:39'),
(11, '442020084440', '47412020124741', '12, 25, 30', 'Approved', 'lost', 'off', '3336475876', '2020-04-25 01:00:00pm', '2020-04-23 20:44:40'),
(13, '082020090810', '47412020124741', '11, 10, 30, 20, 17, 27', 'Approved', 'won', 'off', '5366475876', '2020-04-25 09:07:50pm', '2020-04-24 09:08:10'),
(14, '432020104347', '49032020114903', '35, 27, 19', 'Approved', 'pending', 'on', '3336475876', '2020-05-02 01:00:03pm', '2020-04-27 10:43:47'),
(15, '472020104703', '21172020092117', '20, 30, 40', 'Approved', 'pending', 'on', '3336475876', '2020-05-02 01:00:00pm', '2020-04-27 10:47:03'),
(16, '542020105427', '47412020124741', '20, 15, 2', 'Approved', 'pending', 'on', '3336475876', '2020-05-02 01:00:00pm', '2020-04-27 10:54:27'),
(17, '552020105515', '47412020124741', '15, 20, 30, 22, 17, 27', 'Approved', 'pending', 'on', '5366475876', '2020-05-02 01:00:00pm', '2020-04-27 10:55:15'),
(18, '452020094538', '43062020024306', '23, 14, 33', 'pending', 'pending', 'on', '3336475876', '2020-05-02 01:00:00pm', '2020-04-28 09:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `dpool_general`
--

CREATE TABLE `dpool_general` (
  `id` int(10) NOT NULL,
  `dcat_id` varchar(20) NOT NULL,
  `dcategory` varchar(100) DEFAULT NULL,
  `dgame_won` int(11) DEFAULT NULL,
  `dstar` int(11) DEFAULT NULL,
  `dstatus` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpool_general`
--

INSERT INTO `dpool_general` (`id`, `dcat_id`, `dcategory`, `dgame_won`, `dstar`, `dstatus`) VALUES
(1, '3336475876', 'NAP', 1, 0, 'Free'),
(2, '3336475876', 'NAP', 2, 3, 'bronze'),
(3, '3336475876', 'NAP', 3, 4, 'silver'),
(4, '3336475876', 'NAP', 4, 5, 'gold'),
(6, '5366475876', 'Winning Line', 3, 0, 'Free'),
(7, '5366475876', 'Winning Line', 4, 3, 'bronze'),
(8, '5366475876', 'Winning Line', 5, 4, 'silver'),
(9, '5366475876', 'Winning Line', 6, 5, 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `dpool_silver`
--

CREATE TABLE `dpool_silver` (
  `id` int(11) NOT NULL,
  `dgame_won` int(11) NOT NULL,
  `dstar` int(11) NOT NULL,
  `dstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpool_silver`
--

INSERT INTO `dpool_silver` (`id`, `dgame_won`, `dstar`, `dstatus`) VALUES
(1, 1, 0, 'free'),
(2, 22, 3, 'bronze'),
(3, 3, 4, 'silver'),
(4, 4, 5, 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `dpool_subscriptions`
--

CREATE TABLE `dpool_subscriptions` (
  `id` int(11) NOT NULL,
  `dsub_id` varchar(20) NOT NULL,
  `dpool_id` varchar(20) NOT NULL,
  `duser_id` varchar(20) NOT NULL,
  `dpool` varchar(30) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'pending',
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dpromo`
--

CREATE TABLE `dpromo` (
  `id` int(11) NOT NULL,
  `dpercentage` varchar(200) NOT NULL,
  `dtext` text NOT NULL,
  `start_date` varchar(50) NOT NULL,
  `end_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dpromo`
--

INSERT INTO `dpromo` (`id`, `dpercentage`, `dtext`, `start_date`, `end_date`) VALUES
(1, '5', 'Get 5% bonus of the amount pay into your wallet before the closing date of this promo.', '2020-04-25', '2020-05-02');

-- --------------------------------------------------------

--
-- Table structure for table `dsilver_odd`
--

CREATE TABLE `dsilver_odd` (
  `id` int(11) NOT NULL,
  `dgame_won` int(11) NOT NULL,
  `dstar` int(11) NOT NULL,
  `dstatus` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dsilver_odd`
--

INSERT INTO `dsilver_odd` (`id`, `dgame_won`, `dstar`, `dstatus`) VALUES
(1, 3, 0, 'free'),
(2, 4, 3, 'bronze'),
(3, 5, 4, 'silver'),
(4, 6, 5, 'gold');

-- --------------------------------------------------------

--
-- Table structure for table `dstar_rating`
--

CREATE TABLE `dstar_rating` (
  `id` int(11) NOT NULL,
  `dcategory_id` varchar(30) NOT NULL,
  `duser_id` varchar(30) NOT NULL,
  `dtotal` int(11) NOT NULL,
  `ddate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dstar_rating`
--

INSERT INTO `dstar_rating` (`id`, `dcategory_id`, `duser_id`, `dtotal`, `ddate`) VALUES
(2, '280120202816', '43062020024306', 7, '2020-03-31 21:04:46'),
(3, '300120203024', '43062020024306', 4, '2020-03-31 21:42:14'),
(6, '280120202816', '49032020114903', 6, '2020-04-04 13:32:38'),
(9, '280120202816', '47402020124740', 3, '2020-04-08 13:29:15'),
(10, '344120203026', '43062020024306', 2, '2020-04-16 15:38:17'),
(11, '344120203026', '49032020114903', 1, '2020-04-17 11:58:18'),
(12, '344120203026', '47402020124740', 0, '2020-04-17 12:25:14'),
(14, '3336475876', '47402020124740', 0, '2020-04-17 13:13:40'),
(15, '3336475876', '47412020124741', 3, '2020-04-19 20:37:33'),
(17, '5366475876', '47412020124741', 3, '2020-04-20 11:08:44'),
(18, '3336475876', '49032020114903', 0, '2020-04-23 19:14:26'),
(19, '3336475876', '21172020092117', 0, '2020-04-23 19:25:27'),
(20, '280120202816', '21172020092117', 1, '2020-04-23 19:53:55'),
(21, '280120202816', '47412020124741', 1, '2020-04-23 19:56:00'),
(23, '3336475876', '43062020024306', 0, '2020-04-28 08:42:43');

-- --------------------------------------------------------

--
-- Table structure for table `dtransaction_history`
--

CREATE TABLE `dtransaction_history` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dtransaction_history`
--

INSERT INTO `dtransaction_history` (`id`, `transaction_id`, `userid`, `dname`, `amount`, `ddate`) VALUES
(1, '103211202010', '43062020024306', 'Recharge wallet', '1000', '2020-03-09 23:10:32'),
(2, '131611202013', '43062020024306', 'Recharge wallet', '1000', '2020-03-09 23:13:16'),
(3, '205711202020', '43062020024306', 'Recharge wallet', '2000', '2020-03-09 23:20:57'),
(4, '245511202024', '43062020024306', 'Recharge wallet', '1000', '2020-03-09 23:24:55'),
(5, '262911202026', '43062020024306', 'Recharge wallet', '2000', '2020-03-09 23:26:29'),
(6, '272411202027', '43062020024306', 'Recharge wallet', '1000', '2020-03-09 23:27:24'),
(7, '190305202019', '43062020024306', 'English Premier League', '20000', '2020-03-11 17:19:03'),
(8, '222805202022', '43062020024306', 'English Premier League (Tipster)', '20000', '2020-03-11 17:22:28'),
(9, '281905202028', '43062020024306', 'English Premier League (Tipster)', '20000', '2020-03-11 17:28:19'),
(10, '185511202018', '43062020024306', 'Spanish Premier League (Tipster)', '15000', '2020-03-12 11:18:56'),
(11, '552011202055', '49032020114903', 'English Premier League (Tipster)', '20000', '2020-03-12 11:55:20'),
(12, '020510202002', '43062020024306', '2.5 + Odds (Tipster)', '2500', '2020-03-17 10:02:05'),
(13, '220212202022', '43062020024306', '5 + Odds (Tipster)', '5000', '2020-03-17 12:22:02'),
(14, '371002202037', '43062020024306', 'Recharge wallet', '2000', '2020-03-19 14:37:10'),
(15, 'pm022020090258', '43062020024306', 'Booking code bought', '500', '2020-04-03 21:02:58'),
(16, '', '43062020024306', 'Booking code bought', '500', '2020-04-04 11:10:02'),
(17, '163611202016', '43062020024306', 'Recharge wallet', '10000', '2020-04-04 11:16:36'),
(18, 'am192020111904', '43062020024306', 'Booking code bought', '500', '2020-04-04 11:19:04'),
(19, 'am392020113954', '43062020024306', 'Booking code bought', '2000', '2020-04-04 11:39:54'),
(20, '545611202054', '49032020114903', '3+ Odds (Tipster)', '2500', '2020-04-04 11:54:56'),
(21, '545610202054', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 10:54:56'),
(22, '413611202041', '43062020024306', 'VIP for 90 days', '5000', '2020-04-06 11:41:37'),
(23, '532511202053', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 11:53:25'),
(24, '262112202026', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 12:26:21'),
(25, '482212202048', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 12:48:22'),
(26, '545912202054', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 12:54:59'),
(27, '020101202002', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 13:02:01'),
(28, '081401202008', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 13:08:14'),
(29, '482201202048', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 13:48:23'),
(30, '190904202019', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 16:19:09'),
(31, '314904202031', '43062020024306', 'VIP for 30 days', '2000', '2020-04-06 16:31:49'),
(32, '581610202058', '21172020092117', 'Recharge wallet', '15000', '2020-04-07 10:58:16'),
(33, 'am592020105937', '21172020092117', 'Booking code bought', '2000', '2020-04-07 10:59:37'),
(34, 'am192020111907', '49032020114903', 'Booking code bought', '2000', '2020-04-07 11:19:07'),
(35, '524901202049', '43062020024306', 'Game won', '20000', '2020-04-07 13:52:49'),
(36, '542801202028', '21172020092117', 'Refund of game lost', '13100', '2020-04-07 13:54:28'),
(37, '542901202029', '49032020114903', 'Refund of game lost', '3100', '2020-04-07 13:54:29'),
(38, 'pm042020030440', '21172020092117', 'Booking code bought', '1000', '2020-04-07 15:04:40'),
(39, '485701202048', '47412020124741', 'Recharge wallet', '5000', '2020-04-08 13:48:58'),
(40, 'pm532020015355', '47412020124741', 'Booking code bought', '1000', '2020-04-08 13:53:55'),
(41, '240202202024', '47402020124740', 'Recharge wallet', '2000', '2020-04-08 14:24:02'),
(42, '245702202024', '47402020124740', '3+ Odds (Tipster)', '2500', '2020-04-08 14:24:57'),
(43, '521108202011', '43062020024306', 'Game won', '0', '2020-04-14 08:52:11'),
(44, '522008202020', '43062020024306', 'Game won', '3750', '2020-04-14 08:52:20'),
(45, '523208202032', '49032020114903', 'Game won', '0', '2020-04-14 08:52:32'),
(46, '524208202042', '47402020124740', 'Game won', '0', '2020-04-14 08:52:42'),
(47, 'am412020094110', '47412020124741', 'Booking code bought', '1000', '2020-04-14 09:41:10'),
(48, '371301202013', '47402020124740', 'Game won', '750', '2020-04-14 13:37:13'),
(50, '381704202038', '43062020024306', '10 + Odds (Tipster)', '10000', '2020-04-16 16:38:17'),
(51, '431912202019', '47402020124740', 'Game won', '0', '2020-04-17 12:43:19'),
(52, '433212202032', '43062020024306', 'Game won', '0', '2020-04-17 12:43:32'),
(53, '434012202040', '43062020024306', 'Game won', '0', '2020-04-17 12:43:40'),
(54, '434812202048', '49032020114903', 'Game won', '0', '2020-04-17 12:43:48'),
(55, '435712202057', '43062020024306', 'Game won', '0', '2020-04-17 12:43:57'),
(56, '581812202058', '49032020114903', '10 + Odds (Tipster)', '10000', '2020-04-17 12:58:18'),
(57, '251401202025', '47402020124740', '10 + Odds (Tipster)', '10000', '2020-04-17 13:25:14'),
(58, '133902202013', '47402020124740', 'NAP (Tipster)', '400', '2020-04-17 14:13:40'),
(59, '373209202037', '47412020124741', 'NAP (Tipster)', '400', '2020-04-19 21:37:32'),
(60, '084412202008', '47412020124741', 'Winning Line (Tipster)', '200', '2020-04-20 12:08:44'),
(61, '163802202038', '49032020114903', 'Game won', '0', '2020-04-20 14:16:38'),
(62, 'am332020093322', '47402020124740', 'Booking code bought', '2000', '2020-04-21 09:33:23'),
(63, 'pm322020013217', '21172020092117', 'Booking code bought', '2000', '2020-04-23 13:32:18'),
(64, 'pm382020013809', '21172020092117', 'Booking code bought', '2000', '2020-04-23 13:38:09'),
(65, '202802202028', '47412020124741', 'Game won', '1500', '2020-04-23 14:20:28'),
(66, '361602202016', '47412020124741', 'Game won', '0', '2020-04-23 14:36:16'),
(67, '372602202026', '47412020124741', 'Game won', '3000', '2020-04-23 14:37:26'),
(68, '463302202033', '47412020124741', 'Game won', '0', '2020-04-23 14:46:33'),
(69, '473602202036', '47412020124741', 'Game won', '0', '2020-04-23 14:47:36'),
(70, '512702202027', '47412020124741', 'Game won', '1500', '2020-04-23 14:51:27'),
(71, '555602202056', '47402020124740', 'Refund of game lost', '11950', '2020-04-23 14:55:56'),
(72, '555602202056', '21172020092117', 'Refund of game lost', '10100', '2020-04-23 14:55:56'),
(73, '002003202020', '47402020124740', 'Refund of game lost', '22000', '2020-04-23 15:00:20'),
(74, '002003202020', '21172020092117', 'Refund of game lost', '22000', '2020-04-23 15:00:20'),
(75, '220503202005', '47412020124741', 'Game won', '0', '2020-04-23 15:22:05'),
(76, '225203202052', '47412020124741', 'Game won', '0', '2020-04-23 15:22:52'),
(77, 'pm302020033008', '21172020092117', 'Booking code bought', '500', '2020-04-23 15:30:08'),
(78, '310003202000', '47412020124741', 'Game won', '375', '2020-04-23 15:31:00'),
(79, '311003202010', '47412020124741', 'Game won', '0', '2020-04-23 15:31:10'),
(80, '142608202014', '49032020114903', 'NAP (Tipster)', '400', '2020-04-23 20:14:26'),
(81, '252708202025', '21172020092117', 'NAP (Tipster)', '400', '2020-04-23 20:25:27'),
(82, '535508202053', '21172020092117', '3+ Odds (Tipster)', '2500', '2020-04-23 20:53:55'),
(83, '560008202056', '47412020124741', '3+ Odds (Tipster)', '2500', '2020-04-23 20:56:00'),
(84, '510109202001', '43062020024306', 'Game won', '0', '2020-04-23 21:51:01'),
(85, '524509202045', '43062020024306', 'Game won', '0', '2020-04-23 21:52:45'),
(86, '043301202004', '49032020114903', 'Recharge wallet with bonus of 500', '25200', '2020-04-24 13:04:33'),
(87, '270610202006', '43062020024306', 'Game won', '0', '2020-04-27 10:27:06'),
(88, '273710202037', '21172020092117', 'Game won', '0', '2020-04-27 10:27:37'),
(89, '295710202057', '47402020124740', 'Game won', '0', '2020-04-27 10:29:57'),
(90, '302110202021', '49032020114903', 'Game won', '0', '2020-04-27 10:30:21'),
(91, '303110202031', '47412020124741', 'Game won', '0', '2020-04-27 10:30:31'),
(92, '422310202023', '49032020114903', 'Game won', '0', '2020-04-27 10:42:23'),
(93, '424210202042', '47412020124741', 'Game won', '0', '2020-04-27 10:42:42'),
(94, '425110202051', '21172020092117', 'Game won', '0', '2020-04-27 10:42:51'),
(95, '474403202047', '47412020124741', 'Recharge wallet with bonus of 500', '20000', '2020-04-27 15:47:44'),
(96, '004208202000', '47412020124741', 'VIP for 30 days', '2000', '2020-04-28 08:00:42'),
(97, '424209202042', '43062020024306', 'NAP', '400', '2020-04-28 09:42:43'),
(98, '104105202010', '43062020024306', 'Recharge wallet with bonus of 500', '17850', '2020-04-28 17:10:41'),
(99, '114905202011', '43062020024306', 'Recharge wallet with bonus of 750', '21600', '2020-04-28 17:11:49');

-- --------------------------------------------------------

--
-- Table structure for table `dvip_account`
--

CREATE TABLE `dvip_account` (
  `id` int(11) NOT NULL,
  `dvip_id` varchar(20) NOT NULL,
  `duser_id` varchar(20) NOT NULL,
  `dduration` varchar(20) NOT NULL,
  `dprice` varchar(20) NOT NULL,
  `dstarting_date` datetime NOT NULL DEFAULT current_timestamp(),
  `dclosing_date` datetime NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dvip_account`
--

INSERT INTO `dvip_account` (`id`, `dvip_id`, `duser_id`, `dduration`, `dprice`, `dstarting_date`, `dclosing_date`, `dstatus`) VALUES
(9, '482201202048', '43062020024306', '30', '2000', '2020-04-06 01:48:22', '2020-04-06 01:53:02', 'inactive'),
(10, '190904202019', '43062020024306', '30', '2000', '2020-04-06 04:19:09', '2020-05-06 04:19:09', 'inactive'),
(11, '314904202031', '43062020024306', '120', '2000', '2020-04-06 04:31:49', '2020-08-04 04:31:49', 'active'),
(12, '004208202000', '47412020124741', '30', '2000', '2020-04-28 08:00:42', '2020-05-28 08:00:42', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `dvip_categories`
--

CREATE TABLE `dvip_categories` (
  `id` int(11) NOT NULL,
  `vip_id` varchar(20) NOT NULL,
  `dmonth` varchar(100) NOT NULL,
  `ddays` varchar(20) NOT NULL,
  `dprice` varchar(20) NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dvip_categories`
--

INSERT INTO `dvip_categories` (`id`, `vip_id`, `dmonth`, `ddays`, `dprice`, `ddate`) VALUES
(1, '270920202718', 'One Month', '30', '2000', '2020-04-06 09:27:18'),
(2, '280920202847', 'Three Month', '90', '5000', '2020-04-06 09:28:47'),
(3, '290920202929', 'One Year', '365', '15000', '2020-04-06 09:29:29'),
(4, '450520204520', 'One week', '7', '1000', '2020-04-28 17:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `dwebsite_main`
--

CREATE TABLE `dwebsite_main` (
  `id` int(11) NOT NULL,
  `dname` varchar(100) NOT NULL,
  `dphone` varchar(100) NOT NULL,
  `demail` varchar(30) NOT NULL,
  `daddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dwebsite_main`
--

INSERT INTO `dwebsite_main` (`id`, `dname`, `dphone`, `demail`, `daddress`) VALUES
(1, 'Buy &amp; Bet', '+234 (0) 810 160 463', 'info@buyandbet.com', '79, Stadium Road, Rumuomasi, Port Harcourt, Nigeria');

-- --------------------------------------------------------

--
-- Table structure for table `dweb_name`
--

CREATE TABLE `dweb_name` (
  `id` int(11) NOT NULL,
  `dweb_id` varchar(20) NOT NULL,
  `dwebsite` varchar(300) NOT NULL,
  `name` varchar(300) NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dweb_name`
--

INSERT INTO `dweb_name` (`id`, `dweb_id`, `dwebsite`, `name`, `ddate`) VALUES
(1, '34092331', 'bet9ja.com', 'Bet9ja', '2020-03-17 11:08:48'),
(2, '34092331', 'betking.com', 'Betking', '2020-03-17 11:08:48'),
(3, '34092331', 'merrybet.com', 'Merrybet', '2020-03-17 15:42:17');

-- --------------------------------------------------------

--
-- Table structure for table `dwithdrawal_history`
--

CREATE TABLE `dwithdrawal_history` (
  `id` int(11) NOT NULL,
  `withdrawal_id` varchar(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `account_name` varchar(100) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `bank_name` varchar(20) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `withdrawal_status` varchar(15) NOT NULL DEFAULT 'pending',
  `ddate` datetime NOT NULL DEFAULT current_timestamp(),
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dwithdrawal_history`
--

INSERT INTO `dwithdrawal_history` (`id`, `withdrawal_id`, `user_id`, `account_name`, `account_number`, `bank_name`, `amount`, `withdrawal_status`, `ddate`, `pdate`) VALUES
(1, '541120205415', '43062020024306', 'Elefiku Young', '2068194161', 'UBA', '4000', 'paid', '2020-03-10 11:54:15', '2020-04-21 14:49:59'),
(2, '561120205632', '43062020024306', 'Elefiku Young', '2068194161', 'UBA', '1000', 'paid', '2020-03-10 11:56:32', '2020-04-21 14:49:59'),
(3, '001220200017', '43062020024306', 'Elefiku Young', '2068194161', 'UBA', '1000', 'paid', '2020-03-10 12:00:17', '2020-04-21 14:49:59'),
(4, '130320201351', '21172020092117', 'Elefiku Young', '2068194161', 'UBA', '4000', 'cancelled', '2020-04-07 15:13:51', '2020-04-21 14:49:59'),
(5, '560220205655', '43062020024306', 'Elefiku Young', '2068194161', 'UBA', '4000', 'cancelled', '2020-04-21 14:56:55', '2020-04-21 14:49:59'),
(6, '480420204822', '43062020024306', 'LUZOMA HUB', '2068194161', 'UBA', '4000', 'cancelled', '2020-04-21 04:48:22', '2020-04-22 03:50:32'),
(7, '120420201240', '2147483647', 'Elefiku Young', '2068194161', 'UBA', '1000', 'cancelled', '2020-04-22 16:12:40', '2020-04-22 15:58:21'),
(8, '150220201504', '21172020092117', 'Young Elefiku', '2068194161', 'UBA', '10000', 'paid', '2020-04-27 14:15:04', '2020-04-28 23:14:56'),
(9, '540220205448', '43062020024306', 'Elefiku Young', '2068194161', 'UBA', '2000', 'cancelled', '2020-04-30 14:54:48', '2020-04-30 14:15:00'),
(10, '070420200703', '43062020024306', 'Elefiku Young', '2068194161', 'UBA', '2000', 'pending', '2020-04-30 16:07:03', '2020-04-30 15:07:03');

-- --------------------------------------------------------

--
-- Table structure for table `funding_request`
--

CREATE TABLE `funding_request` (
  `id` int(11) NOT NULL,
  `req_id` varchar(20) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `damount` varchar(100) NOT NULL,
  `ddate` datetime NOT NULL,
  `refference_no` varchar(20) NOT NULL,
  `dstatus` varchar(10) NOT NULL DEFAULT 'pending',
  `create_date` datetime NOT NULL DEFAULT current_timestamp(),
  `pdate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `funding_request`
--

INSERT INTO `funding_request` (`id`, `req_id`, `userid`, `name`, `damount`, `ddate`, `refference_no`, `dstatus`, `create_date`, `pdate`) VALUES
(4, '12251920201912', '43062020024306', 'Elefiku Young', '4000', '2020-04-17 00:00:00', '52356467645', 'paid', '2020-04-17 12:25:19', '2020-04-22 04:23:46'),
(5, '12263720203712', '43062020024306', 'LUZOMA HUB', '9000', '2020-04-17 00:00:00', '52356467234', 'cancelled', '2020-04-17 12:26:37', '2020-04-22 04:33:10');

-- --------------------------------------------------------

--
-- Table structure for table `members_register`
--

CREATE TABLE `members_register` (
  `id` int(11) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `dname` varchar(40) DEFAULT NULL,
  `demail` varchar(30) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `dnumber` varchar(20) NOT NULL,
  `pword` varchar(60) DEFAULT NULL,
  `dcategory` varchar(30) NOT NULL DEFAULT 'Punter',
  `dvip` varchar(10) NOT NULL DEFAULT 'inactive',
  `dwallet_balance` varchar(20) NOT NULL DEFAULT '0',
  `date_registered` datetime DEFAULT current_timestamp(),
  `rstatus` varchar(20) NOT NULL DEFAULT 'offline',
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `lastlogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members_register`
--

INSERT INTO `members_register` (`id`, `userid`, `username`, `dname`, `demail`, `address`, `dnumber`, `pword`, `dcategory`, `dvip`, `dwallet_balance`, `date_registered`, `rstatus`, `status`, `lastlogin`) VALUES
(1, '43062020024306', 'DyoungDsea', 'Young Elefiku', 'youngelefiku44@gmail.com', 'Aso Rock Villa', '08061382683', '4adf7d6eebb0266197b2d52a6273865b', 'Tipster', 'active', '19600', NULL, 'offline', 'active', NULL),
(2, '49032020114903', 'Paulosky', 'Paul Elefiku', 'paulelefiku44@gmail.com', 'Aso Rock Villa, Abuja. Nigeria', '08061382683', '4adf7d6eebb0266197b2d52a6273865b', 'Tipster', 'inactive', '25200', '2020-03-12 11:49:03', 'offline', 'active', NULL),
(3, '21172020092117', 'Young', 'Young Elefiku A', 'youngelefiku@gmail.com', 'Aso rock Villa, Abuja', '08061382683', '4adf7d6eebb0266197b2d52a6273865b', 'Tipster', 'inactive', '8600', '2020-04-07 09:21:17', 'offline', 'active', NULL),
(4, '47402020124740', 'Drockies', 'Rock Monk', 'rock11@gmail.com', 'Phc', '07062142913', '9a1f30943126974075dbd4d13c8018ac', 'Tipster', 'inactive', '22000', '2020-04-08 12:47:40', 'offline', 'active', NULL),
(5, '47412020124741', 'Drock', 'Rock Monk', 'rock@gmail.com', 'Phc', '07062142913', '9a1f30943126974075dbd4d13c8018ac', 'Tipster', 'inactive', '18000', '2020-04-08 12:47:41', 'offline', 'active', NULL),
(6, '36172020103617', 'James', 'Young Jude', 'youngjude@gmail.com', 'testing', '07062142913', 'b612c055b0f2daec0c4c4e9d841f7bfd', 'Punter', 'inactive', '0', '2020-04-14 10:36:17', 'offline', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ranking`
--

CREATE TABLE `ranking` (
  `id` int(11) NOT NULL,
  `dstar_id` varchar(20) NOT NULL,
  `dstar` int(11) NOT NULL,
  `dprice` varchar(100) NOT NULL,
  `ddate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ranking`
--

INSERT INTO `ranking` (`id`, `dstar_id`, `dstar`, `dprice`, `ddate`) VALUES
(1, '000920200000', 5, '2000', '2020-03-17 09:00:00'),
(2, '020920200214', 4, '1000', '2020-03-17 09:02:14'),
(3, '020920200234', 3, '500', '2020-03-17 09:02:34'),
(4, '200120202018', 0, '0', '2020-03-19 13:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `src` varchar(200) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `src`, `content`) VALUES
(1, 'Stephen', '202003114648-1', '&lt;p&gt;i love buy and bet so much, it makes me happy always&lt;/p&gt;'),
(6, 'Young Elefiku', '', '&lt;p&gt;Buy and Bet is the best site for forecasters to be honest, higher you every day.&lt;/p&gt;');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `demail` (`demail`);

--
-- Indexes for table `admin_settings`
--
ALTER TABLE `admin_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbooking_code`
--
ALTER TABLE `dbooking_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dbronze_odd`
--
ALTER TABLE `dbronze_odd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcategory_subscriptions`
--
ALTER TABLE `dcategory_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dcontact`
--
ALTER TABLE `dcontact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgame_categories`
--
ALTER TABLE `dgame_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgame_market`
--
ALTER TABLE `dgame_market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgame_offers`
--
ALTER TABLE `dgame_offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgame_offers_list`
--
ALTER TABLE `dgame_offers_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgame_sales`
--
ALTER TABLE `dgame_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgeneral_booking`
--
ALTER TABLE `dgeneral_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dgold_odd`
--
ALTER TABLE `dgold_odd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmessage_sent`
--
ALTER TABLE `dmessage_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dmessaging`
--
ALTER TABLE `dmessaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dnewletter`
--
ALTER TABLE `dnewletter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpercentage`
--
ALTER TABLE `dpercentage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpercentage_return`
--
ALTER TABLE `dpercentage_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpools`
--
ALTER TABLE `dpools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpool_bronze`
--
ALTER TABLE `dpool_bronze`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpool_code`
--
ALTER TABLE `dpool_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpool_general`
--
ALTER TABLE `dpool_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpool_silver`
--
ALTER TABLE `dpool_silver`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpool_subscriptions`
--
ALTER TABLE `dpool_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dpromo`
--
ALTER TABLE `dpromo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dsilver_odd`
--
ALTER TABLE `dsilver_odd`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dstar_rating`
--
ALTER TABLE `dstar_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dtransaction_history`
--
ALTER TABLE `dtransaction_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvip_account`
--
ALTER TABLE `dvip_account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvip_categories`
--
ALTER TABLE `dvip_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dwebsite_main`
--
ALTER TABLE `dwebsite_main`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dweb_name`
--
ALTER TABLE `dweb_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dwithdrawal_history`
--
ALTER TABLE `dwithdrawal_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funding_request`
--
ALTER TABLE `funding_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members_register`
--
ALTER TABLE `members_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ranking`
--
ALTER TABLE `ranking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `admin_settings`
--
ALTER TABLE `admin_settings`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `dbooking_code`
--
ALTER TABLE `dbooking_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `dbronze_odd`
--
ALTER TABLE `dbronze_odd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dcategory_subscriptions`
--
ALTER TABLE `dcategory_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `dcontact`
--
ALTER TABLE `dcontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dgame_categories`
--
ALTER TABLE `dgame_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `dgame_market`
--
ALTER TABLE `dgame_market`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dgame_offers`
--
ALTER TABLE `dgame_offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dgame_offers_list`
--
ALTER TABLE `dgame_offers_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dgame_sales`
--
ALTER TABLE `dgame_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dgeneral_booking`
--
ALTER TABLE `dgeneral_booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dgold_odd`
--
ALTER TABLE `dgold_odd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dmessage_sent`
--
ALTER TABLE `dmessage_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dmessaging`
--
ALTER TABLE `dmessaging`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `dnewletter`
--
ALTER TABLE `dnewletter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dpercentage`
--
ALTER TABLE `dpercentage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dpercentage_return`
--
ALTER TABLE `dpercentage_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dpools`
--
ALTER TABLE `dpools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dpool_bronze`
--
ALTER TABLE `dpool_bronze`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dpool_code`
--
ALTER TABLE `dpool_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `dpool_general`
--
ALTER TABLE `dpool_general`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dpool_silver`
--
ALTER TABLE `dpool_silver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dpool_subscriptions`
--
ALTER TABLE `dpool_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dpromo`
--
ALTER TABLE `dpromo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dsilver_odd`
--
ALTER TABLE `dsilver_odd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dstar_rating`
--
ALTER TABLE `dstar_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `dtransaction_history`
--
ALTER TABLE `dtransaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `dvip_account`
--
ALTER TABLE `dvip_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `dvip_categories`
--
ALTER TABLE `dvip_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dwebsite_main`
--
ALTER TABLE `dwebsite_main`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dweb_name`
--
ALTER TABLE `dweb_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `dwithdrawal_history`
--
ALTER TABLE `dwithdrawal_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `funding_request`
--
ALTER TABLE `funding_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `members_register`
--
ALTER TABLE `members_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ranking`
--
ALTER TABLE `ranking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
