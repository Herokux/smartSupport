-- phpMyAdmin SQL Dump
-- version 4.6.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Aug 14, 2016 at 04:41 AM
-- Server version: 5.6.31
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartsupport`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` varchar(36) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `company` varchar(30) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `company`, `entry_date`) VALUES
('57af3342-0d70-444a-b4a2-59c8501a7f2d', 'Ashim', 'Qwhi', 'asdf', '2016-08-13 14:48:34'),
('57b04847-b980-4f8a-8967-0fc0501a7f2d', 'Ashim', 'aa', 'New', '2016-08-14 10:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `client_messages`
--

CREATE TABLE `client_messages` (
  `id` varchar(36) NOT NULL,
  `customer_token_id` varchar(36) NOT NULL,
  `clientside_token_id` varchar(36) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `client_messages`
--

INSERT INTO `client_messages` (`id`, `customer_token_id`, `clientside_token_id`, `message`, `sender`, `date_created`) VALUES
('57b04485-f288-45df-af7b-078b501a7f2d', '1471169656', '05080b23815686bc2307', 'Hi', 'client', '2016-08-14 10:14:29'),
('57b044e6-eb94-4505-8afb-0d16501a7f2d', '1471169656', '05080b23815686bc2307', 'aa', 'client', '2016-08-14 10:16:06'),
('57b0450c-e010-4318-9569-0e7e501a7f2d', '1471169791', '6f1857e90a87f35869bf', 'hi', 'client', '2016-08-14 10:16:44'),
('57b045f6-ce98-44fa-96ac-1189501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'Hi', 'client', '2016-08-14 10:20:38'),
('57b045fe-16e8-4afb-9935-102a501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'Oi', 'customer', '2016-08-14 10:20:46'),
('57b0460a-1184-48f0-97a4-08be501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'hello', 'client', '2016-08-14 10:20:58'),
('57b04634-4608-4b9c-89f8-7bce501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'ola', 'customer', '2016-08-14 10:21:40'),
('57b04640-af80-4770-8808-0ce0501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'ola', 'customer', '2016-08-14 10:21:52'),
('57b04679-72c8-4ad4-b8fc-078b501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'Olá', 'customer', '2016-08-14 10:22:49'),
('57b046e1-7660-4d8c-97b7-0d16501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'Hi', 'client', '2016-08-14 10:24:33'),
('57b046ed-8780-4529-97e2-0fc0501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'Hello', 'client', '2016-08-14 10:24:45'),
('57b046ff-e8a4-4465-8ef9-1189501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'hello', 'client', '2016-08-14 10:25:03'),
('57b04707-715c-4dfc-b426-1189501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'hello', 'client', '2016-08-14 10:25:11'),
('57b04711-bc08-4753-99bc-08be501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'hello', 'client', '2016-08-14 10:25:21'),
('57b04797-c874-414e-9068-0e7e501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'It\'s very hot today', 'client', '2016-08-14 10:27:35'),
('57b047d0-acd4-4be5-b382-0d16501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'Today is very hot', 'customer', '2016-08-14 10:28:32'),
('57b0505d-b308-4a23-add0-1876501a7f2d', '1471172609', '9aaaf043a3dab698623f', 'Hi', 'client', '2016-08-14 11:05:01'),
('57b05078-01ec-4de0-b00b-0d16501a7f2d', '1471172609', '9aaaf043a3dab698623f', 'good', 'customer', '2016-08-14 11:05:28'),
('57b051c7-ece8-433e-8a2a-7bce501a7f2d', '1471172059', '2b3a2ea85c21b8cd791f', 'aa', 'client', '2016-08-14 11:11:03'),
('57b051f3-9bf4-42d6-ae1c-1874501a7f2d', '1471171838', 'fbf4090922ebb93deffa', 'Hi', 'client', '2016-08-14 11:11:47'),
('57b0521a-fa9c-4383-9302-078b501a7f2d', '1471173136', 'd5f671b9c53bd36b053f', 'Hi', 'client', '2016-08-14 11:12:26'),
('57b05221-8e68-47b7-950f-1875501a7f2d', '1471173136', 'd5f671b9c53bd36b053f', 'xx', 'customer', '2016-08-14 11:12:33'),
('57b0526a-9e64-4814-a0ea-078b501a7f2d', '1471173214', '78a23766f4a9914fab0d', 'Hi', 'client', '2016-08-14 11:13:46'),
('57b0526d-a038-40a1-9ef7-0d16501a7f2d', '1471173214', '78a23766f4a9914fab0d', 'Hi', 'customer', '2016-08-14 11:13:49'),
('57b052a8-e7cc-4f44-9e30-1874501a7f2d', '1471173282', 'ce30cb1696a1bdbe3c9a', 'aa', 'client', '2016-08-14 11:14:48'),
('57b052a9-f394-45ac-9da8-1a57501a7f2d', '1471173282', 'ce30cb1696a1bdbe3c9a', 'aaa', 'client', '2016-08-14 11:14:49'),
('57b052ae-026c-4692-89ea-1a5c501a7f2d', '1471173282', 'ce30cb1696a1bdbe3c9a', 'Hi', 'customer', '2016-08-14 11:14:54'),
('57b0580b-ac64-4950-9146-1874501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'Hi', 'client', '2016-08-14 11:37:47'),
('57b05817-ff68-482c-8713-1874501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'How are you?', 'client', '2016-08-14 11:37:59'),
('57b05820-0508-481b-b764-1874501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'Can you hear me?', 'client', '2016-08-14 11:38:08'),
('57b0583b-a1b8-45f4-a9ce-1a5b501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'Ekute', 'customer', '2016-08-14 11:38:35');

-- --------------------------------------------------------

--
-- Table structure for table `customer_details`
--

CREATE TABLE `customer_details` (
  `id` varchar(36) NOT NULL,
  `client_id` varchar(36) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `language` varchar(10) NOT NULL,
  `assigned` varchar(36) NOT NULL DEFAULT 'none',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_details`
--

INSERT INTO `customer_details` (`id`, `client_id`, `name`, `email`, `language`, `assigned`, `date_created`) VALUES
('1471167334', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashim', 'aa@gmail.com', 'en', '570994b54c02af567ef4', '2016-08-14 09:35:33'),
('1471167437', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'as', 'ashim@gmail.com', 'en', '570994b54c02af567ef4', '2016-08-14 09:37:17'),
('1471167557', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'as', 'ashim@gmail.com', 'pt', '51cac7e2a8e979a315b5', '2016-08-14 09:39:17'),
('1471167629', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'As', 'ashim@gmail.com', 'pt', '83aca048cb210322a400', '2016-08-14 09:40:28'),
('1471167829', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'a', 'aa@gmail.com', 'pt', 'c2efc48cce02096695b8', '2016-08-14 09:43:49'),
('1471167902', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'as', 'ashim@gmail.com', 'pt', '7d775b8dcf84865dfc64', '2016-08-14 09:45:01'),
('1471168217', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashim', 'ashim@gmail.com', 'pt', '00d35a2d7957d5dd4409', '2016-08-14 09:50:16'),
('1471168756', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'as', 'aa@gmail.com', 'pt', '331c966415cecfbb6adb', '2016-08-14 09:59:15'),
('1471168913', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'as', 'ashim@gmail.com', 'pt', '1617d0449963b73be16c', '2016-08-14 10:01:52'),
('1471169465', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'ashi', 'ashim@gmail.com', 'pt', '2a298e83c8fc5eadc549', '2016-08-14 10:11:05'),
('1471169656', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashim', 'ashim@gmail.com', 'pt', '05080b23815686bc2307', '2016-08-14 10:14:16'),
('1471169791', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'ashim', 'ashim@gmail.com', 'pt', '6f1857e90a87f35869bf', '2016-08-14 10:16:31'),
('1471170028', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'as', 'ashim@gmail.com', 'pt', 'b7b905b1d0ad11978c09', '2016-08-14 10:20:27'),
('1471170260', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashim', 'aa@gmail.com', 'ja', 'b7b905b1d0ad11978c09', '2016-08-14 10:24:20'),
('1471171838', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashima', 'ashim@gmail.com', 'pt', 'fbf4090922ebb93deffa', '2016-08-14 10:50:38'),
('1471172059', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashim', 'aa@gmail.com', 'hi', '2b3a2ea85c21b8cd791f', '2016-08-14 10:54:19'),
('1471172609', '57af31e8-cadc-4d40-9673-59ec501a7f2d', '1994', 'ashimrajkonwar@gmail.com', 'pt', '9aaaf043a3dab698623f', '2016-08-14 11:03:29'),
('1471173136', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashim', 'ashim@gmail.com', 'ar', 'd5f671b9c53bd36b053f', '2016-08-14 11:12:16'),
('1471173214', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'ashim', 'ashim@gmail.com', 'en', '78a23766f4a9914fab0d', '2016-08-14 11:13:34'),
('1471173282', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'aa', 'aa@gmail.com', 'en', 'ce30cb1696a1bdbe3c9a', '2016-08-14 11:14:41'),
('1471174575', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Ashim', 'ashim@gmail.com', 'pt', '6bb5bfe348da9a920e8c', '2016-08-14 11:36:14'),
('1471174619', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Rahul', 'xyz@gmail.com', 'hi', 'none', '2016-08-14 11:36:58'),
('1471174654', '57af3287-030c-4bb6-9c1a-271c501a7f2d', 'User', 'a@gmail.com', 'en', 'none', '2016-08-14 11:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `customer_messages`
--

CREATE TABLE `customer_messages` (
  `id` varchar(36) NOT NULL,
  `customer_token_id` varchar(36) NOT NULL,
  `clientside_token_id` varchar(36) NOT NULL,
  `message` text NOT NULL,
  `sender` varchar(20) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_messages`
--

INSERT INTO `customer_messages` (`id`, `customer_token_id`, `clientside_token_id`, `message`, `sender`, `date_created`) VALUES
('57b04487-280c-48ba-984b-078b501a7f2d', '1471169656', '05080b23815686bc2307', 'Oi', 'client', '2016-08-14 10:14:31'),
('57b04489-9404-4d6b-9a53-1189501a7f2d', '1471169656', '05080b23815686bc2307', 'Oi', 'customer', '2016-08-14 10:14:33'),
('57b044b1-efb8-41e8-9be4-08be501a7f2d', '1471169656', '05080b23815686bc2307', 'aaaa', 'customer', '2016-08-14 10:15:13'),
('57b044e2-0d24-4b12-bca2-7b08501a7f2d', '1471169656', '05080b23815686bc2307', 'yo', 'customer', '2016-08-14 10:16:02'),
('57b044e7-0370-47cb-a697-0d16501a7f2d', '1471169656', '05080b23815686bc2307', 'aa', 'client', '2016-08-14 10:16:07'),
('57b0450c-7018-4201-a854-078b501a7f2d', '1471169791', '6f1857e90a87f35869bf', 'oi', 'client', '2016-08-14 10:16:44'),
('57b04510-4ea8-4884-b092-7b08501a7f2d', '1471169791', '6f1857e90a87f35869bf', 'oi', 'customer', '2016-08-14 10:16:48'),
('57b0451d-24f0-4b7d-b4f1-7b08501a7f2d', '1471169791', '6f1857e90a87f35869bf', 'oi', 'customer', '2016-08-14 10:17:01'),
('57b0453c-e0a4-4b64-acdc-0fc0501a7f2d', '1471169791', '6f1857e90a87f35869bf', 'oi', 'customer', '2016-08-14 10:17:32'),
('57b04571-01ac-40cb-bace-0ce0501a7f2d', '1471169791', '6f1857e90a87f35869bf', 'aa', 'customer', '2016-08-14 10:18:25'),
('57b04578-33d0-442f-b891-7198501a7f2d', '1471169791', '6f1857e90a87f35869bf', 'hh', 'customer', '2016-08-14 10:18:32'),
('57b045f8-3da8-4e84-b338-08be501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'Oi', 'client', '2016-08-14 10:20:40'),
('57b045fc-42b8-4880-b77a-7b08501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'Oi', 'customer', '2016-08-14 10:20:44'),
('57b0460a-5b68-47c1-8d11-08be501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'olá', 'client', '2016-08-14 10:20:58'),
('57b04634-4030-43dd-bb83-7b08501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'ola', 'customer', '2016-08-14 10:21:40'),
('57b0463f-88c0-47cf-a27c-7b08501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'ola', 'customer', '2016-08-14 10:21:51'),
('57b04679-8c28-40f5-8b71-078b501a7f2d', '1471170028', 'b7b905b1d0ad11978c09', 'Olá', 'customer', '2016-08-14 10:22:49'),
('57b046e3-ebe4-48d9-8c83-7198501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'Hi', 'client', '2016-08-14 10:24:35'),
('57b046ee-791c-481c-a014-08be501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'Hello', 'client', '2016-08-14 10:24:46'),
('57b046ff-1774-4d4a-9dd4-1189501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'hello', 'client', '2016-08-14 10:25:03'),
('57b04707-93b0-4bf4-b8d3-08be501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'hello', 'client', '2016-08-14 10:25:11'),
('57b04711-92c4-4908-b79e-102a501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'hello', 'client', '2016-08-14 10:25:21'),
('57b04799-d9ac-47db-9f27-0e7e501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', 'でも、今日', 'client', '2016-08-14 10:27:37'),
('57b047ce-6ac0-4f20-ab29-0d16501a7f2d', '1471170260', 'b7b905b1d0ad11978c09', '今天是非常热', 'customer', '2016-08-14 10:28:30'),
('57b05061-2f4c-4f57-a5f6-15e3501a7f2d', '1471172609', '9aaaf043a3dab698623f', 'Oi', 'client', '2016-08-14 11:05:05'),
('57b05076-f4f0-471e-9b37-0fc0501a7f2d', '1471172609', '9aaaf043a3dab698623f', 'good', 'customer', '2016-08-14 11:05:26'),
('57b051c9-444c-45f5-a628-0fc0501a7f2d', '1471172059', '2b3a2ea85c21b8cd791f', 'ए. ए.', 'client', '2016-08-14 11:11:05'),
('57b051f3-cb14-44e0-9613-15e3501a7f2d', '1471171838', 'fbf4090922ebb93deffa', 'Oi', 'client', '2016-08-14 11:11:47'),
('57b0521b-e904-4589-a6c8-1874501a7f2d', '1471173136', 'd5f671b9c53bd36b053f', 'مرحبا', 'client', '2016-08-14 11:12:27'),
('57b05220-1104-43ee-b2e3-7198501a7f2d', '1471173136', 'd5f671b9c53bd36b053f', 'xx', 'customer', '2016-08-14 11:12:32'),
('57b0526a-a820-4d23-97df-0ce0501a7f2d', '1471173214', '78a23766f4a9914fab0d', 'Hi', 'client', '2016-08-14 11:13:46'),
('57b0526d-e448-4093-b588-0d16501a7f2d', '1471173214', '78a23766f4a9914fab0d', 'Hi', 'customer', '2016-08-14 11:13:49'),
('57b052a8-8a20-488f-8050-1874501a7f2d', '1471173282', 'ce30cb1696a1bdbe3c9a', 'aa', 'client', '2016-08-14 11:14:48'),
('57b052aa-8f44-45ce-9712-153c501a7f2d', '1471173282', 'ce30cb1696a1bdbe3c9a', 'aaa', 'client', '2016-08-14 11:14:50'),
('57b052ad-4060-438a-b38e-1a5c501a7f2d', '1471173282', 'ce30cb1696a1bdbe3c9a', 'Hi', 'customer', '2016-08-14 11:14:53'),
('57b0580d-8144-4fc6-903a-1874501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'Oi', 'client', '2016-08-14 11:37:49'),
('57b05818-34ac-4964-a254-1874501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'Como você está?', 'client', '2016-08-14 11:38:00'),
('57b05820-c02c-4072-b349-1876501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'Você pode me ouvir?', 'client', '2016-08-14 11:38:08'),
('57b05839-33b4-4504-a2c2-1ca5501a7f2d', '1471174575', '6bb5bfe348da9a920e8c', 'Ekute', 'customer', '2016-08-14 11:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` char(36) NOT NULL,
  `type` varchar(30) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `username`, `password`, `active`) VALUES
('57af31e8-cadc-4d40-9673-59ec501a7f2d', 'Client', 'ashim1994@gmail.com', '8f8e8955974db74cb886cf92d3b4c6d2fa902713', 1),
('57af3287-030c-4bb6-9c1a-271c501a7f2d', 'Client', 'ashimrajkonwar@gmail.com', '3dbabe532d81a31bc5a1b438b85c0780c7350f23', 1),
('57af32e8-b5c4-464e-92f5-6f30501a7f2d', 'Client', 'ashimrajkonwarclient@gmail.com', '3dbabe532d81a31bc5a1b438b85c0780c7350f23', 1),
('57af3342-0d70-444a-b4a2-59c8501a7f2d', 'Client', 'ashimrajkonwaqqqrclient@gmail.com', '3dbabe532d81a31bc5a1b438b85c0780c7350f23', 1),
('57b04847-b980-4f8a-8967-0fc0501a7f2d', 'Client', 'ashim1990@gmail.com', '3dbabe532d81a31bc5a1b438b85c0780c7350f23', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_messages`
--
ALTER TABLE `client_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_details`
--
ALTER TABLE `customer_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_messages`
--
ALTER TABLE `customer_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
