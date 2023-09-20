-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2023 at 05:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dhmedzit_demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(100) NOT NULL,
  `img_url` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `ion_user_id`, `hospital_id`) VALUES
(84, NULL, 'Mr Accountant', 'accountant@hms.com', 'Collegepara, Rajbari', '+880123456789', NULL, '787', '466'),
(86, 'http://demo.medzit.com/uploads/malepatient9.jpg', 'Test Name', 'testname@lister.com', 'London', '7395816924', NULL, '900', '2'),
(87, NULL, 'Martin', 'martin@gmail.com', '-', '9840817654', NULL, '956', '24');

-- --------------------------------------------------------

--
-- Table structure for table `alloted_bed`
--

CREATE TABLE `alloted_bed` (
  `id` int(100) NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `a_time` varchar(100) DEFAULT NULL,
  `d_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `bed_id` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alloted_bed`
--

INSERT INTO `alloted_bed` (`id`, `number`, `category`, `patient`, `a_time`, `d_time`, `status`, `x`, `bed_id`, `patientname`, `hospital_id`) VALUES
(1, NULL, NULL, '3', '29 March 2023 - 02:55 AM', '30 March 2023 - 09:55 AM', NULL, NULL, 'OP Patients-01', 'George', '24');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `unique_id` varchar(30) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(30) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `patient_query` varchar(500) NOT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `channel_name` varchar(200) NOT NULL,
  `user` varchar(100) DEFAULT NULL,
  `access` varchar(2000) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `consult_type` varchar(200) DEFAULT NULL,
  `room_id` varchar(500) DEFAULT NULL,
  `live_meeting_link` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `transcation_id` varchar(100) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `department` varchar(50) NOT NULL DEFAULT 'Radiology',
  `attachment_image` varchar(500) DEFAULT NULL,
  `user_type` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `unique_id`, `patient`, `doctor`, `date`, `time_slot`, `s_time`, `e_time`, `remarks`, `add_date`, `patient_query`, `registration_time`, `s_time_key`, `status`, `channel_name`, `user`, `access`, `request`, `patientname`, `doctorname`, `consult_type`, `room_id`, `live_meeting_link`, `hospital_id`, `transcation_id`, `amount`, `type`, `department`, `attachment_image`, `user_type`) VALUES
(1, '911203', '1', '2', '1659394800', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Treated', '', NULL, NULL, NULL, 'Brayden ', 'Clara', '', NULL, NULL, '24', '2e4db961-a25e-439c-ba09-b3ed9dddd205', '5000', 'Cardiac CT', 'Cardiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220802090413.png', ''),
(2, '797538', '1', '1', '1659394800', NULL, NULL, NULL, 'Referred by Ardi', NULL, '', NULL, NULL, 'Referred', '', NULL, NULL, NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '28', '4505e566-3617-404a-9cb4-4f4a8217355d', '6000', 'CT BRAIN', 'Neurology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220802093217.png', ''),
(3, '418795', '1', '2', '1659394800', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Treated', '', NULL, NULL, NULL, 'Brayden ', 'Clara', '', NULL, NULL, '24', '8c01682b-5c8e-4b68-9f0f-f2616bd9c88f', '1000', 'MRI Brain', 'Radiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220802093527.png', ''),
(4, '631820', '1', '3', '1659394800', '19:00', NULL, NULL, ' ', '08/02/22', '', '1659449861', NULL, 'Cancelled', 'MEDZIT_4_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '907f2cb0-d271-4635-ba1b-7f7a7ef8eab8', '1500', '', 'Radiology', NULL, 'app_patient'),
(5, '', '1', NULL, '1659481200', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '5e2f1869-dbbc-4f8e-ba54-601974386381', '5000', 'Cardiac CT', 'Cardiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220803092119.png', ''),
(6, '', '1', NULL, '1659481200', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '24bc7b59-12ee-4057-87eb-69eaeb3371fd', '5000', 'Cardiac CT', 'Cardiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220803092312.png', ''),
(7, '226654', '2', '1', '1659654000', NULL, NULL, NULL, 'Referred by Ardi', NULL, '', NULL, NULL, 'Referred', '', NULL, NULL, NULL, 'George', 'Ardi', '', NULL, NULL, '28', 'faf51ec7-d135-490f-876d-7e4bac5421c1', '5000', 'Cardiac CT', 'Cardiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081253.png', ''),
(8, '867149', '2', '2', '1659654000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Treated', '', NULL, NULL, NULL, 'George', 'Clara', '', NULL, NULL, '24', 'ae241f75-9088-406f-9eb7-4ec5367ec382', '1000', 'MRI Brain', 'Radiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081433.png', ''),
(9, '711554', '2', '4', '1659654000', '13:00', NULL, NULL, 'Referred by Michael ', '08/05/22', '', '1659683828', NULL, 'Referred', 'MEDZIT_9_VID', NULL, NULL, NULL, 'George', 'Michael ', 'Walk-In', NULL, NULL, '24', 'a246414c-1653-40ae-be44-c6c0c401c1c1', '1500', '', 'Radiology', NULL, 'app_patient'),
(10, '', '2', '3', '1659654000', '13:00', NULL, NULL, ' ', '08/05/22', '', '1659683892', NULL, 'Cancelled', '', NULL, NULL, NULL, 'George', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '81339100-536d-4f05-b860-47274a0bf20c', '1500', '', 'Radiology', NULL, 'app_patient'),
(11, '', '2', '4', '1659654000', '13:00', NULL, NULL, NULL, '08/05/22', '', '1659683981', NULL, 'payment_pending', '', NULL, NULL, NULL, 'George', 'Michael ', 'Video Conferencing', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(12, '', '2', '4', '1659654000', '13:00', NULL, NULL, NULL, '08/05/22', '', '1659683993', NULL, 'payment_pending', '', NULL, NULL, NULL, 'George', 'Michael ', 'Video Conferencing', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(13, '', '2', '4', '1659654000', '13:00', NULL, NULL, NULL, '08/05/22', '', '1659683993', NULL, 'payment_pending', '', NULL, NULL, NULL, 'George', 'Michael ', 'Video Conferencing', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(14, '745541', '2', '4', '1659654000', '13:00', NULL, NULL, ' ', '08/05/22', '', '1659683993', NULL, 'Confirmed', 'MEDZIT_14_VID', NULL, NULL, NULL, 'George', 'Michael ', 'Video Conferencing', NULL, NULL, 'app_doctor', '33e928f7-b92b-4b89-9c08-7b20ec8b3104', '1500', '', 'Radiology', NULL, 'app_patient'),
(15, '231699', '2', '2', '1659654000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Treated', '', NULL, NULL, NULL, 'George', 'Clara', '', NULL, NULL, '24', 'b0ae6207-bfdc-432e-b9fd-a984bb90c00b', '7000', 'MRI SPINE', 'Radiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220805091750.png', ''),
(16, '886955', '2', '2', '1659654000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Treated', '', NULL, NULL, NULL, 'George', 'Clara', '', NULL, NULL, '24', '0ea6f9c2-11b6-472f-8c64-fa4fc93da574', '2500', 'X-Ray', 'Radiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220805091916.png', ''),
(17, '357889', '2', '1', '1659740400', NULL, NULL, NULL, ' ', NULL, '', NULL, NULL, 'Cancelled', '', NULL, NULL, NULL, 'George', 'Ardi', '', NULL, NULL, '24', '553751df-2c3f-4d9f-ae32-9249b4f0be2f', '5000', 'Cardiac CT', 'Cardiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220805105547.png', ''),
(18, '751035', '2', '4', '1659740400', '12:32', NULL, NULL, 'Referred by Michael ', '08/06/22', '', '1659769386', NULL, 'Referred', 'MEDZIT_18_VID', NULL, NULL, NULL, 'Mohammed Asif', 'Michael ', 'Walk-In', NULL, NULL, '24', '5ec5c5ce-9740-401a-9cd8-32a5dc226514', '1500', '', 'Radiology', NULL, 'app_patient'),
(19, '305334', '2', '1', '1659826800', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Mohammed Asif', 'Ardi', '', NULL, NULL, '24', 'aa36d62b-75b3-4621-86bf-3ce287e31d97', '5000', 'Cardiac CT', 'Cardiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220806081410.png', ''),
(20, '866969', '2', '1', '1659913200', NULL, NULL, NULL, 'Referred by Ardi', NULL, '', NULL, NULL, 'Referred', '', NULL, NULL, NULL, 'Mohammed Asif', 'Ardi', '', NULL, NULL, '36', '615e40d6-6807-40c8-83de-c8939669f7e3', '1000', 'MRI Brain', 'Radiology', 'http://midtrans.medzit.com/assets/images/user_attachments/20220807225928.png', ''),
(21, '640399', '2', '4', '1659913200', '3:30 AM', NULL, NULL, ' ', '08/07/22', '', '1659910611', NULL, 'Cancelled', 'MEDZIT_21_VID', NULL, NULL, NULL, 'Mohammed Asif', 'Michael ', 'Walk-In', NULL, NULL, '24', '17357c06-cd2d-47eb-aba4-b909aafddf2c', '1500', '', 'Radiology', NULL, 'app_patient'),
(22, '', '1', NULL, '1661295600', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Deleted', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220824051327.png', ''),
(23, '', '1', '', '1661295600', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', '', '', NULL, NULL, '40', '2f89ac38-1889-421d-8571-58da63441fd7', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220824173317.png', ''),
(24, '', '2', '', '1661554800', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Mohammed Asif', '', '', NULL, NULL, '28', '60ee575a-0b59-43c3-a664-8a59d4e87b93', '1000', 'MRI Brain', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220827115541.png', ''),
(25, '335971', '2', '1', '0', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Mohammed Asif', 'Ardi', '', NULL, NULL, '24', '14b99971-73e6-4a03-88f5-0e5d7563f4bc', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220827153714.png', ''),
(26, '631568', '2', '3', '1661727600', '11:40 PM', NULL, NULL, ' ', '08/27/22', '', '1661613002', NULL, 'Cancelled', 'MEDZIT_26_VID', NULL, NULL, NULL, 'Mohammed Asif', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '820123d7-1a99-4c86-b236-9443ca1747b3', '1500', '', 'Radiology', NULL, 'app_patient'),
(27, '', '2', '4', '1661554800', '20:40', NULL, NULL, NULL, '08/27/22', '', '1661613016', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Mohammed Asif', 'Michael ', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(28, '', '2', '4', '1661554800', '20:40', NULL, NULL, NULL, '08/27/22', '', '1661613084', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Mohammed Asif', 'Michael ', 'Walk-In', NULL, NULL, 'app_doctor', 'f31f30ec-50de-46ce-9e7d-25ac91bc8dd2', '1500', '', 'Radiology', NULL, 'app_patient'),
(29, '112395', '2', '', '0', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Mohammed Asif', '', '', NULL, NULL, '36', '86526fed-6582-4c48-b436-99fc4dcee415', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220827161457.png', ''),
(30, '272549', '2', '3', '1661641200', '9:00 PM', NULL, NULL, ' ', '08/27/22', '', '1661613405', NULL, 'Confirmed', 'MEDZIT_30_VID', NULL, NULL, NULL, 'Mohammed Asif', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '0ed2f433-96d8-42c8-a785-9ebbe7613f4b', '1500', '', 'Radiology', NULL, 'app_patient'),
(31, '504227', '2', '', '1661814000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Mohammed Asif', NULL, '', NULL, NULL, '24', 'a28afad4-6961-4bf8-a997-4eec4af866b9', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220830084642.png', ''),
(32, '210378', '1', '3', '1662073200', '3:35 PM', NULL, NULL, ' ', '09/02/22', '', '1662113044', NULL, 'Confirmed', 'MEDZIT_32_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '6ad3a97f-ca39-4d51-a3cf-4f94ebfdf062', '1500', '', 'Radiology', NULL, 'app_patient'),
(33, '368343', '2', '1', '1662418800', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Mohammed Asif', 'Ardi', '', NULL, NULL, '24', 'c38d33c9-e845-4e34-9a94-b34ad0d3f402', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220905124706.png', ''),
(34, '281980', '1', '', '1662505200', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', '', '', NULL, NULL, '28', 'b2597538-f706-47a2-8a01-224ca5defa93', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220906200439.png', ''),
(35, '864764', '1', '3', '1662505200', '00:40', NULL, NULL, ' ', '09/06/22', '', '1662491319', NULL, 'Cancelled', 'MEDZIT_35_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '3a3889ca-ea99-4736-8375-6f65bd4e6e07', '1500', '', 'Radiology', NULL, 'app_patient'),
(36, '644241', '1', '', '1662591600', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', '', '', NULL, NULL, '28', 'fc387299-52e5-4e51-99a5-9970b3096d12', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220908160722.png', ''),
(37, '', '2', NULL, '0', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Mohammed Asif', NULL, '', NULL, NULL, '24', 'd16663dd-1636-46a7-90e2-cf0efb218ad5', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220908164304.png', ''),
(38, '499882', '1', '', '1662678000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', '', '', NULL, NULL, '28', 'dfe25825-12d1-4119-8af3-92e27ebd0f41', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220909102323.png', ''),
(39, '913612', '1', '', '1663887600', '11:00 AM To 11:20 AM', '11:00 AM', '11:20 AM', 'Test1', '09/09/22', '', '1662719355', '132', 'Confirmed', '', '909', NULL, '', 'Brayden ', '', '', 'hms-meeting-7395816924-298446-24', 'https://meet.jit.si/hms-meeting-7395816924-298446-24', '28', '', '', '', 'Radiology', NULL, ''),
(40, '', '1', '', '1663887600', 'Not Selected', 'Not Selected', '', 'Referred for Labs', '09/09/22', '', '1662720081', '0', 'Pending Confirmation', '', '909', NULL, '', 'Brayden ', '', '', 'hms-meeting-7395816924-241065-24', 'https://meet.jit.si/hms-meeting-7395816924-241065-24', '28', '', '', '', 'Radiology', NULL, ''),
(41, '126613', '1', '', '1663801200', 'Not Selected', 'Not Selected', '', 'Referred for Labs 2', '09/09/22', '', '1662720132', '0', 'Confirmed', '', '909', NULL, '', 'Brayden ', '', '', 'hms-meeting-7395816924-55529-24', 'https://meet.jit.si/hms-meeting-7395816924-55529-24', '36', '', '', '', 'Radiology', NULL, ''),
(42, '356023', '3', '', '1664492400', NULL, '', '', 'Referred for Labs 3', '09/09/22', '', '1662720909', '0', 'Confirmed', '', '909', NULL, '', 'George', '', '', 'hms-meeting-7851555222-86631-24', 'https://meet.jit.si/hms-meeting-7851555222-86631-24', '28', '', '', '', 'Radiology', NULL, ''),
(43, '', '2', NULL, '0', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Mohammed Asif', NULL, '', NULL, NULL, '24', 'fe7d258b-08fd-4ff1-ac6b-89960cfdc6cb', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220909171342.png', ''),
(44, '767704', '1', '3', '1662850800', '11:40 PM', NULL, NULL, ' ', '09/09/22', '', '1662747050', NULL, 'Treated', 'MED_TEST', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '1525a5d3-431b-4023-add1-74096d56f323', '1500', '', 'Radiology', NULL, 'app_patient'),
(45, '', '1', NULL, '0', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Deleted', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220909204838.png', ''),
(46, '870530', '3', '', '1662937200', 'Not Selected', 'Not Selected', '', 'Referred for lab ', '09/10/22', '', '1662789908', '0', 'Confirmed', '', '909', NULL, '', 'George', '', '', 'hms-meeting-7851555222-507158-24', 'https://meet.jit.si/hms-meeting-7851555222-507158-24', '28', '', '', '', 'Radiology', NULL, ''),
(47, '', '1', NULL, '0', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Deleted', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220914063957.png', ''),
(48, '', '1', NULL, '1663110000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Deleted', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220914084227.png', ''),
(49, '', '1', NULL, '0', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '92fd51b2-0bf9-49a4-9801-8fb1a30e19b0', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220914114123.png', ''),
(54, '712772', '8', '1', '1663282800', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Ardiansa', 'Ardi', '', NULL, NULL, '24', '4754790f-1e22-4830-8cc6-22c4d104632d', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916101158.png', ''),
(51, '996292', '8', '1', '1663110000', 'Not Selected', 'Not Selected', '', 'Referred by Ardi', NULL, '', NULL, '0', 'Referred', '', '913', NULL, '', 'Ardiansa', 'Ardi', '', NULL, NULL, '24', '7435ee51-8d17-403a-af56-7d63f89f17d0', '2900', 'CT Abdomen', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220914161832.png', ''),
(61, '697174', '6', '1', '1663282800', '11:40 AM To 12:00 AM', '11:40 AM', '12:00 AM', '', NULL, '', NULL, '140', 'Confirmed', '', '913', NULL, '', 'Fazeel', 'Ardi', '', NULL, NULL, '24', 'c530ff2a-96f1-4397-a47d-0511ec157b91', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916152542.png', ''),
(53, '988597', '8', '1', '1663282800', '11:00 AM To 11:20 AM', '11:00 AM', '11:20 AM', '', NULL, '', NULL, '132', 'Confirmed', '', '913', NULL, '', 'Ardiansa', 'Ardi', '', NULL, NULL, '24', '8e20abfa-d97e-4b9e-b19f-1ed753840cb3', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916045521.png', ''),
(55, '964933', '1', '2', '1663282800', '10:15 AM To 10:30 AM', '10:15 AM', '10:30 AM', '', NULL, '', NULL, '123', 'Confirmed', '', '914', NULL, '', 'Brayden ', 'Clara', '', NULL, NULL, '24', '0aa888b7-4aa2-436d-811e-49ddbdfe5d20', '2500', 'X-Ray', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916101521.png', ''),
(56, '576701', '1', '', '1663282800', '10:00 AM To 10:15 AM', '10:00 AM', '10:15 AM', '', NULL, '', NULL, '120', 'Confirmed', '', '914', '2,24', '', 'Brayden ', '', '', NULL, NULL, '28', '1b15f338-b185-4ee1-8daa-0748035c0162', '2900', 'CT Abdomen', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916102208.png', ''),
(57, '358219', '2', '2', '1663282800', '10:30 AM To 10:45 AM', '10:30 AM', '10:45 AM', '', NULL, '', NULL, '126', 'Confirmed', '', '914', NULL, '', 'Mohammed Asif', 'Clara', '', NULL, NULL, '24', 'b7e37b60-af5d-4fe4-af78-8489df99981d', '1000', 'MRI Brain', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916102807.png', ''),
(58, '711662', '6', '2', '1663282800', '10:45 AM To 11:00 AM', '10:45 AM', '11:00 AM', '', NULL, '', NULL, '129', 'Treated', '', '914', NULL, '', 'Fazeel', 'Clara', '', NULL, NULL, '24', 'df744b6b-3a8d-4101-9b81-97630abcb6c2', '2500', 'X-Ray', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916104800.png', ''),
(59, '879608', '6', '1', '0', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Fazeel', 'Ardi', '', NULL, NULL, '24', 'd640bdb2-4ba3-4f37-870e-bc6a6cdc0353', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916110248.png', ''),
(63, '', '1', NULL, '0', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', 'b39360e0-e8c8-4d28-8846-8cbc41614155', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220917075125.png', ''),
(62, '220178', '1', '', '1663282800', '10:40 AM To 11:00 AM', '10:40 AM', '11:00 AM', '', NULL, '', NULL, '128', 'Confirmed', '', '913', NULL, '', 'Brayden ', '', '', NULL, NULL, '28', 'd32f2283-661a-4bc2-a626-883c8e0dc684', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220916153025.png', ''),
(64, '', '1', NULL, '0', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220917083714.png', ''),
(65, '823729', '2', '1', '1663455600', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Mohammed Asif', 'Ardi', '', NULL, NULL, '24', '0d074fad-4b61-40f4-a7c5-37f9274e7b0b', '7000', 'MRI SPINE', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220917104537.png', ''),
(66, '565905', '2', '', '1663887600', '10:00 AM To 10:20 AM', '10:00 AM', '10:20 AM', '', '09/18/22', '', '1663476776', '120', 'Pending Confirmation', '', '909', NULL, '', 'Mohammed Asif', NULL, '', 'hms-meeting-9790988461-221231-24', 'https://meet.jit.si/hms-meeting-9790988461-221231-24', '28', '', '', '', 'Radiology', NULL, ''),
(67, '364453', '1', '', '1663455600', 'Not Selected', 'Not Selected', '', '', '09/18/22', '', '1663486131', '0', 'Confirmed', '', '909', NULL, '', 'Brayden ', '', '', 'hms-meeting-7395816924-55503-24', 'https://meet.jit.si/hms-meeting-7395816924-55503-24', '28', '', '', '', 'Radiology', NULL, ''),
(68, '', '8', '3', '1663542000', '09:30', NULL, NULL, NULL, '09/19/22', '', '1663553550', NULL, 'Deleted', '', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(69, '', '8', NULL, '1663542000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Ardiansa', NULL, '', NULL, NULL, '24', '24860351-590b-4667-abbd-246e13e25500', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220919052238.png', ''),
(70, '', '8', NULL, '1663542000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ardiansa', NULL, '', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220919052243.png', ''),
(71, '', '8', NULL, '1663542000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ardiansa', NULL, '', NULL, NULL, '24', '', '2000', 'General Consultation', 'Neurology', 'http://dhmedzit.com/assets/images/user_attachments/20220919075530.png', ''),
(72, '', '8', NULL, '1663542000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ardiansa', NULL, '', NULL, NULL, '24', '', '2000', 'General Consultation', 'Neurology', 'http://dhmedzit.com/assets/images/user_attachments/20220919075538.png', ''),
(73, '567806', '8', '9', '1663542000', NULL, NULL, NULL, 'Noted', NULL, '', NULL, NULL, 'Confirmed', '', NULL, NULL, NULL, 'Ardiansa', 'Ahmad', '', NULL, NULL, '24', '482bb82e-74a4-48bf-8e46-822a2688dd18', '2000', 'General Consultation', 'Neurology', 'http://dhmedzit.com/assets/images/user_attachments/20220919075601.png', ''),
(74, '', '8', NULL, '1663542000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Ardiansa', NULL, '', NULL, NULL, '24', 'f89f4dfb-a08f-4d2e-9437-facf11a411b2', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220919103154.png', ''),
(75, '', '1', NULL, '1663542000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '4810f526-1e6b-4e83-bc99-f188dbc52f6e', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220919111609.png', ''),
(76, '562924', '1', '', '1663542000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,1', NULL, 'Brayden ', '', '', NULL, NULL, '28', '971705e0-687c-41ea-af05-7cad27db0615', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220919122556.png', ''),
(77, '595534', '1', '', '1663628400', 'Not Selected', 'Not Selected', '', 'Referred to Pratama Lab by Kenmugi', '09/19/22', '', '1663587015', '0', 'Treated', '', '909', 'hos_28,24,,28', '', 'Brayden ', NULL, '', 'hms-meeting-7395816924-75908-24', 'https://meet.jit.si/hms-meeting-7395816924-75908-24', '28', '', '', '', 'Radiology', NULL, ''),
(78, '', '1', '', '1663714800', 'Not Selected', 'Not Selected', '', 'Lab Tests are completed', '09/19/22', '', '1663587262', '0', 'Pending Confirmation', '', '915', 'hos_24,28', '', NULL, NULL, '', 'hms-meeting--890620-28', 'https://meet.jit.si/hms-meeting--890620-28', '28', '', '', '', 'Radiology', NULL, ''),
(79, '', '8', '3', '1663628400', '09:30', NULL, NULL, NULL, '09/20/22', '', '1663640793', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(80, '', '8', NULL, '1663628400', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Ardiansa', NULL, '', NULL, NULL, '24', '73e43f79-3d41-4e19-b2ec-83b5c4ec1011', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220920032720.png', ''),
(81, '888809', '8', '3', '1663628400', '10:15', NULL, NULL, ' ', '09/20/22', '', '1663643131', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '483e3757-a881-44bd-9404-e781a3ca2638', '1500', '', 'Radiology', NULL, 'app_patient'),
(82, '718738', '8', '1', '1663714800', NULL, NULL, NULL, 'refer Anvika from Lister', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,1,36', NULL, 'Ardiansa', 'Ardi', '', NULL, NULL, '36', '8e564756-c572-4ed5-ab3c-629ddfba20a9', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220921102930.png', ''),
(83, '423402', '8', '3', '1663714800', '17:10', NULL, NULL, ' ', '09/21/22', '', '1663754854', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '076e4ed9-d791-465e-9939-2ebb4324f9b3', '1500', '', 'Radiology', NULL, 'app_patient'),
(84, '869786', '2', '3', '1663714800', '3:43 PM', NULL, NULL, ' ', '09/21/22', '', '1663755159', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Mohammed Asif', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'f9cebd3e-e316-4e49-a3d8-f4fe97dff49e', '1500', '', 'Radiology', NULL, 'app_patient'),
(85, '781343', '2', '3', '1663714800', '3:55 PM', NULL, NULL, ' ', '09/21/22', '', '1663755827', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Mohammed Asif', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'c5bad8c1-570a-4171-98c5-9747cb62c841', '1500', '', 'Radiology', NULL, 'app_patient'),
(86, '883029', '1', '1', '1663714800', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Treated', '', NULL, '24,,1', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', 'aad942ba-efab-4e72-97f9-9fd5f6bac97c', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220921163841.png', ''),
(87, '665180', '1', '1', '1663801200', NULL, NULL, NULL, ' ', NULL, '', NULL, NULL, 'Treated', '', NULL, '24,,1', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', '9bb30cf2-8754-4784-8dd4-ebaaeaf141b1', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220922065034.png', ''),
(88, '803627', '1', '3', '1663801200', '11:55', NULL, NULL, ' ', '09/22/22', '', '1663826702', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'dcd90413-f977-4f46-8e9b-5dddf3d0a3ff', '1500', '', 'Radiology', NULL, 'app_patient'),
(89, '667932', '1', '10', '1663801200', NULL, NULL, NULL, ' ', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,10', NULL, 'Brayden ', 'Emmanuel', '', NULL, NULL, '24', 'e064f44a-3ec0-423a-93a3-9ae4e61146d8', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220922074238.png', ''),
(90, '110732', '1', '1', '1663801200', '10:20 AM To 10:40 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,1', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', 'e4eeba19-b5f6-450f-86de-56999d3cb627', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220922074626.png', ''),
(91, '', '8', NULL, '1663887600', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Ardiansa', NULL, '', NULL, NULL, '24', '9742e5dd-8092-4032-8a3b-e11ac05d5ef4', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220923075409.png', ''),
(92, '491151', '1', '1', '1663974000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', '413325e4-9f92-474d-a1b0-0e9d5d794b21', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220924062253.png', ''),
(93, '', '8', '3', '1663974000', '11:16', NULL, NULL, NULL, '09/24/22', '', '1663998472', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(94, '957978', '8', '3', '1663974000', '11:18', NULL, NULL, ' ', '09/24/22', '', '1663998498', NULL, 'Treated', 'MED_TEST', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '9a05a61f-2c48-4f01-8eba-74071412c8fb', '1500', '', 'Radiology', NULL, 'app_patient'),
(95, '241221', '2', '3', '1663974000', '11:57', NULL, NULL, ' ', '09/24/22', '', '1664000834', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Mohammed Asif', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'd6121db0-5c17-4981-82a6-6eab9d7d3a96', '1500', '', 'Radiology', NULL, 'app_patient'),
(96, '500966', '13', '1', '1663974000', NULL, NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,', NULL, 'Aad', 'Ardi', '', NULL, NULL, '24', 'f8b5326f-dd40-44a4-9298-c951cf913345', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220924072939.png', ''),
(97, '844900', '13', '3', '1663974000', '12:02 PM', NULL, NULL, ' ', '09/24/22', '', '1664001184', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Aad', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '748782e5-348f-47a8-940f-95d193f07c96', '1500', '', 'Radiology', NULL, 'app_patient'),
(98, '759640', '13', '3', '1663974000', '12:08 PM', NULL, NULL, ' ', '09/24/22', '', '1664001515', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Aad', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '8e15fa2c-dc96-46fa-8c85-222dae0f3bf0', '1500', '', 'Radiology', NULL, 'app_patient'),
(100, '210300', '13', '1', '1663974000', '11:15 AM To 11:30 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,1', NULL, 'Aad', 'Ardi', '', NULL, NULL, '24', 'e45cac57-246a-4146-9cfe-4310d4622a3a', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220924084658.png', ''),
(99, '430323', '1', '1', '1663974000', '10:45 AM To 11:00 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,1', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', '4f849bbb-5e11-4cb8-92bb-892174aac511', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220924075128.png', ''),
(101, '748107', '14', '1', '1663974000', '10:00 AM To 10:15 AM', NULL, NULL, 'special appointment', NULL, '', NULL, NULL, 'Treated', '', NULL, '24,1', NULL, 'Aadh', 'Ardi', '', NULL, NULL, '24', 'fd0a0777-27d7-43e2-90ab-46b13fa08dde', '1000', 'MRI Brain', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220924102835.png', ''),
(102, '317642', '1', '1', '1663974000', '12:00 AM To 12:15 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Treated', '', NULL, '24,1', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', '3d84976a-3fde-4341-b9da-ba3267a1711d', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220924105307.png', ''),
(103, '737348', '14', '1', '1663974000', '10:15 AM To 10:30 AM', NULL, NULL, ' ', NULL, '', NULL, NULL, 'Treated', '', NULL, '24', NULL, 'Aadh', 'Ardi', '', NULL, NULL, '24', '107c087b-89e5-41b7-ac6e-c2f1a0e2f3b2', '2500', 'X-Ray', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220924110258.png', ''),
(104, '249135', '14', '3', '1663974000', '3:44 PM', NULL, NULL, ' ', '09/24/22', '', '1664014502', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Aadh', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '8cf4839b-8b98-4abd-b077-22c897a51d1a', '1500', '', 'Radiology', NULL, 'app_patient'),
(105, '662790', '14', '1', '1663974000', '10:30 AM To 10:45 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,', NULL, 'Aadh', 'Ardi', '', NULL, NULL, '24', 'c6400439-2b7a-4d8b-8682-69343c73c0a1', '2500', 'X-Ray', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220924120308.png', ''),
(106, '210322', '1', '1', '1663974000', '11:00 AM To 11:15 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', '990d6a21-716a-4f9b-9247-b0e1f68bd48f', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220924120335.png', ''),
(107, '', '14', '3', '1663974000', '4:53 PM', NULL, NULL, NULL, '09/24/22', '', '1664018605', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Aadh', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', 'c9085543-0cbd-4600-b7de-54ea6b244008', '1500', '', 'Radiology', NULL, 'app_patient'),
(108, '', '1', NULL, '1663974000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, '', NULL, NULL, '24', 'da2333af-5309-458e-8844-6c199cc6654a', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220924181252.png', ''),
(109, '', '1', '3', '1664060400', '2:18 PM', NULL, NULL, NULL, '09/25/22', '', '1664095720', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '57530a54-19d5-44a5-92e2-34c9c6d78e59', '1500', '', 'Radiology', NULL, 'app_patient'),
(110, '', '1', '4', '1664060400', '2:20 PM', NULL, NULL, NULL, '09/25/22', '', '1664095866', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', 'Michael ', 'Walk-In', NULL, NULL, 'app_doctor', '3649e23a-0964-4c3e-af4b-5a4d9dd140a5', '1500', '', 'Radiology', NULL, 'app_patient'),
(111, '', '1', '3', '1664060400', '5:21 PM', NULL, NULL, NULL, '09/25/22', '', '1664095920', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', 'ef37a590-0273-4d4f-a904-33b536a607c9', '1500', '', 'Radiology', NULL, 'app_patient'),
(112, '', '1', '3', '1664060400', '6:24 PM', NULL, NULL, NULL, '09/25/22', '', '1664096070', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', 'fdf065ff-ed0a-4589-a332-4e6449a28d1c', '1500', '', 'Radiology', NULL, 'app_patient'),
(113, '400448', '1', '3', '1664146800', '4:29 PM', NULL, NULL, ' ', '09/25/22', '', '1664103606', NULL, 'Confirmed', 'MEDZIT_113_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'eb686799-c123-4d76-89ef-9d68886c4f75', '1500', '', 'Radiology', NULL, 'app_patient'),
(114, '758504', '15', '1', '1664146800', '02:00 PM To 02:15 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,1', NULL, 'Sadh', 'Ardi', '', NULL, NULL, '24', '2f99729a-fcfe-4116-9c0a-5fdb1a26b6e3', '2900', 'CT Abdomen', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220925195648.png', ''),
(115, '266287', '15', '1', '1664146800', '02:15 PM To 02:30 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,', NULL, 'Sadh', 'Ardi', '', NULL, NULL, '24', 'b9a1e29b-a6ae-43fe-a6f7-f5e354d3dc07', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220925200218.png', ''),
(116, '777309', '15', '3', '1664146800', '1:04 AM', NULL, NULL, ' ', '09/25/22', '', '1664134483', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Sadh', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'da50beef-5115-4663-b768-95fca23677a0', '1500', '', 'Radiology', NULL, 'app_patient'),
(117, '832268', '8', '1', '1664146800', '01:15 PM To 01:30 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,10', NULL, 'Ardiansa', 'Ardi', '', NULL, NULL, '24', '70f16191-68da-4fc9-9dc5-0c1ba9b3aad5', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220926023850.png', ''),
(118, '400742', '1', '3', '1664233200', '9:51 AM', NULL, NULL, ' ', '09/26/22', '', '1664166076', NULL, 'Confirmed', 'MED_TEST', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '901cae2f-441a-4829-b426-62c27368b1d1', '1500', '', 'Radiology', NULL, 'app_patient'),
(119, '552169', '8', '3', '1664146800', '11:40', NULL, NULL, ' ', '09/26/22', '', '1664167045', NULL, 'Confirmed', 'MEDZIT_119_VID', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'ba2a2072-5c1b-4be7-8b6a-b5a06915e523', '1500', '', 'Radiology', NULL, 'app_patient'),
(120, '671791', '8', '1', '1664146800', '11:00 AM To 11:20 AM', NULL, NULL, ' ', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24,,1', NULL, 'Ardiansa', 'Ardi', '', NULL, NULL, '24', '0e4be81b-0160-4027-bc12-b74296c1fff1', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220926094301.png', ''),
(121, '413816', '1', '1', '1664146800', '03:00 PM To 03:15 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', '8146883f-66bd-4464-bac0-f829fdca33a3', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220926162342.png', ''),
(122, '', '1', NULL, '1664233200', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '36ed4340-6d01-4495-9f1d-29392ba92888', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220926203915.png', ''),
(123, '', '1', NULL, '1664319600', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '1ca265b6-3c5c-4a6a-a837-6fa7d32f1c10', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220926204043.png', ''),
(124, '', '1', NULL, '1664492400', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, '', NULL, NULL, '24', 'f636fd9c-7ea7-4b23-bb5a-1d0a6d9e9beb', '6000', 'CT BRAIN', 'Neurology', 'http://dhmedzit.com/assets/images/user_attachments/20220926204212.png', ''),
(125, '', '1', NULL, '1664233200', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, '', NULL, NULL, '24', '4a278bb9-f545-4238-b029-844d50dbc587', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220926212115.png', ''),
(126, '473375', '1', '1', '1664233200', '01:00 PM To 01:15 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24', NULL, 'Brayden ', 'Ardi', '', NULL, NULL, '24', 'b4d3800a-3d92-4465-97b2-40bf5b68987e', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220926212313.png', ''),
(127, '193052', '8', '1', '1664319600', '12:20 PM To 12:40 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24', NULL, 'Ardiansa', 'Ardi', 'Video Conferencing', NULL, NULL, '24', 'ce70d817-55ac-4750-8331-9053334d1e63', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220928052244.png', ''),
(128, '', '15', NULL, '1664319600', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Sadh', NULL, 'Walk-In', NULL, NULL, '24', 'a3103f3f-b059-465b-b4d0-2d1c1509b5e2', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220928063054.png', ''),
(129, '664782', '1', '1', '1664319600', '11:20 AM To 11:40 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', '', NULL, '24', NULL, 'Brayden ', 'Ardi', 'Video Conferencing', NULL, NULL, '24', '87696f6c-587a-495c-92ae-0d0356d2e7be', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20220928065026.png', ''),
(130, '463750', '8', '3', '1664319600', '13:00', NULL, NULL, ' ', '09/28/22', '', '1664344692', NULL, 'Confirmed', 'MEDZIT_130_VID', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '9b3fc5d2-cde3-43e0-acc1-e5b7e81b2564', '1500', '', 'Radiology', NULL, 'app_patient'),
(131, '975078', '1', '3', '1664319600', '11:28', NULL, NULL, ' ', '09/28/22', '', '1664344717', NULL, 'Confirmed', 'MEDZIT_131_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'e83afc89-29fe-48c7-8867-19ef80d23f96', '1500', '', 'Radiology', NULL, 'app_patient'),
(132, '862192', '1', '3', '1664319600', '13:09', NULL, NULL, ' ', '09/28/22', '', '1664350746', NULL, 'Confirmed', 'MEDZIT_132_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'c7ebab22-b066-458a-87da-6117c2bbed80', '1500', '', 'Radiology', NULL, 'app_patient'),
(133, '153348', '1', '3', '1664319600', '13:45', NULL, NULL, ' ', '09/28/22', '', '1664352864', NULL, 'Confirmed', 'MEDZIT_133_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'c614c1b9-a7d8-401a-b6df-208106b6b217', '1500', '', 'Radiology', NULL, 'app_patient'),
(134, '457294', '1', '1', '1664319600', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_134_VID', NULL, '24,1', NULL, 'Brayden ', 'Ardi', 'Video Conferencing', NULL, NULL, '24', '1b0a6493-f40b-4f72-9de0-47d2e983735e', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220928192923.png', ''),
(135, '629844', '8', '3', '1664406000', '10:15', NULL, NULL, ' ', '09/29/22', '', '1664421332', NULL, 'Confirmed', 'MEDZIT_135_VID', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', 'e993d251-b775-4699-b031-430c46df30d2', '1500', '', 'Radiology', NULL, 'app_patient'),
(136, '835441', '8', '1', '1664406000', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_136_VID', NULL, '24,1', NULL, 'Ardiansa', 'Ardi', 'Video Conferencing', NULL, NULL, '24', 'd69ce155-5992-4172-b726-5b36db0e2fe5', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220929042100.png', ''),
(137, '802607', '1', '1', '1664406000', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_137_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Video Conferencing', NULL, NULL, '24', '1f234d54-4e8e-4490-b99b-82330e0e6b9a', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220929074940.png', ''),
(138, '958467', '1', '3', '1664406000', '12:00', NULL, NULL, ' ', '09/29/22', '', '1664434580', NULL, 'Confirmed', 'MEDZIT_138_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Conferencing', NULL, NULL, 'app_doctor', '901a9b4f-0cfa-424b-a123-36e5578abcaf', '1500', '', 'Radiology', NULL, 'app_patient'),
(139, '', '1', NULL, '1664492400', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, 'Video Consult', NULL, NULL, '24', 'ce96de4d-237e-4c1b-aafb-8cb85acae9ad', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220929081715.png', ''),
(140, '978907', '1', '3', '1664492400', '6:48 PM', NULL, NULL, ' ', '09/29/22', '', '1664435948', NULL, 'Confirmed', 'MEDZIT_140_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', 'b1e62cec-990c-4af3-9ad2-ff34280374dc', '1500', '', 'Radiology', NULL, 'app_patient'),
(141, '972208', '15', '1', '1664406000', '01:20 PM To 01:40 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_141_VID', NULL, '24,', NULL, 'Sadh', 'Ardi', 'Video Consult', NULL, NULL, '24', 'fd081733-8f1c-4ad0-8ea8-75de888a89fb', '2900', 'CT Abdomen', 'Radiology', 'http://dhmedzit.com/assets/images/user_attachments/20220929092636.png', ''),
(142, '140253', '15', '3', '1664406000', '14:10', NULL, NULL, ' ', '09/29/22', '', '1664440742', NULL, 'Confirmed', 'MEDZIT_142_VID', NULL, NULL, NULL, 'Sadh', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', 'b09f493a-2d33-4d94-8921-2e463d58501c', '1500', '', 'Radiology', NULL, 'app_patient'),
(143, '555570', '1', '3', '1664492400', '4:31 PM', NULL, NULL, ' ', '09/29/22', '', '1664442071', NULL, 'Confirmed', 'MEDZIT_143_VID', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', 'd9110d82-9cd0-4b9d-9ca7-c3cee47f9a48', '1500', '', 'Radiology', NULL, 'app_patient'),
(144, '', '1', NULL, '1664492400', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Video Consult', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220929100512.png', ''),
(145, '106853', '1', '1', '1664492400', '01:40 PM To 02:00 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_145_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Video Consult', NULL, NULL, '24', '612d84e0-ef3c-497e-a322-2a76ab16613d', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220929100631.png', ''),
(146, '', '1', '3', '1664492400', '6:53 PM', NULL, NULL, NULL, '09/29/22', '', '1664448837', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(147, '', '1', '3', '1664492400', '7:43 PM', NULL, NULL, NULL, '09/29/22', '', '1664451815', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(148, '146319', '15', '1', '1664406000', '04:40 PM To 05:00 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_148_VID', NULL, '24,', NULL, 'Sadh', 'Ardi', 'Video Consult', NULL, NULL, '24', '4c4d736a-beaf-42cc-ae8c-41e40b1da163', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220929130411.png', ''),
(149, '', '15', '4', '1664406000', '5:35 PM', NULL, NULL, NULL, '09/29/22', '', '1664453131', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Sadh', 'Michael ', 'Video Consult', NULL, NULL, 'app_doctor', 'e9b1bf6e-f510-4c0b-80b8-be8cb665603e', '1500', '', 'Radiology', NULL, 'app_patient'),
(150, '820854', '15', '3', '1664406000', '17:25', NULL, NULL, ' ', '09/29/22', '', '1664453539', NULL, 'Confirmed', 'MEDZIT_150_VID', NULL, NULL, NULL, 'Sadh', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', '0c438ea2-7be5-45cd-a9be-28d3d3eb03f4', '1500', '', 'Radiology', NULL, 'app_patient'),
(151, '517709', '2', '1', '1664492400', '05:00 PM To 05:20 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_151_VID', NULL, '24,,1', NULL, 'Mohammed Asif', 'Ardi', 'Video Consult', NULL, NULL, '24', '9c900605-5bed-49f2-8fbd-00492b6dd23e', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220929182234.png', ''),
(152, '', '1', '3', '1664492400', '19:45', NULL, NULL, NULL, '09/29/22', '', '1664483035', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(153, '', '1', '3', '1664492400', '21:30', NULL, NULL, NULL, '09/29/22', '', '1664483076', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(154, '265618', '8', '1', '1664492400', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_154_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', '0e0a863a-cde7-4dd4-9c03-da10012cf555', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20220930032239.png', ''),
(155, '', '8', NULL, '1664578800', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Video Consult', NULL, NULL, '24', '2c79ad62-582b-4347-95cc-00bf640628b3', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20221001044900.png', ''),
(156, '192478', '8', '1', '1664578800', '11:00 AM To 11:15 AM', NULL, NULL, ' ', NULL, '', NULL, NULL, 'Treated', 'MEDZIT_156_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', 'a505c3aa-511d-4ca8-a476-5092163c6be4', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20221001045203.png', ''),
(157, '', '2', NULL, '1664665200', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Mohammed Asif', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20221001152349.png', ''),
(158, '498066', '2', '1', '1664665200', 'Not Selected', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_158_VID', NULL, '24,', NULL, 'Mohammed Asif', 'Ardi', 'Walk-In', NULL, NULL, '24', '55c8db87-f5e0-42a0-9c6a-e4e4d9fc8b8a', '5000', 'Cardiac CT', 'Cardiology', 'http://dhmedzit.com/assets/images/user_attachments/20221001152449.png', ''),
(159, '', '8', NULL, '1665010800', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Video Consult', NULL, NULL, '24', 'c03ab577-4a18-4454-8b42-6859a7aba084', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20221005103340.png', ''),
(160, '', '9', '3', '1665442800', '20:02', NULL, NULL, NULL, '10/08/22', '', '1665239550', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Shameed', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', '2fdf363c-8599-4f23-acd7-8fb79cd5c20f', '1500', '', 'Radiology', NULL, 'app_patient'),
(161, '364347', '8', '1', '1665442800', '04:45 PM To 05:00 PM', NULL, NULL, ' ', NULL, '', NULL, NULL, 'Treated', 'MEDZIT_161_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', '6d03c048-08b5-45fb-ba32-f35f30325e72', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20221011103832.png', '');
INSERT INTO `appointment` (`id`, `unique_id`, `patient`, `doctor`, `date`, `time_slot`, `s_time`, `e_time`, `remarks`, `add_date`, `patient_query`, `registration_time`, `s_time_key`, `status`, `channel_name`, `user`, `access`, `request`, `patientname`, `doctorname`, `consult_type`, `room_id`, `live_meeting_link`, `hospital_id`, `transcation_id`, `amount`, `type`, `department`, `attachment_image`, `user_type`) VALUES
(162, '953846', '16', '1', '1665702000', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_162_VID', NULL, '24,', NULL, 'Andy C Kamili', 'Ardi', 'Video Consult', NULL, NULL, '24', '9c745671-ada0-4ebe-a0cb-e004999607e0', '2000', 'Dokter Umum', 'General Consultation', 'http://dhmedzit.com/assets/images/user_attachments/20221014034535.png', ''),
(163, '', '9', NULL, '1665874800', NULL, NULL, NULL, NULL, NULL, 'Testing summary', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Shameed', NULL, 'Video Consult', NULL, NULL, '24', 'd699996d-efec-4cef-b3e0-8cc793cd247b', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221015200344.png', ''),
(164, '', '9', NULL, '1666220400', NULL, NULL, NULL, NULL, NULL, 'testing summary', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Shameed', NULL, 'Video Consult', NULL, NULL, '24', 'f0997e1a-c774-449b-84b8-b6ef076ca928', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221015200542.png', ''),
(165, '', '9', '', '1666134000', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Pending Confirmation', '', NULL, '24,', NULL, 'Shameed', NULL, 'Video Consult', NULL, NULL, '24', 'c9f53bc8-d3c6-47d8-8c9c-f182e5981e98', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221015200718.png', ''),
(166, '', '8', '3', '1666134000', '17:30', NULL, NULL, NULL, '10/19/22', '', '1666174899', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(167, '170097', '1', '12', '1666134000', '22:40', NULL, NULL, ' ', '10/19/22', '', '1666199392', NULL, 'Confirmed', 'MEDZIT_167_VID', NULL, NULL, NULL, 'Brayden ', 'Shagul', 'Walk-In', NULL, NULL, 'app_doctor', 'e5732ef2-565a-4cf1-9601-44ed4fe26286', '1000', '', 'Radiology', NULL, 'app_patient'),
(168, '286593', '1', '1', '1666134000', '10:20 AM To 10:40 AM', NULL, NULL, '', NULL, 'i want to consult doctor Ardi', NULL, NULL, 'Confirmed', 'MEDZIT_168_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', 'da1e7167-33bb-43bb-9c3a-2b711f817bb5', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221019181342.png', ''),
(169, '', '9', '3', '1666998000', '04:30', NULL, NULL, NULL, '10/21/22', '', '1666378826', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Shameed', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(170, '', '9', '3', '1666911600', '05:34', NULL, NULL, NULL, '10/21/22', '', '1666379014', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Shameed', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', 'dab159f4-9908-4238-8506-54204a8f9f21', '1500', '', 'Radiology', NULL, 'app_patient'),
(171, '', '9', NULL, '1666393200', NULL, NULL, NULL, NULL, NULL, 'cusydurufufydf', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Shameed', NULL, 'Video Consult', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221021201434.png', ''),
(172, '', '8', '3', '1666566000', '10:02', NULL, NULL, NULL, '10/24/22', '', '1666580563', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Ardiansa', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', '5be8636c-286a-492a-a069-5addeb3a5911', '1500', '', 'Radiology', NULL, 'app_patient'),
(173, '', '1', '11', '1666738800', '11:19', NULL, NULL, NULL, '10/26/22', '', '1666763352', NULL, 'Deleted', '', NULL, NULL, NULL, 'Brayden ', 'John', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(174, '', '1', '4', '1666998000', '11:22', NULL, NULL, NULL, '10/26/22', '', '1666763527', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', 'Michael ', 'Video Consult', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(175, '', '8', '11', '1666825200', '14:15', NULL, NULL, NULL, '10/27/22', '', '1666854951', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ardiansa', 'John', 'Video Consult', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(176, '477499', '1', '1', '1666825200', '10:00 AM To 10:20 AM', NULL, NULL, ' ', NULL, '', NULL, NULL, 'Treated', 'MEDZIT_176_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Video Consult', NULL, NULL, '24', 'bc17c7ca-8cc2-4667-9688-624ebf9ab30a', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221027144005.png', ''),
(177, '', '1', NULL, '1666911600', NULL, NULL, NULL, NULL, NULL, 'doctor ardi ', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221028075952.png', ''),
(178, '843636', '1', '1', '1666911600', '11:00 AM To 11:20 AM', NULL, NULL, '', NULL, 'ardi ', NULL, NULL, 'Confirmed', 'MEDZIT_178_VID', NULL, '24,,1', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221028080042.png', ''),
(179, '614846', '1', '1', '1666911600', '10:20 AM To 10:40 AM', NULL, NULL, '', NULL, 'ardi', NULL, NULL, 'Confirmed', 'MEDZIT_179_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221028080141.png', ''),
(180, '491957', '1', '1', '1666911600', '12:00 AM To 12:20 PM', NULL, NULL, 'Referring to Labs for additional reports', NULL, 'ardi ', NULL, NULL, 'Confirmed', 'MEDZIT_180_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221028080343.png', ''),
(181, '', '15', NULL, '1666911600', NULL, NULL, NULL, NULL, NULL, 'Constant Fever', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Sadh', NULL, 'Walk-In', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221028113832.png', ''),
(182, '', '1', NULL, '1666911600', NULL, NULL, NULL, NULL, NULL, 'ardi', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221028134549.png', ''),
(183, '', '9', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'fhftyh', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Shameed', NULL, 'Walk-In', NULL, NULL, '24', '68a144ab-260d-434d-83c6-df9b7a8bb495', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221028184627.png', ''),
(184, '', '9', '3', '1666998000', '00:14', NULL, NULL, NULL, '10/28/22', '', '1666982643', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Shameed', 'Edward', 'Video Consult', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(185, '', '15', NULL, '1666998000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Sadh', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221028203544.png', ''),
(186, '', '1', NULL, '1667084400', NULL, NULL, NULL, NULL, NULL, 'need to visit Dr ardi', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221028204305.png', ''),
(187, '', '1', '12', '1666998000', '2:10 AM', NULL, NULL, NULL, '10/28/22', '', '1666989532', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', 'Shagul', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(188, '', '2', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Mohammed Asif', NULL, 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221029080113.png', ''),
(189, '185742', '2', '1', '0', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'Confirmed', 'MEDZIT_189_VID', NULL, '24,', NULL, 'Mohammed Asif', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221029080140.png', ''),
(190, '', '1', '13', '1666998000', '1:20 PM', NULL, NULL, NULL, '10/29/22', '', '1667029550', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Brayden ', 'Edward', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', NULL, 'app_patient'),
(191, '551597', '8', '1', '1667174400', '02:00 PM To 02:15 PM', NULL, NULL, '', NULL, 'dr budi', NULL, NULL, 'Confirmed', 'MEDZIT_191_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', 'b8d366ef-0bf6-4469-9d4c-24eaf9cdcd42', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221031024845.png', ''),
(193, '521573', '1', '1', '1667174400', '02:15 PM To 02:30 PM', NULL, NULL, '', NULL, 'ardi ', NULL, NULL, 'Confirmed', 'MEDZIT_193_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031065604.png', ''),
(194, '228966', '8', '1', '1667174400', '02:30 PM To 02:45 PM', NULL, NULL, ' ', NULL, 'dr ardi please', NULL, NULL, 'Treated', 'MEDZIT_194_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', '265a5fdf-648f-4c50-a1cf-511f9d1851db', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221031071934.png', ''),
(195, '', '1', NULL, '1667174400', NULL, NULL, NULL, NULL, NULL, 'i have chest pain for past two days\n\n', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031105250.png', ''),
(196, '207130', '1', '', '1667174400', 'Not Selected', NULL, NULL, '', NULL, 'i have chest pain for past two days\n\n', NULL, NULL, 'Confirmed', 'MEDZIT_196_VID', NULL, '24,,1,28', NULL, 'Brayden ', '', 'Walk-In', NULL, NULL, '28', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031105252.png', ''),
(197, '181896', '1', '', '1667260800', 'Not Selected', 'Not Selected', '', 'referred for lab', '10/31/22', '', '1667216389', '0', 'Confirmed', 'MEDZIT_197_VID', '909', 'hos_28,24,,28', '', 'Brayden ', '', NULL, 'hms-meeting-+917395816924-75242-24', 'https://meet.jit.si/hms-meeting-+917395816924-75242-24', '28', '', '', '', 'Radiology', NULL, ''),
(198, '474574', '9', '3', '1667174400', '23:12', NULL, NULL, ' ', '10/31/22', '', '1667238146', NULL, 'Treated', 'MEDZIT_198_VID', NULL, NULL, NULL, 'Shameed', 'Shagul', 'Walk-In', NULL, NULL, 'app_doctor', '04807dbb-44fd-4b99-b79f-c0f0b5bf1ec4', '1000', '', 'Radiology', NULL, 'app_patient'),
(199, '', '2', '1', '0', '16:20', NULL, NULL, NULL, '10/31/22', '', '1667239886', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ragu', 'Shagul', 'Walk-In', NULL, NULL, '24', '', '', '', 'Radiology', NULL, 'app_patient'),
(200, '', '2', '1', '0', '16:20', NULL, NULL, NULL, '10/31/22', '', '1667240311', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ragu', 'Shagul', 'Walk-In', NULL, NULL, '24', '', '', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031181831.png', 'app_patient'),
(201, '', '9', '3', '1667174400', '23:50', NULL, NULL, NULL, '10/31/22', '', '1667240416', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Shameed', 'Shagul', 'Walk-In', NULL, NULL, 'app_doctor', '6d51f4b8-67d2-4ea4-a260-9a3bb9598f4c', '1000', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031182016.png', 'app_patient'),
(202, '', '9', '3', '1667260800', '00:01', NULL, NULL, NULL, '10/31/22', '', '1667241104', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Shameed', 'Shagul', 'Video Consult', NULL, NULL, 'app_doctor', '63c8aefd-564e-472c-85cb-99dabb6cee61', '1000', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031183144.png', 'app_patient'),
(203, '', '9', '3', '0', '16:20', NULL, NULL, NULL, '10/31/22', '', '1667241317', NULL, 'Deleted', '', NULL, NULL, NULL, 'Ragu', 'Shagul', 'Walk-In', NULL, NULL, '24', '', '', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031183517.png', 'app_patient'),
(204, '', '9', '3', '0', '16:20', NULL, NULL, NULL, '10/31/22', '', '1667241543', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ragu', 'Shagul', 'Walk-In', NULL, NULL, '24', '', '', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031183903.png', 'app_patient'),
(205, '', '9', '3', '0', '16:20', NULL, NULL, NULL, '10/31/22', 'Need to Visit Dr. Vasigaran', '1667241592', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ragu', 'Shagul', 'Walk-In', NULL, NULL, '24', '', '', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031183952.png', 'app_patient'),
(206, '', '9', '3', '0', '16:20', NULL, NULL, NULL, '10/31/22', 'Need to Visit Dr. Vasigaran', '1667241685', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Ragu', 'Shagul', 'Walk-In', NULL, NULL, '24', '', '', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221031184125.png', 'app_patient'),
(207, '291334', '8', '1', '1667260800', '01:00 PM To 01:15 PM', NULL, NULL, ' ', NULL, 'i want', NULL, NULL, 'Treated', 'MEDZIT_207_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', 'b5966fdf-87b1-486d-a7b3-be62020dc4f2', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221101035929.png', ''),
(208, '', '8', NULL, '1668038400', NULL, NULL, NULL, NULL, NULL, 'saya sakit kepala akut\n', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Video Consult', NULL, NULL, '24', '', '1000', 'MRI Brain', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221101090247.png', ''),
(209, '', '8', NULL, '1667260800', NULL, NULL, NULL, NULL, NULL, 'sakit batuk', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Walk-In', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221101091045.png', ''),
(210, '', '29', '1', '1667260800', '01:15 PM To 01:30 PM', '01:15 PM', '01:30 PM', 'offline visit', '11/01/22', '', '1667313995', '159', 'Confirmed', '', '909', NULL, '', 'Test name', 'Ardi', NULL, 'hms-meeting-+919092772439-864616-24', 'https://meet.jit.si/hms-meeting-+919092772439-864616-24', '24', '', '', '', 'Radiology', NULL, ''),
(211, '', '1', '1', '1669248000', '10:00 AM To 10:20 AM', '10:00 AM', '10:20 AM', 'follow up ', '11/01/22', '', '1667317169', '120', 'Confirmed', '', '909', NULL, '', 'Brayden ', 'Ardi', NULL, 'hms-meeting-+917395816924-820539-24', 'https://meet.jit.si/hms-meeting-+917395816924-820539-24', '24', '', '', '', 'Radiology', NULL, ''),
(212, '429501', '8', '1', '1667347200', '11:40 AM To 12:00 AM', NULL, NULL, ' ', NULL, 'test', NULL, NULL, 'Treated', 'MEDZIT_212_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', '1b0f16a3-d2de-4b8d-9265-ec95f2c7cc57', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221102043818.png', ''),
(213, '957072', '32', '14', '1667347200', '15:54', NULL, NULL, 'Referred by ardi rach', '11/02/22', 'sakit perut\n', '1667379268', NULL, 'Referred', 'MEDZIT_213_VID', NULL, NULL, NULL, 'rachmawan', 'ardi rach', 'Video Consult', NULL, NULL, '24', 'aae9f308-d7ee-484e-8448-3c30a0437800', '500', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221102085428.png', 'app_patient'),
(214, '202723', '31', '1', '1667347200', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_214_VID', NULL, '24,', NULL, 'Annabelle ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221102144728.png', ''),
(215, '', '32', NULL, '1667433600', NULL, NULL, NULL, NULL, NULL, 'sakit pala', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'rachmawan', NULL, 'Video Consult', NULL, NULL, '24', 'a26e6741-f25d-4dc7-b377-92bf1578bc54', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221102172313.png', ''),
(216, '', '9', '14', '1667433600', '11:08', NULL, NULL, NULL, '11/03/22', 'Headache ', '1667453921', NULL, 'Pending Confirmation', '', NULL, NULL, NULL, 'Shameed', 'ardi rach', 'Video Consult', NULL, NULL, 'app_doctor', '719b1496-8c9e-48c8-91a1-83acef69c57d', '500', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221103053841.png', 'app_patient'),
(217, '', '31', NULL, '1667433600', NULL, NULL, NULL, NULL, NULL, 'hh\n', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Annabelle ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221103053916.png', ''),
(218, '', '9', '14', '1667433600', '11:16', NULL, NULL, NULL, '11/03/22', 'headache ', '1667454418', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Shameed', 'ardi rach', 'Walk-In', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221103054658.png', 'app_patient'),
(219, '', '9', NULL, '1667433600', NULL, NULL, NULL, NULL, NULL, 'Headache ', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Shameed', NULL, 'Video Consult', NULL, NULL, '24', 'f9092c7f-3f68-403d-9dc9-b845a1965eaf', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221103064913.png', ''),
(220, '435134', '1', '1', '1667433600', '12:40 PM To 01:00 PM', NULL, NULL, '', NULL, 'meet doctor ardi', NULL, NULL, 'Confirmed', 'MEDZIT_220_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221103065630.png', ''),
(221, '801637', '8', '1', '1667433600', '10:00 AM To 10:20 AM', NULL, NULL, ' ', NULL, 'i want to meet dr ardi', NULL, NULL, 'Treated', 'MEDZIT_221_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', '95fde2a9-9c14-4296-af5b-fa2086c13333', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221103114630.png', ''),
(222, '', '8', NULL, '1667433600', NULL, NULL, NULL, NULL, NULL, 'ardi', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Video Consult', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221103115102.png', ''),
(223, '931205', '1', '1', '1667520000', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, 'meet Dr ardi', NULL, NULL, 'Confirmed', 'MEDZIT_223_VID', NULL, '24,,1', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221103180225.png', ''),
(224, '102585', '1', '1', '1667433600', '10:20 AM To 10:40 AM', NULL, NULL, '', NULL, 'ardi', NULL, NULL, 'Confirmed', 'MEDZIT_224_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221103181225.png', ''),
(225, '', '8', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221103185738.png', ''),
(226, '', '8', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221103185914.png', ''),
(227, '', '8', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221103190114.png', ''),
(228, '', '8', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221103190133.png', ''),
(229, '', '8', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221103190217.png', ''),
(230, '', '8', NULL, '1655679600', NULL, NULL, NULL, NULL, NULL, 'Need to Visit Dr. Vasigaran', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Ardiansa', NULL, 'Walk-In', NULL, NULL, '24', '', '200', 'MRI', 'MRI', 'https://dhmedzit.com/assets/images/user_attachments/20221103190438.png', ''),
(231, '296393', '1', '1', '1667520000', '10:20 AM To 10:40 AM', NULL, NULL, 'Referred by Ardi', NULL, '', NULL, NULL, 'Referred', 'MEDZIT_231_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '28', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221104101933.png', ''),
(232, '724772', '1', '1', '1667520000', '05:20 PM To 05:40 PM', NULL, NULL, 'Referred by Ardi', NULL, 'ardi', NULL, NULL, 'Referred', 'MEDZIT_232_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '28', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221104163425.png', ''),
(233, '', '8', '1', '1667779200', '02:00 PM To 02:15 PM', NULL, NULL, '', NULL, 'ardi', NULL, NULL, 'Pending Confirmation', '', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221107075803.png', ''),
(234, '', '1', NULL, '1668038400', NULL, NULL, NULL, NULL, NULL, 'ctbun', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221110141259.png', ''),
(235, '', '1', NULL, '1668211200', NULL, NULL, NULL, NULL, NULL, 'ardi', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221112103306.png', ''),
(236, '', '1', NULL, '1668384000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221113184352.png', ''),
(237, '', '1', NULL, '1668384000', NULL, NULL, NULL, NULL, NULL, 'want to meet Dr ardi ', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221114053929.png', ''),
(238, '', '9', NULL, '1668470400', NULL, NULL, NULL, NULL, NULL, 'testing', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Shameed', NULL, 'Video Consult', NULL, NULL, '24', 'f7a6a2d5-e296-426a-8d9c-de142c1981aa', '2500', 'test payment procedure', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221115160511.png', ''),
(239, '', '1', NULL, '1668470400', NULL, NULL, NULL, NULL, NULL, 'ardi', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '2500', 'Test procedure ', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221115171624.png', ''),
(240, '', '1', NULL, '1668556800', NULL, NULL, NULL, NULL, NULL, 'ardi ', NULL, NULL, 'Pending Confirmation', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '9126c5f6-b091-4973-9ff3-972c0ce5776a', '1000', 'MRI Brain', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221116061736.png', ''),
(241, '', '1', NULL, '1668556800', NULL, NULL, NULL, NULL, NULL, 'ardi', NULL, NULL, 'Deleted', '', NULL, '24', NULL, 'Brayden ', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221116063022.png', ''),
(242, '704644', '1', '1', '1668556800', '10:00 AM To 10:20 AM', NULL, NULL, 'Referred by Ardi', NULL, 'ardi testing ', NULL, NULL, 'Referred', 'MEDZIT_242_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '28', '7189ca6f-3d6c-4535-8843-9cdd51a6e912', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221116063111.png', ''),
(245, '219784', '8', '1', '1669161600', '10:00 AM To 10:20 AM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_245_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Walk-In', NULL, NULL, '24', '9e58d4b6-ae96-4228-a820-dbf1edc4c483', '1000', 'MRI Brain', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221123080900.png', ''),
(244, '', '1', '1', '1668556800', NULL, '', '', 'Referred by Ragubathi U', '11/16/22', '', '1668590161', '0', 'Referred', '', '909', NULL, '', 'Brayden ', 'Ardi', NULL, 'hms-meeting-+917395816924-421993-24', 'https://meet.jit.si/hms-meeting-+917395816924-421993-24', '24', '', '', '', 'Radiology', NULL, ''),
(246, '313290', '8', '1', '1669334400', '12:00 AM To 12:20 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_246_VID', NULL, '24,', NULL, 'Ardiansa', 'Ardi', 'Video Consult', NULL, NULL, '24', 'fa7c9057-8c7a-462a-9e15-ddc7e2c658f9', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221125030427.png', ''),
(247, '432144', '1', '9', '1669593600', '02:00 PM To 02:15 PM', '02:00 PM', '02:15 PM', '', NULL, 'fever from two days ', NULL, '168', 'Confirmed', 'MEDZIT_247_VID', '909', '24,,1', '', 'Brayden ', 'Ahmad', 'Walk-In', NULL, NULL, '24', '', '500', 'Test procedure ', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221128122937.png', ''),
(248, '', '2', NULL, '1669766400', NULL, NULL, NULL, NULL, NULL, 'pain in my pelvis region', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Mohammed Asif', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221130125527.png', ''),
(249, '', '2', NULL, '1669766400', NULL, NULL, NULL, NULL, NULL, 'I want to meet Dr ardi', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Mohammed Asif', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221130133938.png', ''),
(250, '360148', '1', '1', '1669852800', '04:40 PM To 05:00 PM', NULL, NULL, '', NULL, 'pain in  heart side, meet Dr ardi', NULL, NULL, 'Confirmed', 'MEDZIT_250_VID', NULL, '24,', NULL, 'Brayden ', 'Ardi', 'Walk-In', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221201134123.png', ''),
(251, '', '2', NULL, '1670112000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Mohammed Asif', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221203110436.png', ''),
(252, '', '2', NULL, '1670112000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Mohammed Asif', NULL, 'Walk-In', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221203113432.png', ''),
(253, '', '9', '14', '1670544000', '20:26', NULL, NULL, NULL, '12/09/22', 'fhbbh', '1670597764', NULL, 'payment_pending', '', NULL, NULL, NULL, 'Shameed', 'ardi rach', 'Video Consult', NULL, NULL, 'app_doctor', '', '', '', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221209145604.png', 'app_patient'),
(254, '', '9', NULL, '1670544000', NULL, NULL, NULL, NULL, NULL, '3fhffhg', NULL, NULL, 'Deleted', '', NULL, '24', NULL, 'Shameed', NULL, 'Walk-In', NULL, NULL, '24', '', '500', 'Test procedure ', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221209151116.png', ''),
(255, '', '16', NULL, '1671408000', NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Andy C Kamili', NULL, 'Video Consult', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221210133511.png', ''),
(256, '389849', '1', '2', '1670889600', '11:00 AM To 11:30 AM', NULL, NULL, ' ', NULL, 'need to take abdomen ct ', NULL, NULL, 'Treated', 'MEDZIT_256_VID', NULL, '24,', NULL, 'Brayden ', 'Clara', 'Video Consult', NULL, NULL, '24', '', '2900', 'CT Abdomen', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221213065746.png', ''),
(257, '657401', '1', '2', '1670889600', '01:00 PM To 01:30 PM', NULL, NULL, '', NULL, 'need take mri brain scan', NULL, NULL, 'Confirmed', 'MEDZIT_257_VID', NULL, '24,', NULL, 'Brayden ', 'Clara', 'Walk-In', NULL, NULL, '24', '', '1000', 'MRI Brain', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221213074704.png', ''),
(258, '373887', '1', '2', '1670889600', '02:30 PM To 03:00 PM', NULL, NULL, '', NULL, 'x-ray', NULL, NULL, 'Confirmed', 'MEDZIT_258_VID', NULL, '24,', NULL, 'Brayden ', 'Clara', 'Video Consult', NULL, NULL, '24', '', '2500', 'X-Ray', 'Radiology', 'https://dhmedzit.com/assets/images/user_attachments/20221213075216.png', ''),
(259, '', '40', NULL, '0', NULL, NULL, NULL, NULL, NULL, 'konsul kesehatan', NULL, NULL, 'payment_pending', '', NULL, '24', NULL, 'Delly Arnaz ', NULL, 'Video Consult', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221213093342.png', ''),
(260, '527752', '40', '1', '1670889600', '01:30 PM To 01:45 PM', NULL, NULL, '', NULL, 'konsul', NULL, NULL, 'Confirmed', 'MEDZIT_260_VID', NULL, '24,', NULL, 'Delly Arnaz ', 'Ardi', 'Video Consult', NULL, NULL, '24', 'f7d3a1f3-7564-4c7a-8a30-0b64afebe1fc', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221213093458.png', ''),
(261, '474488', '1', '2', '1670889600', '04:30 PM To 05:00 PM', NULL, NULL, '', NULL, 'want to meet Dr', NULL, NULL, 'Confirmed', 'MEDZIT_261_VID', NULL, '24,', NULL, 'Brayden ', 'Clara', 'Walk-In', NULL, NULL, '24', '', '2000', 'Dokter Umum', 'General Consultation', 'https://dhmedzit.com/assets/images/user_attachments/20221213114921.png', ''),
(262, '690833', '1', '2', '1670889600', '03:30 PM To 04:00 PM', NULL, NULL, '', NULL, '', NULL, NULL, 'Confirmed', 'MEDZIT_262_VID', NULL, '24,,2', NULL, 'Brayden ', 'Clara', 'Video Consult', NULL, NULL, '24', '', '5000', 'Cardiac CT', 'Cardiology', 'https://dhmedzit.com/assets/images/user_attachments/20221213115034.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `app_patient`
--

CREATE TABLE `app_patient` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `bloodgroup` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `how_added` varchar(100) DEFAULT NULL,
  `registration_time` varchar(150) NOT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_user`
--

CREATE TABLE `app_user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(150) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `plan` varchar(200) NOT NULL,
  `plan_amount` int(50) NOT NULL,
  `plan_expiry` date NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `autoemailshortcode`
--

CREATE TABLE `autoemailshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autoemailshortcode`
--

INSERT INTO `autoemailshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'payment'),
(2, '{lastname}', 'payment'),
(3, '{name}', 'payment'),
(4, '{amount}', 'payment'),
(52, '{doctorname}', 'appoinment_confirmation'),
(42, '{firstname}', 'appoinment_creation'),
(51, '{name}', 'appoinment_confirmation'),
(50, '{lastname}', 'appoinment_confirmation'),
(49, '{firstname}', 'appoinment_confirmation'),
(48, '{hospital_name}', 'appoinment_creation'),
(47, '{time_slot}', 'appoinment_creation'),
(46, '{appoinmentdate}', 'appoinment_creation'),
(45, '{doctorname}', 'appoinment_creation'),
(44, '{name}', 'appoinment_creation'),
(43, '{lastname}', 'appoinment_creation'),
(26, '{name}', 'doctor'),
(27, '{firstname}', 'doctor'),
(28, '{lastname}', 'doctor'),
(29, '{company}', 'doctor'),
(41, '{doctor}', 'patient'),
(40, '{company}', 'patient'),
(39, '{lastname}', 'patient'),
(38, '{firstname}', 'patient'),
(37, '{name}', 'patient'),
(36, '{department}', 'doctor'),
(53, '{appoinmentdate}', 'appoinment_confirmation'),
(54, '{time_slot}', 'appoinment_confirmation'),
(55, '{hospital_name}', 'appoinment_confirmation'),
(56, '{start_time}', 'meeting_creation'),
(57, '{patient_name}', 'meeting_creation'),
(58, '{doctor_name}', 'meeting_creation'),
(59, '{hospital_name}', 'meeting_creation');

-- --------------------------------------------------------

--
-- Table structure for table `autoemailtemplate`
--

CREATE TABLE `autoemailtemplate` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autoemailtemplate`
--

INSERT INTO `autoemailtemplate` (`id`, `name`, `message`, `type`, `status`, `hospital_id`) VALUES
(59, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '466'),
(58, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '466'),
(57, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '466'),
(56, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '466'),
(55, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '466'),
(54, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '466'),
(102, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '477'),
(103, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '477'),
(104, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '477'),
(105, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '477'),
(106, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '477'),
(107, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '477'),
(108, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '478'),
(109, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '478'),
(110, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '478'),
(111, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '478'),
(112, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '478'),
(113, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '478'),
(114, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '479'),
(115, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '479'),
(116, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '479'),
(117, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '479'),
(118, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '479'),
(119, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '479'),
(120, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '480'),
(121, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '480'),
(122, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '480'),
(123, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '480'),
(124, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '480'),
(125, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '480'),
(126, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '481'),
(127, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '481'),
(128, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '481'),
(129, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '481'),
(130, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '481'),
(131, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '481'),
(132, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '482'),
(133, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '482'),
(134, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '482'),
(135, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '482'),
(136, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '482'),
(137, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '482'),
(138, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '483'),
(139, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '483'),
(140, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '483'),
(141, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '483'),
(142, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '483'),
(143, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '483'),
(144, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', NULL),
(145, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', NULL),
(146, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', NULL),
(147, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', NULL),
(148, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', NULL),
(149, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', NULL),
(150, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '488'),
(151, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '488'),
(152, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '488'),
(153, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '488'),
(154, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '488'),
(155, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '488'),
(156, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '489'),
(157, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '489'),
(158, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '489'),
(159, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '489'),
(160, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '489'),
(161, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '489'),
(162, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '491'),
(163, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '491'),
(164, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '491'),
(165, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '491'),
(166, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '491'),
(167, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '491'),
(168, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '492'),
(169, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '492'),
(170, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '492'),
(171, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '492'),
(172, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '492'),
(173, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '492'),
(174, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '486'),
(175, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '486'),
(176, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '486'),
(177, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '486'),
(178, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '486'),
(179, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '486'),
(180, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '494'),
(181, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '494'),
(182, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '494'),
(183, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '494'),
(184, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '494'),
(185, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '494'),
(186, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '503'),
(187, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '503'),
(188, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '503'),
(189, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '503'),
(190, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '503'),
(191, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '503'),
(192, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '504'),
(193, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '504'),
(194, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '504'),
(195, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '504'),
(196, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '504'),
(197, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '504'),
(198, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '505'),
(199, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '505'),
(200, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '505'),
(201, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '505'),
(202, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '505'),
(203, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '505'),
(204, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '506'),
(205, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '506'),
(206, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '506'),
(207, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '506'),
(208, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '506'),
(209, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '506'),
(210, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '507'),
(211, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '507'),
(212, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '507'),
(213, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '507'),
(214, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '507'),
(215, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '507'),
(216, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '508'),
(217, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '508'),
(218, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '508'),
(219, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '508'),
(220, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '508'),
(221, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '508'),
(222, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '509'),
(223, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '509'),
(224, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '509'),
(225, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '509'),
(226, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '509'),
(227, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '509'),
(228, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '510'),
(229, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '510'),
(230, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '510'),
(231, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '510'),
(232, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '510'),
(233, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '510'),
(234, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '819'),
(235, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '819'),
(236, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '819'),
(237, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '819'),
(238, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '819'),
(239, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '819'),
(240, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '820'),
(241, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '820'),
(242, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '820'),
(243, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '820'),
(244, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '820'),
(245, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '820'),
(246, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '1'),
(247, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '1'),
(248, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '1'),
(249, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '1'),
(250, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '1'),
(251, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '1'),
(252, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '2'),
(253, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '2'),
(254, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '2'),
(255, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '2'),
(256, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '2'),
(257, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '2'),
(258, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '3'),
(259, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '3'),
(260, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '3'),
(261, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '3'),
(262, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '3'),
(263, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '3'),
(264, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '4'),
(265, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '4'),
(266, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '4'),
(267, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '4'),
(268, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '4'),
(269, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '4'),
(270, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '5'),
(271, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '5'),
(272, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '5'),
(273, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '5'),
(274, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '5'),
(275, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '5'),
(276, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '6'),
(277, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '6'),
(278, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '6'),
(279, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '6'),
(280, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '6'),
(281, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '6'),
(282, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '7'),
(283, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '7'),
(284, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '7'),
(285, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '7'),
(286, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '7'),
(287, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '7'),
(288, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '8'),
(289, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '8'),
(290, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '8'),
(291, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '8'),
(292, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '8'),
(293, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '8'),
(294, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '9'),
(295, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '9'),
(296, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '9'),
(297, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '9'),
(298, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '9'),
(299, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '9'),
(300, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '10'),
(301, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '10'),
(302, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '10'),
(303, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '10'),
(304, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '10'),
(305, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '10'),
(306, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '11'),
(307, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '11'),
(308, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '11'),
(309, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '11'),
(310, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '11'),
(311, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '11'),
(312, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '12'),
(313, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '12'),
(314, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '12'),
(315, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '12'),
(316, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '12'),
(317, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '12'),
(318, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '13'),
(319, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '13'),
(320, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '13'),
(321, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '13'),
(322, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '13'),
(323, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '13'),
(324, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '14'),
(325, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '14'),
(326, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '14'),
(327, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '14'),
(328, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '14'),
(329, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '14'),
(330, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '15'),
(331, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '15'),
(332, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '15');
INSERT INTO `autoemailtemplate` (`id`, `name`, `message`, `type`, `status`, `hospital_id`) VALUES
(333, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '15'),
(334, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '15'),
(335, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '15'),
(336, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '16'),
(337, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '16'),
(338, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '16'),
(339, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '16'),
(340, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '16'),
(341, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '16'),
(342, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '17'),
(343, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '17'),
(344, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '17'),
(345, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '17'),
(346, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '17'),
(347, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '17'),
(348, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '18'),
(349, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '18'),
(350, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '18'),
(351, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '18'),
(352, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '18'),
(353, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '18'),
(354, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '19'),
(355, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '19'),
(356, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '19'),
(357, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '19'),
(358, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '19'),
(359, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '19'),
(360, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '20'),
(361, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '20'),
(362, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '20'),
(363, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '20'),
(364, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '20'),
(365, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '20'),
(366, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '21'),
(367, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '21'),
(368, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '21'),
(369, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '21'),
(370, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '21'),
(371, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '21'),
(372, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '22'),
(373, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '22'),
(374, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '22'),
(375, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '22'),
(376, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '22'),
(377, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '22'),
(378, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '23'),
(379, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '23'),
(380, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '23'),
(381, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '23'),
(382, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '23'),
(383, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '23'),
(384, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '24'),
(385, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '24'),
(386, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '24'),
(387, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '24'),
(388, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '24'),
(389, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '24'),
(390, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '21'),
(391, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '21'),
(392, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '21'),
(393, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '21'),
(394, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '21'),
(395, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '21'),
(396, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '26'),
(397, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '26'),
(398, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '26'),
(399, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '26'),
(400, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '26'),
(401, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '26'),
(402, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '27'),
(403, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '27'),
(404, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '27'),
(405, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '27'),
(406, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '27'),
(407, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '27'),
(408, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '28'),
(409, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '28'),
(410, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '28'),
(411, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '28'),
(412, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '28'),
(413, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '28'),
(414, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '29'),
(415, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '29'),
(416, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '29'),
(417, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '29'),
(418, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '29'),
(419, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '29'),
(420, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '29'),
(421, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '29'),
(422, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '29'),
(423, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '29'),
(424, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '29'),
(425, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '29'),
(426, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '31'),
(427, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '31'),
(428, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '31'),
(429, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '31'),
(430, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '31'),
(431, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '31'),
(432, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '32'),
(433, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '32'),
(434, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '32'),
(435, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '32'),
(436, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '32'),
(437, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '32'),
(438, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '33'),
(439, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '33'),
(440, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '33'),
(441, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '33'),
(442, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '33'),
(443, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '33'),
(444, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '34'),
(445, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '34'),
(446, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '34'),
(447, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '34'),
(448, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '34'),
(449, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '34'),
(450, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '35'),
(451, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '35'),
(452, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '35'),
(453, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '35'),
(454, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '35'),
(455, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '35'),
(456, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '36'),
(457, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '36'),
(458, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '36'),
(459, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '36'),
(460, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '36'),
(461, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '36'),
(462, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '37'),
(463, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '37'),
(464, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '37'),
(465, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '37'),
(466, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '37'),
(467, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '37'),
(468, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '38'),
(469, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '38'),
(470, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '38'),
(471, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '38'),
(472, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '38'),
(473, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '38'),
(474, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '39'),
(475, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '39'),
(476, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '39'),
(477, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '39'),
(478, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '39'),
(479, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '39'),
(480, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '40'),
(481, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '40'),
(482, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '40'),
(483, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '40'),
(484, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '40'),
(485, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '40'),
(486, 'Payment successful email to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '41'),
(487, 'Appointment Confirmation email to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '41'),
(488, 'Appointment creation email to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '41'),
(489, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '41'),
(490, 'Send Appointment confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '41'),
(491, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '41');

-- --------------------------------------------------------

--
-- Table structure for table `autosmsshortcode`
--

CREATE TABLE `autosmsshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autosmsshortcode`
--

INSERT INTO `autosmsshortcode` (`id`, `name`, `type`) VALUES
(1, '{name}', 'payment'),
(2, '{firstname}', 'payment'),
(3, '{lastname}', 'payment'),
(4, '{amount}', 'payment'),
(55, '{appoinmentdate}', 'appoinment_confirmation'),
(54, '{doctorname}', 'appoinment_confirmation'),
(53, '{name}', 'appoinment_confirmation'),
(52, '{lastname}', 'appoinment_confirmation'),
(51, '{firstname}', 'appoinment_confirmation'),
(50, '{time_slot}', 'appoinment_creation'),
(49, '{appoinmentdate}', 'appoinment_creation'),
(48, '{hospital_name}', 'appoinment_creation'),
(47, '{doctorname}', 'appoinment_creation'),
(46, '{name}', 'appoinment_creation'),
(45, '{lastname}', 'appoinment_creation'),
(44, '{firstname}', 'appoinment_creation'),
(28, '{firstname}', 'doctor'),
(29, '{lastname}', 'doctor'),
(30, '{name}', 'doctor'),
(31, '{company}', 'doctor'),
(43, '{doctor}', 'patient'),
(42, '{company}', 'patient'),
(41, '{lastname}', 'patient'),
(40, '{firstname}', 'patient'),
(39, '{name}', 'patient'),
(38, '{department}', 'doctor'),
(56, '{time_slot}', 'appoinment_confirmation'),
(57, '{hospital_name}', 'appoinment_confirmation'),
(58, '{start_time}', 'meeting_creation'),
(59, '{patient_name}', 'meeting_creation'),
(60, '{doctor_name}', 'meeting_creation'),
(61, '{hospital_name}', 'meeting_creation');

-- --------------------------------------------------------

--
-- Table structure for table `autosmstemplate`
--

CREATE TABLE `autosmstemplate` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autosmstemplate`
--

INSERT INTO `autosmstemplate` (`id`, `name`, `message`, `type`, `status`, `hospital_id`) VALUES
(69, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '466'),
(68, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '466'),
(67, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '466'),
(66, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '466'),
(65, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '466'),
(64, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '466'),
(112, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '477'),
(113, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '477'),
(114, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '477'),
(115, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '477'),
(116, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '477'),
(117, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '477'),
(118, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '478'),
(119, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '478'),
(120, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '478'),
(121, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '478'),
(122, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '478'),
(123, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '478'),
(124, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '479'),
(125, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '479'),
(126, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '479'),
(127, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '479'),
(128, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '479'),
(129, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '479'),
(130, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '480'),
(131, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '480'),
(132, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '480'),
(133, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '480'),
(134, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '480'),
(135, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '480'),
(136, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '481'),
(137, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '481'),
(138, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '481'),
(139, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '481'),
(140, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '481'),
(141, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '481'),
(142, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '482'),
(143, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '482'),
(144, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '482'),
(145, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '482'),
(146, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '482'),
(147, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '482'),
(148, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '483'),
(149, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '483'),
(150, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '483'),
(151, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '483'),
(152, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '483'),
(153, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '483'),
(154, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', NULL),
(155, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', NULL),
(156, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', NULL),
(157, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', NULL),
(158, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', NULL),
(159, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', NULL),
(160, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '488'),
(161, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '488'),
(162, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '488'),
(163, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '488'),
(164, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '488'),
(165, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '488'),
(166, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '489'),
(167, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '489'),
(168, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '489'),
(169, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '489'),
(170, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '489'),
(171, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '489'),
(172, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '491'),
(173, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '491'),
(174, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '491'),
(175, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '491'),
(176, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '491'),
(177, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '491'),
(178, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '492'),
(179, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '492'),
(180, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '492'),
(181, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '492'),
(182, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '492'),
(183, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '492'),
(184, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '486'),
(185, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '486'),
(186, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '486'),
(187, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '486'),
(188, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '486'),
(189, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '486'),
(190, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '494'),
(191, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '494'),
(192, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '494'),
(193, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '494'),
(194, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '494'),
(195, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '494'),
(196, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '503'),
(197, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '503'),
(198, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '503'),
(199, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '503'),
(200, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '503'),
(201, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '503'),
(202, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '504'),
(203, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '504'),
(204, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '504'),
(205, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '504'),
(206, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '504'),
(207, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '504'),
(208, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '505'),
(209, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '505'),
(210, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '505'),
(211, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '505'),
(212, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '505'),
(213, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '505'),
(214, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '506'),
(215, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '506'),
(216, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '506'),
(217, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '506'),
(218, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '506'),
(219, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '506'),
(220, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '507'),
(221, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '507'),
(222, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '507'),
(223, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '507'),
(224, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '507'),
(225, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '507'),
(226, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '508'),
(227, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '508'),
(228, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '508'),
(229, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '508'),
(230, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '508'),
(231, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '508'),
(232, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '509'),
(233, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '509'),
(234, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '509'),
(235, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '509'),
(236, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '509'),
(237, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '509'),
(238, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '510'),
(239, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '510'),
(240, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '510'),
(241, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '510'),
(242, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '510'),
(243, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '510'),
(244, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '819'),
(245, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '819'),
(246, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '819'),
(247, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '819'),
(248, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '819'),
(249, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '819'),
(250, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '820'),
(251, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '820'),
(252, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '820'),
(253, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '820'),
(254, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '820'),
(255, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '820'),
(256, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '1'),
(257, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '1'),
(258, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '1'),
(259, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '1'),
(260, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '1'),
(261, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '1'),
(262, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '2'),
(263, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '2'),
(264, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '2'),
(265, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '2'),
(266, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '2'),
(267, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '2'),
(268, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '3'),
(269, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '3'),
(270, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '3'),
(271, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '3'),
(272, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '3'),
(273, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '3'),
(274, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '4'),
(275, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '4'),
(276, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '4'),
(277, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '4'),
(278, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '4'),
(279, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '4'),
(280, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '5'),
(281, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '5'),
(282, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '5'),
(283, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '5'),
(284, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '5'),
(285, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '5'),
(286, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '6'),
(287, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '6'),
(288, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '6'),
(289, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '6'),
(290, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '6'),
(291, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '6'),
(292, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '7'),
(293, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '7'),
(294, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '7'),
(295, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '7'),
(296, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '7'),
(297, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '7'),
(298, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '8'),
(299, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '8'),
(300, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '8'),
(301, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '8'),
(302, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '8'),
(303, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '8'),
(304, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '9'),
(305, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '9'),
(306, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '9'),
(307, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '9'),
(308, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '9'),
(309, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '9'),
(310, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '10'),
(311, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '10'),
(312, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '10'),
(313, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '10'),
(314, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '10'),
(315, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '10'),
(316, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '11'),
(317, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '11'),
(318, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '11'),
(319, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '11'),
(320, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '11'),
(321, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '11'),
(322, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '12'),
(323, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '12'),
(324, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '12'),
(325, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '12'),
(326, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '12'),
(327, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '12'),
(328, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '13'),
(329, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '13'),
(330, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '13'),
(331, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '13'),
(332, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '13'),
(333, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '13'),
(334, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '14'),
(335, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '14'),
(336, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '14'),
(337, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '14'),
(338, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '14'),
(339, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '14'),
(340, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '15'),
(341, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '15'),
(342, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '15'),
(343, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '15'),
(344, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '15');
INSERT INTO `autosmstemplate` (`id`, `name`, `message`, `type`, `status`, `hospital_id`) VALUES
(345, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '15'),
(346, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '16'),
(347, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '16'),
(348, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '16'),
(349, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '16'),
(350, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '16'),
(351, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '16'),
(352, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '17'),
(353, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '17'),
(354, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '17'),
(355, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '17'),
(356, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '17'),
(357, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '17'),
(358, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '18'),
(359, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '18'),
(360, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '18'),
(361, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '18'),
(362, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '18'),
(363, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '18'),
(364, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '19'),
(365, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '19'),
(366, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '19'),
(367, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '19'),
(368, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '19'),
(369, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '19'),
(370, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '20'),
(371, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '20'),
(372, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '20'),
(373, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '20'),
(374, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '20'),
(375, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '20'),
(376, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '21'),
(377, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '21'),
(378, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '21'),
(379, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '21'),
(380, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '21'),
(381, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '21'),
(382, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '22'),
(383, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '22'),
(384, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '22'),
(385, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '22'),
(386, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '22'),
(387, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '22'),
(388, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '23'),
(389, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '23'),
(390, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '23'),
(391, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '23'),
(392, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '23'),
(393, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '23'),
(394, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '24'),
(395, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '24'),
(396, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '24'),
(397, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '24'),
(398, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '24'),
(399, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '24'),
(400, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '21'),
(401, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '21'),
(402, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '21'),
(403, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '21'),
(404, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '21'),
(405, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '21'),
(406, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '26'),
(407, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '26'),
(408, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '26'),
(409, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '26'),
(410, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '26'),
(411, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '26'),
(412, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '27'),
(413, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '27'),
(414, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '27'),
(415, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '27'),
(416, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '27'),
(417, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '27'),
(418, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '28'),
(419, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '28'),
(420, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '28'),
(421, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '28'),
(422, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '28'),
(423, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '28'),
(424, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '29'),
(425, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '29'),
(426, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '29'),
(427, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '29'),
(428, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '29'),
(429, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '29'),
(430, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '29'),
(431, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '29'),
(432, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '29'),
(433, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '29'),
(434, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '29'),
(435, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '29'),
(436, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '31'),
(437, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '31'),
(438, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '31'),
(439, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '31'),
(440, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '31'),
(441, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '31'),
(442, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '32'),
(443, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '32'),
(444, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '32'),
(445, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '32'),
(446, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '32'),
(447, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '32'),
(448, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '33'),
(449, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '33'),
(450, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '33'),
(451, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '33'),
(452, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '33'),
(453, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '33'),
(454, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '34'),
(455, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '34'),
(456, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '34'),
(457, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '34'),
(458, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '34'),
(459, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '34'),
(460, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '35'),
(461, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '35'),
(462, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '35'),
(463, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '35'),
(464, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '35'),
(465, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '35'),
(466, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '36'),
(467, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '36'),
(468, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '36'),
(469, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '36'),
(470, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '36'),
(471, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '36'),
(472, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '37'),
(473, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '37'),
(474, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '37'),
(475, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '37'),
(476, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '37'),
(477, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '37'),
(478, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '38'),
(479, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '38'),
(480, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '38'),
(481, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '38'),
(482, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '38'),
(483, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '38'),
(484, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '39'),
(485, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '39'),
(486, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '39'),
(487, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '39'),
(488, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '39'),
(489, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '39'),
(490, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '40'),
(491, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '40'),
(492, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '40'),
(493, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '40'),
(494, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '40'),
(495, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '40'),
(496, 'Payment successful sms to patient', 'Dear {name}, Your paying amount - Tk {amount} was successful. Thank You Please contact our support for further queries.', 'payment', 'Active', '41'),
(497, 'Appointment Confirmation sms to patient', 'Dear {name}, Your appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed. For more information contact with {hospital_name} Regards', 'appoinment_confirmation', 'Active', '41'),
(498, 'Appointment creation sms to patient', 'Dear {name}, You have an appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment. For more information contact with {hospital_name} Regards', 'appoinment_creation', 'Active', '41'),
(499, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. For more information contact with {hospital_name} . Regards', 'meeting_creation', 'Active', '41'),
(500, 'send appoint confirmation to Doctor', 'Dear {name}, You are appointed as a doctor in {department} . Thank You {company}', 'doctor', 'Active', '41'),
(501, 'Patient Registration Confirmation', 'Dear {name}, You are registred to {company} as a patient to {doctor}. Regards', 'patient', 'Active', '41');

-- --------------------------------------------------------

--
-- Table structure for table `bankb`
--

CREATE TABLE `bankb` (
  `id` int(100) NOT NULL,
  `group` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankb`
--

INSERT INTO `bankb` (`id`, `group`, `status`, `hospital_id`) VALUES
(72, 'O-', '0 Bags', '466'),
(71, 'O+', '0 Bags', '466'),
(70, 'AB-', '0 Bags', '466'),
(69, 'AB+', '0 Bags', '466'),
(68, 'B-', '0 Bags', '466'),
(67, 'B+', '0 Bags', '466'),
(66, 'A-', '0 Bags', '466'),
(65, 'A+', '0 Bags', '466'),
(153, 'A+', '0 Bags', '477'),
(154, 'A-', '0 Bags', '477'),
(155, 'B+', '0 Bags', '477'),
(156, 'B-', '0 Bags', '477'),
(157, 'AB+', '0 Bags', '477'),
(158, 'AB-', '0 Bags', '477'),
(159, 'O+', '0 Bags', '477'),
(160, 'O-', '0 Bags', '477'),
(161, 'A+', '0 Bags', '478'),
(162, 'A-', '0 Bags', '478'),
(163, 'B+', '0 Bags', '478'),
(164, 'B-', '0 Bags', '478'),
(165, 'AB+', '0 Bags', '478'),
(166, 'AB-', '0 Bags', '478'),
(167, 'O+', '0 Bags', '478'),
(168, 'O-', '0 Bags', '478'),
(169, 'A+', '0 Bags', '479'),
(170, 'A-', '0 Bags', '479'),
(171, 'B+', '0 Bags', '479'),
(172, 'B-', '0 Bags', '479'),
(173, 'AB+', '0 Bags', '479'),
(174, 'AB-', '0 Bags', '479'),
(175, 'O+', '0 Bags', '479'),
(176, 'O-', '0 Bags', '479'),
(177, 'A+', '0 Bags', '480'),
(178, 'A-', '0 Bags', '480'),
(179, 'B+', '0 Bags', '480'),
(180, 'B-', '0 Bags', '480'),
(181, 'AB+', '0 Bags', '480'),
(182, 'AB-', '0 Bags', '480'),
(183, 'O+', '0 Bags', '480'),
(184, 'O-', '0 Bags', '480'),
(185, 'A+', '0 Bags', '481'),
(186, 'A-', '0 Bags', '481'),
(187, 'B+', '0 Bags', '481'),
(188, 'B-', '0 Bags', '481'),
(189, 'AB+', '0 Bags', '481'),
(190, 'AB-', '0 Bags', '481'),
(191, 'O+', '0 Bags', '481'),
(192, 'O-', '0 Bags', '481'),
(193, 'A+', '0 Bags', '482'),
(194, 'A-', '0 Bags', '482'),
(195, 'B+', '0 Bags', '482'),
(196, 'B-', '0 Bags', '482'),
(197, 'AB+', '0 Bags', '482'),
(198, 'AB-', '0 Bags', '482'),
(199, 'O+', '0 Bags', '482'),
(200, 'O-', '0 Bags', '482'),
(201, 'A+', '0 Bags', '483'),
(202, 'A-', '0 Bags', '483'),
(203, 'B+', '0 Bags', '483'),
(204, 'B-', '0 Bags', '483'),
(205, 'AB+', '0 Bags', '483'),
(206, 'AB-', '0 Bags', '483'),
(207, 'O+', '0 Bags', '483'),
(208, 'O-', '10 Bags', '483'),
(209, 'A+', '0 Bags', NULL),
(210, 'A-', '0 Bags', NULL),
(211, 'B+', '0 Bags', NULL),
(212, 'B-', '0 Bags', NULL),
(213, 'AB+', '0 Bags', NULL),
(214, 'AB-', '0 Bags', NULL),
(215, 'O+', '0 Bags', NULL),
(216, 'O-', '0 Bags', NULL),
(217, 'A+', '0 Bags', '488'),
(218, 'A-', '0 Bags', '488'),
(219, 'B+', '0 Bags', '488'),
(220, 'B-', '0 Bags', '488'),
(221, 'AB+', '0 Bags', '488'),
(222, 'AB-', '0 Bags', '488'),
(223, 'O+', '0 Bags', '488'),
(224, 'O-', '0 Bags', '488'),
(225, 'A+', '0 Bags', '489'),
(226, 'A-', '0 Bags', '489'),
(227, 'B+', '0 Bags', '489'),
(228, 'B-', '0 Bags', '489'),
(229, 'AB+', '0 Bags', '489'),
(230, 'AB-', '0 Bags', '489'),
(231, 'O+', '0 Bags', '489'),
(232, 'O-', '0 Bags', '489'),
(233, 'A+', '0 Bags', '491'),
(234, 'A-', '0 Bags', '491'),
(235, 'B+', '0 Bags', '491'),
(236, 'B-', '0 Bags', '491'),
(237, 'AB+', '0 Bags', '491'),
(238, 'AB-', '0 Bags', '491'),
(239, 'O+', '0 Bags', '491'),
(240, 'O-', '0 Bags', '491'),
(241, 'A+', '0 Bags', '492'),
(242, 'A-', '0 Bags', '492'),
(243, 'B+', '0 Bags', '492'),
(244, 'B-', '0 Bags', '492'),
(245, 'AB+', '0 Bags', '492'),
(246, 'AB-', '0 Bags', '492'),
(247, 'O+', '0 Bags', '492'),
(248, 'O-', '0 Bags', '492'),
(249, 'A+', '0 Bags', '486'),
(250, 'A-', '0 Bags', '486'),
(251, 'B+', '0 Bags', '486'),
(252, 'B-', '0 Bags', '486'),
(253, 'AB+', '0 Bags', '486'),
(254, 'AB-', '0 Bags', '486'),
(255, 'O+', '0 Bags', '486'),
(256, 'O-', '0 Bags', '486'),
(257, 'A+', '0 Bags', '494'),
(258, 'A-', '0 Bags', '494'),
(259, 'B+', '0 Bags', '494'),
(260, 'B-', '0 Bags', '494'),
(261, 'AB+', '0 Bags', '494'),
(262, 'AB-', '0 Bags', '494'),
(263, 'O+', '0 Bags', '494'),
(264, 'O-', '0 Bags', '494'),
(265, 'A+', '0 Bags', '503'),
(266, 'A-', '0 Bags', '503'),
(267, 'B+', '0 Bags', '503'),
(268, 'B-', '0 Bags', '503'),
(269, 'AB+', '0 Bags', '503'),
(270, 'AB-', '0 Bags', '503'),
(271, 'O+', '0 Bags', '503'),
(272, 'O-', '0 Bags', '503'),
(273, 'A+', '0 Bags', '504'),
(274, 'A-', '0 Bags', '504'),
(275, 'B+', '0 Bags', '504'),
(276, 'B-', '0 Bags', '504'),
(277, 'AB+', '0 Bags', '504'),
(278, 'AB-', '0 Bags', '504'),
(279, 'O+', '0 Bags', '504'),
(280, 'O-', '0 Bags', '504'),
(281, 'A+', '0 Bags', '505'),
(282, 'A-', '0 Bags', '505'),
(283, 'B+', '0 Bags', '505'),
(284, 'B-', '0 Bags', '505'),
(285, 'AB+', '0 Bags', '505'),
(286, 'AB-', '0 Bags', '505'),
(287, 'O+', '0 Bags', '505'),
(288, 'O-', '0 Bags', '505'),
(289, 'A+', '0 Bags', '506'),
(290, 'A-', '0 Bags', '506'),
(291, 'B+', '0 Bags', '506'),
(292, 'B-', '0 Bags', '506'),
(293, 'AB+', '0 Bags', '506'),
(294, 'AB-', '0 Bags', '506'),
(295, 'O+', '0 Bags', '506'),
(296, 'O-', '0 Bags', '506'),
(297, 'A+', '0 Bags', '507'),
(298, 'A-', '0 Bags', '507'),
(299, 'B+', '0 Bags', '507'),
(300, 'B-', '0 Bags', '507'),
(301, 'AB+', '0 Bags', '507'),
(302, 'AB-', '0 Bags', '507'),
(303, 'O+', '0 Bags', '507'),
(304, 'O-', '0 Bags', '507'),
(305, 'A+', '0 Bags', '508'),
(306, 'A-', '0 Bags', '508'),
(307, 'B+', '0 Bags', '508'),
(308, 'B-', '0 Bags', '508'),
(309, 'AB+', '0 Bags', '508'),
(310, 'AB-', '0 Bags', '508'),
(311, 'O+', '0 Bags', '508'),
(312, 'O-', '0 Bags', '508'),
(313, 'A+', '0 Bags', '509'),
(314, 'A-', '0 Bags', '509'),
(315, 'B+', '0 Bags', '509'),
(316, 'B-', '0 Bags', '509'),
(317, 'AB+', '0 Bags', '509'),
(318, 'AB-', '0 Bags', '509'),
(319, 'O+', '0 Bags', '509'),
(320, 'O-', '0 Bags', '509'),
(321, 'A+', '0 Bags', '510'),
(322, 'A-', '0 Bags', '510'),
(323, 'B+', '0 Bags', '510'),
(324, 'B-', '0 Bags', '510'),
(325, 'AB+', '0 Bags', '510'),
(326, 'AB-', '0 Bags', '510'),
(327, 'O+', '0 Bags', '510'),
(328, 'O-', '0 Bags', '510'),
(329, 'A+', '0 Bags', '819'),
(330, 'A-', '0 Bags', '819'),
(331, 'B+', '0 Bags', '819'),
(332, 'B-', '0 Bags', '819'),
(333, 'AB+', '0 Bags', '819'),
(334, 'AB-', '0 Bags', '819'),
(335, 'O+', '0 Bags', '819'),
(336, 'O-', '0 Bags', '819'),
(337, 'A+', '0 Bags', '820'),
(338, 'A-', '0 Bags', '820'),
(339, 'B+', '0 Bags', '820'),
(340, 'B-', '0 Bags', '820'),
(341, 'AB+', '0 Bags', '820'),
(342, 'AB-', '0 Bags', '820'),
(343, 'O+', '0 Bags', '820'),
(344, 'O-', '0 Bags', '820'),
(345, 'A+', '0 Bags', '1'),
(346, 'A-', '0 Bags', '1'),
(347, 'B+', '0 Bags', '1'),
(348, 'B-', '0 Bags', '1'),
(349, 'AB+', '0 Bags', '1'),
(350, 'AB-', '0 Bags', '1'),
(351, 'O+', '0 Bags', '1'),
(352, 'O-', '0 Bags', '1'),
(353, 'A+', '0 Bags', '2'),
(354, 'A-', '0 Bags', '2'),
(355, 'B+', '0 Bags', '2'),
(356, 'B-', '0 Bags', '2'),
(357, 'AB+', '0 Bags', '2'),
(358, 'AB-', '0 Bags', '2'),
(359, 'O+', '0 Bags', '2'),
(360, 'O-', '0 Bags', '2'),
(361, 'A+', '0 Bags', '3'),
(362, 'A-', '0 Bags', '3'),
(363, 'B+', '0 Bags', '3'),
(364, 'B-', '0 Bags', '3'),
(365, 'AB+', '0 Bags', '3'),
(366, 'AB-', '0 Bags', '3'),
(367, 'O+', '0 Bags', '3'),
(368, 'O-', '0 Bags', '3'),
(369, 'A+', '0 Bags', '4'),
(370, 'A-', '0 Bags', '4'),
(371, 'B+', '0 Bags', '4'),
(372, 'B-', '0 Bags', '4'),
(373, 'AB+', '0 Bags', '4'),
(374, 'AB-', '0 Bags', '4'),
(375, 'O+', '0 Bags', '4'),
(376, 'O-', '0 Bags', '4'),
(377, 'A+', '0 Bags', '5'),
(378, 'A-', '0 Bags', '5'),
(379, 'B+', '0 Bags', '5'),
(380, 'B-', '0 Bags', '5'),
(381, 'AB+', '0 Bags', '5'),
(382, 'AB-', '0 Bags', '5'),
(383, 'O+', '0 Bags', '5'),
(384, 'O-', '0 Bags', '5'),
(385, 'A+', '0 Bags', '6'),
(386, 'A-', '0 Bags', '6'),
(387, 'B+', '0 Bags', '6'),
(388, 'B-', '0 Bags', '6'),
(389, 'AB+', '0 Bags', '6'),
(390, 'AB-', '0 Bags', '6'),
(391, 'O+', '0 Bags', '6'),
(392, 'O-', '0 Bags', '6'),
(393, 'A+', '0 Bags', '7'),
(394, 'A-', '0 Bags', '7'),
(395, 'B+', '0 Bags', '7'),
(396, 'B-', '0 Bags', '7'),
(397, 'AB+', '0 Bags', '7'),
(398, 'AB-', '0 Bags', '7'),
(399, 'O+', '0 Bags', '7'),
(400, 'O-', '0 Bags', '7'),
(401, 'A+', '0 Bags', '8'),
(402, 'A-', '0 Bags', '8'),
(403, 'B+', '0 Bags', '8'),
(404, 'B-', '0 Bags', '8'),
(405, 'AB+', '0 Bags', '8'),
(406, 'AB-', '0 Bags', '8'),
(407, 'O+', '0 Bags', '8'),
(408, 'O-', '0 Bags', '8'),
(409, 'A+', '0 Bags', '9'),
(410, 'A-', '0 Bags', '9'),
(411, 'B+', '0 Bags', '9'),
(412, 'B-', '0 Bags', '9'),
(413, 'AB+', '0 Bags', '9'),
(414, 'AB-', '0 Bags', '9'),
(415, 'O+', '0 Bags', '9'),
(416, 'O-', '0 Bags', '9'),
(417, 'A+', '0 Bags', '10'),
(418, 'A-', '0 Bags', '10'),
(419, 'B+', '0 Bags', '10'),
(420, 'B-', '0 Bags', '10'),
(421, 'AB+', '0 Bags', '10'),
(422, 'AB-', '0 Bags', '10'),
(423, 'O+', '0 Bags', '10'),
(424, 'O-', '0 Bags', '10'),
(425, 'A+', '0 Bags', '11'),
(426, 'A-', '0 Bags', '11'),
(427, 'B+', '0 Bags', '11'),
(428, 'B-', '0 Bags', '11'),
(429, 'AB+', '0 Bags', '11'),
(430, 'AB-', '0 Bags', '11'),
(431, 'O+', '0 Bags', '11'),
(432, 'O-', '0 Bags', '11'),
(433, 'A+', '0 Bags', '12'),
(434, 'A-', '0 Bags', '12'),
(435, 'B+', '0 Bags', '12'),
(436, 'B-', '0 Bags', '12'),
(437, 'AB+', '0 Bags', '12'),
(438, 'AB-', '0 Bags', '12'),
(439, 'O+', '0 Bags', '12'),
(440, 'O-', '0 Bags', '12'),
(441, 'A+', '0 Bags', '13'),
(442, 'A-', '0 Bags', '13'),
(443, 'B+', '0 Bags', '13'),
(444, 'B-', '0 Bags', '13'),
(445, 'AB+', '0 Bags', '13'),
(446, 'AB-', '0 Bags', '13'),
(447, 'O+', '0 Bags', '13'),
(448, 'O-', '0 Bags', '13'),
(449, 'A+', '0 Bags', '14'),
(450, 'A-', '0 Bags', '14'),
(451, 'B+', '0 Bags', '14'),
(452, 'B-', '0 Bags', '14'),
(453, 'AB+', '0 Bags', '14'),
(454, 'AB-', '0 Bags', '14'),
(455, 'O+', '0 Bags', '14'),
(456, 'O-', '0 Bags', '14'),
(457, 'A+', '0 Bags', '15'),
(458, 'A-', '0 Bags', '15'),
(459, 'B+', '0 Bags', '15'),
(460, 'B-', '0 Bags', '15'),
(461, 'AB+', '0 Bags', '15'),
(462, 'AB-', '0 Bags', '15'),
(463, 'O+', '0 Bags', '15'),
(464, 'O-', '0 Bags', '15'),
(465, 'A+', '0 Bags', '16'),
(466, 'A-', '0 Bags', '16'),
(467, 'B+', '0 Bags', '16'),
(468, 'B-', '0 Bags', '16'),
(469, 'AB+', '0 Bags', '16'),
(470, 'AB-', '0 Bags', '16'),
(471, 'O+', '0 Bags', '16'),
(472, 'O-', '0 Bags', '16'),
(473, 'A+', '0 Bags', '17'),
(474, 'A-', '0 Bags', '17'),
(475, 'B+', '0 Bags', '17'),
(476, 'B-', '0 Bags', '17'),
(477, 'AB+', '0 Bags', '17'),
(478, 'AB-', '0 Bags', '17'),
(479, 'O+', '0 Bags', '17'),
(480, 'O-', '0 Bags', '17'),
(481, 'A+', '0 Bags', '18'),
(482, 'A-', '0 Bags', '18'),
(483, 'B+', '0 Bags', '18'),
(484, 'B-', '0 Bags', '18'),
(485, 'AB+', '0 Bags', '18'),
(486, 'AB-', '0 Bags', '18'),
(487, 'O+', '0 Bags', '18'),
(488, 'O-', '0 Bags', '18'),
(489, 'A+', '0 Bags', '19'),
(490, 'A-', '0 Bags', '19'),
(491, 'B+', '0 Bags', '19'),
(492, 'B-', '0 Bags', '19'),
(493, 'AB+', '0 Bags', '19'),
(494, 'AB-', '0 Bags', '19'),
(495, 'O+', '0 Bags', '19'),
(496, 'O-', '0 Bags', '19'),
(497, 'A+', '0 Bags', '20'),
(498, 'A-', '0 Bags', '20'),
(499, 'B+', '0 Bags', '20'),
(500, 'B-', '0 Bags', '20'),
(501, 'AB+', '0 Bags', '20'),
(502, 'AB-', '0 Bags', '20'),
(503, 'O+', '0 Bags', '20'),
(504, 'O-', '0 Bags', '20'),
(505, 'A+', '0 Bags', '21'),
(506, 'A-', '0 Bags', '21'),
(507, 'B+', '0 Bags', '21'),
(508, 'B-', '0 Bags', '21'),
(509, 'AB+', '0 Bags', '21'),
(510, 'AB-', '0 Bags', '21'),
(511, 'O+', '0 Bags', '21'),
(512, 'O-', '0 Bags', '21'),
(513, 'A+', '0 Bags', '22'),
(514, 'A-', '0 Bags', '22'),
(515, 'B+', '0 Bags', '22'),
(516, 'B-', '0 Bags', '22'),
(517, 'AB+', '0 Bags', '22'),
(518, 'AB-', '0 Bags', '22'),
(519, 'O+', '0 Bags', '22'),
(520, 'O-', '0 Bags', '22'),
(521, 'A+', '0 Bags', '23'),
(522, 'A-', '0 Bags', '23'),
(523, 'B+', '0 Bags', '23'),
(524, 'B-', '0 Bags', '23'),
(525, 'AB+', '0 Bags', '23'),
(526, 'AB-', '0 Bags', '23'),
(527, 'O+', '0 Bags', '23'),
(528, 'O-', '0 Bags', '23'),
(529, 'A+', '0 Bags', '24'),
(530, 'A-', '0 Bags', '24'),
(531, 'B+', '0 Bags', '24'),
(532, 'B-', '50 Bags', '24'),
(533, 'AB+', '0 Bags', '24'),
(534, 'AB-', '0 Bags', '24'),
(535, 'O+', '50 Bags', '24'),
(536, 'O-', '28 Bags', '24'),
(537, 'A+', '0 Bags', '21'),
(538, 'A-', '0 Bags', '21'),
(539, 'B+', '0 Bags', '21'),
(540, 'B-', '0 Bags', '21'),
(541, 'AB+', '0 Bags', '21'),
(542, 'AB-', '0 Bags', '21'),
(543, 'O+', '0 Bags', '21'),
(544, 'O-', '0 Bags', '21'),
(545, 'A+', '0 Bags', '26'),
(546, 'A-', '0 Bags', '26'),
(547, 'B+', '0 Bags', '26'),
(548, 'B-', '0 Bags', '26'),
(549, 'AB+', '0 Bags', '26'),
(550, 'AB-', '0 Bags', '26'),
(551, 'O+', '0 Bags', '26'),
(552, 'O-', '0 Bags', '26'),
(553, 'A+', '0 Bags', '27'),
(554, 'A-', '0 Bags', '27'),
(555, 'B+', '0 Bags', '27'),
(556, 'B-', '0 Bags', '27'),
(557, 'AB+', '0 Bags', '27'),
(558, 'AB-', '0 Bags', '27'),
(559, 'O+', '0 Bags', '27'),
(560, 'O-', '0 Bags', '27'),
(561, 'A+', '0 Bags', '28'),
(562, 'A-', '0 Bags', '28'),
(563, 'B+', '0 Bags', '28'),
(564, 'B-', '0 Bags', '28'),
(565, 'AB+', '0 Bags', '28'),
(566, 'AB-', '0 Bags', '28'),
(567, 'O+', '0 Bags', '28'),
(568, 'O-', '0 Bags', '28'),
(569, 'A+', '0 Bags', '29'),
(570, 'A-', '0 Bags', '29'),
(571, 'B+', '0 Bags', '29'),
(572, 'B-', '0 Bags', '29'),
(573, 'AB+', '0 Bags', '29'),
(574, 'AB-', '0 Bags', '29'),
(575, 'O+', '0 Bags', '29'),
(576, 'O-', '0 Bags', '29'),
(577, 'A+', '0 Bags', '29'),
(578, 'A-', '0 Bags', '29'),
(579, 'B+', '0 Bags', '29'),
(580, 'B-', '0 Bags', '29'),
(581, 'AB+', '0 Bags', '29'),
(582, 'AB-', '0 Bags', '29'),
(583, 'O+', '0 Bags', '29'),
(584, 'O-', '0 Bags', '29'),
(585, 'A+', '0 Bags', '31'),
(586, 'A-', '0 Bags', '31'),
(587, 'B+', '0 Bags', '31'),
(588, 'B-', '0 Bags', '31'),
(589, 'AB+', '0 Bags', '31'),
(590, 'AB-', '0 Bags', '31'),
(591, 'O+', '0 Bags', '31'),
(592, 'O-', '0 Bags', '31'),
(593, 'A+', '0 Bags', '32'),
(594, 'A-', '0 Bags', '32'),
(595, 'B+', '0 Bags', '32'),
(596, 'B-', '0 Bags', '32'),
(597, 'AB+', '0 Bags', '32'),
(598, 'AB-', '0 Bags', '32'),
(599, 'O+', '0 Bags', '32'),
(600, 'O-', '0 Bags', '32'),
(601, 'A+', '0 Bags', '33'),
(602, 'A-', '0 Bags', '33'),
(603, 'B+', '0 Bags', '33'),
(604, 'B-', '0 Bags', '33'),
(605, 'AB+', '0 Bags', '33'),
(606, 'AB-', '0 Bags', '33'),
(607, 'O+', '0 Bags', '33'),
(608, 'O-', '0 Bags', '33'),
(609, 'A+', '0 Bags', '34'),
(610, 'A-', '0 Bags', '34'),
(611, 'B+', '0 Bags', '34'),
(612, 'B-', '0 Bags', '34'),
(613, 'AB+', '0 Bags', '34'),
(614, 'AB-', '0 Bags', '34'),
(615, 'O+', '0 Bags', '34'),
(616, 'O-', '0 Bags', '34'),
(617, 'A+', '0 Bags', '35'),
(618, 'A-', '0 Bags', '35'),
(619, 'B+', '0 Bags', '35'),
(620, 'B-', '0 Bags', '35'),
(621, 'AB+', '0 Bags', '35'),
(622, 'AB-', '0 Bags', '35'),
(623, 'O+', '0 Bags', '35'),
(624, 'O-', '0 Bags', '35'),
(625, 'A+', '0 Bags', '36'),
(626, 'A-', '0 Bags', '36'),
(627, 'B+', '0 Bags', '36'),
(628, 'B-', '0 Bags', '36'),
(629, 'AB+', '0 Bags', '36'),
(630, 'AB-', '0 Bags', '36'),
(631, 'O+', '0 Bags', '36'),
(632, 'O-', '0 Bags', '36'),
(633, 'A+', '0 Bags', '37'),
(634, 'A-', '0 Bags', '37'),
(635, 'B+', '0 Bags', '37'),
(636, 'B-', '0 Bags', '37'),
(637, 'AB+', '0 Bags', '37'),
(638, 'AB-', '0 Bags', '37'),
(639, 'O+', '0 Bags', '37'),
(640, 'O-', '0 Bags', '37'),
(641, 'A+', '0 Bags', '38'),
(642, 'A-', '0 Bags', '38'),
(643, 'B+', '0 Bags', '38'),
(644, 'B-', '0 Bags', '38'),
(645, 'AB+', '0 Bags', '38'),
(646, 'AB-', '0 Bags', '38'),
(647, 'O+', '0 Bags', '38'),
(648, 'O-', '0 Bags', '38'),
(649, 'A+', '0 Bags', '39'),
(650, 'A-', '0 Bags', '39'),
(651, 'B+', '0 Bags', '39'),
(652, 'B-', '0 Bags', '39'),
(653, 'AB+', '0 Bags', '39'),
(654, 'AB-', '0 Bags', '39'),
(655, 'O+', '0 Bags', '39'),
(656, 'O-', '0 Bags', '39'),
(657, 'A+', '0 Bags', '40'),
(658, 'A-', '0 Bags', '40'),
(659, 'B+', '0 Bags', '40'),
(660, 'B-', '0 Bags', '40'),
(661, 'AB+', '0 Bags', '40'),
(662, 'AB-', '0 Bags', '40'),
(663, 'O+', '0 Bags', '40'),
(664, 'O-', '0 Bags', '40'),
(665, 'A+', '0 Bags', '41'),
(666, 'A-', '0 Bags', '41'),
(667, 'B+', '0 Bags', '41'),
(668, 'B-', '0 Bags', '41'),
(669, 'AB+', '0 Bags', '41'),
(670, 'AB-', '0 Bags', '41'),
(671, 'O+', '0 Bags', '41'),
(672, 'O-', '0 Bags', '41');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `url` varchar(200) NOT NULL,
  `image` varchar(150) NOT NULL,
  `category` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `url`, `image`, `category`, `status`, `created_at`) VALUES
(21, 'Jakarta Vaccination Team', 'https://corona.jakarta.go.id/en', 'uploads/banner_images/1663054301.jpg', 'patient', 'Active', '2022-08-03 13:29:21'),
(22, 'PT Arfis Medika Indotama', 'https://arfismedikaindotama.com/', 'uploads/banner_images/1663069461.jpg', 'patient', 'Active', '2022-08-05 10:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `last_a_time` varchar(100) DEFAULT NULL,
  `last_d_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `bed_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`id`, `category`, `number`, `description`, `last_a_time`, `last_d_time`, `status`, `bed_id`, `hospital_id`) VALUES
(22, 'Out Patient', '12', 'test', '26 May 2022 - 09:30 PM', '27 May 2022 - 11:55 PM', NULL, 'Out Patient-12', '2'),
(23, 'Post Surgery Bed ', '02', 'Beds for the patients after operation. ', NULL, NULL, NULL, 'Post Surgery Bed -02', '2'),
(24, 'Out Patient', 'EHHC - BED 01', 'op patients ', NULL, NULL, NULL, 'Out Patient-EHHC - BED 01', '9'),
(25, 'Out Patient', 'EHHC - BED 02', 'OP PATIENT - INJECTION WARD', NULL, NULL, NULL, 'Out Patient-EHHC - BED 02', '9'),
(26, 'Out Patient', 'EHHC - BED 03', 'OP patient - general ward', NULL, NULL, NULL, 'Out Patient-EHHC - BED 03', '9'),
(27, 'OP Patients', '01', 'bed 1', '29 March 2023 - 02:55 AM', '30 March 2023 - 09:55 AM', NULL, 'OP Patients-01', '24'),
(28, 'OP Patients', '02', 'bed 2', NULL, NULL, NULL, 'OP Patients-02', '24');

-- --------------------------------------------------------

--
-- Table structure for table `bed_category`
--

CREATE TABLE `bed_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed_category`
--

INSERT INTO `bed_category` (`id`, `category`, `description`, `hospital_id`) VALUES
(15, 'Out Patient', 'test', '2'),
(16, 'Post Surgery Bed ', 'Bed allocated for after surgery ', '2'),
(17, 'Out Patient', 'bed for Out patients ', '9'),
(18, 'OP Patients', 'out patients', '24');

-- --------------------------------------------------------

--
-- Table structure for table `covid_vaccine`
--

CREATE TABLE `covid_vaccine` (
  `id` int(11) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `vaccine_status` varchar(100) NOT NULL,
  `vaccine_type` varchar(100) NOT NULL,
  `vaccinated_image` longtext NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covid_vaccine`
--

INSERT INTO `covid_vaccine` (`id`, `user_id`, `vaccine_status`, `vaccine_type`, `vaccinated_image`, `date`, `time`, `status`, `created_at`) VALUES
(1, '2', 'success', 'Co-Vaccine', 'http://midtrans.medzit.com/assets/images/covid_vaccine_images/20220806083621.png', '2022-08-06', '12:04', 'delete', '2022-08-06'),
(2, '2', 'success', 'Co-Vaccine', 'http://midtrans.medzit.com/assets/images/covid_vaccine_images/20220806083715.png', '2022-08-06', '13:07', '', '2022-08-06'),
(3, '1', 'positive', 'Co-Vaccine', 'http://dhmedzit.com/assets/images/covid_vaccine_images/20220929115945.png', '9/29/2022', '6:59 PM', 'delete', '2022-09-29'),
(4, '1', 'Vaccinated', 'Typhoid ', 'https://dhmedzit.com/assets/images/covid_vaccine_images/20221117181936.png', '2005-11-17', '9:50 PM', 'delete', '2022-11-17'),
(5, '1', 'passed ', 'ma', 'https://dhmedzit.com/assets/images/covid_vaccine_images/20221220070544.png', '12/20/2022', '12:35 PM', '', '2022-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `amount` varchar(50) NOT NULL,
  `x` varchar(10) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `amount`, `x`, `y`, `hospital_id`) VALUES
(1, 'Cardiology', '<p>heart related diseases</p>\r\n', '', NULL, NULL, '24'),
(2, 'General Consultation', '<p>general consultation with doctor</p>\r\n', '', NULL, NULL, '24'),
(3, 'Neurology', '<p>brain related problems</p>\r\n', '', NULL, NULL, '24'),
(4, 'Radiology', '<p>MRI - CT scans</p>\r\n', '', NULL, NULL, '24'),
(5, 'Gynecology', '<p>For womens</p>\r\n', '', NULL, NULL, '24'),
(6, 'Cardiology', '<p>heart related</p>\r\n', '', NULL, NULL, '38'),
(7, 'Neurology', '<p>brain releated</p>\r\n', '', NULL, NULL, '38'),
(8, 'cardiology consultation', '<p>for cardio disease</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', NULL, NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_report`
--

CREATE TABLE `diagnostic_report` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `govt_id` varchar(50) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` longtext NOT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `specialist` varchar(150) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `status` varchar(20) NOT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `fees` int(11) NOT NULL,
  `description` longtext NOT NULL,
  `gallery` longtext NOT NULL,
  `schedule_time` varchar(30) NOT NULL,
  `cover_image` varchar(150) NOT NULL,
  `video_url` longtext NOT NULL,
  `is_online` varchar(50) NOT NULL,
  `token` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `img_url`, `govt_id`, `name`, `email`, `password`, `address`, `phone`, `department`, `specialist`, `profile`, `location`, `latitude`, `longitude`, `x`, `y`, `status`, `ion_user_id`, `hospital_id`, `fees`, `description`, `gallery`, `schedule_time`, `cover_image`, `video_url`, `is_online`, `token`) VALUES
(1, 'http://dhmedzit.com/uploads/doctor_image1.jpg', '', 'Ardi', 'ardir@kenmugi.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'jakarta', '+919092772439', 'Cardiology', 'Cardialogist', 'Chief Cardiac Surgeon', '-6.311416064075877,106.71734845479894', '12.79557643836517', '80.21580433765607', NULL, NULL, '', '913', '24', 0, '', 'a:2:{s:7:\"image_0\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16699181200.png\";s:7:\"image_1\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16699181201.png\";}', '00:00 AM-00:00 PM', 'https://dhmedzit.com/assets/images/cover_images/20221201180840.png', 'a:1:{s:7:\"video_0\";s:0:\"\";}', 'online', 'fA-peUMGQm2-eAokKCJxhR:APA91bFOxK9v9ubvT6c5OKHBuNiG77EuiSlJOX-v4V7n_YXiS7H1-v2zLNrm141C7-1Q_6S5KZIJJbb_5ndC5Pgdx5Z3dIk8zAaZn01ewt-PQXL73m3CRkEVO5_M_vCO-2KYVbWyjFkk'),
(2, 'http://dhmedzit.com/uploads/doctorFemale1.jpg', '', 'Clara', 'clara@kenmugi.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'jakarta', '+919047606085', 'Radiology', 'Cardialogist', 'Chief Radiologist', '-6.311416064075877,106.71734845479894', '12.79557643836517', '80.21580433765607', NULL, NULL, '', '914', '24', 0, '', '', '', '', '', 'online', 'csUCXld_Rei3Vz7Wpo0PkQ:APA91bE7TfeYcGwZGEOjJHAR4iq-G1x-vcwyWeZxL9DfHYLTl7110xTMWbCfNR81kJHWr7UwvZ_qGs5TN933O3VBmnCMkV8g3roCWU6gXe3fcKXud1K7sHG4y67yC-omEwCwfdsN_03m'),
(18, 'https://dhmedzit.com/uploads/DOCTOR_21.jpg', '', 'arfis', 'muralisridhar15@gmail.com', '9b2235cdb58d04b7b312201481abd920a8ab103e8dbd79cfe9a421b64e6a5685a13ea9a14d8660d1d1d295b4412381167cc2305ff6c4a7d2ae49bd43887904be', 'Jakarta', '+916382231572', 'Neurology', 'Neurologist', 'Neurology Specialist', '12.79557643836517,80.21580433765607', '12.79557643836517', '80.21580433765607', NULL, NULL, '', '959', '24', 0, '', '', '', '', '', '', 'eayp_bf0RseTXcSxNKXK80:APA91bHZDFSAK9N0MfdLoktU7qvOYsD7ztpldhfDaXCSl1lwaJ-XitNhLlPERwmKDbDviRcPtEKDuix0IHW-toheI4MDnZ7rdlcXx8Dip6o9JAPuZISAl8TOthXmYPDXIqPPVqP3ACaB'),
(14, 'https://dhmedzit.com/assets/images/doctor_images/20221102084713.png', 'A316426777', 'ardi rach', 'ardiansa@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', 'Depok', '+6287771647744', 'General Practitioner', 'General Practitioner', 'General Practitioner', '-6.3801409,106.82164829999999', '-6.3801409', '106.82164829999999', NULL, NULL, 'active', NULL, 'app_doctor', 500, 'im a doctor', 'a:3:{s:7:\"image_0\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16674102160.png\";s:7:\"image_1\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16674102171.png\";s:7:\"image_2\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16674102172.png\";}', '8:00 AM-8:00 PM', 'https://dhmedzit.com/assets/images/cover_images/20221102173017.png', 'a:1:{s:7:\"video_0\";s:0:\"\";}', 'online', 'ek-1pAc8SB-BbqHuUfTLLe:APA91bHlfjrVVhOlHI2-q9wp9_csb5AFVeSeOUxlEeXSAevr_Q9iKJDdvLoMWBwdkKpfJUwP2INVG8u9vGrzBEyZoUdFxe6WlRugc6XmV9QwjFFsNl0R9_BnPIifIHkjLb6dp4_BscqB'),
(3, 'http://dhmedzit.com/uploads/doctor_image.jpg', 'DC5764GH', 'Shagul', 'shameed97.pno@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', 'Cuddalore', '+919677784223', 'Gynaecology', 'Gynaecology', 'Gynaecology', '11.4965456,79.76224239999999', '11.4965456', '79.76224239999999', NULL, NULL, 'active', NULL, 'app_doctor', 1000, 'mbbs ', 'a:1:{s:7:\"image_0\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16661993340.png\";}', '10:00 AM-8:00 AM', 'https://dhmedzit.com/assets/images/cover_images/20221019180854.png', 'a:1:{s:7:\"video_0\";s:0:\"\";}', '', 'fA-peUMGQm2-eAokKCJxhR:APA91bFOxK9v9ubvT6c5OKHBuNiG77EuiSlJOX-v4V7n_YXiS7H1-v2zLNrm141C7-1Q_6S5KZIJJbb_5ndC5Pgdx5Z3dIk8zAaZn01ewt-PQXL73m3CRkEVO5_M_vCO-2KYVbWyjFkk'),
(5, 'http://dhmedzit.com/uploads/doctor_image.jpg', '', 'Doctor1', 'doctor1@gmail.com', '', 'chennai', '9874563210', 'Cardiology', NULL, 'Chief Cardiac Surgeon', '2.6468243952822745,30.995682  ', '2.6468243952822745', '30.995682  ', NULL, NULL, '', '931', '38', 0, '', '', '', '', '', '', ''),
(6, 'http://dhmedzit.com/uploads/doctorFemale.jpg', '', 'doctor2', 'doctor2@gmail.com', '', 'chennai', '9840817654', 'Neurology', NULL, 'chief Neurologist', '2.6468243952822745,30.995682  ', '2.6468243952822745', '30.995682  ', NULL, NULL, '', '932', '38', 0, '', '', '', '', '', '', ''),
(7, 'http://dhmedzit.com/uploads/femaleDoctor.jpg', '', NULL, NULL, '', NULL, NULL, NULL, NULL, 'Chief Surgeon', '2.6468243952822745,30.995682  ', '2.6468243952822745', '30.995682  ', NULL, NULL, '', '933', '38', 87, '', 'a:2:{s:7:\"image_0\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16699151000.png\";s:7:\"image_1\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16699151001.png\";}', '10am t0 11pm', 'https://dhmedzit.com/assets/images/cover_images/20221201171820.png', 'a:2:{s:7:\"video_0\";s:82:\"https://drive.google.com/file/d/1NpMnHvByM9hrSnv2SgoFH5SrJI5nITPi/view?usp=sharing\";s:7:\"video_1\";s:82:\"https://drive.google.com/file/d/1NpMnHvByM9hrSnv2SgoFH5SrJI5nITPi/view?usp=sharing\";}', '', ''),
(9, 'http://dhmedzit.com/uploads/59S39EwN.jpg', '', 'Ahmad', 'ahmad@kenmugi.com', '', 'Depok', '+6187771231122', 'General Consultation', 'Cardialogist', 'Dokter Umum', '-6.311416064075877,106.71734845479894', '-6.311416064075877', '106.71734845479894', NULL, NULL, '', '937', '24', 0, '', '', '', '', '', '', ''),
(13, 'https://dhmedzit.com/assets/images/doctor_images/20221029083621.png', 'DH12345', 'Edward', 'edward@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'jakarta', '+917395816924', 'General Practitioner', 'General Practitioner', 'General Practitioner', '12.9229796,80.23363269999999', '12.9229796', '80.23363269999999', NULL, NULL, 'active', NULL, 'app_doctor', 1500, 'MBBS General Practitioner ', 'a:3:{s:7:\"image_0\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16670292670.png\";s:7:\"image_1\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16670292671.png\";s:7:\"image_2\";s:72:\"https://dhmedzit.com/assets/images/doctor_gallery_images/16670292672.png\";}', '10:00 AM-7:00 AM', 'https://dhmedzit.com/assets/images/cover_images/20221029084107.png', 'a:3:{s:7:\"video_0\";s:52:\"https://open.spotify.com/show/0zFqXjjrrs3p0UxpoDNZRO\";s:7:\"video_1\";s:43:\"https://www.youtube.com/watch?v=odUTTEgRdCo\";s:7:\"video_2\";s:43:\"https://www.youtube.com/watch?v=IbSHHESbm5U\";}', 'online', 'c57kVVogQCyC-itDGWJMkO:APA91bHcN8BbaVQmSv4JlPmNOG--bUTC08hQsQTS39eKao4a2n4cn_T6ugYJ9TAAtQCXY75RRZ1s0tTNtYC2xhbstJdVEecNFTCHCKWehUuYve8dPCZijqzVUjEmecZbAzLruB-Hy2Xy'),
(11, 'http://dhmedzit.com/assets/images/doctor_images/20220927043435.png', '11223344', 'John', 'john@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'Chennai', '9677522419', 'Cardiology', 'Cardiology', 'Cardiology', '12.9230548,80.23365189999998', '12.9230548', '80.23365189999998', NULL, NULL, 'active', NULL, 'app_doctor', 0, '', '', '', '', '', '', ''),
(15, 'https://dhmedzit.com/assets/images/doctor_images/20221126125856.png', '12345678', 'Andy C Kamili', 'andyckamili@gmail.com', '5c0c74fa6005f2d7c62a1912905c77dba30c3799a0c0031f837cce1eac90e9b97ccf1dee6838b0c41b1200e9b49d7305a6afac7008e27009a8ea2548b732e7ce', 'Pesona Khayangan Depok', '+628118257897', 'Cardiology', 'Cardiology', 'Cardiology', '-6.3858366,106.8288981', '-6.3858366', '106.8288981', NULL, NULL, 'active', NULL, 'app_doctor', 0, '', '', '', '', '', '', ''),
(17, 'https://dhmedzit.com/uploads/DOCTOR_2.jpg', '', 'Wilson', 'wilson@kenmugi.com', '1c09b8a322e69e1e46ab5cbf2e213c6b74196da8eb59a997e0d1c6859547982110d718b61154e118f06b99da18ac3ca917c1add90237f61fba935a451d4ffbfa', 'Bali, Indonesia', '+916383838249', 'Neurology', 'Neurologist', 'Chief Neurologist', '12.79557643836517,80.21580433765607', '12.79557643836517', '80.21580433765607', NULL, NULL, '', '958', '24', 0, '', '', '', '', '', '', ''),
(19, 'https://dhmedzit.com/uploads/DOCTOR_22.jpg', '', 'Jaymes', 'jaymes@kenmugi.com', '6a8eabb9447e2fd817035c282e2275d4fa21f91409dd4726eb071d35e645418192feb3b5f0c60ff836345481bcf3739e3c728e91bd97aa191f92c148be4becae', 'Jakarta, Indonesia ', '+919344772150', 'Radiology', 'Cardialogist', 'Radiologist', '12.79557643836517,80.21580433765607', '12.79557643836517', '80.21580433765607', NULL, NULL, '', '960', '24', 0, '', '', '', '', '', '', 'eayp_bf0RseTXcSxNKXK80:APA91bHZDFSAK9N0MfdLoktU7qvOYsD7ztpldhfDaXCSl1lwaJ-XitNhLlPERwmKDbDviRcPtEKDuix0IHW-toheI4MDnZ7rdlcXx8Dip6o9JAPuZISAl8TOthXmYPDXIqPPVqP3ACaB');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_report`
--

CREATE TABLE `doctor_report` (
  `report_id` int(10) NOT NULL,
  `doctor_id` int(10) NOT NULL,
  `patient_id` int(10) NOT NULL,
  `appointment_id` int(10) NOT NULL,
  `report_img` varchar(150) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `group` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `ldd` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `group`, `age`, `sex`, `ldd`, `phone`, `email`, `add_date`, `hospital_id`) VALUES
(19, 'Daren ', 'A+', '25', 'Male', '01-08-2022', '45623321', 'daren@gmail.com', '08/07/22', '24');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `reciepient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(100) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `admin_email`, `type`, `user`, `password`, `hospital_id`) VALUES
(13, 'admin@codearistos.net', NULL, NULL, NULL, '466'),
(26, 'Admin Email', NULL, NULL, NULL, '477'),
(27, 'Admin Email', NULL, NULL, NULL, '478'),
(28, 'Admin Email', NULL, NULL, NULL, '479'),
(29, 'Admin Email', NULL, NULL, NULL, '480'),
(30, 'Admin Email', NULL, NULL, NULL, '481'),
(31, 'Admin Email', NULL, NULL, NULL, '482'),
(32, 'Admin Email', NULL, NULL, NULL, '483'),
(33, 'Admin Email', NULL, NULL, NULL, NULL),
(34, 'Admin Email', NULL, NULL, NULL, '488'),
(35, 'Admin Email', NULL, NULL, NULL, '489'),
(36, 'Admin Email', NULL, NULL, NULL, '491'),
(37, 'Admin Email', NULL, NULL, NULL, '492'),
(38, 'Admin Email', NULL, NULL, NULL, '486'),
(39, 'Admin Email', NULL, NULL, NULL, '494'),
(40, 'Admin Email', NULL, NULL, NULL, '503'),
(41, 'Admin Email', NULL, NULL, NULL, '504'),
(42, 'Admin Email', NULL, NULL, NULL, '505'),
(43, 'Admin Email', NULL, NULL, NULL, '506'),
(44, 'Admin Email', NULL, NULL, NULL, '507'),
(45, 'Admin Email', NULL, NULL, NULL, '508'),
(46, 'Admin Email', NULL, NULL, NULL, '509'),
(47, 'Admin Email', NULL, NULL, NULL, '510'),
(48, 'Admin Email', NULL, NULL, NULL, '819'),
(49, 'Admin Email', NULL, NULL, NULL, '820'),
(50, 'Admin Email', NULL, NULL, NULL, '1'),
(51, 'Admin Email', NULL, NULL, NULL, '2'),
(52, 'Admin Email', NULL, NULL, NULL, '3'),
(53, 'Admin Email', NULL, NULL, NULL, '4'),
(54, 'Admin Email', NULL, NULL, NULL, '5'),
(55, 'Admin Email', NULL, NULL, NULL, '6'),
(56, 'Admin Email', NULL, NULL, NULL, '7'),
(57, 'Admin Email', NULL, NULL, NULL, '8'),
(58, 'Admin Email', NULL, NULL, NULL, '9'),
(59, 'Admin Email', NULL, NULL, NULL, '10'),
(60, 'Admin Email', NULL, NULL, NULL, '11'),
(61, 'Admin Email', NULL, NULL, NULL, '12'),
(62, 'Admin Email', NULL, NULL, NULL, '13'),
(63, 'Admin Email', NULL, NULL, NULL, '14'),
(64, 'Admin Email', NULL, NULL, NULL, '15'),
(65, 'Admin Email', NULL, NULL, NULL, '16'),
(66, 'Admin Email', NULL, NULL, NULL, '17'),
(67, 'Admin Email', NULL, NULL, NULL, '18'),
(68, 'Admin Email', NULL, NULL, NULL, '19'),
(69, 'Admin Email', NULL, NULL, NULL, '20'),
(70, 'Admin Email', NULL, NULL, NULL, '21'),
(71, 'Admin Email', NULL, NULL, NULL, '22'),
(72, 'Admin Email', NULL, NULL, NULL, '23'),
(73, 'Admin Email', NULL, NULL, NULL, '24'),
(74, 'Admin Email', NULL, NULL, NULL, '21'),
(75, 'Admin Email', NULL, NULL, NULL, '26'),
(76, 'Admin Email', NULL, NULL, NULL, '27'),
(77, 'Admin Email', NULL, NULL, NULL, '28'),
(78, 'Admin Email', NULL, NULL, NULL, '29'),
(79, 'Admin Email', NULL, NULL, NULL, '29'),
(80, 'Admin Email', NULL, NULL, NULL, '31'),
(81, 'Admin Email', NULL, NULL, NULL, '32'),
(82, 'Admin Email', NULL, NULL, NULL, '33'),
(83, 'Admin Email', NULL, NULL, NULL, '34'),
(84, 'Admin Email', NULL, NULL, NULL, '35'),
(85, 'Admin Email', NULL, NULL, NULL, '36'),
(86, 'Admin Email', NULL, NULL, NULL, '37'),
(87, 'Admin Email', NULL, NULL, NULL, '38'),
(88, 'Admin Email', NULL, NULL, NULL, '39'),
(89, 'Admin Email', NULL, NULL, NULL, '40'),
(90, 'Admin Email', NULL, NULL, NULL, '41');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `datestring` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `date`, `note`, `amount`, `user`, `datestring`, `hospital_id`) VALUES
(1, 'Surgical Equipments ', '1659858476', 'sample note', '10000', '909', '07/08/22', '24'),
(3, 'Human Resource', '1668589176', 'Nurse Amela Salary ', '10000', '909', '16/11/22', '24'),
(4, 'Generator Expense', '1668753017', 'Buying 50 liters of Diesel', '5000', '909', '18/11/22', '24');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `description`, `x`, `y`, `hospital_id`) VALUES
(1, 'Surgical Equipments ', 'expenses for surgical equipments', NULL, NULL, '24'),
(2, 'Human Resource', 'Human Resource expenses', NULL, NULL, '24'),
(3, 'Generator Expense', 'Fuel Expense ', NULL, NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(100) NOT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'superadmin', 'Super Admin'),
(2, 'members', 'General User'),
(3, 'Accountant', 'For Financial Activities'),
(4, 'Doctor', ''),
(5, 'Patient', ''),
(6, 'Nurse', ''),
(7, 'Pharmacist', ''),
(8, 'Laboratorist', ''),
(10, 'Receptionist', 'Receptionist'),
(11, 'admin', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(100) NOT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `doctor`, `date`, `x`, `y`, `hospital_id`) VALUES
(1, '2', '1659826800', NULL, NULL, '24'),
(2, '1', '1660086000', NULL, NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `hospital`
--

CREATE TABLE `hospital` (
  `id` int(100) NOT NULL,
  `name` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `password` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `package` varchar(100) DEFAULT NULL,
  `p_limit` varchar(100) DEFAULT NULL,
  `d_limit` varchar(100) DEFAULT NULL,
  `module` varchar(1000) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `img_url` varchar(250) NOT NULL,
  `location` varchar(250) NOT NULL,
  `gallery` longtext NOT NULL,
  `description` longtext NOT NULL,
  `video_url` longtext NOT NULL,
  `is_online` varchar(10) NOT NULL DEFAULT 'offline',
  `active` varchar(20) NOT NULL DEFAULT '1',
  `category` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hospital`
--

INSERT INTO `hospital` (`id`, `name`, `email`, `password`, `address`, `latitude`, `longitude`, `phone`, `package`, `p_limit`, `d_limit`, `module`, `ion_user_id`, `img_url`, `location`, `gallery`, `description`, `video_url`, `is_online`, `active`, `category`) VALUES
(36, 'KLINIK NURUL HUSNA', 'admin@knh.com', NULL, 'Jl. Grand Kahuripan Cluster Sindoro Blok D-F No.5 - 6, Dayeuh, Cileungsi, Bogor.', '-6.348267469878411', ' 106.96477206854996', '021-29464130', '80', '250000', '100000', 'accountant,appointment,lab,bed,department,doctor,invoice,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms', '922', '', '-6.348267469878411, 106.96477206854996', '', 'Klinik Nurul Husna is a medical clinic with a mission to provide excellent and professional healthcare services.', '', 'online', '1', 'hospitals'),
(28, 'Klinik Pratama Nala ', 'admin@kpratama.com', NULL, 'I, Jl. Medika No.2, RT.02/RW.19, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16111, Indonesia', '-6.57966162472387', '106.77616071469431', '0251-8319668', '80', '250000', '100000', 'accountant,appointment,lab,bed,department,doctor,invoice,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms', '915', 'http://dhmedzit.com/uploads/hospital/ind2.png', '-6.57966162472387,106.77616071469431', '', '', '', 'online', '1', 'hospitals'),
(24, 'KLINIK KENMUGI', 'admin@kenmugi.com', NULL, 'Jl. Aria Putra No.8, Serua, Kec. Ciputat, Kota Tangerang Selatan, Banten 15414', '12.79557643836517', '80.21580433765607', '(021) 74778256', '80', '250000', '100000', 'accountant,appointment,lab,bed,department,doctor,invoice,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms', '909', 'http://dhmedzit.com/uploads/hospital/ind11.png', '12.79557643836517,80.21580433765607', '', 'Klinik Kenmugi is a medical clinic operated by CV. Kenmugi with a mission to provide excellent and professional healthcare services.', '', 'online', '1', 'hospitals'),
(41, 'ATM Sehat', 'admin@atmsehat.com', NULL, 'Ruang Tenant DIIB UI, lt. 2, Gedung ILRC, Kampus Universitas Indonesia, Depok.', '-6.3654575415990475', ' 106.82724938347305', '(+62) 823-4837-1262', '80', '250000', '100000', 'accountant,appointment,lab,bed,department,doctor,invoice,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms', '961', 'https://dhmedzit.com/uploads/hospital/ATMSEHAT.jpeg', '-6.3654575415990475, 106.82724938347305', '', 'Now, people could monitor & consult their health routinely, easier, and prevent complication even from long distance without suffering from financial anxiety. Through ATM Sehat, we invite people to have long term health investment.', '', 'online', '1', 'labs_category');

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `appointment` varchar(10) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `access` varchar(2000) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `report_pdf` longtext DEFAULT NULL,
  `report_image` longtext DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab`
--

INSERT INTO `lab` (`id`, `category`, `patient`, `doctor`, `appointment`, `date`, `category_name`, `report`, `status`, `user`, `access`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`, `report_pdf`, `report_image`) VALUES
(1, NULL, '2', '2', '8', '1659654000', NULL, '<ol>\r\n	<li><strong>Laparoscopic appendectomy (intra-operative biopsy revealed: cholangiocarcinoma). |</strong></li>\r\n	<li><strong>Blood test showed normal liver function with elevation of Ca19-9 (&gt;264 ng/mL, normal value= &lt;35 ng/ml). </strong></li>\r\n	<li><strong>A thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment IVa-V with satellite nodule of 1 cm (Figure 1-2) and absence of extra-hepatic disease.</strong></li>\r\n</ol>\r\n', NULL, '909', NULL, 'George', '9790988461', 'Jakarta, Indonesia ', 'Clara', '05-08-22', '24', NULL, NULL),
(2, NULL, '1', 'null', '6', '1659654000', NULL, '<ol>\r\n	<li><strong>Laparoscopic appendectomy (intra-operative biopsy revealed: cholangiocarcinoma). |</strong></li>\r\n	<li><strong>Blood test showed normal liver function with elevation of Ca19-9 (&gt;264 ng/mL, normal value= &lt;35 ng/ml). </strong></li>\r\n	<li><strong>A thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment IVa-V with satellite nodule of 1 cm (Figure 1-2) and absence of extra-hepatic disease.</strong></li>\r\n</ol>\r\n', NULL, '909', NULL, 'Brayden ', '7395816924', 'Jakarta ', NULL, '05-08-22', '24', NULL, NULL),
(3, NULL, '2', '1', '19', '1659826800', NULL, '<p>A 29 -year old- male patient without any medical history was incidentally diagnosed with a giant hepatic</p>\r\n\r\n<p>mass during laparoscopic appendectomy (intra-operative biopsy revealed: cholangiocarcinoma).</p>\r\n\r\n<p>Blood test showed normal liver function with elevation of Ca19-9</p>\r\n\r\n<p>(&gt;264 ng/mL, normal value= &lt;35 ng/ml). A thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment IVa-V with satellite nodule of 1 cm (Figure 1-2)</p>\r\n\r\n<p>and absence of extra-hepatic disease.</p>\r\n', NULL, '909', NULL, 'Mohammed Asif', '9790988461', 'Jakarta, Indonesia ', 'Ardi', '07-08-22', '24', NULL, NULL),
(4, NULL, '1', '1', '34', '1662591600', NULL, '<pre>\r\n&nbsp;</pre>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>RBC Count&nbsp;</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '909', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '08-09-22', '24', NULL, NULL),
(5, NULL, '1', '1', '34', '1662591600', NULL, '<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;Brayden</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : .452236666</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:Brayden.</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>: 25</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; : Male</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:5.0pt\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '909', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '08-09-22', '24', NULL, NULL),
(6, NULL, '1', '1', '38', '1662678000', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p', NULL, '909', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '09-09-22', '24', NULL, NULL),
(7, NULL, '1', '1', '38', '1662678000', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">&nbsp;<', NULL, '909', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '09-09-22', '24', NULL, NULL),
(8, NULL, '1', '1', '38', '1662678000', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">&nbsp;<', NULL, '909', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '09-09-22', '24', NULL, NULL);
INSERT INTO `lab` (`id`, `category`, `patient`, `doctor`, `appointment`, `date`, `category_name`, `report`, `status`, `user`, `access`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`, `report_pdf`, `report_image`) VALUES
(9, NULL, '3', '1', '42', '1662764400', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">&nbsp;<', NULL, '909', NULL, 'George', '7851555222', 'jakarta', 'Ardi', '10-09-22', '24', NULL, NULL),
(10, NULL, '1', '1', '102', '1663974000', NULL, '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp; 0.002</p>\r\n\r\n<p>RBC Count&nbsp; &nbsp; &nbsp; &nbsp; 2.399&nbsp;</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '909', '24,1', 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '24-09-22', '24', NULL, NULL),
(11, NULL, '1', '1', '102', '1663974000', NULL, '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp; &nbsp; &nbsp;4.567</p>\r\n\r\n<p>RBC Count&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 3.5</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '909', '24,1', 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '24-09-22', '24', NULL, NULL),
(12, NULL, '14', '1', '101', '1663974000', NULL, '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp; 1.5&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;2&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;1.7</p>\r\n\r\n<p>RBC Count&nbsp;</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '909', '24,1', 'Aadh', '9790936741', 'lalala', 'Ardi', '24-09-22', '24', NULL, NULL),
(13, NULL, '14', '1', '105', '1663974000', NULL, '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>RBC Count&nbsp;</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '909', '24,', 'Aadh', '+919790936741', 'lalala', 'Ardi', '24-09-22', '24', NULL, NULL),
(14, NULL, '1', '1', '102', '1663974000', NULL, '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>RBC Count&nbsp;</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '909', '24,1', 'Brayden ', '+917395816924', 'Jakarta ', 'Ardi', '24-09-22', '24', NULL, NULL),
(15, NULL, '1', '1', '102', '1664060400', NULL, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '909', '24,1', 'Brayden ', '+917395816924', 'Jakarta ', 'Ardi', '25-09-22', '24', NULL, NULL),
(16, NULL, '1', '1', '102', '1664060400', NULL, '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '909', '24,1', 'Brayden ', '+917395816924', 'Jakarta ', 'Ardi', '25-09-22', '24', NULL, NULL),
(17, NULL, '15', '1', '114', '1664060400', NULL, '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>RBC Count&nbsp;</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '909', '24,,1', 'Sadh', '+919790936741', 'lalalal', 'Ardi', '25-09-22', '24', NULL, NULL);
INSERT INTO `lab` (`id`, `category`, `patient`, `doctor`, `appointment`, `date`, `category_name`, `report`, `status`, `user`, `access`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`, `report_pdf`, `report_image`) VALUES
(18, NULL, '1', '1', '232', '1667952000', NULL, '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<pre>\r\n<strong>TEST           RESULT      UNITS     NORMAL   VALUES </strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n<em><strong>Haemoglobin    sbehsdb                                                                           \r\n\r\nRBC Count \r\n\r\nPCV </strong></em>\r\n\r\n<strong>RBC INDICES</strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n<em>MCV\r\n\r\nMCH \r\n\r\nMCHC\r\n\r\nRDW </em>\r\n\r\n<strong>TOTAL WBC COUNT</strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n<em>Total WBC Count \r\n\r\nNeutrophils \r\n\r\nLymphocytes\r\n\r\nMonocytes\r\n\r\nBasophils </em></pre>\r\n\r\n<hr />\r\n<pre>\r\n<strong><em> Test done on Nihon Kohden MEK - 6420K fully automated cell counter.</em></strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n                          --------- <strong><em>END OF REPORT----------</em></strong></pre>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : .............ncjuasla. nh..............</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</', NULL, '909', '24,', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '09-11-22', '24', NULL, NULL),
(20, NULL, '8', '1', '233', '1668211200', NULL, '<table cellspacing=\"0\" style=\"width:149pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:53pt\"><strong>Blood test&nbsp;</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>Values</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>&nbsp;Status</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '909', '24,', 'Ardiansa', '+6287771647744', 'depok', 'Ardi', '12-11-22', '24', NULL, NULL),
(21, NULL, '1', '1', '242', '1668556800', NULL, '<table cellspacing=\"0\" style=\"width:149pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:53pt\"><strong>Blood test&nbsp;</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>Values</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>&nbsp;Status</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, NULL, '24,', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '16-11-22', '24', 'https://dhmedzit.com/uploads/pdf/Prescription10.pdf', 'https://dhmedzit.com/uploads/reports/blur14.jpg'),
(24, NULL, '1', '1', '250', '1670198400', NULL, '', NULL, '909', '24,', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '05-12-22', '24', 'https://dhmedzit.com/uploads/pdf/1-Sample_Medical_Check_Up_Reporting.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE `laboratorist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lab_category`
--

CREATE TABLE `lab_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `reference_value` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manualemailshortcode`
--

CREATE TABLE `manualemailshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manualemailshortcode`
--

INSERT INTO `manualemailshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'email'),
(2, '{lastname}', 'email'),
(3, '{name}', 'email'),
(6, '{address}', 'email'),
(7, '{company}', 'email'),
(8, '{email}', 'email'),
(9, '{phone}', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `manualsmsshortcode`
--

CREATE TABLE `manualsmsshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manualsmsshortcode`
--

INSERT INTO `manualsmsshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'sms'),
(2, '{lastname}', 'sms'),
(3, '{name}', 'sms'),
(4, '{email}', 'sms'),
(5, '{phone}', 'sms'),
(6, '{address}', 'sms'),
(10, '{company}', 'sms');

-- --------------------------------------------------------

--
-- Table structure for table `manual_email_template`
--

CREATE TABLE `manual_email_template` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manual_email_template`
--

INSERT INTO `manual_email_template` (`id`, `name`, `message`, `type`, `hospital_id`) VALUES
(11, 'Template', '{phone} {email}', 'email', '466');

-- --------------------------------------------------------

--
-- Table structure for table `manual_sms_template`
--

CREATE TABLE `manual_sms_template` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manual_sms_template`
--

INSERT INTO `manual_sms_template` (`id`, `name`, `message`, `type`, `hospital_id`) VALUES
(9, 'sms', ' {company}{address}{phone}{email}{name}', 'sms', '466'),
(10, 'sample testing', ' {sample}{address}{phone}{email}{name}{lastname}{firstname}', 'sms', '466'),
(11, 'Your Payment is done. Wish you speedy Recovery. ', '{Chennai}', 'sms', '2'),
(12, 'Discharge Summary ', '{firstname}{name}', 'sms', '2');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(100) NOT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(500) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `patient_id`, `title`, `description`, `patient_name`, `patient_address`, `patient_phone`, `img_url`, `date`, `registration_time`, `hospital_id`) VALUES
(1, '8', 'Gaido', '<p>This is the first Case</p>\r\n', 'Ardiansa', 'depok', '+6287771647744', NULL, '1667433600', NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `box` varchar(100) DEFAULT NULL,
  `s_price` varchar(100) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `generic` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `effects` varchar(100) DEFAULT NULL,
  `e_date` varchar(70) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `category`, `price`, `box`, `s_price`, `quantity`, `generic`, `company`, `effects`, `e_date`, `add_date`, `hospital_id`) VALUES
(1, 'Accupril', 'High Blood Pressure', '26', '20', '42', 2147483647, 'Quinapril', 'Pfizer Labs Pvt Ltd', 'fatigue, coughing', '01-12-2023', '08/05/22', '24'),
(2, 'Dymadon', 'General Medicines ', '1.2', '12', '8', 110144, 'Paracetamol', 'McNeil Consumer Healthcare', 'mild pain', '01-05-2025', '08/05/22', '24'),
(3, 'Trivalve 2mg', 'High Blood Pressure', '100', '10000', '120', 99999, 'benazepril (Lotensin)', 'Aurobindo Pharma', 'lowers blood pressure and increases the supply of blood and oxygen to the heart', '04-01-2023', '09/21/22', '24');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `category`, `description`, `hospital_id`) VALUES
(1, 'High Blood Pressure', 'medications used for high blood pressure', '24'),
(2, 'General Medicines ', 'general medicines are fever, cold, body aches', '24'),
(3, ' Cardiac Drugs', 'drugs for heart related problems', '24'),
(4, 'General Medicines', 'for fever', '24');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `topic` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `meeting_id` varchar(100) DEFAULT NULL,
  `meeting_password` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `doctor_ion_id` varchar(100) DEFAULT NULL,
  `patient_ion_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `meeting_settings`
--

CREATE TABLE `meeting_settings` (
  `id` int(100) NOT NULL,
  `api_key` varchar(100) DEFAULT NULL,
  `secret_key` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `id` int(100) NOT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `modules` varchar(1000) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE `m_user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `level` int(11) NOT NULL,
  `plan` varchar(200) NOT NULL,
  `plan_expiry` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_user`
--

INSERT INTO `m_user` (`id`, `username`, `password`, `level`, `plan`, `plan_expiry`) VALUES
(1, 'rajesh', '4dff4ea340f0a823f15d3f4f01ab62eae0e5da579ccb851f8db9dfe84c58b2b37b89903a740e1ee172da793a6e79d560e5f7f9bd058a12a280433ed6fa46510a', 0, 'basic', '2021-11-09'),
(5, 'L@h4JJ4FViPcDbj*c6DTV52', '10474f66ebfa27ccf085d20455f036bffb3233e93b2978e5762f0d74ff8a600354231e3ba291ed9b4815d9e44e54663064afd1eb40bb5976c8a69bdf1aa522b7', 0, '', '0000-00-00'),
(6, 'L@h4JJ4FViPcDbj*c6DTV52', 'a8c4904c8b92e8a4fbc97bdc03a2a6ece2dfb897200d24732058eda3eb07caebcac883c16c3b64f962b7c6e6ba7e577a60cffd6f76a191eae811de34ba5c647e', 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(100) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `date`, `type`, `hospital_id`) VALUES
(1, 'Klinik Kenmugi', '<p>Constant Flu-like Symptoms to be treated with care</p>\r\n', '1666911600', 'staff', '24');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `text` varchar(500) NOT NULL,
  `subject` longtext NOT NULL,
  `url` text NOT NULL,
  `status` int(11) NOT NULL,
  `access` varchar(2000) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `text`, `subject`, `url`, `status`, `access`, `created_at`) VALUES
(1, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-29 07:01:40'),
(2, 'Appointment 189 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-10-29 07:02:12'),
(3, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-29 08:45:35'),
(4, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-31 02:48:45'),
(5, 'Appointment 191 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-10-31 02:53:31'),
(6, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-31 06:49:11'),
(7, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-31 06:56:04'),
(8, 'Appointment 193 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-10-31 06:56:40'),
(9, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-31 07:19:34'),
(10, 'Appointment 194 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-10-31 07:21:21'),
(11, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-31 10:52:50'),
(12, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-10-31 10:52:52'),
(13, 'Appointment 196 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-10-31 10:56:23'),
(14, 'Appointment 196 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,1', '2022-10-31 11:38:29'),
(15, 'Appointment 196 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_28,', '2022-10-31 11:38:33'),
(16, 'Appointment 197 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,hos_28', '2022-10-31 11:44:15'),
(17, 'Appointment 197 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 0, 'hos_28,', '2022-10-31 11:44:18'),
(18, 'Appointment 197 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 0, 'hos_28,', '2022-10-31 11:44:20'),
(19, 'Appointment 197 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 0, 'hos_28,', '2022-10-31 11:44:24'),
(20, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-01 03:59:29'),
(21, 'Appointment 207 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-01 04:00:42'),
(22, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-01 09:02:48'),
(23, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-01 09:10:45'),
(24, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-02 04:38:19'),
(25, 'Appointment 212 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-02 04:39:51'),
(26, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-02 14:47:28'),
(27, 'Appointment 214 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-02 14:51:24'),
(28, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-02 17:23:13'),
(29, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 05:39:16'),
(30, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 06:49:13'),
(31, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 06:56:30'),
(32, 'Appointment 220 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-03 06:58:39'),
(33, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 11:46:30'),
(34, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 11:51:02'),
(35, 'Appointment 221 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-03 11:55:33'),
(36, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 18:02:25'),
(37, 'Appointment 223 was updated', 'Appointment updated', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-03 18:04:05'),
(38, 'Appointment 223 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,1', '2022-11-03 18:04:16'),
(39, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 18:12:25'),
(40, 'Appointment 224 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-03 18:17:28'),
(41, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 18:57:38'),
(42, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 18:59:14'),
(43, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 19:01:14'),
(44, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 19:01:33'),
(45, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 19:02:17'),
(46, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-03 19:04:38'),
(47, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-04 10:19:33'),
(48, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-04 16:34:25'),
(49, 'Appointment 232 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-04 16:35:50'),
(50, 'Appointment 231 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-04 16:39:21'),
(51, 'Appointment 231 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-04 16:39:37'),
(52, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-07 07:58:03'),
(53, 'Appointment 233 was updated', 'Appointment updated', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-07 14:47:54'),
(54, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-10 14:13:00'),
(55, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-12 10:33:07'),
(56, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-13 18:43:52'),
(57, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-14 05:39:29'),
(58, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-15 16:05:11'),
(59, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-15 17:16:24'),
(60, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-16 06:17:37'),
(61, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-16 06:30:22'),
(62, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-16 06:31:11'),
(63, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-16 07:01:09'),
(64, 'Appointment 242 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-16 07:29:52'),
(65, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-23 08:09:00'),
(66, 'Appointment 245 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-23 08:10:34'),
(67, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-25 03:04:28'),
(68, 'Appointment 246 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-25 03:08:52'),
(69, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-28 12:29:37'),
(70, 'Appointment 247 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-11-28 12:30:26'),
(71, 'Appointment 247 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,1', '2022-11-30 07:02:52'),
(72, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-30 12:55:27'),
(73, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-11-30 13:39:39'),
(74, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-01 13:41:23'),
(75, 'Appointment 250 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-01 13:42:24'),
(76, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-03 11:04:36'),
(77, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-03 11:34:32'),
(78, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-09 15:11:16'),
(79, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-10 13:35:11'),
(80, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-13 06:57:47'),
(81, 'Appointment 256 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-13 07:03:15'),
(82, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-13 07:47:05'),
(83, 'Appointment 257 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-13 07:48:13'),
(84, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-13 07:52:17'),
(85, 'Appointment 258 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-13 07:54:01'),
(86, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-13 09:33:42'),
(87, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-13 09:34:58'),
(88, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-13 11:49:21'),
(89, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-13 11:50:34'),
(90, 'Appointment 262 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-13 11:52:48'),
(91, 'Appointment 262 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,2', '2022-12-13 11:52:52'),
(92, 'Appointment 261 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-13 18:35:39'),
(93, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-14 15:11:02'),
(94, 'Appointment 263 was updated', 'Appointment updated', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-14 15:11:48'),
(95, 'Appointment 263 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,1', '2022-12-14 16:06:50'),
(96, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-14 16:39:19'),
(97, 'Appointment 264 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 1, 'hos_24,', '2022-12-14 16:40:17'),
(98, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-15 04:37:51'),
(99, 'New appointment was added for this hospital', 'New OPD', 'https://dhmedzit.com/appointment', 1, 'hos_24', '2022-12-16 04:01:45'),
(100, 'Appointment 260 was confirmed by the hospital', 'Appointment confirmed', 'https://dhmedzit.com/appointment', 0, 'hos_24,', '2022-12-20 07:32:50');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `z` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `z`, `ion_user_id`, `hospital_id`) VALUES
(1, NULL, 'Vincy', 'vincy@kenmugi.com', 'jakarta', '15741858', NULL, NULL, NULL, '925', '24'),
(2, NULL, 'Afrin', 'afrin@kenmugi.com', 'jakarta', '7542218663', NULL, NULL, NULL, '928', '24'),
(3, NULL, 'Clara@kenmugi.com', 'clara1@kenmugi.com', 'jakarta', '7554226', NULL, NULL, NULL, '929', '24');

-- --------------------------------------------------------

--
-- Table structure for table `on_board`
--

CREATE TABLE `on_board` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `images` varchar(100) NOT NULL,
  `slogans` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `on_board`
--

INSERT INTO `on_board` (`id`, `title`, `images`, `slogans`, `status`, `created_at`) VALUES
(1, 'Welcome to MedApps', 'https://medzit.com/uploads/onboard/1640164821.jpg', ' AI Powered Patient Assistant', 'Active', '2021-12-22 09:20:21'),
(2, 'Efficient workflow', 'http://medzit.com/uploads/onboard/1629979476.png', 'Most Preferred Workflow Consolidation Framework', 'Active', '2021-09-14 09:25:28'),
(3, 'Patient Health Platform', 'http://medzit.com/uploads/onboard/1629979591.png', 'Clinically Efficient Care Co-ordination Network', 'Active', '2021-09-14 09:25:32');

-- --------------------------------------------------------

--
-- Table structure for table `ot_payment`
--

CREATE TABLE `ot_payment` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor_c_s` varchar(100) DEFAULT NULL,
  `doctor_a_s_1` varchar(100) DEFAULT NULL,
  `doctor_a_s_2` varchar(100) DEFAULT NULL,
  `doctor_anaes` varchar(100) DEFAULT NULL,
  `n_o_o` varchar(100) DEFAULT NULL,
  `c_s_f` varchar(100) DEFAULT NULL,
  `a_s_f_1` varchar(100) DEFAULT NULL,
  `a_s_f_2` varchar(11) DEFAULT NULL,
  `anaes_f` varchar(100) DEFAULT NULL,
  `ot_charge` varchar(100) DEFAULT NULL,
  `cab_rent` varchar(100) DEFAULT NULL,
  `seat_rent` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `doctor_fees` varchar(100) DEFAULT NULL,
  `hospital_fees` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `flat_discount` varchar(100) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `p_limit` varchar(100) DEFAULT NULL,
  `d_limit` varchar(100) DEFAULT NULL,
  `module` varchar(1000) DEFAULT NULL,
  `show_in_frontend` varchar(100) DEFAULT NULL,
  `frontend_order` varchar(100) DEFAULT NULL,
  `set_as_default` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`id`, `name`, `price`, `p_limit`, `d_limit`, `module`, `show_in_frontend`, `frontend_order`, `set_as_default`) VALUES
(80, 'Complete Module', '50000', '250000', '100000', 'accountant,appointment,lab,bed,department,doctor,invoice,donor,finance,pharmacy,laboratorist,medicine,nurse,patient,pharmacist,prescription,receptionist,report,notice,email,sms', 'Yes', NULL, NULL),
(81, 'Scan center', '2000', '1000', '10', 'accountant,appointment,lab,department,doctor,invoice,finance,laboratorist,medicine,patient,pharmacist,prescription,report', 'Yes', NULL, NULL),
(84, 'Laboratory', '10000', '10000', '50', 'appointment,lab,bed,department,doctor,invoice,donor,laboratorist,medicine,patient,pharmacist,prescription,report,notice,email,sms', 'Yes', NULL, NULL),
(85, 'Laboratory 1 ', '100000', '10000', '500', 'accountant,appointment,lab,department,doctor,invoice,donor,finance,laboratorist,medicine,nurse,patient,pharmacist,receptionist,report,notice,email,sms', 'Yes', NULL, '1');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `password` longtext NOT NULL,
  `plan` varchar(200) NOT NULL,
  `plan_amount` int(50) NOT NULL,
  `plan_expiry` date NOT NULL DEFAULT current_timestamp(),
  `doctor` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `bloodgroup` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `how_added` varchar(100) DEFAULT NULL,
  `access` varchar(2000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `insure_name1` varchar(200) NOT NULL,
  `insure_dob1` varchar(20) NOT NULL,
  `insure_address1` text NOT NULL,
  `insure_phone1` varchar(20) NOT NULL,
  `insure_occupation1` varchar(100) NOT NULL,
  `insure_employer_address` text NOT NULL,
  `insure_employer_phone` varchar(20) NOT NULL,
  `insure_relationship` varchar(100) NOT NULL,
  `insure_emergency_contact` varchar(500) NOT NULL,
  `icd_10` varchar(15) DEFAULT NULL,
  `token` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `img_url`, `name`, `email`, `password`, `plan`, `plan_amount`, `plan_expiry`, `doctor`, `address`, `phone`, `sex`, `birthdate`, `age`, `bloodgroup`, `ion_user_id`, `patient_id`, `add_date`, `registration_time`, `how_added`, `access`, `hospital_id`, `insure_name1`, `insure_dob1`, `insure_address1`, `insure_phone1`, `insure_occupation1`, `insure_employer_address`, `insure_employer_phone`, `insure_relationship`, `insure_emergency_contact`, `icd_10`, `token`) VALUES
(1, 'https://dhmedzit.com/assets/images/userprofile/20221118093315.jpg', 'Brayden ', 'brayden@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'basic', 300, '2022-11-02', '', 'Jakarta', '+917395816924', 'Male', '873068400', '25', 'B+', '938', '464639', '08/02/22', '1659423671', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', '', 'fYmm008JTRGQpyjMH3udNH:APA91bEZJpgbqQ39joB6U0yr8CatBQZqSmMEewOO7KdmOfYsZy7eGBfftHWlgCjXSCS15q5e2WLPSkGzvMxKJVIi2LlY5jz0Wsf7QrbbDKk6iX-4sRa_HMGX3Z-Axw27ay0DEhKaZo_m'),
(2, 'https://dhmedzit.com/uploads/patient1.jpg', 'Mohammed Asif', 'george@gmail.com', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'basic', 300, '2022-11-05', '', 'Jakarta, Indonesia ', '+919790988461', 'Male', '01-02-1993', '25', 'A+', '924', '966390', '08/05/22', '1659681458', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', '', 'f8Qw7krQRWiE4VwBvlb-OY:APA91bEsITua-sZDF37M8ElmKVU58eC71ndb5VY3QRR0Fhmse7rj6pk-Tmq76agU4wGiKYfbG57-mGJOKvFTLKrH_nJhRevxZPsyeM0u0_oKyJ_oAA7-Va45vbjSIt39_pakzPVNpEV5'),
(3, NULL, 'George', 'george@gmail.com', '', '', 0, '2022-08-07', ',hos_36,hos_28', 'jakarta', '+917851555222', 'Male', '01-01-2000', NULL, 'A+', NULL, '867962', '08/07/22', '1659836750', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', NULL, NULL),
(4, 'http://midtrans.medzit.com/uploads/patient11.jpg', 'Aseef', 'aseef@gmail.com', '', '', 0, '2022-08-07', '1', 'jakarta', '541218', 'Male', '05-05-2017', NULL, 'A+', '927', '986778', '08/07/22', '1659857984', NULL, NULL, '24', 'Afrin', '12-02-2002', 'Jakarta', '14532218', 'Designer', 'No,4, Jakarta', '452331', 'Wife', '415533125', NULL, NULL),
(5, 'http://dhmedzit.com/assets/images/userprofile/20220824170934.jpg', 'Ranjeeth ', 'ranjeethsam@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', '', 0, '2022-08-24', NULL, '34 ramaligapuram ', '+919600280321', 'Male', '821577600', '27', 'AB-', NULL, NULL, '08/24/22', '1661357248', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, 'f4bhOKjNSbmVYgi5IvAflo:APA91bETtbzNVeqjuUfoozMMHucJUgBmAWeIc-ATZivQL6HSWgg67gs79RWzHesTF6MVN8-PA5qEFuSW7uN1Pr0Bf2nnH6rmvLwc30ZKsGnEb6MViXzw7nW-U6LNjz-C66pv4-ng_wJr'),
(6, NULL, 'Fazeel', 'fazeel@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'basic', 300, '2022-11-25', '1', 'lalala', '+919092772439', 'Male', '15-05-1997', NULL, 'A+', NULL, '91688', '08/25/22', '1661440480', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', '', 'd-isD6v9RdeTUfg3Yjfn7y:APA91bFy31apyHLnn8lFKHMTPmfUgXJ7I3efCCkskRES3-ykvwi72jpzrMtkCI62gJRPDkVfJkkiS26wMP1BRsKbEyhofFTEA6omhUmkVsMsJFh-jxrf-ihDzFYIw8HAadDbFKHL4Ay-'),
(7, NULL, 'Sheik', 'sheik@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', 'basic', 300, '2022-12-13', NULL, NULL, '+918778019537', NULL, NULL, NULL, NULL, NULL, NULL, '09/13/22', '1663045271', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, 'cDl4Zab-T7ie1g9H8dDKG_:APA91bGZc4DvgfWbhEuszXt7VxAVqh_7Ul2rP9SiEBh1rrdFCSVLzs4IrKLmS7CMxlENYmoe-QD2GqtSHFU60sqVZFQyHKncSgfQB5itLQskatoOiK8Z48IHsV5_hGuGacYuJnUPXM7p'),
(8, 'http://dhmedzit.com/assets/images/userprofile/20220914161609.jpg', 'Ardiansa', 'ardiansa.rach@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', 'premium', 600, '2023-09-14', '', 'depok', '+6287771647744', 'Male', '21-09-2022', '31', 'O+', NULL, '187110', '09/13/22', '1663085781', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', '', 'ckLDAmP6TES8we5oP1Szv9:APA91bGWAAzAElW25dJQld-vk6YRA--gA9u7VNx7SFJPIJseLoe9wBI3eFqYTpsq-tBOib4h4NAWBnXDcNY5S_24PFBolMi7yX4ONLo9PKWAs2AA5J0gZT2EqqkLN3rCr8pFpSdeVaxJ'),
(9, NULL, 'Shameed', 'shameed97.pno@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '', 0, '2022-09-17', NULL, NULL, '+919677784223', NULL, NULL, NULL, NULL, NULL, NULL, '09/17/22', '1663395176', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', NULL, 'fI4oQZimQnu8HHfk9kfhTq:APA91bGzNuSpinLrWTPfwq8THG0dhfKeD8Ehd7OXxBOwAi-1DUTNr4TuBkP9bMEh2bQqypX_eUTvHLW_5VyadmrTYlgrRssiD9pkVbhygEAKvegRPv7ZF--Tsjhw_KYBADjtqyoGvkN2'),
(10, NULL, 'Kristy ', 'kristy@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '', 0, '2022-09-17', NULL, NULL, '+919047606085', NULL, NULL, NULL, NULL, NULL, NULL, '09/17/22', '1663401020', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, NULL),
(11, NULL, 'Brayden', 'brayden@gmail.com', '', '', 0, '2022-09-19', NULL, NULL, '+917395816924', 'Male', NULL, '25', NULL, NULL, '30163', '09/19/22', '1663587262', 'from_appointment', NULL, '28', '', '', '', '', '', '', '', '', '', NULL, NULL),
(12, NULL, 'beena', 'beena@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '', 0, '2022-09-21', NULL, NULL, '+919047327982', NULL, NULL, NULL, NULL, NULL, NULL, '09/21/22', '1663752586', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, NULL),
(29, NULL, 'Test name', 'test@gmail.com', '', '', 0, '2022-11-01', ',1', NULL, '+919092772439', 'Male', NULL, '24', NULL, '950', '709953', '11/01/22', '1667313995', 'from_appointment', NULL, '24', '', '', '', '', '', '', '', '', '', 'G44.311', NULL),
(15, 'https://dhmedzit.com/assets/images/userprofile/20221028113632.jpg', 'Sadh', 'whatever@gmail.com', 'd9e6762dd1c8eaf6d61b3c6192fc408d4d6d5f1176d0c29169bc24e71c3f274ad27fcd5811b313d681f7e55ec02d73d499c95455b6b5bb503acf574fba8ffe85', 'premium', 600, '2023-09-25', '', 'Thiruvanmiyur', '9790936741', 'Male', '938386800', '21', 'O+', NULL, '605237', '09/25/22', '1664131974', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', '', 'dziURm9STP2wHv1g9PX86P:APA91bH9TbxQ-HDHE64VVSqm49cHOd3ENWRUczQqA0Y9_KTV1mOMuGoA9wUqtdDgWfEkc3IH4hER-gMdZXMaYG0somKsx5pysEjkxliKFs7hlBPV7ixQY9GvX7e9TG3jyD9R_qymhjPI'),
(17, NULL, 'Roja', 'roja@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', '', 0, '2022-10-08', NULL, NULL, '+919791852529', NULL, NULL, NULL, NULL, NULL, NULL, '10/08/22', '1665237552', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, NULL),
(18, NULL, 'Martin', 'karthik@ihvglobal.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '', 0, '2022-10-12', NULL, NULL, '9840817654', NULL, NULL, NULL, NULL, NULL, NULL, '10/12/22', '1665553354', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, 'cijjZYKNSr2cyFOmRqg3n2:APA91bHKnYMLTvgm5pi7bC19lFhipafB5gvaCQanPuPSGMoLXHcz8AwWIHQZh8vuTOy1EjryPVyRXp1D6o-pjX3n9_Hkl_Y2H0wW8ukWN8Qa_zVvvh6F9UMm59N14kJbk5lnalvkI2qZ'),
(30, NULL, 'Aaditya', 'aadi.med@gmail.com', '12b03226a6d8be9c6e8cd5e55dc6c7920caaa39df14aab92d5e3ea9340d1c8a4d3d0b8e4314f1f6ef131ba4bf1ceb9186ab87c801af0d5c95b1befb8cedae2b9', '', 0, '2022-11-02', NULL, NULL, '+919790936741', NULL, NULL, NULL, NULL, NULL, NULL, '11/02/22', '1667374852', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, 'dziURm9STP2wHv1g9PX86P:APA91bH9TbxQ-HDHE64VVSqm49cHOd3ENWRUczQqA0Y9_KTV1mOMuGoA9wUqtdDgWfEkc3IH4hER-gMdZXMaYG0somKsx5pysEjkxliKFs7hlBPV7ixQY9GvX7e9TG3jyD9R_qymhjPI'),
(31, NULL, 'Annabelle ', 'muralisridhar15@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '', 0, '2022-11-02', NULL, NULL, '+916383838249', NULL, NULL, NULL, NULL, NULL, NULL, '11/02/22', '1667375146', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', NULL, 'eBBo9drKRNC6qgDU9YHS0l:APA91bGSpDmRq_iBhQKfNvmAbeRzHt2ByYnwyMsV_u5nMZO5kfuUW7S_99M1irmBaxaeD5ePX1dQMZdWXEnXz40K14hFBxXJermiyQKJtEMFmKJSC39hM5Gp1vFYz7dweubro2XfVjqI'),
(32, 'https://dhmedzit.com/assets/images/userprofile/20221102084359.jpg', 'rachmawan', 'screeninglp3i@gmail.com', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', '', 0, '2022-11-02', NULL, 'Depok', '+6287772423105', 'Male', '675126000', '31', 'O+', NULL, NULL, '11/02/22', '1667378472', NULL, NULL, '24', '', '', '', '', '', '', '', '', '', NULL, 'cs1gkbivTuy-RskUaH2PUA:APA91bHbxZAm3wwd1sUnZHmVAc1_MG14XqVIujMOCLnwsUJz4jfmijgmcMpwtRvU9BEZJeE0bGS6lSYKp6CNl93okbAtHYWhZaxtjX_4o4RYHSouS5hUZggk8GAuzGXkT1T8dlnqaBUD'),
(38, NULL, 'Denifer.K', 'denifer668@gmail.com', '67f8e9792c3031e1785408a98fc7e18e1983f593f69f70e438662b551c1e20504b98881b58ac3f6ae4fe3039507ebfeadac77d5ad6823b5fc9e791ee5785359c', '', 0, '2022-11-19', NULL, NULL, '+919629822092', NULL, NULL, NULL, NULL, NULL, NULL, '11/19/22', '1668864600', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, 'esOmePBZQbeKj0lh1nHt5d:APA91bGQzLn143GV9Dgb3ML9Dl8gVvs_YKdZtUwQ21llj7VfjUypEcaPi7a3Vt7Cl3B0L0Fe1YMQ40C-vDm5JcQ6NbSe7pB5nTp1pT02DHshlbWPLIZmOV08CifakQQmli9B1x7iEONn'),
(39, NULL, 'Syafira Suci Auliya', 'syafirasuciaulia924@gmail.com', 'c2f832f9ffde04178ecf30d26c3e0be581cd86dc3ec7684c57aed8d5e16d93b22fb31b638b4496f77224dc15eb52606c3e1a8277b46fa63f7fffc3c120a62a0f', '', 0, '2022-12-07', NULL, NULL, '+6283872669903', NULL, NULL, NULL, NULL, NULL, NULL, '12/07/22', '1670413925', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, 'cLmbjjdxQL-tah7DwNjlY0:APA91bGmo6J5HMUX2mpAw31dAVh5VgT49n8GDlMa5JxngEhF_hRuKt34Tuth2MpNYJ_dbrRO6-eYZfcjT66XbzdJqm8zPA9D1KTu2DxUNmtDKqdtYkeK6f50Dl4fV4H7bDFCRXVSTiqg'),
(41, NULL, 'Priyastiti NA', 'ina98.pna@gmail.com', '5c34f4a04dd32c327e677ab7195540a823085563e6dbf73181641df5de90811466ff3c0608d1c3a64a7ca13de1bb85e936191d335a168c257d3765fbc1312d22', '', 0, '2022-12-13', NULL, NULL, '+62811801620', NULL, NULL, NULL, NULL, NULL, NULL, '12/13/22', '1670924289', NULL, NULL, 'app_patient', '', '', '', '', '', '', '', '', '', NULL, 'cLemnQfKSsiel8vdKWdYMh:APA91bFVVzmTl5xpUOS8ksundmkHp7kJwDlMWZfu2b2CVX8f2t_OM1ThNAU42FCq6rMj-SaBfd6JoA0dq-2bi1_8kdF8DF1KJ49Fcalc0ggqKcKDaLZRmjzPuRLnHvXr9V05Ctjp3d8N');

-- --------------------------------------------------------

--
-- Table structure for table `patient_deposit`
--

CREATE TABLE `patient_deposit` (
  `id` int(10) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `deposited_amount` varchar(100) DEFAULT NULL,
  `amount_received_id` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `gateway` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_deposit`
--

INSERT INTO `patient_deposit` (`id`, `patient`, `payment_id`, `date`, `deposited_amount`, `amount_received_id`, `deposit_type`, `gateway`, `user`, `hospital_id`) VALUES
(1, '13', '76', '1664006651', '', '76.gp', NULL, NULL, '909', '24'),
(3, '32', '161', '1668160252', '35000', '161.gp', NULL, NULL, '909', '24'),
(4, '32', '157', '1669817694', '30000', NULL, 'Cash', NULL, '909', '24'),
(5, '1', '176', '1669817776', '150000', NULL, 'Cash', NULL, '909', '24'),
(6, '1', '179', '1670178383', '', '179.gp', 'Cash', NULL, '909', '24'),
(7, '1', '180', '1670178610', '', '180.gp', 'Cash', NULL, '909', '24'),
(8, '1', '181', '1670178745', '', '181.gp', 'Cash', NULL, '909', '24'),
(9, '1', '182', '1670179271', '', '182.gp', 'Cash', NULL, '909', '24');

-- --------------------------------------------------------

--
-- Table structure for table `patient_history_log`
--

CREATE TABLE `patient_history_log` (
  `id` int(11) NOT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `doctor_id` varchar(20) DEFAULT NULL,
  `hospital_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `time_stamp` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_history_log`
--

INSERT INTO `patient_history_log` (`id`, `appointment_id`, `patient_id`, `doctor_id`, `hospital_id`, `status`, `time_stamp`) VALUES
(1, 1, 1, NULL, 24, 'Pending Confirmation', '2022-08-02 08:06:40'),
(2, 1, 1, '2', NULL, 'Confirmed', '2022-08-02 08:31:13'),
(3, 2, 1, NULL, 24, 'Pending Confirmation', '2022-08-02 08:33:10'),
(4, 3, 1, NULL, 24, 'Pending Confirmation', '2022-08-02 08:36:12'),
(5, 3, 1, '2', NULL, 'Confirmed', '2022-08-02 09:27:28'),
(6, 2, 1, '1', NULL, 'Confirmed', '2022-08-02 09:27:40'),
(7, 3, 1, '2', NULL, 'Confirmed', '2022-08-02 09:29:32'),
(8, 3, 1, '2', NULL, 'Treated', '2022-08-02 09:30:04'),
(9, 2, 1, '1', NULL, 'Treated', '2022-08-02 09:30:19'),
(10, 1, 1, '2', NULL, 'Treated', '2022-08-02 09:30:33'),
(11, 4, 1, '3', 0, 'payment_pending', '2022-08-02 14:17:41'),
(12, 4, 1, '3', 0, 'Pending Confirmation', '2022-08-02 14:20:33'),
(13, 4, 0, '3', NULL, 'Confirmed', '2022-08-02 14:21:06'),
(14, 4, 0, '3', NULL, 'Treated', '2022-08-02 14:21:27'),
(15, 1, 1, '2', 24, 'diagnostic', '2022-08-02 14:29:40'),
(16, 1, 1, '2', 24, 'diagnostic', '2022-08-02 14:30:59'),
(17, 3, 1, '2', 24, 'diagnostic', '2022-08-02 14:32:41'),
(18, 1, 1, '2', 24, 'diagnostic', '2022-08-02 17:00:35'),
(19, 5, 1, NULL, 24, 'Pending Confirmation', '2022-08-03 08:22:30'),
(20, 6, 1, NULL, 24, 'Pending Confirmation', '2022-08-03 08:25:44'),
(21, 7, 2, NULL, 24, 'Pending Confirmation', '2022-08-05 07:13:43'),
(22, 8, 2, NULL, 24, 'Pending Confirmation', '2022-08-05 07:15:27'),
(23, 9, 2, '4', 0, 'payment_pending', '2022-08-05 07:17:08'),
(24, 9, 2, '4', 0, 'Pending Confirmation', '2022-08-05 07:17:47'),
(25, 10, 2, '3', 0, 'payment_pending', '2022-08-05 07:18:12'),
(26, 10, 2, '3', 0, 'Pending Confirmation', '2022-08-05 07:18:49'),
(27, 11, 2, '4', 0, 'payment_pending', '2022-08-05 07:19:41'),
(28, 12, 2, '4', 0, 'payment_pending', '2022-08-05 07:19:53'),
(29, 13, 2, '4', 0, 'payment_pending', '2022-08-05 07:19:53'),
(30, 14, 2, '4', 0, 'payment_pending', '2022-08-05 07:19:53'),
(31, 14, 2, '4', 0, 'Pending Confirmation', '2022-08-05 07:20:47'),
(32, 8, 2, '2', NULL, 'Confirmed', '2022-08-05 08:13:11'),
(33, 7, 2, '1', NULL, 'Confirmed', '2022-08-05 08:13:30'),
(34, 15, 2, NULL, 24, 'Pending Confirmation', '2022-08-05 08:18:23'),
(35, 16, 2, NULL, 24, 'Pending Confirmation', '2022-08-05 08:19:52'),
(36, 16, 2, '2', NULL, 'Confirmed', '2022-08-05 08:20:19'),
(37, 15, 2, '2', NULL, 'Confirmed', '2022-08-05 08:20:28'),
(38, 7, 2, '1', NULL, 'Confirmed', '2022-08-05 08:24:45'),
(39, 8, 2, '2', NULL, 'Treated', '2022-08-05 08:25:57'),
(40, 7, 2, '1', NULL, 'Treated', '2022-08-05 08:26:10'),
(41, 15, 2, '2', NULL, 'Treated', '2022-08-05 08:26:34'),
(42, 16, 2, '2', NULL, 'Treated', '2022-08-05 08:26:49'),
(43, 8, 2, '2', 24, 'diagnostic', '2022-08-05 08:44:29'),
(44, 15, 2, '2', 24, 'diagnostic', '2022-08-05 08:46:01'),
(45, 16, 2, '2', 24, 'diagnostic', '2022-08-05 08:47:07'),
(46, 16, 2, '2', 24, 'diagnostic', '2022-08-05 08:49:22'),
(47, 17, 2, NULL, 24, 'Pending Confirmation', '2022-08-05 09:56:54'),
(48, 9, 0, '4', NULL, 'Confirmed', '2022-08-05 12:17:19'),
(49, 9, 0, '4', NULL, 'Treated', '2022-08-05 12:19:37'),
(50, 18, 2, '4', 0, 'payment_pending', '2022-08-06 07:03:06'),
(51, 18, 2, '4', 0, 'Pending Confirmation', '2022-08-06 07:03:31'),
(52, 18, 0, '4', NULL, 'Confirmed', '2022-08-06 07:04:47'),
(53, 18, 0, '4', NULL, 'Treated', '2022-08-06 07:05:07'),
(54, 19, 2, NULL, 24, 'Pending Confirmation', '2022-08-06 07:15:43'),
(55, 19, 2, '1', NULL, 'Confirmed', '2022-08-06 07:29:04'),
(56, 14, 0, '4', NULL, 'Confirmed', '2022-08-06 07:43:20'),
(57, 9, 0, NULL, 24, 'Referred', '2022-08-06 07:45:30'),
(58, 17, 2, '1', NULL, 'Confirmed', '2022-08-07 01:47:28'),
(59, 20, 2, NULL, 24, 'Pending Confirmation', '2022-08-07 22:00:40'),
(60, 21, 2, '4', 0, 'payment_pending', '2022-08-07 22:16:51'),
(61, 21, 2, '4', 0, 'Pending Confirmation', '2022-08-07 22:17:38'),
(62, 21, 0, '4', NULL, 'Confirmed', '2022-08-07 22:18:40'),
(63, 21, 0, '4', NULL, 'Treated', '2022-08-07 22:21:09'),
(64, 18, 0, NULL, 24, 'Referred', '2022-08-07 22:21:36'),
(65, 20, 2, '1', NULL, 'Pending Confirmation', '2022-08-07 22:55:24'),
(66, 20, 2, '1', NULL, 'Confirmed', '2022-08-07 22:55:31'),
(67, 20, 2, '1', NULL, 'Treated', '2022-08-07 22:56:14'),
(68, 23, 1, NULL, 24, 'Pending Confirmation', '2022-08-24 16:35:41'),
(69, 23, 1, NULL, 40, 'Pending Confirmation', '2022-08-26 11:28:33'),
(70, 24, 2, NULL, 24, 'Pending Confirmation', '2022-08-27 10:56:19'),
(71, 25, 2, NULL, 24, 'Pending Confirmation', '2022-08-27 14:38:53'),
(72, 25, 2, '1', NULL, 'Confirmed', '2022-08-27 14:41:13'),
(73, 26, 2, '3', 0, 'payment_pending', '2022-08-27 15:10:02'),
(74, 27, 2, '4', 0, 'payment_pending', '2022-08-27 15:10:16'),
(75, 26, 2, '3', 0, 'Pending Confirmation', '2022-08-27 15:10:57'),
(76, 28, 2, '4', 0, 'payment_pending', '2022-08-27 15:11:24'),
(77, 28, 2, '4', 0, 'Pending Confirmation', '2022-08-27 15:12:47'),
(78, 29, 2, NULL, 24, 'Pending Confirmation', '2022-08-27 15:15:34'),
(79, 30, 2, '3', 0, 'payment_pending', '2022-08-27 15:16:45'),
(80, 30, 2, '3', 0, 'Pending Confirmation', '2022-08-27 15:17:08'),
(81, 30, 0, '3', NULL, 'Confirmed', '2022-08-27 15:18:29'),
(82, 21, 0, NULL, 24, 'Referred', '2022-08-27 15:31:58'),
(83, 21, 0, '4', NULL, 'Cancelled', '2022-08-27 15:32:56'),
(84, 31, 2, NULL, 24, 'Pending Confirmation', '2022-08-30 07:48:23'),
(85, 32, 1, '3', 0, 'payment_pending', '2022-09-02 10:04:04'),
(86, 32, 1, '3', 0, 'Pending Confirmation', '2022-09-02 10:05:20'),
(87, 32, 0, '3', NULL, 'Confirmed', '2022-09-02 10:07:30'),
(88, 33, 2, NULL, 24, 'Pending Confirmation', '2022-09-05 11:47:56'),
(89, 33, 2, '1', NULL, 'Confirmed', '2022-09-05 11:54:14'),
(90, 34, 1, NULL, 24, 'Pending Confirmation', '2022-09-06 19:05:02'),
(91, 35, 1, '3', 0, 'payment_pending', '2022-09-06 19:08:39'),
(92, 35, 1, '3', 0, 'Pending Confirmation', '2022-09-06 19:09:23'),
(93, 35, 0, '3', NULL, 'Confirmed', '2022-09-06 19:10:33'),
(94, 35, 0, '3', NULL, 'Treated', '2022-09-06 19:11:28'),
(95, 29, 2, NULL, 36, 'Confirmed', '2022-09-07 10:50:33'),
(96, 24, 2, NULL, 28, 'Pending Confirmation', '2022-09-07 10:51:31'),
(97, 34, 1, '1', NULL, 'Confirmed', '2022-09-08 08:47:34'),
(98, 34, 1, '1', NULL, 'Confirmed', '2022-09-08 08:51:53'),
(99, 34, 1, '1', NULL, 'Confirmed', '2022-09-08 08:52:17'),
(100, 34, 1, '1', NULL, 'Confirmed', '2022-09-08 08:52:17'),
(101, 34, 1, '1', NULL, 'Confirmed', '2022-09-08 08:52:19'),
(102, 34, 1, '1', NULL, 'Confirmed', '2022-09-08 08:52:20'),
(103, 31, 2, '', NULL, 'Confirmed', '2022-09-08 15:07:01'),
(104, 36, 1, NULL, 24, 'Pending Confirmation', '2022-09-08 15:07:54'),
(105, 36, 1, '1', NULL, 'Confirmed', '2022-09-08 15:08:20'),
(106, 34, 1, '1', NULL, 'Treated', '2022-09-08 15:09:08'),
(107, 36, 1, '1', NULL, 'Treated', '2022-09-08 15:09:33'),
(108, 37, 2, NULL, 24, 'Pending Confirmation', '2022-09-08 15:44:07'),
(109, 36, 1, NULL, 28, 'Pending Confirmation', '2022-09-09 09:15:06'),
(110, 38, 1, NULL, 24, 'Pending Confirmation', '2022-09-09 09:23:45'),
(111, 38, 1, '1', NULL, 'Confirmed', '2022-09-09 09:24:09'),
(112, 38, 1, '1', NULL, 'Treated', '2022-09-09 09:24:34'),
(113, 38, 1, NULL, 28, 'Pending Confirmation', '2022-09-09 10:04:59'),
(114, 34, 1, NULL, 28, 'Pending Confirmation', '2022-09-09 10:30:52'),
(115, 39, 1, '1', NULL, 'Pending Confirmation', '2022-09-09 10:37:16'),
(116, 39, 1, '1', NULL, 'Confirmed', '2022-09-09 10:37:30'),
(117, 39, 1, NULL, 28, 'Confirmed', '2022-09-09 10:37:46'),
(118, 40, 1, NULL, 28, 'Pending Confirmation', '2022-09-09 10:41:39'),
(119, 41, 1, NULL, 36, 'Confirmed', '2022-09-09 10:43:37'),
(120, 42, 3, '', NULL, 'Pending Confirmation', '2022-09-09 10:55:19'),
(121, 42, 3, '1', NULL, 'Confirmed', '2022-09-09 10:56:06'),
(122, 43, 2, NULL, 24, 'Pending Confirmation', '2022-09-09 16:14:45'),
(123, 44, 1, '3', 0, 'payment_pending', '2022-09-09 18:10:50'),
(124, 44, 1, '3', 0, 'Pending Confirmation', '2022-09-09 18:11:19'),
(125, 44, 0, '3', NULL, 'Confirmed', '2022-09-09 18:12:26'),
(126, 46, 3, NULL, 28, 'Confirmed', '2022-09-10 06:05:31'),
(127, 42, 3, NULL, 28, 'Confirmed', '2022-09-10 06:16:58'),
(128, 49, 1, NULL, 24, 'Pending Confirmation', '2022-09-14 12:02:14'),
(129, 51, 8, NULL, 24, 'Pending Confirmation', '2022-09-14 16:19:59'),
(130, 52, 8, NULL, 24, 'Pending Confirmation', '2022-09-14 16:30:50'),
(131, 51, 8, '1', NULL, 'Confirmed', '2022-09-14 19:25:35'),
(132, 52, 8, '', NULL, 'Confirmed', '2022-09-15 03:29:34'),
(133, 52, 8, '1', NULL, 'Confirmed', '2022-09-15 07:24:11'),
(134, 52, 8, '1', NULL, 'Treated', '2022-09-15 07:27:28'),
(135, 52, 8, '1', NULL, 'Confirmed', '2022-09-15 07:29:10'),
(136, 52, 8, '1', NULL, 'Treated', '2022-09-15 07:29:46'),
(137, 4, 0, '3', NULL, 'Cancelled', '2022-09-15 07:29:51'),
(138, 52, 8, '1', NULL, 'Confirmed', '2022-09-16 03:11:02'),
(139, 53, 8, NULL, 24, 'Pending Confirmation', '2022-09-16 04:03:21'),
(140, 53, 8, '', NULL, 'Confirmed', '2022-09-16 07:09:22'),
(141, 53, 8, '1', NULL, 'Confirmed', '2022-09-16 07:10:00'),
(142, 54, 8, NULL, 24, 'Pending Confirmation', '2022-09-16 09:12:13'),
(143, 54, 8, '', NULL, 'Confirmed', '2022-09-16 09:12:48'),
(144, 54, 8, '1', NULL, 'Confirmed', '2022-09-16 09:13:01'),
(145, 55, 1, NULL, 24, 'Pending Confirmation', '2022-09-16 09:16:05'),
(146, 55, 1, '2', NULL, 'Confirmed', '2022-09-16 09:17:09'),
(147, 56, 1, NULL, 24, 'Pending Confirmation', '2022-09-16 09:22:21'),
(148, 56, 1, '2', NULL, 'Confirmed', '2022-09-16 09:22:42'),
(149, 57, 2, NULL, 24, 'Pending Confirmation', '2022-09-16 09:28:20'),
(150, 57, 2, '2', NULL, 'Confirmed', '2022-09-16 09:28:51'),
(151, 58, 6, NULL, 24, 'Pending Confirmation', '2022-09-16 09:48:21'),
(152, 58, 6, '2', NULL, 'Confirmed', '2022-09-16 09:48:52'),
(153, 59, 6, NULL, 24, 'Pending Confirmation', '2022-09-16 10:02:59'),
(154, 59, 6, '1', NULL, 'Confirmed', '2022-09-16 10:03:53'),
(155, 59, 6, '1', NULL, 'Confirmed', '2022-09-16 12:04:04'),
(156, 61, 6, NULL, 24, 'Pending Confirmation', '2022-09-16 14:26:03'),
(157, 61, 6, '1', NULL, 'Confirmed', '2022-09-16 14:26:45'),
(158, 60, 8, '1', NULL, 'Confirmed', '2022-09-16 14:28:55'),
(159, 62, 1, NULL, 24, 'Pending Confirmation', '2022-09-16 14:30:37'),
(160, 62, 1, '1', NULL, 'Confirmed', '2022-09-16 14:30:56'),
(161, 59, 6, '1', NULL, 'Confirmed', '2022-09-16 17:38:14'),
(162, 65, 2, NULL, 24, 'Pending Confirmation', '2022-09-17 09:46:29'),
(163, 65, 2, '1', NULL, 'Confirmed', '2022-09-17 09:57:13'),
(164, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:53:10'),
(165, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:53:17'),
(166, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:53:21'),
(167, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:53:23'),
(168, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:53:36'),
(169, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:54:09'),
(170, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:54:12'),
(171, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:54:13'),
(172, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:54:13'),
(173, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:54:13'),
(174, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:54:13'),
(175, 66, 2, '1', NULL, 'Confirmed', '2022-09-18 04:54:14'),
(176, 66, 2, NULL, 28, 'Confirmed', '2022-09-18 04:54:24'),
(177, 66, 2, NULL, 28, 'Confirmed', '2022-09-18 04:54:29'),
(178, 66, 2, NULL, 28, 'Confirmed', '2022-09-18 05:14:12'),
(179, 66, 0, '', NULL, 'Pending Confirmation', '2022-09-18 05:34:56'),
(180, 62, 1, '1', NULL, 'Treated', '2022-09-18 07:26:47'),
(181, 62, 1, '1', NULL, 'Treated', '2022-09-18 07:27:14'),
(182, 62, 1, '1', NULL, 'Treated', '2022-09-18 07:27:18'),
(183, 67, 1, NULL, 28, 'Confirmed', '2022-09-18 07:31:15'),
(184, 67, 1, NULL, 28, 'Confirmed', '2022-09-18 07:31:18'),
(185, 67, 1, NULL, 28, 'Confirmed', '2022-09-18 07:31:20'),
(186, 67, 1, NULL, 28, 'Confirmed', '2022-09-18 07:31:20'),
(187, 67, 1, NULL, 28, 'Confirmed', '2022-09-18 07:31:20'),
(188, 67, 1, NULL, 28, 'Confirmed', '2022-09-18 07:31:23'),
(189, 67, 1, NULL, 28, 'Confirmed', '2022-09-18 07:31:24'),
(190, 68, 8, '3', 0, 'payment_pending', '2022-09-19 02:12:30'),
(191, 73, 8, NULL, 24, 'Pending Confirmation', '2022-09-19 06:58:06'),
(192, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:24'),
(193, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:37'),
(194, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:39'),
(195, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:53'),
(196, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:54'),
(197, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:54'),
(198, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:54'),
(199, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:00:54'),
(200, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:01:00'),
(201, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:01:01'),
(202, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:01:01'),
(203, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:01:01'),
(204, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:01:02'),
(205, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:01:06'),
(206, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:01:20'),
(207, 73, 8, '1', NULL, 'Confirmed', '2022-09-19 07:08:03'),
(208, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:27:09'),
(209, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:27:12'),
(210, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:27:12'),
(211, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:27:12'),
(212, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:27:12'),
(213, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:27:13'),
(214, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:27:13'),
(215, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:28:50'),
(216, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:28:52'),
(217, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:28:52'),
(218, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:28:53'),
(219, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:28:53'),
(220, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:28:53'),
(221, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 07:29:10'),
(222, 73, 8, '9', NULL, 'Treated', '2022-09-19 07:34:50'),
(223, 73, 8, '9', NULL, 'Confirmed', '2022-09-19 09:33:53'),
(224, 62, 1, NULL, 28, 'Confirmed', '2022-09-19 09:50:39'),
(225, 62, 1, NULL, 28, 'Confirmed', '2022-09-19 09:50:42'),
(226, 62, 1, NULL, 28, 'Confirmed', '2022-09-19 09:50:45'),
(227, 62, 1, NULL, 28, 'Confirmed', '2022-09-19 09:50:46'),
(228, 62, 1, NULL, 28, 'Confirmed', '2022-09-19 09:50:46'),
(229, 62, 1, NULL, 28, 'Confirmed', '2022-09-19 09:50:47'),
(230, 62, 1, NULL, 28, 'Confirmed', '2022-09-19 09:50:51'),
(231, 56, 1, NULL, 28, 'Confirmed', '2022-09-19 10:07:44'),
(232, 75, 1, NULL, 24, 'Pending Confirmation', '2022-09-19 10:16:55'),
(233, 76, 1, NULL, 24, 'Pending Confirmation', '2022-09-19 11:26:17'),
(234, 76, 1, '1', NULL, 'Confirmed', '2022-09-19 11:26:37'),
(235, 76, 1, '1', NULL, 'Treated', '2022-09-19 11:28:34'),
(236, 76, 1, NULL, 28, 'Confirmed', '2022-09-19 11:29:10'),
(237, 77, 1, NULL, 28, 'Pending Confirmation', '2022-09-19 11:30:33'),
(238, 77, 0, '', NULL, 'Confirmed', '2022-09-19 11:30:52'),
(239, 77, 1, '', NULL, 'Confirmed', '2022-09-19 11:31:23'),
(240, 77, 0, '', NULL, 'Treated', '2022-09-19 11:32:16'),
(241, 78, 11, '', NULL, 'Pending Confirmation', '2022-09-19 11:34:37'),
(242, 79, 8, '3', 0, 'payment_pending', '2022-09-20 02:26:33'),
(243, 81, 8, '3', 0, 'payment_pending', '2022-09-20 03:05:31'),
(244, 81, 8, '3', 0, 'Pending Confirmation', '2022-09-20 03:07:33'),
(245, 81, 0, '3', NULL, 'Confirmed', '2022-09-20 03:07:57'),
(246, 35, 0, '3', NULL, 'Cancelled', '2022-09-20 13:51:03'),
(247, 44, 0, '3', NULL, 'Treated', '2022-09-20 16:32:11'),
(248, 82, 8, NULL, 24, 'Pending Confirmation', '2022-09-21 09:31:04'),
(249, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:33:17'),
(250, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:37:38'),
(251, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:38:42'),
(252, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:38:52'),
(253, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:39:24'),
(254, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:39:35'),
(255, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:39:48'),
(256, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:40:09'),
(257, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:40:40'),
(258, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 09:45:00'),
(259, 83, 8, '3', 0, 'payment_pending', '2022-09-21 10:07:34'),
(260, 83, 8, '3', 0, 'Pending Confirmation', '2022-09-21 10:08:49'),
(261, 83, 0, '3', NULL, 'Confirmed', '2022-09-21 10:09:05'),
(262, 84, 2, '3', 0, 'payment_pending', '2022-09-21 10:12:39'),
(263, 84, 2, '3', 0, 'Pending Confirmation', '2022-09-21 10:12:57'),
(264, 84, 0, '3', NULL, 'Confirmed', '2022-09-21 10:13:17'),
(265, 85, 2, '3', 0, 'payment_pending', '2022-09-21 10:23:47'),
(266, 85, 2, '3', 0, 'Pending Confirmation', '2022-09-21 10:23:59'),
(267, 85, 0, '3', NULL, 'Confirmed', '2022-09-21 10:24:50'),
(268, 82, 8, '1', 24, 'diagnostic', '2022-09-21 15:34:37'),
(269, 82, 8, '1', 24, 'diagnostic', '2022-09-21 15:35:16'),
(270, 82, 8, NULL, 36, 'Confirmed', '2022-09-21 15:38:29'),
(271, 86, 1, NULL, 24, 'Pending Confirmation', '2022-09-21 15:39:00'),
(272, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 15:39:17'),
(273, 86, 1, '1', NULL, 'Confirmed', '2022-09-21 15:39:19'),
(274, 86, 1, '1', NULL, 'Treated', '2022-09-21 15:40:01'),
(275, 82, 8, '1', NULL, 'Confirmed', '2022-09-21 15:40:29'),
(276, 86, 1, '1', 24, 'diagnostic', '2022-09-21 15:41:14'),
(277, 87, 1, NULL, 24, 'Pending Confirmation', '2022-09-22 05:52:48'),
(278, 87, 1, '1', NULL, 'Confirmed', '2022-09-22 05:53:43'),
(279, 87, 1, '1', NULL, 'Confirmed', '2022-09-22 05:54:36'),
(280, 87, 1, '1', NULL, 'Confirmed', '2022-09-22 05:54:48'),
(281, 87, 0, '1', NULL, 'Treated', '2022-09-22 06:01:25'),
(282, 88, 1, '3', 0, 'payment_pending', '2022-09-22 06:05:02'),
(283, 88, 1, '3', 0, 'Pending Confirmation', '2022-09-22 06:05:46'),
(284, 88, 0, '3', NULL, 'Confirmed', '2022-09-22 06:06:23'),
(285, 89, 1, NULL, 24, 'Pending Confirmation', '2022-09-22 06:43:25'),
(286, 89, 1, '10', NULL, 'Confirmed', '2022-09-22 06:46:00'),
(287, 90, 1, NULL, 24, 'Pending Confirmation', '2022-09-22 06:46:44'),
(288, 90, 1, '1', NULL, 'Confirmed', '2022-09-22 06:47:07'),
(289, 89, 1, '10', NULL, 'Confirmed', '2022-09-22 06:47:43'),
(290, 89, 0, '10', NULL, 'Treated', '2022-09-22 07:06:43'),
(291, 92, 1, NULL, 24, 'Pending Confirmation', '2022-09-24 05:23:20'),
(292, 93, 8, '3', 0, 'payment_pending', '2022-09-24 05:47:52'),
(293, 94, 8, '3', 0, 'payment_pending', '2022-09-24 05:48:18'),
(294, 94, 8, '3', 0, 'Pending Confirmation', '2022-09-24 05:48:41'),
(295, 94, 0, '3', NULL, 'Confirmed', '2022-09-24 05:49:36'),
(296, 94, 0, '3', NULL, 'Treated', '2022-09-24 06:01:20'),
(297, 95, 2, '3', 0, 'payment_pending', '2022-09-24 06:27:14'),
(298, 95, 2, '3', 0, 'Pending Confirmation', '2022-09-24 06:27:42'),
(299, 95, 0, '3', NULL, 'Confirmed', '2022-09-24 06:28:23'),
(300, 96, 13, NULL, 24, 'Pending Confirmation', '2022-09-24 06:30:27'),
(301, 97, 13, '3', 0, 'payment_pending', '2022-09-24 06:33:04'),
(302, 97, 13, '3', 0, 'Pending Confirmation', '2022-09-24 06:33:24'),
(303, 97, 0, '3', NULL, 'Confirmed', '2022-09-24 06:33:41'),
(304, 98, 13, '3', 0, 'payment_pending', '2022-09-24 06:38:35'),
(305, 98, 13, '3', 0, 'Pending Confirmation', '2022-09-24 06:38:55'),
(306, 98, 0, '3', NULL, 'Confirmed', '2022-09-24 06:39:38'),
(307, 96, 13, '1', NULL, 'Pending Confirmation', '2022-09-24 06:42:14'),
(308, 99, 1, NULL, 24, 'Pending Confirmation', '2022-09-24 06:52:13'),
(309, 89, 1, '10', NULL, 'Confirmed', '2022-09-24 07:41:09'),
(310, 99, 1, '', NULL, 'Pending Confirmation', '2022-09-24 07:42:37'),
(311, 99, 1, '1', NULL, 'Pending Confirmation', '2022-09-24 07:43:19'),
(312, 99, 1, '1', NULL, 'Confirmed', '2022-09-24 07:45:10'),
(313, 99, 1, '1', NULL, 'Confirmed', '2022-09-24 07:46:36'),
(314, 100, 13, NULL, 24, 'Pending Confirmation', '2022-09-24 07:47:13'),
(315, 100, 13, '1', NULL, 'Confirmed', '2022-09-24 07:54:01'),
(316, 90, 1, '1', NULL, 'Confirmed', '2022-09-24 08:04:36'),
(317, 100, 13, '1', NULL, 'Confirmed', '2022-09-24 08:05:14'),
(318, 100, 13, '1', NULL, 'Confirmed', '2022-09-24 08:09:31'),
(319, 99, 1, '1', NULL, 'Confirmed', '2022-09-24 08:10:56'),
(320, 101, 14, NULL, 24, 'Pending Confirmation', '2022-09-24 09:28:51'),
(321, 102, 1, NULL, 24, 'Pending Confirmation', '2022-09-24 09:53:26'),
(322, 101, 14, '1', NULL, 'Treated', '2022-09-24 10:01:06'),
(323, 103, 14, NULL, 24, 'Pending Confirmation', '2022-09-24 10:03:15'),
(324, 104, 14, '3', 0, 'payment_pending', '2022-09-24 10:15:02'),
(325, 104, 14, '3', 0, 'Pending Confirmation', '2022-09-24 10:15:54'),
(326, 103, 0, '1', NULL, 'Treated', '2022-09-24 10:22:37'),
(327, 102, 1, '1', NULL, 'Treated', '2022-09-24 10:30:16'),
(328, 105, 14, NULL, 24, 'Pending Confirmation', '2022-09-24 11:03:20'),
(329, 105, 14, '1', NULL, 'Confirmed', '2022-09-24 11:04:47'),
(330, 106, 1, NULL, 24, 'Pending Confirmation', '2022-09-24 11:08:07'),
(331, 105, 14, '1', 24, 'diagnostic', '2022-09-24 11:09:47'),
(332, 107, 14, '3', 0, 'payment_pending', '2022-09-24 11:23:25'),
(333, 107, 14, '3', 0, 'Pending Confirmation', '2022-09-24 11:23:41'),
(334, 104, 0, '3', NULL, 'Confirmed', '2022-09-24 11:26:08'),
(335, 108, 1, NULL, 24, 'Pending Confirmation', '2022-09-24 17:13:25'),
(336, 109, 1, '3', 0, 'payment_pending', '2022-09-25 08:48:40'),
(337, 109, 1, '3', 0, 'Pending Confirmation', '2022-09-25 08:49:24'),
(338, 110, 1, '4', 0, 'payment_pending', '2022-09-25 08:51:06'),
(339, 110, 1, '4', 0, 'Pending Confirmation', '2022-09-25 08:51:34'),
(340, 111, 1, '3', 0, 'payment_pending', '2022-09-25 08:52:00'),
(341, 111, 1, '3', 0, 'Pending Confirmation', '2022-09-25 08:52:21'),
(342, 112, 1, '3', 0, 'payment_pending', '2022-09-25 08:54:30'),
(343, 112, 1, '3', 0, 'Pending Confirmation', '2022-09-25 08:54:42'),
(344, 113, 1, '3', 0, 'payment_pending', '2022-09-25 11:00:06'),
(345, 113, 1, '3', 0, 'Pending Confirmation', '2022-09-25 11:00:25'),
(346, 113, 0, '3', NULL, 'Confirmed', '2022-09-25 11:00:44'),
(347, 106, 1, '1', NULL, 'Confirmed', '2022-09-25 13:18:07'),
(348, 114, 15, NULL, 24, 'Pending Confirmation', '2022-09-25 18:57:11'),
(349, 115, 15, NULL, 24, 'Pending Confirmation', '2022-09-25 19:02:37'),
(350, 115, 15, '1', NULL, 'Confirmed', '2022-09-25 19:05:49'),
(351, 114, 15, '1', NULL, 'Confirmed', '2022-09-25 19:11:56'),
(352, 114, 15, '1', NULL, 'Confirmed', '2022-09-25 19:12:01'),
(353, 114, 15, '1', 24, 'diagnostic', '2022-09-25 19:20:09'),
(354, 116, 15, '3', 0, 'payment_pending', '2022-09-25 19:34:44'),
(355, 116, 15, '3', 0, 'Pending Confirmation', '2022-09-25 19:35:03'),
(356, 116, 0, '3', NULL, 'Confirmed', '2022-09-25 19:36:13'),
(357, 116, 0, '3', NULL, 'Confirmed', '2022-09-25 19:49:04'),
(358, 117, 8, NULL, 24, 'Pending Confirmation', '2022-09-26 01:40:14'),
(359, 118, 1, '3', 0, 'payment_pending', '2022-09-26 04:21:16'),
(360, 118, 1, '3', 0, 'Pending Confirmation', '2022-09-26 04:21:39'),
(361, 118, 0, '3', NULL, 'Confirmed', '2022-09-26 04:23:01'),
(362, 117, 8, '10', NULL, 'Confirmed', '2022-09-26 04:31:15'),
(363, 119, 8, '3', 0, 'payment_pending', '2022-09-26 04:37:25'),
(364, 119, 8, '3', 0, 'Pending Confirmation', '2022-09-26 04:38:44'),
(365, 119, 0, '3', NULL, 'Confirmed', '2022-09-26 04:39:11'),
(366, 120, 8, NULL, 24, 'Pending Confirmation', '2022-09-26 08:44:21'),
(367, 120, 8, '1', NULL, 'Confirmed', '2022-09-26 08:46:58'),
(368, 120, 8, '1', NULL, 'Confirmed', '2022-09-26 08:47:02'),
(369, 120, 0, '1', NULL, 'Treated', '2022-09-26 08:57:03'),
(370, 120, 8, '1', 24, 'diagnostic', '2022-09-26 09:08:59'),
(371, 121, 1, NULL, 24, 'Pending Confirmation', '2022-09-26 15:24:05'),
(372, 122, 1, NULL, 24, 'Pending Confirmation', '2022-09-26 19:39:42'),
(373, 123, 1, NULL, 24, 'Pending Confirmation', '2022-09-26 19:41:18'),
(374, 124, 1, NULL, 24, 'Pending Confirmation', '2022-09-26 19:42:29'),
(375, 125, 1, NULL, 24, 'Pending Confirmation', '2022-09-26 20:21:30'),
(376, 126, 1, NULL, 24, 'Pending Confirmation', '2022-09-26 20:23:28'),
(377, 117, 8, '1', NULL, 'Confirmed', '2022-09-27 04:59:08'),
(378, 120, 8, '1', NULL, 'Confirmed', '2022-09-28 02:56:37'),
(379, 127, 8, NULL, 24, 'Pending Confirmation', '2022-09-28 04:24:37'),
(380, 128, 15, NULL, 24, 'Pending Confirmation', '2022-09-28 05:31:10'),
(381, 129, 1, NULL, 24, 'Pending Confirmation', '2022-09-28 05:50:42'),
(382, 130, 8, '3', 0, 'payment_pending', '2022-09-28 05:58:12'),
(383, 131, 1, '3', 0, 'payment_pending', '2022-09-28 05:58:37'),
(384, 131, 1, '3', 0, 'Pending Confirmation', '2022-09-28 05:58:53'),
(385, 130, 8, '3', 0, 'Pending Confirmation', '2022-09-28 05:59:31'),
(386, 131, 0, '3', NULL, 'Confirmed', '2022-09-28 06:00:17'),
(387, 130, 0, '3', NULL, 'Confirmed', '2022-09-28 06:02:00'),
(388, 132, 1, '3', 0, 'payment_pending', '2022-09-28 07:39:06'),
(389, 132, 1, '3', 0, 'Pending Confirmation', '2022-09-28 07:39:28'),
(390, 132, 0, '3', NULL, 'Confirmed', '2022-09-28 07:44:29'),
(391, 133, 1, '3', 0, 'payment_pending', '2022-09-28 08:14:24'),
(392, 133, 1, '3', 0, 'Pending Confirmation', '2022-09-28 08:14:45'),
(393, 133, 0, '3', NULL, 'Confirmed', '2022-09-28 08:15:23'),
(394, 134, 1, NULL, 24, 'Pending Confirmation', '2022-09-28 18:29:42'),
(395, 135, 8, '3', 0, 'payment_pending', '2022-09-29 03:15:32'),
(396, 135, 8, '3', 0, 'Pending Confirmation', '2022-09-29 03:16:51'),
(397, 135, 0, '3', NULL, 'Confirmed', '2022-09-29 03:17:14'),
(398, 136, 8, NULL, 24, 'Pending Confirmation', '2022-09-29 03:22:18'),
(399, 134, 1, '1', NULL, 'Confirmed', '2022-09-29 06:36:57'),
(400, 134, 1, '1', NULL, 'Confirmed', '2022-09-29 06:42:50'),
(401, 137, 1, NULL, 24, 'Pending Confirmation', '2022-09-29 06:50:23'),
(402, 137, 1, '1', NULL, 'Confirmed', '2022-09-29 06:51:08'),
(403, 138, 1, '3', 0, 'payment_pending', '2022-09-29 06:56:20'),
(404, 138, 1, '3', 0, 'Pending Confirmation', '2022-09-29 06:57:16'),
(405, 138, 0, '3', NULL, 'Confirmed', '2022-09-29 06:59:03'),
(406, 139, 1, NULL, 24, 'Pending Confirmation', '2022-09-29 07:17:48'),
(407, 140, 1, '3', 0, 'payment_pending', '2022-09-29 07:19:08'),
(408, 140, 1, '3', 0, 'Pending Confirmation', '2022-09-29 07:19:22'),
(409, 140, 0, '3', NULL, 'Confirmed', '2022-09-29 07:56:09'),
(410, 141, 15, NULL, 24, 'Pending Confirmation', '2022-09-29 08:26:58'),
(411, 141, 15, '1', NULL, 'Confirmed', '2022-09-29 08:29:41'),
(412, 142, 15, '3', 0, 'payment_pending', '2022-09-29 08:39:02'),
(413, 142, 15, '3', 0, 'Pending Confirmation', '2022-09-29 08:39:25'),
(414, 142, 0, '3', NULL, 'Confirmed', '2022-09-29 08:48:06'),
(415, 143, 1, '3', 0, 'payment_pending', '2022-09-29 09:01:11'),
(416, 143, 1, '3', 0, 'Pending Confirmation', '2022-09-29 09:01:27'),
(417, 143, 0, '3', NULL, 'Confirmed', '2022-09-29 09:01:38'),
(418, 63, 1, NULL, 24, 'Pending Confirmation', '2022-09-29 09:05:47'),
(419, 145, 1, NULL, 24, 'Pending Confirmation', '2022-09-29 09:06:55'),
(420, 145, 1, '1', NULL, 'Confirmed', '2022-09-29 09:09:10'),
(421, 146, 1, '3', 0, 'payment_pending', '2022-09-29 10:53:57'),
(422, 147, 1, '3', 0, 'payment_pending', '2022-09-29 11:43:35'),
(423, 148, 15, NULL, 24, 'Pending Confirmation', '2022-09-29 12:04:30'),
(424, 149, 15, '4', 0, 'payment_pending', '2022-09-29 12:05:31'),
(425, 149, 15, '4', 0, 'Pending Confirmation', '2022-09-29 12:05:43'),
(426, 148, 15, '1', NULL, 'Confirmed', '2022-09-29 12:06:33'),
(427, 150, 15, '3', 0, 'payment_pending', '2022-09-29 12:12:19'),
(428, 150, 15, '3', 0, 'Pending Confirmation', '2022-09-29 12:12:38'),
(429, 150, 0, '3', NULL, 'Confirmed', '2022-09-29 12:13:40'),
(430, 151, 2, NULL, 24, 'Pending Confirmation', '2022-09-29 17:23:25'),
(431, 151, 2, '1', NULL, 'Confirmed', '2022-09-29 17:23:57'),
(432, 151, 2, '1', NULL, 'Confirmed', '2022-09-29 17:23:59'),
(433, 152, 1, '3', 0, 'payment_pending', '2022-09-29 20:23:55'),
(434, 153, 1, '3', 0, 'payment_pending', '2022-09-29 20:24:36'),
(435, 136, 8, '1', NULL, 'Confirmed', '2022-09-30 02:21:26'),
(436, 136, 8, '1', NULL, 'Confirmed', '2022-09-30 02:21:47'),
(437, 154, 8, NULL, 24, 'Pending Confirmation', '2022-09-30 02:24:13'),
(438, 154, 8, '1', NULL, 'Confirmed', '2022-09-30 02:24:50'),
(439, 156, 8, NULL, 24, 'Pending Confirmation', '2022-10-01 03:53:42'),
(440, 156, 8, '1', NULL, 'Confirmed', '2022-10-01 04:03:28'),
(441, 156, 0, '1', NULL, 'Treated', '2022-10-01 04:13:14'),
(442, 158, 2, NULL, 24, 'Pending Confirmation', '2022-10-01 14:25:28'),
(443, 158, 2, '1', NULL, 'Confirmed', '2022-10-01 14:30:43'),
(444, 26, 0, '3', NULL, 'Confirmed', '2022-10-07 12:07:12'),
(445, 10, 0, '3', NULL, 'Cancelled', '2022-10-07 12:07:21'),
(446, 26, 0, '3', NULL, 'Cancelled', '2022-10-07 12:10:52'),
(447, 160, 9, '3', 0, 'payment_pending', '2022-10-08 14:32:30'),
(448, 160, 9, '3', 0, 'Pending Confirmation', '2022-10-08 14:32:48'),
(449, 17, 0, '1', NULL, 'Cancelled', '2022-10-11 09:06:00'),
(450, 161, 8, NULL, 24, 'Pending Confirmation', '2022-10-11 09:39:41'),
(451, 161, 8, '1', NULL, 'Confirmed', '2022-10-11 09:40:49'),
(452, 161, 0, '1', NULL, 'Treated', '2022-10-11 09:48:55'),
(453, 162, 16, NULL, 24, 'Pending Confirmation', '2022-10-14 02:45:55'),
(454, 162, 16, '1', NULL, 'Confirmed', '2022-10-14 02:49:19'),
(455, 164, 9, NULL, 24, 'Pending Confirmation', '2022-10-15 19:06:36'),
(456, 159, 8, NULL, 24, 'Pending Confirmation', '2022-10-17 16:27:38'),
(457, 155, 8, NULL, 24, 'Pending Confirmation', '2022-10-17 16:28:51'),
(458, 91, 8, NULL, 24, 'Pending Confirmation', '2022-10-17 16:29:59'),
(459, 166, 8, '3', 0, 'payment_pending', '2022-10-19 10:21:39'),
(460, 80, 8, NULL, 24, 'Pending Confirmation', '2022-10-19 10:23:27'),
(461, 74, 8, NULL, 24, 'Pending Confirmation', '2022-10-19 10:36:02'),
(462, 167, 1, '12', 0, 'payment_pending', '2022-10-19 17:09:52'),
(463, 167, 1, '12', 0, 'Pending Confirmation', '2022-10-19 17:10:07'),
(464, 167, 0, '12', NULL, 'Confirmed', '2022-10-19 17:10:27'),
(465, 168, 1, NULL, 24, 'Pending Confirmation', '2022-10-19 17:13:55'),
(466, 168, 1, '1', NULL, 'Confirmed', '2022-10-19 17:19:39'),
(467, 163, 9, NULL, 24, 'Pending Confirmation', '2022-10-21 18:54:17'),
(468, 165, 9, NULL, 24, 'Pending Confirmation', '2022-10-21 18:59:06'),
(469, 169, 9, '3', 0, 'payment_pending', '2022-10-21 19:00:26'),
(470, 170, 9, '3', 0, 'payment_pending', '2022-10-21 19:03:34'),
(471, 170, 9, '3', 0, 'Pending Confirmation', '2022-10-21 19:03:54'),
(472, 172, 8, '3', 0, 'payment_pending', '2022-10-24 03:02:43'),
(473, 172, 8, '3', 0, 'Pending Confirmation', '2022-10-24 03:02:59'),
(474, 173, 1, '11', 0, 'payment_pending', '2022-10-26 05:49:12'),
(475, 174, 1, '4', 0, 'payment_pending', '2022-10-26 05:52:07'),
(476, 175, 8, '11', 0, 'payment_pending', '2022-10-27 07:15:51'),
(477, 69, 8, NULL, 24, 'Pending Confirmation', '2022-10-27 07:16:57'),
(478, 176, 1, NULL, 24, 'Pending Confirmation', '2022-10-27 13:40:58'),
(479, 176, 1, '', NULL, 'Confirmed', '2022-10-27 13:50:36'),
(480, 176, 1, '1', NULL, 'Confirmed', '2022-10-27 13:50:49'),
(481, 176, 0, '1', NULL, 'Treated', '2022-10-27 14:01:00'),
(482, 176, 1, '1', 24, 'diagnostic', '2022-10-27 14:16:49'),
(483, 165, 9, '', NULL, 'Pending Confirmation', '2022-10-27 19:36:40'),
(484, 180, 1, '1', NULL, 'Confirmed', '2022-10-28 09:40:47'),
(485, 179, 1, '1', NULL, 'Confirmed', '2022-10-28 09:43:28'),
(486, 178, 1, '1', NULL, 'Confirmed', '2022-10-28 10:04:26'),
(487, 178, 1, '1', NULL, 'Confirmed', '2022-10-28 10:04:30'),
(488, 178, 1, '1', NULL, 'Confirmed', '2022-10-28 10:04:37'),
(489, 178, 1, '1', NULL, 'Confirmed', '2022-10-28 10:04:53'),
(490, 178, 1, '1', NULL, 'Confirmed', '2022-10-28 10:04:57'),
(491, 178, 1, '1', NULL, 'Confirmed', '2022-10-28 10:04:58'),
(492, 183, 9, NULL, 24, 'Pending Confirmation', '2022-10-28 18:39:06'),
(493, 184, 9, '3', 0, 'payment_pending', '2022-10-28 18:44:03'),
(494, 187, 1, '12', 0, 'payment_pending', '2022-10-28 20:38:52'),
(495, 189, 2, '1', NULL, 'Confirmed', '2022-10-29 07:02:14'),
(496, 190, 1, '13', 0, 'payment_pending', '2022-10-29 07:45:50'),
(497, 191, 8, NULL, 24, 'Pending Confirmation', '2022-10-31 02:50:55'),
(498, 191, 8, '1', NULL, 'Confirmed', '2022-10-31 02:53:33'),
(499, 193, 1, '1', NULL, 'Confirmed', '2022-10-31 06:56:42'),
(500, 194, 8, NULL, 24, 'Pending Confirmation', '2022-10-31 07:20:25'),
(501, 194, 8, '1', NULL, 'Confirmed', '2022-10-31 07:21:22'),
(502, 193, 1, '1', 24, 'diagnostic', '2022-10-31 08:15:02'),
(503, 196, 1, '1', NULL, 'Confirmed', '2022-10-31 10:56:23'),
(504, 194, 8, '1', 24, 'diagnostic', '2022-10-31 11:23:46'),
(505, 194, 8, '1', 24, 'diagnostic', '2022-10-31 11:31:20'),
(506, 196, 1, NULL, 28, 'Confirmed', '2022-10-31 11:38:31'),
(507, 196, 1, NULL, 28, 'Confirmed', '2022-10-31 11:38:34'),
(508, 197, 1, NULL, 28, 'Confirmed', '2022-10-31 11:44:16'),
(509, 197, 1, NULL, 28, 'Confirmed', '2022-10-31 11:44:19'),
(510, 197, 1, NULL, 28, 'Confirmed', '2022-10-31 11:44:22'),
(511, 197, 1, NULL, 28, 'Confirmed', '2022-10-31 11:44:25'),
(512, 198, 9, '3', 0, 'payment_pending', '2022-10-31 17:42:26'),
(513, 198, 9, '3', 0, 'Pending Confirmation', '2022-10-31 17:43:03'),
(514, 198, 0, '3', NULL, 'Confirmed', '2022-10-31 17:56:31'),
(515, 198, 0, '3', NULL, 'Treated', '2022-10-31 17:58:26'),
(516, 199, 2, '1', 24, 'payment_pending', '2022-10-31 18:11:26'),
(517, 200, 2, '1', 24, 'payment_pending', '2022-10-31 18:18:31'),
(518, 201, 9, '3', 0, 'payment_pending', '2022-10-31 18:20:16'),
(519, 201, 9, '3', 0, 'Pending Confirmation', '2022-10-31 18:20:55'),
(520, 202, 9, '3', 0, 'payment_pending', '2022-10-31 18:31:44'),
(521, 202, 9, '3', 0, 'Pending Confirmation', '2022-10-31 18:32:06'),
(522, 203, 9, '3', 24, 'payment_pending', '2022-10-31 18:35:17'),
(523, 205, 9, '3', 24, 'payment_pending', '2022-10-31 18:39:52'),
(524, 206, 9, '3', 24, 'payment_pending', '2022-10-31 18:41:25'),
(525, 207, 8, NULL, 24, 'Pending Confirmation', '2022-11-01 04:00:11'),
(526, 207, 8, '1', NULL, 'Confirmed', '2022-11-01 04:00:43'),
(527, 207, 0, '1', NULL, 'Treated', '2022-11-01 04:02:46'),
(528, 194, 0, '1', NULL, 'Treated', '2022-11-01 04:12:26'),
(529, 212, 8, NULL, 24, 'Pending Confirmation', '2022-11-02 04:38:59'),
(530, 212, 8, '1', NULL, 'Confirmed', '2022-11-02 04:39:52'),
(531, 212, 0, '1', NULL, 'Treated', '2022-11-02 04:42:35'),
(532, 212, 0, '1', NULL, 'Confirmed', '2022-11-02 05:51:24'),
(533, 212, 0, '1', NULL, 'Treated', '2022-11-02 05:52:18'),
(534, 213, 32, '14', 0, 'payment_pending', '2022-11-02 08:54:28'),
(535, 213, 32, '14', 0, 'Pending Confirmation', '2022-11-02 08:55:17'),
(536, 213, 0, '14', NULL, 'Confirmed', '2022-11-02 08:55:52'),
(537, 214, 31, '1', NULL, 'Confirmed', '2022-11-02 14:51:25'),
(538, 215, 32, NULL, 24, 'Pending Confirmation', '2022-11-02 17:23:48'),
(539, 213, 0, '14', NULL, 'Treated', '2022-11-02 17:31:01'),
(540, 216, 9, '14', 0, 'payment_pending', '2022-11-03 05:38:41'),
(541, 216, 9, '14', 0, 'Pending Confirmation', '2022-11-03 05:39:09'),
(542, 218, 9, '14', 0, 'payment_pending', '2022-11-03 05:46:58'),
(543, 219, 9, NULL, 24, 'Pending Confirmation', '2022-11-03 06:49:45'),
(544, 220, 1, '1', NULL, 'Confirmed', '2022-11-03 06:58:41'),
(545, 221, 8, NULL, 24, 'Pending Confirmation', '2022-11-03 11:47:53'),
(546, 221, 8, '1', NULL, 'Confirmed', '2022-11-03 11:55:34'),
(547, 221, 0, '1', NULL, 'Treated', '2022-11-03 11:59:19'),
(548, 223, NULL, NULL, 24, 'payment_pending', '2022-11-03 18:02:25'),
(549, 223, 1, '1', NULL, '', '2022-11-03 18:04:05'),
(550, 223, 1, '1', NULL, 'Confirmed', '2022-11-03 18:04:17'),
(551, 224, NULL, NULL, 24, 'payment_pending', '2022-11-03 18:12:25'),
(552, 224, 1, '1', NULL, 'Confirmed', '2022-11-03 18:17:29'),
(553, 225, NULL, NULL, 24, 'payment_pending', '2022-11-03 18:57:38'),
(554, 226, NULL, NULL, 24, 'payment_pending', '2022-11-03 18:59:14'),
(555, 227, NULL, NULL, 24, 'payment_pending', '2022-11-03 19:01:14'),
(556, 228, NULL, NULL, 24, 'payment_pending', '2022-11-03 19:01:33'),
(557, 229, NULL, NULL, 24, 'payment_pending', '2022-11-03 19:02:17'),
(558, 230, NULL, NULL, 24, 'payment_pending', '2022-11-03 19:04:38'),
(559, 231, NULL, NULL, 24, 'payment_pending', '2022-11-04 10:19:33'),
(560, 232, NULL, NULL, 24, 'payment_pending', '2022-11-04 16:34:25'),
(561, 232, 1, '1', NULL, 'Confirmed', '2022-11-04 16:35:51'),
(562, 231, 1, '', NULL, 'Confirmed', '2022-11-04 16:39:21'),
(563, 231, 1, '1', NULL, 'Confirmed', '2022-11-04 16:39:38'),
(564, 233, NULL, NULL, 24, 'payment_pending', '2022-11-07 07:58:03'),
(565, 233, 8, '1', NULL, 'Pending Confirmation', '2022-11-07 14:47:54'),
(566, 213, NULL, NULL, 24, 'Referred', '2022-11-09 11:04:11'),
(567, 234, NULL, NULL, 24, 'payment_pending', '2022-11-10 14:13:00'),
(568, 235, NULL, NULL, 24, 'payment_pending', '2022-11-12 10:33:06'),
(569, 236, NULL, NULL, 24, 'payment_pending', '2022-11-13 18:43:52'),
(570, 237, NULL, NULL, 24, 'payment_pending', '2022-11-14 05:39:29'),
(571, 238, NULL, NULL, 24, 'payment_pending', '2022-11-15 16:05:11'),
(572, 239, NULL, NULL, 24, 'payment_pending', '2022-11-15 17:16:24'),
(573, 240, NULL, NULL, 24, 'payment_pending', '2022-11-16 06:17:37'),
(574, 240, 1, NULL, 24, 'Pending Confirmation', '2022-11-16 06:22:25'),
(575, 241, NULL, NULL, 24, 'payment_pending', '2022-11-16 06:30:22'),
(576, 242, NULL, NULL, 24, 'payment_pending', '2022-11-16 06:31:11'),
(577, 242, 1, NULL, 24, 'Pending Confirmation', '2022-11-16 06:44:22'),
(578, 243, NULL, NULL, 24, 'payment_pending', '2022-11-16 07:01:09'),
(579, 242, 1, '1', NULL, 'Confirmed', '2022-11-16 07:29:53'),
(580, 242, NULL, '1', NULL, 'Treated', '2022-11-16 07:40:28'),
(581, 232, NULL, '1', NULL, 'Treated', '2022-11-17 18:44:31'),
(582, 231, NULL, '1', NULL, 'Treated', '2022-11-21 19:48:37'),
(583, 245, NULL, NULL, 24, 'payment_pending', '2022-11-23 08:09:00'),
(584, 245, 8, NULL, 24, 'Pending Confirmation', '2022-11-23 08:09:34'),
(585, 245, 8, '1', NULL, 'Confirmed', '2022-11-23 08:10:35'),
(586, 246, NULL, NULL, 24, 'payment_pending', '2022-11-25 03:04:27'),
(587, 246, 8, NULL, 24, 'Pending Confirmation', '2022-11-25 03:06:11'),
(588, 246, 8, '1', NULL, 'Confirmed', '2022-11-25 03:08:54'),
(589, 247, NULL, NULL, 24, 'payment_pending', '2022-11-28 12:29:37'),
(590, 247, 1, '1', NULL, 'Confirmed', '2022-11-28 12:30:27'),
(591, 247, 1, '1', NULL, 'Confirmed', '2022-11-30 07:02:53'),
(592, 248, NULL, NULL, 24, 'payment_pending', '2022-11-30 12:55:27'),
(593, 249, NULL, NULL, 24, 'payment_pending', '2022-11-30 13:39:38'),
(594, 2, NULL, NULL, 24, 'Referred', '2022-12-01 13:25:30'),
(595, 2, NULL, NULL, 28, 'Referred', '2022-12-01 13:25:32'),
(596, 2, NULL, NULL, 28, 'Referred', '2022-12-01 13:25:35'),
(597, 2, NULL, NULL, 28, 'Referred', '2022-12-01 13:25:35'),
(598, 7, NULL, NULL, 28, 'Referred', '2022-12-01 13:27:08'),
(599, 250, NULL, NULL, 24, 'payment_pending', '2022-12-01 13:41:23'),
(600, 250, 1, '1', NULL, 'Confirmed', '2022-12-01 13:42:26'),
(601, 20, NULL, NULL, 36, 'Referred', '2022-12-01 16:21:29'),
(602, 51, NULL, NULL, 24, 'Referred', '2022-12-01 16:21:39'),
(603, 244, NULL, '1', NULL, 'Referred', '2022-12-01 17:10:09'),
(604, 244, NULL, NULL, 24, 'Referred', '2022-12-01 17:11:29'),
(605, 242, NULL, NULL, 28, 'Referred', '2022-12-01 17:13:46'),
(606, 232, NULL, NULL, 28, 'Referred', '2022-12-02 09:51:24'),
(607, 231, NULL, NULL, 28, 'Referred', '2022-12-02 10:44:43'),
(608, 251, NULL, NULL, 24, 'payment_pending', '2022-12-03 11:04:36'),
(609, 252, NULL, NULL, 24, 'payment_pending', '2022-12-03 11:34:32'),
(610, 253, 9, '14', 0, 'payment_pending', '2022-12-09 14:56:04'),
(611, 254, NULL, NULL, 24, 'payment_pending', '2022-12-09 15:11:16'),
(612, 238, 9, NULL, 24, 'Pending Confirmation', '2022-12-09 15:28:20'),
(613, 255, NULL, NULL, 24, 'payment_pending', '2022-12-10 13:35:11'),
(614, 256, NULL, NULL, 24, 'payment_pending', '2022-12-13 06:57:46'),
(615, 256, 1, '2', NULL, 'Confirmed', '2022-12-13 07:03:18'),
(616, 256, NULL, '2', NULL, 'Treated', '2022-12-13 07:07:48'),
(617, 256, 1, '2', 24, 'diagnostic', '2022-12-13 07:36:32'),
(618, 257, NULL, NULL, 24, 'payment_pending', '2022-12-13 07:47:05'),
(619, 257, 1, '2', NULL, 'Confirmed', '2022-12-13 07:48:15'),
(620, 258, NULL, NULL, 24, 'payment_pending', '2022-12-13 07:52:16'),
(621, 258, 1, '2', NULL, 'Confirmed', '2022-12-13 07:54:03'),
(622, 257, 1, '2', 24, 'diagnostic', '2022-12-13 07:58:17'),
(623, 258, 1, '2', 24, 'diagnostic', '2022-12-13 08:04:16'),
(624, 259, NULL, NULL, 24, 'payment_pending', '2022-12-13 09:33:42'),
(625, 260, NULL, NULL, 24, 'payment_pending', '2022-12-13 09:34:58'),
(626, 260, 40, NULL, 24, 'Pending Confirmation', '2022-12-13 09:35:58'),
(627, 261, NULL, NULL, 24, 'payment_pending', '2022-12-13 11:49:21'),
(628, 262, NULL, NULL, 24, 'payment_pending', '2022-12-13 11:50:34'),
(629, 262, 1, '2', NULL, 'Confirmed', '2022-12-13 11:52:50'),
(630, 262, 1, '2', NULL, 'Confirmed', '2022-12-13 11:52:54'),
(631, 258, 1, '2', 24, 'diagnostic', '2022-12-13 12:12:14'),
(632, 261, 1, '2', NULL, 'Confirmed', '2022-12-13 18:35:40'),
(633, 263, NULL, NULL, 24, 'payment_pending', '2022-12-14 15:11:02'),
(634, 263, 1, '', NULL, 'Pending Confirmation', '2022-12-14 15:11:48'),
(635, 263, 1, '1', NULL, 'Confirmed', '2022-12-14 16:06:51'),
(636, 263, NULL, '1', NULL, 'Treated', '2022-12-14 16:08:05'),
(637, 264, NULL, NULL, 24, 'payment_pending', '2022-12-14 16:39:19'),
(638, 264, 1, '1', NULL, 'Confirmed', '2022-12-14 16:40:18'),
(639, 264, NULL, '1', NULL, 'Treated', '2022-12-14 16:48:34'),
(640, 265, NULL, NULL, 24, 'payment_pending', '2022-12-15 04:37:51'),
(641, 265, 8, NULL, 24, 'Pending Confirmation', '2022-12-15 04:38:50'),
(642, 266, NULL, NULL, 24, 'payment_pending', '2022-12-16 04:01:45'),
(643, 266, 8, NULL, 24, 'Pending Confirmation', '2022-12-16 04:02:14'),
(644, 260, 40, '1', NULL, 'Confirmed', '2022-12-20 07:32:51');

-- --------------------------------------------------------

--
-- Table structure for table `patient_material`
--

CREATE TABLE `patient_material` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_summary`
--

CREATE TABLE `patient_summary` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(10) NOT NULL,
  `attachment` varchar(100) NOT NULL,
  `summary` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_summary`
--

INSERT INTO `patient_summary` (`id`, `patient_id`, `attachment`, `summary`, `status`, `created_at`) VALUES
(1, '2', '20220805131540.jpg', 'The keto diet, as a rule, is very low in carbs, high in fat, and moderate in protein.\n\nWhen  a ketogenic diet, carb content is between 5–10% of calories consumed, though looser versions of the diet exist (7Trusted Source).\n\nFats should replace the majority of cut carbs and deliver approximately 60–80% of your total caloric intake.\n\nProteins should account for around 10–30% of energy needs, while carbs are usually restricted to 5%.\n\nThis carb reduction forces your body to rely on fats for its main energy source instead of glucose — a process known as ketosis.\n\n\n', '', '2022-08-05 12:15:40'),
(2, '2', '20220805131604.png', 'The keto diet, as a rule, is very low in carbs, high in fat, and moderate in protein.\n\nWhen  a ketogenic diet, carb content is between 5–10% of calories consumed, though looser versions of the diet exist (7Trusted Source).\n\n', '', '2022-08-05 12:16:04'),
(3, '14', '20220924122243.png', 'Internal Test', '', '2022-09-24 11:22:43'),
(4, '1', '20221118084704.jpg', 'good\n', '', '2022-11-18 08:47:04'),
(5, '1', '20221031101126.jpg', 'good\n', '', '2022-10-31 10:11:26'),
(6, '8', '20221102070449.png', 'this is my medical data', '', '2022-11-02 07:04:49'),
(7, '32', '20221102171857.png', 'vynghgyjju', '', '2022-11-02 17:18:57'),
(8, '32', '20221102171902.png', 'vynghgyjju', '', '2022-11-02 17:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `category`, `patient`, `doctor`, `date`, `amount`, `vat`, `x_ray`, `flat_vat`, `discount`, `flat_discount`, `gross_total`, `remarks`, `hospital_amount`, `doctor_amount`, `category_amount`, `category_name`, `amount_received`, `deposit_type`, `status`, `user`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`) VALUES
(1, NULL, '23', NULL, NULL, '300', '0', NULL, NULL, '0', NULL, NULL, 'pay_K0eqMc5E193Yao', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, '1', NULL, NULL, '300', '0', NULL, NULL, '0', NULL, NULL, 'pay_K0fu57gc6UxQq2', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, '1', NULL, '1659394800', '5000', '0', NULL, NULL, '0', NULL, NULL, '2e4db961-a25e-439c-ba09-b3ed9dddd205', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(4, NULL, '1', NULL, '1659394800', '6000', '0', NULL, NULL, '0', NULL, NULL, '4505e566-3617-404a-9cb4-4f4a8217355d', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(5, NULL, '1', NULL, '1659394800', '1000', '0', NULL, NULL, '0', NULL, NULL, '8c01682b-5c8e-4b68-9f0f-f2616bd9c88f', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(6, NULL, '1', '3', '1659394800', '1500', '0', NULL, NULL, '0', NULL, NULL, '907f2cb0-d271-4635-ba1b-7f7a7ef8eab8', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(7, NULL, '1', NULL, '1659481200', '5000', '0', NULL, NULL, '0', NULL, NULL, '5e2f1869-dbbc-4f8e-ba54-601974386381', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(8, NULL, '1', NULL, '1659481200', '5000', '0', NULL, NULL, '0', NULL, NULL, '24bc7b59-12ee-4057-87eb-69eaeb3371fd', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(9, NULL, '2', NULL, NULL, '300', '0', NULL, NULL, '0', NULL, NULL, 'pay_K1r8LRWtczmlWK', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, NULL, '2', NULL, '1659654000', '5000', '0', NULL, NULL, '0', NULL, NULL, 'faf51ec7-d135-490f-876d-7e4bac5421c1', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(11, NULL, '2', NULL, '1659654000', '1000', '0', NULL, NULL, '0', NULL, NULL, 'ae241f75-9088-406f-9eb7-4ec5367ec382', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(12, NULL, '2', '4', '1659654000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'a246414c-1653-40ae-be44-c6c0c401c1c1', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(13, NULL, '2', '3', '1659654000', '1500', '0', NULL, NULL, '0', NULL, NULL, '81339100-536d-4f05-b860-47274a0bf20c', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(14, NULL, '2', '4', '1659654000', '1500', '0', NULL, NULL, '0', NULL, NULL, '33e928f7-b92b-4b89-9c08-7b20ec8b3104', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(15, NULL, '2', NULL, '1659654000', '7000', '0', NULL, NULL, '0', NULL, NULL, 'b0ae6207-bfdc-432e-b9fd-a984bb90c00b', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(16, NULL, '2', NULL, '1659654000', '2500', '0', NULL, NULL, '0', NULL, NULL, '0ea6f9c2-11b6-472f-8c64-fa4fc93da574', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(17, NULL, '2', NULL, '1659654000', '5000', '0', NULL, NULL, '0', NULL, NULL, '553751df-2c3f-4d9f-ae32-9249b4f0be2f', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(18, NULL, '2', '4', '1659740400', '1500', '0', NULL, NULL, '0', NULL, NULL, '5ec5c5ce-9740-401a-9cd8-32a5dc226514', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(19, NULL, '2', NULL, '1659740400', '5000', '0', NULL, NULL, '0', NULL, NULL, 'aa36d62b-75b3-4621-86bf-3ce287e31d97', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(20, NULL, '2', NULL, '1659826800', '1000', '0', NULL, NULL, '0', NULL, NULL, '615e40d6-6807-40c8-83de-c8939669f7e3', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(21, NULL, '2', '4', '1659826800', '1500', '0', NULL, NULL, '0', NULL, NULL, '17357c06-cd2d-47eb-aba4-b909aafddf2c', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(22, NULL, '1', NULL, '1661295600', '5000', '0', NULL, NULL, '0', NULL, NULL, '2f89ac38-1889-421d-8571-58da63441fd7', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(23, NULL, '6', NULL, NULL, '300', '0', NULL, NULL, '0', NULL, NULL, '6021a43f-53c6-4b49-81ba-984bacd1b208', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, NULL, '2', NULL, '1661554800', '1000', '0', NULL, NULL, '0', NULL, NULL, '60ee575a-0b59-43c3-a664-8a59d4e87b93', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(25, NULL, '2', NULL, '1661554800', '5000', '0', NULL, NULL, '0', NULL, NULL, '14b99971-73e6-4a03-88f5-0e5d7563f4bc', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(26, NULL, '2', '3', '1661554800', '1500', '0', NULL, NULL, '0', NULL, NULL, '820123d7-1a99-4c86-b236-9443ca1747b3', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(27, NULL, '2', '4', '1661554800', '1500', '0', NULL, NULL, '0', NULL, NULL, 'f31f30ec-50de-46ce-9e7d-25ac91bc8dd2', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(28, NULL, '2', NULL, '1661554800', '5000', '0', NULL, NULL, '0', NULL, NULL, '86526fed-6582-4c48-b436-99fc4dcee415', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(29, NULL, '2', '3', '1661554800', '1500', '0', NULL, NULL, '0', NULL, NULL, '0ed2f433-96d8-42c8-a785-9ebbe7613f4b', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(30, NULL, '2', NULL, '1661814000', '5000', '0', NULL, NULL, '0', NULL, NULL, 'a28afad4-6961-4bf8-a997-4eec4af866b9', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(31, NULL, '1', '3', '1662073200', '1500', '0', NULL, NULL, '0', NULL, NULL, '6ad3a97f-ca39-4d51-a3cf-4f94ebfdf062', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(32, NULL, '2', NULL, '1662332400', '5000', '0', NULL, NULL, '0', NULL, NULL, 'c38d33c9-e845-4e34-9a94-b34ad0d3f402', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(33, NULL, '1', NULL, '1662418800', '5000', '0', NULL, NULL, '0', NULL, NULL, 'b2597538-f706-47a2-8a01-224ca5defa93', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(34, NULL, '1', '3', '1662418800', '1500', '0', NULL, NULL, '0', NULL, NULL, '3a3889ca-ea99-4736-8375-6f65bd4e6e07', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(35, NULL, '1', NULL, '1662591600', '5000', '0', NULL, NULL, '0', NULL, NULL, 'fc387299-52e5-4e51-99a5-9970b3096d12', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(36, NULL, '2', NULL, '1662591600', '5000', '0', NULL, NULL, '0', NULL, NULL, 'd16663dd-1636-46a7-90e2-cf0efb218ad5', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(37, NULL, '1', NULL, '1662678000', '5000', '0', NULL, NULL, '0', NULL, NULL, 'dfe25825-12d1-4119-8af3-92e27ebd0f41', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(38, NULL, '2', NULL, '1662678000', '5000', '0', NULL, NULL, '0', NULL, NULL, 'fe7d258b-08fd-4ff1-ac6b-89960cfdc6cb', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(39, NULL, '1', '3', '1662678000', '1500', '0', NULL, NULL, '0', NULL, NULL, '1525a5d3-431b-4023-add1-74096d56f323', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(40, NULL, '7', NULL, NULL, '300', '0', NULL, NULL, '0', NULL, NULL, '27121be3-7bc3-4ecb-b235-ed47657d2abc', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, NULL, '1', NULL, '1663110000', '5000', '0', NULL, NULL, '0', NULL, NULL, '92fd51b2-0bf9-49a4-9801-8fb1a30e19b0', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(42, NULL, '8', NULL, NULL, '600', '0', NULL, NULL, '0', NULL, NULL, '4815e581-171d-422b-923b-14d283998135', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, NULL, '8', NULL, '1663110000', '2900', '0', NULL, NULL, '0', NULL, NULL, '7435ee51-8d17-403a-af56-7d63f89f17d0', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(44, NULL, '8', NULL, '1663110000', '2000', '0', NULL, NULL, '0', NULL, NULL, '04543fce-a5e7-47b8-9498-2ccb4aff9476', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(45, NULL, '8', NULL, '1663282800', '5000', '0', NULL, NULL, '0', NULL, NULL, '8e20abfa-d97e-4b9e-b19f-1ed753840cb3', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(46, NULL, '8', NULL, '1663282800', '5000', '0', NULL, NULL, '0', NULL, NULL, '4754790f-1e22-4830-8cc6-22c4d104632d', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(47, NULL, '1', NULL, '1663282800', '2500', '0', NULL, NULL, '0', NULL, NULL, '0aa888b7-4aa2-436d-811e-49ddbdfe5d20', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(48, NULL, '1', NULL, '1663282800', '2900', '0', NULL, NULL, '0', NULL, NULL, '1b15f338-b185-4ee1-8daa-0748035c0162', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(49, NULL, '2', NULL, '1663282800', '1000', '0', NULL, NULL, '0', NULL, NULL, 'b7e37b60-af5d-4fe4-af78-8489df99981d', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(50, NULL, '6', NULL, '1663282800', '2500', '0', NULL, NULL, '0', NULL, NULL, 'df744b6b-3a8d-4101-9b81-97630abcb6c2', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(51, NULL, '6', NULL, '1663282800', '5000', '0', NULL, NULL, '0', NULL, NULL, 'd640bdb2-4ba3-4f37-870e-bc6a6cdc0353', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(52, NULL, '6', NULL, '1663282800', '5000', '0', NULL, NULL, '0', NULL, NULL, 'c530ff2a-96f1-4397-a47d-0511ec157b91', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(53, NULL, '1', NULL, '1663282800', '5000', '0', NULL, NULL, '0', NULL, NULL, 'd32f2283-661a-4bc2-a626-883c8e0dc684', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(54, NULL, '2', NULL, '1663369200', '7000', '0', NULL, NULL, '0', NULL, NULL, '0d074fad-4b61-40f4-a7c5-37f9274e7b0b', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(55, NULL, '8', NULL, '1663542000', '2000', '0', NULL, NULL, '0', NULL, NULL, '482bb82e-74a4-48bf-8e46-822a2688dd18', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(56, NULL, '1', NULL, '1663542000', '5000', '0', NULL, NULL, '0', NULL, NULL, '4810f526-1e6b-4e83-bc99-f188dbc52f6e', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(57, NULL, '1', NULL, '1663542000', '5000', '0', NULL, NULL, '0', NULL, NULL, '971705e0-687c-41ea-af05-7cad27db0615', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(58, NULL, '8', '3', '1663628400', '1500', '0', NULL, NULL, '0', NULL, NULL, '483e3757-a881-44bd-9404-e781a3ca2638', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(59, NULL, '8', NULL, '1663714800', '2000', '0', NULL, NULL, '0', NULL, NULL, '8e564756-c572-4ed5-ab3c-629ddfba20a9', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(60, NULL, '8', '3', '1663714800', '1500', '0', NULL, NULL, '0', NULL, NULL, '076e4ed9-d791-465e-9939-2ebb4324f9b3', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(61, NULL, '2', '3', '1663714800', '1500', '0', NULL, NULL, '0', NULL, NULL, 'f9cebd3e-e316-4e49-a3d8-f4fe97dff49e', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(62, NULL, '2', '3', '1663714800', '1500', '0', NULL, NULL, '0', NULL, NULL, 'c5bad8c1-570a-4171-98c5-9747cb62c841', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(63, NULL, '1', NULL, '1663714800', '5000', '0', NULL, NULL, '0', NULL, NULL, 'aad942ba-efab-4e72-97f9-9fd5f6bac97c', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(64, NULL, '1', NULL, '1663801200', '2000', '0', NULL, NULL, '0', NULL, NULL, '9bb30cf2-8754-4784-8dd4-ebaaeaf141b1', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(65, NULL, '1', '3', '1663801200', '1500', '0', NULL, NULL, '0', NULL, NULL, 'dcd90413-f977-4f46-8e9b-5dddf3d0a3ff', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(66, NULL, '1', NULL, '1663801200', '2000', '0', NULL, NULL, '0', NULL, NULL, 'e064f44a-3ec0-423a-93a3-9ae4e61146d8', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(67, NULL, '1', NULL, '1663801200', '5000', '0', NULL, NULL, '0', NULL, NULL, 'e4eeba19-b5f6-450f-86de-56999d3cb627', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(68, NULL, '1', NULL, '1663974000', '5000', '0', NULL, NULL, '0', NULL, NULL, '413325e4-9f92-474d-a1b0-0e9d5d794b21', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(69, NULL, '8', '3', '1663974000', '1500', '0', NULL, NULL, '0', NULL, NULL, '9a05a61f-2c48-4f01-8eba-74071412c8fb', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(70, NULL, '2', '3', '1663974000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'd6121db0-5c17-4981-82a6-6eab9d7d3a96', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(71, NULL, '13', NULL, NULL, '600', '0', NULL, NULL, '0', NULL, NULL, '204fec4c-f4a3-41c7-b948-b4c32cd8db4c', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(72, NULL, '13', NULL, '1663974000', '2000', '0', NULL, NULL, '0', NULL, NULL, 'f8b5326f-dd40-44a4-9298-c951cf913345', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(73, NULL, '13', '3', '1663974000', '1500', '0', NULL, NULL, '0', NULL, NULL, '748782e5-348f-47a8-940f-95d193f07c96', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(74, NULL, '13', '3', '1663974000', '1500', '0', NULL, NULL, '0', NULL, NULL, '8e15fa2c-dc96-46fa-8c85-222dae0f3bf0', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(75, NULL, '1', NULL, '1663974000', '5000', '0', NULL, NULL, '0', NULL, NULL, '4f849bbb-5e11-4cb8-92bb-892174aac511', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(76, NULL, '13', '', '1663974000', '35000', '0', NULL, NULL, '0', '0', '35000', 'e45cac57-246a-4146-9cfe-4310d4622a3a', '35000', '0', NULL, '142*20000*others*1,141*15000*others*1', '', NULL, 'paid', '909', 'Aad', '+919790936741', NULL, NULL, NULL, '24'),
(77, NULL, '14', NULL, NULL, '600', '0', NULL, NULL, '0', NULL, NULL, '4f0b2004-27a3-46b6-9afe-c8f77825361c', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(78, NULL, '14', NULL, '1663974000', '1000', '0', NULL, NULL, '0', NULL, NULL, 'fd0a0777-27d7-43e2-90ab-46b13fa08dde', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(79, NULL, '1', NULL, '1663974000', '5000', '0', NULL, NULL, '0', NULL, NULL, '3d84976a-3fde-4341-b9da-ba3267a1711d', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(80, NULL, '14', NULL, '1663974000', '2500', '0', NULL, NULL, '0', NULL, NULL, '107c087b-89e5-41b7-ac6e-c2f1a0e2f3b2', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(81, NULL, '14', '3', '1663974000', '1500', '0', NULL, NULL, '0', NULL, NULL, '8cf4839b-8b98-4abd-b077-22c897a51d1a', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(82, NULL, '14', NULL, '1663974000', '2500', '0', NULL, NULL, '0', NULL, NULL, 'c6400439-2b7a-4d8b-8682-69343c73c0a1', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(83, NULL, '1', NULL, '1663974000', '5000', '0', NULL, NULL, '0', NULL, NULL, '990d6a21-716a-4f9b-9247-b0e1f68bd48f', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(84, NULL, '14', '3', '1663974000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'c9085543-0cbd-4600-b7de-54ea6b244008', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(85, NULL, '1', NULL, '1663974000', '2000', '0', NULL, NULL, '0', NULL, NULL, 'da2333af-5309-458e-8844-6c199cc6654a', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(86, NULL, '1', '3', '1664060400', '1500', '0', NULL, NULL, '0', NULL, NULL, '57530a54-19d5-44a5-92e2-34c9c6d78e59', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(87, NULL, '1', '4', '1664060400', '1500', '0', NULL, NULL, '0', NULL, NULL, '3649e23a-0964-4c3e-af4b-5a4d9dd140a5', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(88, NULL, '1', '3', '1664060400', '1500', '0', NULL, NULL, '0', NULL, NULL, 'ef37a590-0273-4d4f-a904-33b536a607c9', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(89, NULL, '1', '3', '1664060400', '1500', '0', NULL, NULL, '0', NULL, NULL, 'fdf065ff-ed0a-4589-a332-4e6449a28d1c', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(90, NULL, '1', '3', '1664060400', '1500', '0', NULL, NULL, '0', NULL, NULL, 'eb686799-c123-4d76-89ef-9d68886c4f75', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(91, NULL, '15', NULL, NULL, '600', '0', NULL, NULL, '0', NULL, NULL, '7c3f40b3-7907-4f57-b169-0860330fc8a7', NULL, NULL, NULL, NULL, NULL, NULL, 'success', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(92, NULL, '15', NULL, '1664060400', '2900', '0', NULL, NULL, '0', NULL, NULL, '2f99729a-fcfe-4116-9c0a-5fdb1a26b6e3', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(93, NULL, '15', NULL, '1664060400', '5000', '0', NULL, NULL, '0', NULL, NULL, 'b9a1e29b-a6ae-43fe-a6f7-f5e354d3dc07', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(94, NULL, '15', '3', '1664060400', '1500', '0', NULL, NULL, '0', NULL, NULL, 'da50beef-5115-4663-b768-95fca23677a0', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(95, NULL, '8', NULL, '1664146800', '2000', '0', NULL, NULL, '0', NULL, NULL, '70f16191-68da-4fc9-9dc5-0c1ba9b3aad5', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(96, NULL, '1', '3', '1664146800', '1500', '0', NULL, NULL, '0', NULL, NULL, '901cae2f-441a-4829-b426-62c27368b1d1', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(97, NULL, '8', '3', '1664146800', '1500', '0', NULL, NULL, '0', NULL, NULL, 'ba2a2072-5c1b-4be7-8b6a-b5a06915e523', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(98, NULL, '8', NULL, '1664146800', '2000', '0', NULL, NULL, '0', NULL, NULL, '0e4be81b-0160-4027-bc12-b74296c1fff1', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(99, NULL, '1', NULL, '1664146800', '5000', '0', NULL, NULL, '0', NULL, NULL, '8146883f-66bd-4464-bac0-f829fdca33a3', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(100, NULL, '1', NULL, '1664146800', '5000', '0', NULL, NULL, '0', NULL, NULL, '36ed4340-6d01-4495-9f1d-29392ba92888', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(101, NULL, '1', NULL, '1664146800', '2000', '0', NULL, NULL, '0', NULL, NULL, '1ca265b6-3c5c-4a6a-a837-6fa7d32f1c10', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(102, NULL, '1', NULL, '1664146800', '6000', '0', NULL, NULL, '0', NULL, NULL, 'f636fd9c-7ea7-4b23-bb5a-1d0a6d9e9beb', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(103, NULL, '1', NULL, '1664146800', '5000', '0', NULL, NULL, '0', NULL, NULL, '4a278bb9-f545-4238-b029-844d50dbc587', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(104, NULL, '1', NULL, '1664146800', '5000', '0', NULL, NULL, '0', NULL, NULL, 'b4d3800a-3d92-4465-97b2-40bf5b68987e', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(105, NULL, '8', NULL, '1664319600', '2000', '0', NULL, NULL, '0', NULL, NULL, 'ce70d817-55ac-4750-8331-9053334d1e63', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(106, NULL, '15', NULL, '1664319600', '2000', '0', NULL, NULL, '0', NULL, NULL, 'a3103f3f-b059-465b-b4d0-2d1c1509b5e2', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(107, NULL, '1', NULL, '1664319600', '5000', '0', NULL, NULL, '0', NULL, NULL, '87696f6c-587a-495c-92ae-0d0356d2e7be', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(108, NULL, '1', '3', '1664319600', '1500', '0', NULL, NULL, '0', NULL, NULL, 'e83afc89-29fe-48c7-8867-19ef80d23f96', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(109, NULL, '8', '3', '1664319600', '1500', '0', NULL, NULL, '0', NULL, NULL, '9b3fc5d2-cde3-43e0-acc1-e5b7e81b2564', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(110, NULL, '1', '3', '1664319600', '1500', '0', NULL, NULL, '0', NULL, NULL, 'c7ebab22-b066-458a-87da-6117c2bbed80', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(111, NULL, '1', '3', '1664319600', '1500', '0', NULL, NULL, '0', NULL, NULL, 'c614c1b9-a7d8-401a-b6df-208106b6b217', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(112, NULL, '1', NULL, '1664319600', '2000', '0', NULL, NULL, '0', NULL, NULL, '1b0a6493-f40b-4f72-9de0-47d2e983735e', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(113, NULL, '8', '3', '1664406000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'e993d251-b775-4699-b031-430c46df30d2', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(114, NULL, '8', NULL, '1664406000', '2000', '0', NULL, NULL, '0', NULL, NULL, 'd69ce155-5992-4172-b726-5b36db0e2fe5', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(115, NULL, '1', NULL, '1664406000', '2000', '0', NULL, NULL, '0', NULL, NULL, '1f234d54-4e8e-4490-b99b-82330e0e6b9a', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(116, NULL, '1', '3', '1664406000', '1500', '0', NULL, NULL, '0', NULL, NULL, '901a9b4f-0cfa-424b-a123-36e5578abcaf', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(117, NULL, '1', NULL, '1664406000', '2000', '0', NULL, NULL, '0', NULL, NULL, 'ce96de4d-237e-4c1b-aafb-8cb85acae9ad', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(118, NULL, '1', '3', '1664406000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'b1e62cec-990c-4af3-9ad2-ff34280374dc', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(119, NULL, '15', NULL, '1664406000', '2900', '0', NULL, NULL, '0', NULL, NULL, 'fd081733-8f1c-4ad0-8ea8-75de888a89fb', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(120, NULL, '15', '3', '1664406000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'b09f493a-2d33-4d94-8921-2e463d58501c', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(121, NULL, '1', '3', '1664406000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'd9110d82-9cd0-4b9d-9ca7-c3cee47f9a48', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(122, NULL, '1', NULL, '1664406000', '5000', '0', NULL, NULL, '0', NULL, NULL, 'b39360e0-e8c8-4d28-8846-8cbc41614155', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(123, NULL, '1', NULL, '1664406000', '2000', '0', NULL, NULL, '0', NULL, NULL, '612d84e0-ef3c-497e-a322-2a76ab16613d', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(124, NULL, '15', NULL, '1664406000', '2000', '0', NULL, NULL, '0', NULL, NULL, '4c4d736a-beaf-42cc-ae8c-41e40b1da163', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(125, NULL, '15', '4', '1664406000', '1500', '0', NULL, NULL, '0', NULL, NULL, 'e9b1bf6e-f510-4c0b-80b8-be8cb665603e', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(126, NULL, '15', '3', '1664406000', '1500', '0', NULL, NULL, '0', NULL, NULL, '0c438ea2-7be5-45cd-a9be-28d3d3eb03f4', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(127, NULL, '2', NULL, '1664406000', '2000', '0', NULL, NULL, '0', NULL, NULL, '9c900605-5bed-49f2-8fbd-00492b6dd23e', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(128, NULL, '8', NULL, '1664492400', '2000', '0', NULL, NULL, '0', NULL, NULL, '0e0a863a-cde7-4dd4-9c03-da10012cf555', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(129, NULL, '8', NULL, '1664578800', '2000', '0', NULL, NULL, '0', NULL, NULL, 'a505c3aa-511d-4ca8-a476-5092163c6be4', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(130, NULL, '2', NULL, '1664578800', '5000', '0', NULL, NULL, '0', NULL, NULL, '55c8db87-f5e0-42a0-9c6a-e4e4d9fc8b8a', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(131, NULL, '9', '3', '1665183600', '1500', '0', NULL, NULL, '0', NULL, NULL, '2fdf363c-8599-4f23-acd7-8fb79cd5c20f', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(132, NULL, '8', NULL, '1665442800', '2000', '0', NULL, NULL, '0', NULL, NULL, '6d03c048-08b5-45fb-ba32-f35f30325e72', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(133, NULL, '16', NULL, '1665702000', '2000', '0', NULL, NULL, '0', NULL, NULL, '9c745671-ada0-4ebe-a0cb-e004999607e0', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(134, NULL, '9', NULL, '1665788400', '2000', '0', NULL, NULL, '0', NULL, NULL, 'f0997e1a-c774-449b-84b8-b6ef076ca928', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(135, NULL, '8', NULL, '1665961200', '2000', '0', NULL, NULL, '0', NULL, NULL, 'c03ab577-4a18-4454-8b42-6859a7aba084', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(136, NULL, '8', NULL, '1665961200', '2000', '0', NULL, NULL, '0', NULL, NULL, '2c79ad62-582b-4347-95cc-00bf640628b3', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(137, NULL, '8', NULL, '1665961200', '2000', '0', NULL, NULL, '0', NULL, NULL, '9742e5dd-8092-4032-8a3b-e11ac05d5ef4', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(138, NULL, '8', NULL, '1666134000', '5000', '0', NULL, NULL, '0', NULL, NULL, '73e43f79-3d41-4e19-b2ec-83b5c4ec1011', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(139, NULL, '8', NULL, '1666134000', '5000', '0', NULL, NULL, '0', NULL, NULL, 'f89f4dfb-a08f-4d2e-9437-facf11a411b2', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(140, NULL, '1', '12', '1666134000', '1000', '0', NULL, NULL, '0', NULL, NULL, 'e5732ef2-565a-4cf1-9601-44ed4fe26286', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(141, NULL, '1', NULL, '1666134000', '5000', '0', NULL, NULL, '0', NULL, NULL, 'da1e7167-33bb-43bb-9c3a-2b711f817bb5', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(142, NULL, '9', NULL, '1666306800', '2000', '0', NULL, NULL, '0', NULL, NULL, 'd699996d-efec-4cef-b3e0-8cc793cd247b', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(143, NULL, '9', NULL, '1666306800', '2000', '0', NULL, NULL, '0', NULL, NULL, 'c9f53bc8-d3c6-47d8-8c9c-f182e5981e98', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(144, NULL, '9', '3', '1666306800', '1500', '0', NULL, NULL, '0', NULL, NULL, 'dab159f4-9908-4238-8506-54204a8f9f21', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(145, NULL, '8', '3', '1666566000', '1500', '0', NULL, NULL, '0', NULL, NULL, '5be8636c-286a-492a-a069-5addeb3a5911', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(146, NULL, '8', NULL, '1666825200', '5000', '0', NULL, NULL, '0', NULL, NULL, '24860351-590b-4667-abbd-246e13e25500', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(147, NULL, '1', NULL, '1666825200', '2000', '0', NULL, NULL, '0', NULL, NULL, 'bc17c7ca-8cc2-4667-9688-624ebf9ab30a', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(148, NULL, '9', NULL, '1666911600', '2000', '0', NULL, NULL, '0', NULL, NULL, '68a144ab-260d-434d-83c6-df9b7a8bb495', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(149, NULL, '8', NULL, '1667174400', '2000', '0', NULL, NULL, '0', NULL, NULL, 'b8d366ef-0bf6-4469-9d4c-24eaf9cdcd42', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(150, NULL, '8', NULL, '1667174400', '2000', '0', NULL, NULL, '0', NULL, NULL, '265a5fdf-648f-4c50-a1cf-511f9d1851db', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(151, NULL, '9', '3', '1667174400', '1000', '0', NULL, NULL, '0', NULL, NULL, '04807dbb-44fd-4b99-b79f-c0f0b5bf1ec4', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(152, NULL, '9', '3', '1667174400', '1000', '0', NULL, NULL, '0', NULL, NULL, '6d51f4b8-67d2-4ea4-a260-9a3bb9598f4c', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(153, NULL, '9', '3', '1667174400', '1000', '0', NULL, NULL, '0', NULL, NULL, '63c8aefd-564e-472c-85cb-99dabb6cee61', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(154, NULL, '8', NULL, '1667260800', '2000', '0', NULL, NULL, '0', NULL, NULL, 'b5966fdf-87b1-486d-a7b3-be62020dc4f2', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(155, NULL, '8', NULL, '1667347200', '2000', '0', NULL, NULL, '0', NULL, NULL, '1b0f16a3-d2de-4b8d-9265-ec95f2c7cc57', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(156, NULL, '32', '14', '1667347200', '500', '0', NULL, NULL, '0', NULL, NULL, 'aae9f308-d7ee-484e-8448-3c30a0437800', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(157, NULL, '32', NULL, '1667347200', '2000', '0', NULL, NULL, '0', NULL, NULL, 'a26e6741-f25d-4dc7-b377-92bf1578bc54', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(158, NULL, '9', '14', '1667433600', '500', '0', NULL, NULL, '0', NULL, NULL, '719b1496-8c9e-48c8-91a1-83acef69c57d', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, 'app_doctor'),
(159, NULL, '9', NULL, '1667433600', '2000', '0', NULL, NULL, '0', NULL, NULL, 'f9092c7f-3f68-403d-9dc9-b845a1965eaf', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(160, NULL, '8', NULL, '1667433600', '2000', '0', NULL, NULL, '0', NULL, NULL, '95fde2a9-9c14-4296-af5b-fa2086c13333', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(161, NULL, '32', '1', '1667478282', '35000', '0', NULL, NULL, '0', '0', '35000', 'Friend of the Dr.', '24000', '11000', NULL, '141*15000*others*1,142*20000*others*1', '35000', NULL, 'unpaid', '909', 'rachmawan', '+6287772423105', 'Depok', 'Ardi', '03-11-22', '24'),
(162, NULL, '32', '2', '1668158775', '35000', '0', NULL, NULL, '20000', '20000', '15000', 'Friend of the Dr.', '24000', '-9000', NULL, '141*15000*others*1,142*20000*others*1', NULL, NULL, 'unpaid', '909', 'rachmawan', '+6287772423105', 'Depok', 'Clara', '11-11-22', '24'),
(163, NULL, '32', '1', '1668158808', '35000', '0', NULL, NULL, '10000', '10000', '25000', 'Friend of the Dr.', '24000', '1000', NULL, '141*15000*others*1,142*20000*others*1', NULL, NULL, 'unpaid', '909', 'rachmawan', '+6287772423105', 'Depok', 'Ardi', '11-11-22', '24'),
(164, NULL, '1', NULL, '1668556800', '1000', '0', NULL, NULL, '0', NULL, NULL, '9126c5f6-b091-4973-9ff3-972c0ce5776a', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(165, NULL, '1', NULL, '1668556800', '2000', '0', NULL, NULL, '0', NULL, NULL, '7189ca6f-3d6c-4535-8843-9cdd51a6e912', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(166, NULL, '1', '1', '1668591635', '35000', '0', NULL, NULL, '10000', '10000', '25000', 'Come Empty stomach', '24000', '1000', NULL, '141*15000*others*1,142*20000*others*1', NULL, NULL, 'unpaid', '956', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '16-11-22', '24'),
(167, NULL, '1', NULL, '1668591682', '35000', '0', NULL, NULL, '10000', '10000', '25000', 'Come Empty stomach', '25000', '0', NULL, '141*15000*others*1,142*20000*others*1', NULL, NULL, 'unpaid', '956', 'Brayden ', '+917395816924', 'Jakarta', '0', '16-11-22', '24'),
(168, NULL, '1', '1', '1668753299', '2000', '0', NULL, NULL, '0', '0', '2000', '', '2000', '0', NULL, '143*2000*diagnostic*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '18-11-22', '24'),
(169, NULL, '1', '1', '1668753346', '2000', '0', NULL, NULL, '0', '0', '2000', '500*4', '2000', '0', NULL, '143*2000*diagnostic*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '18-11-22', '24'),
(170, NULL, '1', '2', '1669022866', '35000', '0', NULL, NULL, '0', '0', '35000', '', '24000', '11000', NULL, '141*15000*others*1,142*20000*others*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Clara', '21-11-22', '24'),
(171, NULL, '8', NULL, '1669161600', '1000', '0', NULL, NULL, '0', NULL, NULL, '9e58d4b6-ae96-4228-a820-dbf1edc4c483', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(172, NULL, '8', NULL, '1669334400', '2000', '0', NULL, NULL, '0', NULL, NULL, 'fa7c9057-8c7a-462a-9e15-ddc7e2c658f9', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(173, NULL, '1', '1', '1669797989', '2050', '0', NULL, NULL, '0', '0', '2050', '', '2045', '5', NULL, '144*50*others*1,143*2000*diagnostic*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '30-11-22', '24'),
(174, NULL, '1', '1', '1669798364', '2050', '0', NULL, NULL, '0', '0', '2050', '', '2045', '5', NULL, '144*50*others*1,143*2000*diagnostic*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '30-11-22', '24'),
(175, NULL, '1', '2', '1669798528', '22050', '0', NULL, NULL, '0', '0', '22050', '', '17045', '5005', NULL, '142*20000*others*1,143*2000*diagnostic*1,144*50*others*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Clara', '30-11-22', '24'),
(176, NULL, '1', '1', '1669817366', '22050', '0', NULL, NULL, '0', '0', '22050', '', '17045', '5005', NULL, '143*2000*diagnostic*1,144*50*others*1,142*20000*others*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '30-11-22', '24'),
(177, NULL, '1', NULL, '1669817983', '2050', '0', NULL, NULL, '0', '0', '2050', '', '2050', '0', NULL, '143*2000*diagnostic*1,144*50*others*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', '0', '30-11-22', '24'),
(178, NULL, '1', '1', '1670081622', '22050', '0', NULL, NULL, '0', '0', '22050', '', '17045', '5005', NULL, '142*20000*others*1,143*2000*diagnostic*1,144*50*others*1', NULL, NULL, 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '03-12-22', '24'),
(179, NULL, '1', '2', '1670178383', '20050', '0', NULL, NULL, '0', '0', '20050', '', '15045', '5005', NULL, '142*20000*others*1,144*50*others*1', '', 'Cash', 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Clara', '04-12-22', '24'),
(180, NULL, '1', '1', '1670178610', '22000', '0', NULL, NULL, '0', '0', '22000', '', '17000', '5000', NULL, '142*20000*others*1,143*2000*diagnostic*1', '', 'Cash', 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '04-12-22', '24'),
(181, NULL, '1', '1', '1670178642', '22100', '0', NULL, NULL, '0', '0', '22100', '', '17090', '5010', NULL, '142*20000*others*1,143*2000*diagnostic*1,144*50*others*2', '', 'Cash', 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '04-12-22', '24'),
(182, NULL, '1', '1', '1670179271', '20300', '0', NULL, NULL, '0', '0', '20300', '', '15270', '5030', NULL, '142*20000*others*1,144*50*others*6', '', 'Cash', 'unpaid', '909', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '04-12-22', '24'),
(183, NULL, '9', NULL, '1670544000', '2500', '0', NULL, NULL, '0', NULL, NULL, 'f7a6a2d5-e296-426a-8d9c-de142c1981aa', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(184, NULL, '40', NULL, '1670889600', '2000', '0', NULL, NULL, '0', NULL, NULL, 'f7d3a1f3-7564-4c7a-8a30-0b64afebe1fc', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(185, NULL, '8', NULL, '1671062400', '2000', '0', NULL, NULL, '0', NULL, NULL, '6b6a1f2d-ee73-478e-bcf9-5f09085aa5d4', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(186, NULL, '8', NULL, '1671148800', '2000', '0', NULL, NULL, '0', NULL, NULL, '7b0c3bd1-0345-4ed1-b163-8babd215889e', NULL, NULL, NULL, NULL, NULL, NULL, 'paid', NULL, NULL, NULL, NULL, NULL, NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateway`
--

CREATE TABLE `paymentgateway` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `merchant_key` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `APIUsername` varchar(100) DEFAULT NULL,
  `APIPassword` varchar(100) DEFAULT NULL,
  `APISignature` varchar(100) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `publish` varchar(1000) DEFAULT NULL,
  `secret` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `public_key` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymentgateway`
--

INSERT INTO `paymentgateway` (`id`, `name`, `merchant_key`, `salt`, `x`, `y`, `APIUsername`, `APIPassword`, `APISignature`, `status`, `publish`, `secret`, `hospital_id`, `public_key`) VALUES
(1, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '11', NULL),
(2, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '11', NULL),
(3, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '11', NULL),
(4, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '11', 'Public key'),
(5, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '12', NULL),
(6, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '12', NULL),
(7, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '12', NULL),
(8, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '12', 'Public key'),
(9, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '13', NULL),
(10, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '13', NULL),
(11, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '13', NULL),
(12, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '13', 'Public key'),
(13, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '14', NULL),
(14, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '14', NULL),
(15, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '14', NULL),
(16, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '14', 'Public key'),
(17, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '15', NULL),
(18, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '15', NULL),
(19, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '15', NULL),
(20, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '15', 'Public key'),
(21, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '16', NULL),
(22, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '16', NULL),
(23, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '16', NULL),
(24, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '16', 'Public key'),
(25, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '17', NULL),
(26, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '17', NULL),
(27, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '17', NULL),
(28, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '17', 'Public key'),
(29, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '18', NULL),
(30, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '18', NULL),
(31, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '18', NULL),
(32, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '18', 'Public key'),
(33, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '19', NULL),
(34, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '19', NULL),
(35, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '19', NULL),
(36, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '19', 'Public key'),
(37, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '20', NULL),
(38, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '20', NULL),
(39, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '20', NULL),
(40, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '20', 'Public key'),
(41, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '21', NULL),
(42, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '21', NULL),
(43, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '21', NULL),
(44, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '21', 'Public key'),
(45, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '22', NULL),
(46, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '22', NULL),
(47, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '22', NULL),
(48, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '22', 'Public key'),
(49, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '23', NULL),
(50, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '23', NULL),
(51, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '23', NULL),
(52, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '23', 'Public key'),
(53, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '24', NULL),
(54, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '24', NULL),
(55, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '24', NULL),
(56, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '24', 'Public key'),
(57, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '21', NULL),
(58, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '21', NULL),
(59, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '21', NULL),
(60, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '21', 'Public key'),
(61, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '26', NULL),
(62, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '26', NULL),
(63, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '26', NULL),
(64, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '26', 'Public key'),
(65, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '27', NULL),
(66, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '27', NULL),
(67, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '27', NULL),
(68, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '27', 'Public key'),
(69, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '28', NULL),
(70, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '28', NULL),
(71, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '28', NULL),
(72, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '28', 'Public key'),
(73, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '29', NULL),
(74, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '29', NULL),
(75, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '29', NULL),
(76, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '29', 'Public key'),
(77, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '29', NULL),
(78, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '29', NULL),
(79, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '29', NULL),
(80, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '29', 'Public key'),
(81, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '31', NULL),
(82, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '31', NULL),
(83, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '31', NULL),
(84, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '31', 'Public key'),
(85, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '32', NULL),
(86, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '32', NULL),
(87, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '32', NULL),
(88, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '32', 'Public key'),
(89, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '33', NULL),
(90, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '33', NULL),
(91, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '33', NULL),
(92, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '33', 'Public key'),
(93, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '34', NULL),
(94, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '34', NULL),
(95, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '34', NULL),
(96, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '34', 'Public key'),
(97, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '35', NULL),
(98, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '35', NULL),
(99, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '35', NULL),
(100, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '35', 'Public key'),
(101, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '36', NULL),
(102, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '36', NULL),
(103, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '36', NULL),
(104, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '36', 'Public key'),
(105, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '37', NULL),
(106, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '37', NULL),
(107, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '37', NULL),
(108, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '37', 'Public key'),
(109, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '38', NULL),
(110, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '38', NULL),
(111, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '38', NULL),
(112, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '38', 'Public key'),
(113, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '39', NULL),
(114, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '39', NULL),
(115, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '39', NULL),
(116, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '39', 'Public key'),
(117, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '40', NULL),
(118, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '40', NULL),
(119, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '40', NULL),
(120, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '40', 'Public key'),
(121, 'PayPal', NULL, NULL, NULL, NULL, 'PayPal API Username', 'PayPal API Password', 'PayPal API Signature', 'test', NULL, NULL, '41', NULL),
(122, 'Pay U Money', 'Merchant key', 'Salt', NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, '41', NULL),
(123, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Publish', 'Secret', '41', NULL),
(124, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'secret', '41', 'Public key');

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_category`
--

INSERT INTO `payment_category` (`id`, `category`, `description`, `c_price`, `type`, `d_commission`, `h_commission`, `hospital_id`) VALUES
(136, 'CT scan', 'Ct scan price details', '2000', 'diagnostic', 0, NULL, '2'),
(137, 'MRI', 'MRI price details', '2020', 'others', 0, NULL, '2'),
(138, 'Bed Charges', 'Charges for clinical accommodation of bed per day. ', '1200', 'others', 0, NULL, '2'),
(139, 'Consultation fee', 'Doctor consultation charges', '500', 'diagnostic', 70, NULL, '2'),
(140, 'Operation', 'operation theatre charges', '2000', 'others', 0, NULL, '2'),
(142, 'Surgical Procedures', 'For patient surgical  procedure', '20000', 'others', 25, NULL, '24'),
(143, 'CT Brain ', 'CT Brain ', '2000', 'diagnostic', 0, NULL, '24'),
(144, 'Injection charges', 'for patient injections ', '50', 'others', 10, NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `ion_user_id`, `hospital_id`) VALUES
(1, 'uploads/pharmacist1.png', 'Aaisha', 'aisha@kenmugi.com', 'jakarta', '25412485', NULL, NULL, '926', '24');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense`
--

CREATE TABLE `pharmacy_expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy_expense`
--

INSERT INTO `pharmacy_expense` (`id`, `category`, `date`, `amount`, `user`, `hospital_id`) VALUES
(1, 'general drugs ', '1659883927', '500', NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense_category`
--

CREATE TABLE `pharmacy_expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy_expense_category`
--

INSERT INTO `pharmacy_expense_category` (`id`, `category`, `description`, `x`, `y`, `hospital_id`) VALUES
(1, 'general drugs ', 'for fever', NULL, NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment`
--

CREATE TABLE `pharmacy_payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacy_payment`
--

INSERT INTO `pharmacy_payment` (`id`, `category`, `patient`, `doctor`, `date`, `amount`, `vat`, `x_ray`, `flat_vat`, `discount`, `flat_discount`, `gross_total`, `hospital_amount`, `doctor_amount`, `category_amount`, `category_name`, `amount_received`, `status`, `hospital_id`) VALUES
(1, NULL, NULL, NULL, '1659883792', '840', '0', NULL, NULL, '100', '100', '740', NULL, NULL, NULL, '1*42*20*26', NULL, 'unpaid', '24'),
(2, NULL, NULL, NULL, '1667479687', '1002', '0', NULL, NULL, '', '', '1002', NULL, NULL, NULL, '2*8*3*1.2,3*120*5*100,1*42*9*26', NULL, 'unpaid', '24'),
(3, NULL, NULL, NULL, '1668583119', '8', '0', NULL, NULL, '0', '0', '8', NULL, NULL, NULL, '2*8*1*1.2', NULL, 'unpaid', '24'),
(4, NULL, NULL, NULL, '1668585446', '120', '0', NULL, NULL, '', '', '120', NULL, NULL, NULL, '3*120*1*100', NULL, 'unpaid', '24'),
(5, NULL, NULL, NULL, '1668753786', '8', '0', NULL, NULL, '', '', '8', NULL, NULL, NULL, '2*8*1*1.2', NULL, 'unpaid', '24');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment_category`
--

CREATE TABLE `pharmacy_payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL,
  `attachment_image` varchar(100) NOT NULL,
  `patient_description` varchar(100) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `report_img` varchar(500) DEFAULT NULL,
  `symptom` varchar(100) DEFAULT NULL,
  `advice` varchar(1000) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `dd` varchar(100) DEFAULT NULL,
  `medicine` varchar(1000) DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `appointment` varchar(10) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `date`, `patient`, `doctor`, `appointment_id`, `attachment_image`, `patient_description`, `description`, `report_img`, `symptom`, `advice`, `state`, `dd`, `medicine`, `validity`, `note`, `patientname`, `appointment`, `doctorname`, `hospital_id`) VALUES
(1, '1659394800', '1', '3', 4, 'http://midtrans.medzit.com/assets/images/user_attachments/20220802151741.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(2, '1659394800', '1', '3', 4, '', '', 'Advised to take rest for next couple of days.\nIntake hot water and avoid junk foods.', 'http://midtrans.medzit.com/assets/images/doctor_report/20220802152246.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(3, '1659654000', '2', '4', 9, 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081708.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'George', NULL, 'Michael ', 'app_doctor'),
(4, '1659654000', '2', '3', 10, 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081812.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'George', NULL, 'Edward', 'app_doctor'),
(5, '1659654000', '2', '4', 11, 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081941.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'George', NULL, 'Michael ', 'app_doctor'),
(6, '1659654000', '2', '4', 12, 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081953.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'George', NULL, 'Michael ', 'app_doctor'),
(7, '1659654000', '2', '4', 13, 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081953.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'George', NULL, 'Michael ', 'app_doctor'),
(8, '1659654000', '2', '4', 14, 'http://midtrans.medzit.com/assets/images/user_attachments/20220805081953.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'George', NULL, 'Michael ', 'app_doctor'),
(9, '1659654000', '2', '4', 9, '', '', 'Advised to take rest for next two days \n\n', 'http://midtrans.medzit.com/assets/images/doctor_report/20220805132048.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'George', NULL, 'Michael ', 'app_doctor'),
(10, '1659740400', '2', '4', 18, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Michael ', 'app_doctor'),
(11, '1659740400', '2', '4', 18, '', '', 'advised to take rest for next two days ', 'http://midtrans.medzit.com/assets/images/doctor_report/20220806080546.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Michael ', 'app_doctor'),
(12, '1659913200', '2', '4', 21, 'http://midtrans.medzit.com/assets/images/user_attachments/20220807231651.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Michael ', 'app_doctor'),
(13, '1661554800', '2', '1', NULL, '', '', NULL, NULL, '', '<p>Adviced to take medicines for next 10 days.&nbsp;</p>\r\n', NULL, NULL, '1***100MG***1-0-1***10 ***after', NULL, '', 'Mohammed Asif', NULL, 'Ardi', '24'),
(14, '1661727600', '2', '3', 26, 'http://dhmedzit.com/assets/images/user_attachments/20220827161002.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Edward', 'app_doctor'),
(15, '1661554800', '2', '4', 27, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Michael ', 'app_doctor'),
(16, '1661554800', '2', '4', 28, 'http://dhmedzit.com/assets/images/user_attachments/20220827161124.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Michael ', 'app_doctor'),
(17, '1661641200', '2', '3', 30, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Edward', 'app_doctor'),
(18, '1662073200', '1', '3', 32, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(19, '1662505200', '1', '3', 35, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(20, '1662505200', '1', '3', 35, '', '', 'nil', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(21, '1662850800', '1', '3', 44, 'http://dhmedzit.com/assets/images/user_attachments/20220909191050.png', 'Headache', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(22, '1663196400', '8', '1', NULL, '', '', NULL, NULL, '<p>Kamu harus sehat terus,<br />\r\nPola makan dijaga, istirahat yang cukup.<br />\r\njangan lupa mengko', '<p>Semoga lekas Sembuh ya.</p>\r\n', NULL, NULL, '1***20***1+1+1***5***After Food###2***10***1+1+0***5***Before Food', NULL, '<p>Vitamin C<br />\r\nVitamin B</p>\r\n', 'Ardiansa', NULL, 'Ardi', '24'),
(23, '1663196400', '8', '1', NULL, '', '', NULL, NULL, '<p>Ini adalah Kunjungan Ke 2</p>\r\n', '<p>Get Well Soon</p>\r\n', NULL, NULL, '2***50mg***1+1+1***3***Before', NULL, '<p>Jangan kelelahan yang sangat.</p>\r\n', 'Ardiansa', NULL, 'Ardi', '24'),
(24, '1663282800', '1', '2', NULL, '', '', NULL, NULL, '<p>test`</p>\r\n', '<p>take rest for next 5 days</p>\r\n', NULL, NULL, '1***650mg***1+0+1***30***after food', NULL, '<p>test note</p>\r\n', 'Brayden ', NULL, 'Clara', '24'),
(25, '1663282800', '6', '2', NULL, '', '', NULL, NULL, '<p>test history</p>\r\n', '<p>adviced for take rest&nbsp;</p>\r\n', NULL, NULL, '1***650mg***1+0+1***30***after food', NULL, '<p>test note</p>\r\n', 'Fazeel', NULL, 'Clara', '24'),
(26, '1663542000', '8', '3', 68, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(27, '1663542000', '8', '9', NULL, '', '', NULL, NULL, '<p>First time to consult with me</p>\r\n', '<p>Take some rest</p>\r\n', NULL, NULL, '2***100 mg***1+1+1***5 Days***After Food', NULL, '<p>Take a deep breath</p>\r\n', 'Ardiansa', NULL, 'Ahmad', '24'),
(28, '1663628400', '8', '3', 79, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(29, '1663628400', '8', '3', 81, 'http://dhmedzit.com/assets/images/user_attachments/20220920040531.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(30, '1662850800', '1', '3', 44, '', '', 'test', 'http://dhmedzit.com/assets/images/doctor_report/20220920173347.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(31, '1663714800', '8', '1', NULL, '', '', NULL, NULL, '<p>1. MRI Cervial sprine&nbsp;</p>\r\n\r\n<p>2. Audiogram&nbsp;</p>\r\n', '<p>Adviced to take complete rest for next 10 days</p>\r\n', NULL, NULL, '2***650mg***1+0+1***7***after food', NULL, '<p>Giddiness for evaluation&nbsp;</p>\r\n', 'Ardiansa', NULL, 'Ardi', '24'),
(32, '1663714800', '8', '3', 83, 'http://dhmedzit.com/assets/images/user_attachments/20220921110734.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(33, '1663714800', '2', '3', 84, '', 'VC test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Edward', 'app_doctor'),
(34, '1663714800', '2', '3', 85, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Edward', 'app_doctor'),
(35, '1663714800', '1', '1', NULL, '', '', NULL, NULL, '<p>Doctor found evidence in renel&nbsp;</p>\r\n', '<p>adviced to take rest</p>\r\n', NULL, NULL, '3***2mg***1+1+1***10***After Food', NULL, '<p>test notes</p>\r\n', 'Brayden ', NULL, 'Ardi', '24'),
(36, '1663801200', '1', '1', 87, '', '', 'Prescription added ', 'http://dhmedzit.com/assets/images/doctor_report/20220922070159.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Ardi', '24'),
(37, '1663801200', '1', '3', 88, 'http://dhmedzit.com/assets/images/user_attachments/20220922070502.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(38, '1663801200', '1', '10', 89, '', '', 'test ', NULL, '<p>patient history</p>\r\n', '<p>adviced to rest&nbsp;</p>\r\n', NULL, NULL, '1***650mg***1+1+1***7***after food###2***100***1+01+1***30***after food', NULL, '<p>patient notes while consultation&nbsp;</p>\r\n', 'Brayden ', NULL, 'Emmanuel', '24'),
(39, '1663887600', '1', '1', NULL, '', '', NULL, NULL, '<p>test history</p>\r\n', '<p>adviced for rest</p>\r\n', NULL, NULL, '2***75MG***1+0+1***10 ***After Food', NULL, '<p>notes</p>\r\n', 'Brayden ', NULL, 'Ardi', '24'),
(40, '1663974000', '8', '3', 93, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(41, '1663974000', '8', '3', 94, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(42, '1663974000', '8', '3', 94, '', '', 'prescriptions added', 'http://dhmedzit.com/assets/images/doctor_report/20220924070147.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(43, '1663974000', '8', '1', NULL, '', '', NULL, NULL, '<p>clinical history of patient&nbsp;</p>\r\n', '<p>adviced for complete rest&nbsp;</p>\r\n', NULL, NULL, '1***100***1+0+1***10 ***After Food', NULL, '<p>notes taken while consultation</p>\r\n', 'Ardiansa', NULL, 'Ardi', '24'),
(44, '1663974000', '2', '3', 95, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Mohammed Asif', NULL, 'Edward', 'app_doctor'),
(45, '1663974000', '13', '3', 97, 'http://dhmedzit.com/assets/images/user_attachments/20220924073304.png', 'constant headaches ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aad', NULL, 'Edward', 'app_doctor'),
(46, '1663974000', '13', '3', 98, 'http://dhmedzit.com/assets/images/user_attachments/20220924073835.png', 'headaches', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aad', NULL, 'Edward', 'app_doctor'),
(47, '1663974000', '13', '1', NULL, '', '', NULL, NULL, '<p>CLINICAL HISTORY OF PATIENT&nbsp;</p>\r\n', '<p>ADVICED TO TAKE REST FOR NEXT 5 DAYS</p>\r\n', NULL, NULL, '1***75MG***1+0+1***10 ***After Food', NULL, '<p>NOTES ON CONSULTATION&nbsp;</p>\r\n', 'Aad', NULL, 'Ardi', '24'),
(48, '1663974000', '14', '3', 104, 'http://dhmedzit.com/assets/images/user_attachments/20220924111502.png', 'headaches', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aadh', NULL, 'Edward', 'app_doctor'),
(49, '1663974000', '14', '1', 103, '', '', 'patient advised to take  rest \n\n', 'http://dhmedzit.com/assets/images/doctor_report/20220924112327.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aadh', NULL, 'Ardi', '24'),
(50, '1663974000', '14', '1', NULL, '', '', NULL, NULL, '<p>patient&#39;s clinical history data</p>\r\n', '<p>adviced to take pills regulary for next 10 days</p>\r\n\r\n<p>and take rest&nbsp;</p>\r\n', NULL, NULL, '1***75***1-1-1***10***After food', NULL, '<p>notes taken while patient consultation</p>\r\n', 'Aadh', NULL, 'Ardi', '24'),
(51, '1663974000', '14', '3', 107, 'http://dhmedzit.com/assets/images/user_attachments/20220924122325.png', 'internal test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Aadh', NULL, 'Edward', 'app_doctor'),
(52, '1664060400', '1', '3', 109, 'http://dhmedzit.com/assets/images/user_attachments/20220925094840.png', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(53, '1664060400', '1', '4', 110, 'http://dhmedzit.com/assets/images/user_attachments/20220925095106.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Michael ', 'app_doctor'),
(54, '1664060400', '1', '3', 111, 'http://dhmedzit.com/assets/images/user_attachments/20220925095200.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(55, '1664060400', '1', '3', 112, 'http://dhmedzit.com/assets/images/user_attachments/20220925095430.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(56, '1664146800', '1', '3', 113, 'http://dhmedzit.com/assets/images/user_attachments/20220925120006.png', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(57, '1664146800', '15', '1', NULL, '', '', NULL, NULL, '<p>patient history&nbsp;</p>\r\n', '<p>adviced to rest</p>\r\n', NULL, NULL, '1***75***1-1-1***10***After food', NULL, '<p>notes&nbsp;</p>\r\n', 'Sadh', NULL, 'Ardi', '24'),
(58, '1664146800', '15', '3', 116, 'http://dhmedzit.com/assets/images/user_attachments/20220925203443.png', 'constant headaches', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sadh', NULL, 'Edward', 'app_doctor'),
(59, '1664146800', '15', '3', 116, '', '', 'drink water', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sadh', NULL, 'Edward', 'app_doctor'),
(60, '1664233200', '1', '3', 118, 'http://dhmedzit.com/assets/images/user_attachments/20220926052116.png', 'Video call testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(61, '1664146800', '8', '3', 119, 'http://dhmedzit.com/assets/images/user_attachments/20220926053725.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(62, '1664146800', '8', '1', 120, '', '', 'sample prescriptions ', 'http://dhmedzit.com/assets/images/doctor_report/20220926095742.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(63, '1664146800', '8', '1', NULL, '', '', NULL, NULL, '<p>this field is for clinical history of patient&nbsp;</p>\r\n', '<p>adviced to take complete rest&nbsp;</p>\r\n', NULL, NULL, '1***100***1+1+1***10 days ***after food###3***200mg***1+1+1***30***after food', NULL, '<p>clinical notes while consultation</p>\r\n', 'Ardiansa', NULL, 'Ardi', '24'),
(64, '1664319600', '8', '3', 130, 'http://dhmedzit.com/assets/images/user_attachments/20220928065812.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(65, '1664319600', '1', '3', 131, 'http://dhmedzit.com/assets/images/user_attachments/20220928065837.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(66, '1664319600', '1', '3', 132, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(67, '1664319600', '1', '3', 133, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(68, '1664406000', '8', '3', 135, 'http://dhmedzit.com/assets/images/user_attachments/20220929041532.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(69, '1664406000', '1', '3', 138, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(70, '1664492400', '1', '3', 140, 'http://dhmedzit.com/assets/images/user_attachments/20220929081908.png', 'fhgrdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(71, '1664406000', '15', '3', 142, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sadh', NULL, 'Edward', 'app_doctor'),
(72, '1664492400', '1', '3', 143, 'http://dhmedzit.com/assets/images/user_attachments/20220929100111.png', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(73, '1664492400', '1', '3', 146, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(74, '1664492400', '1', '3', 147, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(75, '1664406000', '15', '4', 149, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sadh', NULL, 'Michael ', 'app_doctor'),
(76, '1664406000', '15', '3', 150, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sadh', NULL, 'Edward', 'app_doctor'),
(77, '1664492400', '1', '3', 152, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(78, '1664492400', '1', '3', 153, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(79, '1664578800', '8', '1', 156, '', '', 'ini adalah testing', 'http://dhmedzit.com/assets/images/doctor_report/20221001051402.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(80, '1664578800', '1', '1', NULL, '', '', NULL, NULL, '<p>Patient had suffered from viral fever and jauntice&nbsp;</p>\r\n', '<p>take rest for next one month.&nbsp;<br />\r\nAdviced to take pills continuously.&nbsp;</p>\r\n', NULL, NULL, '1***100***1+0+1***7***after food###2***500mg***1+0+1***7***after food', NULL, '<p>Admit for next 10 days&nbsp;</p>\r\n', 'Brayden ', NULL, 'Ardi', '24'),
(81, '1664578800', '2', '1', NULL, '', '', NULL, NULL, '<p>patient had severe fever and jauntice</p>\r\n', '<p>adviced to take rest for next one month&nbsp;</p>\r\n\r\n<p>take medicine and pills continuously for next 15 days</p>\r\n', NULL, NULL, '1***650mg***1+1+1***30***after food###2***100***1+0+1***30***after food', NULL, '<p>admit to next 10 days in hospital&nbsp;</p>\r\n', 'Mohammed Asif', NULL, 'Ardi', '24'),
(82, '1665442800', '9', '3', 160, 'http://dhmedzit.com/assets/images/user_attachments/20221008153230.png', 'Testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'Edward', 'app_doctor'),
(83, '1665442800', '8', '1', 161, '', '', 'minum kepala ijo', 'http://dhmedzit.com/assets/images/doctor_report/20221011104949.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(84, '1665442800', '8', '1', 161, '', '', 'tolong segera ke lab\n', 'http://dhmedzit.com/assets/images/doctor_report/20221011110528.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(85, '1666134000', '8', '3', 166, 'https://dhmedzit.com/assets/images/user_attachments/20221019112139.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(86, '1666134000', '1', '12', 167, 'https://dhmedzit.com/assets/images/user_attachments/20221019180952.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Shagul', 'app_doctor'),
(87, '1666998000', '9', '3', 169, 'https://dhmedzit.com/assets/images/user_attachments/20221021200026.png', 'dhrtuffjgccjgfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'Edward', 'app_doctor'),
(88, '1666911600', '9', '3', 170, 'https://dhmedzit.com/assets/images/user_attachments/20221021200334.png', 'djdududjxnfieifjck', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'Edward', 'app_doctor'),
(89, '1666566000', '8', '3', 172, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Edward', 'app_doctor'),
(90, '1666738800', '1', '11', 173, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'John', 'app_doctor'),
(91, '1666998000', '1', '4', 174, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Michael ', 'app_doctor'),
(92, '1666825200', '8', '11', 175, 'https://dhmedzit.com/assets/images/user_attachments/20221027081551.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'John', 'app_doctor'),
(93, '1666825200', '1', '1', 176, '', '', 'xixxxjggidog', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Ardi', '24'),
(94, '1666825200', '1', '1', NULL, '', '', NULL, NULL, '<p>patient history&nbsp;</p>\r\n', '<p>adviced to&nbsp;</p>\r\n', NULL, NULL, '2***100***1+0+1***7***after food###1***200mg***1-0-1***30***after food', NULL, '<p>treatmnents notes</p>\r\n', 'Brayden ', NULL, 'Ardi', '24'),
(95, '1666998000', '9', '3', 184, 'https://dhmedzit.com/assets/images/user_attachments/20221028194403.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'Edward', 'app_doctor'),
(96, '1666998000', '1', '12', 187, 'https://dhmedzit.com/assets/images/user_attachments/20221028213852.png', 'I have heavy fever', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Shagul', 'app_doctor'),
(97, '1666998000', '1', '13', 190, 'https://dhmedzit.com/assets/images/user_attachments/20221029084550.png', 'I have fever from past two days', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Edward', 'app_doctor'),
(98, '1667174400', '1', '1', NULL, '', '', NULL, NULL, '<p>....</p>\r\n', '<p>rest for 10days</p>\r\n', NULL, NULL, '1***100MG***1+01+1***10 days ***after food', NULL, '<p>testing</p>\r\n', 'Brayden ', NULL, 'Ardi', '24'),
(99, '1667174400', '1', '1', NULL, '', '', NULL, NULL, '<p>....</p>\r\n', '<p>rest for 10days</p>\r\n', NULL, NULL, '1***100MG***1+01+1***10 days ***after food', NULL, '<p>testing</p>\r\n', 'Brayden ', NULL, 'Ardi', '24'),
(126, '1668211200', '1', NULL, 235, 'https://dhmedzit.com/assets/images/user_attachments/20221112103306.png', 'ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(101, '1667174400', '9', '3', 198, 'https://dhmedzit.com/assets/images/user_attachments/20221031174226.png', 'dguchxsucgzduvjbknkvgztdydufsyfucucycucufubbnjjhguduc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'Shagul', 'app_doctor'),
(102, '1667174400', '9', '3', 198, '', '', 'tujvffjbbbnyyyyyyyyyyyyyy', 'https://dhmedzit.com/assets/images/doctor_report/20221031175909.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'Shagul', 'app_doctor'),
(103, '0', '2', '1', 199, 'https://dhmedzit.com/assets/images/user_attachments/20221031181126.png', 'MRI', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ragu', NULL, 'Shagul', '24'),
(104, '0', '9', '3', 205, 'https://dhmedzit.com/assets/images/user_attachments/20221031183952.png', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ragu', NULL, 'Shagul', '24'),
(105, '0', '9', '3', 206, 'https://dhmedzit.com/assets/images/user_attachments/20221031184125.png', 'Need to Visit Dr. Vasigaran', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ragu', NULL, 'Shagul', '24'),
(106, '1667260800', '8', '1', 207, '', '', 'kamu harus makan parasetamol', 'https://dhmedzit.com/assets/images/doctor_report/20221101040404.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(107, '1667174400', '8', '1', 194, '', '', 'ini obatnya', 'https://dhmedzit.com/assets/images/doctor_report/20221101041348.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(108, '1667260800', '8', '1', 207, '', '', 'ini obat tambahan yaa', 'https://dhmedzit.com/assets/images/doctor_report/20221101041523.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(109, '1667347200', '8', '1', 212, '', '', 'this is you should take', 'https://dhmedzit.com/assets/images/doctor_report/20221102044209.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(110, '1667347200', '32', '14', 213, 'https://dhmedzit.com/assets/images/user_attachments/20221102085428.png', 'sakit perut\n', 'sakit perut\n', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rachmawan', NULL, 'ardi rach', 'app_doctor'),
(111, '1667347200', '32', '14', 213, '', '', 'minum ini\ncepat sembuh', 'https://dhmedzit.com/assets/images/doctor_report/20221102173142.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'rachmawan', NULL, 'ardi rach', 'app_doctor'),
(112, '1667433600', '9', '14', 216, 'https://dhmedzit.com/assets/images/user_attachments/20221103053841.png', 'Headache ', 'Headache ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'ardi rach', 'app_doctor'),
(113, '1667433600', '9', '14', 218, 'https://dhmedzit.com/assets/images/user_attachments/20221103054658.png', 'headache ', 'headache ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'ardi rach', 'app_doctor'),
(114, '1667433600', '8', '1', 221, '', '', 'paracetamol 3x per day\namoxicilin 3x day', 'https://dhmedzit.com/assets/images/doctor_report/20221103120041.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Ardiansa', NULL, 'Ardi', '24'),
(115, '0', NULL, NULL, 225, 'https://dhmedzit.com/assets/images/user_attachments/20221103185738.png', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(116, '0', '8', NULL, 226, 'https://dhmedzit.com/assets/images/user_attachments/20221103185914.png', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(117, '0', '8', NULL, 227, 'https://dhmedzit.com/assets/images/user_attachments/20221103190114.png', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(118, '0', '8', NULL, 228, 'https://dhmedzit.com/assets/images/user_attachments/20221103190133.png', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(119, '0', '8', NULL, 229, 'https://dhmedzit.com/assets/images/user_attachments/20221103190217.png', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(120, '1655679600', '8', NULL, 230, 'https://dhmedzit.com/assets/images/user_attachments/20221103190438.png', 'Need to Visit Dr. Vasigaran', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(121, '1667520000', '1', NULL, 231, 'https://dhmedzit.com/assets/images/user_attachments/20221104101933.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(122, '1667520000', '1', NULL, 232, 'https://dhmedzit.com/assets/images/user_attachments/20221104163425.png', 'ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(149, '1669766400', '2', NULL, 249, 'https://dhmedzit.com/assets/images/user_attachments/20221130133938.png', 'I want to meet Dr ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(124, '1667779200', '8', NULL, 233, 'https://dhmedzit.com/assets/images/user_attachments/20221107075803.png', 'ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(125, '1668038400', '1', NULL, 234, 'https://dhmedzit.com/assets/images/user_attachments/20221110141259.png', 'ctbun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(127, '1668384000', '1', NULL, 236, 'https://dhmedzit.com/assets/images/user_attachments/20221113184352.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(128, '1668384000', '1', NULL, 237, 'https://dhmedzit.com/assets/images/user_attachments/20221114053929.png', 'want to meet Dr ardi ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(129, '1668470400', '9', NULL, 238, 'https://dhmedzit.com/assets/images/user_attachments/20221115160511.png', 'testing', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(130, '1668470400', '1', NULL, 239, 'https://dhmedzit.com/assets/images/user_attachments/20221115171624.png', 'ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(131, '1668556800', '1', NULL, 240, 'https://dhmedzit.com/assets/images/user_attachments/20221116061736.png', 'ardi ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(132, '1668556800', '1', NULL, 241, 'https://dhmedzit.com/assets/images/user_attachments/20221116063022.png', 'ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(133, '1668556800', '1', NULL, 242, 'https://dhmedzit.com/assets/images/user_attachments/20221116063111.png', 'ardi testing ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(134, '1668556800', '1', NULL, 243, 'https://dhmedzit.com/assets/images/user_attachments/20221116070108.png', 'ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(135, '1641945600', '29', '9', NULL, '', '', NULL, NULL, '<p>Test History</p>\r\n', '<p>dfsds</p>\r\n', NULL, NULL, '', NULL, '<p>Test Note</p>\r\n', 'Test name', NULL, 'Ahmad', '24'),
(150, '1659654000', '2', '1', 7, '', '', 'Prescription details for 7', 'https://dhmedzit.com/assets/images/doctor_report/20221201102450.png', 'test history', 'test advice', NULL, NULL, NULL, NULL, 'test note', 'George', NULL, 'Ardi', '24'),
(138, '1668556800', '1', '1', 242, '', '', 'test prescription ', 'https://dhmedzit.com/assets/images/doctor_report/20221116074055.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Brayden ', NULL, 'Ardi', '24'),
(153, '1659654000', '2', '1', 7, '', '', 'Prescription details for 7', 'https://dhmedzit.com/assets/images/doctor_report/20221201110803.png', 'test hhh', 'test aaa', NULL, NULL, '1***rg***yuj***jj***jjj###2***rg***tui***uoo***bnn', NULL, 'test nnn', 'George', NULL, 'Ardi', '24'),
(154, '1659654000', '2', '1', 7, '', '', 'Prescription details for 7', 'https://dhmedzit.com/assets/images/doctor_report/20221201110852.png', 'test hhh', 'test aaa', NULL, NULL, '1***rg***yuj***jj***jjj###2***rg***tui***uoo***bnn', NULL, 'test nnn', 'George', NULL, 'Ardi', '24'),
(151, '1659654000', '2', '1', 7, '', '', 'Prescription details for 7', NULL, '', '', NULL, NULL, NULL, NULL, '', 'George', NULL, 'Ardi', '24'),
(152, '1659654000', '2', '1', 7, '', '', 'Prescription details for 7', 'https://dhmedzit.com/assets/images/doctor_report/20221201105916.png', 'test hh', 'test aa', NULL, NULL, '1***rg***yuj***jj***jjj###2***rg***tui***uoo***bnn', NULL, 'test nn', 'George', NULL, 'Ardi', '24'),
(143, '1669161600', '8', NULL, 245, 'https://dhmedzit.com/assets/images/user_attachments/20221123080900.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(144, '1669334400', '8', NULL, 246, 'https://dhmedzit.com/assets/images/user_attachments/20221125030427.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(155, '1659654000', '2', '1', 7, '', '', 'Prescription details for 7', 'https://dhmedzit.com/assets/images/doctor_report/20221201110926.png', 'test hhh', 'test aaa', NULL, NULL, '1***rg***yuj***jj***jjj###2***rg***tui***uoo***bnn', NULL, 'test nnn', 'George', NULL, 'Ardi', '24'),
(147, '1669161600', '8', '1', 245, '', '', 'Testares', 'https://dhmedzit.com/assets/images/doctor_report/20221201102537.png', 'history', 'advice', NULL, NULL, '1***100mg***0+0+1***2 days***Before food###2***200mg***0+1+0***3 days***Before food###3***300mg***0+1+1***4 days***Before food', NULL, 'note', 'Ardiansa', NULL, 'Ardi', '24'),
(156, '1659654000', '2', '1', 7, '', '', 'Prescription details for 7', 'https://dhmedzit.com/assets/images/doctor_report/20221201110956.png', 'test hh', 'test aa', NULL, NULL, '1***rg***yuj***jj***jjj###2***rg***tui***uoo***bnn', NULL, 'test nn', 'George', NULL, 'Ardi', '24'),
(157, '1659394800', '1', '1', 2, '', '', 'Prescription details for 2', 'https://dhmedzit.com/assets/images/doctor_report/20221201115516.png', 'test his', 'test advice', NULL, NULL, '1***100mg***2***4 days***before###2***500mg***3***2 days***after food', NULL, 'test notes', 'Brayden ', NULL, 'Ardi', '24'),
(158, '1659394800', '1', '1', 2, '', '', 'Prescription details for 2', 'https://dhmedzit.com/assets/images/doctor_report/20221201115630.png', 'test history', 'test advicee', NULL, NULL, '1***100mg***3***4 days***before###2***500mg***2***2 days***after food', NULL, 'test notess', 'Brayden ', NULL, 'Ardi', '24'),
(159, '1659394800', '1', '1', 2, '', '', 'Prescription details for 2', 'https://dhmedzit.com/assets/images/doctor_report/20221201115650.png', 'test history', 'test advicee', NULL, NULL, '1***100mg***3***4 days***before###2***500mg***2***2 days***after food', NULL, 'test notess', 'Brayden ', NULL, 'Ardi', '24'),
(160, '1668556800', '1', '1', 242, '', '', 'Prescription details for 242', 'https://dhmedzit.com/assets/images/doctor_report/20221201132927.png', 'Patient history ', 'advised to take rest', NULL, NULL, '1***250 ***1-1-1***10***AF###2***100 ***1-0-1***7***BF', NULL, 'test notes', 'Brayden ', NULL, 'Ardi', '24'),
(161, '1669852800', '1', NULL, 250, 'https://dhmedzit.com/assets/images/user_attachments/20221201134123.png', 'pain in  heart side, meet Dr ardi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(162, '1667520000', '1', '1', 232, '', '', 'Prescription details for 232', 'https://dhmedzit.com/assets/images/doctor_report/20221201171608.png', 'test histor', 'test advice', NULL, NULL, '1***100mg***1***2 days***before food###2***300mg***3***4 days***after food', NULL, 'test note', 'Brayden ', NULL, 'Ardi', '24'),
(163, '1667520000', '1', '1', 232, '', '', 'Prescription details for 232', 'https://dhmedzit.com/assets/images/doctor_report/20221201171753.png', 'test history', 'test advice', NULL, NULL, '1***100mg***2***2 days***before food###2***300mg***3***4 days***after food', NULL, 'test note', 'Brayden ', NULL, 'Ardi', '24'),
(164, '1667520000', '1', '1', 232, '', '', 'Prescription details for 232', 'https://dhmedzit.com/assets/images/doctor_report/20221201183359.png', 'test history', 'test advice', NULL, NULL, '1***100mg***2***2 days***before food', NULL, 'test note', 'Brayden ', NULL, 'Ardi', '24'),
(165, '1667520000', '1', '1', 232, '', '', 'Prescription details for 232', 'https://dhmedzit.com/assets/images/doctor_report/20221201184057.png', 'test history', 'test advice', NULL, NULL, '1***100mg***2***2 days***before food###2***200mg***3***4 days***after food', NULL, 'test note', 'Brayden ', NULL, 'Ardi', '24'),
(166, '1667520000', '1', '1', 231, '', '', 'Prescription details for 231', 'https://dhmedzit.com/assets/images/doctor_report/20221202095428.png', 'patient history', 'advised to take complete rest', NULL, NULL, '1***250mg***1-0-1***10 days***After food###2***100mg***1-1-1***7days***before food', NULL, 'patients notes', 'Brayden ', NULL, 'Ardi', '24'),
(167, '1670112000', '2', NULL, 251, 'https://dhmedzit.com/assets/images/user_attachments/20221203110436.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(168, '1670112000', '2', NULL, 252, 'https://dhmedzit.com/assets/images/user_attachments/20221203113432.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(169, '1670544000', '9', '14', 253, 'https://dhmedzit.com/assets/images/user_attachments/20221209145604.png', 'fhbbh', 'fhbbh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Shameed', NULL, 'ardi rach', 'app_doctor'),
(170, '1670544000', '9', NULL, 254, 'https://dhmedzit.com/assets/images/user_attachments/20221209151116.png', '3fhffhg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(171, '1671408000', '16', NULL, 255, 'https://dhmedzit.com/assets/images/user_attachments/20221210133511.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(172, '1670889600', '1', NULL, 256, 'https://dhmedzit.com/assets/images/user_attachments/20221213065746.png', 'need to take abdomen ct ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(173, '1670889600', '1', '2', 256, '', '', 'Prescription details for 256', 'https://dhmedzit.com/assets/images/doctor_report/20221213071333.png', 'patient had pain in abdominal region', 'advice d to take rest ', NULL, NULL, '1***100 mg***1-0-1***30 days***after food', NULL, 'taken ct abdomen scan ', 'Brayden ', NULL, 'Clara', '24'),
(174, '1670889600', '1', NULL, 257, 'https://dhmedzit.com/assets/images/user_attachments/20221213074704.png', 'need take mri brain scan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(175, '1670889600', '1', NULL, 258, 'https://dhmedzit.com/assets/images/user_attachments/20221213075216.png', 'x-ray', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(176, '0', '40', NULL, 259, 'https://dhmedzit.com/assets/images/user_attachments/20221213093342.png', 'konsul kesehatan', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(177, '1670889600', '40', NULL, 260, 'https://dhmedzit.com/assets/images/user_attachments/20221213093458.png', 'konsul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(178, '-2682000', '40', '1', 259, '', '', NULL, 'https://dhmedzit.com/uploads/reports/Doctor_Medical_Report_Sample.pdf', '<p>patient suffered from severe diarhea</p>\r\n', '<p>advices to take rest</p>\r\n', NULL, NULL, '1***100mg***1+0+1***10 ***After Food', NULL, '<p>referred to take test</p>\r\n', 'Delly Arnaz ', NULL, 'Ardi', '24'),
(179, '1670889600', '1', NULL, 261, 'https://dhmedzit.com/assets/images/user_attachments/20221213114921.png', 'want to meet Dr', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(180, '1670889600', '1', NULL, 262, 'https://dhmedzit.com/assets/images/user_attachments/20221213115034.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(181, '1670976000', '1', NULL, 263, 'https://dhmedzit.com/assets/images/user_attachments/20221214151102.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(182, '1670976000', '1', '1', 263, '', '', 'Prescription details for 263', 'https://dhmedzit.com/assets/images/doctor_report/20221214161052.png', 'history ', 'advice', NULL, NULL, '1***100mg***1-0-1***10days***10', NULL, 'notes', 'Brayden ', NULL, 'Ardi', '24'),
(183, '1670976000', '1', '1', 263, '', '', 'Prescription details for 263', 'https://dhmedzit.com/assets/images/doctor_report/20221214161939.png', 'history ', 'advice', NULL, NULL, '1***100mg***1-0-1***10days***10', NULL, 'notes', 'Brayden ', NULL, 'Ardi', '24'),
(184, '1670976000', '1', '1', 263, '', '', 'Prescription details for 263', 'https://dhmedzit.com/assets/images/doctor_report/20221214162111.png', 'test history ', 'test advice', NULL, NULL, '1***100mg***1-0-1***10days***10', NULL, 'test notes', 'Brayden ', NULL, 'Ardi', '24'),
(185, '1670976000', '1', NULL, 264, 'https://dhmedzit.com/assets/images/user_attachments/20221214163919.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(186, '1670976000', '1', '1', 264, '', '', 'Prescription details for 264', 'https://dhmedzit.com/assets/images/doctor_report/20221214164931.png', 'test history ', 'test advjce', NULL, NULL, '1***50mg***1-0-1 ***10***after food', NULL, 'test notes', 'Brayden ', NULL, 'Ardi', '24'),
(187, '1670976000', '1', '1', 264, '', '', 'Prescription details for 264', 'https://dhmedzit.com/uploads/reports/calender.png', '<p>test history edit</p>\r\n', '<p>test advjce edited in cms</p>\r\n', NULL, NULL, '1***50mg***1-0-1 ***10***after food', NULL, '<p>test notesedit</p>\r\n', 'Brayden ', NULL, 'Ardi', '24'),
(188, '1670976000', '1', '1', 264, '', '', 'Prescription details for 264', 'https://dhmedzit.com/assets/images/doctor_report/20221214170738.png', 'test history', 'test advice', NULL, NULL, '1***100mg***1-0-1 ***8days***af', NULL, 'test note', 'Brayden ', NULL, 'Ardi', '24'),
(189, '1671062400', '8', NULL, 265, 'https://dhmedzit.com/assets/images/user_attachments/20221215043751.png', 'sy sakit pinggang', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24'),
(190, '1671148800', '8', NULL, 266, 'https://dhmedzit.com/assets/images/user_attachments/20221216040145.png', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(100) NOT NULL,
  `report_type` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `other` varchar(100) DEFAULT NULL,
  `package` varchar(1000) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `transaction_id` varchar(150) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`id`, `name`, `address`, `email`, `phone`, `other`, `package`, `language`, `remarks`, `transaction_id`, `status`) VALUES
(1, 'Klinik Nurul', 'Jakarta, Indonesia ', 'admin@nurul.com', '+62 21 270 0610', NULL, '80', 'english', NULL, NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `scan_report`
--

CREATE TABLE `scan_report` (
  `id` int(100) NOT NULL,
  `appoitment_id` varchar(30) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `access` varchar(2000) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL,
  `report_link` longtext NOT NULL,
  `report_image` longtext NOT NULL,
  `report_pdf` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scan_report`
--

INSERT INTO `scan_report` (`id`, `appoitment_id`, `category`, `patient`, `doctor`, `date`, `category_name`, `report`, `status`, `user`, `access`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`, `report_link`, `report_image`, `report_pdf`) VALUES
(1, '1', 'Cardiac CT', '1', '2', '1659394800', NULL, 'Chicken Pox (Varicella):\r\nNOT IMMUNE\r\nMeasles:\r\nNOT IMMUNE\r\nHave you had the Hepatitis B vaccination?\r\nNo\r\nList any Medical Problems (asthma, seizures, headaches):\r\nIn congue. Etiam justo.', NULL, '909', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34919', 'http://midtrans.medzit.com/uploads/reports/20220802180035.png', 'http://midtrans.medzit.com/uploads/pdf/20220802180035.pdf'),
(2, '8', 'MRI Brain', '2', '2', '1659654000', NULL, '(intra-operative biopsy revealed: \r\ncholangiocarcinoma). \r\nBlood test showed normal liver function with elevation of Ca19-9 (>264 ng/mL, normal \r\nvalue= <35 ng/ml). \r\nA thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment \r\nIVa-V with satellite nodule of 1 cm (Figure 1-2) and absence of extra-hepatic disease. \r\n', NULL, '909', NULL, 'George', '9790988461', 'Jakarta, Indonesia ', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34919', 'http://midtrans.medzit.com/uploads/reports/20220805094429.png', 'http://midtrans.medzit.com/uploads/pdf/20220805094429.pdf'),
(3, '15', 'MRI SPINE', '2', '2', '1659654000', NULL, '(intra-operative biopsy revealed: \r\ncholangiocarcinoma). \r\nBlood test showed normal liver function with elevation of Ca19-9 (>264 ng/mL, normal \r\nvalue= <35 ng/ml). \r\nA thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment \r\nIVa-V with satellite nodule of 1 cm (Figure 1-2) and absence of extra-hepatic disease. \r\n\r\n', NULL, '909', NULL, 'George', '9790988461', 'Jakarta, Indonesia ', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'http://midtrans.medzit.com/uploads/reports/20220805094601.png', 'http://midtrans.medzit.com/uploads/pdf/20220805094601.pdf'),
(4, '16', 'X-Ray', '2', '2', '1659654000', NULL, 'Ricardo Anyene 5 Dorton Court\r\nCorona, California, 92878\r\nHome phone United States\r\n(24) 677-5381\r\nWork phone\r\n(58) 829-2801\r\nGeneral Medical History\r\nChicken Pox (Varicella):\r\nNOT IMMUNE\r\nMeasles:\r\nNOT IMMUNE\r\nHave you had the Hepatitis B vaccination?\r\nNo\r\nList any Medical Problems (asthma, seizures, headaches):\r\nIn congue. Etiam justo.\r\n', NULL, '909', NULL, 'George', '9790988461', 'Jakarta, Indonesia ', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34870', 'http://midtrans.medzit.com/uploads/reports/20220805094922.png', 'http://midtrans.medzit.com/uploads/pdf/20220805094922.pdf'),
(5, '8', 'Lab Report', '2', '2', '0', NULL, '<ol>\r\n	<li><strong>Laparoscopic appendectomy (intra-operative biopsy revealed: cholangiocarcinoma). |</strong></li>\r\n	<li><strong>Blood test showed normal liver function with elevation of Ca19-9 (&gt;264 ng/mL, normal value= &lt;35 ng/ml). </strong></li>\r\n	<li><strong>A thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment IVa-V with satellite nodule of 1 cm (Figure 1-2) and absence of extra-hepatic disease.</strong></li>\r\n</ol>\r\n', NULL, '2', NULL, 'George', '9790988461', 'Jakarta, Indonesia ', 'Clara', '01-01-1970', '24', '', '', 'http://midtrans.medzit.com/uploads/pdf/20220805131033.pdf'),
(6, '6', 'Lab Report', '1', NULL, '-24280065312', NULL, '<ol>\r\n	<li><strong>Laparoscopic appendectomy (intra-operative biopsy revealed: cholangiocarcinoma). |</strong></li>\r\n	<li><strong>Blood test showed normal liver function with elevation of Ca19-9 (&gt;264 ng/mL, normal value= &lt;35 ng/ml). </strong></li>\r\n	<li><strong>A thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment IVa-V with satellite nodule of 1 cm (Figure 1-2) and absence of extra-hepatic disease.</strong></li>\r\n</ol>\r\n', NULL, '1', NULL, 'Brayden ', '7395816924', 'Jakarta ', NULL, '01-01-1970', '24', '', '', 'http://midtrans.medzit.com/uploads/pdf/20220805131102.pdf'),
(7, '19', 'Lab Report', '2', '1', '0', NULL, '<p>A 29 -year old- male patient without any medical history was incidentally diagnosed with a giant hepatic</p>\r\n\r\n<p>mass during laparoscopic appendectomy (intra-operative biopsy revealed: cholangiocarcinoma).</p>\r\n\r\n<p>Blood test showed normal liver function with elevation of Ca19-9</p>\r\n\r\n<p>(&gt;264 ng/mL, normal value= &lt;35 ng/ml). A thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment IVa-V with satellite nodule of 1 cm (Figure 1-2)</p>\r\n\r\n<p>and absence of extra-hepatic disease.</p>\r\n', NULL, '2', NULL, 'Mohammed Asif', '9790988461', 'Jakarta, Indonesia ', 'Ardi', '01-01-1970', '24', '', '', 'http://midtrans.medzit.com/uploads/pdf/20220807152206.pdf'),
(8, '34', 'Lab Report', '1', '1', '0', NULL, '<pre>\r\n&nbsp;</pre>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<p><strong>TEST&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; RESULT&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; UNITS&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; NORMAL VALUES&nbsp;</strong></p>\r\n\r\n<hr />\r\n<p>Haemoglobin&nbsp; &nbsp;&nbsp;</p>\r\n\r\n<p>RBC Count&nbsp;</p>\r\n\r\n<p>PCV&nbsp;</p>\r\n\r\n<p><strong>RBC INDICES</strong></p>\r\n\r\n<hr />\r\n<p>MCV</p>\r\n\r\n<p>MCH&nbsp;</p>\r\n\r\n<p>MCHC</p>\r\n\r\n<p>RDW&nbsp;</p>\r\n\r\n<p><strong>TOTAL WBC COUNT</strong></p>\r\n\r\n<hr />\r\n<p>Total WBC Count&nbsp;</p>\r\n\r\n<p>Neutrophils&nbsp;</p>\r\n\r\n<p>Lymphocytes</p>\r\n\r\n<p>Monocytes</p>\r\n\r\n<p>Basophils&nbsp;</p>\r\n\r\n<hr />\r\n<p>Test done on Nihon Kohden MEK - 6420K fully automated cell counter.&nbsp;</p>\r\n\r\n<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ---------&nbsp;<strong><em>END OF REPORT----------</em></strong></p>\r\n', NULL, '1', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '01-01-1970', '24', '', '', 'http://dhmedzit.com/uploads/pdf/20220908161324.pdf'),
(9, '34', 'Lab Report', '1', '1', '0', NULL, '<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;Brayden</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : .452236666</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:Brayden.</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>: 25</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; : Male</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:5.0pt\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '1', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '01-01-1970', '24', '', '', 'http://dhmedzit.com/uploads/pdf/20220908162138.pdf'),
(10, '38', 'Lab Report', '1', '1', '0', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p', NULL, '1', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '01-01-1970', '24', '', '', 'http://dhmedzit.com/uploads/pdf/20220909102916.pdf'),
(11, '38', 'Lab Report', '1', '1', '0', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">&nbsp;<', NULL, '1', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '01-01-1970', '24', '', '', 'http://dhmedzit.com/uploads/pdf/20220909103212.pdf');
INSERT INTO `scan_report` (`id`, `appoitment_id`, `category`, `patient`, `doctor`, `date`, `category_name`, `report`, `status`, `user`, `access`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`, `hospital_id`, `report_link`, `report_image`, `report_pdf`) VALUES
(12, '38', 'Lab Report', '1', '1', '0', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">&nbsp;<', NULL, '1', NULL, 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '01-01-1970', '24', '', '', 'http://dhmedzit.com/uploads/pdf/20220909110344.pdf'),
(13, '42', 'Lab Report', '3', '1', '0', NULL, '<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">&nbsp;<', NULL, '3', NULL, 'George', '7851555222', 'jakarta', 'Ardi', '01-01-1970', '24', '', '', 'http://dhmedzit.com/uploads/pdf/20220910071639.pdf'),
(14, '82', 'Dokter Umum', '8', '1', '1663714800', NULL, 'sample report', NULL, '909', ',24', 'Ardiansa', '87771647744', 'depok', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'http://dhmedzit.com/uploads/reports/20220921163437.png', 'http://dhmedzit.com/uploads/pdf/20220921163437.pdf'),
(15, '82', 'Dokter Umum', '8', '1', '1663714800', NULL, 'sample test', NULL, '909', ',24', 'Ardiansa', '87771647744', 'depok', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'http://dhmedzit.com/uploads/reports/20220921163516.png', 'http://dhmedzit.com/uploads/pdf/20220921163516.pdf'),
(16, '86', 'Cardiac CT', '1', '1', '1663714800', NULL, 'sample test', NULL, '909', ',24', 'Brayden ', '7395816924', 'Jakarta ', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'http://dhmedzit.com/uploads/reports/20220921164114.png', 'http://dhmedzit.com/uploads/pdf/20220921164114.pdf'),
(17, '105', 'X-Ray', '14', '1', '1663974000', NULL, 'RIP ', NULL, '909', ',24', 'Aadh', '+919790936741', 'lalala', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'http://dhmedzit.com/uploads/reports/20220924120947.png', 'http://dhmedzit.com/uploads/pdf/20220924120947.pdf'),
(21, '176', 'Dokter Umum', '1', '1', '1666825200', NULL, 'test report... patient can be discharged tommoroww. ', NULL, '909', ',24', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'https://dhmedzit.com/uploads/reports/20221027151649.png', 'https://dhmedzit.com/uploads/pdf/20221027151649.pdf'),
(22, '193', 'Cardiac CT', '1', '1', '1667174400', NULL, 'List any allergies:\r\nInteger pede justo, lacinia eget, tincidunt eget, tempus vel, pede.\r\nList any medication taken regularly:\r\nInteger pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', NULL, '909', ',24', 'Brayden ', '+917395816924', 'Jakarta', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34919', 'https://dhmedzit.com/uploads/reports/20221031081502.png', 'https://dhmedzit.com/uploads/pdf/20221031081502.pdf'),
(23, '194', 'Dokter Umum', '8', '1', '1667174400', NULL, 'whatever', NULL, '909', ',24', 'Ardiansa', '+6287771647744', 'depok', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'https://dhmedzit.com/uploads/reports/20221031112346.png', 'https://dhmedzit.com/uploads/pdf/20221031112346.pdf'),
(20, '120', 'Dokter Umum', '8', '1', '1664146800', NULL, 'this is the sample report ', NULL, '909', ',24', 'Ardiansa', '+6287771647744', 'depok', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'http://dhmedzit.com/uploads/reports/20220926100859.png', 'http://dhmedzit.com/uploads/pdf/20220926100859.pdf'),
(19, '114', 'CT Abdomen', '15', '1', '1664146800', NULL, 'sample report field ', NULL, '909', ',24', 'Sadh', '+919790936741', 'lalalal', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'http://dhmedzit.com/uploads/reports/20220925202009.png', 'http://dhmedzit.com/uploads/pdf/20220925202009.pdf'),
(24, '194', 'Dokter Umum', '8', '1', '1667174400', NULL, 'sample report ', NULL, '909', ',24', 'Ardiansa', '+6287771647744', 'depok', 'Ardi', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=34932', 'https://dhmedzit.com/uploads/reports/20221031113120.png', 'https://dhmedzit.com/uploads/pdf/20221031113120.pdf'),
(33, '256', 'CT Abdomen', '1', '2', '1670889600', NULL, 'Case report \r\nA 29 -year old- male patient without any medical history was incidentally diagnosed with a \r\ngiant hepatic mass during laparoscopic appendectomy (intra-operative biopsy revealed: \r\ncholangiocarcinoma). \r\nBlood test showed normal liver function with elevation of Ca19-9 (>264 ng/mL, normal \r\nvalue= <35 ng/ml). \r\nA thoracic and abdominal CT scan showed a heterogeneous mass of 8 x 5 cm in segment \r\nIVa-V with satellite nodule of 1 cm (Figure 1-2) and absence of extra-hepatic disease.', NULL, '909', ',24', 'Brayden ', '+917395816924', 'Jakarta', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=39006', 'https://dhmedzit.com/uploads/reports/20221213073632.png', 'https://dhmedzit.com/uploads/pdf/20221213073632.pdf'),
(34, '257', 'MRI Brain', '1', '2', '1670889600', NULL, 'Pathological specimen: Moderate differentiated intra-hepatic cholangiocarcinoma of 6,7 x \r\n4,5 with a satellite nodule of 1 cm. No lymph node metastases (0/2). Negative surgical \r\nmargin. \r\nStage: pT2b N0 M0. \r\nKey question: Should we perform adjuvant therapy on this patient? \r\nNote: At our tumor conference, our oncologists favor chemotherapy therapy based on two \r\npotential risk factors: the presence of a satellite nodule (could be considered as a \r\nmetastases), and a long-life expectancy (very young patient)', NULL, '909', ',24', 'Brayden ', '+917395816924', 'Jakarta', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=39012', 'https://dhmedzit.com/uploads/reports/20221213075817.png', 'https://dhmedzit.com/uploads/pdf/20221213075817.pdf'),
(35, '258', 'X-Ray', '1', '2', '1670889600', NULL, 'Pathological specimen: Moderate differentiated intra-hepatic cholangiocarcinoma of 6,7 x \r\n4,5 with a satellite nodule of 1 cm. No lymph node metastases (0/2). Negative surgical \r\nmargin. \r\nStage: pT2b N0 M0. \r\nKey question: Should we perform adjuvant therapy on this patient? \r\nNote: At our tumor conference, our oncologists favor chemotherapy therapy based on two \r\npotential risk factors: the presence of a satellite nodule (could be considered as a \r\nmetastases), and a long-life expectancy (very young patient)', NULL, '909', ',24', 'Brayden ', '+917395816924', 'Jakarta', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=38988', 'https://dhmedzit.com/uploads/reports/20221213080416.png', 'https://dhmedzit.com/uploads/pdf/20221213080416.pdf'),
(36, '258', 'X-Ray', '1', '2', '1670889600', NULL, 'test data', NULL, '909', ',24', 'Brayden ', '+917395816924', 'Jakarta', 'Clara', '01-01-1970', '24', 'http://49.50.70.26/cmieweb/web.aspx?study_id=39012', 'https://dhmedzit.com/uploads/reports/20221213121213.png', 'https://dhmedzit.com/uploads/pdf/20221213121213.pdf'),
(27, '233', 'Lab Report', '8', '1', '0', NULL, '<table cellspacing=\"0\" style=\"width:149pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:53pt\"><strong>Blood test&nbsp;</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>Values</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>&nbsp;Status</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', NULL, '8', ',24', 'Ardiansa', '+6287771647744', 'depok', 'Ardi', '01-01-1970', '24', '', '', 'https://dhmedzit.com/uploads/pdf/20221112095609.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `scan_types`
--

CREATE TABLE `scan_types` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `scan_type` varchar(50) NOT NULL,
  `amount` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `hospital_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scan_types`
--

INSERT INTO `scan_types` (`id`, `category`, `scan_type`, `amount`, `description`, `created_at`, `hospital_id`) VALUES
(1, 'Radiology', 'MRI Brain', '1000', '', '2022-08-02', 24),
(2, 'Cardiology', 'Cardiac CT', '5000', '', '2022-08-02', 24),
(3, 'Neurology', 'CT BRAIN', '6000', '', '2022-08-02', 24),
(4, 'Radiology', 'MRI SPINE', '7000', '', '2022-08-02', 24),
(5, 'Radiology', 'X-Ray', '2500', '', '2022-08-02', 24),
(7, 'Cardiology', 'Cardiac CT', '2500', '<p>sample data</p>\r\n', '2022-08-07', 24),
(8, 'Radiology', 'CT Abdomen', '2900', '<p>sample description</p>\r\n', '2022-08-07', 24),
(9, 'Cardiology', 'Cardiac CT', '1000', '', '2022-08-25', 38),
(10, 'Neurology', 'Brain CT', '1000', '', '2022-08-25', 38),
(11, 'General Consultation', 'Dokter Umum', '2000', '<p>Konsultasi dengan Dokter Umum</p>\r\n', '2022-09-21', 24),
(14, 'cardiology consultation', 'General Consultation cardiology', '1500', '<p>testing</p>\r\n', '2022-11-16', 24),
(15, 'Neurology', 'General Consultation Neurology', '2000', '<p>test</p>\r\n', '2022-11-16', 24),
(16, 'General Consultation', 'Test procedure ', '500', '', '2022-11-28', 24);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(100) NOT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `system_vendor` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `live_appointment_type` varchar(100) DEFAULT NULL,
  `vat` varchar(100) DEFAULT NULL,
  `login_title` varchar(100) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `invoice_logo` varchar(500) DEFAULT NULL,
  `payment_gateway` varchar(100) DEFAULT NULL,
  `sms_gateway` varchar(100) DEFAULT NULL,
  `codec_username` varchar(100) DEFAULT NULL,
  `codec_purchase_code` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_vendor`, `title`, `address`, `phone`, `email`, `facebook_id`, `currency`, `language`, `discount`, `live_appointment_type`, `vat`, `login_title`, `logo`, `invoice_logo`, `payment_gateway`, `sms_gateway`, `codec_username`, `codec_purchase_code`, `hospital_id`) VALUES
(29, 'Hospital management System', 'ADMIN ', '12th Main Street, Madurai', '150385608', 'hospitaladmin@test.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, NULL),
(47, 'Medapps | Hospital management System', 'Lister Hospital', 'Whitecappel Road, London , E1 1 FR ', '9840817654', 'admin@lister.com', NULL, 'GBP', 'english', 'flat', NULL, NULL, NULL, 'uploads/php-images-min.png', NULL, NULL, NULL, '', '', '2'),
(86, 'Medapps - CMS', 'ATM Sehat', 'Ruang Tenant DIIB UI, lt. 2, Gedung ILRC, Kampus Universitas Indonesia, Depok.', '(+62) 823-4837-1262', 'admin@atmsehat.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '41'),
(85, 'Medapps - CMS', 'Datar Cancer Genetics ', '4, Frederick Sanger Road, Surrey Research Park, Guildford, Surrey, United Kingdom - GU2 7YD', '09607990814', 'admin@datar.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '40'),
(84, 'Medapps - CMS', 'Fortis Delhi', 'Delhi', '08344581073', 'admin@fortis.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '39'),
(54, 'Medapps - CMS', 'Lenmed - Ethikweni Private Hospital', '11 Riverhorse Drive, Riverhorse Valley Business Estate, Durban', '+27 (0)31-581-2400', 'admin@lenmed', NULL, '$', 'english', 'flat', NULL, NULL, NULL, 'uploads/lenmed.jpg', NULL, NULL, 'Twilio', '', '', '9'),
(83, 'Medapps - CMS', 'Test Hospital ', 'chennai', '08344581073', 'testhospital@gmail.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '38'),
(82, 'Medapps - CMS', 'National Hospital Surabaya', 'Jl. Boulevard Famili Sel. No.Kav. 1, Babatan, Kec. Wiyung, Kota SBY, Jawa Timur 60227, Indonesia', '+62312975777', 'admin@nhsurabaya.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '37'),
(81, 'Medapps - CMS', 'KLINIK NURUL HUSNA', 'Jl. Grand Kahuripan Cluster Sindoro Blok D-F No.5 - 6, Dayeuh, Cileungsi, Bogor.', '021-29464130', 'admin@knh.com', NULL, '$', 'indonesian', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '36'),
(80, 'Medapps - CMS', 'Test', '47 new St', '+917502011642', 'test@hos.com', NULL, '$', 'spanish', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '35'),
(79, 'Medapps - CMS', 'Test', 'test', '07502011642', 'test@hos.com', NULL, '$', 'arabic', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '34'),
(77, 'Medapps - CMS', 'Test', '47 new St', '+917502011642', 'test@hos.com', NULL, '$', 'arabic', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '32'),
(78, 'Medapps - CMS', 'Test 2', '47 new St', '+917502011642', 'test1@hos.com', NULL, '$', 'arabic', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '33'),
(75, 'Medapps - CMS', 'lister', 'london', '46525178', 'admin@lister2.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '29'),
(76, 'Medapps - CMS', 'Test', 'Test', '07502011642', 'test@hos.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '31'),
(74, 'Medapps - CMS', 'Lister', 'London', '4526284', 'admin@lister2.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '29'),
(73, 'Medapps - CMS', 'Klinik Pratama Nala ', 'I, Jl. Medika No.2, RT.02/RW.19, Menteng, Kec. Bogor Bar., Kota Bogor, Jawa Barat 16111, Indonesia', '0251-8319668', 'admin@kpratama.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '28'),
(72, 'Medapps - CMS', 'RSIA HOSPITAL  JAKARTA', 'Jl. Panglima Polim 1 No. 34, RT.1/RW.3 Kebayoran Baru, RT.1/RW.3 South Jakarta 12160', '+62 21 270 0610', 'admin@asih.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '27'),
(71, 'Medapps - CMS', 'Kemang Medical Care', 'Jalan Ampera Raya No. 34 Cilandak Timur South Jakarta 12560', '+62 21 2754 5400', 'admin@kemangmc.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '26'),
(70, 'Medapps - CMS', 'Brawijaya Hospital', 'Jalan Taman Brawijaya No. 1 Cipete Utara Kebayoran Baru South Jakarta 12150', '+62 21 721 1337', 'admin@bwch.com', NULL, '$', 'english', 'flat', NULL, NULL, NULL, NULL, NULL, NULL, 'Twilio', NULL, NULL, '21'),
(69, 'Medapps - CMS', 'KLINIK KENMUGI', 'Jl. Aria Putra No.8, Serua, Kec. Ciputat, Kota Tangerang Selatan, Banten 15414', '(021) 74778256', 'admin@kenmugi.com', NULL, 'Rp', 'english', 'flat', NULL, NULL, NULL, 'uploads/Digital_Hospital_Logo.png', NULL, NULL, 'Twilio', '', '', '24');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `text1` varchar(500) DEFAULT NULL,
  `text2` varchar(500) DEFAULT NULL,
  `text3` varchar(500) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(1600) DEFAULT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `api_id` varchar(100) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `authkey` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `sid` varchar(1000) DEFAULT NULL,
  `token` varchar(1000) DEFAULT NULL,
  `sendernumber` varchar(1000) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `name`, `username`, `password`, `api_id`, `sender`, `authkey`, `user`, `sid`, `token`, `sendernumber`, `hospital_id`) VALUES
(29, 'Twilio', NULL, NULL, NULL, NULL, NULL, '763', 'ACe40c9745a263e8ed2929dff9fa5c6056', 'ecfb6ec1504677bda12f46764d3da9dd', '+12026402910', '466'),
(28, 'MSG91', NULL, NULL, NULL, 'Enter_Sender_Number', 'Enter_Your_MSG91_Auth_Key', '763', NULL, NULL, NULL, '466'),
(27, 'Clickatell', 'Enter_Your_ClickAtell_Username', '', 'Enter_Your_ClickAtell_Api _Id', NULL, NULL, '763', NULL, NULL, NULL, '466'),
(60, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '477'),
(61, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '477'),
(62, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '477'),
(63, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '478'),
(64, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '478'),
(65, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '478'),
(66, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '479'),
(67, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '479'),
(68, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '479'),
(69, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '480'),
(70, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '480'),
(71, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '480'),
(72, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '481'),
(73, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '481'),
(74, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '481'),
(75, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '482'),
(76, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '482'),
(77, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '482'),
(78, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '483'),
(79, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '483'),
(80, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '483'),
(81, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, NULL),
(82, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, NULL),
(83, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', NULL),
(84, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '488'),
(85, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '488'),
(86, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '488'),
(87, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '489'),
(88, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '489'),
(89, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '489'),
(90, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '491'),
(91, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '491'),
(92, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '491'),
(93, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '492'),
(94, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '492'),
(95, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '492'),
(96, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '486'),
(97, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '486'),
(98, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '486'),
(99, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '494'),
(100, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '494'),
(101, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '494'),
(102, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '503'),
(103, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '503'),
(104, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '503'),
(105, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '504'),
(106, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '504'),
(107, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '504'),
(108, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '505'),
(109, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '505'),
(110, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '505'),
(111, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '506'),
(112, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '506'),
(113, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '506'),
(114, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '507'),
(115, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '507'),
(116, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '507'),
(117, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '508'),
(118, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '508'),
(119, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '508'),
(120, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '509'),
(121, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '509'),
(122, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '509'),
(123, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '510'),
(124, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '510'),
(125, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '510'),
(126, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '819'),
(127, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '819'),
(128, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '819'),
(129, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '820'),
(130, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '820'),
(131, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '820'),
(132, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '1'),
(133, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', NULL, 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '1'),
(134, 'Twilio', NULL, NULL, NULL, NULL, NULL, '845', 'AC5940305186d40983d989dc389065fdad', '7388594681f63b7bde4daa9b439f7c2a', '+12019577741', '1'),
(135, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '2'),
(136, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', NULL, 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '2'),
(137, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '2'),
(138, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '3'),
(139, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '3'),
(140, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '3'),
(141, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '4'),
(142, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '4'),
(143, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '4'),
(144, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '5'),
(145, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '5'),
(146, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '5'),
(147, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '6'),
(148, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '6'),
(149, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '6'),
(150, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '7'),
(151, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '7'),
(152, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '7'),
(153, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '8'),
(154, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '8'),
(155, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '8'),
(156, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '9'),
(157, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '9'),
(158, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '9'),
(159, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '10'),
(160, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '10'),
(161, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '10'),
(162, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '11'),
(163, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '11'),
(164, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '11'),
(165, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '12'),
(166, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '12'),
(167, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '12'),
(168, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '13'),
(169, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '13'),
(170, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '13'),
(171, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '14'),
(172, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '14'),
(173, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '14'),
(174, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '15'),
(175, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '15'),
(176, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '15'),
(177, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '16'),
(178, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '16'),
(179, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '16'),
(180, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '17'),
(181, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '17'),
(182, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '17'),
(183, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '18'),
(184, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '18'),
(185, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '18'),
(186, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '19'),
(187, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '19'),
(188, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '19'),
(189, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '20'),
(190, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '20'),
(191, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '20'),
(192, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '21'),
(193, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '21'),
(194, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '21'),
(195, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '22'),
(196, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '22'),
(197, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '22'),
(198, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '23'),
(199, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '23'),
(200, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '23'),
(201, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '24'),
(202, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '24'),
(203, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '24'),
(204, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '21'),
(205, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '21'),
(206, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '21'),
(207, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '26'),
(208, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '26'),
(209, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '26'),
(210, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '27'),
(211, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '27'),
(212, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '27'),
(213, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '28'),
(214, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '28'),
(215, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '28'),
(216, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '29'),
(217, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '29'),
(218, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '29'),
(219, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '29'),
(220, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '29'),
(221, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '29'),
(222, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '31'),
(223, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '31'),
(224, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '31'),
(225, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '32'),
(226, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '32'),
(227, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '32'),
(228, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '33'),
(229, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '33'),
(230, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '33'),
(231, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '34'),
(232, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '34'),
(233, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '34'),
(234, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '35'),
(235, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '35'),
(236, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '35'),
(237, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '36'),
(238, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '36'),
(239, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '36'),
(240, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '37'),
(241, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '37'),
(242, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '37'),
(243, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '38'),
(244, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '38'),
(245, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '38'),
(246, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '39'),
(247, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '39'),
(248, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '39'),
(249, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '40'),
(250, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '40'),
(251, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '40'),
(252, 'Clickatell', 'Your ClickAtell Username', 'Your ClickAtell Password', 'Your ClickAtell Api Id', NULL, NULL, '1', NULL, NULL, NULL, '41'),
(253, 'MSG91', 'Your MSG91 Username', NULL, 'Your MSG91 API ID', 'Sender Number', 'Your MSG91 Auth Key', '1', NULL, NULL, NULL, '41'),
(254, 'Twilio', NULL, NULL, NULL, NULL, NULL, '1', 'SID Number', 'Token Number', 'Sender Number', '41');

-- --------------------------------------------------------

--
-- Table structure for table `specialist`
--

CREATE TABLE `specialist` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `hospital_id` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specialist`
--

INSERT INTO `specialist` (`id`, `title`, `image`, `status`, `hospital_id`, `created_at`) VALUES
(1, 'Radiology', 'http://dhmedzit.com/uploads/specialist/1665553634.png', 'Active', '', '2022-08-02 11:15:59'),
(2, 'General Practitioner', 'http://dhmedzit.com/uploads/specialist/1665553652.png', 'Active', '', '2022-08-02 14:06:07'),
(3, 'Cardiology', 'http://dhmedzit.com/uploads/specialist/1665553665.png', 'Active', '', '2022-08-02 14:06:20'),
(4, 'Nephrology', 'http://dhmedzit.com/uploads/specialist/1665553679.png', 'Active', '', '2022-08-02 14:06:29'),
(5, 'Pulmonology', 'http://dhmedzit.com/uploads/specialist/1665553695.png', 'Active', '', '2022-08-02 14:06:40'),
(6, 'Dermatology', 'http://dhmedzit.com/uploads/specialist/1665553707.png', 'Active', '', '2022-08-02 14:07:40'),
(7, 'Gynaecology', 'http://dhmedzit.com/uploads/specialist/1665553723.png', 'Active', '', '2022-08-02 14:08:34'),
(8, 'Oncology', 'http://dhmedzit.com/uploads/specialist/1665553739.png', 'Active', '', '2022-08-03 13:57:29'),
(9, 'Endocrinology', 'http://dhmedzit.com/uploads/specialist/1665553752.png', 'Active', '', '2022-08-03 13:57:49'),
(10, 'Gastrology', 'http://dhmedzit.com/uploads/specialist/1665553766.png', 'Active', '', '2022-08-03 13:58:06'),
(11, 'Orthopedic', 'http://dhmedzit.com/uploads/specialist/1665553780.png', 'Active', '', '2022-08-03 13:58:30'),
(12, 'Urology', 'http://dhmedzit.com/uploads/specialist/1665553792.png', 'Active', '', '2022-08-03 13:58:48'),
(13, 'Sexology', 'http://dhmedzit.com/uploads/specialist/1665553805.png', 'Active', '', '2022-08-03 13:59:08'),
(14, 'Ophthalmology', 'http://dhmedzit.com/uploads/specialist/1665553825.png', 'Active', '', '2022-08-03 13:59:46'),
(15, 'ENT', 'http://dhmedzit.com/uploads/specialist/1665553835.png', 'Active', '', '2022-08-03 14:00:02'),
(16, 'Cardialogist', '', 'Active', '24', '2022-08-07 01:42:03'),
(17, 'Neurologist', '', 'Active', '24', '2022-08-07 07:33:49');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `template` varchar(10000) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `template`, `user`, `x`, `hospital_id`) VALUES
(1, 'Blood Test ', '<hr />\r\n<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<strong>COMPLETE BLOOD COUNT</strong></p>\r\n\r\n<hr />\r\n<pre>\r\n<strong>TEST           RESULT      UNITS     NORMAL   VALUES </strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n<em><strong>Haemoglobin    \r\n\r\nRBC Count \r\n\r\nPCV </strong></em>\r\n\r\n<strong>RBC INDICES</strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n<em>MCV\r\n\r\nMCH \r\n\r\nMCHC\r\n\r\nRDW </em>\r\n\r\n<strong>TOTAL WBC COUNT</strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n<em>Total WBC Count \r\n\r\nNeutrophils \r\n\r\nLymphocytes\r\n\r\nMonocytes\r\n\r\nBasophils </em></pre>\r\n\r\n<hr />\r\n<pre>\r\n<strong><em> Test done on Nihon Kohden MEK - 6420K fully automated cell counter.</em></strong></pre>\r\n\r\n<hr />\r\n<pre>\r\n                          --------- <strong><em>END OF REPORT----------</em></strong></pre>\r\n', '909', NULL, '24'),
(3, 'Blood test 2 ', '<table cellspacing=\"0\" style=\"width:149pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:53pt\"><strong>Blood test&nbsp;</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>Values</strong></td>\r\n			<td style=\"background-color:yellow; height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\"><strong>&nbsp;Status</strong></td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '909', NULL, '24'),
(2, 'FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM', '<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table cellspacing=\"0\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.2pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>Pasien :</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.2pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:8.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Nomor Register : ...........................</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p><strong>Gejala Penyakit :</strong></p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Spesimen</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Nama</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Jenis</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>:..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Umur</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.1pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Asal Bahan :..............</p>\r\n			</td>\r\n			<td style=\"height:9.1pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:9.35pt; vertical-align:bottom; width:118.0pt\">\r\n			<p>- Jenis Kelamin&nbsp; :............................</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:69.0pt\">\r\n			<p>Pengobatan :</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:9.35pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>Tgl/jam pengambilan sp :.......</p>\r\n			</td>\r\n			<td style=\"height:9.35pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:9.6pt; vertical-align:bottom; width:42.0pt\">\r\n			<p>- Alamat</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:76.0pt\">\r\n			<p>:............................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:17.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:24.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:58.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:41.0pt\">\r\n			<p>Petugas</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:67.0pt\">\r\n			<p>: ...........................</p>\r\n			</td>\r\n			<td style=\"height:9.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td rowspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:8.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>No.</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:5.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:8.6pt; vertical-align:bottom; width:108.0pt\">\r\n			<p>JENIS PEMERIKSAAN</p>\r\n			</td>\r\n			<td style=\"height:8.6pt; vertical-align:bottom; width:0cm\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:23.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"2\" style=\"height:20.6pt; vertical-align:bottom; width:95.0pt\">\r\n			<p>HEMATOLOGI</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:25.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td colspan=\"3\" style=\"height:20.6pt; vertical-align:bottom; width:99.0pt\">\r\n			<p>TINJA</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-align:bottom; width:11.0pt\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"height:20.6pt; vertical-a', '909', NULL, '24'),
(4, 'request form', '<table cellspacing=\"0\" style=\"width:624pt\">\r\n	<tbody>\r\n		<tr>\r\n			<td colspan=\"7\" style=\"height:14.4pt; vertical-align:middle; white-space:nowrap; width:336pt\"><strong>FORMULIR PERMINTAAN PEMERIKSAAN LABORATORIUM</strong></td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:bottom; white-space:nowrap; width:48pt\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15.6pt; vertical-align:middle; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n			<td style=\"height:15.6pt; vertical-align:bottom; white-space:nowrap\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:15.0pt; text-align:left; vertical-align:middle; white-space:normal; width:96pt\">Pasien :</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:14.4pt; text-align:left; vertical-align:middle; white-space:normal; width:144pt\">- Nomor Register : ...........................</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td colspan=\"2\" style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:96pt\"><strong>Gejala Penyakit :</strong></td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">Spesimen</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:20.4pt; text-align:left; vertical-align:middle; white-space:normal; width:96pt\">- Nama</td>\r\n			<td style=\"height:20.4pt; text-align:right; vertical-align:middle; white-space:normal; width:48pt\">:............................</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">Jenis</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">:..............</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:20.4pt; text-align:left; vertical-align:middle; white-space:normal; width:96pt\">- Umur</td>\r\n			<td style=\"height:20.4pt; text-align:right; vertical-align:middle; white-space:normal; width:48pt\">:............................</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td colspan=\"2\" style=\"height:20.4pt; vertical-align:middle; white-space:normal; width:96pt\">Asal Bahan :..............</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"3\" style=\"height:14.4pt; text-align:left; vertical-align:middle; white-space:normal; width:144pt\">- Jenis Kelamin&nbsp; :............................</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td colspan=\"2\" style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:96pt\">Pengobatan :</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td colspan=\"2\" style=\"height:14.4pt; vertical-align:middle; white-space:normal; width:96pt\">Tgl/jam pengambilan sp :.......</td>\r\n		</tr>\r\n		<tr>\r\n			<td colspan=\"2\" style=\"height:31.2pt; text-align:left; vertical-align:middle; white-space:normal; width:96pt\">- Alamat</td>\r\n			<td style=\"height:31.2pt; text-align:right; vertical-align:middle; white-space:normal; width:48pt\">:............................</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">Petugas</td>\r\n			<td style=\"height:31.2pt; vertical-align:middle; white-space:normal; width:48pt\">: ...........................</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td colspan=\"2\" style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:96pt\">&nbsp;</td>\r\n			<td rowspan=\"2\" style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td colspan=\"3\" style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:144pt\">&nbsp;</td>\r\n			<td rowspan=\"2\" style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:48pt\">&nbsp;</td>\r\n			<td colspan=\"2\" style=\"height:15.0pt; vertical-align:middle; white-space:normal; width:96pt\">&nbsp;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"height:15.0pt; vertical-align:mid', '909', NULL, '24');

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(250) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule`
--

CREATE TABLE `time_schedule` (
  `id` int(100) NOT NULL,
  `doctor` varchar(500) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_schedule`
--

INSERT INTO `time_schedule` (`id`, `doctor`, `weekday`, `s_time`, `e_time`, `s_time_key`, `duration`, `hospital_id`) VALUES
(1, '2', 'Friday', '10:00 AM', '06:00 PM', '120', '3', '24'),
(2, '1', 'Friday', '10:00 AM', '06:00 PM', '120', '4', '24'),
(3, '2', 'Saturday', '10:00 AM', '06:00 PM', '120', '3', '24'),
(4, '1', 'Saturday', '10:00 AM', '06:00 PM', '120', '3', '24'),
(5, '1', 'Monday', '02:00 PM', '06:00 PM', '168', '3', '24'),
(6, '9', 'Monday', '02:00 PM', '06:00 PM', '168', '3', '24'),
(7, '1', 'Wednesday', '10:00 AM', '06:00 PM', '120', '4', '24'),
(8, '1', 'Thursday', '10:00 AM', '05:00 PM', '120', '4', '24'),
(12, '1', 'Tuesday', '01:00 PM', '05:00 PM', '156', '3', '24');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(100) NOT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `hospital_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `doctor`, `s_time`, `e_time`, `weekday`, `s_time_key`, `hospital_id`) VALUES
(1, '2', '10:00 AM', '10:15 AM', 'Friday', '120', '24'),
(2, '2', '10:15 AM', '10:30 AM', 'Friday', '123', '24'),
(3, '2', '10:30 AM', '10:45 AM', 'Friday', '126', '24'),
(4, '2', '10:45 AM', '11:00 AM', 'Friday', '129', '24'),
(5, '2', '11:00 AM', '11:15 AM', 'Friday', '132', '24'),
(6, '2', '11:15 AM', '11:30 AM', 'Friday', '135', '24'),
(7, '2', '11:30 AM', '11:45 AM', 'Friday', '138', '24'),
(8, '2', '11:45 AM', '12:00 AM', 'Friday', '141', '24'),
(9, '2', '12:00 AM', '12:15 PM', 'Friday', '144', '24'),
(10, '2', '12:15 PM', '12:30 PM', 'Friday', '147', '24'),
(11, '2', '12:30 PM', '12:45 PM', 'Friday', '150', '24'),
(12, '2', '12:45 PM', '01:00 PM', 'Friday', '153', '24'),
(13, '2', '01:00 PM', '01:15 PM', 'Friday', '156', '24'),
(14, '2', '01:15 PM', '01:30 PM', 'Friday', '159', '24'),
(15, '2', '01:30 PM', '01:45 PM', 'Friday', '162', '24'),
(16, '2', '01:45 PM', '02:00 PM', 'Friday', '165', '24'),
(17, '2', '02:00 PM', '02:15 PM', 'Friday', '168', '24'),
(18, '2', '02:15 PM', '02:30 PM', 'Friday', '171', '24'),
(19, '2', '02:30 PM', '02:45 PM', 'Friday', '174', '24'),
(20, '2', '02:45 PM', '03:00 PM', 'Friday', '177', '24'),
(21, '2', '03:00 PM', '03:15 PM', 'Friday', '180', '24'),
(22, '2', '03:15 PM', '03:30 PM', 'Friday', '183', '24'),
(23, '2', '03:30 PM', '03:45 PM', 'Friday', '186', '24'),
(24, '2', '03:45 PM', '04:00 PM', 'Friday', '189', '24'),
(25, '2', '04:00 PM', '04:15 PM', 'Friday', '192', '24'),
(26, '2', '04:15 PM', '04:30 PM', 'Friday', '195', '24'),
(27, '2', '04:30 PM', '04:45 PM', 'Friday', '198', '24'),
(28, '2', '04:45 PM', '05:00 PM', 'Friday', '201', '24'),
(29, '2', '05:00 PM', '05:15 PM', 'Friday', '204', '24'),
(30, '2', '05:15 PM', '05:30 PM', 'Friday', '207', '24'),
(31, '2', '05:30 PM', '05:45 PM', 'Friday', '210', '24'),
(32, '2', '05:45 PM', '06:00 PM', 'Friday', '213', '24'),
(33, '1', '10:00 AM', '10:20 AM', 'Friday', '120', '24'),
(34, '1', '10:20 AM', '10:40 AM', 'Friday', '124', '24'),
(35, '1', '10:40 AM', '11:00 AM', 'Friday', '128', '24'),
(36, '1', '11:00 AM', '11:20 AM', 'Friday', '132', '24'),
(37, '1', '11:20 AM', '11:40 AM', 'Friday', '136', '24'),
(38, '1', '11:40 AM', '12:00 AM', 'Friday', '140', '24'),
(39, '1', '12:00 AM', '12:20 PM', 'Friday', '144', '24'),
(40, '1', '12:20 PM', '12:40 PM', 'Friday', '148', '24'),
(41, '1', '12:40 PM', '01:00 PM', 'Friday', '152', '24'),
(42, '1', '01:00 PM', '01:20 PM', 'Friday', '156', '24'),
(43, '1', '01:20 PM', '01:40 PM', 'Friday', '160', '24'),
(44, '1', '01:40 PM', '02:00 PM', 'Friday', '164', '24'),
(45, '1', '02:00 PM', '02:20 PM', 'Friday', '168', '24'),
(46, '1', '02:20 PM', '02:40 PM', 'Friday', '172', '24'),
(47, '1', '02:40 PM', '03:00 PM', 'Friday', '176', '24'),
(48, '1', '03:00 PM', '03:20 PM', 'Friday', '180', '24'),
(49, '1', '03:20 PM', '03:40 PM', 'Friday', '184', '24'),
(50, '1', '03:40 PM', '04:00 PM', 'Friday', '188', '24'),
(51, '1', '04:00 PM', '04:20 PM', 'Friday', '192', '24'),
(52, '1', '04:20 PM', '04:40 PM', 'Friday', '196', '24'),
(53, '1', '04:40 PM', '05:00 PM', 'Friday', '200', '24'),
(54, '1', '05:00 PM', '05:20 PM', 'Friday', '204', '24'),
(55, '1', '05:20 PM', '05:40 PM', 'Friday', '208', '24'),
(56, '1', '05:40 PM', '06:00 PM', 'Friday', '212', '24'),
(57, '2', '10:00 AM', '10:15 AM', 'Saturday', '120', '24'),
(58, '2', '10:15 AM', '10:30 AM', 'Saturday', '123', '24'),
(59, '2', '10:30 AM', '10:45 AM', 'Saturday', '126', '24'),
(60, '2', '10:45 AM', '11:00 AM', 'Saturday', '129', '24'),
(61, '2', '11:00 AM', '11:15 AM', 'Saturday', '132', '24'),
(62, '2', '11:15 AM', '11:30 AM', 'Saturday', '135', '24'),
(63, '2', '11:30 AM', '11:45 AM', 'Saturday', '138', '24'),
(64, '2', '11:45 AM', '12:00 AM', 'Saturday', '141', '24'),
(65, '2', '12:00 AM', '12:15 PM', 'Saturday', '144', '24'),
(66, '2', '12:15 PM', '12:30 PM', 'Saturday', '147', '24'),
(67, '2', '12:30 PM', '12:45 PM', 'Saturday', '150', '24'),
(68, '2', '12:45 PM', '01:00 PM', 'Saturday', '153', '24'),
(69, '2', '01:00 PM', '01:15 PM', 'Saturday', '156', '24'),
(70, '2', '01:15 PM', '01:30 PM', 'Saturday', '159', '24'),
(71, '2', '01:30 PM', '01:45 PM', 'Saturday', '162', '24'),
(72, '2', '01:45 PM', '02:00 PM', 'Saturday', '165', '24'),
(73, '2', '02:00 PM', '02:15 PM', 'Saturday', '168', '24'),
(74, '2', '02:15 PM', '02:30 PM', 'Saturday', '171', '24'),
(75, '2', '02:30 PM', '02:45 PM', 'Saturday', '174', '24'),
(76, '2', '02:45 PM', '03:00 PM', 'Saturday', '177', '24'),
(77, '2', '03:00 PM', '03:15 PM', 'Saturday', '180', '24'),
(78, '2', '03:15 PM', '03:30 PM', 'Saturday', '183', '24'),
(79, '2', '03:30 PM', '03:45 PM', 'Saturday', '186', '24'),
(80, '2', '03:45 PM', '04:00 PM', 'Saturday', '189', '24'),
(81, '2', '04:00 PM', '04:15 PM', 'Saturday', '192', '24'),
(82, '2', '04:15 PM', '04:30 PM', 'Saturday', '195', '24'),
(83, '2', '04:30 PM', '04:45 PM', 'Saturday', '198', '24'),
(84, '2', '04:45 PM', '05:00 PM', 'Saturday', '201', '24'),
(85, '2', '05:00 PM', '05:15 PM', 'Saturday', '204', '24'),
(86, '2', '05:15 PM', '05:30 PM', 'Saturday', '207', '24'),
(87, '2', '05:30 PM', '05:45 PM', 'Saturday', '210', '24'),
(88, '2', '05:45 PM', '06:00 PM', 'Saturday', '213', '24'),
(89, '1', '10:00 AM', '10:15 AM', 'Saturday', '120', '24'),
(90, '1', '10:15 AM', '10:30 AM', 'Saturday', '123', '24'),
(91, '1', '10:30 AM', '10:45 AM', 'Saturday', '126', '24'),
(92, '1', '10:45 AM', '11:00 AM', 'Saturday', '129', '24'),
(93, '1', '11:00 AM', '11:15 AM', 'Saturday', '132', '24'),
(94, '1', '11:15 AM', '11:30 AM', 'Saturday', '135', '24'),
(95, '1', '11:30 AM', '11:45 AM', 'Saturday', '138', '24'),
(96, '1', '11:45 AM', '12:00 AM', 'Saturday', '141', '24'),
(97, '1', '12:00 AM', '12:15 PM', 'Saturday', '144', '24'),
(98, '1', '12:15 PM', '12:30 PM', 'Saturday', '147', '24'),
(99, '1', '12:30 PM', '12:45 PM', 'Saturday', '150', '24'),
(100, '1', '12:45 PM', '01:00 PM', 'Saturday', '153', '24'),
(101, '1', '01:00 PM', '01:15 PM', 'Saturday', '156', '24'),
(102, '1', '01:15 PM', '01:30 PM', 'Saturday', '159', '24'),
(103, '1', '01:30 PM', '01:45 PM', 'Saturday', '162', '24'),
(104, '1', '01:45 PM', '02:00 PM', 'Saturday', '165', '24'),
(105, '1', '02:00 PM', '02:15 PM', 'Saturday', '168', '24'),
(106, '1', '02:15 PM', '02:30 PM', 'Saturday', '171', '24'),
(107, '1', '02:30 PM', '02:45 PM', 'Saturday', '174', '24'),
(108, '1', '02:45 PM', '03:00 PM', 'Saturday', '177', '24'),
(109, '1', '03:00 PM', '03:15 PM', 'Saturday', '180', '24'),
(110, '1', '03:15 PM', '03:30 PM', 'Saturday', '183', '24'),
(111, '1', '03:30 PM', '03:45 PM', 'Saturday', '186', '24'),
(112, '1', '03:45 PM', '04:00 PM', 'Saturday', '189', '24'),
(113, '1', '04:00 PM', '04:15 PM', 'Saturday', '192', '24'),
(114, '1', '04:15 PM', '04:30 PM', 'Saturday', '195', '24'),
(115, '1', '04:30 PM', '04:45 PM', 'Saturday', '198', '24'),
(116, '1', '04:45 PM', '05:00 PM', 'Saturday', '201', '24'),
(117, '1', '05:00 PM', '05:15 PM', 'Saturday', '204', '24'),
(118, '1', '05:15 PM', '05:30 PM', 'Saturday', '207', '24'),
(119, '1', '05:30 PM', '05:45 PM', 'Saturday', '210', '24'),
(120, '1', '05:45 PM', '06:00 PM', 'Saturday', '213', '24'),
(121, '1', '02:00 PM', '02:15 PM', 'Monday', '168', '24'),
(122, '1', '02:15 PM', '02:30 PM', 'Monday', '171', '24'),
(123, '1', '02:30 PM', '02:45 PM', 'Monday', '174', '24'),
(124, '1', '02:45 PM', '03:00 PM', 'Monday', '177', '24'),
(125, '1', '03:00 PM', '03:15 PM', 'Monday', '180', '24'),
(126, '1', '03:15 PM', '03:30 PM', 'Monday', '183', '24'),
(127, '1', '03:30 PM', '03:45 PM', 'Monday', '186', '24'),
(128, '1', '03:45 PM', '04:00 PM', 'Monday', '189', '24'),
(129, '1', '04:00 PM', '04:15 PM', 'Monday', '192', '24'),
(130, '1', '04:15 PM', '04:30 PM', 'Monday', '195', '24'),
(131, '1', '04:30 PM', '04:45 PM', 'Monday', '198', '24'),
(132, '1', '04:45 PM', '05:00 PM', 'Monday', '201', '24'),
(133, '1', '05:00 PM', '05:15 PM', 'Monday', '204', '24'),
(134, '1', '05:15 PM', '05:30 PM', 'Monday', '207', '24'),
(135, '1', '05:30 PM', '05:45 PM', 'Monday', '210', '24'),
(136, '1', '05:45 PM', '06:00 PM', 'Monday', '213', '24'),
(137, '9', '02:00 PM', '02:15 PM', 'Monday', '168', '24'),
(138, '9', '02:15 PM', '02:30 PM', 'Monday', '171', '24'),
(139, '9', '02:30 PM', '02:45 PM', 'Monday', '174', '24'),
(140, '9', '02:45 PM', '03:00 PM', 'Monday', '177', '24'),
(141, '9', '03:00 PM', '03:15 PM', 'Monday', '180', '24'),
(142, '9', '03:15 PM', '03:30 PM', 'Monday', '183', '24'),
(143, '9', '03:30 PM', '03:45 PM', 'Monday', '186', '24'),
(144, '9', '03:45 PM', '04:00 PM', 'Monday', '189', '24'),
(145, '9', '04:00 PM', '04:15 PM', 'Monday', '192', '24'),
(146, '9', '04:15 PM', '04:30 PM', 'Monday', '195', '24'),
(147, '9', '04:30 PM', '04:45 PM', 'Monday', '198', '24'),
(148, '9', '04:45 PM', '05:00 PM', 'Monday', '201', '24'),
(149, '9', '05:00 PM', '05:15 PM', 'Monday', '204', '24'),
(150, '9', '05:15 PM', '05:30 PM', 'Monday', '207', '24'),
(151, '9', '05:30 PM', '05:45 PM', 'Monday', '210', '24'),
(152, '9', '05:45 PM', '06:00 PM', 'Monday', '213', '24'),
(153, '1', '10:00 AM', '10:20 AM', 'Wednesday', '120', '24'),
(154, '1', '10:20 AM', '10:40 AM', 'Wednesday', '124', '24'),
(155, '1', '10:40 AM', '11:00 AM', 'Wednesday', '128', '24'),
(156, '1', '11:00 AM', '11:20 AM', 'Wednesday', '132', '24'),
(157, '1', '11:20 AM', '11:40 AM', 'Wednesday', '136', '24'),
(158, '1', '11:40 AM', '12:00 AM', 'Wednesday', '140', '24'),
(159, '1', '12:00 AM', '12:20 PM', 'Wednesday', '144', '24'),
(160, '1', '12:20 PM', '12:40 PM', 'Wednesday', '148', '24'),
(161, '1', '12:40 PM', '01:00 PM', 'Wednesday', '152', '24'),
(162, '1', '01:00 PM', '01:20 PM', 'Wednesday', '156', '24'),
(163, '1', '01:20 PM', '01:40 PM', 'Wednesday', '160', '24'),
(164, '1', '01:40 PM', '02:00 PM', 'Wednesday', '164', '24'),
(165, '1', '02:00 PM', '02:20 PM', 'Wednesday', '168', '24'),
(166, '1', '02:20 PM', '02:40 PM', 'Wednesday', '172', '24'),
(167, '1', '02:40 PM', '03:00 PM', 'Wednesday', '176', '24'),
(168, '1', '03:00 PM', '03:20 PM', 'Wednesday', '180', '24'),
(169, '1', '03:20 PM', '03:40 PM', 'Wednesday', '184', '24'),
(170, '1', '03:40 PM', '04:00 PM', 'Wednesday', '188', '24'),
(171, '1', '04:00 PM', '04:20 PM', 'Wednesday', '192', '24'),
(172, '1', '04:20 PM', '04:40 PM', 'Wednesday', '196', '24'),
(173, '1', '04:40 PM', '05:00 PM', 'Wednesday', '200', '24'),
(174, '1', '05:00 PM', '05:20 PM', 'Wednesday', '204', '24'),
(175, '1', '05:20 PM', '05:40 PM', 'Wednesday', '208', '24'),
(176, '1', '05:40 PM', '06:00 PM', 'Wednesday', '212', '24'),
(177, '1', '10:00 AM', '10:20 AM', 'Thursday', '120', '24'),
(178, '1', '10:20 AM', '10:40 AM', 'Thursday', '124', '24'),
(179, '1', '10:40 AM', '11:00 AM', 'Thursday', '128', '24'),
(180, '1', '11:00 AM', '11:20 AM', 'Thursday', '132', '24'),
(181, '1', '11:20 AM', '11:40 AM', 'Thursday', '136', '24'),
(182, '1', '11:40 AM', '12:00 AM', 'Thursday', '140', '24'),
(183, '1', '12:00 AM', '12:20 PM', 'Thursday', '144', '24'),
(184, '1', '12:20 PM', '12:40 PM', 'Thursday', '148', '24'),
(185, '1', '12:40 PM', '01:00 PM', 'Thursday', '152', '24'),
(186, '1', '01:00 PM', '01:20 PM', 'Thursday', '156', '24'),
(187, '1', '01:20 PM', '01:40 PM', 'Thursday', '160', '24'),
(188, '1', '01:40 PM', '02:00 PM', 'Thursday', '164', '24'),
(189, '1', '02:00 PM', '02:20 PM', 'Thursday', '168', '24'),
(190, '1', '02:20 PM', '02:40 PM', 'Thursday', '172', '24'),
(191, '1', '02:40 PM', '03:00 PM', 'Thursday', '176', '24'),
(192, '1', '03:00 PM', '03:20 PM', 'Thursday', '180', '24'),
(193, '1', '03:20 PM', '03:40 PM', 'Thursday', '184', '24'),
(194, '1', '03:40 PM', '04:00 PM', 'Thursday', '188', '24'),
(195, '1', '04:00 PM', '04:20 PM', 'Thursday', '192', '24'),
(196, '1', '04:20 PM', '04:40 PM', 'Thursday', '196', '24'),
(197, '1', '04:40 PM', '05:00 PM', 'Thursday', '200', '24'),
(318, '1', '01:00 PM', '01:15 PM', 'Tuesday', '156', '24'),
(319, '1', '01:15 PM', '01:30 PM', 'Tuesday', '159', '24'),
(320, '1', '01:30 PM', '01:45 PM', 'Tuesday', '162', '24'),
(321, '1', '01:45 PM', '02:00 PM', 'Tuesday', '165', '24'),
(322, '1', '02:00 PM', '02:15 PM', 'Tuesday', '168', '24'),
(323, '1', '02:15 PM', '02:30 PM', 'Tuesday', '171', '24'),
(324, '1', '02:30 PM', '02:45 PM', 'Tuesday', '174', '24'),
(325, '1', '02:45 PM', '03:00 PM', 'Tuesday', '177', '24'),
(326, '1', '03:00 PM', '03:15 PM', 'Tuesday', '180', '24'),
(327, '1', '03:15 PM', '03:30 PM', 'Tuesday', '183', '24'),
(328, '1', '03:30 PM', '03:45 PM', 'Tuesday', '186', '24'),
(329, '1', '03:45 PM', '04:00 PM', 'Tuesday', '189', '24'),
(330, '1', '04:00 PM', '04:15 PM', 'Tuesday', '192', '24'),
(331, '1', '04:15 PM', '04:30 PM', 'Tuesday', '195', '24'),
(332, '1', '04:30 PM', '04:45 PM', 'Tuesday', '198', '24'),
(333, '1', '04:45 PM', '05:00 PM', 'Tuesday', '201', '24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `hospital_ion_id` varchar(100) DEFAULT NULL,
  `plan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `hospital_ion_id`, `plan`) VALUES
(1, '127.0.0.1', 'superadmin', '$2y$08$luerakgBOp.8VrUO7k4UAuf4yDlUEd5Mmb5AEYNpGQu9SrQ8cFzde', '', 'superadmin@hms.com', '', 'eX0.Bq6nP57EuXX4hJkPHO973e7a4c25f1849d3a', 1511432365, 'zCeJpcj78CKqJ4sVxVbxcO', 1268889823, 1670930845, 1, 'Admin', 'istrator', 'ADMIN', '0', '763', ''),
(909, '49.37.209.10', 'KLINIK KENMUGI', '$2y$08$T/devQwJyaIhhBoga7kUTux83MAAlt1rwCy/3eOrfuhcB0Lgbhipe', NULL, 'admin@kenmugi.com', NULL, NULL, NULL, NULL, 1659420579, 1681908320, 1, NULL, NULL, NULL, NULL, NULL, ''),
(913, '49.37.209.10', 'Ardi', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', NULL, 'ardir@kenmugi.com', NULL, NULL, NULL, NULL, 1659427740, 1669914509, 1, NULL, NULL, NULL, NULL, '909', ''),
(914, '49.37.209.10', 'Clara', 'fa585d89c851dd338a70dcf535aa2a92fee7836dd6aff1226583e88e0996293f16bc009c652826e0fc5c706695a03cddce372f139eff4d13959da6f1f5d3eabe', NULL, 'clara@kenmugi.com', NULL, NULL, NULL, NULL, 1659427900, 1669657840, 1, NULL, NULL, NULL, NULL, '909', ''),
(915, '49.37.209.10', 'Klinik Pratama Nala ', '$2y$08$UhsPo79.wJmkwElwn52/feRUNZtmCBn03DMOFgvlnZPErJpkEeoy2', NULL, 'admin@kpratama.com', NULL, NULL, NULL, NULL, 1659439992, 1670569387, 1, NULL, NULL, NULL, NULL, NULL, ''),
(922, '14.99.217.230', 'KLINIK NURUL HUSNA', '$2y$08$bkl5HOxOcTj.oOTVW9QrieceiGtKgCehgipCJi5Xh31wpgWX.OxlC', NULL, 'admin@knh.com', NULL, NULL, NULL, NULL, 1659508900, 1670569804, 1, NULL, NULL, NULL, NULL, NULL, ''),
(924, '49.37.215.172', 'Mohammed Asif', '$2y$08$.a4JAaFBff0JE4LWzoU96Oopwx/6c/lSssOcVuptUlhJK98rHP0x2', NULL, 'george@gmail.com', NULL, NULL, NULL, NULL, 1659836750, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(925, '49.37.215.172', 'Vincy', '$2y$08$q7aZrFwpmeRAxnGyPVC3NessDvRdSZnVHbtC.n8bCZfA55OIvqSHi', NULL, 'vincy@kenmugi.com', NULL, NULL, NULL, NULL, 1659836914, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(926, '49.37.215.172', 'Aaisha', '$2y$08$ma1gfFE4fVmVGn9dHjL64ObKN3CwqeKDGWi7wwvGu/OM9xUH0RTz.', NULL, 'aisha@kenmugi.com', NULL, NULL, NULL, NULL, 1659836985, 1668591821, 1, NULL, NULL, NULL, NULL, '909', ''),
(927, '49.37.215.172', 'Aseef', '$2y$08$KFeQReg0o8miLFGtJQ96MueNv4ZYMUH4e5XN87eCrwslnUs/VB6KO', NULL, 'aseef@gmail.com', NULL, NULL, NULL, NULL, 1659857984, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(928, '49.37.215.172', 'Afrin', '$2y$08$Rd/ZFJjUVTZKXbXbLYDrtOkDBeP7SUlFRvTztzjhL12HSM9q9Fy/6', NULL, 'afrin@kenmugi.com', NULL, NULL, NULL, NULL, 1659858212, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(929, '49.37.215.172', 'Clara@kenmugi.com', '$2y$08$Oo70l81R6F60WdB06MtyweZhkUPI0PpVsKPRhfFls8iTCw1oJ2VMC', NULL, 'clara1@kenmugi.com', NULL, NULL, NULL, NULL, 1659881873, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(931, '49.37.218.26', 'Doctor1', '$2y$08$FtbIVea7CO1KJj.HDoLL7OpG60kXbMnAVvaC1DaDqTs7eXHVU/6hG', NULL, 'doctor1@gmail.com', NULL, NULL, NULL, NULL, 1661439737, NULL, 1, NULL, NULL, NULL, NULL, '930', ''),
(932, '49.37.218.26', 'doctor2', '$2y$08$hBOTWQRp.xZZjP0CS5i.GuMydPsazca2j.Y3e9ejwuwep1BajkH12', NULL, 'doctor2@gmail.com', NULL, NULL, NULL, NULL, 1661439809, NULL, 1, NULL, NULL, NULL, NULL, '930', ''),
(933, '49.37.218.26', 'Doctor3', '$2y$08$armoNdHqh5wXevDxjHe9RudNdoNhh1A85dVbkq8rE1JfgIufRH8iW', NULL, 'doctor3@gmail.com', NULL, NULL, NULL, NULL, 1661439921, NULL, 1, NULL, NULL, NULL, NULL, '930', ''),
(937, '172.70.189.89', 'Ahmad', '$2y$08$4eTU9EacPRUnrBsUXhfVWeKVgN1QBBcshQpcv873mMRnrgM8hoqSS', NULL, 'ahmad@kenmugi.com', NULL, NULL, NULL, NULL, 1663572268, 1663743034, 1, NULL, NULL, NULL, NULL, '909', ''),
(938, '162.158.227.116', 'Brayden', '$2y$08$vL25kBParkt8coN0xeLgR.CEfECGYgTd.LKXn24qXg9NHJpKwP69e', NULL, 'brayden@gmail.com', NULL, NULL, NULL, NULL, 1663587262, NULL, 1, NULL, NULL, NULL, NULL, '915', ''),
(950, '172.70.218.29', 'Test name', '$2y$08$PKvTR1Z37lu5K/6YaHlaw.h3ZUd1urfeLUpLAugkuqx/OPkkXpQ9W', NULL, 'test@gmail.com', NULL, NULL, NULL, NULL, 1667313995, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(956, '162.158.48.131', 'Martin', '$2y$08$NHZRPV7ku8OINSzCVLQGDuBI81rxXEpK5oDvJgIOVvNlFErbDFO.y', NULL, 'martin@gmail.com', NULL, NULL, NULL, NULL, 1668591536, 1668591579, 1, NULL, NULL, NULL, NULL, '909', ''),
(957, '172.70.183.162', 'Ragu', '$2y$08$BYQQVDy/XpwFr9e.chJjrOyBFFC9oMu2X9ScVrjWXV.N9mQ/piCLC', NULL, 'ragu@globytex.com', NULL, NULL, NULL, NULL, 1670257470, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(958, '162.158.54.138', 'Wilson', '$2y$08$/4mpij5HI8PjB8SI/rln0uSRm/6kB1ZgKiQ019FUGh4Pts8qjo1Q2', NULL, 'wilson@kenmugi.com', NULL, NULL, NULL, NULL, 1670298455, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(959, '172.70.142.154', 'arfis', '9b2235cdb58d04b7b312201481abd920a8ab103e8dbd79cfe9a421b64e6a5685a13ea9a14d8660d1d1d295b4412381167cc2305ff6c4a7d2ae49bd43887904be', NULL, 'muralisridhar15@gmail.com', NULL, 'Gh0HU1TJkO207e8c1bb0e96a240fe9f69395e199', 1670494978, NULL, 1670494131, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(960, '172.70.142.154', 'Jaymes', '$2y$08$NULFq9.5dGglfMZSLrbFNOdqZAOJENxqdaUTCX8QgH.vblvH4sTW2', NULL, 'jaymes@kenmugi.com', NULL, NULL, NULL, NULL, 1670494529, NULL, 1, NULL, NULL, NULL, NULL, '909', ''),
(961, '172.70.218.29', 'ATM Sehat', '$2y$08$NqU6wJA67dQ/3DYdRlmRTOamUbD627sC2FX/WwX.ReYkn8BkMgj1y', NULL, 'admin@atmsehat.com', NULL, NULL, NULL, NULL, 1670568789, 1670569970, 1, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(911, 909, 11),
(915, 913, 4),
(916, 914, 4),
(917, 915, 11),
(924, 922, 11),
(926, 924, 5),
(927, 925, 6),
(928, 926, 7),
(929, 927, 5),
(930, 928, 6),
(931, 929, 6),
(933, 931, 4),
(934, 932, 4),
(935, 933, 4),
(939, 937, 4),
(940, 938, 5),
(961, 950, 5),
(967, 956, 3),
(968, 957, 4),
(969, 958, 4),
(970, 959, 4),
(971, 960, 4),
(972, 961, 11);

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `logo` varchar(1000) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `emergency` varchar(100) DEFAULT NULL,
  `support` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `block_1_text_under_title` varchar(500) DEFAULT NULL,
  `service_block__text_under_title` varchar(500) DEFAULT NULL,
  `doctor_block__text_under_title` varchar(500) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `youtube_id` varchar(100) DEFAULT NULL,
  `skype_id` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `twitter_username` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `title`, `logo`, `address`, `phone`, `emergency`, `support`, `email`, `currency`, `block_1_text_under_title`, `service_block__text_under_title`, `doctor_block__text_under_title`, `facebook_id`, `twitter_id`, `google_id`, `youtube_id`, `skype_id`, `x`, `twitter_username`) VALUES
(1, 'Hospital Management', 'uploads/Code-Aristos-logo1.png', 'Boropool, Rajbari-77000', '+0123456789', '+0123456789', '+0123456789', 'admin@demo.com', '$', 'Best Hospital In The City', 'Aenean nibh ante, lacinia non tincidunt nec, lobortis ut tellus. Sed in porta diam.', 'We work with forward thinking clients to create beautiful, honest and amazing things that bring positive results.', 'https://www.facebook.com/rizvi.plabon', 'https://www.twitter.com/casoft', 'https://www.google.com/casoft', 'https://www.youtube.com/casoft', 'https://www.skype.com/casoft', NULL, 'codearistos');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `doctor_id` varchar(20) NOT NULL,
  `hospital_id` varchar(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `doctor_id`, `hospital_id`, `status`, `created_at`) VALUES
(1, 2, '', '26', 'added', '2022-08-07 22:08:35'),
(2, 2, '', '27', 'added', '2022-08-07 22:08:40'),
(3, 1, '', '28', 'added', '2022-08-30 14:57:03'),
(4, 1, '3', '', 'added', '2022-09-01 04:56:11'),
(5, 2, '', '28', 'added', '2022-09-05 11:42:58'),
(6, 2, '', '24', 'added', '2022-09-05 11:43:04'),
(7, 1, '', '24', 'added', '2022-09-07 06:33:38'),
(8, 1, '', '36', 'added', '2022-09-09 19:46:40'),
(9, 38, '', '28', 'added', '2022-11-19 13:51:14'),
(10, 9, '14', '', 'added', '2022-12-09 15:38:23'),
(11, 1, '11', '', 'added', '2022-12-20 06:13:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alloted_bed`
--
ALTER TABLE `alloted_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_patient`
--
ALTER TABLE `app_patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `app_user`
--
ALTER TABLE `app_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autoemailshortcode`
--
ALTER TABLE `autoemailshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autoemailtemplate`
--
ALTER TABLE `autoemailtemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autosmsshortcode`
--
ALTER TABLE `autosmsshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autosmstemplate`
--
ALTER TABLE `autosmstemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankb`
--
ALTER TABLE `bankb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_category`
--
ALTER TABLE `bed_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `covid_vaccine`
--
ALTER TABLE `covid_vaccine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_report`
--
ALTER TABLE `doctor_report`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital`
--
ALTER TABLE `hospital`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorist`
--
ALTER TABLE `laboratorist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_category`
--
ALTER TABLE `lab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manualemailshortcode`
--
ALTER TABLE `manualemailshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manualsmsshortcode`
--
ALTER TABLE `manualsmsshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_email_template`
--
ALTER TABLE `manual_email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_sms_template`
--
ALTER TABLE `manual_sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_settings`
--
ALTER TABLE `meeting_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `on_board`
--
ALTER TABLE `on_board`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_payment`
--
ALTER TABLE `ot_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_history_log`
--
ALTER TABLE `patient_history_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_material`
--
ALTER TABLE `patient_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_summary`
--
ALTER TABLE `patient_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentgateway`
--
ALTER TABLE `paymentgateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_report`
--
ALTER TABLE `scan_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `scan_types`
--
ALTER TABLE `scan_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialist`
--
ALTER TABLE `specialist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `alloted_bed`
--
ALTER TABLE `alloted_bed`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- AUTO_INCREMENT for table `app_patient`
--
ALTER TABLE `app_patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `app_user`
--
ALTER TABLE `app_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `autoemailshortcode`
--
ALTER TABLE `autoemailshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `autoemailtemplate`
--
ALTER TABLE `autoemailtemplate`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=492;

--
-- AUTO_INCREMENT for table `autosmsshortcode`
--
ALTER TABLE `autosmsshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `autosmstemplate`
--
ALTER TABLE `autosmstemplate`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `bankb`
--
ALTER TABLE `bankb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=673;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bed_category`
--
ALTER TABLE `bed_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `covid_vaccine`
--
ALTER TABLE `covid_vaccine`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `doctor_report`
--
ALTER TABLE `doctor_report`
  MODIFY `report_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `hospital`
--
ALTER TABLE `hospital`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `laboratorist`
--
ALTER TABLE `laboratorist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `manualemailshortcode`
--
ALTER TABLE `manualemailshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `manualsmsshortcode`
--
ALTER TABLE `manualsmsshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manual_email_template`
--
ALTER TABLE `manual_email_template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manual_sms_template`
--
ALTER TABLE `manual_sms_template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=588;

--
-- AUTO_INCREMENT for table `meeting_settings`
--
ALTER TABLE `meeting_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `on_board`
--
ALTER TABLE `on_board`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ot_payment`
--
ALTER TABLE `ot_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `patient_history_log`
--
ALTER TABLE `patient_history_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=645;

--
-- AUTO_INCREMENT for table `patient_material`
--
ALTER TABLE `patient_material`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `patient_summary`
--
ALTER TABLE `patient_summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=187;

--
-- AUTO_INCREMENT for table `paymentgateway`
--
ALTER TABLE `paymentgateway`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=191;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `scan_report`
--
ALTER TABLE `scan_report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `scan_types`
--
ALTER TABLE `scan_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=255;

--
-- AUTO_INCREMENT for table `specialist`
--
ALTER TABLE `specialist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `time_schedule`
--
ALTER TABLE `time_schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=346;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=962;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=973;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
