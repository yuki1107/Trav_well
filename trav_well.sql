-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 07, 2014 at 06:18 PM
-- Server version: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `trav_well`
--

-- --------------------------------------------------------

--
-- Table structure for table `captcha`
--

CREATE TABLE `captcha` (
  `captcha_id` bigint(13) unsigned NOT NULL AUTO_INCREMENT,
  `captcha_time` int(10) unsigned NOT NULL,
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `word` varchar(20) NOT NULL,
  PRIMARY KEY (`captcha_id`),
  KEY `word` (`word`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `captcha`
--

INSERT INTO `captcha` (`captcha_id`, `captcha_time`, `ip_address`, `word`) VALUES
(61, 1407449730, '::1', 'qdKxasgl'),
(62, 1407449743, '::1', 'eNYCcoLB'),
(63, 1407449746, '::1', 'JKLzXMYW'),
(64, 1407449810, '::1', '67R1vTc7'),
(65, 1407449827, '::1', 'P24YeTfp');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `picture_url` varchar(200) NOT NULL,
  `icon_url` varchar(300) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`cityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`cityID`, `name`, `country`, `picture_url`, `icon_url`, `description`) VALUES
(1, 'Toronto', 'Canada', 'assets/images/cityToronto.jpg', 'assets/images/Toronto.gif', 'One of Canada’s best kept secrets, Toronto is on par with New York City, San Francisco, and Chicago when it comes to cultural attractions and urban endeavors.<br /><br />\r\n\r\nThe best place to start is at the top; and in Toronto, there’s no mistaking where that is. The landmark CN Tower is the tallest free-standing structure in the West (Malaysia has a taller free-standing structure), and also an important telecommunications hub. Take the elevator to the top for a breathtaking view of the city and its surrounding areas. <br /><br />\r\n\r\nThe CN Tower is situated close to Lake Ontario.  From there, you can work your way north and explore the rest of what Toronto has to offer. Right next door to the Tower, at the Rogers Centre (formerly SkyDome), you can catch a Blue Jays baseball game in the summer, or just walk around the massive stadium. Newly opened, the Ripley''s Aquarium of Canada sits at the base of the CN Tower and is ideal for families and aquatic lovers alike.<br /><br />\r\n\r\nAlso in and around the city, check out the Royal Ontario Museum, the largest in Canada, with fascinating archaeology and natural history exhibits. There’s also the Art Gallery of Ontario, with a fine collection of European and Canadian works. If you’re into shopping, don’t miss the wide array of funky stores, ethnic restaurants — and of course the Eaton Centre (one of the city''s largest indoor shopping malls) — all on Queen Street West. <br /><br />\r\n\r\nFor a relaxing experience, head back down to the waterfront and enjoy Toronto’s Harbourfront, a complex of unique shops and restaurants right on beautiful Lake Ontario. If you’re all shopped out, enjoy a nice stroll on the boardwalk and take in the great views of the city skyline.  From Harbourfront, you can escape the hustle and bustle of the city with a hop on the ferry to the Toronto Islands, an excellent spot for a picnic and some outdoor recreation. <br /><br />\r\n\r\nToronto is a great destination for singles, families and executives. It is an incredibly clean, safe and easy city to get around, either on foot or by public transportation.'),
(2, 'Ottawa', 'Canada', 'assets/images/cityOttawa.jpg', 'assets/images/Ottawa.gif', 'Ottawa is the capital of Canada and the fourth largest city in the country. The city stands on the south bank of the Ottawa River in the eastern portion of Southern Ontario. Ottawa borders Gatineau, Quebec, and together they form the National Capital Region (NCR).<br/><br/>\r\nFounded in 1826 as Bytown and incorporated as "Ottawa" in 1855, the city has evolved into a political and technological centre of Canada. Its original boundaries were expanded through numerous minor annexations and ultimately replaced by a new city incorporation and major amalgamation in 2001 which significantly increased its land area. The name "Ottawa" is derived from the Algonquin word adawe, meaning "to trade".<br/><br/>\r\n\r\n\r\nInitially an Irish and French Christian settlement, Ottawa has become a multicultural city with a diverse population. The 2011 census had the city''s population as 883,391, the census metropolitan area population as 1,236,324. The city is known as being among the most educated in Canada and hosts a number of post-secondary, research, and cultural institutions. Ottawa has a high standard of living and low unemployment.<br/><br/>\r\n\r\n\r\nOttawa is situated on the south bank of the Ottawa River and contains the mouths of the Rideau River and Rideau Canal. The older part of the city (including what remains of Bytown) is known as Lower Town, and occupies an area between the canal and the rivers. Across the canal to the west lies Centretown and Downtown Ottawa, which is the city''s financial and commercial hub. As of 29 June 2007, the Rideau Canal, which stretches 202 km to Kingston, Fort Henry and four Martello towers in the Kingston area was recognized as a UNESCO World Heritage Site.<br/><br/>\r\n\r\nLocated on a major, yet mostly dormant fault line, Ottawa is occasionally struck by earthquakes. Across the Ottawa River, which forms the border between Ontario and Quebec, lies the city of Gatineau, itself the result of amalgamation of the former Quebec cities of Hull and Aylmer together with Gatineau. Although formally and administratively separate cities in two separate provinces, Ottawa and Gatineau collectively constitute the National Capital Region, which is considered a single metropolitan area. One federal crown corporation has significant land holdings in both cities, including sites of historical and touristic importance. <br/><br/>'),
(3, 'Vancouver', 'Canada', 'assets/images/cityVancouver.jpg', 'assets/images/Vancouver.gif', 'Ringed by snow-capped, forested mountains dropping down to miles of sandy beaches, Vancouver is a city where you can snowboard and sail on the same day. Against the stunning scenic backdrop, you''ll find a medley of sophisticated restaurants, leafy parks, and lively, earthy brew pubs. As Vancouver pulsates with a smug and sassy youthfulness, Victoria,British Columbia''s capital city, is more seasoned -- like that of an elder sister whose English beauty is more than skin deep.<br/><br/>\r\n\r\nGiant, colorfully carved totem poles tower above an impressive collection of First Nations masks and sculptures at the Museum of Anthropology. Visit the belugas, otters, and dolphins at the Vancouver Aquarium in Stanley Park, before seeing historic and modern art at the downtown Vancouver Art Gallery. To reach Granville Island''s plentiful Public Market,hop on a tiny ferry to cross False Creek. In Victoria, stroll the cobblestone streets of Old Town before taking traditional afternoon tea at the Fairmont Empress.<br/><br/>\r\n\r\nWhen the sun is shining, you''ll join a stampede of Vancouverites heading to the city''s beaches, hiking trails, and mountain slopes. Biking, running, or walking the Stanley Park Seawall rates highly for its at-your-own-pace vibe and panoramic views. In Victoria, you can take a jeep-safari through farms and vineyards, or spot harbor seals, whales, and dolphins on awhale-watching tour.<br/><br/>\r\n\r\nAmid a rich culinary region, seafood is king in Vancouver and Victoria. Try a six-course seafood medley, paired with a glass of wine from an Okanagan winery, at five-star Yaletown dining rooms. Dining options are plentiful and often cheap, be it delectable Thai in Kitsilano, a raw food menu near Main Street, or inventive Chinese tapas in Chinatown. In Victoria, you''ll find a variety of culinary styles downtown.<br/><br/>\r\nIn Vancouver, you can rub shoulders with the nightclub crowd on funky Granville Street downtown. Hip Yaletown offers up swanky cocktail bars and clubs. For more laid-back surrounds, join the relaxed beach crowd at a variety of watering holes in Kitsilano. In summer, picnic in Stanley Park and watch Theatre Under the Stars. In Victoria, stop for a pint at a convivial waterside brewpub, or visit the cool bar in the Fairmont Express for blue martinis with hot jazz.<br/><br/>\r\n'),
(4, 'ShangHai', 'China', 'assets/images/cityShangHai.jpg', 'assets/images/ShangHai.gif', 'Shanghai is the largest Chinese city by population and the largest city proper by population in the world. It is one of the four direct-controlled municipalities, with a population of more than 24 million as of 2013. It is a global financial center, and a transport hub with the world''s busiest container port. The city is vital to the country''s future. No other city in the country is more vibrant and fascinating or has such a unique colonial past. Located in the Yangtze River Delta in East China, Shanghai, literally ''Above the Sea'', sits at the mouth of the Yangtze in the middle portion of the Chinese coast. The municipality borders the provinces of Jiangsu and Zhejiang to the north, south and west, and is bounded to the east by the East China Sea.<br/><br/>\r\n\r\n\r\nFor centuries a major administrative, shipping, and trading town, Shanghai grew in importance in the 19th century due to European recognition of its favorable port location and economic potential. The city was one of five opened to foreign trade following the British victory over China in the First Opium War while the subsequent 1842 Treaty of Nanking and 1844 Treaty of Whampoa allowed the establishment of the Shanghai International Settlement and the French Concession. The city then flourished as a center of commerce between east and west, and became the undisputed financial hub of the Asia Pacific in the 1930s. However, with the Communist Party takeover of the mainland in 1949, trade was reoriented to focus on socialist countries, and the city''s global influence declined. In the 1990s, the economic reforms introduced by Deng Xiaoping resulted in an intense re-development of the city, aiding the return of finance and foreign investment to the city.<br/><br/>\r\n\r\n\r\nShanghai is a popular tourist destination renowned for its historical landmarks such as The Bund, City God Temple and Yu Garden as well as the extensive Lujiazui skyline and major museums including the Shanghai Museum and the China Art Museum. It has been described as the "showpiece" of the booming economy of mainland China.<br/><br/>\r\n\r\n\r\nShanghai has a rich collection of buildings and structures of various architectural styles. The Bund, located by the bank of the Huangpu River, contains a rich collection of early 20th-century architecture, ranging in style from neoclassical HSBC Building to the art deco Sassoon House. A number of areas in the former foreign concessions are also well-preserved, the most notable ones being the French Concession.<br/><br/>\r\n'),
(5, 'HongKong', 'China', 'assets/images/cityHongKong.jpg', 'assets/images/HongKong.gif', 'Hong Kong is a huge city with several district articles containing sightseeing, restaurant, nightlife and accommodation listings.<br/><br/>\r\n\r\n\r\nHong Kong is a Special Administrative Region (SAR) of the People''s Republic of China. It is a place with multiple personalities, as a result of being both Cantonese Chinese and under a more recent contemporary ex-British influence. Today, the former British colony is a major tourism destination for China''s increasingly affluent mainland population. It is also an important hub in East Asia with global connections to many of the world''s cities. It is a unique destination that has absorbed people and cultural influences from places as diverse as Vietnam and Vancouver and proudly proclaims itself to be Asia''s World City. <br/><br/>\r\n\r\nHong Kong is the first Special Administrative Region (SAR) of China (the other being Macau). Before the transfer of sovereignty was returned to China in 1997, Hong Kong had been a British Colony for nearly 150 years. As a result, most infrastructure inherits the design and standards in Britain. During the 1950s to 1990s, the city-state developed rapidly, becoming the first of the "Four Asian Tigers" through the development of a strong manufacturing base and later a financial sector. Hong Kong is now famous for being a leading financial centre in East Asia, with the presence of local and some of the most recognized banks from around the world. Hong Kong is also famous for its transition port, transporting a significant volume of exports from China to the rest of the world. With its political and legal independence, Hong Kong is known as the Oriental Pearl with a twist of British influence in the culture.<br/><br/>\r\n\r\nHong Kong is much more than a harbour city. The traveller weary of its crowded streets may be tempted to describe it as Hong Kongcrete. Yet, this territory with its cloudy mountains and rocky islands is mostly a rural landscape. Much of the countryside is classified as Country Park and, although 7 million people are never far away, it is possible to find pockets of wilderness that will reward the more intrepid tourist.<br/><br/>');

-- --------------------------------------------------------

--
-- Table structure for table `cityBeen`
--

CREATE TABLE `cityBeen` (
  `userID` int(30) NOT NULL,
  `cityID` int(30) NOT NULL,
  PRIMARY KEY (`userID`,`cityID`),
  KEY `cityID` (`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  `content` text NOT NULL,
  `commentID` int(30) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  PRIMARY KEY (`commentID`),
  KEY `userID` (`userID`),
  KEY `placeID` (`placeID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`userID`, `placeID`, `content`, `commentID`, `time`) VALUES
(1, 11, 'This place is great!', 1, '2003-12-31 01:02:03'),
(3, 51, 'dfghjlk', 2, '2014-08-07 17:48:14'),
(3, 51, 'fghjk', 3, '2014-08-07 17:53:13');

-- --------------------------------------------------------

--
-- Table structure for table `friendship`
--

CREATE TABLE `friendship` (
  `user1` int(30) NOT NULL,
  `user2` int(30) NOT NULL,
  `confirmed` bit(1) NOT NULL,
  PRIMARY KEY (`user1`,`user2`),
  KEY `user2` (`user2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `messageID` int(30) NOT NULL AUTO_INCREMENT,
  `sender` int(30) NOT NULL,
  `receiver` int(30) NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  `read` bit(1) DEFAULT b'0',
  PRIMARY KEY (`messageID`),
  KEY `sender` (`sender`),
  KEY `receiver` (`receiver`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`messageID`, `sender`, `receiver`, `content`, `time`, `read`) VALUES
(1, 3, 1, 'Hello!', '2003-12-31 01:02:03', '\0');

-- --------------------------------------------------------

--
-- Table structure for table `place`
--

CREATE TABLE `place` (
  `placeID` int(30) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `address` varchar(200) NOT NULL,
  `contact` varchar(60) DEFAULT NULL,
  `type` varchar(20) NOT NULL,
  `cityID` int(30) NOT NULL,
  `description` text NOT NULL,
  `picture_url` varchar(300) NOT NULL,
  PRIMARY KEY (`placeID`),
  UNIQUE KEY `Contact` (`contact`),
  KEY `cityID` (`cityID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `place`
--

INSERT INTO `place` (`placeID`, `name`, `address`, `contact`, `type`, `cityID`, `description`, `picture_url`) VALUES
(11, 'MillieCreerie', '161 Baldwin street <br />\r\nToronto, ON M5T 1L9<br />', '416-977-1922', 'restaurant', 1, 'This is probably the question we are asked most often. The standard answer is that a Japanese crepe is slightly thinner and crispier than its French counterpart, and it''s rolled into a cone shape so that it can be easily handheld. Generally speaking, our crepe combinations are slightly less sweet and syrupy than what you would find at other creperies. We take pride in using the freshest ingredients, sourced locally whenever possible, and often from our neighbours right here in Kensington Market. Our batter is made with fresh eggs, milk, and butter - no mixes at this creperie!<br/><br/>\r\nCrepes first appeared in Harajuku, a district in Tokyo. Harajuku is a busy, happening area where there is tons to see and do. The concept of a handheld crepe was born here; in Harajuku, people weren''t particularly interested in sitting down and eating their crepes with a knife and fork. At Millie Creperie, we believe that Japanese Crepes in a location like Kensington Market is the perfect addition to the neighbourhood. Like in Harajuku, there is always lots to see and do in the Market, so grab and crepe and start exploring!<br/><br/>', 'assets/images/MillieCreperie.jpg'),
(12, 'Bar Buca', '75 Portland, at King W <br/>', '416-599-2822', 'restaurant', 1, 'Rob Gentile''s way-too-corporate Buca on King West isn''t exactly our cup of Tetley''s, but its nearby casual cousin is much more to our liking.<br/><br/>\r\nWe''re mad for the cannoli stuffed with lemony mascarpone and crumbled pistachios the all-day café sells in its upfront coffee bar, and the terrific porchetta sandwiches on house-baked focaccia the size of frisbees it offers in the slightly more formal 40-seat dining room to the rear. And dig those industrial wine racks fashioned from angle iron overhead!<br/><br/>\r\nThere are inexpensively priced platters of frito misto - crisp baby artichokes with lemony zabaglione custard, deep-fried testina pig''s face - and gluten-free mains like minced goat ''n'' ricotta meatballs in a classically simple tomato sauce, hold the pasta. At weekend brunch, Gentile layers eggy tissue-thin omelettes with butterflied rock shrimp, and completes a stew of skinny house-made liver sausage and nutty barley-like faro with the wholly poached eggs of free-range hens.<br/><br/>\r\nAnd if there''s a more professional and sincerely welcoming crew of servers around, I''ve yet to meet them.<br/><br/>', 'assets/images/toronto-BarBuca.jpg'),
(21, 'Black Cat Bistro', '428 Preston St.<br/>', '613-569-9998', 'restaruant', 2, 'Steve Vardy may no longer preside here, but his ideas live on in many of our trendiest restaurant kitchens. His unique flare for pairing pretty proteins with elegant flashes of deep, natural flavour seems to have had a lasting impact on the brigade of young chefs who are cooking their hearts out around town these days.<br/><br/>\r\nAs mentors go, it makes sense. He had a knack for putting restaurants on the culinary map, ruling the range at Beckta and The Whalesbone before becoming the Cat’s inaugural chef on Preston Street in 2008 (Black Cat Café had existed for the previous decade in the market).<br/><br/>\r\nWhen Vardy left, a young and inexperienced cook, Patricia Larkin, was promoted to executive chef. The boss, Richard Urquhart, turned over the reins, leaving Larkin free to develop her own menu. Unlike many of her peers, she is no copycat.<br/><br/>\r\nLarkin has a mind and style of her own. My most recent dinner featured a filet of wild salmon that demonstrated such quiet confidence and harmony that it stopped me in my tracks. What struck me most was that it was a meal, not a concept. The flavours and textures were already expertly layered, without my having to do the work of dabbing and assembling all sorts of dips, foams, and frills. It was just earthy mushrooms and firm, buttery fingerling potatoes set against the crispy skin and meaty flesh of the fish. Capers added a slight zing to a mischievous brown butter sauce that gently moistened, seasoned, and wrapped itself around every delicious bite. Might this be a case of the student outshining the teacher?<br/><br/>', 'assets/images/ott-BlackCatBistro2.jpg'),
(22, 'Navarra by René Rodriguez', '93 Murray St.<br/>', '613-241-5500', 'restaurant', 2, '“I don’t know what half of this stuff is,” said a woman as she walked away from the tapas menu on a Tuesday night.<br/><br/>\r\nIt’s too bad this intimate Basque-inspired bistro gives off an intimidating vibe. Much of the warmth and charisma is reserved for the food. Navarra reflects its enigmatic chef-owner René Rodriguez, who rarely makes eye contact with patrons. I remember interviewing him before he opened the restaurant, and he struck me as one of the most guarded chefs I had ever met — never opening up or revealing where his passion for food came from.<br/><br/>\r\nOnly the Food Network says chefs must be personable and engaging. But judging by the delicious food, Rodriguez seems content to cook, tinker with kitchen gadgets, and let us fill in the blanks about what makes him tick.<br/><br/>\r\nThat night I fell under the spell of live flamenco music and the “bullfighter dinner,” a giant sweet and tangy beef rib, its fall-off-the-bone goodness infused with anise and apple, complemented by a chili-dipped hard-boiled egg and a plucky green sauce made with grainy dijon and cornichons. It didn’t replace a ticket to the Costa Brava, but it certainly made Ottawa feel a lot more interesting. Rome joined northern Spain as Rodriguez’ muse on a recent menu. I am hoping the black corn tamale signals a foray into the flavours of his childhood in Mexico.<br/><br/>', 'assets/images/ott-NavarraByRenéRodriguez.jpg'),
(23, 'The Works', '3500 Fallowfield Road <br/>', '613-823-1234', 'restaurant', 2, 'The WORKS is a fun, edgy concept that is extremely connected to the community. We pride ourselves with providing guests with a genuine, unique experience comparable to no other. And that is exactly the kind of person we are looking for- genuine, unique and connected to the community.<br/><br/>\r\nAn industry like no other! This isn''t a cushy 9-5 job. It''s a passion, a dedication and commitment to service and hospitality. In the restaurant industry you work hard to play hard and that is exactly what The WORKS provides, a challenging, exciting atmosphere where you have fun and are rewarded on a daily basis.<br/><br/>\r\nGet your hands dirty! The WORKS is an ''owner operator'' model that requires Local Owners to operate as the General Manager of the restaurant. It''s great! You are seen as an icon in the community. As the Local Owner you will be responsible for creating ultimate visibility not only in your restaurant but your neighbourhood as well. Enjoy the rewards of having the coolest damn restaurant in town; everyone will know who you are.<br/><br/>', 'assets/images/ott-theWorks1.jpg'),
(31, 'L’Abattoir', '217 Carrall St. <br/>', '604-568-1701', 'restaurant', 3, 'L''Abattoir is located in the center of Gastown between historic Gaoler''s Mews and Blood Alley. The restaurant was built in the 19th century and is the site of Vancouver''s first jail. Originally buttressed to the city''s main butchery and meat packing district, the name L''Abattoir pays homage to the neighbourhood''s colourful past.<br/><br/>\r\nSet in a refurbished brick and beam building that combines classic French tile work with industrial fixtures, natural wood, and glass and steel finishes, the restaurant offers a bar and lounge setting, elevated dining room and plush, sun soaked atrium.<br/><br/>\r\nChef Lee Cooper and General Manager Paul Grunberg are dedicated to highlighting the finer points of eating and drinking in L''Abattoir''s informed but informal setting. French influenced West Coast fare is paired with Sommelier Robert Herman''s eclectic wine program and Head Barman Shaun Layton''s innovative cocktail list to offer a truly unique dining experience.<br/><br/>\r\nServing seven nights a week, Monday to Sunday. Join us.<br/><br/>\r\n*L''Abattoir now allows guests to bring in their own special 750ml bottle of wine to have with dinner, given the bottle is not already available on our wine list. Corkage $30. 1 bottle per table. If a bottle of wine is purchased from the restaurant corkage will be waived.<br/><br/', 'assets/images/van-L’Abattoir.jpg'),
(32, 'Blue Water Cafe', '1095 Hamilton St.<br/>', '604-688-8078', 'restaurant', 3, 'We are committed to exclusively sourcing wild, sustainable seafood — and crafting innovative and memorable West Coast dishes. Our Raw Bar exudes a true Japanese culinary aesthetic, consistently delivering pure, clean flavours and unique presentations.<br/><br/>\r\nThe striking dining room provides active views of the “East meets West” kitchen and Raw Bar. The sweeping main bar leads out to the heated patio and the private dining rooms, which hold our deep and diverse wine collection.<br/><br/>\r\nHoused in a handsome brick and beam heritage warehouse conversion, Blue Water Cafe is in the heart of the historic and vibrant Yaletown neighbourhood.<br/><br/>\r\nChef Frank Pabst was an early adherent of sustainable seafood. His Unsung Heroes Menu in February tempts diners to try abundant, under-appreciated fish, like jellyfish, geoduck, periwinkles, sea cucumber and sea urchin. The restaurant sushi bar is been a go-to spot for good sushi and sashimi (although sushi chef Yoshi Tabo left to work for Ki last January) . Diner demand has made Pabst’s sablefish with miso sake glaze, quinoa and shiitake mushrooms, bonita dashi with soy and yuzu a Blue Water signature.<br/><br/>', 'assets/images/van-blueWatercafe.jpg'),
(33, 'West', '2881 Granville St.<br/>', '604-738-8938', 'restaurant', 3, 'Recognized as the ‘jewel in Vancouver''s culinary crown’, West''s outstanding contemporary regional cuisine and seamless service has earned much critical acclaim. Pristine seasonal ingredients are sourced to deliver superbly conceived dishes offering modern interpretations of classics.<br/><br/>\r\nFor those keen to observe ‘behind the scenes’ action and experience West from a unique perspective, the two ‘chef''s tables’ can be found directly adjacent to the presentation kitchen. One of the highlights of the dining room is a temperature-controlled wall of wine, and under it, the long cherry wood bar that gracefully anchors the conversation—where martinis and cocktails are composed of fresh herbs, juices and creative infusions.<br/><br/>\r\nA Werner Forster installation floats under the ceiling—a study of light and motion. The leather chairs are the Mario Bellini designed originals found at MOMA, surrounding etched stone tabletops, highlighting a handsome and inviting room that speaks to contemporary Vancouver.<br/><br/>', 'assets/images/van-west2.jpg'),
(41, 'Dashu Wujie', 'Fourth Floor, Bund 22, Zhongshan Dong Er Lu<br/>\r\nnear Xinyongan Lu, Huangpu district,<br/>', '6375-2861', 'restaurant', 4, 'Shanghai''s most ambitious new vegetarian restaurant, WUJIE is an upscale brand from the owner of Shanghai''s well-known four-branch chain, Vegetarian Lifestyle. WUJIE is a big step up from the casual Vegetarian Eatery in design and service. <br/><br/>\r\n\r\nThe menu, presented on an iPad, is meticulously composed all-vegetarian cuisine, with ingredients like organic strawberries from Chongming Island and wild truffles from Yunnan. The building''s six floors are themed on the five elements, the first floor being water, and then up through wood, fire (the kitchen''s on the third floor), earth, gold and finally, a completion of the cycle with the return to a water theme for the sixth floor traditional teahouse.<br/><br/>', 'assets/images/SH-TaoHeung.jpg'),
(42, 'Tao Heung', 'Room 301, Third Floor, IAPM Mall,<br/> \r\n999 Huaihai Zhong Lu, <br/>\r\nnear Shaanxi Nan Lu, Xuhui district<br/>', '3363-7999', 'restaurant', 4, 'With the dozens of restaurants vying for your stomach at the shiny IAPM mall, how do you pick a winner? Do you follow the buzz of the largest crowd? If so, you’d head to Tao Heung which has a permanent scrum of queuing diners massed around the entrance at peak hours. You punch a machine for your reservation slip which informs you the number of tables ahead of you. You can then hit up the neighbouring machine to order your dinner long before you’ve even sat at your table.<br/><br/>\r\n\r\nThe allure of this Hong Kong import (a massive chain listed on Hong Kong’s stock exchange) is vast variety and budget prices. You can order from three menus (in Chinese only, with photos) including hot pot, classical Cantonese main dishes and dim sum (only dim sum is available from the menu machines). We recommend sticking to the value for money dim sum which includes several 8RMB specials on weekdays.<br/><br/>', 'assets/images/SH-TaoHeung.jpg'),
(43, 'Da Dong', 'Fifth Floor, Reel Shopping Mall, 1601 Nanjing Xi Lu <br/>\r\nnear Changde Lu, (Enter via office building on Changde Lu) Jingan district<br/>', '3253-2299', 'restaurant', 4, 'Maybe it’s the huge expectation that comes from approaching the first Shanghai outpost of one of Beijing’s finest roast duck restaurants, but we swear we can smell wafts of fruit wood when we enter the ground floor of the Réel Department Store in Jingan that houses Da Dong. The anticipation builds as we take the lift to the fifth floor and are greeted with a delightful aroma that this time is unmistakable. Da Dong has arrived.<br/><br/>\r\n\r\nWith five branches in the capital (and two more on the way), celebrity chef Dong Zhenxiang has established his duck chain as the go-to Peking duck joint and it’s a surprise that it’s taken him this long to expand south. If he was concerned over how popular the cuisine would prove in Shanghai, he really needn’t have worried; the restaurant has been consistently packed since it opened last month. With only a few tables available for booking, that usually means eager customers need to wait for a seat, but Da Dong’s policy of providing free-flow soft drinks and wine to those queuing softens the blow.<br/><br/>', 'assets/images/SH-DaDong.jpg'),
(51, 'One Dim Sum Chinese Restaurant', '15 Playing Field Road, Kenwood Mansion, Prince Edward, Shop 1 & 2, G/F,, Hong Kong, China', '852-27892280', 'restaurant', 5, 'Hongkong is not a cheap destination to visit... Everything seems to be overpriced compared to my country (Indonesia), but here, you won''t think you''re in Hong Kong. The price of every menu in One DimSum is so affordable. The main thing is that they taste so so so good. Well, good food can be found all around HK, but the combination of taste and price and also location, it is worth a visit for this restaurant. It opens 10am, try to reach there 9.30 to avoid long queue. All menus are recommended, especially the bbq pork bun, har gao, beef meatball, shu mai, fried dumpling with sweet sour sauce... and many more...<br/><br/>\r\nJust for information, HK people is not good in hospitality,   do not expect kind smile on people''s face around HK, but this busy restaurant is quite kind to customer. So, if it''s not because of the foods, I might not want to come back to HK.<br/><br/>', 'assets/images/HK-One-Dim-Sum-Hong-Kong-141.jpg'),
(52, 'Din Tai Fung (Yee Wo Branch)', '68 Yee Wo Street, Causeway Bay <br/>\r\nHong Kong, China (Causeway Bay)<br/>', '852-3160-8998', 'restaurant', 5, 'My friend is working in Hong Kong and it''s his birthday in May so I got some vaccations and flied to Hong Kong planning to stay there for a while. I heard people saying that the Shanghai cuisine restaurant in Hong Kong tastes quite well, that they are using the same recipe which local and authenic Shanghai cuisine restaurants are using at the moment. So I went in, as it is just next to my hotel.<br/><br/>\r\n\r\nI asked the crews there and ask for a table for 2, as it is on monday at about 5/6, we did not have to wait too long for it. I at once ordered a Xiao Long Bao, Noodles with spicy sesame and Peanut sauce. Firstly let''s talk about the price. It was only $100 for one big bowl of noodles like that. My friend had talked with me about the unebelievable prices in Hong Kong restaurants, but still I think this is just paradise. If i was born in Hong Kong I believe I would be really really fat. <br/><br/>\r\n\r\nOk let''s go back to the food. The Xiao Long Bao came first and although it''s only a few in the steam cage, it tastes really good. I have to firstly talk about the texture of the wrapping of the Xiao Long Bao, it was thin, but enough I think, as if I chew it I feel like it is responding me, reflecting my actions, ok well it''s a bit hard to get if I talk like this so actually what I mean is that the wrapping was perfect. Then the pork inside was really hot and juicy, which gives me such a good feeling as I always enjoy Chinese food not because of the price, the smell nor the texture, but the taste. The taste was always good, and with the hot juice, Xiao Long Bao could be said as one of the best Chinese food in the world mate.<br/><br/>\r\n\r\nThe Noodles with spicy sesame and peanut sauce was also fantastic. The texture of the dish was really good and again good texture with good and hot taste was always my favourite. But it''s just one thing that I dont quite like this dish, I mean I like it but I would not order it very often as they were so spicy haha, and you know for a British it''s already way too much and yeah that''s why.<br/><br/>', 'assets/images/HK-DinTaiFung.jpg'),
(53, 'Cafe Gray Deluxe', '88 Queensway, Level 49, The Upper House, Hong Kong, China (Admiralty)', '852-39681106', 'restaurant', 5, 'This has everything to do with expectations. The expectation was high before stepping into Café Gray Deluxe because, first, this is the main restaurant in Swire’s first hotel property in Hong Kong, the much-hyped The Upper House in Admiralty; and second, and most of all, Gray Kunz is back. The famous chef, who helmed fine-dining restaurant Plume at the defunct Regent Hotel back in 1980s, was basically a celebrity chef in Hong Kong before there was such a thing. Kunz, famous for his cutting edge, almost avant-garde dishes, took his art to New York, where he worked at the famous Lespinasse, making a name for himself there. And now he’s back.And the result? Hmm, let’s just say our justifiably high expectations steered this three-star rating. While everything we had—from the saffron pasta with tomato, the steamed snapper, to the crème brulée—was tasty, none of the dishes blew us away. We have a feeling that chef Gray might have been the cutting-edge hippie back in the day, but this kind of combination in taste, cuisine and presentation is not exactly something we haven’t seen before over the past decade. We walked into the restaurant expecting exciting dishes and all, but we ended up disappointed.<br/><br/>', 'assets/images/HK-CafeGrayDeluxe.jpg'),
(61, 'Yorkdale', '3401 Dufferin Street<br/>\r\nToronto, ON M6A 2T9<br/>', '416-789-3261', 'shopping', 1, 'A trip to Yorkdale is all about perusing Mink Mile staples without the pressure to buy anything or leave - like visiting a museum of useless things money can buy (the admission fee is surviving the apocalyptic parking lot). Nothing cures suburban ennui like eating Kernels popcorn while playing "spot the apology jewelry" at Tiffany. For the more dignified, there are unique stores like Topshop, L''Occitane and Zara Home, and tons of covetable fashion items for all budgets.<br/><br/>', 'assets/images/yorkdale.jpg'),
(62, 'Toronto Eaton Centre', '220 Yonge Street,<br/> \r\nToronto, ON M5B 2H1 <br/>', '416-598-8560', 'shopping', 1, 'Though it''s overcrowded and inefficient, the city''s largest mall remains a fashion destination, with stores like J. Crew, a flagship H&M, and Michael Kors (with the arrivals of Saks and Nordstrom pending). Recent revamps have elevated dining options, and brought visual interest to standard mall staples like Sephora and Shoppers Drug Mart. Stay away on weekends and holidays, when it transforms into the naked mole rat exhibit at the Toronto Zoo.<br/><br/>', 'assets/images/eaton.jpg'),
(63, 'Square One', '100 City Centre Drive<br/> \r\nMississauga, ON L5B 2C9 <br/>\r\n', '905-279-7467', 'shopping', 1, 'Practically a city unto itself, this Mississauga mall is similar to Scarborough Town Centre in its mix of independent, chain and big box retailers. Though slightly less eclectic (and far harder to navigate) than its eastern counterpart, Square One stands out for bringing western GTA residents less-common stores like Lush, Target and Boathouse. The mall is also home to vital community services, including the GTA''s largest farmer''s market and the Square One Older Adults Centre. <br/><br/>', 'assets/images/squareone.jpg'),
(71, 'Rideau Centre', '50 Rideau St, <br/>\r\nOttawa, ON K1N 9J7<br/>', '613-236-6565', 'shopping', 2, 'Connected via indoor walkway to both the Westin Ottawa Hotel and the Ottawa Congress Centre, this mall is a convenient destination for residents and tourists. About 140 stores include international retailers such as Sears, Swarovski, Gymboree, Hugo Boss, Guess, Old Navy, Roots, BCBG Max Azria, Talbot''s and Nine West. When you need a break, head to the food court for a quick bite, or one of several full service restaurants for a more leisurely respite. There''s also a movie theater.<br/><br/>', 'assets/images/rideau.jpg'),
(72, 'Bayshore Shopping Centre', '100 Bayshore Dr<br/>\r\nOttawa, ON K2B 8C1<br/>', '613-829-7491', 'shopping', 2, 'The multi-level Bayshore Shopping Centre features more than 150 stores, from international retailers to locally owned boutiques. You''ll find shops such as Old Navy, Banana Republic, Talbot''s, Crabtree and Evelyn, EB Games, and department stores The Bay and Zeller''s. The mall''s play area is popular with kids (and weary parents!), and the food court offers all the familiar favorites.<br/><br/>', 'assets/images/bayshore.jpg'),
(73, 'Place d''Orleans', '110 Place d''Orleans Dr<br/>\r\nOttawa, ON K1C 2L9<br/>', '613-824-9050', 'shopping', 2, 'Anchored by The Bay and Zeller''s department stores, Place d''Orleans has about 200 retail and service businesses. International chains such as The Body Shop, Eddie Bauer, American Eagle Outfitters, La Senza, Roots and Foot Locker offer a wide range of clothing, shoes, accessories and gifts. There''s a big food court too, where you can nosh on anything from soft pretzels to fried chicken to subs.<br/><br/>', 'assets/images/dorleans.jpg'),
(81, 'Pacific Centre Mall', '910-609 Granville Street<br/>\r\nVancouver, BC<br/>', '604-688-7235', 'shopping', 3, 'The Pacific Centre Mall has a great selection of shops for everyone to enjoy. It is conveniently located downtown and easily accessible by bus, taxi and car. Look below for mall information and shop listings. <br/><br/>\r\n', 'assets/images/pacific.jpg'),
(82, 'Metropolis at Metrotown', '4720 Kingsway<br/>\r\nBurnaby, BC V5H 4N2<br/>', '604-438-4700', 'shopping', 3, 'As immense as its name implies--it is the biggest mall in B.C.-- Metropolis at Metrotown is one heck of a shopping centre: It has over 450 stores, plus restaurants, movie theatres, and unique events.<br/><br/>\r\nYou can find just about anything at this gargantuan mall--from appliances to clothes to electronics--and the stores tend to be more middle-of-the-budget than high-end.<br/><br/>', 'assets/images/metro.jpg'),
(83, 'Oakridge Centre Mall', '650 West 41st Avenue<br/> \r\nVancouver<br/>', '604-261-2511', 'shopping', 3, 'Home to 150+ stores, Oakridge Centre is one of the more upscale Vancouver malls. Along with mid-range shops like Banana Republic and A/X Armani Exchange, there are several luxury brands at Oakridge, including Tiffany''s, Harry Rosen and Hugo Boss. The mall also has a large food court and movie theatres, and is accessible via Canada Line. Free underground parking is also available.<br/><br/>', 'assets/images/oakridge.jpg'),
(91, 'Shanghai IFC Mall', '8 Century Avenue<br/>\r\nPudong, Shanghai<br/>', '86 21 2020 7070', 'shopping', 4, 'A high-end shopping mall, nice shopping environment and comfortable to shop around. It is worth mentioning that the toielts are extremely clean. On the B2 there are lots of snack stands and most of them offer Japanese flavors, very much popular. The whole shopping mall is mainly decorated in the shampagne and cream -colors. Its design is fashionable and magnificent. Numerous international brands are seen here, a cluster of luxury goods.<br/><br/>\r\n', 'assets/images/ifc.jpg'),
(92, 'Plaza 66', '1266 Nanjing West Road<br/>\r\nJingan District, Shanghai<br/>\r\n', '86 21 3210 4566', 'shopping', 4, 'Plaza 66 is a commercial and office complex in Shanghai, consisting of a shopping mall and two skyscrapers. With 66 floors, Plaza 66 is the tallest building in the Puxi area of Shanghai. Entering the plaza, you feel like you are walking on an avenue, lined with shop windows. Many fashion brands have chosen this department store as the location for their flagship stores in Shanghai. The plaza holds fashion shows from time to time, where you can get close to famous designers and models from all over the world.<br/><br/>', 'assets/images/66.jpg'),
(93, 'Jiu Guang Department Store', '1618 West Nanjing Road<br/> \r\nShanghai<br/>', '86 21 3217 4838', 'shopping', 4, 'Convenient transportation and you may easily get to the shopping mall by taking meto line 2 or 7. Jiu Guang is a huge department store aircraft-carrier co-invested by Hong Kong Jiu Guang and Shanghai Jiu Bai Holding Group. It is a top rated department store that collects the major international brands like Burberry, Tiffany, Agnes’B, Bally, Celine, ck Calvin Klein, Dunhill, Thomas Pink, Omega, Vertu, OACH, HUGO BOSS and more. Don’t miss the basement supermarket and snacks.<br/><br/>', 'assets/images/jiuguang'),
(101, 'Pacific Place shopping mall ', '88 Queensway, Admiralty<br/>\r\nHong Kong Island<br/>\r\n', '852 2844 8900', 'shopping', 5, 'Pacific Place or Admiralty is situated in a top location at the centre of Hong Kong with views across the harbour. Close by are the Conrad, Shangri-La and JW Marriot giving the mall a decidedly upmarket feel. Inside the centre caters to a smattering of exclusive labels across four levels offering 130 outlets and three department stores. Brand names include Aquascutum, Brooks Brothers and Shanghai Tang; there are also plenty of fine jewellers including Chopard and Cartier.<br/> <br/>', 'assets/images/pacificpl.jpg'),
(102, 'The Landmark', '15 Queen''s Road Central<br/>  \r\nCentral, Hong Kong Island<br/> \r\n', '852 2530 4725', 'shopping', 5, 'The Landmark, also known as “Central”, is one of the oldest and most prominent shopping malls in Hong Kong, positioned between the Mandarin Oriental Hotel and office towers. Five levels of chic designer shopping offer brands that are rarely showcased elsewhere in Asia, including Diane von Furstenberg and a glittering De Beers diamonds store.<br/> <br/>', 'assets/images/landmark.jpg'),
(103, 'Harbour City', '3 - 27 Canton Road, Tsim Sha Tsui<br/>  \r\nKowloon, Hong Kong<br/>  \r\n', '852 2118 8666', 'shopping', 5, 'Harbour City at Tsim Sha Tsui, is a vast retail destination featuring more than 700 stores, 50 food and beverage outlets and a couple of cinemas over four levels. The mall is neatly divided up into four areas: Ocean Terminal, Marco Polo Hong Kong Hotel Arcade, Ocean Centre and Gateway Arcade. The Ocean Terminal is the place to shop for kids items and young fashion, plus sports outlets including Nike and PUMA are also located here.<br/> <br/> ', 'assets/images/harbour.jpg'),
(111, 'CN Tower', '301 Front Street West<br/>\r\nToronto, ON, Canada<br/>', '416-282-1234', 'landmark', 1, '\r\nThe CN Tower is Toronto’s tallest and most defining landmark. Photos of Toronto are often defined by the building, which stretches more than 550 metres into the sky.<br/><br/>\r\nToday, aside from serving as a hub for telecommunications across the city, the CN Tower has become a major tourist destination. Visitors can test their courage by walking across the glass floor 113 stories above the ground. The first of its kind in the world, the glass floor gives you that dare-to-walk-on-air experience, with only 2.5 inches of glass holding you 342 metres in the air. The glass floor is actually stronger than most commercial floors and has the strength to hold 38,556 kg or 14 hippos! Or, if you dare, travel higher up the tower to the Sky Pod, another 33 storeys above ground.\r\nThe tower’s revolving 360 Restaurant offers an award-winning wine list and a spectacular view for romantic evenings. Horizons, an upscale bistro on the Look Out Level, seats 130 and is equipped with a dance floor. If you’re not wild about heights, the Far Coast Café is a fully licensed fresh market café that serves an array of international foods and there is plenty to shop for at the base of the tower. A 10,000 sq. ft. marketplace sells uniquely Canadian souvenirs.<br/><br/>', 'assets/images/Toronto-CNTower.jpg'),
(112, 'Royal Ontario Museum', '100 Queens Park <br/>\r\nToronto, Ontario M5S 2C6<br/>', '416-586-8000', 'landmark', 1, 'Neighbourhood: University of toronto\r\nGenerations of children and adults have trooped through the museum since it first opened in 1914. With six million objects in its collections and 40 galleries of art, archaeology and natural science, the ROM offers a whole world to explore. Four giant carved totem poles rise in the centre of the stairwells; the largest is 24.5 metres tall. The hands-on Biodiversity gallery offers families a fun interactive experience about the interdependence of people, animals and plants.<br/><br/>\r\nThe dramatic Michael Lee-Chin Crystal expansion houses six permanent collection galleries that feature many objects never before displayed, along with some old favourites. They include dinosaurs and mammals, the cultures of South and Central Asia, Africa, the American continents, the Asia-Pacific region along with textiles and costumes from around the world.<br/><br/>\r\nTo commemorate the late Elizabeth Samuel, Liza’s Garden is a contemporary secret garden of greenness and sustainability, installed on the south portion of the Philosopher’s Walk wing. Created by PLANT Architect Inc, the nearly-10,000-square-foot area offers a dynamic haven of greenery.<br/><br/>\r\nThe ROM also features the Gallery of Gems and Gold, which is the final stage of the Teck Suite of Galleries. On level two, this gallery of Earth’s Treasures has about 600 rare gems, gem crystals, jewellery and gold pieces.<br/><br/>', 'assets/images/Toronto-ROM.jpg'),
(113, 'Casa Loma ', '1 Austin Terrace <br/>\r\nToronto, ON M5R 1X8<br/>', '416-923-1171', 'landmark', 1, 'Casa Loma is a Gothic Revival style house and gardens in midtown Toronto, Ontario, Canada that is now a museum and landmark. It was originally a residence for financier Sir Henry Mill Pellatt. Casa Loma was constructed over a three-year period from 1911–1914. The architect of the mansion was E. J. Lennox, who was also responsible for the designs of several other city landmarks.<br/><br/>\r\nIn 1903, Sir Henry Pellatt purchased 25 lots from developers Kertland and Rolf. Sir Henry commissioned Canadian architect E. J. Lennox to design Casa Loma with construction beginning in 1911, starting with the massive stables, potting shed and Hunting Lodge a few hundred feet north of the main building. The Hunting Lodge is a two storey 4,380-square-foot house with servant''s quarters. As soon as the stable complex was completed, Sir Henry sold his summer house in Scarborough to his son and moved to the Hunting Lodge. The stables were used as a construction site for the castle (and also served as the quarters for the male servants), with some of the machinery still remaining in the rooms under the stables.<br/><br/>', 'assets/images/Toronto-CasaLoma.jpg'),
(121, 'Parliament Hill', 'Wellington St, Ottawa, ON<br/>', '613-992-4793', 'landmark', 2, 'Parliament Hill, colloquially known as The Hill, is an area of Crown land on the southern banks of the Ottawa River in Downtown Ottawa, Ontario. Its Gothic revival suite of buildings serves as the home of the Parliament of Canada and contains a number of architectural elements of national symbolic importance. Parliament Hill attracts approximately 3 million visitors each year.<br/><br/>\r\n\r\nOriginally the site of a military base in the 18th and early 19th centuries, development of the area into a governmental precinct began in 1859, after Queen Victoria chose Bytown as the capital of the Province of Canada. Following a number of extensions to the parliament and departmental buildings and a fire in 1916 that destroyed the Centre Block, Parliament Hill took on its present form with the completion of the Peace Tower in 1927. Since 2002, an extensive $1 billion renovation and rehabilitation project has been underway throughout all of the precinct''s buildings; work is not expected to be complete until after 2020.<br/><br/>\r\n', 'assets/images/Parliament-Ottawa.jpg'),
(122, 'Beechwood Cemetery', '280 Beechwood Ave<br/>\r\nOttawa, ON K1M 8E2<br/>', '613-741-9530', 'landmark', 2, 'Beechwood Cemetery, located in Ottawa, Ontario, is the National Cemetery of Canada. It is the final resting place for over 75,000 Canadians from all walks of life, such as important politicians like Governor General Ramon Hnatyshyn and Prime Minister Sir Robert Borden, Canadian Forces Veterans, War Dead, members of the Royal Canadian Mounted Police, and men and women who have made a mark on Canadian history. In addition to being Canada''s National Cemetery, it is also the National Military Cemetery of Canada and the Royal Canadian Mounted Police National Memorial Cemetery.<br/><br/>\r\n\r\nAn exceptional example of 19th-century rural cemetery design, containing a concentration of mausolea, monuments, and markers of significant importance to the history of Canada, Ontario and Ottawa; the cemetery was declared the national cemetery of Canada in 2009, and has served as the National Military Cemetery of the Canadian Forces since 1944 and the RCMP National Memorial Cemetery since 2004.<br/><br/>', 'assets/images/Ottawa-beechwoodcemetery.jpg'),
(131, 'First Nations Art at Stanley', 'Pipeline Rd, Vancouver, BC <br/>', '604-921-1070', 'landmark', 3, 'The most visited tourist attraction in all of B.C., the Stanley Park Totem Poles at Brockton Point are one of the most famous Vancouver First Nations art works. Today, the nine totem poles are either replicas of originals that have been sent home or to a museum for preservation (the Skedans Mortuary Pole is a replica of an original that was returned to Haida Gwaii) or newer artworks (the most recent totem, carved by Robert Yelton of the Squamish Nation, was added to Brockton Point in 2009); they are still breathtaking to see in their incredible outdoor setting.<br/><br/>\r\nWhen you visit the Totem Poles, take note of the "People Amongst the People" Coast Salish gateways--three carved, red cedar portals that form the entrance to the Brockton Point Visitors Centre. The gateways were created by Coast Salish artist Susan Point and a team of Musqueam artists, and installed in 2008; they help acknowledge that Stanley Park was once Coast Salish land.<br/><br/>', 'assets/images/Van-Fist-Nation-Art-in-stanley-park.jpg'),
(132, 'Lions Gate Bridge', 'Lions Gate Bridge<br/>\r\nVancouver, BC <br/>', '604-945-1234', 'landmark', 3, 'The Lions Gate Bridge is a suspension bridge that spans the First Narrows of Burrard Inlet. It has become a famous landmark of Vancouver, and links the downtown core to the cities of North and West Vancouver. <br/><br/>\r\nVisitors are usually in awe from the breathtaking views, and often drive slower just to take it in. Vancouverites have gotten used to these slow downs, which usually speed up in the middle of the bridge. <br/><br/>\r\nNot surprisingly, the Lions Gate bridge was designated as a National Historic Site in Canada in 2005. There are two lion statues on the bridge which symbolize the two ''lions'', a pair of mountain peaks located north of Vancouver. <br/><br/>', 'assets/images/Van-lions_gate_bridge.jpg'),
(141, 'The Bund', 'Zhongshan East 1st Rd, Huangpu, <br/> \r\nShanghai, China <br/>', '86 021 5151 1234', 'landmark', 4, 'The Bund, also called Zhongshan Dong Yi Lu (East Zhongshan 1st Road), is a famous waterfront and regarded as the symbol of Shanghai for hundreds of years. It is on the west bank of Huangpu River from the Waibaidu Bridge to Nanpu Bridge and winds 1500 meters (0.93 mile) in length. The most famous and attractive sight which is at the west side of the Bund are the 26 various buildings of different architectural styles including Gothic, Baroque, Romanesque, Classicism and the Renaissance. The 1,700-meters (1,859 yards) long flood-control wall, known as ''the lovers'' wall'', located on the side of Huangpu River from Huangpu Park to Xinkai River and once was the most romantic corner in Shanghai in the last century. After renovation, the monotone concrete buildings that lovers leaned against in the past have been improved into hollowed-out railings full of romantic atmosphere. Standing by the railings, visitors can have a ''snap-shot'' view of the scenery of Pudong Area and Huangpu River.<br/><br/>\r\n', 'assets/images/SH-band.jpg'),
(142, 'ORIENTAL PEARL TV TOWER', '2 Lane 504 Jujiazui Road, Pu Dong<br/>\r\nShanghai, 200120, China<br/>', '86 021 5879 1888', 'landmark', 4, '\r\n\r\ntanding 468 meters / 1,535 feet tall, the Oriental Pearl TV Tower is one of Asia''s highest structures. Tourists can scale the tower for spectacular views of the city. There is a shopping area, café and an international city exhibit on the ground floor.<br/><br/>\r\nOn clear days, impressive panoramic views of the city can be had from the upper levels of this tower, which are no less than 263 meters / 862 feet high. The photo opportunities are excellent.<br/><br/>\r\nThe tower has fifteen observatory levels. The highest (known as the Space Module) is at 350 m (1148 ft). The lower levels are at 263 m (863 ft) (Sightseeing Floor) and at 90 m (295 ft) (Space City). There is a revolving restaurant at the 267 m (876 ft) level. The project also contains exhibition facilities, restaurants and a shopping mall. There is also a 20-room hotel called the Space Hotel between the two large spheres. The upper observation platform has an outside area with a glass floor. <br/><br/>\r\n', 'assets/images/SH-oriental-pearl-tv-tower.jpg'),
(151, 'Victoria Harbour', 'Central and Western District, Hong Kong Island<br/>\r\nHong Kong 999077, China<br/>', '852 2543 1234', 'landmark', 5, 'The sight of Victoria Harbour and the Hong Kong skyline is something very unique and special that never fails to convey the essence of the city: exciting, glamorous, sparkling, stylish... It just blows you away the first time you see it, and every time after that…<br/><br/>\r\nVictoria Harbor is always bustling with activity whether day or night: the ferries that shuttle back and forth the Kowloon and the Hong Kong Island sides, the cruise ships entering and leaving port, the freighters and barges carrying their cargo and materials in and out one of the world''s busiest ports, and then, there''s the colorful sampans, junks and harbour cruisers that have been delighting sightseers for years.<br/><br/>\r\nAll that framed by striking architecture on both sides of the Harbour as Hong Kong is home to some of the world''s coolest buildings<br/><br/>.', 'assets/images/HK-victoria-harbour.jpg'),
(152, 'Star Ferry', 'Star Ferry pier, Tsim Sha Tsui, Kowloon<br/>', '852 2367 7065', 'landmark', 5, 'The Star Ferry is THE Hong Kong Ferry, one of the beloved icons of the city and a lot more than just a means of transportation. It has been shuttling residents between Hong Kong Island and Kowloon in the mainland for over 120 years. Up to 1978 when the Cross-Harbour Tunnel opened, it was the only way to cross the harbour.<br/><br/>\r\nFor visitors, besides being a very convenient way to get around, the clunky double-deckers offer one of the world''s most spectacular views, all for less than a dollar a ride.<br/><br/>\r\nThere are around twelve distinct green and white vessels in operation with some dating from the 1950''s and 1960''s. With names like "Shining Star" and "Celestial Star" the Star Ferries traverse the waters of Victoria Harbour every day, you can count on one leaving every 10-12 minutes.<br/><br/>\r\n', 'assets/images/HK-star-ferry-1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `placesBeen`
--

CREATE TABLE `placesBeen` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  PRIMARY KEY (`userID`,`placeID`),
  KEY `placeID` (`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  `rating` float NOT NULL,
  PRIMARY KEY (`userID`,`placeID`),
  KEY `placeID` (`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`userID`, `placeID`, `rating`) VALUES
(1, 11, 5),
(3, 51, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(30) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `first_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(12) DEFAULT NULL,
  `age` int(3) DEFAULT NULL,
  `gender` bit(1) DEFAULT NULL,
  `location` varchar(30) DEFAULT NULL,
  `picture_url` varchar(255) DEFAULT NULL,
  `interest` text,
  `bio` text,
  PRIMARY KEY (`userID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `first_name`, `last_name`, `email`, `password`, `phone`, `age`, `gender`, `location`, `picture_url`, `interest`, `bio`) VALUES
(1, 'abc', NULL, NULL, 'abc@def.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'efg', NULL, NULL, 'efg@hij.com', '123456', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wantToGoCity`
--

CREATE TABLE `wantToGoCity` (
  `userID` int(30) NOT NULL,
  `cityID` int(30) NOT NULL,
  PRIMARY KEY (`userID`,`cityID`),
  KEY `cityID` (`cityID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wantToGoCity`
--

INSERT INTO `wantToGoCity` (`userID`, `cityID`) VALUES
(1, 1),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wantToGoPlace`
--

CREATE TABLE `wantToGoPlace` (
  `userID` int(30) NOT NULL,
  `placeID` int(30) NOT NULL,
  PRIMARY KEY (`userID`,`placeID`),
  KEY `placeID` (`placeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wantToGoPlace`
--

INSERT INTO `wantToGoPlace` (`userID`, `placeID`) VALUES
(3, 51);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cityBeen`
--
ALTER TABLE `cityBeen`
  ADD CONSTRAINT `cityBeen_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `cityBeen_ibfk_2` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`placeID`) REFERENCES `place` (`placeID`);

--
-- Constraints for table `friendship`
--
ALTER TABLE `friendship`
  ADD CONSTRAINT `friendship_ibfk_1` FOREIGN KEY (`user1`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `friendship_ibfk_2` FOREIGN KEY (`user2`) REFERENCES `user` (`userID`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`sender`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `messages_ibfk_2` FOREIGN KEY (`receiver`) REFERENCES `user` (`userID`);

--
-- Constraints for table `place`
--
ALTER TABLE `place`
  ADD CONSTRAINT `place_ibfk_1` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`);

--
-- Constraints for table `placesBeen`
--
ALTER TABLE `placesBeen`
  ADD CONSTRAINT `placesBeen_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `placesBeen_ibfk_2` FOREIGN KEY (`placeID`) REFERENCES `place` (`placeID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`placeID`) REFERENCES `place` (`placeID`);

--
-- Constraints for table `wantToGoCity`
--
ALTER TABLE `wantToGoCity`
  ADD CONSTRAINT `wantToGoCity_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `wantToGoCity_ibfk_2` FOREIGN KEY (`cityID`) REFERENCES `city` (`cityID`);

--
-- Constraints for table `wantToGoPlace`
--
ALTER TABLE `wantToGoPlace`
  ADD CONSTRAINT `wantToGoPlace_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `wantToGoPlace_ibfk_2` FOREIGN KEY (`placeID`) REFERENCES `place` (`placeID`);
