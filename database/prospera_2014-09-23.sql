-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 22, 2014 at 07:08 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prospera`
--
CREATE DATABASE IF NOT EXISTS `prospera` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `prospera`;

-- --------------------------------------------------------

--
-- Table structure for table `agency_represent_contries`
--

CREATE TABLE IF NOT EXISTS `agency_represent_contries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `agency_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `associate_agency`
--

CREATE TABLE IF NOT EXISTS `associate_agency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `agency` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `commission_percentage` int(11) NOT NULL,
  `application_fee` decimal(10,2) NOT NULL,
  `service_charge` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `associate_agency`
--

INSERT INTO `associate_agency` (`id`, `country_id`, `code`, `agency`, `description`, `contact_person`, `address`, `email_id`, `phone1`, `phone2`, `commission_percentage`, `application_fee`, `service_charge`) VALUES
(1, 7, '898', 'sffasf', 'sfsasds', 'sadfasascasac', 'asascascassas a asd', 'asdasd@asasd.asd', '9890808', '80808', 89, '998.00', '89.00');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `branch_name`, `description`, `country_id`) VALUES
(4, '445566', 'hjkhkj', 11);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) DEFAULT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country` varchar(50) NOT NULL,
  `capital` varchar(100) NOT NULL,
  `currency_name` varchar(50) NOT NULL,
  `currency` varchar(5) NOT NULL,
  `show_in_list` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `country` (`country`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=211 ;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `country`, `capital`, `currency_name`, `currency`, `show_in_list`) VALUES
(1, 'Afghanistann', 'Kabull', 'Afghan afghanii', 'AFNN', 1),
(2, 'Albania', 'Tirane', 'Albanian lek', 'ALL', 1),
(3, 'Algeria', 'Algiers', 'Algerian dinar', 'DZD', 0),
(4, 'Andorra', 'Andorra la Vella', 'European euro', 'EUR', 0),
(5, 'Angola', 'Luanda', 'Angolan kwanza', 'AOA', 0),
(6, 'Anguilla', '', 'East Caribbean dollar', 'XCD', 0),
(7, 'Antigua and Barbuda', 'Saint John''s', 'East Caribbean dollar', 'XCD', 0),
(8, 'Argentina', 'Buenos Aires', 'Argentine peso', 'ARS', 0),
(9, 'Armenia', 'Yerevan', 'Armenian dram', 'AMD', 0),
(10, 'Aruba', '', 'Aruban florin', 'AWG', 0),
(11, 'Australia', 'Canberra', 'Australian dollar', 'AUD', 0),
(12, 'Austria', 'Vienna', 'European euro', 'EUR', 0),
(13, 'Azerbaijan', 'Baku', 'Azerbaijani manat', 'AZN', 0),
(14, 'Bahamas', 'Nassau', 'Bahamian dollar', 'BSD', 0),
(15, 'Bahrain', 'Manama', 'Bahraini dinar', 'BHD', 0),
(16, 'Bangladesh', 'Dhaka', 'Bangladeshi taka', 'BDT', 0),
(17, 'Barbados', 'Bridgetown', 'Barbadian dollar', 'BBD', 0),
(18, 'Belarus', 'Minsk', 'Belarusian ruble', 'BYR', 0),
(19, 'Belgium', 'Brussels', 'European euro', 'EUR', 0),
(20, 'Belize', 'Belmopan', 'Belize dollar', 'BZD', 0),
(21, 'Benin', 'Porto-Novo', 'West African CFA franc', 'XOF', 0),
(22, 'Bhutan', 'Thimphu', 'Bhutanese ngultrum', 'BTN', 0),
(23, 'Bolivia', 'Sucre (constitutional)/ La Paz (administrative)', 'Bolivian boliviano', 'BOB', 0),
(24, 'Bosnia-Herzegovina', 'Sarajevo', 'Bosnia and Herzegovina konvertibilna marka', 'BAM', 0),
(25, 'Botswana', 'Gaborone', 'Botswana pula', 'BWP', 0),
(26, 'Brazil', 'Brasilia', 'Brazilian real', 'BRL', 0),
(27, 'Brunei', 'Bandar Seri Begawan', 'Brunei dollar', 'BND', 0),
(28, 'Bulgaria', 'Sofia', 'Bulgarian lev', 'BGN', 0),
(29, 'Burkina Faso', 'Ouagadougou', 'West African CFA franc', 'XOF', 0),
(30, 'Burundi', 'Bujumbura', 'Burundi franc', 'BIF', 0),
(31, 'Cambodia', 'Phnom Penh', 'Cambodian riel', 'KHR', 0),
(32, 'Cameroon', 'Yaounde', 'Central African CFA franc', 'XAF', 0),
(33, 'Canada', 'Ottawa', 'Canadian dollar', 'CAD', 0),
(34, 'Cape Verde', 'Praia', 'Cape Verdean escudo', 'CVE', 0),
(35, 'Cayman Islands', '', 'Cayman Islands dollar', 'KYD', 0),
(36, 'Central African Republic', 'Bangui', 'Central African CFA franc', 'XAF', 0),
(37, 'Chad', 'N''Djamena', 'Central African CFA franc', 'XAF', 0),
(38, 'Chile', 'Santiago', 'Chilean peso', 'CLP', 0),
(39, 'China', 'Beijing', 'Chinese renminbi', 'CNY', 0),
(40, 'Colombia', 'Bogota', 'Colombian peso', 'COP', 0),
(41, 'Comoros', 'Moroni', 'Comorian franc', 'KMF', 0),
(42, 'Congo', 'Brazzaville', 'Central African CFA franc', 'XAF', 0),
(43, 'Congo Democratic Republic', 'Kinshasa', 'Congolese franc', 'CDF', 0),
(44, 'Costa Rica', 'San Jose', 'Costa Rican colon', 'CRC', 0),
(45, 'Côte d''Ivoire', 'Yamoussoukro', 'West African CFA franc', 'XOF', 0),
(46, 'Croatia', 'Zagreb', 'Croatian kuna', 'HRK', 0),
(47, 'Cuba', 'Havana', 'Cuban peso', 'CUC', 0),
(48, 'Cyprus', 'Nicosia', 'European euro', 'EUR', 0),
(49, 'Czech Republic', 'Prague', 'Czech koruna', 'CZK', 0),
(50, 'Denmark', 'Copenhagen', 'Danish krone', 'DKK', 0),
(51, 'Djibouti', 'Djibouti', 'Djiboutian franc', 'DJF', 0),
(52, 'Dominica', 'Roseau', 'East Caribbean dollar', 'XCD', 0),
(53, 'Dominican Republic', 'Santo Domingo', 'Dominican peso', 'DOP', 0),
(54, 'East Timor', 'Dili', 'uses the U.S. Dollar', 'USD', 0),
(55, 'Ecuador', 'Quito', 'uses the U.S. Dollar', 'USD', 0),
(56, 'Egypt', 'Cairo', 'Egyptian pound', 'EGP', 0),
(57, 'El Salvador', 'San Salvador', 'uses the U.S. Dollar', 'USD', 0),
(58, 'Equatorial Guinea', 'Malabo', 'Central African CFA franc', 'GQE', 0),
(59, 'Eritrea', 'Asmara', 'Eritrean nakfa', 'ERN', 0),
(60, 'Estonia', 'Tallinn', 'Estonian kroon', 'EEK', 0),
(61, 'Ethiopia', 'Addis Ababa', 'Ethiopian birr', 'ETB', 0),
(62, 'Falkland Islands', '', 'Falkland Islands pound', 'FKP', 0),
(63, 'Fiji', 'Suva', 'Fijian dollar', 'FJD', 0),
(64, 'Finland', 'Helsinki', 'European euro', 'EUR', 0),
(65, 'France', 'Paris', 'European euro', 'EUR', 0),
(66, 'French Polynesia', '', 'CFP franc', 'XPF', 0),
(67, 'Gabon', 'Libreville', 'Central African CFA franc', 'XAF', 0),
(68, 'Gambia', 'Banjul', 'Gambian dalasi', 'GMD', 0),
(69, 'Georgia', 'Tbilisi', 'Georgian lari', 'GEL', 0),
(70, 'Germany', 'Berlin', 'European euro', 'EUR', 0),
(71, 'Ghana', 'Accra', 'Ghanaian cedi', 'GHS', 0),
(72, 'Gibraltar', '', 'Gibraltar pound', 'GIP', 0),
(73, 'Greece', 'Athens', 'European euro', 'EUR', 0),
(74, 'Grenada', 'Saint George''s', 'East Caribbean dollar', 'XCD', 0),
(75, 'Guatemala', 'Guatemala City', 'Guatemalan quetzal', 'GTQ', 0),
(76, 'Guinea', 'Conakry', 'Guinean franc', 'GNF', 0),
(77, 'Guinea-Bissau', 'Bissau', 'West African CFA franc', 'XOF', 0),
(78, 'Guyana', 'Georgetown', 'Guyanese dollar', 'GYD', 0),
(79, 'Haiti', 'Port-au-Prince', 'Haitian gourde', 'HTG', 0),
(80, 'Honduras', 'Tegucigalpa', 'Honduran lempira', 'HNL', 0),
(81, 'Hong Kong', '', 'Hong Kong dollar', 'HKD', 0),
(82, 'Hungary', 'Budapest', 'Hungarian forint', 'HUF', 0),
(83, 'Iceland', 'Reykjavik', 'Icelandic króna', 'ISK', 0),
(84, 'India', 'New Delhi', 'Indian rupee', 'INR', 0),
(85, 'Indonesia', 'Jakarta', 'Indonesian rupiah', 'IDR', 0),
(86, 'International Monetary Fund', '', 'Special Drawing Rights', 'XDR', 0),
(87, 'Iran', 'Tehran', 'Iranian rial', 'IRR', 0),
(88, 'Iraq', 'Baghdad', 'Iraqi dinar', 'IQD', 0),
(89, 'Ireland', 'Dublin', 'European euro', 'EUR', 0),
(90, 'Israel', 'Jerusalem', 'Israeli new sheqel', 'ILS', 0),
(91, 'Italy', 'Rome', 'European euro', 'EUR', 0),
(92, 'Jamaica', 'Kingston', 'Jamaican dollar', 'JMD', 0),
(93, 'Japan', 'Tokyo', 'Japanese yen', 'JPY', 0),
(94, 'Jordan', 'Amman', 'Jordanian dinar', 'JOD', 0),
(95, 'Kazakhstan', 'Astana', 'Kazakhstani tenge', 'KZT', 0),
(96, 'Kenya', 'Nairobi', 'Kenyan shilling', 'KES', 0),
(97, 'Kiribati', 'Tarawa Atoll', 'Australian dollar', 'AUD', 0),
(98, 'Korea North', 'Pyongyang', 'North Korean won', 'KPW', 0),
(99, 'Korea South', 'Seoul', 'South Korean won', 'KRW', 0),
(100, 'Kuwait', 'Kuwait City', 'Kuwaiti dinar', 'KWD', 0),
(101, 'Kyrgyzstan', 'Bishkek', 'Kyrgyzstani som', 'KGS', 0),
(102, 'Laos', 'Vientiane', 'Lao kip', 'LAK', 0),
(103, 'Latvia', 'Riga', 'European euro', 'EUR', 0),
(104, 'Lebanon', 'Beirut', 'Lebanese lira', 'LBP', 0),
(105, 'Lesotho', 'Maseru', 'Lesotho loti', 'LSL', 0),
(106, 'Liberia', 'Monrovia', 'Liberian dollar', 'LRD', 0),
(107, 'Libya', 'Tripoli', 'Libyan dinar', 'LYD', 0),
(108, 'Liechtenstein', 'Vaduz', 'uses the Swiss Franc', 'CHF', 0),
(109, 'Lithuania', 'Vilnius', 'Lithuanian litas', 'LTL', 0),
(110, 'Luxembourg', 'Luxembourg', 'European euro', 'EUR', 0),
(111, 'Macau', '', 'Macanese pataca', 'MOP', 0),
(112, 'Macedonia (Former Yug. Rep.)', 'Skopje', 'Macedonian denar', 'MKD', 0),
(113, 'Madagascar', 'Antananarivo', 'Malagasy ariary', 'MGA', 0),
(114, 'Malawi', 'Lilongwe', 'Malawian kwacha', 'MWK', 0),
(115, 'Malaysia', 'Kuala Lumpur', 'Malaysian ringgit', 'MYR', 0),
(116, 'Maldives', 'Male', 'Maldivian rufiyaa', 'MVR', 0),
(117, 'Mali', 'Bamako', 'West African CFA franc', 'XOF', 0),
(118, 'Malta', 'Valletta', 'European Euro', 'EUR', 0),
(119, 'Mauritania', 'Nouakchott', 'Mauritanian ouguiya', 'MRO', 0),
(120, 'Mauritius', 'Port Louis', 'Mauritian rupee', 'MUR', 0),
(121, 'Mexico', 'Mexico City', 'Mexican peso', 'MXN', 0),
(122, 'Micronesia', 'Palikir', 'uses the U.S. Dollar', 'USD', 0),
(123, 'Moldova', 'Chisinau', 'Moldovan leu', 'MDL', 0),
(124, 'Monaco', 'Monaco', 'European Euro', 'EUR', 0),
(125, 'Mongolia', 'Ulaanbaatar', 'Mongolian tugrik', 'MNT', 0),
(126, 'Montenegro', 'Podgorica', 'European Euro', 'EUR', 0),
(127, 'Montserrat', '', 'East Caribbean dollar', 'XCD', 0),
(128, 'Morocco', 'Rabat', 'Moroccan dirham', 'MAD', 0),
(129, 'Mozambique', 'Maputo', 'Mozambican metical', 'MZM', 0),
(130, 'Myanmar', 'Naypyidaw', 'Myanma kyat', 'MMK', 0),
(131, 'Namibia', 'Windhoek', 'Namibian dollar', 'NAD', 0),
(132, 'Nauru', 'Yaren (de facto)', 'Australian dollar', 'AUD', 0),
(133, 'Nepal', 'Kathmandu', 'Nepalese rupee', 'NPR', 0),
(134, 'Netherlands Antilles', '', 'Netherlands Antillean gulden', 'ANG', 0),
(135, 'Netherlands', 'Amsterdam', 'European euro', 'EUR', 0),
(136, 'New Caledonia', '', 'CFP franc', 'XPF', 0),
(137, 'New Zealand', 'Wellington', 'New Zealand dollar', 'NZD', 0),
(138, 'Nicaragua', 'Managua', 'Nicaraguan cordoba', 'NIO', 0),
(139, 'Niger', 'Niamey', 'West African CFA franc', 'XOF', 0),
(140, 'Nigeria', 'Abuja', 'Nigerian naira', 'NGN', 0),
(141, 'Norway', 'Oslo', 'Norwegian krone', 'NOK', 0),
(142, 'Oman', 'Muscat', 'Omani rial', 'OMR', 0),
(143, 'Pakistan', 'Islamabad', 'Pakistani rupee', 'PKR', 0),
(144, 'Palau', 'Melekeok', 'uses the U.S. Dollar', 'USD', 0),
(145, 'Panama', 'Panama City', 'Panamanian balboa', 'PAB', 0),
(146, 'Panama Canal Zone', '', 'uses the U.S. Dollar', 'USD', 0),
(147, 'Papua New Guinea', 'Port Moresby', 'Papua New Guinean kina', 'PGK', 0),
(148, 'Paraguay', 'Asuncion', 'Paraguayan guarani', 'PYG', 0),
(149, 'Peru', 'Lima', 'Peruvian nuevo sol', 'PEN', 0),
(150, 'Philippines', 'Manila', 'Philippine peso', 'PHP', 0),
(151, 'Poland', 'Warsaw', 'Polish zloty', 'PLN', 0),
(152, 'Portugal', 'Lisbon', 'European euro', 'EUR', 0),
(153, 'Puerto Rico', '', 'uses the U.S. Dollar', 'USD', 0),
(154, 'Qatar', 'Doha', 'Qatari riyal', 'QAR', 0),
(155, 'Romania', 'Bucharest', 'Romanian leu', 'RON', 0),
(156, 'Russia', 'Moscow', 'Russian ruble', 'RUB', 0),
(157, 'Rwanda', 'Kigali', 'Rwandan franc', 'RWF', 0),
(158, 'Saint Helena', '', 'Saint Helena pound', 'SHP', 0),
(159, 'Saint Kitts and Nevis', 'Basseterre', 'East Caribbean dollar', 'XCD', 0),
(160, 'Saint Lucia', 'Castries', 'East Caribbean dollar', 'XCD', 0),
(161, 'Saint Vincent and the Grenadines', 'Kingstown', 'East Caribbean dollar', 'XCD', 0),
(162, 'Samoa (Western)', 'Apia', 'Samoan tala', 'WST', 0),
(163, 'San Marino', 'San Marino', 'European euro', 'EUR', 0),
(164, 'Sao Tome and Principe', 'Sao Tome', 'Sao Tome and Principe dobra', 'STD', 0),
(165, 'Saudi Arabia', 'Riyadh', 'Saudi riyal', 'SAR', 0),
(166, 'Senegal', 'Dakar', 'West African CFA franc', 'XOF', 0),
(167, 'Serbia', 'Belgrade', 'Serbian dinar', 'RSD', 0),
(168, 'Seychelles', 'Victoria', 'Seychellois rupee', 'SCR', 0),
(169, 'Sierra Leone', 'Freetown', 'Sierra Leonean leone', 'SLL', 0),
(170, 'Singapore', 'Singapore', 'Singapore dollar', 'SGD', 0),
(171, 'Slovakia', 'Bratislava', 'Slovak koruna', 'SKK', 0),
(172, 'Slovenia', 'Ljubljana', 'European euro', 'EUR', 0),
(173, 'Solomon Islands', 'Honiara', 'Solomon Islands dollar', 'SBD', 0),
(174, 'Somalia', 'Mogadishu', 'Somali shilling', 'SOS', 0),
(175, 'South Africa', 'Pretoria (administrative)/ Cape Town (legislative)/ Bloemfontein (judiciary)', 'South African rand', 'ZAR', 0),
(176, 'South Sudan', 'Juba', 'Sudanese pound', 'SDG', 0),
(177, 'Spain', 'Madrid', 'European euro', 'EUR', 0),
(178, 'Sri Lanka', 'Sri Jayewardenepura Kotte (administrative)/ Colombo (trade)', 'Sri Lankan rupee', 'LKR', 0),
(179, 'Sudan', 'Khartoum', 'Sudanese pound', 'SDG', 0),
(180, 'Suriname', 'Paramaribo', 'Surinamese dollar', 'SRD', 0),
(181, 'Swaziland', 'Mbabane(Administrative) / Lobamba (Royal and Legislative)', 'Swazi lilangeni', 'SZL', 0),
(182, 'Sweden', 'Stockholm', 'Swedish krona', 'SEK', 0),
(183, 'Switzerland', 'Bern', 'Swiss franc', 'CHF', 0),
(184, 'Syria', 'Damascus', 'Syrian pound', 'SYP', 0),
(185, 'Taiwan', 'Taipei', 'New Taiwan dollar', 'TWD', 0),
(186, 'Tajikistan', 'Dushanbe', 'Tajikistani somoni', 'TJS', 0),
(187, 'Tanzania', 'Dodoma (administrative); Dar es Salaam', 'Tanzanian shilling', 'TZS', 0),
(188, 'Thailand', 'Bangkok', 'Thai baht', 'THB', 0),
(189, 'Togo', 'Lome', 'West African CFA franc', 'XOF', 0),
(190, 'Tonga', 'Nuku''alofa', 'Paanga', 'TOP', 0),
(191, 'Trinidad and Tobago', 'Port-of-Spain', 'Trinidad and Tobago dollar', 'TTD', 0),
(192, 'Tunisia', 'Tunis', 'Tunisian dinar', 'TND', 0),
(193, 'Turkey', 'Ankara', 'Turkish new lira', 'TRY', 0),
(194, 'Turkmenistan', 'Ashgabat', 'Turkmen manat', 'TMM', 0),
(195, 'Tuvalu', 'Funafuti province', 'Australian dollar', 'AUD', 0),
(196, 'Uganda', 'Kampala', 'Ugandan shilling', 'UGX', 0),
(197, 'Ukraine', 'Kyiv', 'Ukrainian hryvnia', 'UAH', 0),
(198, 'United Arab Emirates', 'Abu Dhabi', 'UAE dirham', 'AED', 0),
(199, 'United Kingdom', 'London', 'British pound', 'GBP', 0),
(200, 'United States of America', 'Washington D.C.', 'United States dollar', 'USD', 0),
(201, 'Uruguay', 'Montevideo', 'Uruguayan peso', 'UYU', 0),
(202, 'Uzbekistan', 'Tashkent', 'Uzbekistani som', 'UZS', 0),
(203, 'Vanuatu', 'Port-Vila', 'Vanuatu vatu', 'VUV', 0),
(204, 'Vatican City (Holy See)', 'Vatican City', 'European euro', 'EUR', 0),
(205, 'Venezuela', 'Caracas', 'Venezuelan bolivar', 'VEB', 0),
(206, 'Vietnam', 'Hanoi', 'Vietnamese dong', 'VND', 0),
(207, 'Wallis and Futuna Islands', '', 'CFP franc', 'XPF', 0),
(208, 'Yemen', 'Sanaa', 'Yemeni rial', 'YER', 0),
(209, 'Zambia', 'Lusaka', 'Zambian kwacha', 'ZMK', 0),
(210, 'Zimbabwe', 'Harare', 'Zimbabwean dollar', 'ZWD', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country_checklist`
--

CREATE TABLE IF NOT EXISTS `country_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dept_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=44 ;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `dept_name`, `description`) VALUES
(38, 'dept', 'sdf'),
(39, 'dept', 'sdf'),
(40, 'lkl', 'klk'),
(41, 'z', 'zc'),
(42, 'asd', 'asd'),
(43, 'dddddddddd', 'ddd');

-- --------------------------------------------------------

--
-- Table structure for table `document_master`
--

CREATE TABLE IF NOT EXISTS `document_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_type` int(11) NOT NULL,
  `ref_id` int(11) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL,
  `amount` float(12,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_type`
--

CREATE TABLE IF NOT EXISTS `document_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `document_type`
--

INSERT INTO `document_type` (`id`, `doc_name`) VALUES
(1, 'Registration'),
(2, 'Invoice'),
(3, 'Expense');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_course_interested`
--

CREATE TABLE IF NOT EXISTS `enquiry_course_interested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) NOT NULL,
  `course_interested` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_master`
--

CREATE TABLE IF NOT EXISTS `enquiry_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `enquiry_mode` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `pincode` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `source` int(11) NOT NULL,
  `source_description` varchar(100) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `source` (`source`),
  KEY `enquiry_mode` (`enquiry_mode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_modes`
--

CREATE TABLE IF NOT EXISTS `enquiry_modes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mode_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `enquiry_modes`
--

INSERT INTO `enquiry_modes` (`id`, `mode_name`) VALUES
(1, 'Telephone'),
(2, 'Email'),
(3, 'Walk in');

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_prefered_countries`
--

CREATE TABLE IF NOT EXISTS `enquiry_prefered_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enqury_test_prepare`
--

CREATE TABLE IF NOT EXISTS `enqury_test_prepare` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) NOT NULL,
  `toffel` int(11) NOT NULL,
  `ielts` int(11) NOT NULL,
  `gmat` int(11) NOT NULL,
  `gre` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `started_coaching` tinyint(1) NOT NULL,
  `looking_for_coaching` tinyint(1) NOT NULL,
  `looking_for_waier` tinyint(1) NOT NULL,
  `regular_or_fast_track` varchar(200) NOT NULL,
  `work_experiance` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `enruiry_education`
--

CREATE TABLE IF NOT EXISTS `enruiry_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `passout_year` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `follow_ups`
--

CREATE TABLE IF NOT EXISTS `follow_ups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) NOT NULL,
  `ref_type` char(1) NOT NULL,
  `date` datetime NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `when` datetime NOT NULL,
  `comments` varchar(500) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_master`
--

CREATE TABLE IF NOT EXISTS `invoice_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ref_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `agency_id` int(11) NOT NULL DEFAULT '0',
  `university_id` int(11) NOT NULL DEFAULT '0',
  `amount` float(12,2) NOT NULL,
  `description` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(45) NOT NULL,
  `module_handle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `module_name`, `module_handle`) VALUES
(1, 'User role', 'user_role'),
(2, 'Branches', 'branches'),
(3, 'Departments', 'departments'),
(4, 'User', 'user'),
(5, 'Country', 'country'),
(6, 'Universities', 'Universities'),
(7, 'Associate agency', 'associate_agency'),
(8, 'University courses', 'University_courses'),
(9, 'Enquiries', 'enquiries');

-- --------------------------------------------------------

--
-- Table structure for table `publicity_source`
--

CREATE TABLE IF NOT EXISTS `publicity_source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `publicity_source`
--

INSERT INTO `publicity_source` (`id`, `source`) VALUES
(1, 'News paper ads'),
(2, 'Friends request'),
(3, 'Social media'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `receipts`
--

CREATE TABLE IF NOT EXISTS `receipts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `doc_id` int(11) NOT NULL,
  `doc_date` datetime NOT NULL,
  `doc_amount` float(12,2) NOT NULL,
  `name` varchar(250) NOT NULL,
  `amount` float(12,2) NOT NULL,
  `narration` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registration_master`
--

CREATE TABLE IF NOT EXISTS `registration_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `enquiry_id` int(11) NOT NULL DEFAULT '0',
  `enquiry_mode` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country_id` int(11) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `source` int(11) NOT NULL,
  `source_description` varchar(100) NOT NULL,
  `discription` varchar(1000) NOT NULL,
  `total_fee` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  `comments` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `registration_status`
--

CREATE TABLE IF NOT EXISTS `registration_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `registration_status`
--

INSERT INTO `registration_status` (`id`, `status`) VALUES
(1, 'Send to University'),
(2, 'Send to Agency'),
(3, 'Varification Completed'),
(4, 'Completed');

-- --------------------------------------------------------

--
-- Table structure for table `reg_course_interested`
--

CREATE TABLE IF NOT EXISTS `reg_course_interested` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `course_interested` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reg_education`
--

CREATE TABLE IF NOT EXISTS `reg_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `board` varchar(100) NOT NULL,
  `institution` varchar(100) NOT NULL,
  `passout_year` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reg_prefered_countries`
--

CREATE TABLE IF NOT EXISTS `reg_prefered_countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reg_test_preparation`
--

CREATE TABLE IF NOT EXISTS `reg_test_preparation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `toffel` int(11) NOT NULL,
  `ielts` int(11) NOT NULL,
  `gmat` int(11) NOT NULL,
  `gre` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `started_coaching` tinyint(1) NOT NULL,
  `looking_for_coaching` tinyint(1) NOT NULL,
  `looking_for_waier` tinyint(1) NOT NULL,
  `regular_or_fasttrack` varchar(50) NOT NULL,
  `work_experiance` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

CREATE TABLE IF NOT EXISTS `role_permission` (
  `id` int(11) NOT NULL,
  `permission` varchar(45) NOT NULL,
  `module` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_permission`
--

INSERT INTO `role_permission` (`id`, `permission`, `module`) VALUES
(1, 'add User role', ' User role'),
(1, 'add Associate agency', ' Associate agency'),
(3, 'add User role', ' User role'),
(3, 'add Associate agency', ' Associate agency'),
(4, 'add User role', ' User role'),
(4, 'edit Universities', ' Universities');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE IF NOT EXISTS `task` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `when` datetime NOT NULL,
  `assigned_by` int(11) NOT NULL,
  `assigned_to` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `description`, `when`, `assigned_by`, `assigned_to`, `status`, `created_date`) VALUES
(6, '5rttr', 'rttrtr', '2014-09-02 10:00:00', 2, 3, 2, '2014-09-22 00:00:00'),
(7, 'JOby Task', 'ansdlkh /adb asd', '2014-09-11 12:00:00', 2, 1, 1, '2014-09-22 00:00:00'),
(8, 'asdasd', 'asdasdasd', '2014-09-17 21:43:00', 2, 1, 1, '2014-09-22 00:00:00'),
(9, 'Aiswarya', 'asdasd', '2014-09-26 01:00:00', 2, 3, 2, '2014-09-22 00:00:00'),
(10, 'My self', 'asdasd', '2016-03-04 02:01:00', 3, 3, 1, '2014-09-22 00:00:00'),
(11, 'asdasd', 'asdasd', '2014-01-01 01:00:00', 1, 2, 2, '2014-09-22 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `task_history`
--

CREATE TABLE IF NOT EXISTS `task_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `task_status` int(11) NOT NULL,
  `comments` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `task_history`
--

INSERT INTO `task_history` (`id`, `task_id`, `created_date`, `task_status`, `comments`) VALUES
(1, 6, '2014-09-22 00:00:00', 0, 'asdasdasd'),
(2, 6, '2014-09-22 06:27:53', 0, 'asdasdasd asf asdf\r\nasd f\r\nsda f\r\nadsf'),
(3, 6, '2014-09-22 06:29:37', 0, 'aasdasdasd'),
(4, 6, '2014-09-22 06:29:48', 0, '[removed]'),
(5, 6, '2014-09-22 06:38:49', 0, 'u;asldjnasd;nasd'),
(6, 6, '2014-09-22 06:39:20', 0, 'called but not answered'),
(7, 6, '2014-09-22 06:39:42', 0, 'call pick up, talked abt offer'),
(8, 6, '2014-09-22 06:50:24', 0, 'asdasd'),
(9, 6, '2014-09-22 06:51:39', 0, 'asdasdasdas'),
(10, 6, '2014-09-22 06:52:07', 0, 'asdasdasd'),
(11, 6, '2014-09-22 06:52:22', 0, 'asdasd'),
(12, 6, '2014-09-22 06:52:59', 0, 'asdasdsd'),
(13, 6, '2014-09-22 06:53:52', 0, 'asdasdasd'),
(14, 6, '2014-09-22 06:54:45', 0, 'asdasd'),
(15, 6, '2014-09-22 06:56:49', 0, 'asdasd'),
(16, 6, '2014-09-22 06:58:18', 0, 'sdfdfsdf'),
(17, 6, '2014-09-22 07:01:26', 4, 'asdasd'),
(18, 6, '2014-09-22 07:02:47', 4, 'zxczxc'),
(19, 6, '2014-09-22 07:03:10', 3, 'zxczxczxc'),
(20, 6, '2014-09-22 07:03:20', 2, 'zxczxc'),
(21, 11, '2014-09-22 07:05:36', 2, 'asdasdasdasd');

-- --------------------------------------------------------

--
-- Table structure for table `task_status`
--

CREATE TABLE IF NOT EXISTS `task_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `task_status`
--

INSERT INTO `task_status` (`id`, `status`) VALUES
(1, 'Assigned'),
(2, 'Closed'),
(3, 'Postponed'),
(4, 'ReOpned');

-- --------------------------------------------------------

--
-- Table structure for table `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `university` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone1` varchar(100) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `commission_percentage` int(11) NOT NULL,
  `application_fee` decimal(10,2) NOT NULL,
  `service_charge` decimal(10,2) NOT NULL,
  UNIQUE KEY `code` (`code`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `university`
--

INSERT INTO `university` (`id`, `country_id`, `code`, `university`, `description`, `contact_person`, `address`, `email_id`, `phone1`, `phone2`, `commission_percentage`, `application_fee`, `service_charge`) VALUES
(3, 208, 'y', 'y', 'yyyy', 'y', 'y', 'y', '7798797897', '7897987', 787987987, '99999999.99', '789.00');

-- --------------------------------------------------------

--
-- Table structure for table `university_courses`
--

CREATE TABLE IF NOT EXISTS `university_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `university_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `course_title` varchar(100) NOT NULL,
  `course_descripition` varchar(500) NOT NULL,
  `course_level` varchar(50) NOT NULL,
  `duration` int(11) NOT NULL,
  `course_fee` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `dept_id` int(11) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_id` varchar(100) NOT NULL,
  `phone_no` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `dept_id`, `branch_id`, `country_id`, `user_name`, `password`, `first_name`, `last_name`, `email_id`, `phone_no`) VALUES
(1, 1, 38, 4, 0, 'admin', 'admin', 'Administrator', 'L', 'admin@prospera.com', '11111'),
(2, 4, 39, 4, 0, 'aghilesh', 'aghilesh', 'Aghilesh', 'T', 'aghilesh4u@gmail.com', '9961034367'),
(3, 3, 39, 4, 0, 'joby', 'joby', 'Joby', 'CT', 'jobycttsr@gmail.com', '908798348');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE IF NOT EXISTS `user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `description`) VALUES
(1, 'Administrator', 'Users with Administrator role'),
(3, 'Student', 'Students'),
(4, 'Authenticated Users', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enquiry_master`
--
ALTER TABLE `enquiry_master`
  ADD CONSTRAINT `enquiry_master_ibfk_1` FOREIGN KEY (`source`) REFERENCES `publicity_source` (`id`),
  ADD CONSTRAINT `enquiry_master_ibfk_2` FOREIGN KEY (`enquiry_mode`) REFERENCES `enquiry_modes` (`id`);

--
-- Constraints for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD CONSTRAINT `follow_ups_ibfk_1` FOREIGN KEY (`status`) REFERENCES `task` (`id`);

--
-- Constraints for table `task`
--
ALTER TABLE `task`
  ADD CONSTRAINT `fk_task_status` FOREIGN KEY (`status`) REFERENCES `task_status` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
