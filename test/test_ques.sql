-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2015 at 12:16 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aadhaaric_licence`
--

-- --------------------------------------------------------

--
-- Table structure for table `test_ques`
--

CREATE TABLE IF NOT EXISTS `test_ques` (
`id` int(11) NOT NULL,
  `question` text NOT NULL,
  `pic` varchar(500) DEFAULT NULL,
  `a` text NOT NULL,
  `b` text NOT NULL,
  `c` text NOT NULL,
  `ans` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `test_ques`
--

INSERT INTO `test_ques` (`id`, `question`, `pic`, `a`, `b`, `c`, `ans`) VALUES
(1, 'Near a pedestrian crossing, when the pedestrians are waiting to cross the road, you should', NULL, 'Sound horn and proceed', 'Slow down, sound horn and pass', 'Stop the vehicle and wait till the pedestrians cross the road and then proceed', 'c'),
(2, 'The following sign represents:-', 'img/ques2.jpg', 'Stop', 'No parking', 'Hospital ahead', 'a'),
(3, 'You are approaching a narrow bridge, another vehicle is about to enter the bridge from opposite side you\r\nshould', NULL, 'Increase the speed and try to cross the bridge as fast as possible', 'Put on the head light and pass the bridge', 'Wait till the other vehicle crosses the bridge and then proceed', 'c'),
(4, 'The following sign represents', 'img/ques4.jpg', 'Keep left', 'There is no road to the left', 'Compulsory turn left', 'c'),
(5, 'When a vehicle is involved in an accident causing injury to any person', NULL, 'Take the vehicle to the nearest police station and report the accident', 'Stop the vehicle and report to the police station', 'Take all reasonable steps to secure medical attention to the injured and report to the nearestpolice', 'c'),
(6, 'The following sign represents', 'img/ques6.jpg', 'Give way', 'Hospital ahead', 'Traffic island ahead', 'a'),
(7, 'On a road designated as one way', NULL, 'Parking is prohibited', 'Overtaking is prohibited', 'Should not drive in reverse gear', 'c'),
(8, 'The following sign represents', 'img/ques8.jpg', 'No entry', 'One way', 'Speed limit ends', 'b'),
(9, 'You can overtake a vehicle in front', NULL, 'Through the right side of that vehicle', 'Through the left side', 'Through the left side, if the road is wide', 'a'),
(10, 'The following sign represents', 'img/ques10.jpg', 'Right turn prohibited', 'Sharp curve to the right', 'U-turn prohibited', 'c'),
(12, 'When a vehicle approaches an unguarded railway level crossing, before crossing it, the driver shall', NULL, 'Stop the vehicle on the left side of the road, get down from the vehicle, go to the railway track,and\r\nensure that no train or trolley is coming from either side', 'Sound horn and cross the track as fast as possible', 'Wait till the train passes', 'a'),
(13, 'The following sign represents', 'img/ques12.jpg', 'Pedestrian crossing', 'Pedestrians may enter', 'Pedestrians prohibited', 'a'),
(14, 'How can you distinguish a transport vehicle.', NULL, 'By looking at the tyre size.', 'By colour of the vehicle.', 'By looking at the number plate of the vehicle.', 'c'),
(15, 'The following sign represents', 'img/ques14.jpg', 'Keep right side', 'Parking on the right allowed', 'Compulsory turn to right', 'b'),
(16, 'Validity of learners licence', NULL, 'Validity of learners licence', '6 months', '30 days', 'b'),
(17, 'The following sign represents', 'img/ques16.jpg', 'U- Turn prohibited', 'Right turn prohibited', 'Overtaking through left prohibited', 'b'),
(18, 'In a road without footpath, the pedestrians', NULL, 'Should walk on the left side of the road', 'Should walk on the right side of the road', 'May walk on either side of the road', 'b'),
(19, 'The following sign represents', 'img/ques18.jpg', 'Horn prohibited', 'Compulsory sound horn', 'May sound horn', 'a'),
(20, 'Free passage should be given to the following types of vehicles', NULL, 'Police vehicles.\r\n', 'Ambulance and fire service vehicles\r\n', 'Express, Super Express buses', 'b'),
(21, 'The following sign represents', 'img/ques20.jpg', 'Roads on both sides in front', 'Narrow bridge ahead', 'Narrow road ahead', 'b'),
(22, 'Vehicles proceeding from opposite direction should be allowed to pass through..?', NULL, 'Your right side', 'Your left side', 'The convenient side', 'a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `test_ques`
--
ALTER TABLE `test_ques`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `test_ques`
--
ALTER TABLE `test_ques`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
