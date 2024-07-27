-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 08:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `company_name` varchar(50) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `applicant_email` varchar(50) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`company_name`, `role_name`, `applicant_email`, `status`) VALUES
('Optimize', 'data Analyst', 'allemanojkumar1@gmail.com', -1),
('Optimize', 'analyst', 'allemanojkumar1@gmail.com', -1),
('Optimize', 'analyst', 'vigneshkasam7@gmail.com', -1),
('Optimize', 'analyst', 'manikantaorsu7@gmail.com', -1);

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `concern_person` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `tag_line` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `website` varchar(50) NOT NULL,
  `logo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`concern_person`, `email`, `password`, `company_name`, `tag_line`, `description`, `website`, `logo`) VALUES
('manoj', 'abcd@gmail.com', '12345678', 'abcd', 'abcd', 'abcd', 'abcd.com', ''),
('Manoj', 'allemanojkumar1@gmail.com', '12345678', 'Optimize', 'fast enough', 'akjhds skdjklds fskfd sdfhsdkfjsd fsdjkfsad fadsiuufhasdiuf sadf ', 'www.optimize.com', 'Screenshot (1).png'),
('aman', 'amandavu11@gmail.com', '12345678', 'Cyber cafe', 'secure yourself', 'sdklhfksjdf', 'https://hack.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker`
--

CREATE TABLE `jobseeker` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jobseeker`
--

INSERT INTO `jobseeker` (`name`, `email`, `contact`, `password`) VALUES
('abc', 'abc@gmail.com', '1234567890', '12345678'),
('Manoj', 'allemanojkumar1@gmail.com', '9110523307', '12345678'),
('Davu Aman', 'aman4@gmail.com', '4578963210', 'sdkaulofy'),
('Mani Kanta', 'manikantaorsu7@gmail.com', '8247498188', 'mk5678910'),
('Sai', 'sai123@gmail.com', '1234567890', '12345678'),
('vignesh kasam', 'vigneshkasam77@gmail.com', '8317519529', 'Vignesh@7'),
('Vignesh', 'vigneshkasam7@gmail.com', '1234567890', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `jobseeker_profile`
--

CREATE TABLE `jobseeker_profile` (
  `email` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `profile_pic` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `education` varchar(100) DEFAULT NULL,
  `skills` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobseeker_profile`
--

INSERT INTO `jobseeker_profile` (`email`, `name`, `profile_pic`, `dob`, `gender`, `education`, `skills`) VALUES
('', '', NULL, NULL, NULL, NULL, NULL),
('allemanojkumar1@gmail.com', 'Alle Manoj Kumar', 'man.png', '2003-10-03', 'male', 'B.TECH', 'java, dsa,'),
('manikantaorsu7@gmail.com', 'Mani Kanta Orasu', 'images.jpg', '2024-06-27', 'male', 'B Tech', 'java, php'),
('sai123@gmail.com', 'SAi', 'images.jpg', '2024-06-05', 'male', 'Degree', 'hmtl, css, php'),
('vigneshkasam7@gmail.com', 'Kasam Vignesh', '360_F_740660413_jMpbvqGDfKQfBfncRYnZRJT70rIRHIaX.jpg', '2024-06-04', 'male', 'B Tech', 'dsa, web development');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `company_name` varchar(50) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `qualification` varchar(50) NOT NULL,
  `openings` int(10) NOT NULL,
  `required_skills` text NOT NULL,
  `location` varchar(100) NOT NULL,
  `salary` int(10) NOT NULL,
  `interests` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`company_name`, `role_name`, `description`, `qualification`, `openings`, `required_skills`, `location`, `salary`, `interests`) VALUES
('Optimize', 'data Analyst', 'We are seeking a skilled Data Analyst to join our team. The ideal candidate will be responsible for interpreting data, analyzing results using statistical techniques, and providing ongoing reports. You will develop and implement data collection systems, data analytics, and other strategies that optimize statistical efficiency and quality. The role involves acquiring data from primary or secondary data sources and maintaining databases.', 'Btech', 5, 'statistical analysis, data visualization, python, pandas, numpy.', 'Hyderabad', 50000, 0),
('Optimize', 'analyst', 'An analyst role involves collecting, processing, and analyzing data to support decision-making processes within an organization. Analysts identify trends, patterns, and insights from data sets, helping to optimize strategies and improve performance. They use various tools and methodologies to conduct quantitative and qualitative research, create reports, and present findings to stakeholders. Key responsibilities include data interpretation, report generation, and providing actionable recommendations. Analysts often work in diverse fields such as finance, marketing, operations, and technology, requiring strong analytical, problem-solving, and communication skills. Proficiency in data analysis software and a thorough understanding of industry-specific knowledge are essential.', 'Btech', 10, 'html, css, ', 'Hyderabad', 50000, 0),
('Optimize', 'HR', 'sdkfjasd fasdkjfhsldkf sdkfksda f', 'M Tech', 3, 'klsjdf, sadjf, ksdjf', 'Bengaluru', 1000000, 0),
('Cyber cafe', 'Tester', 'sklf kjsfh sdkjf sdfk sdfkadsfdsjk', 'B Tech', 10, 'hacking tools', 'Noida', 500000, 0),
('Optimize', 'Dev oops', 'sladkfjsdf sdkfsd fsdlkf sdfh asdf', 'Btech', 7, 'dsa, java, oops', 'Noida', 50000, 0),
('abcd', 'developer', 'abcd', 'abcd', 2, 'abcd', 'abcd', 10000, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employer`
--
ALTER TABLE `employer`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `jobseeker`
--
ALTER TABLE `jobseeker`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `jobseeker_profile`
--
ALTER TABLE `jobseeker_profile`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
