-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 14, 2011 at 05:13 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demos`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE IF NOT EXISTS `tbl_categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=334 ;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`category_id`, `category_name`) VALUES
(8, 'Advocate'),
(7, 'Advertising'),
(6, 'Actuary'),
(5, 'Actor'),
(9, 'Aeronautical Engineer'),
(10, 'Aerospace Industry Trades'),
(11, 'Agricultural Economist'),
(12, 'Agricultural Engineer'),
(13, 'Agricultural Extension Officer'),
(14, 'Agricultural Inspector'),
(15, 'Agricultural Technician'),
(16, 'Agriculture'),
(17, 'Agriculturist'),
(18, 'Agronomist'),
(19, 'Air Traffic Controller'),
(20, 'Ambulance Emergency'),
(21, 'Animal Scientist'),
(22, 'Anthropologist'),
(23, 'Aquatic Scientist'),
(24, 'Archaeologist'),
(25, 'Architect'),
(26, 'Architectural Technologist'),
(27, 'Archivist'),
(28, 'Area Manager'),
(29, 'Armament Fitter'),
(30, 'Armature Winder'),
(31, 'Art Editor'),
(32, 'Artist'),
(33, 'Assayer Sampler'),
(34, 'Assembly Line Worker'),
(35, 'Assistant Draughtsman'),
(36, 'Astronomer'),
(37, 'Attorney'),
(38, 'Auctioneer'),
(39, 'Auditor'),
(40, 'Automotive Body Repairer'),
(41, 'Automotive Electrician'),
(42, 'Automotive Mechinist'),
(43, 'Automotive Trimmer'),
(44, 'Babysitting Career'),
(45, 'Banking Career'),
(46, 'Beer Brewing'),
(47, 'Biochemist'),
(48, 'Biokineticist'),
(49, 'Biologist'),
(50, 'Biomedical Engineer'),
(51, 'BiomedicalTechnologist'),
(52, 'Blacksmith'),
(53, 'Boilermaker'),
(54, 'Bookbinder'),
(55, 'Bookkeeper'),
(56, 'Botanist'),
(57, 'Branch Manager'),
(58, 'Bricklayer'),
(59, 'Bus Driver'),
(60, 'Business Analyst'),
(61, 'Business Economist'),
(62, 'Butler'),
(63, 'Cabin Attendant'),
(64, 'Carpenter'),
(65, 'Cartographer'),
(66, 'Cashier'),
(67, 'Ceramics Technologist'),
(68, 'Chartered Accountant'),
(69, 'Chartered Management Accountant'),
(70, 'Chartered Secretary'),
(71, 'Chemical Engineer'),
(72, 'Chemist'),
(73, 'Chiropractor'),
(74, 'City Treasurer'),
(75, 'Civil Engineer'),
(76, 'Civil Investigator'),
(77, 'Cleaner'),
(78, 'Clergyman'),
(79, 'Clerk'),
(80, 'Clinical Engineering'),
(81, 'Clinical Technologist'),
(82, 'Clothing Designer'),
(83, 'Clothing Manager'),
(84, 'Coal Technologist'),
(85, 'Cobbler'),
(86, 'Committee Clerk'),
(87, 'Computer Industry'),
(88, 'Concrete Technician'),
(89, 'Conservation and Wildlife'),
(90, 'Construction Manager'),
(91, 'Copy Writer'),
(92, 'Correctional Services'),
(93, 'Costume Designer'),
(94, 'Crane Operator'),
(95, 'Credit Controller'),
(96, 'Crop Protection and Animal Health'),
(97, 'Customer and Excise Officer'),
(98, 'Customer Service Agent'),
(99, 'Dancer'),
(100, 'Database Administrator'),
(101, 'Data Capturer'),
(102, 'Dealer in Oriental Carpets'),
(103, 'Decor Designer'),
(104, 'Dental Assistant and Oral Hygienist'),
(105, 'Dental Technician'),
(106, 'Dental Therapist'),
(107, 'Dentist'),
(108, 'Detective'),
(109, 'Diamond Cutting'),
(110, 'Diesel Fitter'),
(111, 'Diesel loco Driver'),
(112, 'Diesel Mechanic'),
(113, 'Die-sinker and Engraver'),
(114, 'Dietician'),
(115, 'Diver'),
(116, 'DJ'),
(117, 'Domestic Appliance Mechanician'),
(118, 'Domestic Personnel'),
(119, 'Domestic radio and Television Mechanician'),
(120, 'Domestic Worker'),
(121, 'Draughtsman'),
(122, 'Driver and Stacker'),
(123, 'Earth Moving Equipment Mechanic'),
(124, 'Ecologist'),
(125, 'Economist Technician'),
(126, 'Editor'),
(127, 'Eeg Technician'),
(128, 'Electrical and Electronic Engineer'),
(129, 'Electrical Engineering Technician'),
(130, 'Electrician'),
(131, 'Electrician (Construction)'),
(132, 'Engineering'),
(133, 'Engineering Technician'),
(134, 'Entomologist'),
(135, 'Environmental Health Officer'),
(136, 'Estate Agent'),
(137, 'Explosive Expert'),
(138, 'Explosive Technologist'),
(139, 'Extractive Metallurgist'),
(140, 'Farmer'),
(141, 'Farm Foreman'),
(142, 'Farm Worker'),
(143, 'Fashion Buyer'),
(144, 'Film and Production'),
(145, 'Financial and Investment Manager'),
(146, 'Fire-Fighter'),
(147, 'Fireman at the Airport'),
(148, 'Fitter and Turner'),
(149, 'Flight Engineer'),
(150, 'Florist'),
(151, 'Food Scientist and Technologist'),
(152, 'Footwear'),
(153, 'Forester Service'),
(154, 'Funeral Director'),
(155, 'Furrier'),
(156, 'Game Ranger'),
(157, 'Geneticist'),
(158, 'Geographer'),
(159, 'Geologist'),
(160, 'Geotechnologist'),
(161, 'Goldsmith and Jeweller'),
(162, 'Grain Grader'),
(163, 'Graphic Designer'),
(164, 'Gravure machine Minder'),
(165, 'Hairdresser'),
(166, 'Herpetologist'),
(167, 'Home Economist'),
(168, 'Homoeopath'),
(169, 'Horticulturist'),
(170, 'Hospitality Industry'),
(171, 'Hospital Porter'),
(172, 'Human Resource Manager'),
(173, 'Hydrologist'),
(174, 'Ichthyologist'),
(175, 'Industrial Designer'),
(176, 'Industrial Engineer'),
(177, 'Industrial Engineering Technologist'),
(178, 'Industrial Technician'),
(179, 'Inspector'),
(180, 'Instrument Maker'),
(181, 'Insurance'),
(182, 'Interior Designer'),
(183, 'Interpreter'),
(184, 'Inventory and Store Manager'),
(185, 'Jeweler'),
(186, 'Jockey'),
(187, 'Joiner and Woodmachinist'),
(188, 'Journalist'),
(189, 'Knitter'),
(190, 'Labourer'),
(191, 'Land Surveyor'),
(192, 'Landscape Architect'),
(193, 'Law'),
(194, 'Learner Official'),
(195, 'Leather Chemist'),
(196, 'Leather Worker'),
(197, 'Lecturer'),
(198, 'Librarian'),
(199, 'Life-guard'),
(200, 'Lift Mechanic'),
(201, 'Light Delivery Van Driver'),
(202, 'Linesman'),
(203, 'Locksmith'),
(204, 'Machine Operator'),
(205, 'Machine Worker'),
(206, 'Magistrate'),
(207, 'Mail Handler'),
(208, 'Make-up Artist'),
(209, 'Management Consultant'),
(210, 'Manager'),
(211, 'Marine Biologist'),
(212, 'Marketing'),
(213, 'Marketing Manager'),
(214, 'Materials Engineer'),
(215, 'Mathematician'),
(216, 'Matron'),
(217, 'Meat Cutting Technician'),
(218, 'Mechanical Engineer'),
(219, 'Medical Doctor'),
(220, 'Medical Orthotist Prosthetist'),
(221, 'Medical Physicist'),
(222, 'Merchandise Planner'),
(223, 'Messenger'),
(224, 'Meteorological Technician'),
(225, 'Meteorologist'),
(226, 'Meter-reader'),
(227, 'Microbiologist'),
(228, 'Miner'),
(229, 'Mine Surveyor'),
(230, 'Mining Engineer'),
(231, 'Model Builder'),
(232, 'Model'),
(233, 'Motor Mechanic'),
(234, 'Musician'),
(235, 'Nature Conservator'),
(236, 'Navigating Officer'),
(237, 'Navigator'),
(238, 'Nuclear Scientist'),
(239, 'Nursing'),
(240, 'Nutritionist'),
(241, 'Occupational Therapist'),
(242, 'Oceanographer'),
(243, 'Operations Researcher'),
(244, 'Optical Dispenser'),
(245, 'Optical Technician'),
(246, 'Optometrist'),
(247, 'Ornithologist'),
(248, 'Painter and Decorator'),
(249, 'Paint Technician'),
(250, 'Paper Technologist'),
(251, 'Patent Attorney'),
(252, 'Personal Trainer'),
(253, 'Personnel Consultant'),
(254, 'Petroleum Technologist'),
(255, 'Pharmacist Assistant'),
(256, 'Pharmacist'),
(257, 'Photographer'),
(258, 'Physicist'),
(259, 'Physiologist'),
(260, 'Physiotherapist'),
(261, 'Piano Tuner'),
(262, 'Pilot'),
(263, 'Plumber'),
(264, 'Podiatrist'),
(265, 'Police Officer'),
(266, 'Post Office Clerk'),
(267, 'Power Plant Operator'),
(268, 'Private Secretary'),
(269, 'Production Manager'),
(270, 'Projectionist'),
(271, 'Project Manager'),
(272, 'Psychologist'),
(273, 'Psychometrist'),
(274, 'Public Relations Practitioner'),
(275, 'Purchasing Manager'),
(276, 'Quality Control Inspector'),
(277, 'Quantity Surveyor'),
(278, 'Radiation Protectionist'),
(279, 'Radio'),
(280, 'Radiographer'),
(281, 'Receptionist'),
(282, 'Recreation Manager'),
(283, 'Rigger'),
(284, 'Road Construction'),
(285, 'Roofer'),
(286, 'Rubber Technologist'),
(287, 'Salesperson'),
(288, 'Sales Representative'),
(289, 'Saw Operator'),
(290, 'Scale Fitter'),
(291, 'Sea Transport Worker'),
(292, 'Secretary'),
(293, 'Security Officer'),
(294, 'Sheetmetal Worker'),
(295, 'Shop Assistant'),
(296, 'Shopfitter'),
(297, 'Singer'),
(298, 'Social Worker'),
(299, 'Sociologist'),
(300, 'Soil Scientist'),
(301, 'Speech and Language Therapist'),
(302, 'Sport Manager'),
(303, 'Spray Painter'),
(304, 'Statistician'),
(305, 'Swimming Pool Superintendent'),
(306, 'Systems Analyst'),
(307, 'Tailor'),
(308, 'Taxidermist'),
(309, 'Teacher'),
(310, 'Technical Illustrator'),
(311, 'Technical Writer'),
(312, 'Teller'),
(313, 'Terminologist'),
(314, 'Textile Designer'),
(315, 'Theatre Technology'),
(316, 'Tourism Manager'),
(317, 'Traffic Officer'),
(318, 'Translator'),
(319, 'Travel Agent'),
(320, 'Typist'),
(321, 'Valuer and Appraiser'),
(322, 'Vehicle Driver'),
(323, 'Veterinary Nurse'),
(324, 'Veterinary Surgeon'),
(325, 'Viticulturist'),
(326, 'Watchmaker'),
(327, 'Weather Observer'),
(328, 'Weaver'),
(329, 'Welder'),
(330, 'Wood Scientist'),
(331, 'Wood Technologist'),
(332, 'Yard Official'),
(333, 'Zoologist');
