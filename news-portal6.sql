-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 29, 2020 at 10:35 PM
-- Server version: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-portal6`
--

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `position` enum('home1','home2','home3','home4','home5','home6','detail1','detail2','detail3','detail4','detail5','detail6') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'active',
  `added_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `summary`, `image`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(2, 'Politics', 'This is politics category', 'Category-20200426050539864.png', 'active', 1, '2020-04-19 13:08:39', '2020-04-26 17:05:39'),
(3, 'News', 'This is news', 'Category-2020041901121524.png', 'active', 1, '2020-04-19 13:12:15', '2020-04-26 17:06:26'),
(4, 'Sports', 'This is sports', 'Category-20200422081616282.png', 'active', 1, '2020-04-20 10:34:26', '2020-04-26 17:06:50'),
(5, 'Health', 'This is health', 'Category-20200422081725535.png', 'active', 1, '2020-04-22 08:16:46', '2020-04-26 17:07:09'),
(6, 'Entertainment', 'This is entertainment', 'Category-20200426050741868.png', 'active', 1, '2020-04-22 13:44:23', '2020-04-26 17:07:41'),
(7, 'Business', 'This is business', 'Category-20200426050806348.png', 'active', 1, '2020-04-26 17:08:06', NULL),
(8, 'International', 'This is international', 'Category-20200426050834695.png', 'active', 1, '2020-04-26 17:08:34', NULL),
(9, 'Technology', 'This is technology', 'Category-20200426050858345.png', 'active', 1, '2020-04-26 17:08:58', NULL),
(10, 'Interview', 'This is interview', 'Category-20200426050922623.png', 'active', 1, '2020-04-26 17:09:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `added_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `title`, `summary`, `image`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Sunt deleniti sed e', 'Sequi voluptas minim', 'Gallery-20200424095132705.png', 'active', 1, '2020-04-24 09:51:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) DEFAULT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `image`) VALUES
(1, 1, 'Gallery-20200424095132434.png'),
(2, 1, 'Gallery-20200424095132853.png'),
(3, 1, 'Gallery-20200424095132581.png'),
(4, 1, 'Gallery-20200424095132414.png'),
(5, 1, 'Gallery-20200424095132971.png'),
(6, 1, 'Gallery-20200424095132178.png'),
(7, 1, 'Gallery-20200424095132727.png'),
(8, 1, 'Gallery-20200424095132481.png');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location` text COLLATE utf8mb4_unicode_ci,
  `news_date` date DEFAULT NULL,
  `source` text COLLATE utf8mb4_unicode_ci,
  `is_featured` tinyint(1) DEFAULT '0',
  `state` enum('all','state1','state2','state3','state4','state5','state6','state7') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reporter_id` int(11) DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `added_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `cat_id`, `summary`, `description`, `image`, `location`, `news_date`, `source`, `is_featured`, `state`, `reporter_id`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(4, 'Itâ€™s already late April', 4, 'Itâ€™s already late April, but why is Kathmandu cold?', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 26&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The maximum temperature in Kathmandu was recorded at 24.8 degrees Celsius on Saturday. This is around 3 degrees colder than this day last year. According to the records of the Department of Hydrology and Meteorology, the maximum temperature was measured at around 27 degrees Celsius on April 25, 2019.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;According to senior meteorologist Mani Ratna Shakya, the temperature has dropped due to the pre-monsoon rains. He says that the snowfall along with the rain has also forced the mercury to plummet.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Meteorologists believe that the closure of factories and businesses due to the lockdown has minimal impact on the temperature change.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu had 5 mm of rain on Saturday. When it rains, the level of humidity in the air increases.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;According to climate analyst Ngamindra Dahal, cold winds continue even in the pre-monsoon. &ldquo;At this time, the wind is blowing from the north-west to the south,&rdquo; Dahal says, &ldquo;It is the same wind that has made Kathmandu feel cold.&rdquo;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;In Nepal, the monsoon usually starts from mid-June every year, but the monsoon rains are warmer.&lt;/p&gt;', 'News-20200426013815881.png', 'Ut praesentium aperi', '1991-11-08', 'Odit ipsam quis dolo', 0, 'state2', 4, 'active', 1, '2020-04-26 13:38:15', '2020-04-26 15:26:25'),
(5, 'Didnâ€™t advise PM Oli to resign', 2, 'Didnâ€™t advise PM Oli to resign: Gautam', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 26&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The ruling Nepal Communist Party&rsquo;s vice-chairperson Bamdev Gautam has commented that some media wrongly reported the contents of his discussion with the party chairman, Prime Minister KP Sharma Oli, on Saturday.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;He has suggested that he did not advise Oli to resign as reported in the media.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;In his statement on Sunday, Gautam says he, however, suggested that the party chair should immediately call meetings of the party&rsquo;s secretariat and standing committee as demanded by various leaders of the party in the wake of recent political controversies.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;&ldquo;Even after the annulment of two ordinances, there are many problems in the party,&rdquo; the influential leader&rsquo;s statement reads, &ldquo;These problems cannot be solved by bypassing the party and party committees. The prime minister should directly discuss the issues and face all kinds of thoughts.&rdquo;&lt;/p&gt;', 'News-20200426013959528.png', 'Butwal', '1204-12-12', 'Kantipur', 0, 'state1', 2, 'active', 1, '2020-04-26 13:39:59', NULL),
(6, 'Birgunj woman who had tested positive in coronavirus RDT dies', 2, 'Birgunj woman who had tested positive in coronavirus RDT dies yesterday.', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 26&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The maximum temperature in Kathmandu was recorded at 24.8 degrees Celsius on Saturday. This is around 3 degrees colder than this day last year. According to the records of the Department of Hydrology and Meteorology, the maximum temperature was measured at around 27 degrees Celsius on April 25, 2019.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;According to senior meteorologist Mani Ratna Shakya, the temperature has dropped due to the pre-monsoon rains. He says that the snowfall along with the rain has also forced the mercury to plummet.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Meteorologists believe that the closure of factories and businesses due to the lockdown has minimal impact on the temperature change.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu had 5 mm of rain on Saturday. When it rains, the level of humidity in the air increases.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;According to climate analyst Ngamindra Dahal, cold winds continue even in the pre-monsoon. &ldquo;At this time, the wind is blowing from the north-west to the south,&rdquo; Dahal says, &ldquo;It is the same wind that has made Kathmandu feel cold.&rdquo;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;In Nepal, the monsoon usually starts from mid-June every year, but the monsoon rains are warmer.&lt;/p&gt;', 'News-20200426014108976.png', 'Deleniti molestias l', '1974-07-17', 'Error non labore dol', 0, 'state5', 4, 'active', 1, '2020-04-26 13:41:08', '2020-04-26 16:43:33'),
(7, 'Nepali Congress demands repatriation of migrant workers', 5, 'Nepali Congress demands repatriation of migrant workers to leave', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 26&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The main opposition party, Nepali Congress, has demanded that the government repatriate the Nepali migrant workers who have been stranded abroad due to the global coronavirus crisis.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Dila Sangraula, the leader assigned to look after labour and employment portfolio in the shadow cabinet of the main opposition, handed over a memorandum to the Minister for Labour, Employment and Social Security Rameshwar Raya Yadav on Sunday, putting forth the demand.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Sangraula also reminded the minister that over 100 bodies of Nepalis died due to various causes have been stuck abroad and told him to bring them home as soon as possible.&lt;/p&gt;', 'News-20200426014215938.png', 'Consequuntur eum qui', '2015-10-27', 'Ab dolor officiis re', 0, 'state1', 2, 'active', 1, '2020-04-26 13:42:16', '2020-04-26 16:49:48'),
(8, 'Bardiya on high alert as workers', 6, 'Bardiya on high alert as workers who recently left district tested positive for coronavirus', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 26&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Health and security officials of Bardiya district in Province 5 have tightened security measures and needful precautions in the district as two Indian workers who had left the district recently tested positive for the coronavirus in their home country.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The workers of a crusher plant in Rajapur municipality of the district had gone to India on April 17 defying the lockdown restrictions. Now, they have tested positive for the virus in India, according to the officials.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The neighbouring Bahraich district authorities had written a letter to the Jamunaha Area Police Office in Bake district on Friday, informing the infection. Consequently, the security personnel in the district have tightened surveillance at and around the crusher plant, according to Bardiya&rsquo;s Chief District Officer Prem Lal Lamichhane.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Following the confirmation of infection in the two, the officials collected swab samples of all workers of the plant, but none tested positive, he informs.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Whereas concerned Nepali officials are clueless about how the two workers made it to India amidst the lockdown, the Bahraich administration has informed that they had gone to India on April 17. Three days after the entry, they were tested positive for the infection.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Meanwhile, a Nepali man from the district has been founded infected in India. The local of Thakurbaba municipality has been quarantined in the southern neighbour.&lt;/p&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;', 'News-20200426014336234.png', 'Elit voluptates rem', '1988-01-02', 'Voluptas at in digni', 0, 'state1', 2, 'active', 1, '2020-04-26 13:43:36', '2020-04-26 16:49:30'),
(9, 'Covid-19 crisis:', 4, 'Quia molCovid-19 crisis: Govt reports malaria infection in quarantined Nepalis\r\nestiae id o', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 25&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The government of Nepal says some people quarantined in different parts of the country to control the coronavirus outbreak in the country have tested positive for malaria.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Speaking in his daily press briefing on Saturday afternoon, the spokesperson at the Ministry of Health and Population, Bikas Devkota said the government was concerned about their health. He, however, did not reveal details of the malaria-infected patients including how many of them are affected in which specific places.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;He said the concerned authorities should enhance the standard of quarantine sites to protect them from all such diseases.&lt;/p&gt;', 'News-20200426045137321.png', 'Labore consectetur', '2011-09-26', 'Elit sint animi e', 0, 'state2', 4, 'active', 1, '2020-04-26 16:51:14', '2020-04-26 16:51:37'),
(10, 'Suspend transportation', 5, 'Suspend transportation, but resume factories: Gandaki CM tells centre', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Pokhara, April 25&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Gandaki Chief Minister Prithvi Subba Gurung has demanded that the government resume construction and production works although the lockdown is extended again.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Gurung telephoned the coordinator of the high-level committee to control the coronavirus outbreak, Deputy Prime Minister Ishwar Pokharel, on Saturday and extended his suggestion.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;&ldquo;We will mobilise construction workers following code of conduct. We have also prepared a guideline to import and manage construction materials,&rdquo; Gurung reportedly told Pokharel, &ldquo;Likewise, the factories manufacturing foodstuffs should be opened. We should import the essentials by controlling the risk of infection.&rdquo;&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;He urged the federal government to strictly monitor the border movement assuring the provincial governments were competent enough to take necessary precautions in their jurisdictions. He claimed that his province was a green zone now as both the Covid-19 patients there have achieved recovery now.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;According to Gurung, the lockdown restrictions should be relaxed in safer areas though the nationwide lockdown gets extended.&lt;/p&gt;', 'News-20200426045302108.png', 'Omnis illo temporibu', '1974-03-04', 'Earum non nihil dict', 1, 'state6', 2, 'active', 1, '2020-04-26 16:53:02', NULL),
(11, 'Panel tells govt to extend Nepal lockdown again', 4, 'Panel tells govt to extend Nepal lockdown again from today', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 25&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The high-level committee to control the coronavirus outbreak in the country has concluded that the outbreak is still under control due to the lockdown imposed since March 24.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Citing the number of cases in all the places except in Udayapur is relatively low, the committee views the lockdown has been effective. Consequently, the committee has recommended that the government extend it further, a minister, who is also a member of the committee, informs.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Therefore, it is very likely that the government will extend the lockdown in its next meeting either on Sunday or Monday.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The lockdown, extended for the last time, is in effect till Monday.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Earlier on Friday, the cabinet had directed the high-level committee to discuss whether to extend the lockdown and make a recommendation to the government.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;&ldquo;We are on the right track,&rdquo; Narayan Bidari, a secretary at the Office of the Prime Minister, who is also a member of the committee says, &ldquo;But we also need to consider the situation of neighbouring countries. Now, the council of ministers will decide whether to extend it and if yes, how long.&rdquo;&lt;/p&gt;', 'News-20200426045408875.png', 'Officia nostrum aut', '1975-01-09', 'Commodi aspernatur p', 1, 'state3', 2, 'active', 1, '2020-04-26 16:54:08', NULL),
(12, 'Kaala movie review:', 4, 'Kaala movie review: Itâ€™s a film for people, but Rajniâ€™s presence is just a bonus', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;South Indian movies being screened in a Kathmandu multiplex is a rare site. &amp;nbsp;Apart from Bahubali, not many have done well when shown to the public. But at a time when Nepali movies aren&rsquo;t doing good business, bringing Rajnikant starrer Kaala seems like a no brainer.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The movie revolves around Kaala (Rajnikant), the don who rules one of the slums of Mumbai named Dharavi. Due to its central location, many builders want to take over the land and promise the people migrated from Tamil Nadu new houses. But the story takes a turn when Kaala sees the plans of these builders and opposes them. This makes him a prime target of the builders and a local politician Hari Dada (Nana Patekar) who want to eliminate him in order to get the land.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The first half of the movie is engaging and intense. It focuses on how we believe that by destroying, we can develop a case that has been seen here in Nepal too. It shows the hardships of the people who live in the slum. It&amp;nbsp;shows how the people are brainwashed into selling their houses in return for fake promises.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The second half, even though it has a lot of action, is less engaging than the first as the audience can predict most of what is to come. The ending is a bit confusing and could have been better but the movie does end on a positive note giving the audience plenty to think about.&lt;/p&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;', 'News-20200426045536726.png', 'Quam repudiandae par', '1974-06-17', 'Asperiores quia odio', 0, 'state5', 2, 'active', 1, '2020-04-26 16:55:36', NULL),
(13, 'Hari movie review:', 3, 'Hari movie review: This artistic experiment may not sell in cheesy market', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;For a second week running, Nepali movie lovers have been treated with a movie that producers hardly consider making. Producers normally make movies which are either funny or are full of cheesy love stories because they know that these movies will sell and their investment is safe.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Breaking that trend, filmmakers have come up with a different movie which is sure to give the audience a new experience.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The movie Hari revolves around Bishnu Hari (Bipin Karki), a religious man in his early 30s who lives with his mother Parvati (Sunita Thakur). Hari&rsquo;s life is pretty laid back as he has no worries, apart from his receding hairline and an oversmart colleague at work. The story takes a turn a bird &lsquo;shits&rsquo; on his head, which also brings bad luck to his life.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The first half of the movie establishes Hari as the lead character. It gives the audience an insight into Hari&rsquo;s monotonous life and his family history. Like the trailer, it&rsquo;s abrupt and fails to answer many questions. Apart from a few jokes, the half is not very engaging as there is a feel that something big is going to happen in the second half of the film.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The second half though is just a continuation of the slow first half which fails to grab the audience&rsquo;s attention but does get better with its various twists and turns. The fact that the directors have connected the characters helps the audience make sense of this playlike movie.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Bipin Karki, the star of this movie, had said this movie gave him artistic pleasure and he has done his role justice. He&rsquo;s almost ever present in all scenes as he has played five roles in the movie, but there are times one feels he has performed better when not being Hari. The movie starts and ends with him and if you&rsquo;re not his fan, you best not watch the movie.&lt;/p&gt;', 'News-20200426045642257.png', 'Doloremque quo rem e', '2018-09-02', 'In incidunt est se', 1, 'state2', 4, 'active', 1, '2020-04-26 16:56:42', NULL),
(14, 'Sunkesari Movie Review:', 2, 'Sunkesari Movie Review: A misfired macabre', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;There was a lot of hype surrounding Sunkesari but the movie has failed to live up to that hype mainly because of its poor storyline and script.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Having watched the producers and actors promote the movie so vigorously, many would have thought the movie would change the way people look at Nepali movies. But after watching Sunkesari the audience would have realised that Nepali movies disappoint more often than others.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The &lsquo;horror&rsquo; movie is set in a mansion-turned-boutique-hotel in Australia where Sunkesari (Reecha Sharma) goes to take a break from her sad life. Yadav (Rabindra Jha) a housemaid is the only person in the huge mansion which seems to be haunted. Soon Sunkesari is joined by two more guests Rupen (Sunny Dhakal) and Emma (Lauren Lofberg) after which strange paranormal events begin to unfold.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The start of the movie is abrupt, clich&eacute;d and fails to give context. The start is decent but the writer and director Arpan Thapa fails to explain what is happening and why it is happening.&amp;nbsp;The first half gradually gets better thanks to Rabindra Jha&rsquo;s acting but the filmmakers have failed to scare the audience even though&amp;nbsp;they have used loud sounds and spooky background sound.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The second half of the film has been rushed. With a runtime of 1 hour and 30 minutes, the movie fails to explain a number of things such as the background story of Rupen and Sunkesari.&lt;/p&gt;&lt;div&gt;&lt;br&gt;&lt;/div&gt;', 'News-20200426045811184.png', 'A labore itaque expe', '2011-06-21', 'Natus modi consectet', 0, 'state6', 2, 'active', 1, '2020-04-26 16:57:08', '2020-04-26 16:58:11'),
(15, 'Nepali Congress demands repatriation of migrant workers', 6, 'Nepali Congress demands repatriation of migrant workers recently', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 26&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The main opposition party, Nepali Congress, has demanded that the government repatriate the Nepali migrant workers who have been stranded abroad due to the global coronavirus crisis.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Dila Sangraula, the leader assigned to look after labour and employment portfolio in the shadow cabinet of the main opposition, handed over a memorandum to the Minister for Labour, Employment and Social Security Rameshwar Raya Yadav on Sunday, putting forth the demand.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Sangraula also reminded the minister that over 100 bodies of Nepalis died due to various causes have been stuck abroad and told him to bring them home as soon as possible.&lt;/p&gt;', 'News-20200426045952442.png', 'Facere ad doloribus', '2013-12-17', 'Quo laborum Recusan', 1, 'state5', 4, 'active', 1, '2020-04-26 16:59:52', NULL),
(16, 'Govt to prioritise employment generation', 5, 'Govt to prioritise employment generation in new budget plan', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 25&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Estimating that more than one million people in the country will lose their jobs due to the Covid-19 pandemic, the government is preparing to prioritise employment generation in its annual budget plan for the next fiscal year.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;As per the constitutional provision, the government will have to present the plan for the new fiscal year beginning mid-July, in Parliament on May 28. Officials in the Ministry of Finance have already begun preparations to draft the plan.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Whereas the Ministry of Labour, Employment and Social Security was focused on employment generation to provide social protection to the underprivileged in the past years, the officials there have now begun devising new concepts to address the current crisis.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;This time, the government also has to address concerns of thousands of Nepalis who are likely to return home from various countries as they will lose their jobs due to the crisis. Recently, the government has estimated that around 300,000 Nepali migrants&amp;nbsp;&lt;a href=&quot;https://english.onlinekhabar.com/covid-19-crisis-around-300000-nepali-migrants-preparing-to-return-home.html&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 17.92px; vertical-align: baseline; color: rgb(14, 83, 154); display: inline-block;&quot;&gt;will return home&lt;/a&gt;&amp;nbsp;soon.&lt;/p&gt;', 'News-20200426050046875.png', 'Ratione eos ex debit', '2017-06-20', 'Do veritatis dolores', 1, 'state6', 2, 'active', 1, '2020-04-26 17:00:46', NULL),
(17, 'Private sector urges government to contribute 50%', 2, 'Private sector urges government to contribute 50% to labourersâ€™ wage', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 24&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The private sector has drawn the attention of the government on the impact of Covid-19 pandemic and the lockdown on the country&rsquo;s economy.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;It has urged the government to provide 50 per cent of the money they need to pay the workers as a grant.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The office-bearers of the Federation of Nepalese Chambers of Commerce and Industry (FNCCI), the Confederation of Nepalese Industries (CNI), and Nepal Chamber of Commerce (NCC) held discussions with the government&rsquo;s Chief Secretary Lok Darshan Regmi to that connection on Thursday.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;During the meeting, the private sector representatives urged the government to rescue the industry, commerce, and business sectors from the adverse impact of the coronavirus pandemic.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;&ldquo;Industries and factories in the country are on the verge of closure due to the lockdown. The supply system has also been hit hard and the national economy is also dented in such a situation,&rdquo; the office-bearers of the country&rsquo;s three big chambers of commerce and industry reported to the chief secretary, urging the government to create an environment for reviving the economy.&lt;/p&gt;', 'News-2020042605013664.png', 'Provident eaque quo', '1989-11-06', 'Minim vel eos suscip', 1, 'state3', 2, 'active', 1, '2020-04-26 17:01:36', NULL),
(18, 'NAC slashes salary of pilots for the 2nd time', 3, 'NAC slashes salary of pilots for the 2nd time in lockdown', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 22&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The national flag carrier Nepal Airlines Corporation has slashed the salary of pilots for the second time since the country went on a complete lockdown to control the coronavirus outbreak in the country in the last week of March.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The salary of foreign pilots has been slashed by 50 per cent whereas that of Nepali pilots on contract by 33 per cent. Earlier, the corporation had forced the foreign pilots to take unpaid leave for two weeks and Nepali pilots for two weeks.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Likewise, 166 air hostesses appointed on the contract basis were also forced to stay on leave unpaid, for 10 days.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Meanwhile, the pilots who have been stranded abroad will lose 66 per cent of their pay.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;A decision regarding the pay cut was made on Sunday, according to the corporation&rsquo;s spokesperson Archana Khadka.&lt;/p&gt;&lt;hr style=&quot;margin: 0px; font-family: Poppins, sans-serif; padding: 0px;&quot;&gt;&lt;br&gt;', 'News-20200426050244630.png', 'Nulla et et sint sol', '2019-01-31', 'Ad eius nisi enim od', 1, 'state7', 4, 'active', 1, '2020-04-26 17:02:44', NULL),
(19, 'Public Accounts Committee to probe medical equipment', 5, 'Public Accounts Committee to probe medical equipment purchase deal', '&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Kathmandu, April 26&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The Public Accounts Committee in Parliament has launched an investigation into alleged irregularities in an agreement made between the government and a private company named Omni Group for the purchase of medical equipment needed to control the coronavirus outbreak.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;The government had assigned the company to import various medical equipment from China last month. However, after media and social media users complained of irregularities, the deal was&amp;nbsp;&lt;a href=&quot;https://english.onlinekhabar.com/govt-annuls-controversial-medical-equipment-purchase-deal.html&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-size: 17.92px; vertical-align: baseline; color: rgb(14, 83, 154); display: inline-block;&quot;&gt;scrapped&lt;/a&gt;. The company had already brought its first consignment then.&lt;/p&gt;&lt;p style=&quot;margin-right: 0px; margin-bottom: 10px; margin-left: 0px; font-family: Poppins, sans-serif; padding: 0px; border: 0px; font-size: 1.12em; vertical-align: baseline; line-height: 1.9; max-width: inherit !important;&quot;&gt;Considering the controversies, the House panel has sent a letter to the Ministry of Finance today, directing it to submit all documents related to the deal in the next seven days.&lt;/p&gt;', 'News-20200426050348588.png', 'Quia eveniet beatae', '2018-05-14', 'Et cumque deserunt e', 1, 'state2', 4, 'active', 1, '2020-04-26 17:03:48', NULL),
(20, 'Minim reprehenderit', 4, 'At accusamus et qui', '', 'News-20200429094341399.png', 'Vitae eum quaerat ev', '2009-09-04', 'Exercitationem molli', 1, 'state1', 2, 'active', 1, '2020-04-29 09:43:41', NULL),
(21, 'Et quidem dolorem qu', 10, 'Nihil error dolorum', '', 'News-20200429094400550.png', 'Magna eos facere mi', '2018-01-13', 'Quis quia et soluta', 0, 'state3', 4, 'active', 1, '2020-04-29 09:44:00', NULL),
(22, 'Rerum eos non dolor', 6, 'Ullam cupiditate nis', '', 'News-20200429094422256.png', 'Et magni sit laboru', '2005-12-20', 'Facilis laborum sint', 1, 'state1', 2, 'active', 1, '2020-04-29 09:44:22', NULL),
(23, 'Cum quis tempora qui', 4, 'Numquam facilis omni', '', 'News-20200429122423905.png', 'Quia non debitis dol', '2015-05-23', 'Ipsa rerum ex delec', 0, 'state3', 4, 'active', 1, '2020-04-29 12:24:23', NULL),
(24, 'Nostrud quibusdam do', 4, 'Sit fugiat labore se', '', 'News-20200429122448285.png', 'Aute deserunt dolore', '1990-10-06', 'Repudiandae cupidita', 1, 'state6', 2, 'active', 1, '2020-04-29 12:24:48', NULL),
(25, 'Magna aut cum aut no', 4, 'At et alias repellen', '', 'News-20200429122509262.png', 'Labore sit quis comm', '2003-10-10', 'In occaecat quis eum', 1, 'state7', 4, 'active', 1, '2020-04-29 12:25:09', NULL),
(26, 'Non dolor recusandae', 4, 'Aperiam est consecte', '', 'News-2020042912253039.png', 'Culpa ipsa laborio', '1982-09-24', 'Facere quod est dele', 0, 'state6', 4, 'active', 1, '2020-04-29 12:25:30', NULL),
(27, 'Et nihil totam adipi', 4, 'Labore unde qui saep', '', 'News-20200429122556971.png', 'Ea ea a officia aut', '2017-06-07', 'Cumque distinctio D', 0, 'state4', 4, 'active', 1, '2020-04-29 12:25:56', NULL),
(28, 'Quisquam earum repre', 6, 'Quas quam nulla corp', '', 'News-202004290228081.png', 'Omnis nisi tempore', '2008-02-04', 'Ut eius corporis est', 1, 'state2', 2, 'active', 1, '2020-04-29 14:28:08', NULL),
(29, 'Cillum sunt rem fac', 8, 'Placeat vel est do', '', NULL, 'Tempor nostrud totam', '1989-05-27', 'Veniam a incidunt', 0, 'state7', 4, 'active', 1, '2020-04-29 14:42:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` enum('admin','reporter') COLLATE utf8mb4_unicode_ci DEFAULT 'reporter',
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'news-portal6@gmail.com', '$2y$10$d7VS1iMfEWDZiTjyIQ8j6uhXZyr9mdb0xpdhiQGubD2.b8rlEFbwm', 'sPPrcfHHk6G8eYIsRMDeoEltJt6n5SoUxIRrPlJF08r6Vbk1wBCKaWqPYwdxc8WChcgXsGrwqBcMbkxba9UC8TSa1pWu09Qx53Ls', 'admin', 'active', '2020-04-12 12:29:35', '2020-04-29 19:24:13'),
(2, 'Reporter', 'reporternews-portal6@gmail.com', '$2y$10$C2QvjR0z/mVYlHvHpBZ6AeGn0ZhKrdAX8afJ/lSVdf8e/neF771Yu', '', 'reporter', 'active', '2020-04-12 12:29:35', '2020-04-23 22:25:11'),
(4, 'Gillian Fulton', 'xucafyl@mailinator.net', '$2y$10$wwTeKKamY/LuzA8KmQdWgO1TL0fzEAUrvm71LF3.ivy.z2lvYWMX2', NULL, 'reporter', 'inactive', '2020-04-23 22:05:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci,
  `summary` text COLLATE utf8mb4_unicode_ci,
  `link` text COLLATE utf8mb4_unicode_ci,
  `video_id` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT 'inactive',
  `added_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `summary`, `link`, `video_id`, `status`, `added_by`, `created_at`, `updated_at`) VALUES
(2, 'hello sarkar', 'hello world', 'https://www.youtube.com/watch?v=Zscnwgo-0w0', 'Zscnwgo-0w0', 'active', 1, '2020-04-23 11:45:16', '2020-04-26 10:44:08'),
(3, 'Eum irure laboris ha', 'Ea eum assumenda vol', 'https://www.youtube.com/watch?v=QOTvTIQG_ec', 'QOTvTIQG_ec', 'active', 1, '2020-04-26 10:48:12', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_id` (`gallery_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cat_id` (`cat_id`),
  ADD KEY `reporter_id` (`reporter_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `galleries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`reporter_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
