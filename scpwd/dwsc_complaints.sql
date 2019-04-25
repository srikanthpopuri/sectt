-- phpMyAdmin SQL Dump
-- version 4.0.10deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2018 at 07:31 AM
-- Server version: 5.5.62-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dwsc_complaints`
--

-- --------------------------------------------------------

--
-- Table structure for table `active_guests`
--

CREATE TABLE IF NOT EXISTS `active_guests` (
  `ip` varchar(10) NOT NULL,
  `timestamp` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `active_guests`
--

INSERT INTO `active_guests` (`ip`, `timestamp`) VALUES
('14.141.244', 1544530626),
('14.141.244', 1544530632),
('14.141.244', 1544530625),
('14.141.244', 1544530464),
('14.141.244', 1544530461);

-- --------------------------------------------------------

--
-- Table structure for table `active_users`
--

CREATE TABLE IF NOT EXISTS `active_users` (
  `username` varchar(30) NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE IF NOT EXISTS `album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_name` varchar(100) NOT NULL,
  `username` varchar(20) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `banned_users`
--

CREATE TABLE IF NOT EXISTS `banned_users` (
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(11) unsigned NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `complaints_comments`
--

CREATE TABLE IF NOT EXISTS `complaints_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unid` int(11) NOT NULL,
  `forward_type` tinyint(4) NOT NULL,
  `forward_to` varchar(35) NOT NULL,
  `reasons` text NOT NULL,
  `department_name` varchar(55) NOT NULL,
  `other_reasons` text NOT NULL,
  `username` varchar(35) NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `complaints_comments`
--

INSERT INTO `complaints_comments` (`id`, `unid`, `forward_type`, `forward_to`, `reasons`, `department_name`, `other_reasons`, `username`, `timestamp`) VALUES
(1, 123477, 1, '1', 'Test01', '', '', 'admin', '1539090106'),
(2, 123477, 1, '1', 'Test02', '', '', 'wdscadb', '1539090654'),
(3, 123477, 1, '1', 'Test03', '', '', 'admin', '1539090834'),
(4, 123477, 1, '1', 'Test04', '', '', 'wdscadb', '1539091104'),
(5, 123477, 1, '1', 'Test05', '', '', 'admin', '1539091120'),
(6, 123475, 2, '', 'Test - O - 02', '', '', 'admin', '1539091454'),
(7, 123475, 2, '', 'Test - O -022', '', '', 'admin', '1539091710'),
(8, 123474, 1, '1', 'Check this Issue', '', '', 'admin', '1539151066'),
(9, 123474, 1, '1', 'Issue Resolved', '', '', 'wdscadb', '1539151319'),
(10, 123474, 1, '1', 'Issue Closed', '', '', 'admin', '1539151365'),
(11, 123473, 1, '1', 'Test-05', '', '', 'admin', '1539758553'),
(12, 123473, 1, '1', 'test-05-reply', '', '', 'wdscadb', '1539758638'),
(13, 123473, 1, '1', 'test-05-close', '', '', 'admin', '1539758740'),
(14, 11817124, 1, '1', 'Test Adb1', '', '', 'admin', '1540624287'),
(15, 11817124, 1, '1', 'Test Adb', '', '', 'wdscadb', '1540624775'),
(16, 11817124, 1, '1', 'Test Adb22', '', '', 'admin', '1540624800'),
(17, 11817124, 1, '1', 'Test4', '', '', 'wdscadb', '1540624819'),
(18, 11817124, 1, '1', 'Test5', '', '', 'admin', '1540624835'),
(19, 118184, 1, '1', 'test11111', '', '', 'admin', '1540881437'),
(20, 118184, 1, '1', 'test22222', '', '', 'wdscadb', '1540881486'),
(21, 118184, 1, '1', 'test33333', '', '', 'admin', '1540881523');

-- --------------------------------------------------------

--
-- Table structure for table `complaints_form`
--

CREATE TABLE IF NOT EXISTS `complaints_form` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(15) NOT NULL,
  `unid` varchar(15) NOT NULL,
  `name` varchar(35) NOT NULL,
  `age` varchar(10) NOT NULL,
  `sex` varchar(10) NOT NULL,
  `perm_address` tinytext NOT NULL,
  `correspondence_address` tinytext NOT NULL,
  `district` int(11) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `disability_type` int(11) NOT NULL,
  `disability_certificate_no` varchar(15) NOT NULL,
  `disability_percentage` varchar(10) NOT NULL,
  `disability_proof` tinytext NOT NULL,
  `issuing_authority` tinytext NOT NULL,
  `valid_upto` varchar(20) NOT NULL,
  `complaint_description` text NOT NULL,
  `supplementary_proof` text NOT NULL,
  `respondent_name` varchar(35) NOT NULL,
  `respondent_address` tinytext NOT NULL,
  `status` tinyint(2) NOT NULL,
  `forward_type` tinyint(2) NOT NULL,
  `forward_to` varchar(35) NOT NULL,
  `reasons` text NOT NULL,
  `department_name` varchar(55) NOT NULL,
  `other_reasons` text NOT NULL,
  `timestamp` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `complaints_form`
--

INSERT INTO `complaints_form` (`id`, `date`, `unid`, `name`, `age`, `sex`, `perm_address`, `correspondence_address`, `district`, `contact_no`, `disability_type`, `disability_certificate_no`, `disability_percentage`, `disability_proof`, `issuing_authority`, `valid_upto`, `complaint_description`, `supplementary_proof`, `respondent_name`, `respondent_address`, `status`, `forward_type`, `forward_to`, `reasons`, `department_name`, `other_reasons`, `timestamp`) VALUES
(1, '', '123456', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 1, 0, '', '', '', '', '1538987095'),
(2, '', '123457', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 1, 0, '', '', '', '', '1538987095'),
(3, '', '123458', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 1, 0, '', '', '', '', '1538987095'),
(4, '', '123459', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 1, 0, '', '', '', '', '1538987095'),
(5, '', '123471', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 1, 0, '', '', '', '', '1538987095'),
(6, '', '123472', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 3, 2, '', '', 'ite', 'test', '1538987095'),
(7, '', '123473', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 8, 1, '1', 'test-05-close', '', '', '1538987095'),
(8, '', '123474', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 8, 1, '1', 'Issue Closed', '', '', '1538987095'),
(9, '', '123475', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 7, 2, '', 'Test - O -022', 'Excise', 'Test - O - 01', '1538987095'),
(10, '', '123477', 'Suresh', '45', 'MALE', 'ASFBIUbef\r\nanfuihEF\r\nLKNFOIWENF\r\nWDNWEIUFH\r\nFJWEOIHF\r\nAJHFIUQgefu', 'asfhiuqhgefiugqfiu\r\nfbhwevf\r\njdbiugwef\r\njdbvuywge', 1, '2147483647', 1, '1215', '50', '', 'State Govt', '25-05-2025', 'idfhouwef\r\njfoiwehjf\r\n4jbfiuwbef\r\nudhgiwugf\r\nafhiuwefiuw\r\nnfiuwhgefiuw\r\nsiuwgf', '', 'Naresh', 'bdfiuwehfb\r\nofihwuhgw\r\nkjdbiuwbg\r\njhdvbywvfgiuwe\r\nkjdvhiuwhgefu\r\nkjdviuwgf\r\njsdhvgvw', 8, 1, '1', 'Test05', '', '', '1538987095'),
(15, '27-10-2018', '011818289', 'Test Adb', '', '1', '', '', 1, '', 0, '', '', '4daf75950e90779b25f1cb701c3602aa.jpg', '', '', '', 'eb223ff8e798bb3f3f5946f503a6fd8e.jpg,03c56d4176608a81b7ebe9506d63677e.jpg', '', '', 8, 1, '1', 'Test5', '', '', '1540624240'),
(16, '30-10-2018', '0118184', '', '', '', '', '', 1, '', 0, '', '', '53f30f86584976d1d97d6cbcb1e8d686.jpg', '', '', '', '5ba8816073156e2d17675d7a23abeadf.jpg', '', '', 8, 1, '1', 'test33333', '', '', '1540881389'),
(17, '31-10-2018', '11181461', '', '', '', '', '', 11, '', 0, '', '', '05a5b098dbdaa19d1e63d807325ba644.pdf', '', '', '', '0c3f315629257301ecc2cfc45e92f4a3.pdf', '', '', 1, 0, '', '', '', '', '1540969264');

-- --------------------------------------------------------

--
-- Table structure for table `createemployees`
--

CREATE TABLE IF NOT EXISTS `createemployees` (
  `id` int(23) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) NOT NULL,
  `mobilenumber` varchar(33) NOT NULL,
  `aadhar` int(16) NOT NULL,
  `emailid` varchar(33) NOT NULL,
  `employeeid` varchar(33) NOT NULL,
  `employee_district` varchar(33) NOT NULL,
  `address` longtext NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `timstamp` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employeeid` (`employeeid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `disabilities`
--

CREATE TABLE IF NOT EXISTS `disabilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `disability` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `disabilities`
--

INSERT INTO `disabilities` (`id`, `disability`) VALUES
(1, 'Blindness'),
(2, 'Low-Vision'),
(3, 'Leprosy Cured Persons'),
(4, 'Hearing Impaired'),
(5, 'Locomotor Disability'),
(6, 'Dwarfism'),
(7, 'Intellectual Disability'),
(8, 'Mental Illness'),
(9, 'Autism Spectrum Disorder'),
(10, 'Cerebral Palsy'),
(11, 'Muscular Dystrophy'),
(12, 'Chronic Neurological conditions'),
(13, 'Specific Learning Disabilities'),
(14, 'Multiple Sclerosis'),
(15, 'Speech and Language disability'),
(16, 'Thalassemia'),
(17, 'Hemophilia'),
(18, 'Sickle Cell disease'),
(19, 'Multiple Disabilities including deafblindness'),
(20, 'Acid Attack Victim'),
(21, 'Parkinson''s Disease');

-- --------------------------------------------------------

--
-- Table structure for table `global_districts`
--

CREATE TABLE IF NOT EXISTS `global_districts` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `district` varchar(50) NOT NULL,
  `region` varchar(4) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `global_districts`
--

INSERT INTO `global_districts` (`uid`, `district`, `region`) VALUES
(1, 'ADILABAD                      ', 'T'),
(2, 'MANCHERIAL                    ', 'T'),
(3, 'NIRMAL                        ', 'T'),
(4, 'KUMURAM BHEEM (ASIFABAD)      ', 'T'),
(5, 'KARIMNAGAR                    ', 'T'),
(6, 'JAGITHYAL                     ', 'T'),
(7, 'PEDDAPALLI                    ', 'T'),
(8, 'RAJANNA SIRCILLA              ', 'T'),
(9, 'NIZAMABAD                     ', 'T'),
(10, 'KAMAREDDY                     ', 'T'),
(11, 'WARANGAL URBAN                ', 'T'),
(12, 'WARANGAL RURAL                ', 'T'),
(13, 'JAYASHANKAR                   ', 'T'),
(14, 'JANGAON                       ', 'T'),
(15, 'MAHABUBABAD                   ', 'T'),
(16, 'KHAMMAM                       ', 'T'),
(17, 'BHADRADRI KOTHAGUDEM          ', 'T'),
(18, 'MEDAK                         ', 'T'),
(19, 'SANGAREDDY                    ', 'T'),
(20, 'SIDDIPET                      ', 'T'),
(21, 'MAHABUBNAGAR                  ', 'T'),
(22, 'WANAPARTHY                    ', 'T'),
(23, 'NAGARKURNOOL                  ', 'T'),
(24, 'JOGULAMBA GADWAL              ', 'T'),
(25, 'NALGONDA                      ', 'T'),
(26, 'SURYAPET                      ', 'T'),
(27, 'YADADRI BHUVANAGIRI           ', 'T'),
(28, 'VIKARABAD                     ', 'T'),
(29, 'MEDCHAL-MALKAJGIRI            ', 'T'),
(30, 'RANGA REDDY                   ', 'T'),
(31, 'HYDERABAD                     ', 'T');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `userid` varchar(32) NOT NULL,
  `userlevel` tinyint(1) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `timestamp` int(11) NOT NULL,
  `valid` tinyint(1) NOT NULL,
  `name` varchar(50) NOT NULL,
  `hash` varchar(32) NOT NULL,
  `hash_generated` int(11) NOT NULL,
  `eid` varchar(40) NOT NULL,
  `city` varchar(55) NOT NULL,
  `branch` varchar(44) NOT NULL,
  `employee_district` varchar(35) NOT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`username`, `password`, `userid`, `userlevel`, `mobile`, `email`, `timestamp`, `valid`, `name`, `hash`, `hash_generated`, `eid`, `city`, `branch`, `employee_district`) VALUES
('admin', 'admin@uct', 'f7853dc173783915a19ed5520a75005f', 9, '', '', 1540962087, 0, 'admin', 'cdb0ceccca08c2a05064a11de292dd1f', 1540881190, '', '', '', ''),
('arun', 'arun', '404561cc1a00ec4e7b61f57e95a4cfdf', 9, '9827198271', 'arun@entrolab.com', 1517551834, 1, 'Arun', 'fc58467904f91bebc47830bd21161d29', 1517294016, '212121', 'cochin', 'Tiruvanathapuram', ''),
('wdscadb', 'wdscadb', '7e819c3f5297f3029003dd8476c40831', 6, '7288877887', 'deop_adilabad@gmail.com', 1540981780, 1, 'DWO Adilabad', '65420f1004ee04cc72522385ce638eaa', 1540896770, '', '', '', '1'),
('vamsi', 'vamsi', 'b7afb03d1f36e3e0012a2b00088e95ab', 9, '', '', 1517554254, 1, 'vamsi', '675b706141a032aee63e9e5160f6d418', 1517300848, '', '', '', ''),
('dwobhadradri', 'dwobhadradri', '', 6, '', '', 0, 1, 'DWO BHADRADRI', '', 0, '', '', '', '17'),
('wdschyd', 'wdschyd', 'b3c4cac1b42737f8f230dea99899ce2b', 6, '', '', 1538114480, 1, 'DWO HYDERABAD', '410da86969e767430d41fce8326c5b79', 1537871681, '', '', '', '31'),
('dwojagithyal', 'dwojagithyal', '', 6, '', '', 0, 1, 'DWO JAGITHYAL', '', 0, '', '', '', '6'),
('dwojangaon', 'dwojangaon', '', 6, '', '', 0, 1, 'DWO JANGAON', '', 0, '', '', '', '14'),
('dwojayashankar', 'dwojayashankar', '', 6, '', '', 0, 1, 'DWO JAYASHANKAR', '', 0, '', '', '', '13'),
('dwojogulambagadwal', 'dwojogulambagadwal', '', 6, '', '', 0, 1, 'DWO JOGULAMBA GADWAL', '', 0, '', '', '', '24'),
('dwokamareddy', 'dwokamareddy', '', 6, '', '', 0, 1, 'DWO KAMAREDDY', '', 0, '', '', '', '10'),
('dwokarimnagar', 'dwokarimnagar', '', 6, '', '', 0, 1, 'DWO KARIMNAGAR', '', 0, '', '', '', '5'),
('dwokhammam', 'dwokhammam', 'ae39cc616ae678ecabe9f71c1c36c83f', 6, '', '', 1537947033, 1, 'DWO KHAMMAM', 'dd4e103bd83364242e5b56af2ec07f93', 1537943450, '', '', '', '16'),
('dwokumarambheem', 'dwokumarambheem', '', 6, '', '', 0, 1, 'DWO KUMARAM BHEEM', '', 0, '', '', '', '4'),
('dwomahabubabad', 'dwomahabubabad', '', 6, '', '', 0, 1, 'DWO MAHABUBABAD', '', 0, '', '', '', '15'),
('dwomahabubnagar', 'dwomahabubnagar', '', 6, '', '', 0, 1, 'DWO MAHABUBNAGAR', '', 0, '', '', '', '21'),
('test@m', 'test@m', '7772ce1e8b59a32ecb9af7d8d67248a9', 6, '7288877887', 'avinash@entrolabs.com', 1539758377, 1, 'Test Login', 'f68cf436718648eeba6ae1b974e87131', 1539673753, '', '', '', '2'),
('dwomedak', 'dwomedak', '', 6, '', '', 0, 1, 'DWO MEDAK', '', 0, '', '', '', '18'),
('dwomedchal', 'dwomedchal', '', 6, '', '', 0, 1, 'DWO MEDCHAL-MALKAJGIRI', '', 0, '', '', '', '29'),
('dwonagarkurnool', 'dwonagarkurnool', '', 6, '', '', 0, 1, 'DWO NAGARKURNOOL', '', 0, '', '', '', '23'),
('dwonalgonda', 'dwonalgonda', '', 6, '', '', 0, 1, 'DWO NALGONDA', '', 0, '', '', '', '25'),
('dwonirmal', 'dwonirmal', '', 6, '', '', 0, 1, 'DWO NIRMAL', '', 0, '', '', '', '3'),
('dwonizamabad', 'dwonizamabad', '', 6, '', '', 0, 1, 'DWO NIZAMABAD', '', 0, '', '', '', '9'),
('dwopeddapalli', 'dwopeddapalli', '', 6, '', '', 0, 1, 'DWO PEDDAPALLI', '', 0, '', '', '', '7'),
('dworajannasircilla', 'dworajannasircilla', '', 6, '', '', 0, 1, 'DWO RAJANNA SIRCILLA', '', 0, '', '', '', '8'),
('wdscrrd', 'wdscrrd', 'f0aabc2e855cfd5f9b67c6798cbd8c33', 6, '', '', 1543912992, 1, 'DWO RANGAREDDY', 'cb882e1576c1944147a47a0ff8db4b7e', 1543912676, '', '', '', '30'),
('dwosangareddy', 'dwosangareddy', '', 6, '', '', 0, 1, 'DWO SANGAREDDY', '', 0, '', '', '', '19'),
('dwosiddipet', 'dwosiddipet', '', 6, '', '', 0, 1, 'DWO SIDDIPET', '', 0, '', '', '', '20'),
('dwosuryapet', 'dwosuryapet', '', 6, '', '', 0, 1, 'DWO SURYAPET', '', 0, '', '', '', '26'),
('dwovikarabad', 'dwovikarabad', '', 6, '', '', 0, 1, 'DWO VIKARABAD', '', 0, '', '', '', '28'),
('dwowanaparthy', 'dwowanaparthy', '', 6, '', '', 0, 1, 'DWO WANAPARTHY', '', 0, '', '', '', '22'),
('dwowarangalrural', 'dwowarangalrural', 'e3c8ceb9a07599349303c2b9418eb293', 6, '', '', 1536321714, 1, 'DWO WARANGAL RURAL', 'f8fd9a23da463391fd32fbb495e57780', 1536317563, '', '', '', '12'),
('wdscwglu', 'wdscwglu', '6aa8ac0778df8d9ea849e56f5586f153', 6, '', '', 1537964869, 1, 'DWO WARANGAL URBAN', '8970415ca60ce57a79172c79e34df3ba', 1537964856, '', '', '', '11'),
('dwoyadadribhuvanagiri', 'dwoyadadribhuvanagiri', '', 6, '', '', 0, 1, 'DWO YADADRI BHUVANAGIRI', '', 0, '', '', '', '27'),
('voadb', 'voadb', 'c998ab0f1defb594889114e8a6106490', 5, '', '', 1535459210, 1, 'RDO ADILABAD', 'c302e337082ed327f96b090a1cc84a3f', 1535459163, '', '', '', '1'),
('rdonizamabad', 'rdonizamabad', '', 5, '', '', 1535459613, 1, 'RDO NIZAMABAD', '', 1535459613, '', '', '', '9'),
('rdomancherial', 'rdomancherial', '', 5, '', '', 1536218285, 1, 'RDO MANCHERIAL', '', 1536218285, '', '', '', '2'),
('rdonirmal', 'rdonirmal', '', 5, '', '', 1536218285, 1, 'RDO NIRMAL', '', 1536218285, '', '', '', '3'),
('rdokumarambheem', 'rdokumarambheem', '', 5, '', '', 1536218285, 1, 'RDO KUMARAM BHEEM', '', 1536218285, '', '', '', '4'),
('rdokarimnagar', 'rdokarimnagar', '', 5, '', '', 1536218488, 1, 'RDO KARIMNAGAR', '', 1536218488, '', '', '', '5'),
('rdojagithyal', 'rdojagithyal', '', 5, '', '', 1536218488, 1, 'RDO JAGITHYAL', '', 1536218488, '', '', '', '6'),
('rdopeddapalli', 'rdopeddapalli', '', 5, '', '', 1536218488, 1, 'RDO PEDDAPALLI', '', 1536218488, '', '', '', '7'),
('rdorajannasircilla', 'rdorajannasircilla', '', 5, '', '', 1536220327, 1, 'RDO RAJANNA SIRCILLA', '', 1536220327, '', '', '', '8'),
('rdokamareddy', 'rdokamareddy', '', 5, '', '', 1536220327, 1, 'RDO KAMAREDDY', '', 1536220327, '', '', '', '10'),
('rdowarangalurban', 'rdowarangalurban', '', 5, '', '', 1536220327, 1, 'RDO WARANGAL URBAN', '', 1536220327, '', '', '', '11'),
('vowglu', 'vowglu', '', 5, '', '', 1536220327, 1, 'RDO WARANGAL RURAL', '', 1536220327, '', '', '', '12'),
('rdojayashankar', 'rdojayashankar', '', 5, '', '', 1536220327, 1, 'RDO JAYASHANKAR', '', 1536220327, '', '', '', '13'),
('rdojangaon', 'rdojangaon', '', 5, '', '', 1536220327, 1, 'RDO JANGAON', '', 1536220327, '', '', '', '14'),
('rdomahabubabad', 'rdomahabubabad', '', 5, '', '', 1536220805, 1, 'RDO MAHABUBABAD', '', 1536220805, '', '', '', '15'),
('rdokhammam', 'rdokhammam', '', 5, '', '', 1536220805, 1, 'RDO KHAMMAM', '', 1536220805, '', '', '', '16'),
('rdobhadradri', 'rdobhadradri', '', 5, '', '', 1536220805, 1, 'RDO BHADRADRI', '', 1536220805, '', '', '', '17'),
('rdomedak', 'rdomedak', '', 5, '', '', 1536220805, 1, 'RDO MEDAK', '', 1536220805, '', '', '', '18'),
('rdosangareddy', 'rdosangareddy', '', 5, '', '', 1536220805, 1, 'RDO SANGAREDDY', '', 1536220805, '', '', '', '19'),
('rdosiddipet', 'rdosiddipet', '', 5, '', '', 1536221109, 1, 'RDO SIDDIPET', '', 1536221109, '', '', '', '20'),
('rdomahabubnagar', 'rdomahabubnagar', '', 5, '', '', 1536221109, 1, 'RDO MAHABUBNAGAR', '', 1536221109, '', '', '', '21'),
('rdowanaparthy', 'rdowanaparthy', '', 5, '', '', 1536221109, 1, 'RDO WANAPARTHY', '', 1536221109, '', '', '', '22'),
('rdonagarkurnool', 'rdonagarkurnool', '', 5, '', '', 1536221415, 1, 'RDO NAGARKURNOOL', '', 1536221415, '', '', '', '23'),
('rdojogulambagadwal', 'rdojogulambagadwal', '', 5, '', '', 1536221415, 1, 'RDO JOGULAMBA GADWAL', '', 1536221415, '', '', '', '24'),
('rdonalgonda', 'rdonalgonda', '', 5, '', '', 1536221415, 1, 'RDO NALGONDA', '', 1536221415, '', '', '', '25'),
('rdosuryapet', 'rdosuryapet', '', 5, '', '', 1536221415, 1, 'RDO SURYAPET', '', 1536221624, '', '', '', '26'),
('rdoyadadribhuvanagiri', 'rdoyadadribhuvanagiri', '', 5, '', '', 1536222015, 1, 'RDO YADADRI BHUVANAGIRI', '', 1536222015, '', '', '', '27'),
('rdovikarabad', 'rdovikarabad', '', 5, '', '', 1536222015, 1, 'RDO VIKARABAD', '', 1536222015, '', '', '', '28'),
('rdomedchal', 'rdomedchal', '', 5, '', '', 1536222015, 1, 'RDO MEDCHAL', '', 1536222015, '', '', '', '29'),
('vorrd', 'vorrd', '', 5, '', '', 1536222216, 1, 'RDO RANGA REDDY', '', 1536222216, '', '', '', '30'),
('vohyd', 'vohyd', '', 5, '', '', 1536222271, 1, 'RDO HYDERABAD', '', 1536222271, '', '', '', '31');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
