-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2022 at 11:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kamaya_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `common_phrases`
--

CREATE TABLE `common_phrases` (
  `phrase_id` int(11) NOT NULL,
  `tausug_phrase` varchar(255) DEFAULT NULL,
  `tagalog_phrase` varchar(255) DEFAULT NULL,
  `english_phrase` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `common_phrases`
--

INSERT INTO `common_phrases` (`phrase_id`, `tausug_phrase`, `tagalog_phrase`, `english_phrase`, `category`) VALUES
(3, ' Marayaw maynaat. ', ' Magandang Umaga. ', ' Good morning. ', 'Dates and Numbers'),
(4, 'Test 1', 'Test 3', 'Test 2', 'General Conversation');

-- --------------------------------------------------------

--
-- Table structure for table `dictionary`
--

CREATE TABLE `dictionary` (
  `word_id` int(11) NOT NULL,
  `word` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `example` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dictionary`
--

INSERT INTO `dictionary` (`word_id`, `word`, `description`, `type`, `example`) VALUES
(2, ' Marayaw maynaat  d', ' Good morning ', 'Others', NULL),
(4, ' Marayaw maynaat  ', '(literal translation) Good morning', 'Adjective', 'test'),
(5, ' Marayaw maynaat  ', '(literal translation) Good morning', 'Adjective', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `english_tausug`
--

CREATE TABLE `english_tausug` (
  `id` int(11) NOT NULL,
  `tausug_words` varchar(255) NOT NULL,
  `english` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `english_tausug`
--

INSERT INTO `english_tausug` (`id`, `tausug_words`, `english`) VALUES
(1, 'Maraw kyakilahan ta kaw.', 'Nice to meet you.'),
(2, 'Daying hawnu kaw?', 'Where are you from?'),
(3, 'Uno in hyihinang mo?', 'What do you do?'),
(4, 'Uno kabayaan mo hinangun?', 'What do you like to do?'),
(5, 'Awun kaw phone number?', 'What is your phone number?'),
(6, 'Awun facebook mo?', 'Do you have Facebook?'),
(7, 'Magsukur tuuran.', 'Thanks so much.'),
(8, 'Makahati aku ', 'I understand'),
(9, 'Mabayah aku kaymu', 'I like you.'),
(10, 'Maaf.', 'I am sorry.'),
(11, 'Maaf tuud.', 'I am really sorry.'),
(12, 'Kalasahan ta kaw', 'I love you.'),
(13, 'Nagtumtum aku kaymu', 'I miss you.'),
(14, 'Pasari na.', 'Never mind.'),
(15, 'Asalamualaikum!', 'Peace be upon you!'),
(16, 'Marayaw maynaat.', 'Good morning.'),
(17, 'dih aku Makapaham', 'I do not understand.'),
(18, 'Marayaw mahapum', 'Good afternoon'),
(19, 'Salam duwaa', 'Prayers to you.'),
(20, 'Kamayah', 'Take care'),
(21, 'Kamayah daran', 'Take care always.'),
(22, 'Malugay na kita uway napagkita', 'Long time no see.'),
(23, 'Unu in ngan mu?', 'What is your name?'),
(24, 'Mapanday kaw magbichara Tausug', 'You speak Tausug well.'),
(25, 'Makajari baha balikan mu yan?', 'Please repeat that.'),
(26, 'Bihaun sadja aku dumantung sa Pilipinas.', 'I am new in the Philippines.'),
(27, 'Bihaun sadja aku di.', 'I just arrived here.'),
(28, 'Hain otel mu?', 'Where is your hotel?'),
(29, 'Maingat kaw mag tausug?', 'Do you speak Tausug?'),
(30, 'Tiyu-tiyu sadja.', 'Just a little.'),
(31, 'Uminum kitanyu.', 'I will be with you in a moment.'),
(32, 'Lisag pila in meeting ta?', 'What time is our meeting?'),
(33, 'Tawaga man aku ha', 'Please call me at'),
(34, 'Masub aku magkaun kaun.', 'I like to eat rice.'),
(35, 'Ha kasabunnalan, panggannal ku.', 'When is the deadline?'),
(36, 'In hanangun ku sana', 'I am about to'),
(37, 'Mabayah aku di ha hula ini.', 'I like here.'),
(38, 'Nag unu nakaw yan', 'What have you been up to lately?'),
(39, 'Mapanday kaw maglutu.', 'You are a good cook.'),
(40, 'Tabiya', 'Excuse me.'),
(41, 'Biya unu ini?', 'What does this mean?'),
(42, 'Sumud kamu.', 'Come in.'),
(43, 'Pila ini?', 'How much is this?'),
(44, 'Makajari baha ', 'Please'),
(45, 'Mari pa aku ini pa….', 'I am going to the….'),
(46, 'Hisiyu yan?', 'Who is it?'),
(47, 'Anu in walna ini?', 'What color is this?'),
(48, 'Ayaw nakaw masusa.', 'No problem.'),
(49, 'Pakilahan mu aku magtuy kaniya…', 'Introduce me right away to'),
(50, 'Unu in kabayaan mu?', 'What do you like?'),
(51, 'Nakaingat mu si…', 'Do you know'),
(52, 'Salam na hadja kaniyu.', 'Goodbye.'),
(53, 'Huun', 'Yes'),
(54, 'Awun nakaw natali?', 'Do you have any idea?'),
(55, 'Luhud kaw', 'kneel'),
(56, 'kadtu nakaw', 'Go'),
(57, 'Marayaw da isab ', 'I am fine, too.'),
(58, 'Libut kaw.', 'Turn around.'),
(59, 'Yadtu siya ha iskul.', 'He is there, at school.'),
(60, 'Yari aku ha bay', 'I am here at the house.'),
(61, 'Liyaul aku.', 'I am tired.'),
(62, 'Liysuan aku.', 'I am bored.'),
(63, 'Suy-suyi kita kunu.', 'Tell me about it!'),
(64, 'Kiyaru aku', 'I feel sleepy'),
(65, 'Kiyugan aku', 'I am happy.'),
(66, 'Kumaun kita.', 'Let us eat.'),
(67, 'Kari kaw.', 'Come here.'),
(68, 'Piya-tabu aku.', 'I went to the market.'),
(69, 'Mura-murahan', 'You are welcome.'),
(70, 'Matuwg na ako.', 'I will sleep.'),
(71, 'Piyakain kaw?', 'Where have you been?'),
(72, 'Maapa aku', 'forgive me.'),
(73, 'Makaulung man kaw', 'Poor you.'),
(74, 'Marayih.', 'Maybe'),
(75, 'Makahati aku bissara english', 'I understand English words.'),
(76, 'mabayah kaw magad kumaun iban ako?', 'Would you like to join me for dinner?'),
(77, 'Uyah', 'Hi.'),
(78, 'Dih.', 'No.'),
(79, 'Hundung, Makajari baha.', 'Stop, please.'),
(80, 'Byah mahalga in yan', 'It cost a fortune.'),
(81, 'Mahalga turan san', 'It cost and arm and a leg.'),
(82, 'sobra in luhay kyabi ko', 'It was a real bargain.'),
(83, 'maluhay turan nabi ko', 'It was dirt cheap.'),
(84, 'pag usal kaw badju madakmul', 'Make sure to bundle up.'),
(85, 'grabe in pasuh ha guwa', 'it scorching hot outside'),
(86, 'nahilu na ako sin karuh', 'I can harldy keep my eyes open'),
(87, 'kamayah kamu', 'Be careful.'),
(88, 'ayaw mag pasapat mag paragan sasakatan', 'Be careful driving.'),
(89, 'unu in meaning nya ini?', 'Can you translate this for me?'),
(90, 'kaingatan na sin katan', 'Everyone knows it.'),
(91, 'ready na in katan', 'Everything is ready.'),
(92, 'minsan minsan', 'From time to time.'),
(93, 'malingkat in idea mo', 'Good idea.'),
(94, 'kimaun na ako', 'I ate already.'),
(95, 'Biskay kaw!', 'Hurry!'),
(96, 'mangih in parasahan ko', 'I feel good.'),
(97, 'iyani man ako bang kailangan mu tabang', 'If you need my help, please let me know.'),
(98, 'maka ig na ako lisag unum', 'I get off of work at 6.'),
(99, 'masakit in uh ko', 'I have a headache.'),
(100, 'kaingatan ko', 'I know.'),
(101, 'mabayah ako kaniya', 'I like her.'),
(102, 'nalawah in lilus ko', 'I lost my watch.'),
(103, 'subay ako mag salin', 'I need to change clothes.'),
(104, 'kailangan ko na muwi', 'I need to go home.'),
(105, 'bang bang sadja in kabayaan ko', 'I only want a snack.'),
(106, 'sarang na yan?', 'Is that enough?'),
(107, 'masarap na san', 'I think it tastes good.'),
(108, 'akannal ko mas maluhay in mga badju ini', 'I thought the clothes were cheaper.'),
(109, 'hapit na ako mig ampa dimatung in mga bagay ko ha restoran', 'I was about to leave the restaurant when my friends arrived.'),
(110, 'hangkatiyuh', 'Just a little.'),
(111, 'angkaraih', 'Just a moment.'),
(112, 'kitaun ko naa', 'Let me check.'),
(113, 'angkaraih, isipun ko naa', 'Let me think about it.'),
(114, 'manjari ko dahun mag bissara ie sir ___?', 'May I speak to Sir ______ please?'),
(115, 'mas mataud pa duun', 'More than that.'),
(116, 'subay na', 'Next time.'),
(117, 'dih', 'No.'),
(118, 'dih kaunun sin akkal', 'Nonsense.'),
(119, 'dih na, magsukul sab', 'No, thank you.'),
(120, 'way na dugaing', 'Nothing else.'),
(121, 'bukun da sab ', 'Not recently.'),
(122, 'alangan', 'Of course.'),
(123, 'way pa ', 'Not yet.'),
(124, 'ok', 'Okay.'),
(125, 'fill-upi ba katu in form ini', 'Please fill out this form.'),
(126, 'hatura ba ako mari', 'Please take me to this address.'),
(127, 'sulata', 'Please write it down.'),
(128, 'bunnal?', 'Really?'),
(129, 'dii', 'Right here.'),
(130, 'didtu', 'Right there.'),
(131, 'magkita man ganagana', 'See you later.'),
(132, 'magkita man kinsum', 'See you tomorrow.'),
(133, 'magkita man ganagana dum', 'See you tonight.'),
(135, 'daha nyo pa guwa', 'Take it outside.'),
(136, 'iyana kaku', 'Tell me.'),
(137, 'magsukul ha katan', 'Thanks for everything.'),
(138, 'magsukul ha tabang', 'Thanks for your help.'),
(139, 'mabahu', 'That smells bad.'),
(140, 'in kitab yadtu ha sawm sin table', 'The book is under the table.'),
(142, 'mahunit turan saini', 'This is very difficult.'),
(143, 'testingi ba', 'Try it.'),
(146, 'manjari mo iyanun kan (insert name) na (message) ', 'Would you take a message please?'),
(147, 'oon ', 'Yes, really.'),
(148, 'yari in panyap mo katan', 'Your things are all here.'),
(149, 'awn da sin mo?', 'Do you have enough money?'),
(150, 'maingat kaw mag lutuh?', 'Do you know how to cook?'),
(151, 'lisag pila?', 'At what time?'),
(152, 'tabangan mo sya? atawa dih?', 'Are you going to help her?'),
(153, 'ibani ako', 'Follow me.'),
(154, 'daing dii harap madtu', 'From here to there.'),
(155, 'dimatung na kaw?', 'Have you arrived?'),
(156, 'kahatihan mo unu in nakaiyan dii?', 'Do you know what this says?'),
(157, 'mabayah kaw magpabaak?', 'Do you want me to come and pick you up?'),
(158, 'derecho sadja kaw', 'Go straight ahead'),
(159, 'byadin ako makakadtu?', 'How do I get there?'),
(160, 'byadin kalugay in flight?', 'How long is the flight?'),
(161, 'byadin da in movie?', 'How was the movie?'),
(162, 'tawagi nyu in pulis', 'Call the police.'),
(163, 'awn kamu kahawa?', 'Do you have any coffee?'),
(164, 'masub kaw kahawa?', 'Do you like to drink coffee?'),
(165, 'awn pa mas maluhay duun?', 'Do you have anything cheaper?'),
(166, 'manjari magbayad mag usal credit card?', 'Do you take credit cards?'),
(167, 'byadin kaw magbayad?', 'How are you paying?'),
(168, 'pila pa in utang ko kaymu?', 'How much do I owe you?'),
(169, 'nag pa reserve ako', 'I have a reservation.'),
(170, 'kailangan ko mag praktis bahasa inglish', 'I need to practice my english.'),
(171, 'okay da yan?', 'Is that okay?'),
(172, 'hangkatiyuh', 'A little.'),
(173, 'hawnu masarap restoran dii?', 'Can you recommend a good restaurant?'),
(174, 'yari na', 'Here it is.'),
(175, 'yari na kaw', 'Here you are.'),
(176, 'mabaya ako magkita TV', 'I like to watch TV.'),
(177, 'maraih', 'Maybe.'),
(178, 'mag lagi ako tissue', 'I need some tissues.'),
(179, 'mabayah ta kaw dihilan hadiya', 'I want to give you a gift.'),
(180, 'usug atawa babae?', 'Male or female?'),
(181, 'iga nyu man in taumpah nyo', 'Please take off your shoes.'),
(182, 'myari kaw iban sin lasiyah mo?', 'Did you come with your family?'),
(183, 'bakas', 'A long time ago.'),
(184, 'mari sila dum yan?', 'Are they coming this evening?'),
(186, 'iban mo in mga anak mo?', 'Are your children with you?'),
(189, 'matigda in ulan byaun', 'It rained very hard today.'),
(190, 'whole day', 'The whole day.'),
(191, 'lisag pila kaw nakabati?', 'What time did you get up?'),
(192, 'lisag pila sila dumatung?', 'What time are they arriving?'),
(194, 'subay na/ susungun na', 'Maybe another time.'),
(195, 'Liyaul', 'Tired'),
(196, 'Lisu-an', 'Bored'),
(197, 'Kiyugan', 'Happy'),
(198, 'Huun', 'Yes'),
(199, 'Bukun', 'No'),
(200, 'Kahapun', 'Yesterday'),
(201, 'Bihaun', 'Today'),
(202, 'Kunsum', 'Tomorrow'),
(203, 'Magsukul', 'Thanks'),
(204, 'Hundung', 'Stop'),
(205, 'Mamiy', 'Buy'),
(206, 'Asal', 'Of course'),
(207, 'Bunnal tuud yan', 'Really'),
(208, 'Saram na hadja kaniyu', 'Goodbye'),
(209, 'Itum', 'Black'),
(210, 'Abu', 'Brown'),
(211, 'Bianning', 'Yellow'),
(212, 'Puti', 'White'),
(213, 'Pula', 'Red'),
(214, 'Bilu', 'Blue'),
(215, 'Gadung', 'Green'),
(216, 'Sinapang', 'Gun'),
(217, 'Linkud kaw.', 'Sit'),
(218, 'Tindug kaw.', 'Stand'),
(219, 'Panaw kaw.', 'Walk'),
(220, 'Dagan kaw.', 'Run'),
(221, 'Laksu kaw.', 'Jump'),
(222, 'Kalang kaw.', 'Sing'),
(223, 'Pagbassa kaw.', 'Read'),
(224, 'Pagsulat kaw.', 'Write'),
(225, 'Kaun kaw.', 'Eat'),
(226, 'Luhud kaw.', 'Kneel'),
(227, 'Ig na kaw.', 'Go'),
(228, 'Libut kaw', 'Turn around'),
(229, 'Kimangi.', 'Wreck'),
(230, 'Lutaw.', 'Ghost'),
(231, 'Tuhan', 'God'),
(232, 'Tumangis', 'Cry'),
(233, 'Pais', 'Skin'),
(234, 'Babaw', 'Upper Surface'),
(235, 'Malim', 'Guide'),
(236, 'Wayruun', 'None'),
(237, 'Taban', 'Help'),
(238, 'Dagat', 'Sea/Ocean'),
(239, 'Napas', 'Breath'),
(240, 'Rajuma', 'Rheumtism'),
(241, 'Sabab', 'Cause'),
(242, 'Lapal', 'Statement'),
(243, 'Bitchara', 'Speak'),
(244, 'Nawa', 'Soul'),
(245, 'Karut', 'Sack'),
(246, 'Jakut', 'Red gem'),
(247, 'Gatas', 'Milk'),
(248, 'Nan', 'Name'),
(249, 'Atup', 'Roof'),
(250, 'Habul', 'Sarong'),
(251, 'Iru', 'Dog'),
(252, 'Manuk-Manuk', 'Bird'),
(253, 'Katu', 'Louse'),
(254, 'Has', 'Snake'),
(255, 'Ud', 'Worm'),
(256, 'Ista', 'Fish'),
(257, 'Hayup', 'Animal'),
(258, 'Kyakilahan', 'Met'),
(259, 'Adjal', 'Prepare'),
(260, 'Agad', 'Join'),
(261, 'Agap', 'Parrot'),
(262, 'Amah', 'Father'),
(263, 'Bagay', 'Friend'),
(264, 'Basu', 'Glass'),
(265, 'Bay', 'House'),
(266, 'Bayta', 'Say'),
(267, 'Biyariin', 'How'),
(268, 'Daakan', 'Command'),
(269, 'Hisiyu', 'Who'),
(270, 'Daig', 'Beside'),
(271, 'Daing', 'From'),
(272, 'Dan', 'Road'),
(273, 'Dang', 'Dear'),
(274, 'Daran', 'Always'),
(275, 'Dayang-Dayang', 'Princess'),
(276, 'Dayaw', 'Repair'),
(277, 'Dimatung', 'Arrived'),
(278, 'Dugtul', 'Bump'),
(279, 'Duwm', 'Night'),
(280, 'Gadja', 'Elephant'),
(281, 'Giik', 'Step on'),
(282, 'Habay-Habay', 'Amulet'),
(283, 'Hain', 'Where'),
(284, 'Harap', 'Towards'),
(285, 'Higad', 'Side'),
(286, 'Iskul', 'school'),
(287, 'Huun', 'Yes'),
(288, 'Jantung', 'Heart'),
(289, 'Kadday', 'Small Food Store'),
(290, 'Kahuy', 'Tree'),
(291, 'Kansiyu', 'Whom'),
(292, 'Kappal', 'Ship'),
(293, 'Katas', 'Paper'),
(294, 'Kawman', 'Community'),
(295, 'Kayt', 'Clothe pin'),
(296, 'Mauhaw', 'Thirsty'),
(297, 'Labay', 'Pass by'),
(298, 'Lamgbung', 'Shadow'),
(299, 'Lamud', 'Add'),
(300, 'Lasa', 'Love'),
(301, 'Ligad', 'Slip over'),
(302, 'Lubid', 'Rope'),
(303, 'Magtuwag', 'Sleeping'),
(304, 'Makayug', 'Thin'),
(305, 'Makiput', 'Narrow'),
(306, 'Malanjang', 'Tall'),
(307, 'Malaul', 'Tiring'),
(308, 'Malingkat', 'Beautiful'),
(309, 'Mampallam', 'Mango Tree'),
(310, 'Marayaw', 'Good'),
(311, 'Masuuk', 'Near'),
(312, 'Matambuk', 'Fat'),
(313, 'Manaw', 'To walk'),
(314, 'Maunu-unu', 'How'),
(315, 'Niyug', 'Coconut Tree'),
(316, 'Pagtiyaun', 'Wedding'),
(317, 'Piul', 'Limp'),
(318, 'Sabun', 'Soap'),
(319, 'Sagnat', 'Sling'),
(320, 'Sambil', 'Also'),
(321, 'Sandig', 'Lean'),
(322, 'Saub', 'Cover'),
(323, 'Sawm', 'Under'),
(324, 'Sumping', 'Flowers'),
(325, 'Sundali', 'Soldier'),
(326, 'Suwng', 'Enter'),
(327, 'Suwng', 'Forward'),
(328, 'Suwran', 'Enrtrance'),
(329, 'Tagaynup', 'Dream'),
(330, 'Usug', 'Male'),
(331, 'Unu', 'What'),
(332, 'Ukab', 'Open'),
(333, 'Taymanghud', 'Sibling'),
(334, 'Tagad', 'Wait'),
(335, 'Hain na kaw', 'Where are you'),
(340, 'sdf', 'sdf'),
(341, 'Mari pa aku ini pa', 'I am going to the'),
(342, 'ikaw', 'you'),
(343, 'test sample 1234', 'Sample test 12345'),
(344, 'Lisagpila na?', 'What time is it?	'),
(345, 'In ngān ku hi', 'My name is'),
(346, 'uyah', 'hello');

-- --------------------------------------------------------

--
-- Table structure for table `words_contribution`
--

CREATE TABLE `words_contribution` (
  `contri_id` int(11) NOT NULL,
  `tausug_words` varchar(255) NOT NULL,
  `english` varchar(255) NOT NULL,
  `word_status` varchar(255) NOT NULL,
  `num_submit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `words_contribution`
--

INSERT INTO `words_contribution` (`contri_id`, `tausug_words`, `english`, `word_status`, `num_submit`) VALUES
(1, 'Mari pa aku ini pa', 'I am going to the', 'Confirmed', 1),
(2, 'hi', 'hello', 'Pending', 2),
(3, 'asd', 'asda', 'Rejected', 1),
(4, 'dfg', 'dfg', 'Rejected', 1),
(5, 'sdf', 'sdf', 'Confirmed', 2),
(6, 'ikaw', 'you', 'Confirmed', 1),
(7, 'mayta', 'why', 'Rejected', 1),
(8, 'adass', 'asdasd', 'Pending', 1),
(9, 'test', 'test', 'Pending', 1),
(10, 'test sample 1234', 'Sample test 12345', 'Confirmed', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `common_phrases`
--
ALTER TABLE `common_phrases`
  ADD PRIMARY KEY (`phrase_id`);

--
-- Indexes for table `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`word_id`);

--
-- Indexes for table `english_tausug`
--
ALTER TABLE `english_tausug`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `words_contribution`
--
ALTER TABLE `words_contribution`
  ADD PRIMARY KEY (`contri_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `common_phrases`
--
ALTER TABLE `common_phrases`
  MODIFY `phrase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dictionary`
--
ALTER TABLE `dictionary`
  MODIFY `word_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `english_tausug`
--
ALTER TABLE `english_tausug`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=347;

--
-- AUTO_INCREMENT for table `words_contribution`
--
ALTER TABLE `words_contribution`
  MODIFY `contri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
