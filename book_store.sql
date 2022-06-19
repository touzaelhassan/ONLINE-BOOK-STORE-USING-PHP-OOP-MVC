-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2022 at 03:37 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `email`) VALUES
(1, 'Hayden Tucker', 'nevaxyqyr@mailinator.com'),
(2, 'Jemima Beasley', 'jitidigyha@mailinator.com'),
(3, 'Christen Newman', 'rilikod@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `copies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `category_id`, `publisher_id`, `author_id`, `title`, `description`, `image`, `price`, `copies`) VALUES
(16, 4, 2, 1, 'Think Outside The Box', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'book3.jpg', 14, 6),
(17, 3, 5, 1, 'Omnis ratione explic', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'book2.jpg', 11, 28),
(18, 3, 3, 3, 'Est sint deserunt e', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'book1.jpg', 13, 23),
(19, 4, 4, 1, 'Modi et harum rerum ', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'book4.jpg', 15, 9),
(20, 2, 4, 2, 'Maxime error porro i', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'book5.jpg', 18, 13),
(25, 1, 4, 3, 'Natus autem accusamu', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'vector-motivational-book-cover-with-hand-lettering.jpg', 22, 1),
(26, 3, 2, 3, 'Adipisci animi inci', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'philosophy-book-with-philosophy-quotes-and-space-illustration-book-cover-template-vector.jpg', 19, 24),
(27, 3, 4, 3, 'Nulla eum totam ea i', 'Thinking outside the box is a metaphor m that means to think differently from a new perspective This phrase often refers to creative thinking. This term is thought m to derive from management consultants in the 1970s and 1980s challenging their clients to solve the \"nine dots\" puzzle this solution requires some lateral thinking.', 'philosophy-book-with-philosophy-quotes-and-yin-yang-shape-illustration-book-cover-template-vector.jpg', 12, 99);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'design', 'Web design encompasses many different skills and disciplines in the production and maintenance of websites'),
(2, 'coding', 'Coding, sometimes called computer programming, is how we communicate with computers.'),
(3, 'marketing', 'Marketing is the process of exploring, creating, and delivering value to meet the needs of a target market.'),
(4, 'technology', 'Technology is the result of accumulated knowledge used in industrial production and scientific research.'),
(10, 'motivation', 'Motivation is what explains why people or animals initiate, continue or terminate a certain behavior at a particular time.');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `address`) VALUES
(1, 'Axel Bennett', 'Molestiae at id plac'),
(2, 'PubBook', 'Florida, 550 S Rosemary Ave'),
(3, 'Alexandra Sanford', 'Ullam et doloremque'),
(4, 'Nasim Lindsay', 'Aut sed enim aut et'),
(5, 'Tobias Diaz', 'Qui nisi atque dolor');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(1, 'hassan', 'hassan@gmail.com', '$2y$10$e6q33tEQSyEzOj/ngcikMua8mRdzsSmPua7Lm2vVt.1Jq0Dt.n6mW', 1),
(10, 'mustapha', 'mustapha@gmail.com', '$2y$10$2YQZkCSDHkGJZn6HWbrkVOKUqEuqqUYP9s7eoVE6kegw8IEYQDsm.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_book`
--

CREATE TABLE `user_book` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `copies` varchar(255) NOT NULL,
  `Bought` int(11) NOT NULL DEFAULT 0,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_book`
--

INSERT INTO `user_book` (`id`, `user_id`, `book_id`, `copies`, `Bought`, `price`) VALUES
(150, 1, 16, '2', 1, 14),
(151, 1, 17, '3', 1, 11),
(152, 1, 19, '1', 1, 15),
(154, 1, 17, '1', 0, 11),
(155, 1, 16, '1', 0, 14),
(156, 1, 19, '1', 0, 15),
(157, 10, 16, '1', 1, 14),
(161, 10, 20, '1', 1, 18),
(162, 10, 18, '1', 0, 13),
(163, 10, 19, '1', 0, 15),
(164, 10, 17, '1', 0, 11);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `publisher_id` (`publisher_id`),
  ADD KEY `author_id` (`author_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_book`
--
ALTER TABLE `user_book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `book_id` (`book_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_book`
--
ALTER TABLE `user_book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `books_ibfk_3` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_book`
--
ALTER TABLE `user_book`
  ADD CONSTRAINT `user_book_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_book_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
