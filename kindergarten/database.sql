-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 24 Lut 2023, 08:46
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `kindergarten`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `classes`
--

INSERT INTO `classes` (`id`, `name`, `description`) VALUES
(1, 'Gymnastics ', 'We provide developmentally appropriate gym activities to enhance each child’s growth. Well trained instructors introduce children to the basics of gym class in creative and fun ways. Gymnastic classes help children to become more successful. By introducing younger children to the basics of body movement in a fun way, they can develop a lifetime interest in gymnastics and other sports. This means your child will be more likely to be physically active later in life.\r\n'),
(2, 'Music', 'In our children’s music classes, young musicians listen to rhythm, melodies and play a diversity of percussion instruments in every session. Our engaging and stimulating classes help children develop the coordination and motor skills needed to follow the beat and timing of fun songs. All enrichment programs are age-appropriate and family friendly to encourage cognitive development and strengthen memory in the classroom and at home.\r\n'),
(3, 'Little Chef Cooking School', 'Little Chef Cooking School, founded in 2007, offers hands-on cooking classes to kids and families. The class\' mission is to “open your eyes to the joy of cooking”, and to have fun while learning new skills. Kids pick their own menu at Cooking Birthday Parties (also in English, French, Italian, and Russian) and discover culinary Warsaw at Cooking Day Camp (summer and winter). Young chefs also have fun and learn cooking at Camps by the Baltic Sea and sail-and-cook at Little Chef Globtroter Sailing Camp in Mazury.'),
(4, 'Hiking Green Trees Class', 'Hiking Green Trees Class offers walks in the woods near the kindergarten building. Going on a hike is a great way to encourage kids to be active and connect with nature A light hike offers beneficial cardiovascular exercise, for sure, but perhaps more important in today\'s world of highly groomed playspaces, a trail hike can offer kids opportunities to traverse rocks, navigate exposed roots, and climb over fallen trees, building balance and agility.'),
(5, 'English Lessons', 'Our teachers and staff members prioritise the safety and happiness of our students. The team is experienced in moving children from place to place and in engaging with them whilst in transit. We use the time on the Tube or bus as an opportunity to speak and interact with the children, drawing out the shy ones from their shells. Our experienced, native English-speaking teachers, teaching assistants and workshop leaders encourage the children to \'have a go\' at expressing their thoughts in English as much as possible.'),
(6, 'Drawing Class', 'In this class, your child will be introduced to basic art techniques. Designed to give your child the chance to explore a wide range of materials and media, the class covers model making, printmaking, puppetry, painting and drawing. Children will explore the great world are art using oil pastels, clay, paper and paint. This unique learning experience places an emphasis on having fun while exploring creativity!');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `groups`
--

INSERT INTO `groups` (`id`, `name`, `id_teacher`) VALUES
(1, 'Four Squares', 4),
(2, 'Happy Trails Group', 6),
(3, 'Stepping Stones', 5),
(4, 'Artistic Hands', 9);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kid`
--

CREATE TABLE `kid` (
  `id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `pesel` char(11) NOT NULL,
  `gender` char(1) NOT NULL,
  `birthday` char(4) NOT NULL,
  `id_gr` int(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `id_parent` int(11) NOT NULL,
  `date_start` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `kid`
--

INSERT INTO `kid` (`id`, `first_name`, `last_name`, `pesel`, `gender`, `birthday`, `id_gr`, `address`, `id_parent`, `date_start`) VALUES
(2, 'Oktawia', 'Zawadzka', '20231233149', 'f', '2020', 1, 'ul. Strykowska 102', 7, '2023-01-01'),
(3, 'Dariusz', 'Zawadzki', '19240441959', 'm', '2019', 1, 'ul. Strykowska 102', 7, '2023-02-11'),
(6, 'Eryk', 'Zawadzki', '20301294339', 'm', '2020', 1, 'ul. Strykowska 12', 7, '2023-04-05'),
(10, 'Mariusz', 'Wiśniewski', '19250681116', 'm', '2019', 3, 'ul. Zmienna 16', 8, '2023-07-03'),
(11, 'Anna', 'Górecka', '20250695621', 'f', '2020', 1, 'ul. Wschodnia 102', 10, '2023-04-03'),
(12, 'Damian', 'Górecki', '18251113435', 'm', '2018', 4, 'ul. Wschodnia 102', 10, '2023-01-06'),
(13, 'Klementyna', 'Marciniak', '17291126568', 'f', '2017', 4, 'ul. Wojska Polskiego 34', 11, '2023-02-04'),
(14, 'Adrian', 'Marciniak', '20230456891', 'm', '2020', 2, 'ul. Wojska Polskiego 34', 11, '2023-02-05'),
(15, 'Emilia', 'Wiśniewska', '19250474785', 'f', '2019', 3, 'ul. Zmienna 16', 8, '2023-01-05'),
(16, 'Monika', 'Zawadzka', '18290492168', 'f', '2018', 4, 'ul. Strykowska 102', 7, '2023-04-04'),
(17, 'Jan', 'Nowak', '20534565461', 'm', '2020', 4, 'ul. Strykowska 120', 7, '2023-02-02');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `id_kid` int(11) NOT NULL,
  `payment_status` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `payments`
--

INSERT INTO `payments` (`id`, `id_kid`, `payment_status`) VALUES
(1, 2, 34.45),
(2, 3, -7.9),
(3, 6, 29.7),
(4, 10, 12),
(5, 11, 24),
(6, 12, 0),
(7, 13, -10.5),
(8, 14, 39),
(9, 15, 14.4),
(10, 16, -8),
(11, 17, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `birth_date` date NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone_number` varchar(200) NOT NULL,
  `id_user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `lastname`, `birth_date`, `password`, `email`, `phone_number`, `id_user_type`) VALUES
(1, 'Anna', 'Kowalksa', '1978-12-12', '50efc5bb3af03926bf8ef9d171610792', 'kowalska@gmail.com', '+48131892938', 1),
(4, 'Jan', 'Nowak', '1999-04-04', '935fe224ae56abc223fb98324b8220f4', 'nowak@gmail.com', '+48524098524', 2),
(5, 'Karol', 'Czerwiński', '2000-05-05', 'cef457555680cf5e0d69490fae401302', 'czerwinski@gmail.com', '+48134094543', 2),
(6, 'Paulina', 'Zalewska', '1991-07-12', '14cb3d0786290de360272402384c78f1', 'zalewska@gmail.com', '+48525098245', 2),
(7, 'Justyna', 'Zawadzka', '1980-08-09', '1dc6b3a8397d55493b7fd1e9f44cd0a0', 'zawadzka@gmail.com', '+48134984414', 3),
(8, 'Jarosław', 'Wiśniewski', '1989-02-04', '607297cee68177a62d089eb4ca19d44e', 'wisniewski@gmail.com', '+48580516032', 3),
(9, 'Natalia', 'Pietrzak', '1985-03-02', '3b21253b3d0d25c1445c296d2a0af529', 'pietrzak@gmail.com', '+48525952054', 3),
(10, 'Łukasz', 'Górecki', '1990-04-03', '95d4b23c4f0c988b10b3aa4cfe261d78', 'gorecki@gmail.com', '+48059534524', 3),
(11, 'Wanda', 'Marciniak', '1987-04-12', '5c6223f5cb721a11c33768655e604846', 'marciniak@gmail.com', '+48245094872', 3);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_level`
--

CREATE TABLE `user_level` (
  `id` int(11) NOT NULL,
  `name_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `user_level`
--

INSERT INTO `user_level` (`id`, `name_type`) VALUES
(1, 'Admin'),
(2, 'Teacher'),
(3, 'Parent');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `kid`
--
ALTER TABLE `kid`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `kid`
--
ALTER TABLE `kid`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT dla tabeli `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT dla tabeli `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
