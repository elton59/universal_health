-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2023 at 07:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `universal_health`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'dante@gmail.com', 'dante@2022');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(50) NOT NULL,
  `appointmenttype` varchar(50) NOT NULL,
  `userid` int(50) DEFAULT NULL,
  `status` enum('pending','booked','closed','sorted','approved') NOT NULL,
  `doctors_email` varchar(50) DEFAULT NULL,
  `patient_email` varchar(50) NOT NULL,
  `date_of_appointment` varchar(50) NOT NULL,
  `comment` varchar(50) DEFAULT 'no comment'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `appointmenttype`, `userid`, `status`, `doctors_email`, `patient_email`, `date_of_appointment`, `comment`) VALUES
(2, 'check up', NULL, 'closed', 'carson@hopecore.org', 'eddy@hopecore.org', '2022-06-21', NULL),
(3, 'check up', 17, 'approved', 'carson@hopecore.org', 'fai@hopecore.org', '2022-06-21', NULL),
(4, 'check up', 17, 'approved', 'dff@hopecore.org', 'fai@hopecore.org', '2022-06-21', NULL),
(5, 'check up', NULL, 'closed', 'carson@hopecore.org', 'cc@hopecore.org', '2022-06-29', NULL),
(6, 'check up', NULL, 'closed', 'carson@hopecore.org', 'tasha@hopecore.org', '2022-07-01', NULL),
(7, 'tooth gilling', NULL, 'pending', 'carson@hopecore.org', 'eddy@hopecore.org', '2022-06-26T15:02', 'jj'),
(8, 'check up', 12, 'approved', 'carson@hopecore.org', 'brian@hopecore.org', '2022-12-08T05:56', 'kk'),
(9, 'tooth gilling', NULL, 'pending', 'carson@hopecore.org', 'eddy@hopecore.org', '2022-06-30T18:31', 'no comment'),
(10, 'tooth filling', NULL, 'pending', 'dff@hopecore.org', 'fai@hopecore.org', '2022-07-06T20:58', 'no comment'),
(11, 'tooth filling', NULL, 'closed', 'carson@hopecore.org', 'elton@gmail.com', '2022-07-07T22:22', 'come tomorrow'),
(12, 'abc', NULL, 'pending', 'malaika@gmail.org', '<br />\r\n<b>Warning</b>:  Trying to access array of', '2023-05-10T09:35', 'no comment'),
(13, 'www', 1, 'pending', 'malaika@gmail.org', 'martha2022@gmail.org', '2023-05-23T09:54', 'no comment'),
(14, 'abc', 112, 'approved', 'malaika@gmail.org', 'were@gmail.com', '2023-05-03T13:43', 'no comment'),
(15, 'www', 112, 'approved', 'malaika@gmail.org', 'were@gmail.com', '2023-05-24T15:02', 'no comment'),
(16, 'www', 112, 'approved', 'malaika@gmail.org', 'were@gmail.com', '2023-05-10T15:12', 'no comment'),
(17, 'www', 112, 'approved', 'wer@gmail.com', 'were@gmail.com', '2023-05-10T15:33', 'no comment'),
(18, 'Toothache', 118, 'approved', 'wer@gmail.com', 'okoth@gmail.com', '2023-05-25T22:36', 'no comment');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(50) NOT NULL DEFAULT 0,
  `specialization` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `serviceid` int(50) DEFAULT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `drugid` int(50) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `specialization`, `profession`, `firstname`, `lastname`, `gender`, `adress`, `serviceid`, `phonenumber`, `email`, `password`, `drugid`, `status`) VALUES
(0, 'doctor', 'dentist', 'harisson', 'wer', 'male', '12343 Kenya', 2, '0711301605', 'wer@gmail.com', '#Wer@2023', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(50) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(50) DEFAULT NULL,
  `message` varchar(50) DEFAULT NULL,
  `receiver` varchar(50) DEFAULT NULL,
  `reply` varchar(50) DEFAULT NULL,
  `userid` int(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` enum('pending','read','archived') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `firstname`, `lastname`, `phonenumber`, `message`, `receiver`, `reply`, `userid`, `email`, `status`) VALUES
(3, '', '', '', '', '', 'hh', 0, 'eltonokoth59@gmail.com', 'pending'),
(8, NULL, NULL, NULL, 'hey', 'dante@hopecore.org', 'q', NULL, 'k2@hopecore.org', 'pending'),
(17, NULL, NULL, NULL, 'check drug quantity\r\n', 'ruthb@hopecore.org', 'dd', NULL, 'carson@hopecore.org', 'read'),
(22, NULL, NULL, NULL, 'hello', 'bruno@hopecore.org', NULL, NULL, 'dante@hopecore.org', 'pending'),
(23, NULL, NULL, NULL, 'jj', 'ruthb@hopecore.org', NULL, NULL, 'bruno@hopecore.org', 'pending'),
(24, NULL, NULL, NULL, 'hi\r\n', 'carson@hopecore.org', NULL, NULL, 'maryanne@hopecore.org', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `lab_test`
--

CREATE TABLE `lab_test` (
  `id` int(50) NOT NULL,
  `test_name` varchar(50) DEFAULT NULL,
  `test_type` varchar(50) DEFAULT NULL,
  `date_of_test` varchar(50) DEFAULT NULL,
  `results` varchar(50) DEFAULT NULL,
  `labtech_email` varchar(50) DEFAULT NULL,
  `doctors_email` varchar(50) DEFAULT NULL,
  `patient_email` varchar(50) DEFAULT NULL,
  `prescription` varchar(50) DEFAULT NULL,
  `treatment` varchar(50) DEFAULT NULL,
  `pharmacist_email` varchar(50) DEFAULT NULL,
  `lab_test_cost` int(50) NOT NULL DEFAULT 0,
  `status` enum('payment_pending','payment_completed','test_pending','test_completed','prescription_pending','prescription_completed','received_drug','payment_rejected','drug_received') NOT NULL DEFAULT 'test_pending',
  `drug_cost` int(50) NOT NULL DEFAULT 0,
  `transaction_id` varchar(50) DEFAULT NULL,
  `totalcost` int(11) GENERATED ALWAYS AS (`lab_test_cost` + `drug_cost`) STORED,
  `drugname` varchar(50) NOT NULL,
  `payment_date` varchar(50) DEFAULT NULL,
  `labtech_comment` varchar(50) DEFAULT NULL,
  `nchv_comment` varchar(50) DEFAULT 'NA',
  `nchv_visit_date` varchar(50) DEFAULT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `tod` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lab_test`
--

INSERT INTO `lab_test` (`id`, `test_name`, `test_type`, `date_of_test`, `results`, `labtech_email`, `doctors_email`, `patient_email`, `prescription`, `treatment`, `pharmacist_email`, `lab_test_cost`, `status`, `drug_cost`, `transaction_id`, `drugname`, `payment_date`, `labtech_comment`, `nchv_comment`, `nchv_visit_date`, `hospital_name`, `tod`) VALUES
(5, 'has malaria symptoms', 'malaria test', ' 2022-06-19', ' positive', 'gaga@hopecore.org', 'carson@hopecore.org', 'cc@hopecore.org', '5', 'recommed malaria tablets', 'mekatili@hopecore.org', 1200, 'prescription_completed', 500, 'ertfyhgjgfd', 'cc@hopecore.org', NULL, NULL, '', '', '', '2023-05-23 13:30:58'),
(6, 'dd', 'bb', 'vv', ' positive', 'gaga@hopecore.org', 'carson@hopecore.org', 'fai@hopecore.org', '10', 'malaria treatment', 'mekatili@hopecore.org', 0, 'drug_received', 1000, 'agfhfdafgd', 'paracetamol', '2022-07-01', NULL, '', '', '', '2023-05-23 13:30:58'),
(7, 'fff', 'tb-test-kit', ' 2022-07-14', ' positive', 'gaga@hopecore.org', 'carson@hopecore.org', 'tasha@hopecore.org', '20', NULL, NULL, 2000, 'test_completed', 0, NULL, 'paracetamol', NULL, '  success', '', '', '', '2023-05-23 13:30:58'),
(14, 'db treatment', 'tb-test-kit', ' 2022-07-20', ' positive', 'gaga@hopecore.org', 'ere', 'kinging', '3', NULL, NULL, 300, 'test_completed', 0, NULL, '', NULL, '  succes', '', '', '', '2023-05-23 13:30:58'),
(18, NULL, NULL, NULL, NULL, NULL, 'carson@hopecore.org', 'brian@hopecore.org', '10', 'abcd', 'mekatili@hopecore.org', 0, 'prescription_completed', 1000, NULL, 'paracetamol', NULL, NULL, '', '', '', '2023-05-23 13:30:58'),
(19, NULL, NULL, NULL, NULL, NULL, 'wer@gmail.com', 'were@gmail.com', NULL, 'abc', '<br />\r\n<b>Warning</b>:  Undefined variable $drive', 0, 'prescription_pending', 0, NULL, '', NULL, NULL, 'NA', NULL, '', '2023-05-23 13:30:58'),
(20, NULL, NULL, NULL, NULL, NULL, 'wer@gmail.com', 'were@gmail.com', NULL, 'abc', '<br />\r\n<b>Warning</b>:  Undefined variable $drive', 0, 'prescription_pending', 0, NULL, '', NULL, NULL, 'NA', NULL, '', '2023-05-23 13:30:58'),
(21, NULL, NULL, NULL, NULL, NULL, 'wer@gmail.com', 'were@gmail.com', NULL, 'abc', '<br />\r\n<b>Warning</b>:  Undefined variable $drive', 0, 'prescription_pending', 0, NULL, '', NULL, NULL, 'NA', NULL, 'jaramogi hospital', '2023-05-23 13:30:58'),
(22, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'test_pending', 0, NULL, '', NULL, NULL, 'NA', NULL, '', '2023-05-23 13:30:58'),
(23, NULL, NULL, NULL, NULL, NULL, 'wer@gmail.com', 'okoth@gmail.com', NULL, 'carried tooth filling tooth', '<br />\r\n<b>Warning</b>:  Undefined variable $drive', 0, 'prescription_pending', 0, NULL, '', NULL, NULL, 'NA', NULL, 'jaramogi hospital', '2023-05-23 19:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(50) NOT NULL DEFAULT 0,
  `specialization` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `serviceid` int(50) DEFAULT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `drugid` int(50) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `specialization`, `profession`, `firstname`, `lastname`, `gender`, `adress`, `serviceid`, `phonenumber`, `email`, `password`, `drugid`, `status`) VALUES
(0, 'patient', 'farmer', 'harizon', 'were', 'male', '12343 Kenya', 0, '0711301605', 'were@gmail.com', '#Were2023', NULL, 'pending'),
(0, 'patient', 'farmer', 'john', 'okoth', 'male', '12345 Nairobi', 0, '0711301122', 'okoth@gmail.com', '#Okoth2023', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(50) NOT NULL,
  `treatment` varchar(50) NOT NULL,
  `userid` int(50) NOT NULL,
  `patientid` varchar(50) NOT NULL,
  `doctors_email` varchar(50) NOT NULL,
  `prescription` varchar(50) DEFAULT NULL,
  `pharmacist_email` varchar(50) DEFAULT NULL,
  `cost` int(50) NOT NULL,
  `status` enum('prescription_pending','prescription_competed','payment_prnding','payment_completed','received_drug') NOT NULL,
  `hospital_name` varchar(50) NOT NULL,
  `treatment_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `treatment`, `userid`, `patientid`, `doctors_email`, `prescription`, `pharmacist_email`, `cost`, `status`, `hospital_name`, `treatment_date`) VALUES
(1, 'dfe', 8, 'ruthb@hopecore.org', 'carson@hopecore.org ', '', '', 0, 'prescription_pending', '0', '2023-05-23 12:56:50'),
(2, 'malaria treatment', 24, 'cc@hopecore.org', 'dff@hopecore.org', '', '', 0, 'prescription_pending', '0', '2023-05-23 12:56:50'),
(3, 'tb treatment', 24, 'eddy@hopecore.org', 'dff@hopecore.org', '', '', 0, 'prescription_pending', '0', '2023-05-23 12:56:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `profession` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `serviceid` int(50) DEFAULT NULL,
  `phonenumber` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `drugid` int(50) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `supplier_company` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `specialization`, `profession`, `firstname`, `lastname`, `gender`, `adress`, `serviceid`, `phonenumber`, `email`, `password`, `drugid`, `status`, `supplier_company`) VALUES
(3, 'receptionist', 'truck driver', 'Bruno', 'Mars', 'male', '345.meru', NULL, '0766554432', 'bruno@gmail.org', 'bruno2022', NULL, 'approved', NULL),
(5, 'patient', 'patient', 'Martha', 'Gakii', 'Female', '345.meru', NULL, '', 'martha2022@gmail.org', '#Karibu2030', NULL, 'approved', NULL),
(112, 'patient', 'farmer', 'harizon', 'were', 'male', '12343 Kenya', 0, '0711301605', 'were@gmail.com', '#Were2023', NULL, 'approved', NULL),
(113, 'receptionist', 'receptionist', 'john', 'were', 'male', 'sd234', 2, '0711223344', 'jwere@gmail.com', '#Jwere2023', NULL, 'approved', NULL),
(117, 'doctor', 'dentist', 'harisson', 'wer', 'male', '12343 Kenya', 2, '0711301605', 'wer@gmail.com', '#Wer@2023', NULL, 'approved', NULL),
(118, 'patient', 'farmer', 'john', 'okoth', 'male', '12345 Nairobi', 0, '0711301122', 'okoth@gmail.com', '#Okoth2023', NULL, 'approved', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `appointments_ibfk_1` (`userid`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_test`
--
ALTER TABLE `lab_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serviceid` (`serviceid`),
  ADD KEY `drugid` (`drugid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `lab_test`
--
ALTER TABLE `lab_test`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
