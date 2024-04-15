-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2024 at 04:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maritimhub`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement_histories`
--

CREATE TABLE `achievement_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `award_name` varchar(200) NOT NULL,
  `appreciator` varchar(200) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_level` varchar(200) NOT NULL,
  `achieved_at` date NOT NULL,
  `order_column` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achievement_histories`
--

INSERT INTO `achievement_histories` (`id`, `uuid`, `user_id`, `award_name`, `appreciator`, `event_name`, `event_level`, `achieved_at`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '9034b3b5-fb3a-4157-b5b8-01be02261338', 3, 'March Hare said to.', 'Father William,\'.', 'Hatter began, in.', 'CHAPTER VIII. The.', '2016-08-23', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(2, 'e7b77244-a8ca-4152-a766-32d889dfa266', 1, 'Adventures, till.', 'There was no time.', 'Duchess said in a.', 'However, she soon.', '1970-07-19', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, '13382625-0b96-4696-94c1-3b63e01ea095', 3, 'For some minutes.', 'Alice, \'but I must.', 'Mouse was swimming.', 'Hatter, and, just.', '2003-02-03', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, '3791f198-baf1-4c78-b176-388f4191cf46', 3, 'Hatter. He came in.', 'Rabbit came near.', 'And beat him when.', 'Alice, jumping up.', '1974-09-26', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(5, '3429935a-2b17-436e-8df5-8bb4cf451b82', 3, 'ALL RETURNED FROM.', 'Seven flung down.', 'I am, sir,\' said.', 'In the very tones.', '2007-12-12', 4, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(6, '9e02b9e5-1ed3-47e2-a525-2b527f50a173', 3, 'March Hare said to.', 'Alice. \'Off with.', 'Alice. \'Why, there.', 'Wonderland, though.', '1998-08-29', 5, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(7, '33eb6a96-554a-4c29-9887-f2ab0e7a6520', 3, 'King, who had been.', 'Mouse heard this.', 'For this must be a.', 'Good-bye, feet!\'.', '1993-05-14', 6, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(8, '7956219b-b660-4ae5-a86c-3238d94e3090', 3, 'Mock Turtle said.', 'Alice was not easy.', 'This question the.', 'After a while she.', '2001-03-20', 7, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(9, 'a94f6206-a8f2-42c2-ac1d-2b1fd374a577', 2, 'Pigeon, but in a.', 'Some of the hall.', 'But, now that I\'m.', 'Gryphon remarked.', '2003-08-01', 1, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, 'edc84f76-32f3-4877-8664-c89de8cf792a', 2, 'Mouse\'s tail; \'but.', 'Everything is so.', 'Alice again. \'No.', 'Alice, \'to speak.', '1987-01-08', 2, '2024-03-28 11:05:33', '2024-03-28 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `log_name` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `subject_type` varchar(255) DEFAULT NULL,
  `event` varchar(255) DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `causer_type` varchar(255) DEFAULT NULL,
  `causer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`properties`)),
  `batch_uuid` char(36) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'created', 'App\\Models\\User', 'created', 1, NULL, NULL, '{\"attributes\":{\"name\":\"Zainal Hasan\",\"gender\":9,\"email\":\"mail@zhanang.id\",\"email_verified_at\":\"2024-03-28T04:05:31.000000Z\",\"password\":\"$2y$10$3iMrVT3YTkNTcTNCUFpXkO9R5ZNcl4wvb6aeCnXOzbjmkpD\\/NQMjq\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":1,\"first_expertise_id\":1,\"second_expertise_id\":2,\"permanent_address\":\"Quas et qui at numquam fuga occaecati et. Velit sunt eos ut exercitationem cupiditate.\",\"residence_address\":\"Corrupti deserunt est qui. Repudiandae rerum voluptatem ratione vero.\",\"bio\":\"Quaerat nobis nostrum aut consequuntur ab. Ipsum ullam voluptate alias omnis.\",\"locale\":null,\"is_admin\":true}}', NULL, '2024-03-28 11:05:31', '2024-03-28 11:05:31'),
(2, 'default', 'created', 'App\\Models\\User', 'created', 2, NULL, NULL, '{\"attributes\":{\"name\":\"Elian Wuckert\",\"gender\":2,\"email\":\"kmorar@example.net\",\"email_verified_at\":\"2024-03-28T04:05:31.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":30,\"first_expertise_id\":15,\"second_expertise_id\":7,\"permanent_address\":\"Nostrum perspiciatis magni culpa voluptatum. Possimus dolorem ducimus nulla non ex.\",\"residence_address\":\"Inventore qui qui quia magni. Soluta asperiores id atque omnis et ut dolor. Esse ut rerum optio.\",\"bio\":\"Laborum in et perferendis. Est quidem officiis quia est perspiciatis voluptas numquam. Ut at suscipit voluptatibus eum ducimus consequuntur ut. Saepe nisi vero illo dolorum dicta voluptatem.\",\"locale\":\"id\",\"is_admin\":false}}', NULL, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, 'default', 'created', 'App\\Models\\User', 'created', 3, NULL, NULL, '{\"attributes\":{\"name\":\"River Kemmer\",\"gender\":1,\"email\":\"earnestine54@example.org\",\"email_verified_at\":\"2024-03-28T04:05:32.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"Alice for protection. \'You shan\'t be able! I shall ever see such a very interesting dance to watch,\' said Alice, \'a great girl like you,\' (she might well say that \\\"I see what I like\\\"!\' \'You might.\",\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":17,\"first_expertise_id\":3,\"second_expertise_id\":6,\"permanent_address\":\"Eum voluptas unde vel quisquam. Ut fugit veritatis fuga voluptates doloribus non.\",\"residence_address\":\"Ex corrupti ipsa dolorem expedita. Facere harum possimus quia ad.\",\"bio\":\"Voluptas explicabo quam quo quos eum. Consequatur quia dolorum accusantium ut ut inventore labore. Et pariatur doloribus voluptas accusantium error aliquam expedita voluptas.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, 'default', 'created', 'App\\Models\\User', 'created', 4, NULL, NULL, '{\"attributes\":{\"name\":\"Arvel Kiehn\",\"gender\":2,\"email\":\"maeve64@example.org\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":null,\"date_of_birth\":\"1986-01-10T00:00:00.000000Z\",\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":34,\"first_expertise_id\":19,\"second_expertise_id\":7,\"permanent_address\":\"Quos animi excepturi fugit voluptate quam. Est provident at qui non. Quis rem vitae qui et.\",\"residence_address\":\"Quia in ex quia optio. Maxime neque placeat rerum molestias nihil et necessitatibus tenetur.\",\"bio\":\"Debitis nulla ea iure. Et consequatur dolor numquam dolores dolore. Sunt assumenda dolorem earum quia. Quod qui enim error quasi fuga cumque.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(5, 'default', 'created', 'App\\Models\\User', 'created', 5, NULL, NULL, '{\"attributes\":{\"name\":\"Cyrus Nienow\",\"gender\":1,\"email\":\"lew.bayer@example.com\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"Alice, as the Caterpillar contemptuously. \'Who are YOU?\' said the Pigeon. \'I\'m NOT a serpent!\' said Alice to herself, \'Why, they\'re only a pack of cards, after all. \\\"--SAID I COULD NOT SWIM--\\\" you.\",\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":23,\"first_expertise_id\":5,\"second_expertise_id\":15,\"permanent_address\":\"Suscipit in sequi incidunt quod quo ut. Qui reprehenderit veniam delectus assumenda reiciendis.\",\"residence_address\":\"Libero illum aliquid cupiditate beatae. Rerum est molestiae quis voluptas quibusdam.\",\"bio\":\"Cumque esse ut quisquam. Possimus ut aut est repudiandae quidem. Et omnis voluptatem esse quisquam aut reiciendis.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(6, 'default', 'created', 'App\\Models\\User', 'created', 6, NULL, NULL, '{\"attributes\":{\"name\":\"Rocio Wolf\",\"gender\":9,\"email\":\"hmurray@example.org\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":null,\"date_of_birth\":\"1991-01-05T00:00:00.000000Z\",\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":15,\"first_expertise_id\":18,\"second_expertise_id\":10,\"permanent_address\":\"Aspernatur qui distinctio aut placeat sint accusamus omnis ut. Sit deserunt rerum eaque aut rerum.\",\"residence_address\":\"Sed ut temporibus quidem ut fuga. Sed cumque et voluptas. Minima at delectus quis quaerat quod.\",\"bio\":\"Ut eos fugit harum ipsam et nihil. Voluptas ut dolores ratione facilis repudiandae voluptas vero sint. Ipsam quae et qui impedit recusandae architecto consequuntur.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(7, 'default', 'created', 'App\\Models\\User', 'created', 7, NULL, NULL, '{\"attributes\":{\"name\":\"Alberto Durgan\",\"gender\":0,\"email\":\"earnestine.gorczany@example.com\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"Long Tale They were just beginning to grow up any more HERE.\' \'But then,\' thought Alice, \'shall I NEVER get any older than I am very tired of swimming about here, O Mouse!\' (Alice thought this a.\",\"date_of_birth\":\"1997-09-13T00:00:00.000000Z\",\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":13,\"first_expertise_id\":24,\"second_expertise_id\":5,\"permanent_address\":\"Consequuntur unde hic minima. Illum consequatur voluptatem aut. Odio qui et facere unde.\",\"residence_address\":\"Ut eum aut itaque ut. Ut a totam beatae labore. Alias eaque eos libero ab placeat.\",\"bio\":\"Rem molestias eum voluptatem eos id. Distinctio qui accusamus consequuntur illum temporibus. Dolores vel quo et voluptas tenetur in non. Ullam hic facilis minima adipisci quod voluptatem eveniet ea.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(8, 'default', 'created', 'App\\Models\\User', 'created', 8, NULL, NULL, '{\"attributes\":{\"name\":\"Kaya Pfeffer\",\"gender\":0,\"email\":\"rpredovic@example.org\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":null,\"date_of_birth\":\"2014-08-14T00:00:00.000000Z\",\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":26,\"first_expertise_id\":23,\"second_expertise_id\":4,\"permanent_address\":\"Qui vitae magnam delectus cum suscipit. Sint veniam rerum omnis qui recusandae necessitatibus sit.\",\"residence_address\":\"Sunt voluptatum pariatur id facilis ipsam sunt. Quidem quis ipsum libero qui mollitia voluptatem.\",\"bio\":\"Sint consequatur aut modi labore id. Sit praesentium nihil animi totam omnis.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(9, 'default', 'created', 'App\\Models\\User', 'created', 9, NULL, NULL, '{\"attributes\":{\"name\":\"Nya Hayes\",\"gender\":0,\"email\":\"sokon@example.org\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":null,\"date_of_birth\":\"1979-07-02T00:00:00.000000Z\",\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":19,\"first_expertise_id\":25,\"second_expertise_id\":16,\"permanent_address\":\"Non libero aliquid odit a. Et ut dolor autem nobis amet ab. Eius odit dolorem quis enim.\",\"residence_address\":\"Qui libero pariatur voluptatem ut minima enim. Error culpa eveniet aut est.\",\"bio\":\"Ut soluta labore sed ducimus. Quia autem et ducimus aperiam quaerat. Molestiae id incidunt voluptas quam quis dolorem voluptate. Modi rerum quo excepturi.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, 'default', 'created', 'App\\Models\\User', 'created', 10, NULL, NULL, '{\"attributes\":{\"name\":\"Geo Hessel\",\"gender\":9,\"email\":\"sawayn.adonis@example.com\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"ARE you talking to?\' said one of the Mock Turtle drew a long breath, and said anxiously to herself, \'it would have appeared to them she heard a voice sometimes choked with sobs, to sing \\\"Twinkle.\",\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":21,\"first_expertise_id\":15,\"second_expertise_id\":21,\"permanent_address\":\"Et incidunt deleniti nam debitis corrupti beatae dolores. Qui id voluptatem beatae omnis ut.\",\"residence_address\":\"Minima ratione quas est quo labore blanditiis voluptas. Iusto accusantium et quos.\",\"bio\":\"Ea deleniti voluptatem quaerat laborum suscipit quasi. Perferendis est debitis nihil est non dolore repellendus. Porro sequi repudiandae et.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(11, 'default', 'created', 'App\\Models\\User', 'created', 11, NULL, NULL, '{\"attributes\":{\"name\":\"Kailyn Wintheiser\",\"gender\":0,\"email\":\"stark.emmanuelle@example.org\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"Hatter. \'You might just as I get it home?\' when it saw Alice. It looked good-natured, she thought: still it had come back and see how the Dodo could not possibly reach it: she could not make out.\",\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":18,\"first_expertise_id\":21,\"second_expertise_id\":12,\"permanent_address\":\"Voluptatum ut cumque cum enim. Dolorem necessitatibus aperiam pariatur aut.\",\"residence_address\":\"Ut quisquam iste facilis eveniet. Sapiente deserunt voluptates similique.\",\"bio\":\"Nisi quia inventore dolor impedit odio. Ut nemo est at. Magni officia eos tenetur tempora.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(12, 'default', 'created', 'App\\Models\\User', 'created', 12, NULL, NULL, '{\"attributes\":{\"name\":\"Chandler Kutch\",\"gender\":2,\"email\":\"west.amy@example.org\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"I give you fair warning,\' shouted the Queen. \'Can you play croquet with the words \'DRINK ME,\' but nevertheless she uncorked it and put back into the earth. Let me see: I\'ll give them a railway.\",\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":18,\"first_expertise_id\":1,\"second_expertise_id\":13,\"permanent_address\":\"Perferendis qui in consequuntur et et ut quo. Perspiciatis aut deserunt laudantium quis.\",\"residence_address\":\"Sint id modi eum maiores qui. Quia ullam minus rem.\",\"bio\":\"Sed voluptates officia voluptatem id vitae culpa deserunt. Veritatis laborum et ipsam sed culpa. Ut vel non quidem quas quasi voluptas quis.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(13, 'default', 'created', 'App\\Models\\User', 'created', 13, NULL, NULL, '{\"attributes\":{\"name\":\"Yoga\",\"gender\":1,\"email\":\"yoga19201@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$sZRd9W6wknoZufcT9RBwHuZpexzncNREHiLN2JBmfiE1zDjwCnghO\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":null,\"instagram_profile\":null,\"province_id\":3,\"first_expertise_id\":null,\"second_expertise_id\":null,\"permanent_address\":null,\"residence_address\":null,\"bio\":null,\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:06:28', '2024-03-28 11:06:28'),
(14, 'default', 'updated', 'App\\Models\\User', 'updated', 13, 'App\\Models\\User', 13, '{\"attributes\":{\"email_verified_at\":\"2024-03-28T04:07:26.000000Z\"},\"old\":{\"email_verified_at\":null}}', NULL, '2024-03-28 11:07:26', '2024-03-28 11:07:26'),
(15, 'default', 'deleted', 'App\\Models\\User', 'deleted', 7, 'App\\Models\\User', 13, '{\"old\":{\"name\":\"Alberto Durgan\",\"gender\":0,\"email\":\"earnestine.gorczany@example.com\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"Long Tale They were just beginning to grow up any more HERE.\' \'But then,\' thought Alice, \'shall I NEVER get any older than I am very tired of swimming about here, O Mouse!\' (Alice thought this a.\",\"date_of_birth\":\"1997-09-13T00:00:00.000000Z\",\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":13,\"first_expertise_id\":24,\"second_expertise_id\":5,\"permanent_address\":\"Consequuntur unde hic minima. Illum consequatur voluptatem aut. Odio qui et facere unde.\",\"residence_address\":\"Ut eum aut itaque ut. Ut a totam beatae labore. Alias eaque eos libero ab placeat.\",\"bio\":\"Rem molestias eum voluptatem eos id. Distinctio qui accusamus consequuntur illum temporibus. Dolores vel quo et voluptas tenetur in non. Ullam hic facilis minima adipisci quod voluptatem eveniet ea.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:08:43', '2024-03-28 11:08:43'),
(16, 'default', 'deleted', 'App\\Models\\User', 'deleted', 11, 'App\\Models\\User', 13, '{\"old\":{\"name\":\"Kailyn Wintheiser\",\"gender\":0,\"email\":\"stark.emmanuelle@example.org\",\"email_verified_at\":\"2024-03-28T04:05:33.000000Z\",\"password\":\"$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC\\/.og\\/at2.uheWG\\/igi\",\"place_of_birth\":\"Hatter. \'You might just as I get it home?\' when it saw Alice. It looked good-natured, she thought: still it had come back and see how the Dodo could not possibly reach it: she could not make out.\",\"date_of_birth\":null,\"linkedin_profile\":\"https:\\/\\/www.linkedin.com\\/in\\/user\",\"instagram_profile\":\"https:\\/\\/instagram.com\\/user\",\"province_id\":18,\"first_expertise_id\":21,\"second_expertise_id\":12,\"permanent_address\":\"Voluptatum ut cumque cum enim. Dolorem necessitatibus aperiam pariatur aut.\",\"residence_address\":\"Ut quisquam iste facilis eveniet. Sapiente deserunt voluptates similique.\",\"bio\":\"Nisi quia inventore dolor impedit odio. Ut nemo est at. Magni officia eos tenetur tempora.\",\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-28 11:59:17', '2024-03-28 11:59:17'),
(17, 'default', 'updated', 'App\\Models\\User', 'updated', 8, 'App\\Models\\User', 13, '{\"attributes\":{\"gender\":1},\"old\":{\"gender\":0}}', NULL, '2024-03-28 12:14:30', '2024-03-28 12:14:30'),
(18, 'default', 'created', 'App\\Models\\User', 'created', 14, NULL, NULL, '{\"attributes\":{\"name\":\"marcel\",\"gender\":1,\"email\":\"marcrlinoferdinan@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$9gKN3bVyls526i0ZCo1J6.4d6m3zfCCg06DAQX98mk2GM2NhgsNhG\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":null,\"instagram_profile\":null,\"province_id\":7,\"first_expertise_id\":null,\"second_expertise_id\":null,\"permanent_address\":null,\"residence_address\":null,\"bio\":null,\"locale\":null,\"is_admin\":false}}', NULL, '2024-03-30 21:52:06', '2024-03-30 21:52:06'),
(19, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"0000001\"},\"old\":{\"uid\":\"070024111\"}}', NULL, '2024-04-01 10:23:34', '2024-04-01 10:23:34'),
(20, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"0000002\"},\"old\":{\"uid\":\"0000001\"}}', NULL, '2024-04-01 10:28:49', '2024-04-01 10:28:49'),
(21, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"0000023\"},\"old\":{\"uid\":\"0000002\"}}', NULL, '2024-04-01 10:29:48', '2024-04-01 10:29:48'),
(22, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"00121212\"},\"old\":{\"uid\":\"0000023\"}}', NULL, '2024-04-01 10:30:31', '2024-04-01 10:30:31'),
(23, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"00121000\"},\"old\":{\"uid\":\"00121212\"}}', NULL, '2024-04-01 10:32:14', '2024-04-01 10:32:14'),
(24, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"00121001\"},\"old\":{\"uid\":\"00121000\"}}', NULL, '2024-04-01 10:33:31', '2024-04-01 10:33:31'),
(25, 'default', 'updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":1},\"old\":{\"is_admin\":0}}', NULL, '2024-04-01 10:55:15', '2024-04-01 10:55:15'),
(26, 'default', 'created', 'App\\Models\\User', 'created', 15, NULL, NULL, '{\"attributes\":{\"name\":\"dzaki\",\"gender\":1,\"email\":\"ucupnapis47@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$CGLc5lWFCsAx.KNuM4sV1OOLmQrmHrBMLqm24LoKO0HDBJ88fStku\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":null,\"instagram_profile\":null,\"province_id\":5,\"first_expertise_id\":null,\"second_expertise_id\":null,\"permanent_address\":null,\"residence_address\":null,\"bio\":null,\"locale\":null,\"is_admin\":0,\"uid\":null}}', NULL, '2024-04-01 10:57:56', '2024-04-01 10:57:56'),
(27, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"00121002\"},\"old\":{\"uid\":\"00121001\"}}', NULL, '2024-04-01 11:03:08', '2024-04-01 11:03:08'),
(28, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 13, '{\"attributes\":{\"uid\":\"00121012\"},\"old\":{\"uid\":\"00121002\"}}', NULL, '2024-04-01 11:04:58', '2024-04-01 11:04:58'),
(29, 'default', 'created', 'App\\Models\\User', 'created', 17, NULL, NULL, '{\"attributes\":{\"name\":\"daaaa\",\"gender\":1,\"email\":\"daaaa@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$BqFBaCrl3ArvJA1jI\\/iNKuU5RMpZ9arqeRvS0CWW7IWdlmsm63md2\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":null,\"instagram_profile\":null,\"province_id\":1,\"first_expertise_id\":null,\"second_expertise_id\":null,\"permanent_address\":null,\"residence_address\":null,\"bio\":null,\"locale\":null,\"is_admin\":0,\"uid\":null}}', NULL, '2024-04-02 11:20:22', '2024-04-02 11:20:22'),
(30, 'default', 'created', 'App\\Models\\User', 'created', 18, NULL, NULL, '{\"attributes\":{\"name\":\"aakdkadwa\",\"gender\":2,\"email\":\"aakdkadwa@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$nMOb8JFnJXf2NukWaBbk5.VCVohN8NvfK.0mFlNGeae\\/UYf1nbtyK\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":null,\"instagram_profile\":null,\"province_id\":1,\"first_expertise_id\":null,\"second_expertise_id\":null,\"permanent_address\":null,\"residence_address\":null,\"bio\":null,\"locale\":null,\"is_admin\":0,\"uid\":null}}', NULL, '2024-04-02 11:21:05', '2024-04-02 11:21:05'),
(31, 'default', 'created', 'App\\Models\\User', 'created', 19, NULL, NULL, '{\"attributes\":{\"name\":\"aakdkadwaaakdkadwa\",\"gender\":1,\"email\":\"aakdkadwaaakdkadwa@gmail.com\",\"email_verified_at\":null,\"password\":\"$2y$10$IPsD2luGGrta\\/jubWNZ4SOL9aNT9fp9kq4UTwVuQV8HN9jsNH9X2u\",\"place_of_birth\":null,\"date_of_birth\":null,\"linkedin_profile\":null,\"instagram_profile\":null,\"province_id\":1,\"first_expertise_id\":null,\"second_expertise_id\":null,\"permanent_address\":null,\"residence_address\":null,\"bio\":null,\"locale\":null,\"is_admin\":0,\"uid\":null}}', NULL, '2024-04-02 11:21:35', '2024-04-02 11:21:35'),
(32, 'default', 'updated', 'App\\Models\\User', 'updated', 13, 'App\\Models\\User', 13, '{\"attributes\":{\"first_expertise_id\":1,\"second_expertise_id\":16},\"old\":{\"first_expertise_id\":null,\"second_expertise_id\":null}}', NULL, '2024-04-02 12:09:01', '2024-04-02 12:09:01'),
(33, 'default', 'updated', 'App\\Models\\User', 'updated', 14, 'App\\Models\\User', 14, '{\"attributes\":{\"first_expertise_id\":1,\"second_expertise_id\":17},\"old\":{\"first_expertise_id\":null,\"second_expertise_id\":null}}', NULL, '2024-04-02 12:28:14', '2024-04-02 12:28:14'),
(34, 'default', 'updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":2},\"old\":{\"is_admin\":1}}', NULL, '2024-04-03 13:50:38', '2024-04-03 13:50:38'),
(35, 'default', 'updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":0},\"old\":{\"is_admin\":2}}', NULL, '2024-04-03 13:51:04', '2024-04-03 13:51:04'),
(36, 'default', 'updated', 'App\\Models\\User', 'updated', 1, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":1},\"old\":{\"is_admin\":0}}', NULL, '2024-04-03 13:51:14', '2024-04-03 13:51:14'),
(37, 'default', 'updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":0},\"old\":{\"is_admin\":1}}', NULL, '2024-04-03 14:45:27', '2024-04-03 14:45:27'),
(38, 'default', 'updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":2},\"old\":{\"is_admin\":0}}', NULL, '2024-04-03 14:45:33', '2024-04-03 14:45:33'),
(39, 'default', 'updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":0},\"old\":{\"is_admin\":2}}', NULL, '2024-04-03 14:45:55', '2024-04-03 14:45:55'),
(40, 'default', 'updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":1},\"old\":{\"is_admin\":0}}', NULL, '2024-04-03 14:46:00', '2024-04-03 14:46:00'),
(41, 'default', 'updated', 'App\\Models\\User', 'updated', 2, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":2},\"old\":{\"is_admin\":1}}', NULL, '2024-04-03 14:46:09', '2024-04-03 14:46:09'),
(42, 'default', 'updated', 'App\\Models\\User', 'updated', 3, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":1},\"old\":{\"is_admin\":0}}', NULL, '2024-04-03 15:02:06', '2024-04-03 15:02:06'),
(43, 'default', 'updated', 'App\\Models\\User', 'updated', 5, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":1},\"old\":{\"is_admin\":0}}', NULL, '2024-04-06 19:52:31', '2024-04-06 19:52:31'),
(44, 'default', 'updated', 'App\\Models\\User', 'updated', 8, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":1},\"old\":{\"is_admin\":0}}', NULL, '2024-04-06 22:01:11', '2024-04-06 22:01:11'),
(45, 'default', 'updated', 'App\\Models\\User', 'updated', 3, 'App\\Models\\User', 13, '{\"attributes\":{\"is_admin\":0},\"old\":{\"is_admin\":1}}', NULL, '2024-04-06 22:33:32', '2024-04-06 22:33:32');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dedications`
--

CREATE TABLE `dedications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `institution_name` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `order_column` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dedications`
--

INSERT INTO `dedications` (`id`, `uuid`, `user_id`, `name`, `role`, `institution_name`, `start_date`, `end_date`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '576e8b26-2c80-4cdf-9282-f81dfcd70ba1', 3, 'Footman, \'and that.', 'He got behind him.', 'Mouse\'s tail; \'but.', '2019-01-02', '1986-10-09', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(2, 'a4bb87c9-4766-4d1b-b05f-74771b09b077', 3, 'Duchess was VERY.', 'March Hare. \'Yes.', 'I\'ll go round and.', '2001-06-26', '2004-05-17', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, 'd0114d09-8591-4297-8b73-1f7aab44c566', 3, 'I can\'t understand.', 'March Hare. Alice.', 'Why, she\'ll eat a.', '1992-05-17', '1971-05-06', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, 'ec3a3f27-9162-4a31-8974-35bc186bb032', 3, 'I only wish they.', 'King and Queen of.', 'She ate a little.', '1976-09-24', '2017-01-01', 4, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(5, '2c7a3b45-c142-4a60-bebd-40c992755e9e', 1, 'If I or she fell.', 'King was the fan.', 'Next came an angry.', '1997-11-13', '1996-03-03', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(6, '7b374a5a-7bd6-4b4a-a7de-9c451fa379be', 2, 'March Hare. Visit.', 'There was exactly.', 'Alice; \'all I know.', '1978-12-06', '1990-10-12', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(7, '6bfaa6ed-0a35-43ec-986a-9eb1104ee75c', 2, 'Why, I haven\'t had.', 'So she swallowed.', 'Alice angrily. \'It.', '1993-01-21', '2011-09-22', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(8, '0ddb77db-8e80-4af3-aa18-83f7bac62c4f', 1, 'Dormouse went on.', 'White Rabbit; \'in.', 'How puzzling all.', '2021-07-06', '2001-06-21', 2, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(9, '40ed400b-67ab-424e-b2f9-1a5f49043900', 2, 'Dormouse again, so.', 'How brave they\'ll.', 'Oh! won\'t she be.', '1972-01-14', '1986-01-20', 3, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, '275fe307-f20d-4a4b-8d3e-e9e155bba5af', 2, 'Knave, \'I didn\'t.', 'I\'m doubtful about.', 'Alice, \'as all the.', '2021-10-11', '1984-11-06', 4, '2024-03-28 11:05:33', '2024-03-28 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `education_histories`
--

CREATE TABLE `education_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `institution_name` varchar(200) NOT NULL,
  `major` varchar(200) NOT NULL,
  `level` tinyint(4) DEFAULT NULL,
  `graduation_date` date DEFAULT NULL,
  `order_column` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `education_histories`
--

INSERT INTO `education_histories` (`id`, `uuid`, `user_id`, `institution_name`, `major`, `level`, `graduation_date`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '5d69ce61-d168-4c44-9c79-104b4c01ca23', 1, 'Oh my dear Dinah!.', 'March--just before.', 6, '2013-03-17', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(2, 'd509b828-1b8b-4534-88bc-abe75e4c4436', 1, 'Lory, as soon as.', 'Queen smiled and.', 8, '2008-02-11', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, '6945146c-665f-49ef-b25d-edf2a6572f5c', 3, 'The Hatter shook.', 'Alice, jumping up.', 2, '2006-06-29', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, 'aa4efb2d-18d0-44b9-b605-a9724df22f63', 2, 'At this moment the.', 'Alice,) and round.', 5, '2003-04-09', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(5, '6b3e8763-dc67-4c7e-b906-780a0a1df865', 3, 'Alice could think.', 'Lobster Quadrille.', 1, '1981-09-04', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(6, '2211a60b-6d85-4883-8570-6040b8b3af64', 3, 'As for pulling me.', 'Alice thought she.', 6, '2006-07-04', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(7, '204f021d-0abb-4081-95fc-125874f03114', 1, 'Alice\'s head. \'Is.', 'Hatter, \'or you\'ll.', 1, '1992-01-17', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(8, '07f3ed70-d1aa-47c1-9075-457259eb63fc', 2, 'Alice, jumping up.', 'I should think!\'.', 2, '1995-06-25', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(9, '2da7e58d-c54c-4a3b-b083-ca337c4db4cb', 2, 'MINE.\' The Queen.', 'Caterpillar called.', 6, '2019-01-11', 3, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, 'ec1a2ec1-434d-4be2-84bb-9b568d16f0d2', 1, 'Lizard as she had.', 'Alice began to say.', 6, '2017-06-10', 4, '2024-03-28 11:05:33', '2024-03-28 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `organizer_name` varchar(200) NOT NULL,
  `external_url` varchar(200) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `uuid`, `name`, `organizer_name`, `external_url`, `type`, `start_date`, `end_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '234df785-7a3c-4f30-9fca-18b6d51283ed', 'Cat said, waving.', 'Dinah stop in the.', 'http://www.keebler.net/qui-ut-nemo-vitae.html', 5, '1971-05-02 06:56:45', '1986-01-05 15:11:45', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(2, '768f21e1-71f2-4768-81e9-6cef3c57af79', 'Hatter. Alice felt.', 'Alice. \'Why, SHE,\'.', 'http://harris.net/vel-perferendis-quo-quia-excepturi-voluptatem-in', 5, '2016-10-15 04:48:42', '2022-08-08 09:51:32', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(3, '5c76af46-51fd-4a80-b2a6-64a75679d1e5', 'So Alice began to.', 'O Mouse!\' (Alice.', 'https://nikolaus.com/aut-autem-accusamus-aliquid-molestiae-aut-laborum-sunt-nostrum.html', 8, '2020-06-10 21:39:13', NULL, NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(4, '72cd368b-19de-46bb-85a7-eeb835daeb3c', 'The Gryphon lifted.', 'Prizes!\' Alice had.', 'https://www.trantow.net/commodi-accusantium-nisi-rerum-consequatur-doloribus-ut-aut', 3, '1998-11-16 23:53:12', NULL, NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(5, 'f9f97b00-bbe7-40d5-918b-b3f6cd000686', 'Caterpillar. This.', 'Oh, my dear paws!.', 'http://yost.com/', 2, '2008-06-10 08:58:09', '2014-06-13 22:29:35', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(6, 'f35b7305-1d4b-4475-9771-dcb6d3f826ef', 'Duchess: \'and the.', 'Fish-Footman was.', 'http://www.ullrich.com/sunt-sint-impedit-molestiae-eum-et.html', 8, '1977-06-26 02:51:34', NULL, NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(7, '8e4ceba4-a43d-43d1-a3da-51c99a41e7c0', 'Queen was to twist.', 'And he got up and.', 'https://renner.com/et-laboriosam-debitis-dolorem-atque-qui-aut-quos.html', 8, '1990-12-15 02:41:17', NULL, NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(8, '8071aefa-0284-4a0b-a273-bb6a81e2d6d5', 'Gryphon: \'I went.', 'Dormouse shall!\'.', 'http://marks.com/tenetur-ea-optio-laborum-dignissimos-et', 7, '2008-12-03 21:17:19', '2015-05-11 09:58:50', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(9, '4b4954c9-2c95-4d54-ab80-c1f4d157b4f3', 'Alice. \'I\'m glad.', 'Alice had got its.', 'https://schulist.com/esse-recusandae-voluptatem-nesciunt-optio.html', 7, '1978-01-14 08:49:56', NULL, NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(10, 'eca2dd83-533f-4ab5-b4c7-fb1bc3a8b45f', 'I do wonder what.', 'What happened to.', 'http://www.windler.com/labore-aut-aperiam-magni-possimus-odio', 8, '1995-01-27 19:50:35', '2007-07-24 08:20:29', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(11, '98bb89f0-ddd9-44ca-995d-3c886c30065d', 'Alice, very much.', 'The jury all wrote.', 'http://www.haley.info/corrupti-reiciendis-ut-est-voluptates', 2, '2022-06-24 16:26:41', '2024-03-21 19:32:55', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(12, '54f7644d-06fc-4769-b5cd-f165779c0ff9', 'Mary Ann, and be.', 'I will prosecute.', 'http://www.walsh.com/odit-earum-rerum-quod-est', 9, '1988-11-14 07:31:46', NULL, NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `expertises`
--

CREATE TABLE `expertises` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expertises`
--

INSERT INTO `expertises` (`id`, `name`) VALUES
(1, 'Arkeologi, Sejarah, dan Budaya Maritim'),
(2, 'Bioteknologi, Biokimia, dan Pengolahan Produk Kelautan'),
(3, 'Bisnis Kelautan dan Perikanan'),
(4, 'Ekonomi Sumber Daya Kelautan'),
(5, 'Geologi Kelautan'),
(6, 'Hubungan Internasional dan Hukum Maritim'),
(7, 'Keamanan Maritim'),
(8, 'Kedokteran Kelautan'),
(9, 'Kesehatan Masyarakat Pesisir'),
(10, 'Klimatologi dan Meteorologi Kelautan'),
(11, 'Komunikasi dan Sosiologi Maritim'),
(12, 'Logistik dan Ekonomi Maritim'),
(13, 'Manajemen Pesisir Terpadu dan Tata Kelola Laut'),
(14, 'Olahraga Bahari'),
(15, 'Oseanografi Biologi, Oseanografi Perikanan'),
(16, 'Oseanografi Fisika, Pemodelan Laut'),
(17, 'Oseanografi Kimia, Pencemaran Laut'),
(18, 'Pariwisata Bahari'),
(19, 'Pendidikan Kelautan dan Perikanan'),
(20, 'Perikanan Budidaya'),
(21, 'Perikanan Tangkap'),
(22, 'Sistem Informasi, Penginderaan Jauh, dan Instrumentasi Kelautan'),
(23, 'Teknik Kelautan, Energi Laut'),
(24, 'Teknik Perkapalan, Sistem Perkapalan'),
(25, 'Transportasi Laut dan Pelayaran');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_posts`
--

CREATE TABLE `job_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `position_title` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `link` varchar(200) NOT NULL,
  `application_closed_at` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `job_posts`
--

INSERT INTO `job_posts` (`id`, `uuid`, `position_title`, `company_name`, `type`, `link`, `application_closed_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'b653f743-360f-4fce-9e32-c74838a8ca75', 'I\'ll set Dinah at.', 'I\'ve said as yet.\'.', 4, 'http://www.raynor.biz/natus-facere-et-repellat-dolor', '2016-12-20 02:39:03', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(2, '7a1a425d-17e3-4741-9c6b-b7902727a5d0', 'They all returned.', 'The Hatter shook.', 3, 'http://langworth.com/', '1976-10-09 17:39:14', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(3, '5480ec07-9ea7-43d4-ac9d-d6830b8f9b41', 'Latitude was, or.', 'Alice replied in.', 1, 'http://collins.com/', '2020-11-21 19:35:14', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(4, '448d74da-7052-4c89-b003-9472d4a07296', 'And she opened the.', 'First, because I\'m.', 3, 'http://www.schulist.org/eius-rerum-aliquam-quis-laudantium', '1979-10-24 19:37:32', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(5, '80d86fe9-8341-4aec-979e-6c7b6a402944', 'Then came a little.', 'Cat again, sitting.', 3, 'http://green.com/fugiat-et-quia-et-ad-quia-nam-reiciendis', '1976-01-31 00:59:56', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(6, 'c26442d0-8212-498a-86db-c1edbc2929e9', 'Duck. \'Found IT,\'.', 'VERY turn-up nose.', 4, 'https://bernhard.com/adipisci-amet-fugit-est-exercitationem-sequi.html', '1983-02-22 19:26:02', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(7, 'b778e907-05d1-4a1c-839a-cbb3e4035d78', 'Alice as it turned.', 'I could show you.', 3, 'http://braun.com/officiis-consequatur-aspernatur-illum-officia-dolorum.html', '1992-11-16 15:57:00', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(8, 'c42331e3-f9db-4ec8-a2c0-19cf09767c23', 'I\'m NOT a serpent.', 'Alice led the way.', 1, 'http://www.corwin.com/reiciendis-quasi-ut-voluptatem-neque-non', '1988-01-09 15:08:33', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(9, 'd93673f7-9353-44a0-a006-dffa004596ad', 'Cat, \'if you don\'t.', 'THEIR eyes bright.', 3, 'http://www.robel.org/', '1974-04-23 04:50:59', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(10, '8f773071-da7c-4b38-94e7-925a47ebe558', 'She had not long.', 'Alice. \'Why, SHE,\'.', 4, 'http://beer.info/quia-enim-deleniti-aperiam-alias-recusandae.html', '2008-02-19 09:44:47', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(11, '79b98be9-8328-492a-b1e8-a108a086f365', 'SAID was, \'Why is.', 'Lobster Quadrille.', 3, 'http://carroll.com/', '1992-10-30 10:10:24', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
(12, '9a7849e7-479e-41fe-b263-7dedd25737bc', 'I should think it.', 'Alice. \'Of course.', 5, 'http://paucek.com/aut-ipsam-ut-eius-ullam-consequatur-blanditiis', '1989-08-11 02:01:17', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `collection_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `mime_type` varchar(255) DEFAULT NULL,
  `disk` varchar(255) NOT NULL,
  `conversions_disk` varchar(255) DEFAULT NULL,
  `size` bigint(20) UNSIGNED NOT NULL,
  `manipulations` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`manipulations`)),
  `custom_properties` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`custom_properties`)),
  `generated_conversions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`generated_conversions`)),
  `responsive_images` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`responsive_images`)),
  `order_column` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `model_type`, `model_id`, `uuid`, `collection_name`, `name`, `file_name`, `mime_type`, `disk`, `conversions_disk`, `size`, `manipulations`, `custom_properties`, `generated_conversions`, `responsive_images`, `order_column`, `created_at`, `updated_at`) VALUES
(4, 'App\\Models\\User', 13, 'd998c77e-bedf-42c9-9fef-4030752b2ea1', 'photo', 'Forgot password-amico', 'Forgot-password-amico.png', 'image/png', 'public', 'public', 385948, '[]', '[]', '{\"photo\":true,\"thumb\":true}', '[]', 4, '2024-04-02 12:12:11', '2024-04-02 12:12:13'),
(5, 'App\\Models\\User', 13, '37f91529-56bc-4a5a-bc1c-e5a0986c2da5', 'identity_card', 'logo-300', 'logo-300.png', 'image/png', 'public', 'public', 4949, '[]', '[]', '{\"identity_card\":true}', '[]', 5, '2024-04-02 12:15:42', '2024-04-02 12:15:45'),
(6, 'App\\Models\\User', 13, 'bfe78ef6-edb4-4a93-8414-becd0720753f', 'payment_confirm', 'logo-100', 'logo-100.png', 'image/png', 'public', 'public', 2453, '[]', '[]', '{\"payment_confirm\":true}', '[]', 6, '2024-04-02 12:15:45', '2024-04-02 12:15:45'),
(7, 'App\\Models\\User', 14, 'f5d1eb3b-1dd9-4f48-b0e9-aab26b4b3c5d', 'photo', 'Mobile login-amico', 'Mobile-login-amico.png', 'image/png', 'public', 'public', 508947, '[]', '[]', '{\"photo\":true,\"thumb\":true}', '[]', 7, '2024-04-02 12:28:14', '2024-04-02 12:28:15'),
(8, 'App\\Models\\User', 14, '99156e46-9791-43c9-b788-b5986d4cad83', 'identity_card', 'logo-300', 'logo-300.png', 'image/png', 'public', 'public', 4949, '[]', '[]', '{\"identity_card\":true}', '[]', 8, '2024-04-02 12:29:13', '2024-04-02 12:29:16'),
(9, 'App\\Models\\User', 5, 'fc298121-b01e-47f1-a1b4-692a83e6f2fe', 'photo', 'Screenshot 2024-04-01 224011', 'Screenshot-2024-04-01-224011.png', 'image/png', 'public', 'public', 17838, '[]', '[]', '[]', '[]', 9, '2024-04-02 13:00:03', '2024-04-02 13:00:03'),
(10, 'App\\Models\\User', 5, '629b070c-3a73-4917-8db3-d4d2aae6b6e1', 'photo', 'Screenshot 2024-04-01 224011', 'Screenshot-2024-04-01-224011.png', 'image/png', 'public', 'public', 17838, '[]', '[]', '[]', '[]', 10, '2024-04-02 13:00:21', '2024-04-02 13:00:21'),
(11, 'App\\Models\\User', 12, '476ee5b5-c8d9-4151-900c-04231341fb33', 'photo', 'Screenshot 2024-04-01 224011', 'Screenshot-2024-04-01-224011.png', 'image/png', 'public', 'public', 17838, '[]', '[]', '{\"photo\":true,\"thumb\":true}', '[]', 11, '2024-04-02 13:00:59', '2024-04-02 13:01:00'),
(12, 'App\\Models\\User', 12, 'ef9ab755-b390-4821-8675-cef5458d6dad', 'identity_card', 'Screenshot 2024-04-01 224011', 'Screenshot-2024-04-01-224011.png', 'image/png', 'public', 'public', 17838, '[]', '[]', '{\"identity_card\":true}', '[]', 12, '2024-04-02 13:01:00', '2024-04-02 13:01:04'),
(13, 'App\\Models\\User', 12, '0b518f73-b2d3-4d38-812d-506f9fa9106c', 'payment_confirm', 'Screenshot 2024-04-01 224011', 'Screenshot-2024-04-01-224011.png', 'image/png', 'public', 'public', 17838, '[]', '[]', '{\"payment_confirm\":true}', '[]', 13, '2024-04-02 13:01:04', '2024-04-02 13:01:05');

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `verified_at` date NOT NULL,
  `expired_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`id`, `user_id`, `verified_at`, `expired_at`) VALUES
(4, 14, '2024-03-30', '2024-03-30'),
(6, 5, '2024-04-02', '2023-04-02'),
(13, 8, '2024-04-06', '2025-04-06'),
(16, 19, '2024-04-06', '2023-04-06'),
(22, 13, '2024-04-09', '2025-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2021_08_31_095537_create_users_table', 1),
(5, '2021_08_31_095538_create_provinces_table', 1),
(6, '2021_08_31_095539_create_expertises_table', 1),
(7, '2021_08_31_095541_create_publications_table', 1),
(8, '2021_08_31_095542_create_achievement_histories_table', 1),
(9, '2021_08_31_095543_create_dedications_table', 1),
(10, '2021_08_31_095544_create_research_table', 1),
(11, '2021_08_31_095545_create_work_experiences_table', 1),
(12, '2021_08_31_095546_create_education_histories_table', 1),
(13, '2021_08_31_095547_create_organization_histories_table', 1),
(14, '2021_08_31_095548_create_events_table', 1),
(15, '2021_08_31_095549_create_scholarships_table', 1),
(16, '2021_08_31_095550_create_job_posts_table', 1),
(17, '2021_09_01_102812_create_media_table', 1),
(18, '2021_09_16_055546_create_notifications_table', 1),
(19, '2021_09_29_025549_add_membership_column_to_users_table', 1),
(20, '2021_09_29_025934_create_memberships_table', 1),
(21, '2021_11_13_065803_create_activity_log_table', 1),
(22, '2021_11_13_065804_add_event_column_to_activity_log_table', 1),
(23, '2021_11_13_065805_add_batch_uuid_column_to_activity_log_table', 1),
(24, '2024_03_05_033749_create_stores_table', 1),
(25, '2024_03_26_022550_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) NOT NULL,
  `type` varchar(255) NOT NULL,
  `notifiable_type` varchar(255) NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('0097a7b4-c02d-4544-9f22-1557d1a455c3', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('009fc59c-5686-4f8f-aa25-c0da4e65af55', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('016f00e9-70c9-427d-881d-ac88254e7f69', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('02f2e4e4-8ad2-40c9-8a73-4dad51b7f423', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('02f62ab2-be02-4294-a73a-47ec91ddf30a', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('0365150e-fe3d-478f-a1b5-ec03cd3e32a5', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('03805333-dcdc-49b3-a7c5-09fae1e77753', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('044dea46-debc-424f-ad15-f2b7832593e0', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('04a0683b-5c08-4034-82f5-c0cd076aec5d', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('05396e3b-13d9-42d2-8839-7f6297224239', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('057e892a-c673-4b2a-9460-f24f11f68ef2', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('061ded24-65ca-4f59-98f9-0b6ba9fd5f7f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('0630948e-f3f6-4ad6-af9a-434017b91afa', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('06ac2cd6-d79b-465e-8d37-4452e21eb174', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('0757722d-a6d6-429f-91df-2e6b433c4b0b', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('0841a2c7-346d-40a7-b6f3-50987f3d08af', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('09007352-e45f-4e81-ae2f-33f4ec84cbaf', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('0941c9e7-2090-4ab7-ab60-c5db6571b367', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('0a20940a-98d3-45ed-9241-9f3ff743baf5', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('0b734157-7250-4f8e-9a08-6f2b86588c72', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('0bc9da30-99f7-40f5-8976-8169c59bc35f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('0cd361ac-0a46-4f22-af85-50e21991a7b5', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('0d2c93a1-4b0c-46d8-93d2-52ef2fbb2ea8', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('0e7458f0-b978-49f5-aaf5-422032e7aa48', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('0eec1056-7121-47a3-9e25-06b73eed35cc', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('0f345516-e4e1-4047-a61f-6a94990c9888', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('0fcfe2b8-91bd-4dc4-941e-88247e1fa6f3', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('0fd010a2-a8e5-44da-94eb-be36883804f3', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('0fe0b179-d867-4933-a7b1-6770a10779f3', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('11a7eec8-7e18-408b-b90d-a6b71edc4410', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('11c25624-fd0b-4933-a7c5-63a35e144350', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('1260b93c-29fa-4af0-b551-90f3aa192295', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('12aed0dc-9032-4c8b-ab6f-c7da4425df04', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('13bcfc77-67c6-4bd3-9a7b-2f5b5d399ddc', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('13ca758f-9533-416a-afa3-78315cf4de39', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('140d9a70-dd35-4ebe-a61a-b13b8ae0ea5b', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('15630fdf-6193-4cb3-882d-03957cfc88de', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('158b99b8-3ae2-459d-87f1-dedfad4ca5e3', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('15be8e67-1aaa-4e9f-bb90-4d8620eca6ac', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('15e71cd6-dc5c-41aa-b2ca-68f69d0dab49', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('16173fd1-d741-400f-b50b-23ef3e87f295', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('16a87725-39eb-4fe7-afb7-1f5b10bd9e77', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('173348e4-8813-4915-bd23-e51b75d95bb7', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('17a47b87-d518-4b5a-ad67-81f1af2d7579', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('1968754e-94f5-4215-bf5a-0e7dc049c649', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('197c1534-7efb-40ec-bae1-c9775b85fec4', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('19df9923-797d-4b43-958d-260bdf03bf40', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('1bb89b27-2397-4715-a864-b571ffe4f578', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('1ce46725-ba8b-4626-8841-f7af2d3af572', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('1d28972a-bada-4266-96c2-4103d7cb2538', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('1d2cd235-4c11-42f2-a19a-c9f0dad5838c', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('1db7774e-db0d-4c61-b578-8ef8f378ea7f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('1e342971-7e17-443d-9345-29c54774b29f', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('1e47f7c1-941c-4eaa-a527-10775e04ca72', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('1e928a75-7cef-4ac2-8f7a-f5db19a681d7', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('1eb71df4-27d4-43bc-b932-cc9a88d0de70', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('1f3ac49f-e045-4fa1-bce3-9ee11e285498', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('1f750f9e-ef25-4efb-b6a9-4e9eff459f3f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('1fbf7b9f-52d4-4d94-8ef0-a408a1dc0f86', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('2005ce18-3b23-4bdc-b1b6-f91de5bec3d5', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('2010b569-ca23-4a04-a0d1-009bd8f80836', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('2052d175-5178-456b-b740-061431650293', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('2171d8db-b0e5-4d37-a05a-b6767e1e6a06', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('21a9a345-70c2-4fca-b8a2-b2f86cdd33ab', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('23edaa94-7364-4b01-94d4-364c41490c7b', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('2408f28b-0324-4b0c-b8e4-dc72ef94311f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('25b99594-2160-48ca-ba8a-0559f6a75902', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('2603348b-7410-4a5f-8461-54f8f407f5dc', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('262cd52e-8b70-4a1f-abf1-6a9869f709f6', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('26770b42-639c-4744-924b-4fd40f59bb52', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('274ec67e-67dc-4853-80a9-6a7edbae8f78', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('28138e0d-cfb7-4a3e-8b4d-361a4aa5b321', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('285d2159-8f28-4588-98d5-075b103071f1', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('28783733-8edb-42eb-8fdc-3acc429d5a60', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('29f745f8-ea8e-4404-be89-7735573504a4', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('2a3ef871-8b0e-4830-aeb7-0f094b3cdae6', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('2b9bcff1-d795-4b3b-9d8b-e0c2508ce0f3', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('2d01ae7d-32a2-4b38-b2f6-c2564cb696a5', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('2df5a34e-9b5b-4789-8f85-d584235ab1f4', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('2eafdefd-044d-44c3-b388-16b827423065', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('2f60f0bf-3f1a-4f7c-9f9f-1e32cf3a6643', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('303ed7a8-1d7d-4c0b-a5f6-690ddd7f1819', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('30f7368b-b4d9-48f8-947b-c993e9ead4cd', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('315c840b-41ec-4b2c-be3f-b337f1b68629', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3161f727-e3a7-41d9-ab35-a0499a8d6a44', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3240960c-a9a3-4cb0-8bc6-1304ac5bfd45', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('326cb4fb-aff8-42bd-af16-ca3846624779', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('32702f3a-fc50-42ed-8fc9-ca5c47ec7478', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('32deddfd-e5a1-46db-8b63-e8714fc23379', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('331e4fc2-82eb-4ddf-83c9-69c9bb44c6b9', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('34013047-221d-48b1-9576-70d6db5d2c0a', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('34d72e05-6533-40fd-bc7d-0a0bc1cffa42', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('35cab889-8377-429d-80f3-889ebd0d3faa', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('3746be14-eafa-4e0d-83a0-4c09b8965380', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('3777d7af-22e2-40be-8322-b63127b74f0a', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3897c8df-14f2-4687-bed2-2a5001c69471', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('390bedaf-47dd-40e6-8d4d-e06a56aa62df', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3a7fcabd-3600-490a-9839-58374dbb5596', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3b9cbc68-b829-43f6-9355-0989bb8fd248', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3be3b3c0-9800-45b2-8c16-195f14767abe', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3bf748ea-1c45-4040-83c8-2a980e3eb8dc', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3c68fed7-419e-4dd5-a7c5-3ba264364448', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('3cb39fdb-7a07-4782-a82c-9ce07b012a5f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('3d0306bd-037d-4474-abf7-9f2880796473', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3d4eb26f-a836-4195-a5cb-eca76fd289ef', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3dfabc4f-8839-4f63-aa92-19b06188127b', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('3f31e574-6d12-41c0-8d5c-8146982ba6ea', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('3f8fdc40-e021-4f43-8f0e-d7cc45944215', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('4075f664-d488-45e5-b220-03e1fbfd94f2', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('4146e8cc-9bdd-460e-91a2-5413befb2d32', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('41aa286e-4873-451b-a824-d8bc123e3c33', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('4360b6b6-5f77-4522-8e36-2e82768ebe82', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('43f1cf64-0dc5-4cd0-afba-b0a3b6a52cf9', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('44c2cf93-b42b-4b1a-bb37-c3f5b106faa1', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('453d50af-5363-4a5a-8aeb-2cfb0cc94e82', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('4587bcad-76c3-481a-a370-9a1cb01f5a0e', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('458c8805-592d-4d23-80bf-754a2789669f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('48af33cf-26af-46b8-b7a5-8cbd6f9717e2', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('48bf3fec-0654-4513-87b0-b5ec22ad0f1a', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('4be5a7bf-4d4c-4935-8cae-82d6c7c5cbde', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('4c0673ca-b282-4c2c-8405-81968f90bc87', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('4d395a60-0552-4c16-a65b-1cd76341c805', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('4dfaf852-090a-4348-9f50-ca115bcf55ef', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('4e117e68-3cba-4600-93a6-f08c14f171bc', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('4ec7147b-fa2c-40a9-854d-9f789805516e', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('4f93d40f-ce22-4164-a5a3-98858177ac09', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('4fc535b9-1bce-40b2-a4ad-15f6042fe898', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5087b9b5-1190-4062-a64c-fff8d1876f8c', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('50a005ae-e279-4a53-a95e-857288bd81bb', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('50c73096-9da8-4c62-8629-ddcb6a424694', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('521530ed-4ff6-4f66-b723-c2d4546f95e4', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5223ed0b-318e-435e-b7c3-e900e2fcdcae', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('556c005e-0489-4114-88b7-23fec969cc11', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('5620cb5f-0c18-40d5-b622-c629459e45b1', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('575cd5bd-5f54-452d-98f7-b18232fa33d6', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('5771619d-f17d-43b6-8063-5390e6482b38', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('5775742f-a851-4dc0-bb95-4b9cc15de6c9', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('57c07e08-d477-4c8e-98b3-f5a6f1d451b3', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('57c6f0e0-d26c-4bb1-8c4d-1ece73999180', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('582500ab-7ff5-4661-b492-3d9c73464d18', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5885b7ec-53c3-4fa3-8da8-88be73851cee', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('58d93f0c-16ff-47fd-ae83-49daba9c3bda', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('58f206dd-1a43-4f08-bd31-870328501cd8', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('59ada94a-4775-49f6-9ed9-8b2ce118196e', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5a1ffe4c-c371-4ff1-9a4b-c6d2c7f7fdb1', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5a3e6dde-b3a1-497f-bc88-9c585292317f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('5b845ec9-93cd-4284-8573-95f31e6c6336', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5bf7423b-7bd6-488a-a2f6-41b3e3b47573', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('5c6b5d1c-25ae-47fd-9927-c9854f8ed867', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5d35593d-852c-4449-b6cb-885da8f167c7', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('5d7dad85-addc-4a72-a4b2-bb0bae348a8f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('5dbc5c10-da23-43da-8b60-088de453a1e4', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('5e24d56c-0f84-43ff-9fae-e3f07700134e', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('61cacff2-d15d-4610-8840-cb6e3e1c9bd8', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('62091fea-03e4-4a1f-a246-0f8dffd6b740', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('621b41f7-2fef-489f-afff-90d6d6f1226a', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('62a7b3e8-69a7-4540-a557-c746c9f5c0c0', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('62bc048d-bed1-43b3-8a3f-ad15dacea9f3', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('63dc2c97-7a35-4689-81d4-7cbbc5d61115', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('64cdb22a-d94f-4fb8-a7ae-1a8984914e77', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('6622724f-ee26-4364-8ebc-fcc41c9e569f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('66c37e88-7781-4b52-ba62-6c619ae692dc', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('66c45e66-1b80-4b7d-9f24-4444f20cbfa1', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('66e6f411-a82d-458a-a455-23a914ace9f7', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('67ad467a-c4c7-48d1-bc98-44f50f933054', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('67e9164c-842f-47e4-9cc3-1ec3f39bd465', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('688b5a51-17b8-40a1-b0f1-7a0bc29a43a6', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('69c8f54a-3cbf-445b-b167-9c8e4f550ec4', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('69f43efe-07fd-4b26-a819-76a2ba2d6008', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('6a011c94-48f8-4f9d-b69b-adc1807f0f69', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('6aec1808-85c5-4a24-879a-b0dc563110ac', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('6cb2959c-4f6a-4201-bdd2-6b462e50c77a', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('6d9c4a29-42ad-45b8-b5f6-51b0ae02322e', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('6df8429c-4dfd-4f2d-a97e-7b38a3f243a2', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('6eeff515-76c7-4cef-b912-5f0a4faf5b49', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('6ef7ecc9-b6b8-4bb5-b855-19955507310d', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('6f000050-5114-4290-b042-958fc4f9c0e2', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('6faa2346-a8be-4d6d-ac35-9bbe5a25e8c9', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('6fbb294e-40bd-4280-b145-687d32d32a8b', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('6fbd9475-4739-46cb-985a-e71862be2a5f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('7085a94f-5a22-4e32-ad0a-a6ab972105e3', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('70c8a44f-bbf2-4e11-ab23-3c0c5a9d62cd', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('71bc416e-5f79-459a-8c55-1d444a434520', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('726e2fc8-a5af-45c3-8ea7-b9655ad69026', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('7331f38e-ae14-417f-ba09-bcdbfe09b508', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('741e9839-ca88-4458-9f9a-6eed0f76d17b', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('754da263-3299-420a-aab8-7df3a3aa2f78', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('762b2773-9b72-466c-8e8d-8e09de77d918', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('76d04693-d62f-412e-a147-ec812de59367', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('77628546-44ca-4ed0-a918-6cfcf47825e4', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('777547ec-ab85-4c5c-aab4-0f99088a6241', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('77817cff-3181-4d12-9480-91ac8d72451c', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('7819ba26-78f2-40da-83cb-7eb95e958b91', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('78a4726f-47f4-4c08-bda5-9fe4f99c6745', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('78d7fa21-a2ef-432e-8432-191e124f96fa', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('798bd1b1-1f8e-4ccd-be16-24c3a085aeba', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('7a410a67-b3d2-4c12-8e60-d1933e38abae', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('7ab3d4b6-4ed5-44f9-abb8-4b4a00f939cf', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('7be00c3d-ddd2-4afd-bca4-a5a6e2b42c17', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('7c8581c4-1bcc-4766-acde-308fb4eb5584', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('7ca7e2ac-62fc-40bc-af96-48f64e22edd0', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('7cbdd204-bcb9-48ed-83d2-593cacef7f9f', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('7d4f2a92-19c7-49a3-b952-d8a9449d1650', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('7e593c49-ea04-4aa0-9931-f5092fa6563d', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('7e947209-9ef3-4a0f-b8e5-c602db5e5b9d', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('7f242c1c-a320-47f5-b7c1-bdf1651ed1b8', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('7f3186bd-374e-44f5-a872-56fd141f7a51', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('7f6f071b-10fd-4581-babe-201681d1be13', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('7fa1b45a-bc85-4c20-a133-b78821e75968', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('80986030-cdd8-4976-b793-14420f47d910', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('80ed7c7c-868d-4615-9e7b-0514520e7f4f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('810f68d5-57d9-4568-a68e-6aa075ee878f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('814601fc-015c-43a3-94d3-47fabccc20c3', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('815d32b9-6a4e-4175-9a1c-541b42cc72a7', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('82138d56-ee6a-4404-b009-053574592f93', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('824355f5-2337-48bc-83b9-0284fc66af7a', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('824853d0-e40f-4a66-a6e9-6a652db82457', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('83038baf-fcc3-4064-ad66-c875c85fa51d', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('8320d962-8f25-489b-a2f2-bf7a4bf86b32', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('8394cd08-f36a-43e2-aeaa-dcfef515338a', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('84e4aa84-827d-46a8-acf0-a9f167082be0', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('852c0a2c-cead-4d06-92bd-7e2053c28c63', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('86379ec2-06f4-4084-a54b-37dad9ee5f27', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('875f6ca8-dd44-4cde-93b5-a10db08b201f', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('884357a6-5394-4df6-b1f1-f3927011cdcd', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('88bd85cb-72a4-4617-839e-c1c6a1d46ee5', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('89d046d8-52c2-468a-b6a7-640e8d6c55ad', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('8ab92dfe-36d2-4d3d-8030-38d37c0ef91b', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('8b380137-9318-4ee6-971e-d03c426d0b26', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('8bcdb9ae-84f1-4589-adde-3f20d85e6181', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('8bebf98f-4528-4b72-8241-d578442979cf', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('8c32ee17-5cdb-4e9a-a999-b550973e0b42', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('8c4ed11c-05c4-4d49-be49-7f589118a4ec', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('8cc954f2-0af7-4774-beab-3efc7c341c57', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('8cee2f67-aa3e-4602-b0a7-f0fc371c234c', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('8e080351-3ff6-4e1b-962f-6093c837ce9c', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('8f125014-9191-428d-8583-8181fb11e2a7', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('8f67e4ab-754f-44d8-8023-3d12e188d21f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('8fa3ec19-be40-4bbb-8f75-bf0d6ddac508', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('90354c0e-8e43-499a-a192-9111994c724d', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('9097454c-b15b-45c7-b69d-d96e5d5b0b99', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('90fd7fb0-71b9-424c-ae8f-daa299f6abb5', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('911c7774-a409-4447-818d-e4a59a7872f5', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('91a17e94-a13a-45b2-9c02-cb27c99ba6b9', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('931eeacc-117c-4511-a5e8-182434feb710', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('933d91a2-50c5-40a8-90a5-795412e9ddd1', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('93883aac-6436-4a05-937b-520b2ffe2e0d', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('93b314c4-f38e-4aab-ad83-289828d9df07', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('93ffb50a-8cc6-4c8d-ac34-27c9db855334', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('944e7329-fc23-4fdc-a8e1-854efc4b24f3', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('947ff0a9-a40a-481d-93f3-8adc5e83c845', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('949b3b52-d047-433c-bf18-1824121ef4f3', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('94bcfd19-c723-4be4-b30f-61555684a8ec', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('94cffc6c-1bb6-49fd-ae72-9e3e3d2e0eab', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('95671eba-5f28-4167-9e84-fe2ffca7635b', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('95bf88b7-f3e7-4388-9959-6f601c4c1c85', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('95f09b2a-7542-49e9-813e-753b0f2f503c', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('963b0112-4104-41f1-883e-85e8e66af528', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('96707628-193e-41d4-9c31-8cbc3fef9386', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('96d87d8b-e6ec-491d-aba7-72a652829c38', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('971dd8a0-8ba6-4e4a-9717-6c134624f353', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('9729cdf6-0d89-4a3e-b023-6420ef292530', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('979f3a4b-c43a-49f1-a0a1-07cee3ed0f11', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('98331ce5-4336-4b83-8c4d-5fd19daa669b', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('991e34d0-6ff7-42b9-aea3-afc61e06e22f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('99b6c882-378c-4f10-9339-59021f37a06f', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('9a8b76a2-f2c0-4898-8b1a-62c2e93538e1', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"Latitude was, or. - Alice replied in.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('9ae790d1-d16a-4742-b2d8-3a980a746cf4', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('9afd024e-f28f-47d4-a350-765c2d0569ef', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('9cf8533e-6d3d-46e1-a927-509c4409eaea', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('9d52c1fd-5f56-4e46-bd7b-509be20be6d0', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('9e54609a-25c5-41e5-a9f6-febc41cf1145', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('9f7c64f4-019f-44aa-83c1-679583cd82c2', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('9f89d679-58fb-48cc-b68a-5a982b2ed716', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('9fa3c230-0c75-4cf0-8674-a9fa4fb4dc81', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a0a2b38d-55fe-435c-a4fe-a32b7e026de6', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a12a55fe-1c94-4505-8c4c-6b61ad427aba', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a140a656-4434-491f-b037-c47321088435', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a25a51ba-8fc3-4998-bdc0-13707a5dcd51', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a2f82275-eb9a-408a-8fbc-4a831e4d8193', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a3998fff-684a-4d23-b775-756cbe94ece0', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a3a0293e-248a-4346-ae67-b1982c8efe93', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a4604711-04fb-4235-a3aa-76991ac6a7ee', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('a477bd29-d588-4173-a55b-c98d9abde759', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a4a6c556-d95d-4d0b-9c12-95081cc20429', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a506911f-cbe3-449c-9f71-1b40b54511cf', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a5c64011-55c6-434e-a408-167c7b90980d', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a6717b2f-cb1d-4a7d-81e7-ce25862b11de', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a6b7d557-a89b-4a6b-8feb-164e1494fcf9', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('a6c54d10-b4e1-4330-bc35-9fdd3a292e58', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a6f7ab3a-dc0b-497d-bf38-850752af0a61', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a7694be8-bc73-4a75-9ca9-8b9235a724c2', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a79ad368-8e8b-49a3-9728-cc8816c914bb', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('a7e64042-4371-4bf2-a61c-0a5f0a7a9b87', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a83eb0c2-5a61-41c5-a01f-14b9426fb9e0', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('a95606fa-56ff-45eb-848f-54fe3299b143', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('aa0c0598-ca89-4680-bc0f-61eeaca66425', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('aa8d7328-916f-4539-bb93-8b87d8155b39', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('aabc5af2-ea08-434a-8fe9-f576b675a528', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('aaceace3-fb9b-4e97-9efe-41d2a0711d60', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('abe48a18-7886-432a-b2c6-fbf06976324e', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('ad192c3b-9f17-4e9a-88c0-fd7ec8848c48', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('ad24010e-8710-4fe3-bd00-919391b24f12', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ad31c606-b484-44fc-855c-98b6f2129aaf', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('afb19bd0-8eec-4ac9-b1c4-6f6a4d2f82d5', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('afef8be7-28f2-454a-9c64-088a404df214', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b05b6071-e4e0-45a0-8924-5f5278a305e9', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b11dd48c-ea0e-43c2-9890-db8cb01d64e9', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b16b494a-40e0-4079-a61a-fb40a409722f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b176a9c4-b096-4034-8f90-583363727929', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 8, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('b1eaeb8d-2487-4c2a-9470-b85b621b5633', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('b2e181d8-033c-48e4-8d57-b963916c6e95', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34');
INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('b2fa324e-8109-47aa-9041-5e78ec4d9cc4', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b383d747-dcf9-4582-9542-38d8304157a9', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('b46056fe-9cee-4df9-bc83-83bca29f2fe0', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('b545e45a-f952-474d-b2a4-acb97e96080a', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b732cf1d-a0ec-42f8-8d32-ce962e3ff7b1', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('b94cd4bb-24c8-4920-9dfe-f061c1cd0146', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('b99eb97c-de1b-47e6-bef5-a38b9dca0b0b', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b9ba09a2-bf5d-44a0-b474-039e8c259055', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('b9e7366d-3ec2-4c26-b1d5-6c187428b57c', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('b9e7abe2-6ad9-413f-b4f0-a11ed24cb291', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 8, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('b9f0c5aa-c95d-4e82-8c0b-e0d5c13b0011', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ba458aaa-62f4-483b-b2b3-189447939248', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 2, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ba8aa988-060b-4ae3-b303-51d467093ea2', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('bb0a9a2a-f7fe-42f7-80a2-8a7029ac549d', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('bd0b6bd6-b2bd-4e36-a9f1-81bcec106b1f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('bda7401e-fc52-422a-aa2f-64e035b3cced', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('bea0d0d6-6968-4951-a57e-afbe432426eb', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('bf80c5ee-8669-423c-a4ab-f3ea33464989', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('bf880cc8-6e40-40fc-9953-952f77946cf1', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('c06d6175-4ba4-4f50-bd9d-202024ae9992', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c082e5d0-7622-4280-8d30-57f7505a6c79', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c0852628-6908-4019-85d3-47a880b04e04', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c0978089-4d49-4400-9172-5d3b1357525c', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c0f96752-3221-4571-937c-11628b95bc81', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('c144244d-3c70-4b46-8665-d9a9f469fca3', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c1c1a567-a37d-4729-ae2e-ccef40be3217', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c1d4a3b8-473c-4082-8018-96fb8b59dfad', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('c30c5bd7-8ab0-4b14-9366-09b1fc7f5938', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('c3543419-ab57-4bf7-a60d-b177de87222c', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('c3d6a55f-8708-4e88-a161-9fe19959b93a', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Gabrielle Ullrich\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c4437209-2183-4a87-a1e6-b54db2da9410', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('c556283f-066e-4122-b891-58f88fbdaf3c', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Gilberto Hirthe\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c58cb9b7-6876-4c74-abf5-cf0ec34c80df', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Mr. Fabian Kerluke Jr.\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c704d1ef-5814-4900-9b28-87c185bda08d', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('c7826670-991a-49ce-bb44-966c34c63a29', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('c8a2071c-497a-4465-9d40-a0a254d5a0a3', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('c8b7c1f3-336d-44f1-84fe-58333391bc90', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Nikolas Veum\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ca04cc40-5dd7-45c0-8582-ff5b357495b8', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Queen was to twist.\",\"action\":\"http:\\/\\/localhost\\/events\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('cb365c9b-69f2-4728-b5ed-61173652bfe8', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('cb3ae00e-430f-4f5d-a134-c9d851440fab', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 10, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('cc3b50e4-d65d-4a0d-b86f-d343cfb432cf', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('cc952980-7fc8-491f-aff2-6b2d271eaef6', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('cd245082-3700-4c6f-8cd1-f692c3b188bc', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('cd9ba1bd-41a7-47fb-a270-db586eb43510', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('cdedab33-0d8a-41fc-bed4-dc9ebafffd26', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('ce1c991d-5d59-4a79-8f17-248f985781e1', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 2, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('ce553a2d-a91e-4a7b-a7c5-dec4053059bc', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ceaa068a-b92b-48df-87a7-3385816a7a21', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('cfe5caac-565c-4aaa-b2ca-14076085606c', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('d0d09b26-2181-4224-8e8b-55749981e963', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('d15c259a-2778-46d3-a519-500595db5784', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('d17776a7-7879-426a-973d-fc566bc5d1cd', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('d3a90480-b98f-4825-97bb-0c7ed101a9db', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('d41a6fa8-a5c8-40b8-b96c-e90c27701725', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('d519c6b0-9788-4c70-ba02-9b4242569e77', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('d5580b8f-7012-41b7-8aec-38cdb66449e2', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('d60545f4-08b3-4f55-8c91-4f1c46da5d8a', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('d617d8dc-8e4d-4587-b9ac-8583efd69a8d', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('d793a8d3-a293-42b6-b62a-50c78f0fe615', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Hatter. Alice felt.\",\"action\":\"http:\\/\\/localhost\\/events\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('d7cf63da-fc05-4317-9fcf-427260c6fa05', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('d89227e9-810e-485c-a57e-533b11a79c86', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('da252412-29b1-4e2c-8c83-678b46a2893c', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('da2a14bb-bfa1-494e-8c7f-2eea6bc56a9d', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('da456f70-4a6b-41bf-875e-4bfe699b115b', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"They all returned. - The Hatter shook.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('dbfcca84-7601-415e-8967-036e9e3bb0c8', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Alexandro Stamm V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('dc3d007f-9566-4dc6-bdcc-d60b8826a616', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('dcef7e5b-249a-4cfe-a535-4e3508f054ef', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 12, '{\"title\":\"New Job Post Published\",\"message\":\"She had not long. - Alice. \'Why, SHE,\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('e0dbf723-1b2e-4084-8c3d-0c450fad8114', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 4, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('e238bc26-1f6e-4588-bcdb-10ace9560120', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 9, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('e2cb7910-b5e4-4391-ae80-1334952c84f6', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 6, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('e30ca710-438b-4767-bd71-46c969a87f8b', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('e34bf1ac-b11c-47a7-a655-9ab4d297c363', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('e3b8fd54-92fc-40e7-aacb-0373f05cc0e9', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('e43e4440-c690-46c8-918c-201782444648', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 7, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('e4af2b1b-80fa-4386-bdd7-b4b07e15e57b', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('e5e7a12c-0c28-4470-99b4-de3fcfc1d59e', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('e74c032e-f08d-4f74-881b-147ec463a5a1', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('e8ba46e3-61a1-43fe-a7fb-98be5b7a722e', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"SAID was, \'Why is. - Lobster Quadrille.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('e8e2d28f-0979-43cf-8ce7-f2109bca60f6', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 5, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('e9433711-9b40-4c28-b390-b2c6b0473042', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('e9e59df0-dacc-47bf-ad4d-9dd794d61c29', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"And she opened the. - First, because I\'m.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('ea6afcdd-7c2a-4e2f-b0b4-e2bff34c6aee', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"I should think it. - Alice. \'Of course.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('eb0c5301-22b3-4c64-84f4-bb7de77b546b', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 11, '{\"title\":\"New Event Published\",\"message\":\"The Gryphon lifted.\",\"action\":\"http:\\/\\/localhost\\/events\\/4\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('eb30b77d-9325-4f54-b002-6bffb75b51ab', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('eb30c351-8beb-4930-b864-57a2e7852266', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('ecab54bd-c5f9-49db-93f7-eeea32e1d23a', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ecf25a11-6cf6-4e2e-8a63-72405431460c', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('edadd58e-0289-4fee-b316-402f1805c23d', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('eddf9616-dfd0-42df-b00b-7afb2ca9fa22', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 11, '{\"title\":\"New Scholarship Published\",\"message\":\"Eriberto Jacobson\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('edeccd13-b567-4b66-9dc0-e66578f6fea5', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 6, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('ee4f7983-93ee-4494-88c3-43c15666c1e6', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ef0738f3-9a09-43be-9c9b-db8ea2829b47', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 5, '{\"title\":\"New Event Published\",\"message\":\"Duchess: \'and the.\",\"action\":\"http:\\/\\/localhost\\/events\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('f096d84d-2c52-4ec6-a10a-17e4cc2bf77e', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 5, '{\"title\":\"New Scholarship Published\",\"message\":\"Emely Senger\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/2\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('f0fd3894-99ed-4ba4-a7b7-3c2703d3df36', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 9, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f108f32a-8274-466a-94e3-492230eae2ff', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 11, '{\"title\":\"New Job Post Published\",\"message\":\"Cat, \'if you don\'t. - THEIR eyes bright.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f133f4f4-9051-4e1b-acf2-7e9fdfc02aee', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 3, '{\"title\":\"New Event Published\",\"message\":\"Cat said, waving.\",\"action\":\"http:\\/\\/localhost\\/events\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('f1513c95-6b1b-4e1a-8261-efeb924da7db', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 4, '{\"title\":\"New Scholarship Published\",\"message\":\"Marilyne Hansen\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('f311fada-23cd-41d7-bc5f-24be108613fd', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('f3464e62-98d9-42ee-bc60-b637a4385638', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Alice. \'I\'m glad.\",\"action\":\"http:\\/\\/localhost\\/events\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f37e4524-b4e4-44b3-9ba8-4a037bf30775', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 8, '{\"title\":\"New Job Post Published\",\"message\":\"Alice as it turned. - I could show you.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f3c33e0b-2338-4cb2-9c1a-4fde9678ac54', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('f48b02d1-e855-418b-87b9-258ab16fd751', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"Alice, very much.\",\"action\":\"http:\\/\\/localhost\\/events\\/11\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f584e822-056a-4727-8e9c-8d6a81c0b4bb', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"Then came a little. - Cat again, sitting.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f5dd563d-e625-4bc8-a621-95f29dd2de05', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 3, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('f61e4344-a17a-4cad-a086-5faf4e272258', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 3, '{\"title\":\"New Job Post Published\",\"message\":\"Duck. \'Found IT,\'. - VERY turn-up nose.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/6\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f788f46d-8a30-4344-860b-af23d11d3112', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 10, '{\"title\":\"New Job Post Published\",\"message\":\"I\'m NOT a serpent. - Alice led the way.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f7e13e97-45bc-4b3a-a7b2-ee51311fd73f', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 12, '{\"title\":\"New Event Published\",\"message\":\"Gryphon: \'I went.\",\"action\":\"http:\\/\\/localhost\\/events\\/8\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f7fe0680-966a-4361-9568-114a08679539', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 12, '{\"title\":\"New Scholarship Published\",\"message\":\"Freeman Eichmann\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/7\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('f8ebaf9a-a2fb-4a23-a1f3-5d34d6c23902', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('f90d4954-3459-46fa-9b8b-38929c7f7637', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('f9a70a59-71d0-4901-b071-574bd7909a02', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 2, '{\"title\":\"New Event Published\",\"message\":\"Mary Ann, and be.\",\"action\":\"http:\\/\\/localhost\\/events\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('f9d22f7b-5d3c-48b5-b5fb-0d3ad5ffdab2', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 1, '{\"title\":\"New Event Published\",\"message\":\"Caterpillar. This.\",\"action\":\"http:\\/\\/localhost\\/events\\/5\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('fc546afd-8806-46c4-bffe-26fc899221c9', 'App\\Notifications\\NewJobPostPublished', 'App\\Models\\User', 1, '{\"title\":\"New Job Post Published\",\"message\":\"I\'ll set Dinah at. - I\'ve said as yet.\'.\",\"action\":\"http:\\/\\/localhost\\/job-posts\\/1\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('fcff5627-dd76-4656-9d50-6e18530b9b76', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 7, '{\"title\":\"New Event Published\",\"message\":\"So Alice began to.\",\"action\":\"http:\\/\\/localhost\\/events\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
('fd2617d8-2bd9-4a59-99f4-4f3eef74211b', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 4, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34'),
('fe3e7248-74d8-4be7-97f9-51e193d29cdd', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 10, '{\"title\":\"New Scholarship Published\",\"message\":\"Neoma Hermann V\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/9\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('fe6a2290-f99b-42ac-a959-423f6c712876', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 7, '{\"title\":\"New Scholarship Published\",\"message\":\"Dr. Bernardo Sporer\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/3\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ff1857e2-3f4e-421f-acf6-072c3c69e750', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 1, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ff1898d8-b1ca-4288-8be6-3fc5665f75ea', 'App\\Notifications\\NewScholarshipPublished', 'App\\Models\\User', 6, '{\"title\":\"New Scholarship Published\",\"message\":\"Annalise Wehner\",\"action\":\"http:\\/\\/localhost\\/scholarships\\/12\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
('ff22a7d7-ce59-4293-a470-86049b5355a4', 'App\\Notifications\\NewEventPublished', 'App\\Models\\User', 9, '{\"title\":\"New Event Published\",\"message\":\"I do wonder what.\",\"action\":\"http:\\/\\/localhost\\/events\\/10\",\"target\":\"_blank\"}', NULL, '2024-03-28 11:05:34', '2024-03-28 11:05:34');

-- --------------------------------------------------------

--
-- Table structure for table `organization_histories`
--

CREATE TABLE `organization_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `organization_name` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `period_start_date` date NOT NULL,
  `period_end_date` date DEFAULT NULL,
  `order_column` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organization_histories`
--

INSERT INTO `organization_histories` (`id`, `uuid`, `user_id`, `organization_name`, `role`, `period_start_date`, `period_end_date`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '403986d8-44c7-40fd-8781-cc526ea6dce7', 1, 'King sharply. \'Do.', 'Lobster; I heard.', '1971-01-21', '1983-04-24', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(2, '24345bf4-dbe6-4582-a9d0-d02287b6a2d5', 1, 'Alice doubtfully.', 'Pigeon, but in a.', '1985-12-26', '1972-09-08', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, '84034c0a-67cd-4f0d-957b-803ddeaf3685', 2, 'Tortoise because.', 'However, I\'ve got.', '1971-04-05', '1992-02-02', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, 'a6a8e830-4826-4a1d-b5c3-a3d85a082f41', 3, 'Alice did not like.', 'Gryphon. \'It all.', '1991-04-17', '1993-04-12', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(5, '45134a32-8d59-4d88-8c0a-e8e0e61bb76a', 1, 'Mock Turtle. \'No.', 'Alice, \'to pretend.', '1988-10-19', '1978-08-07', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(6, 'fdb4cfaa-8d0f-4ce9-9c53-d882631d9754', 2, 'As for pulling me.', 'Heads below!\' (a.', '2009-02-16', '2021-04-28', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(7, '548ae65c-f521-4794-b3f9-8fd97aad365e', 3, 'King, with an M?\'.', 'Seven flung down.', '1973-10-10', '2022-12-09', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(8, 'b550d6c3-9dbb-4990-9bc3-79bca49ac23f', 2, 'Cat; and this was.', 'English coast you.', '1987-02-25', '2016-09-13', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(9, '9f5fe6c2-e470-4426-b273-5dae41aabcee', 1, 'Hatter instead!\'.', 'Mock Turtle sighed.', '2009-08-24', '2010-05-18', 4, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, 'e395d8af-b36e-4971-89a6-96901550dfd2', 1, 'Mouse, turning to.', 'I should be like.', '2017-12-20', '1982-09-18', 5, '2024-03-28 11:05:33', '2024-03-28 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('yoga19201@gmail.com', '$2y$10$ffVvssIhlckPtczC6oc/T./lyBB4DGQRnAbK6DBC/Wo4F0K.oCAGS', '2024-04-01 09:24:52');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `code`) VALUES
(1, 'Aceh', '01'),
(2, 'Bali', '02'),
(3, 'Banten', '03'),
(4, 'Bengkulu', '04'),
(5, 'DI Yogyakarta', '05'),
(6, 'DKI Jakarta', '06'),
(7, 'Gorontalo', '07'),
(8, 'Jambi', '08'),
(9, 'Jawa Barat', '09'),
(10, 'Jawa Tengah', '10'),
(11, 'Jawa Timur', '11'),
(12, 'Kalimantan Barat', '12'),
(13, 'Kalimantan Selatan', '13'),
(14, 'Kalimantan Tengah', '14'),
(15, 'Kalimantan Timur', '15'),
(16, 'Kalimantan Utara', '16'),
(17, 'Kepulauan Bangka Belitung', '17'),
(18, 'Kepulauan Riau', '18'),
(19, 'Lampung', '19'),
(20, 'Maluku', '20'),
(21, 'Maluku Utara', '21'),
(22, 'Nusa Tenggara Barat', '22'),
(23, 'Nusa Tenggara Timur', '23'),
(24, 'Papua', '24'),
(25, 'Papua Barat', '25'),
(26, 'Riau', '26'),
(27, 'Sulawesi Barat', '27'),
(28, 'Sulawesi Selatan', '28'),
(29, 'Sulawesi Tengah', '29'),
(30, 'Sulawesi Tenggara', '30'),
(31, 'Sulawesi Utara', '31'),
(32, 'Sumatera Barat', '32'),
(33, 'Sumatera Selatan', '33'),
(34, 'Sumatera Utara', '34');

-- --------------------------------------------------------

--
-- Table structure for table `publications`
--

CREATE TABLE `publications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(200) NOT NULL,
  `author_name` varchar(200) NOT NULL,
  `type` tinyint(4) NOT NULL,
  `publisher` varchar(200) NOT NULL,
  `city` varchar(200) DEFAULT NULL,
  `publish_date` date NOT NULL,
  `order_column` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publications`
--

INSERT INTO `publications` (`id`, `uuid`, `user_id`, `title`, `author_name`, `type`, `publisher`, `city`, `publish_date`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '41deaf5d-6c68-4420-8b5c-2b0d5d5d8d01', 2, 'I almost.', 'I wonder?\' As she.', 3, 'And she squeezed.', 'When the.', '2019-05-13', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(2, 'c2829b37-e500-4e90-823f-d254c877fb84', 2, 'THAT\'S a.', 'Eaglet. \'I don\'t.', 5, 'Alice to herself.', 'For, you.', '1970-05-19', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, '3b0c317d-a859-4c57-a29a-6a2c21492ed5', 2, 'I didn\'t.', 'Alice could hardly.', 2, 'At last the Mock.', 'Dormouse.', '1972-04-26', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, '92850465-fca0-4d58-a815-f7411a5772fd', 3, 'King. \'I.', 'Conqueror.\' (For.', 3, 'For instance, if.', 'I\'d gone.', '1998-05-13', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(5, 'a9324d23-860f-45e0-b25b-85df6800ce07', 2, 'DOTH THE.', 'White Rabbit, with.', 6, 'March Hare. Alice.', 'Then she.', '1979-03-12', 4, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(6, '923db182-2e96-4a99-9e16-ded95e30c1f7', 2, 'SOMEBODY.', 'Alice. One of the.', 2, 'I wonder what they.', 'Queen of.', '2014-03-08', 5, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(7, 'c5288fa5-588f-46a2-b467-c1b1e825bf1b', 3, 'Dormouse.', 'Queen?\' said the.', 6, 'Pigeon. \'I\'m NOT a.', 'Alice, a.', '2004-06-15', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(8, 'f21edaf8-7535-427b-ae83-906d68aef182', 2, 'King and.', 'I was thinking I.', 5, 'Mock Turtle, who.', 'I wonder.', '2015-09-24', 6, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(9, '2661e9ab-4aa0-4498-99fe-615c5d443b91', 3, 'But they.', 'Duchess. \'I make.', 1, 'CAN have happened.', 'I had to.', '1986-09-20', 3, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, 'e9cf450c-c9ae-4126-829d-e119b2fbe371', 1, 'I should.', 'ME, and told me he.', 2, 'Ann, what ARE you.', 'Evidence.', '1995-08-30', 1, '2024-03-28 11:05:33', '2024-03-28 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `research`
--

CREATE TABLE `research` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `institution_name` varchar(200) NOT NULL,
  `sponsor_name` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `order_column` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `research`
--

INSERT INTO `research` (`id`, `uuid`, `user_id`, `name`, `role`, `institution_name`, `sponsor_name`, `start_date`, `end_date`, `order_column`, `created_at`, `updated_at`) VALUES
(1, 'fbda24a9-2f04-40de-adf2-05271d60a439', 2, 'I hadn\'t.', 'Dormouse.', 'March Hare. \'Yes.', 'Pennyworth only of.', '2014-07-16', '2019-08-22', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(2, '3c46f5e4-5638-4886-9dbd-742e3fa283e1', 3, 'Even the.', 'HIS time.', 'King, \'unless it.', 'Caterpillar. Here.', '1995-06-05', NULL, 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, '25183ef0-9756-4b4b-a654-6b77196fe5a1', 3, 'Alice as.', 'And with.', 'Alice did not wish.', 'There was nothing.', '1982-01-15', NULL, 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, '7ff102e0-27a7-4cd5-bd74-1f7efeb51481', 1, 'Duck and.', 'Soup, so.', 'Duchess; \'and most.', 'Let me see: that.', '2002-01-18', '2012-06-26', 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(5, '201f5f0e-a66e-4376-9c3d-c113fff2f99b', 3, 'Cat in a.', 'Dormouse.', 'Soup? Pennyworth.', 'As there seemed to.', '2003-11-15', '2021-02-19', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(6, '1eb6a61c-bad5-4a2b-af07-a4d55458f828', 1, 'Allow me.', 'I may as.', 'In the very middle.', 'Hatter hurriedly.', '2005-07-07', '1987-06-21', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(7, 'e74f4c98-4563-4cc5-bf44-9772b3c0bcfc', 3, 'All on a.', 'I hadn\'t.', 'Lobster Quadrille.', 'Dinah: I think I.', '2004-07-06', NULL, 4, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(8, 'c515865e-3901-4639-9c1c-c2cc83d1921e', 3, 'I know?\'.', 'I know I.', 'Alice thought she.', 'I\'ll try if I can.', '2008-12-23', NULL, 5, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(9, '26bb1af3-c6cc-4ed0-aa21-380098a0b9d8', 1, 'HIS time.', 'Latitude.', 'Bill! I wouldn\'t.', 'He trusts to you.', '2004-10-23', NULL, 3, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, '1716e241-bb33-4b4d-9684-e0f439744795', 1, 'She drew.', 'Said his.', 'Alice replied, so.', 'Alice, \'and those.', '1989-04-10', '1981-04-28', 4, '2024-03-28 11:05:33', '2024-03-28 11:05:33');

-- --------------------------------------------------------

--
-- Table structure for table `scholarships`
--

CREATE TABLE `scholarships` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `provider_name` varchar(200) NOT NULL,
  `registration_link` varchar(200) NOT NULL,
  `submission_deadline` datetime NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `scholarships`
--

INSERT INTO `scholarships` (`id`, `uuid`, `name`, `provider_name`, `registration_link`, `submission_deadline`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'd60a3cd8-b30c-4d96-93e6-978bb8f7ae52', 'Mr. Fabian Kerluke Jr.', 'Alice felt dreadfully puzzled. The Hatter\'s remark seemed to be a Caucus-race.\' \'What IS a.', 'http://www.simonis.com/nulla-qui-ab-ipsa-totam-ipsa-est-aut-possimus.html', '1973-02-16 06:20:20', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(2, 'f14529d1-1f23-4e00-85b3-ccc751ede4ae', 'Emely Senger', 'Dormouse!\' And they pinched it on both sides of it; and the Hatter with a soldier on each side.', 'http://fisher.org/asperiores-molestiae-pariatur-quae-voluptatibus-laborum-in-et.html', '1980-10-15 14:01:59', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(3, '25da12e5-6e1c-4265-8eca-635da23f1347', 'Dr. Bernardo Sporer', 'Gryphon hastily. \'Go on with the birds and animals that had fallen into a tree. \'Did you say it.\'.', 'http://leannon.info/exercitationem-sed-quia-aut-pariatur-sequi-est-harum.html', '2017-01-05 20:41:25', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(4, '909295cb-1a23-4fe7-a140-5051fc790f3d', 'Dr. Alexandro Stamm V', 'Eaglet, and several other curious creatures. Alice led the way, and the Queen till she fancied she.', 'http://www.kerluke.com/', '1979-03-14 00:44:21', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(5, '284d8c5f-49b9-4f01-b3e1-275ba17049ee', 'Marilyne Hansen', 'RETURNED FROM HIM TO YOU,\"\' said Alice. \'Come, let\'s try the whole thing, and longed to get her.', 'https://www.rice.net/qui-voluptatibus-voluptates-itaque-non-ratione-praesentium-fugiat', '2012-09-17 23:59:18', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(6, 'a107607b-3cfc-4b11-af8f-3756964ba27d', 'Gilberto Hirthe', 'Besides, SHE\'S she, and I\'m I, and--oh dear, how puzzling it all came different!\' Alice replied.', 'http://www.gleichner.info/aspernatur-ex-esse-ut-nisi-laudantium-aperiam', '2000-08-04 23:58:15', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(7, '24eae4b6-bac8-4012-b8f1-632220ad4bfc', 'Freeman Eichmann', 'They had not the right distance--but then I wonder what they\'ll do well enough; don\'t be.', 'http://www.marks.com/exercitationem-modi-accusantium-repudiandae-inventore', '2021-08-06 19:54:27', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(8, 'a34be46d-b95d-4751-883e-533672daafbf', 'Eriberto Jacobson', 'Rabbit was no use in saying anything more till the eyes appeared, and then said \'The fourth.\' \'Two.', 'https://www.flatley.biz/magnam-voluptatem-dignissimos-dolorum-est-inventore-eum', '2001-07-20 15:28:23', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(9, '3aad1ebc-74b9-4f5c-863d-ce9c7a4ab828', 'Neoma Hermann V', 'Gryphon, \'you first form into a line along the course, here and there stood the Queen put on one.', 'http://www.pfannerstill.com/', '1990-02-09 23:22:23', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(10, 'd5f6222f-b701-4f25-9b6e-9cbac2d93bf1', 'Gabrielle Ullrich', 'THIS witness.\' \'Well, if I was, I shouldn\'t want YOURS: I don\'t know of any use, now,\' thought.', 'http://boehm.info/ratione-cupiditate-sapiente-maxime-dolores-laborum.html', '2024-02-19 22:10:09', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(11, 'ab8f3732-08f3-41e5-a823-cb3cfc202716', 'Nikolas Veum', 'I ever saw one that size? Why, it fills the whole party swam to the Gryphon. \'I\'ve forgotten the.', 'https://www.mitchell.com/sit-cumque-beatae-nemo-eaque-mollitia', '1989-06-28 11:59:28', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35'),
(12, '6c5132d4-e730-4d0a-9730-a5dbbba37cf2', 'Annalise Wehner', 'Hatter and the others took the least notice of them can explain it,\' said the King, going up to.', 'http://adams.info/sapiente-fugiat-porro-ipsum-voluptatum-et-blanditiis', '1988-07-21 10:40:19', NULL, '2024-03-28 11:05:35', '2024-03-28 11:05:35');

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `category`, `price`, `image`, `link`, `created_at`, `updated_at`) VALUES
(1, 'Americanoba', 'Coffe', '150000', '6604ec9f0d71f.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80', 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462', '2024-03-28 11:05:51', '2024-04-06 08:03:06'),
(2, 'Americano', 'Coffe', '150000', '6604eca14c990.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80', 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462', '2024-03-28 11:05:53', '2024-03-28 11:05:53'),
(3, 'Americanoll', 'Coffe', '150000', '6604eca3aacca.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80', 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462', '2024-03-28 11:05:55', '2024-04-05 03:39:43'),
(4, 'Americano', 'Coffe', '150000', '6604eca5e6d8b.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1200&q=80', 'https://www.tokopedia.com/locknlock-id/locknlock-wanna-be-screw-tumbler-carry-handle-450ml-lhc4246-navy-fa462', '2024-03-28 11:05:57', '2024-03-28 11:05:57'),
(6, 'acar', 'makanan', '30000', '9XKyNmKToSAmKZNBefiJCKBdn1d2DhUujYvcfawp.jpg', 'https://id.wikipedia.org/wiki/Makanan', '2024-04-04 05:09:20', '2024-04-04 05:09:20'),
(7, 'kopi mirna', 'minuman', '100000', 'qUYTDA4bt8BlGvI4cw6rm8iXRA3brZEdPvXV1CkL.jpg', 'https://metro.tempo.co/read/1783525/kronologi-kasus-kopi-sianida-jessica-wongso-kapan-ditetapkan-tersangka-dan-vonis-20-tahun-penjara', '2024-04-05 03:37:34', '2024-04-05 03:37:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `uid` varchar(50) DEFAULT NULL,
  `serial_number` int(11) DEFAULT NULL,
  `name` varchar(200) NOT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 0,
  `email` varchar(200) NOT NULL,
  `locale` varchar(10) DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `place_of_birth` varchar(200) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `linkedin_profile` varchar(200) DEFAULT NULL,
  `instagram_profile` varchar(200) DEFAULT NULL,
  `province_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_expertise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `second_expertise_id` bigint(20) UNSIGNED DEFAULT NULL,
  `permanent_address` text DEFAULT NULL,
  `residence_address` text DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `uuid`, `uid`, `serial_number`, `name`, `gender`, `email`, `locale`, `email_verified_at`, `place_of_birth`, `date_of_birth`, `password`, `remember_token`, `linkedin_profile`, `instagram_profile`, `province_id`, `first_expertise_id`, `second_expertise_id`, `permanent_address`, `residence_address`, `bio`, `is_admin`, `created_at`, `updated_at`) VALUES
(1, '23cc9573-c7fc-47bd-a599-3666587a9de2', NULL, NULL, 'Zainal Hasan', 9, 'mail@zhanang.idadad', 'id', '2024-03-28 04:05:31', NULL, NULL, '$2y$10$3iMrVT3YTkNTcTNCUFpXkO9R5ZNcl4wvb6aeCnXOzbjmkpD/NQMjq', 'AK0hfSTI9io8tV9rkSkH0pY2AwqOab72bfWsHtl37iMmRzbM9Kro7Gtz08CZ', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 1, 1, 2, 'Quas et qui at numquam fuga occaecati et. Velit sunt eos ut exercitationem cupiditate.', 'Corrupti deserunt est qui. Repudiandae rerum voluptatem ratione vero.', 'Quaerat nobis nostrum aut consequuntur ab. Ipsum ullam voluptate alias omnis.', 3, '2024-03-28 11:05:31', '2024-04-06 22:23:17'),
(2, 'f1170e0a-d6b7-42dd-8139-d463db21c830', NULL, NULL, 'Elian Wuckert', 2, 'kmorar@example.net', 'id', '2024-03-28 04:05:31', NULL, NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XEbUldkEsztrrjQmyrZBCUS5Y6CI6PIjtggJryJITskZEOdnTUS7hldolzGS', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 30, 15, 7, 'Nostrum perspiciatis magni culpa voluptatum. Possimus dolorem ducimus nulla non ex.', 'Inventore qui qui quia magni. Soluta asperiores id atque omnis et ut dolor. Esse ut rerum optio.', 'Laborum in et perferendis. Est quidem officiis quia est perspiciatis voluptas numquam. Ut at suscipit voluptatibus eum ducimus consequuntur ut. Saepe nisi vero illo dolorum dicta voluptatem.', 2, '2024-03-28 11:05:32', '2024-04-03 14:46:09'),
(3, 'd0032e7c-b534-487d-841a-887d43d7febe', NULL, NULL, 'River Kemmer', 1, 'earnestine54@example.org', NULL, '2024-03-28 04:05:32', 'Alice for protection. \'You shan\'t be able! I shall ever see such a very interesting dance to watch,\' said Alice, \'a great girl like you,\' (she might well say that \"I see what I like\"!\' \'You might.', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sZIrmuikDLPW36LJ2uHu7V1r0pRmjb2c4QrVoHExub8Kdoj5KYZvF019Tlqs', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 17, 3, 6, 'Eum voluptas unde vel quisquam. Ut fugit veritatis fuga voluptates doloribus non.', 'Ex corrupti ipsa dolorem expedita. Facere harum possimus quia ad.', 'Voluptas explicabo quam quo quos eum. Consequatur quia dolorum accusantium ut ut inventore labore. Et pariatur doloribus voluptas accusantium error aliquam expedita voluptas.', 0, '2024-03-28 11:05:32', '2024-04-06 22:33:32'),
(4, '8f7dc5b3-7205-4ff9-a76a-a9bbffe4942c', NULL, NULL, 'Arvel Kiehn', 2, 'maeve64@example.org', 'id', '2024-03-28 04:05:33', NULL, '1986-01-10', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Dx0l8jyu1Tc7G87dwfrko98EmGxIdHxO9SBGProjwgXw9IEFmtMjJ4L81nzv', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 34, 19, 7, 'Quos animi excepturi fugit voluptate quam. Est provident at qui non. Quis rem vitae qui et.', 'Quia in ex quia optio. Maxime neque placeat rerum molestias nihil et necessitatibus tenetur.', 'Debitis nulla ea iure. Et consequatur dolor numquam dolores dolore. Sunt assumenda dolorem earum quia. Quod qui enim error quasi fuga cumque.', 0, '2024-03-28 11:05:33', '2024-04-06 15:49:45'),
(5, '3bf96ab2-412c-4454-98e8-d90c9b4278ab', '2300240001', 1, 'Cyrus Nienow', 1, 'lew.bayer@example.com', NULL, '2024-03-28 04:05:33', 'Alice, as the Caterpillar contemptuously. \'Who are YOU?\' said the Pigeon. \'I\'m NOT a serpent!\' said Alice to herself, \'Why, they\'re only a pack of cards, after all. \"--SAID I COULD NOT SWIM--\" you.', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pqYVmfWTHjYh8tfIDosorKHPdMolPhiK9kEy6Q3buUJelq9jUK4uHCqBDyyc', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 23, 5, 15, 'Suscipit in sequi incidunt quod quo ut. Qui reprehenderit veniam delectus assumenda reiciendis.', 'Libero illum aliquid cupiditate beatae. Rerum est molestiae quis voluptas quibusdam.', 'Cumque esse ut quisquam. Possimus ut aut est repudiandae quidem. Et omnis voluptatem esse quisquam aut reiciendis.', 1, '2024-03-28 11:05:33', '2024-04-06 19:52:31'),
(6, '28a20c9d-c873-4de0-88f3-e092c6889b16', NULL, NULL, 'Rocio Wolf', 9, 'hmurray@example.org', NULL, '2024-03-28 04:05:33', NULL, '1991-01-05', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Kl61g0kVUY1OrQ1DTCNR50UTj2IQTD7LUC7CBUtAZTCNfvNqS6H0yf9W7poI', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 15, 18, 10, 'Aspernatur qui distinctio aut placeat sint accusamus omnis ut. Sit deserunt rerum eaque aut rerum.', 'Sed ut temporibus quidem ut fuga. Sed cumque et voluptas. Minima at delectus quis quaerat quod.', 'Ut eos fugit harum ipsam et nihil. Voluptas ut dolores ratione facilis repudiandae voluptas vero sint. Ipsam quae et qui impedit recusandae architecto consequuntur.', 0, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(8, '1ddd475e-4d65-4e2f-baa9-2db1b83e4a00', '2600240001', 1, 'Kaya Pfeffer', 1, 'rpredovic@example.org', NULL, '2024-03-28 04:05:33', NULL, '2014-08-14', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nZ3mdhEefBeUPDSD0gMLuMopH3QzTAPyfNjFMPzv2uxYTadHlBu1bhHimKdw', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 26, 23, 4, 'Qui vitae magnam delectus cum suscipit. Sint veniam rerum omnis qui recusandae necessitatibus sit.', 'Sunt voluptatum pariatur id facilis ipsam sunt. Quidem quis ipsum libero qui mollitia voluptatem.', 'Sint consequatur aut modi labore id. Sit praesentium nihil animi totam omnis.', 1, '2024-03-28 11:05:33', '2024-04-06 22:01:11'),
(9, '32fcc70f-bec2-458f-82d3-50f83bbf6ede', NULL, NULL, 'Nya Hayes', 0, 'sokon@example.org', NULL, '2024-03-28 04:05:33', NULL, '1979-07-02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ho0p6HUp518SdaYCQLdeZb82UrXdZLZf2s0tnUsaw8atNun4MvU7vvpOIGA7', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 19, 25, 16, 'Non libero aliquid odit a. Et ut dolor autem nobis amet ab. Eius odit dolorem quis enim.', 'Qui libero pariatur voluptatem ut minima enim. Error culpa eveniet aut est.', 'Ut soluta labore sed ducimus. Quia autem et ducimus aperiam quaerat. Molestiae id incidunt voluptas quam quis dolorem voluptate. Modi rerum quo excepturi.', 0, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, '53401451-dd91-4b3f-9bc8-e3119ee4a89a', NULL, NULL, 'Geo Hessel', 9, 'sawayn.adonis@example.com', NULL, '2024-03-28 04:05:33', 'ARE you talking to?\' said one of the Mock Turtle drew a long breath, and said anxiously to herself, \'it would have appeared to them she heard a voice sometimes choked with sobs, to sing \"Twinkle.', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NzlemtMI14fYBpBAzXL7kvte3AwPlL3k0TuV3Axp4CzGdQPIu0AhBiXHjiPX', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 21, 15, 21, 'Et incidunt deleniti nam debitis corrupti beatae dolores. Qui id voluptatem beatae omnis ut.', 'Minima ratione quas est quo labore blanditiis voluptas. Iusto accusantium et quos.', 'Ea deleniti voluptatem quaerat laborum suscipit quasi. Perferendis est debitis nihil est non dolore repellendus. Porro sequi repudiandae et.', 0, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(12, '5deead52-3150-4e78-93b7-1f4927a8d4da', '1800240001', 1, 'Chandler Kutch', 2, 'west.amy@example.org', NULL, '2024-03-28 04:05:33', 'I give you fair warning,\' shouted the Queen. \'Can you play croquet with the words \'DRINK ME,\' but nevertheless she uncorked it and put back into the earth. Let me see: I\'ll give them a railway.', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qOuuXuhEd92JUetDkCCNvh97maP57sKniofY7JA4UjWuulssTOVcyUDbqCIq', 'https://www.linkedin.com/in/user', 'https://instagram.com/user', 18, 1, 13, 'Perferendis qui in consequuntur et et ut quo. Perspiciatis aut deserunt laudantium quis.', 'Sint id modi eum maiores qui. Quia ullam minus rem.', 'Sed voluptates officia voluptatem id vitae culpa deserunt. Veritatis laborum et ipsam sed culpa. Ut vel non quidem quas quasi voluptas quis.', 0, '2024-03-28 11:05:33', '2024-04-02 13:01:21'),
(13, '00b8ceac-186c-44f5-bb09-4133ce14529f', '0300240001', 1, 'Yoga', 1, 'yoga19201@gmail.com', 'id', '2024-03-28 04:07:26', NULL, NULL, '$2y$10$sZRd9W6wknoZufcT9RBwHuZpexzncNREHiLN2JBmfiE1zDjwCnghO', NULL, NULL, NULL, 3, 1, 16, NULL, NULL, NULL, 2, '2024-03-28 11:06:28', '2024-04-10 08:57:22'),
(14, 'bb65abb6-4bfd-4be4-b396-acfa7b17c289', '00121012', 1, 'marcel', 1, 'marcrlinoferdinan@gmail.com', NULL, '2024-03-28 04:07:26', NULL, NULL, '$2y$10$9gKN3bVyls526i0ZCo1J6.4d6m3zfCCg06DAQX98mk2GM2NhgsNhG', NULL, NULL, NULL, 7, 1, 17, NULL, NULL, NULL, 0, '2024-03-30 21:52:05', '2024-04-02 12:28:14'),
(15, 'b3219a1f-b1d5-4572-ac8e-56b9cf11cc96', NULL, NULL, 'dzaki', 1, 'm.dzakiyyudin@gmail.com', NULL, '2024-03-28 04:07:26', NULL, NULL, '$2y$10$CGLc5lWFCsAx.KNuM4sV1OOLmQrmHrBMLqm24LoKO0HDBJ88fStku', NULL, NULL, NULL, 5, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-01 10:57:55', '2024-04-01 10:57:55'),
(17, '60cefb9a-bb6c-4fe8-9799-7c29e2d5504e', NULL, NULL, 'daaaa', 1, 'muhammad.dzakiyyudin.te20@mhsw.pnj.ac.id', NULL, NULL, NULL, NULL, '$2y$10$BqFBaCrl3ArvJA1jI/iNKuU5RMpZ9arqeRvS0CWW7IWdlmsm63md2', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-02 11:20:22', '2024-04-02 11:20:22'),
(18, '06ee233e-230c-4b02-85a9-6e2e21a8eb99', NULL, NULL, 'aakdkadwa', 2, 'aakdkadwa@gmail.com', NULL, NULL, NULL, NULL, '$2y$10$nMOb8JFnJXf2NukWaBbk5.VCVohN8NvfK.0mFlNGeae/UYf1nbtyK', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-02 11:21:05', '2024-04-02 11:21:05'),
(19, '8f8f35ea-e895-4ab2-9c3b-5d007f48fcda', '0100240001', 1, 'aakdkadwaaakdkadwa', 1, 'aakdkadwaaakdkadwa@gmail.com', NULL, '2024-03-28 04:07:26', NULL, NULL, '$2y$10$IPsD2luGGrta/jubWNZ4SOL9aNT9fp9kq4UTwVuQV8HN9jsNH9X2u', NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, '2024-04-02 11:21:35', '2024-04-06 15:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `work_experiences`
--

CREATE TABLE `work_experiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` char(36) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `position_title` varchar(200) NOT NULL,
  `company_name` varchar(200) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `order_column` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `work_experiences`
--

INSERT INTO `work_experiences` (`id`, `uuid`, `user_id`, `position_title`, `company_name`, `start_date`, `end_date`, `order_column`, `created_at`, `updated_at`) VALUES
(1, '10267b37-f821-4939-82e1-c25aff075ca6', 1, 'Alice replied very.', 'Hatter. Alice felt.', '1997-10-30', NULL, 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(2, '33c3e35a-77ff-4927-8fa1-617f60f1a221', 2, 'King. \'I can\'t go.', 'Alice; and Alice.', '1985-02-05', NULL, 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(3, '90da6ba4-e8cd-4486-94f7-55486a061331', 1, 'WHAT things?\' said.', 'I must be what he.', '2022-07-14', NULL, 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(4, '3c4b3df7-93ed-4870-976a-79441ffbd703', 2, 'Alice caught the.', 'White Rabbit blew.', '1986-04-25', '2001-07-31', 2, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(5, '6732c55c-34c0-4538-a1ae-55208e50294e', 1, 'So Alice began to.', 'Eaglet. \'I don\'t.', '1977-04-23', '1993-01-01', 3, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(6, 'cda8ce8a-efc3-4366-ad4c-bf9a7c3972d4', 3, 'She generally gave.', 'Caterpillar. \'Is.', '1992-01-14', NULL, 1, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(7, 'b99e0c8c-1476-4875-83f9-ee65ad612f40', 1, 'English coast you.', 'Queen in a Little.', '2000-10-16', NULL, 4, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(8, 'b1bc8f79-1869-41d5-bcd7-04d6988ba171', 1, 'King hastily said.', 'As she said these.', '2003-04-30', '2020-12-10', 5, '2024-03-28 11:05:32', '2024-03-28 11:05:32'),
(9, '1e61d712-ee75-4914-a6bc-924d1cc6c993', 2, 'Alice, \'Have you.', 'CHAPTER VIII. The.', '1971-04-12', '2018-12-15', 3, '2024-03-28 11:05:33', '2024-03-28 11:05:33'),
(10, 'cf985563-1410-4224-b5c4-d74c3ff58a8d', 3, 'King said to the.', 'This is the driest.', '1991-09-15', '2009-05-21', 2, '2024-03-28 11:05:33', '2024-03-28 11:05:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement_histories`
--
ALTER TABLE `achievement_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `achievement_histories_uuid_unique` (`uuid`),
  ADD KEY `achievement_histories_user_id_foreign` (`user_id`),
  ADD KEY `achievement_histories_award_name_index` (`award_name`);

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dedications`
--
ALTER TABLE `dedications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dedications_uuid_unique` (`uuid`),
  ADD KEY `dedications_user_id_foreign` (`user_id`);

--
-- Indexes for table `education_histories`
--
ALTER TABLE `education_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `education_histories_uuid_unique` (`uuid`),
  ADD KEY `education_histories_user_id_foreign` (`user_id`),
  ADD KEY `education_histories_institution_name_index` (`institution_name`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `events_uuid_unique` (`uuid`),
  ADD KEY `events_name_index` (`name`),
  ADD KEY `events_organizer_name_index` (`organizer_name`);

--
-- Indexes for table `expertises`
--
ALTER TABLE `expertises`
  ADD PRIMARY KEY (`id`),
  ADD KEY `expertises_name_index` (`name`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_posts`
--
ALTER TABLE `job_posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `job_posts_uuid_unique` (`uuid`),
  ADD KEY `job_posts_position_title_index` (`position_title`),
  ADD KEY `job_posts_company_name_index` (`company_name`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `media_uuid_unique` (`uuid`),
  ADD KEY `media_model_type_model_id_index` (`model_type`,`model_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `memberships_user_id_foreign` (`user_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `organization_histories`
--
ALTER TABLE `organization_histories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organization_histories_uuid_unique` (`uuid`),
  ADD KEY `organization_histories_user_id_foreign` (`user_id`),
  ADD KEY `organization_histories_organization_name_index` (`organization_name`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `provinces_name_index` (`name`),
  ADD KEY `provinces_code_index` (`code`);

--
-- Indexes for table `publications`
--
ALTER TABLE `publications`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `publications_uuid_unique` (`uuid`),
  ADD KEY `publications_user_id_foreign` (`user_id`),
  ADD KEY `publications_title_index` (`title`),
  ADD KEY `publications_author_name_index` (`author_name`);

--
-- Indexes for table `research`
--
ALTER TABLE `research`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `research_uuid_unique` (`uuid`),
  ADD KEY `research_user_id_foreign` (`user_id`);

--
-- Indexes for table `scholarships`
--
ALTER TABLE `scholarships`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `scholarships_uuid_unique` (`uuid`),
  ADD KEY `scholarships_name_index` (`name`),
  ADD KEY `scholarships_provider_name_index` (`provider_name`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_uuid_unique` (`uuid`),
  ADD KEY `users_province_id_foreign` (`province_id`),
  ADD KEY `users_first_expertise_id_foreign` (`first_expertise_id`),
  ADD KEY `users_second_expertise_id_foreign` (`second_expertise_id`),
  ADD KEY `users_uid_index` (`uid`),
  ADD KEY `users_name_index` (`name`),
  ADD KEY `users_email_index` (`email`);

--
-- Indexes for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `work_experiences_uuid_unique` (`uuid`),
  ADD KEY `work_experiences_user_id_foreign` (`user_id`),
  ADD KEY `work_experiences_position_title_index` (`position_title`),
  ADD KEY `work_experiences_company_name_index` (`company_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement_histories`
--
ALTER TABLE `achievement_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dedications`
--
ALTER TABLE `dedications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `education_histories`
--
ALTER TABLE `education_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `expertises`
--
ALTER TABLE `expertises`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_posts`
--
ALTER TABLE `job_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `organization_histories`
--
ALTER TABLE `organization_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `publications`
--
ALTER TABLE `publications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `research`
--
ALTER TABLE `research`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `scholarships`
--
ALTER TABLE `scholarships`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `work_experiences`
--
ALTER TABLE `work_experiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achievement_histories`
--
ALTER TABLE `achievement_histories`
  ADD CONSTRAINT `achievement_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `dedications`
--
ALTER TABLE `dedications`
  ADD CONSTRAINT `dedications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `education_histories`
--
ALTER TABLE `education_histories`
  ADD CONSTRAINT `education_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `memberships`
--
ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `organization_histories`
--
ALTER TABLE `organization_histories`
  ADD CONSTRAINT `organization_histories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `publications`
--
ALTER TABLE `publications`
  ADD CONSTRAINT `publications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `research`
--
ALTER TABLE `research`
  ADD CONSTRAINT `research_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_first_expertise_id_foreign` FOREIGN KEY (`first_expertise_id`) REFERENCES `expertises` (`id`),
  ADD CONSTRAINT `users_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`),
  ADD CONSTRAINT `users_second_expertise_id_foreign` FOREIGN KEY (`second_expertise_id`) REFERENCES `expertises` (`id`);

--
-- Constraints for table `work_experiences`
--
ALTER TABLE `work_experiences`
  ADD CONSTRAINT `work_experiences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
