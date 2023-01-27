-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2023 at 01:39 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furniture_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `product_id` varchar(500) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`product_id`, `ip_address`, `quantity`, `user`) VALUES
('14', '', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `_id` int(11) NOT NULL,
  `category_name` varchar(300) NOT NULL,
  `category_hero` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`_id`, `category_name`, `category_hero`) VALUES
(1, 'სამზარეულო', 'restaurant.png'),
(3, 'საძინებელი ოთახი', 'sofa.png'),
(4, 'ოთახის ლამპები', 'lamp.png'),
(5, 'კედლის ლამპები', 'wall-lamp.png'),
(6, 'მაგიდები', 'table.png'),
(11, 'სამზარეულოს სკამები', 'chair.png');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `_id` int(11) NOT NULL,
  `color` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`_id`, `color`) VALUES
(1, 'White'),
(2, 'Silver'),
(3, 'Gray'),
(7, 'Yellow'),
(8, 'Olive'),
(9, 'Lime'),
(17, 'Orange'),
(18, 'DarkBlue'),
(19, 'Brown'),
(20, 'Cyan');

-- --------------------------------------------------------

--
-- Table structure for table `customizations`
--

CREATE TABLE `customizations` (
  `id` int(11) NOT NULL,
  `csinfo` text NOT NULL,
  `product` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `customizations`
--

INSERT INTO `customizations` (`id`, `csinfo`, `product`) VALUES
(1, 'gwegawgegwegwegw', 7),
(2, 'მე მინდა მწვანე სკამი', 12),
(3, 'dwwedwed', 11),
(4, 'გამარჯობა', 11);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `name` text NOT NULL,
  `_id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `hero_1` text NOT NULL,
  `hero_2` text NOT NULL,
  `size` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `description` mediumtext NOT NULL,
  `avaliable` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`name`, `_id`, `category`, `hero_1`, `hero_2`, `size`, `color`, `price`, `description`, `avaliable`) VALUES
('Ada Dual Lit - მაგიდის მინის ნათურა', 4, '4', '237406880alt3-removebg-preview.png', '237406880alt5-removebg-preview.png', '2', '3', '115', 'აირჩიეთ ახალი განათების გადაწყვეტა ჩვენი Ada მაგიდის ნათურის საშუალებით. შთამბეჭდავი ორმაგი განათების ფუნქციით, მისი შუშის საფუძველი ჩამოყალიბებულია მყარ, თანამედროვე ფორმაში და დასრულებულია მარმარილოს ეფექტის ნიმუშით. თბილი სიკაშკაშე დაიღვრება ბაზის შიგნიდან და ქმნის თვალწარმტაცი ფოკუსს თქვენს მაგიდაზე.', ''),
('Ebony - მაგიდის სანათი, ფიქალი', 5, '4', '232428502alt1-removebg-preview.png', '232428502-removebg-preview.png', '1', '2', '65', 'ამ მაგიდის ნათურა, რომელიც ეშვება ბუჩქოვანი საყრდენის ქვემოთ, ელასტიური ფენით მატებს თქვენს ინტერიერს ტექსტურასა და ფერს. მას ზემოდან აქვს კონტრასტული თეთრი, ბარაბანი ჩრდილით, რომელიც იძლევა ნაზ დიფუზიას. კერამიკისგან დამზადებული, ის შეუფერხებლად ჯდება როგორც ტრადიციულ, ისე თანამედროვე დეკორით.', '217'),
('მაგიდის შუშის ლამპა', 7, '4', '236799150alt1-removebg-preview.png', '236799150-removebg-preview.png', '3', '8', '125', 'დაამშვენე შენი სივრცე ჩვენი ურსულას მაგიდის სანათით. შექმნილია მინის ძირით, რომელიც მოჭრილია გლუვ, ორგანულ ფორმაში, მისი ნახევრად გამჭვირვალე სტილი აჩვენებს ცენტრალურ მეტალის ჩარჩოს, რომელსაც აქვს რეტრო ატლასის სპილენძის საფარი. უზრუნველყოფს სინათლის თბილ ბზინვარებას, რომელიც კიდევ უფრო გაუმჯობესებულია მეტალის აბაჟურის საფარის წყალობით, ეს არის თვალისმომჭრელი და მუდმივი განათების გადაწყვეტა ნებისმიერი ოთახისთვის.', '32'),
('მაგიდის ნათურა', 8, '4', '237406882-removebg-preview.png', '237406882alt1-removebg-preview.png', '1', '17', '95', 'აკანის მაგიდის ნათურა ასახავს თანამედროვე ელეგანტურობას, თავისი მტკიცე პროფილით და ფუნჯით. მისი გონიერი ორფერიანი ბაზა თქვენს მაგიდის ზედაპირებს შეხებით ინტერესს გაუჩენს, ხოლო მისი დამატებითი ბუნებრივი თეთრეულის აბაჟური გთავაზობთ შესანიშნავ დასრულებას.', '0'),
('სასადილო ოთახის სკამი', 9, '11', '236912406-removebg-preview.png', '236912406alt4-removebg-preview.png', '2', '4', '99', 'ჩვენი პოპულარული Whistler-ის სასადილო სკამები თქვენს სივრცეს კომფორტსა და ფერს მოუტანს, განსაკუთრებით იმ შემთხვევაში, თუ სასადილო მაგიდის ირგვლივ აურიეთ სხვადასხვა ჩრდილები. სავარძელი დამზადებულია მტკიცე პოლიპროპილენისგან კარგად შეფუთული, ფიქსირებული ქსოვილის სავარძლის საფენით. ჩვენ დავამატეთ პლასტიკური ქუდები თითოეული ფეხის ბოლოს, რათა თავიდან აიცილოთ ნაკაწრები ან ნაკაწრები თქვენს იატაკზე, ხოლო შედუღებული ლითონის ჩარჩო უზრუნველყოფს დამამშვიდებელ გამძლეობას. თქვენ შეგიძლიათ უბრალოდ წაშალოთ სკამი, რათა ის სუფთა იყოს, ამიტომ ის იდეალურია დაკავებული ოჯახებისთვის. გარდა ამისა, მისი აწყობა მარტივია და მზადაა თქვენს მაგიდაზე უმოკლეს დროში.', '0'),
('Vitra Eames- სასადილო სკამი, მსუბუქი ნეკერჩხლის მასალით', 10, '11', '234901615-removebg-preview.png', '234901615alt2-removebg-preview.png', '4', '1', '87', 'Eames-ის სკამები Vitra-დან პირველად შეიქმნა 1948 წელს, როგორც თანამედროვე ხელოვნების მუზეუმის \"საერთაშორისო კონკურსი იაფი ავეჯის დიზაინისთვის\" ჩანაწერის ნაწილი. ახლა შექმნილია 100% გადამუშავებადი პოლიპროპილენის სავარძლით, Eames სკამები დღეს არის ცნობადი, გამძლე და მრავალმხრივი დასაჯდომი გადაწყვეტილებები თქვენი თანამედროვე სახლისთვის. სავარძლები შექმნილია ფართო ფერის პალიტრაში, რომელიც განაახლებს საწყის ფერთა კომპლექტს, რომელსაც იყენებენ ჩარლზ და რეი ეიმსები, რათა შემოიტანონ თანამედროვე ნათელი ან ნეიტრალური ტონები თქვენს სივრცეში.', '11'),
('Easdale Lloyd Loom - სასადილო სკამი', 11, '11', '237827093-removebg-preview.png', '237827093alt3-removebg-preview.png', '2', '18', '88', 'Easdale-ის სასადილო გვერდითი სკამი, რომელიც შექმნილია რატანის, ლოიდ-ლუმზე მოპირკეთებული სავარძლითა და მყარი მუხის ძირით, აუმჯობესებს ტრადიციულ დიზაინს თანამედროვე აქცენტებით. ტაქტილური და მრავალმხრივი, მისი უკანა საყრდენი ნაზად არის მოხრილი, რათა ხაზი გაუსვას მის რთულად ნაქსოვ დიზაინს, ხოლო მისი ვიწრო პროფილი მშვენივრად დაჯდება მყარი მუხის სასადილო მაგიდის გარშემო.', ''),
('Santino - სასადილო სკამი', 12, '11', '237679373-removebg-preview.png', '237679373alt1-removebg-preview.png', '4', '19', '119', 'ჩვენი Santino სასადილო სკამი შექმნილია ისე, რომ თვალისთვის ისეთივე მარტივი იყოს, როგორც თვალისთვის... კარგად, თქვენ იცით. ის შექმნილია რეალური ცხოვრებისთვის: საკმარისად კომფორტული სადილის დასრულების შემდეგ სადილობის მაგიდასთან დარჩენისთვის, ვიდრე დივანზე დაბრუნების ნაცვლად.', ''),
('Anton - 4 ადგილიანი სასადილო მაგიდა', 13, '6', '109111541-removebg-preview.png', '109111541alt3-removebg-preview.png', '4', '7', '199', 'ამ სასადილო მაგიდაზე ოთხი ადგილია, ასე რომ თქვენ არ გჭირდებათ კომპრომისზე წასვლა, მაშინაც კი, თუ სივრცე შეზღუდულია. ჩვენ ის დავამზადეთ მაღალი ხარისხის მუხის ვინირისგან და პლაივუდისგან და ასევე დავამატეთ ლაქირებული საფარი დამატებითი გამძლეობისთვის. მომრგვალებული კიდეები აძლევს მას უფრო რბილ, უფრო დახვეწილ პროფილს, ხოლო გაშლილი ფეხები თამაშობს Scandi-ის შთაგონებულ დიზაინზე. ჩვენ მოგვწონს, თუ როგორ ასახავს თბილ, ბუნებრივ ხის მარცვლებს მთელს ტერიტორიაზე.', '44'),
('Fern - 2-4 ადგილიანი გასაშლელი სასადილო მაგიდა', 14, '6', '238954080-removebg-preview.png', '238954080alt8-removebg-preview.png', '2', '18', '149', 'ჩვენი Fern-ის ავეჯის ასორტიმენტი დაგეხმარებათ მოაწყოთ თანამედროვე, სკანდის შთაგონებული სახლი. დამზადებულია მაღალი ხარისხის ხის კომბინაციით, მათ შორის მყარი მუხის, MDF და ფიჭვის ხისგან, ეს კომპაქტური სასადილო მაგიდა ბრწყინვალეა, თუ სივრცე შეზღუდულია. არის ადგილი ორი ადამიანისთვის, როდესაც დაფიქსირდა, მაგრამ ის შეიძლება გაფართოვდეს ისე, რომ სულ ოთხი ადამიანი უზრუნველყოს სივრცეში, ორი გაფართოებული ფოთლის წყალობით. ჩვენ მოგვწონს ზედაპირის ზედაპირის თბილი, შევრონული დეტალი და გამძლეობის შესანარჩუნებლად ის დამცავი ლაქით მოვასხათ. ხელმისაწვდომია ბუნებრივი მოპირკეთებით, ან მოხატული ფეხებით გასაოცარი, ტენდენციური კონტრასტისთვის.', '22'),
('Clayton - 2-4 ადგილიანი სასადილო მაგიდა, ნატურალური წიფლის ხე', 15, '6', '240972104-removebg-preview.png', '240972104alt2-removebg-preview.png', '3', '17', '189', 'ჩვენ მოგვწონს ბაზის კვარცხლბეკის ფორმა და ის, თუ როგორ ჩანს ბუნებრივი ხის მარცვლები. აირჩიეთ წიფლის ხისგან დამზადებული ბუნებრივი ან შეღებილი ვარიანტი. დამატებითი გამძლეობისთვის ყველა ვარიანტი დაფარულია ლაქით. დაასრულეთ იერსახე ჩვენი კოორდინირებული კლეიტონის სასადილო სკამებით.', '22'),
('Fern - ყავის მაგიდა, ნატურალური მუხა', 16, '6', '238954109-removebg-preview.png', '238954109alt2-removebg-preview.png', '4', '17', '399', 'Fern-ის ავეჯის ასორტიმენტი დაგეხმარებათ მოაწყოთ თანამედროვე, სკანდის შთაგონებული სახლი. დამზადებულია მაღალი ხარისხის ხის კომბინაციით, მათ შორის მყარი მუხისა და ფიჭვის ხის ჩათვლით, ეს ყავის მაგიდა შესანიშნავია თქვენი მისაღები ოთახის ცენტრში. აქ არის სასარგებლო უჯრა შესანახად, ასევე ქვედა თარო, რომელიც იდეალურია წიგნებისა და ჟურნალებისთვის და ჩვენ მოგვწონს, როგორ ჩანს შევრონის ნიმუში ხეზე. ჩვენ ასევე დავაფარეთ ის დამცავი ლაქით გამძლეობის შესანარჩუნებლად. ხელმისაწვდომია ბუნებრივ ან შეღებილ ფერში, ასე რომ თქვენ შეგიძლიათ შეინარჩუნოთ თქვენი სივრცე მშვიდი და თბილი ან შეინარჩუნოთ ფერების დახვეწილი ინექცია.', '2'),
('სათამაშო ხის გაზქურა', 17, '1', '240956201-removebg-preview.png', '240956201alt3-removebg-preview.png', '4', '20', '299', 'როცა მისი ნაწილი ხარ, შენს გულს დებ მასში. John Lewis & Partners-ში ჩვენ თანამშრომლებზე მეტი ვართ - ჩვენ მფლობელები ვართ. ამიტომ ჩვენ ყველას გვეძახიან პარტნიორები. სწორედ ამიტომ, ჩვენ ყველანი მაღლა ვდგავართ, რათა შევთავაზოთ ხარისხიანი პროდუქტები და გამორჩეული მომსახურება ყველაზე მნიშვნელოვანი ადამიანებისთვის - თქვენ, ჩვენს მომხმარებლებს. რადგან ჩვენთვის ეს პირადია.', '2'),
('თანამედროვე ხის სათამაშო სამზარეულო', 18, '1', '240956200-removebg-preview.png', '240956200alt1-removebg-preview.png', '2', '17', '192', 'როცა მისი ნაწილი ხარ, შენს გულს დებ მასში.\r\n\r\nJohn Lewis & Partners-ში ჩვენ თანამშრომლებზე მეტი ვართ - ჩვენ მფლობელები ვართ. ამიტომ ჩვენ ყველას გვეძახიან პარტნიორები.\r\n\r\nსწორედ ამიტომ, ჩვენ ყველანი მაღლა ვდგავართ, რათა შევთავაზოთ ხარისხიანი პროდუქტები და გამორჩეული მომსახურება ყველაზე მნიშვნელოვანი ადამიანებისთვის - თქვენ, ჩვენს მომხმარებლებს.\r\n\r\nრადგან ჩვენთვის ეს პირადია.', '6'),
('მინი სუპერმარკეტი', 19, '1', '239883031-removebg-preview.png', '239883031alt1-removebg-preview.png', '2', '9', '399', 'როცა მისი ნაწილი ხარ, შენს გულს დებ მასში.\r\n\r\nJohn Lewis & Partners-ში ჩვენ თანამშრომლებზე მეტი ვართ - ჩვენ მფლობელები ვართ. ამიტომ ჩვენ ყველას გვეძახიან პარტნიორები.\r\n\r\nსწორედ ამიტომ, ჩვენ ყველანი მაღლა ვდგავართ, რათა შევთავაზოთ ხარისხიანი პროდუქტები და გამორჩეული მომსახურება ყველაზე მნიშვნელოვანი ადამიანებისთვის - თქვენ, ჩვენს მომხმარებლებს.\r\n\r\nრადგან ჩვენთვის ეს პირადია.', '2'),
('კედლის მაშუქი', 20, '5', 'Toleo_Wall_Lamp_3-removebg-preview.png', 'Toleo_Wall_Lamp_1-removebg-preview.png', '1', '2', '45', 'ქსოვილის ნათურის ჩრდილები - გამოიყენეთ რბილი ჯაგარის ფუნჯი და გაწმინდეთ ჩრდილი გრძელი მოძრაობებით. აბაჟურის პლასტმასის საფარის გასაწმენდად გამოიყენეთ წყლით დასველებული რბილი ქსოვილი და გაწურეთ. ქაღალდის ნათურის ჩრდილები - უბრალოდ გაასუფთავეთ ჩრდილი მშრალი მიკრობოჭკოვანი ქსოვილით. ხის ნათურის საფუძველი - გაწმინდეთ ძირი მშრალი მიკრობოჭკოვანი ქსოვილით. ბზინვის აღსადგენად გამოიყენეთ რბილი ქსოვილი, რომელიც დატენიანებულია გამხსნელზე დაფუძნებული ავეჯის ლაქით. შუშის ნათურის საფუძველი – გაწურეთ ძირი მინის საწმენდი ხსნარით დასველებული რბილი ქსოვილით. ბზინვარების აღსადგენად გახეხეთ მშრალი ქსოვილით. უჟანგავი ფოლადის საძირკველი – გამოიყენეთ რბილი დატენიანებული ქსოვილი, ჩაყარეთ თბილ წყალში და წაშალეთ ძირი. დაუყოვნებლივ გააშრეთ რბილი პირსახოცით. სპილენძის ნათურები–ზოგჯერ ლაქი, რომელიც ვითარდება რეგულარული გამოყენების შედეგად, მატებს ნათურის ხასიათს. თუმცა, თუ გსურთ ბზინვარების აღდგენა, გირჩევთ გამოიყენოთ რბილი სარეცხი და თბილი წყლის ხსნარი ნათურის გასაწმენდად. მიჰყევით ამას მშრალი, რბილი ქსოვილით საპნის ნარჩენების მოსაშორებლად. ბუფი, ბზინვარების აღსადგენად. ჩვენ გირჩევთ არ გამოიყენოთ სპილენძის ლაქი, ის აბრაზიულია და მისი გამოყენებამ შეიძლება გაასუფთავოს დელიკატური გრავიურა.', '149');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `_id` int(11) NOT NULL,
  `size` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`_id`, `size`) VALUES
(1, 'S'),
(2, 'M'),
(3, 'L'),
(4, 'XL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `user_avatar` varchar(255) NOT NULL,
  `user_phone` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `user_ip`, `user_avatar`, `user_phone`) VALUES
(1, 'ნიკა', 'nikasaakadze@gmail.com', '123', '', '', 574031797);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `customizations`
--
ALTER TABLE `customizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customizations`
--
ALTER TABLE `customizations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
