-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2018 at 06:08 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamestore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(100) NOT NULL,
  `adminPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `adminPassword`) VALUES
(1, 'Mage', 'Aaaaaaa1');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartID` int(11) NOT NULL,
  `cartTotal` int(11) NOT NULL,
  `paymentType` varchar(20) NOT NULL,
  `memberID` int(11) NOT NULL,
  `shipName` varchar(100) NOT NULL,
  `shipAddress` varchar(200) NOT NULL,
  `shipCity` varchar(50) NOT NULL,
  `shipZip` varchar(10) NOT NULL,
  `shipState` varchar(20) NOT NULL,
  `shipEmail` varchar(50) NOT NULL,
  `shipPhone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cartID`, `cartTotal`, `paymentType`, `memberID`, `shipName`, `shipAddress`, `shipCity`, `shipZip`, `shipState`, `shipEmail`, `shipPhone`) VALUES
(1, 450, '1', 1, 'AIMAN', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '3', 'ASDAD@gmail.com', '01333331031'),
(2, 249, '2', 1, 'AIMAN', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '15', 'asdsa@gmail.com', '01333331031'),
(3, 460, '2', 1, 'APIP', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '8', 'ASDAD@gmail.com', '01333331031'),
(4, 299, '1', 1, 'APIP', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '8', 'asdsa@gmail.com', '01333331031'),
(5, 210, '2', 1, 'APIP', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '12', 'ASDAD@gmail.com', '01333331031'),
(7, 1212, '1', 1, 'asssasas', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '4', 'ASDAD@gmail.com', '01333331031'),
(8, 300, '2', 1, 'AIMAN', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '3', 'ASDAD@gmail.com', '01333331031'),
(9, 1734, '1', 1, 'APIP', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '5', 'ASDAD@gmail.com', '01333331031'),
(12, 972, '1', 2, 'AIMAN', 'NO. 12-1 JALAN 7D/6, TAMAN SETAPAK INDAH', 'KUALA LUMPUR', '53300', '4', 'ASDAD@gmail.com', '01333331031');

-- --------------------------------------------------------

--
-- Table structure for table `cartlist`
--

CREATE TABLE `cartlist` (
  `cartListID` int(11) NOT NULL,
  `cartID` int(11) NOT NULL,
  `prodID` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cartlist`
--

INSERT INTO `cartlist` (`cartListID`, `cartID`, `prodID`, `quantity`) VALUES
(1, 1, 28, 2),
(2, 1, 26, 1),
(3, 2, 28, 1),
(4, 2, 29, 1),
(5, 3, 6, 1),
(6, 3, 22, 1),
(7, 4, 5, 1),
(8, 4, 30, 1),
(9, 5, 3, 1),
(11, 6, 3, 1),
(12, 7, 28, 1),
(13, 8, 32, 2),
(14, 9, 28, 1),
(15, 9, 3, 1),
(16, 9, 32, 1),
(17, 0, 28, 16),
(18, 0, 5, 1),
(19, 12, 5, 1),
(20, 12, 3, 1),
(21, 12, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedbackID` int(11) NOT NULL,
  `feedbackName` varchar(50) NOT NULL,
  `feedbackEmail` varchar(30) NOT NULL,
  `feedbackTitle` varchar(100) NOT NULL,
  `feedbackMessage` varchar(5000) NOT NULL,
  `memberID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedbackID`, `feedbackName`, `feedbackEmail`, `feedbackTitle`, `feedbackMessage`, `memberID`) VALUES
(2, 'Marwan Bin Shamon', 'marwan.shamon@gmail.com', 'Help Please', 'WHAHTH HTHAHTHATH IDSS', 1),
(3, 'Marwan', 'marwan.shamon@gmail.com', 'wazzup', 'asdaadadad', 2),
(4, 'Marwan', 'marwan.shamon@gmail.com', 'Congratulation is in order', 'I would like to congratulate you guys on such a great job. I\'m proud to be called a consumer of this here shop. Keep doing what you\'re doing.', 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `memberID` int(11) NOT NULL,
  `memberName` varchar(100) NOT NULL,
  `memberUsername` varchar(100) NOT NULL,
  `memberEmail` varchar(70) NOT NULL,
  `memberPhone` varchar(15) NOT NULL,
  `memberPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`memberID`, `memberName`, `memberUsername`, `memberEmail`, `memberPhone`, `memberPassword`) VALUES
(1, 'Marwan Bin Shamon', 'ShiroWan', 'marwan.shamon@gmail.com', '0133005171', 'abcDEF123'),
(2, 'Johnny Bravo', 'MuscularGuy', 'johhnn@gmail.com', '0122291920', 'aaaaaAAAAA1');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `prodID` int(11) NOT NULL,
  `prodName` varchar(70) NOT NULL,
  `prodDesc` varchar(3000) NOT NULL,
  `prodPrice` double NOT NULL,
  `prodPlatform` varchar(15) NOT NULL,
  `prodStatus` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodID`, `prodName`, `prodDesc`, `prodPrice`, `prodPlatform`, `prodStatus`) VALUES
(1, 'Persona 5', 'Uncover the story of a young team of phantom thieves in this latest addition to the critically acclaimed Persona series. By day, enjoy your high school life in the big city, spending your time however you please. The bonds you form with the people you meet will grow into a great power to help you fulfill your destiny! After school, use your Metaverse Navigator smartphone app to infiltrate Palaces--surreal worlds created from the hearts of corrupt adults--and slip away to your double life as a phantom thief. With the power of Persona, make these criminals have a change of heart by stealing the Treasure of their distorted desires. Join your new friends in the fight to reform society with your own sense of justice!', 200, 'PS4', 'active'),
(2, 'My Hero One\'s Justice', 'Fight for your justice in MY HERO ONE\'S JUSTICE! The popular manga and anime series clashes head-to-head and Quirk-to-Quirk in this 3D arena fighter.', 170, 'PS4', 'active'),
(3, 'Assassin\'s Creed Odyssey', 'Choose your fate in Assassin\'s Creed Odyssey. From outcast to living legend, embark on an odyssey to uncover the secrets of your past and change the fate of Ancient Greece.', 222, 'XBOX ONE', 'active'),
(4, 'Far Cry 4', 'Hidden in the towering Himalayas lies Kyrat, a country steeped in tradition and violence. You are Ajay Ghale. Traveling to Kyrat to fulfill your motherï¿½s dying wish, you find yourself caught up in a civil war to overthrow the oppressive regime of dictator Pagan Min.', 255, 'XBOX 360', 'active'),
(5, 'Hitman Absolution', 'The original assassin is back! Betrayed by the Agency and hunted by the police, Agent 47 finds himself pursuing redemption in a corrupt and twisted world.', 150, 'XBOX 360', 'active'),
(6, 'Metal Gear Solid V: Phantom Pain', 'Ushering in a new era for the METAL GEAR franchise with cutting-edge technology powered by the Fox Engine, METAL GEAR SOLID V: The Phantom Pain, will provide players a first-rate gaming experience as they are offered tactical freedom to carry out open-world missions.', 230, 'PS4', 'active'),
(7, 'Super Smash Bros Ultimate ', 'The biggest Super Smash Bros. game ever! With every fighter from all previous Smash titles coming into one!', 245, 'SWITCH', 'active'),
(8, 'The Legend Of Zelda : Breath of The Wild', 'No kingdom. No memories. After a 100-year slumber, Link wakes up alone in a world he no longer remembers. Now the legendary hero must explore a vast and dangerous land and regain his memories before Hyrule is lost forever.\r\n\r\nArmed only with what he can scavenge, Link sets out to find answers and the resources needed to survive.', 198, 'SWITCH', 'active'),
(9, 'Pokemon : Let\'s Go Pikachu!	', 'Pokï¿½mon are wondrous (and sometimes mysterious) creatures that inhabit the in-game world. Some Pokï¿½mon coexist alongside humans, but other wild Pokï¿½mon live in tall grass, caves, seas, and elsewhere.', 198, 'SWITCH', 'active'),
(10, 'Mario Kart 8 : Deluxe', 'Hit the road with the definitive version of Mario Kart 8 and play anytime, anywhere! Race your friends or battle them in a revised battle mode on new and returning battle courses. Play locally in up to 4-player multiplayer in 1080p while playing in TV Mode. Every track from the Wii U version, including DLC, makes a glorious return. Plus, the Inklings appear as all-new guest characters, along with returning favorites, such as King Boo, Dry Bones, and Bowser Jr.!', 184, 'SWITCH', 'active'),
(11, 'Super Mario Party', 'The original 4-player Mario Party series board game mode that fans love is back, and your friends and family are invited to the party! Freely walk the board: choose where to move, which Dice Block to roll, and how to win the most Stars in skill-based minigames. Wait till you see the 2 vs 2 mode with grid-based maps, the creative uses of the console, and the series’ first online minigame mode!', 264, 'SWITCH', 'active'),
(12, 'Forza Horizon 4', 'Live the Horizon Life when you play Forza Horizon 4. Experience a shared world with dynamic seasons. Explore beautiful scenery, collect over 450 cars and become a Horizon Superstar in historic Britain.', 234, 'XBOX ONE', 'active'),
(13, 'Halo 5 : Guardians', 'Halo 5: Guardians delivers epic multiplayer experiences that span multiple modes, full-featured level building tools, and the most dramatic Halo story to date. With multiple massive FREE content releases since launch, Halo 5: Guardians offers more content, more multiplayer mayhem, and more variety than any Halo ever released!', 90, '', 'active'),
(14, 'Forza Motorsport 7', 'Forza Motorsport 7 immerses players in the exhilarating thrill of competitive racing. From mastering the new motorsport-inspired campaign to collecting a wide range of cars to experiencing the excitement of driving at the limit, this is Forza reimagined.', 194, 'XBOX ONE', 'active'),
(15, 'Quantum Break', 'In the aftermath of a split second of destruction that fractures time itself, two people find they have changed and gained extraordinary abilities. One of them travels through time and becomes hell-bent on controlling this power. The other uses these new abilities to attempt to defeat him – and fix time before it tears itself irreparably apart. Both face overwhelming odds and make dramatic choices that will determine the shape of the future. Quantum Break is a unique experience; one part hard-hitting video game, one part thrilling live action show, featuring a stellar cast, including Shawn Ashmore as the hero Jack Joyce, Aidan Gillen as his nemesis Paul Serene and Dominic Monaghan as Jack’s genius brother William. Quantum Break is full of the vivid storytelling, rich characters and dramatic twists Remedy Entertainment are renowned for. Your choices in-game will affect the outcome of this fast-paced fusion between game and show giving the player a completely unique entertainment experience.', 75, 'XBOX ONE', 'active'),
(16, 'Gears of War 4', 'A new saga begins for one of the most acclaimed video game franchises in history. After narrowly escaping an attack on their village, JD Fenix (son of celebrated war hero Marcus Fenix) and his friends, Kait and Del, must rescue the ones they love and discover the source of a monstrous new enemy.', 156, 'XBOX ONE', 'active'),
(17, 'Gran Turismo Sport', 'Welcome to the future of motorsports - the definitive motor racing experience is back and better than ever only on PlayStation 4. Gran Turismo Sport is the world\'s first racing experience to be built from the ground up to bring global, online competitions sanctioned by the highest governing body of international motorsports, the FIA (Federation International Automobile). Create your legacy as you represent and compete for your home country or favorite manufacturer.', 199, 'PS4', 'active'),
(18, 'God of War', 'From Santa Monica Studio and creative director Cory Barlog comes a new beginning for God of War. Living as a man outside the shadow of the gods, Kratos must adapt to unfamiliar lands, unexpected threats, and a second chance at being a father. Together with his son Atreus, the pair will venture into the brutal Norse wilds and fight to fulfill a deeply personal quest.', 268, 'PS4', 'active'),
(19, 'Spiderman', 'Sony Interactive Entertainment, Insomniac Games, and Marvel have teamed up to create a brand-new and authentic Spider-Man adventure. This isn’t the Spider-Man you’ve met or ever seen before. This is an experienced Peter Parker who’s more masterful at fighting big crime in Marvel\'s New York. At the same time, he’s struggling to balance his chaotic personal life and career while the fate of millions of New Yorkers rest upon his shoulders.', 268, 'PS4', 'active'),
(20, 'The Last Guardian', 'When a young boy meets a colossal, mysterious creature named Trico, the pair form a deep, unbreakable bond that will help them survive amongst the crumbling ruins and malevolent dangers that surround them.\r\n\r\nBy working together, the unlikely pair must communicate with one another to overcome tremendous obstacles and uncover the secrets of their beautiful fantasy world – and ultimately survive their touching and emotionally charged journey.', 299, 'PS4', 'active'),
(21, 'The Last Of Us', '20 years after a pandemic has radically changed known civilization, infected humans run wild and survivors are killing each other for food, weapons; whatever they can get their hands on. Joel, a violent survivor, is hired to smuggle a 14 year-old girl, Ellie, out of an oppressive military quarantine zone, but what starts as a small job soon transforms into a brutal journey across the U.S.', 199, 'PS3', 'active'),
(22, 'LittleBigPlanet', 'Help Sackboy in his latest adventure and save the day in a variety of stories chronicling his latest exploits and after you have performed your heroic deeds and saved the day, you can continue your journey by heading out to the wider Omniverse to discover an even greater range of amazing adventures and fun games created by the LittleBigPlanet community! ', 230, 'PS3', 'active'),
(23, 'Gran Turismo 6', 'The next stage in the evolution of the world\'s most popular and comprehensive racing simulator is upon us. Gran Turismo 6, the latest installment in the best-selling series, will reach stores this Holiday season. Known for blurring the lines between virtual and reality, the Gran Turismo series has revolutionized the racing genre in the last 15 years, allowing fans to drive the most prolific collection of cars on the world\'s most legendary racetracks. Gran Turismo 6 takes the real driving simulator experience to a whole new level.', 199, 'PS3', 'active'),
(24, 'InFamous', 'A massive explosion rips through six square blocks of Empire City, leveling everything and killing everyone in its path... everyone, except you!\r\n\r\n\r\n\r\nFeel what itï¿½s like to be granted incredible powers... how you use them is up to you. The consequences of your actions will affect you, the citizens, and the city around you. Youï¿½ll develop and grow your powers, and eventually uncover the purpose of it all.', 120, 'PS3', 'active'),
(25, 'ModNation Racers', 'Kart Racing for a New Generation!\r\nGrab the keys to the latest ï¿½PLAY, CREATE, & SHAREï¿½ title available on the PlayStationï¿½3! ModNationï¿½ Racers is a next generation kart racer that empowers the player to personalize their entire game. Shoot, boost & drift your way to the finish line both offline and online, then create your own racing experiences with the same tools used by the development team. Express yourself by creating your own Mod character. Build your own quirky kart or design an imaginative track with deep, yet easy to use creative tools. Once you are finished, share it with the rest of the world or access unlimited amounts of user generated ModNation content on the PlayStationï¿½Network. There is no end to the karting fun!', 199, 'PS3', 'active'),
(26, 'Heavy Rain', 'Experience a gripping psychological crime thriller filled with innumerable twists and turns, where even the smallest actions and choices can cause dramatic consequences. The hunt is on for the Origami Killer, named after his calling card of leaving folded paper shapes on victims. Four characters, each with their own motives, take part in a desperate attempt to stop the killer from claiming a new victim.', 150, 'PS3', 'draft'),
(27, 'Saints Row', 'Under threat from rival gangs and corrupt officials the 3rd Street Saints must conquer the city of Stilwater or face destruction. From the spectacular opening battle to regain control of the local hood Saints Row offers the freedom to explore StilWater a living breathing city. Players are free to engage in the multitude of different activates at their leisure all while building up respect in a gameplay-rich world. Build enough respect and the 3rd Street Saint\'s lieutenants will trust the player with more dangerous missions. ', 175, 'XBOX 360', 'active'),
(28, 'Ace Combat 6 : Fires of Liberation', 'The Next Generation of Warfare Demands The Next Generation of Aces! With over 10 million copies sold worldwide, the ultimate flight action series soars onto Xbox 360! This fall, the entire Flight Action genre will be single handedly redefined as Ace Combat 6, the latest in the No.1 flight action series arrives on the next generation console system to continue its absolute domination. Players can get in the cockpits of their favorite authentically detailed combat aircrafts and command the allied assault force of aerial, naval, and ground combat units. In addition, players will engage in fierce combat at an unprecedented scale and intensity as up to six massive conflicts unfold at once at multiple locations in war zones rendered in photorealistic detail. For the first time in the Ace Combat franchise, players can prove their supremacy on a global scale in the intense multi-player online mode via Xbox Live!! Break the sound barrier and soar 360 degrees through the sky as battles and drama unfold around you on an unprecedented epic scale!', 1212, 'XBOX 360', 'active'),
(29, 'Project Gotham Racing 3', 'Live your dream car fantasies as you accumulate more cool cars than you ever thought possible. Enter living, breathing cities -- intricately modeled popular locations, including New York, Tokyo, London and many other cities. Go online with next-generation worldwide connectivity -- exhibit your skills before a global online audience, on GothamTV. See what happens when you plug in Xbox 360, add Project Gotham Racing 3, and connect to an HDTV television with Dolby 5.1. Live your dream car fantasies as you accumulate more cool cars than you ever thought possible. Enter living, breathing cities -- intricately modeled popular locations, including New York, Tokyo, London and many other cities. Go online with next-generation worldwide connectivity -- exhibit your skills before a global online audience, on GothamTV. See what happens when you plug in Xbox 360, add Project Gotham Racing 3, and connect to an HDTV television with Dolby 5.1', 99, 'XBOX 360', 'active'),
(30, 'Fable II', 'Fable 2 provides players with a truly immersive experience where a virtually limitless number of choices can be made, all of which have their own consequences, making each game unique. When you start the game, you choose either to play the role of a boy or girl, and depending on your choices, the hero will grow up to be tall or short, good or evil. Players can get married and have children; female player characters will become pregnant, which will then be reflected by their physical appearance.\r\nEarly in the game, players are presented with a stray dog for a best friend, who will need to be fed and loved, and will accompany the player throughout his or her life. Depending on the player, the dog will change appearance and assist him or her in various ways, such as alerting of impending dangers and attacking enemies.', 125, 'XBOX 360', 'active'),
(31, 'Fire Emblem Fates: Conquest', 'The overarching story follows the protagonist, a customizable Avatar created by the player, as they are unwillingly drawn into a war between the Kingdoms of Hoshido (their birthplace) and Nohr (their adopted home), and must choose which side to support. In Revelation, the Avatar rallies both sides against the true mastermind behind the war. The gameplay, which revolves around tactical movement of units across a grid-based battlefield, shares many mechanics with previous Fire Emblem games, although some elements are unique to each scenario.', 315, '3DS', 'active'),
(32, 'Fire Emblem Fates: Birthright', 'The overarching story follows the protagonist, a customizable Avatar created by the player, as they are unwillingly drawn into a war between the Kingdoms of Hoshido (their birthplace) and Nohr (their adopted home), and must choose which side to support. In Revelation, the Avatar rallies both sides against the true mastermind behind the war. The gameplay, which revolves around tactical movement of units across a grid-based battlefield, shares many mechanics with previous Fire Emblem games, although some elements are unique to each scenario.', 300, '3DS', 'active'),
(33, 'Rune Factory 4', 'Rune Factory 4[a] is a role-playing video game developed by Neverland Co. and published by Marvelous AQL for the Nintendo 3DS. It is the sixth game in the Rune Factory series, and the first to be released on the 3DS. It was released in Japan in July 2012 and in North America in October 2013.[1][2] While the game was originally announced for European release, it was later cancelled due to the bankruptcy of Neverland in early 2014. Xseed Games would later release the game in Europe and Australia via the Nintendo eShop in December 2014.[3]', 3333, '3DS', 'active'),
(34, 'Professor Layton vs. Phoenix Wright: Ace Attorney', 'Professor Layton vs. Phoenix Wright: Ace Attorney[a] is a visual novel adventure puzzle video game for the Nintendo 3DS, and was developed by both Level-5 and Capcom, the former publishing it in Japan while Nintendo published it worldwide. The game is a crossover between two games series from both developers, combining the puzzle and exploration elements of Level-5\'s Professor Layton series, and the general trial mechanics of Capcom\'s Ace Attorney adventure series, the latter enhanced by the addition of a few new elements.[6][7] Shu Takumi, the series director for the Ace Attorney series, assisted with the scenario designs for the game. The plot focuses on Professor Layton and Phoenix Wright, along with their associated assistants, working together to solve the mystery behind a young girl that they both encounter separately, and a strange world they are brought to through her, with Layton focused on finding clues to solve the mystery, while Wright focuses on protecting people who are put on trial for being \"witches\".', 300, '3DS', 'draft');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartID`);

--
-- Indexes for table `cartlist`
--
ALTER TABLE `cartlist`
  ADD PRIMARY KEY (`cartListID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedbackID`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`memberID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`prodID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `cartlist`
--
ALTER TABLE `cartlist`
  MODIFY `cartListID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedbackID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `prodID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
