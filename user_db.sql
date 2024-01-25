-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2024 at 06:05 PM
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
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `author` varchar(255) NOT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `publication_year` int(11) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `cover_image` varchar(255) DEFAULT NULL,
  `last_modified_by` varchar(255) DEFAULT NULL,
  `last_modified_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `description`, `price`, `author`, `genre`, `publication_year`, `isbn`, `created_at`, `cover_image`, `last_modified_by`, `last_modified_at`) VALUES
(1, 'THE SUBTLE ART OF NOT GIVING A F*CK!', 'The Subtle Art of Not Giving a F*ck\" is a self-help book that challenges conventional notions of positive thinking and encourages readers to embrace life\'s challenges and limitations.', 9.99, 'Mark Manson', 'Modern', 2018, '978-0743273565', '2024-01-23 18:09:06', '../resources/0005000216.jpg', 'Melos2', '2024-01-24 11:10:28'),
(2, 'Company of One', '\"Company of One\" by Paul Jarvis is a business book that challenges the traditional notions of entrepreneurship and growth. Jarvis advocates for the idea that staying small and maintaining a solo operation can be a strategic advantage. ', 15.99, 'Paul Jarvis', 'Fiction', 2019, '752-0061120084', '2024-01-23 18:09:06', '../resources/0005000217.jpg', NULL, '2024-01-24 09:33:56'),
(3, 'Milk and honey', '\"Milk and Honey\" by Rupi Kaur is a poetry collection that delves into the themes of love, loss, healing, and empowerment. Divided into four chapters, the book takes readers on a profound journey through the raw and emotional experiences of life. Kaur\'s poetry is characterized by its simplicity, yet it carries a powerful and impactful message.', 39.99, 'Rupi Kaur', 'Love', 2020, '652-0451524935', '2024-01-23 18:09:06', '../resources/0005000218.jpg', NULL, '2024-01-24 09:33:56'),
(4, 'The Chronicles of Narnia', '\"The Chronicles of Narnia\" by C.S. Lewis is a classic fantasy series that consists of seven books, each chronicling the adventures and magical experiences of children in the fictional land of Narnia. ', 15.99, 'C.S Lewis', 'Fiction', 2020, '584-0451524935', '2024-01-23 18:09:06', '../resources/0005000219.jpg', NULL, '2024-01-24 09:33:56'),
(5, 'The Two Towers', '\"The Two Towers\" is the second book in J.R.R. Tolkien\'s epic fantasy trilogy, \"The Lord of the Rings.\" The story continues the journey of the characters introduced in the first book, \"The Fellowship of the Ring,\" as they navigate the vast and perilous landscapes of Middle-earth.', 19.99, 'J-R-R Tolkien', 'Controversy', 2010, '978-045153245', '2024-01-23 18:09:06', '../resources/0005000220.jpg', NULL, '2024-01-24 09:33:56'),
(6, 'Elegy for Kosovo', '\"Elegy for Kosovo\" is a novel by Albanian author Ismail Kadare. The book delves into the historical and cultural complexities surrounding the Battle of Kosovo, a pivotal event that took place in 1389 between the Ottoman Empire and a coalition of European powers.', 59.99, 'Ismail Kadare', 'War', 2000, '1708-04515241912', '2024-01-23 18:09:06', '../resources/0005000215.jpg', NULL, '2024-01-24 09:33:56'),
(17, 'Mere Christianity', 'Mere Christianity is a book by C.S Lewis, where he talks about his journey in christianity', 9.99, 'C.S Lewis', 'Religion', 2023, '8312-12312412', '2024-01-24 11:36:14', '../resources/0005000221.jpg', 'Melos2', '2024-01-24 11:36:14');

-- --------------------------------------------------------

--
-- Table structure for table `book_updates`
--

CREATE TABLE `book_updates` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_updates`
--

INSERT INTO `book_updates` (`id`, `book_id`, `updated_by`, `updated_at`) VALUES
(1, 1, 'Melos', '2024-01-24 10:04:41'),
(2, 1, 'Melos', '2024-01-24 10:05:48'),
(3, 1, 'Melos2', '2024-01-24 10:30:54'),
(4, 1, 'Melos2', '2024-01-24 10:32:12'),
(5, 1, 'Melos2', '2024-01-24 10:32:35'),
(6, 1, 'Melos2', '2024-01-24 10:33:10'),
(7, 1, 'Melos2', '2024-01-24 10:33:24'),
(8, 1, 'Melos2', '2024-01-24 10:33:33'),
(9, 1, 'Melos2', '2024-01-24 11:10:28');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `log_id` int(11) NOT NULL,
  `admin_name` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `book_id` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`log_id`, `admin_name`, `action`, `book_id`, `timestamp`) VALUES
(1, 'Melos2', 'Added book: Test by Melos', 26, '2024-01-24 12:38:11'),
(2, 'Melos2', 'Deleted book: Test by Melos', 0, '2024-01-24 12:38:24'),
(3, 'Melos2', 'Added book: Test by Melos', 27, '2024-01-24 12:39:46'),
(4, 'Melos2', 'Updated book details: Test by Melos to An actual Book by Melos', 0, '2024-01-24 12:40:01'),
(5, 'Melos ', 'Deleted book: An actual Book by Melos', 0, '2024-01-24 12:41:34'),
(6, 'Melos ', 'Added book: Test by Melos', 28, '2024-01-24 12:41:57'),
(7, 'Melos ', 'Deleted book: Test by Melos', 0, '2024-01-24 12:42:04'),
(8, 'root', 'Added book: Test by Melos', 29, '2024-01-25 10:38:30'),
(9, 'root', 'Added book: Test by Melos', 30, '2024-01-25 10:39:25'),
(10, 'root', 'Added book: Test by Melos', 31, '2024-01-25 10:40:05'),
(11, 'root', 'Updated book details: Test by Melos to Omg by testing', 0, '2024-01-25 10:40:25'),
(12, 'root', 'Updated book details: Test by Melos to Testing by Paul', 0, '2024-01-25 10:40:31'),
(13, 'root', 'Updated book details: Test by Melos to Paul by is Testing', 0, '2024-01-25 10:40:37'),
(14, 'root', 'Deleted book: Omg by testing', 0, '2024-01-25 10:41:10'),
(15, 'root', 'Deleted book: Testing by Paul', 0, '2024-01-25 10:41:12'),
(16, 'root', 'Deleted book: Paul by is Testing', 0, '2024-01-25 10:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_form`
--

CREATE TABLE `user_form` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_form`
--

INSERT INTO `user_form` (`id`, `name`, `email`, `password`, `user_type`) VALUES
(23, 'Melos', 'melosbobi@email.com', '$2y$10$sZAOWrNuP.eqeE.LE5g2oOKqIa.4iZjHJzm3BMjqBjvuiOIgXS5Ae', 'user'),
(25, 'root', 'root@email.com', '$2y$10$/f55S8VyPfPfLRxIuU/MqOUUvktHgdeprMMPMOCcM0eRwqqL09RxK', 'admin'),
(29, 'Melos', 'melosbobi@gmail.com', '$2y$10$vVkzi.aZ.g5mP4MqObee.egKhFPhtilRwl1798.p1PfYB72oDkvP.', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_updates`
--
ALTER TABLE `book_updates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_updates_ibfk_1` (`book_id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_form`
--
ALTER TABLE `user_form`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `book_updates`
--
ALTER TABLE `book_updates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_form`
--
ALTER TABLE `user_form`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_updates`
--
ALTER TABLE `book_updates`
  ADD CONSTRAINT `book_updates_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
