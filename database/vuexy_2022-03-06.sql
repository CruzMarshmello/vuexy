# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.29)
# Database: vuexy
# Generation Time: 2022-03-06 06:32:00 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table address_books
# ------------------------------------------------------------

DROP TABLE IF EXISTS `address_books`;

CREATE TABLE `address_books` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_2` longtext COLLATE utf8mb4_unicode_ci,
  `sub_district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` int(11) NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table blog_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blog_locales`;

CREATE TABLE `blog_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `blog_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `blog_locales` WRITE;
/*!40000 ALTER TABLE `blog_locales` DISABLE KEYS */;

INSERT INTO `blog_locales` (`id`, `locale`, `title`, `slug`, `introduction`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `blog_id`)
VALUES
	(1,'en','From Streetwear to Fashion Mainstay','from-streetwear-to-fashion-mainstay','The hoodie is not only the most important item of clothing in your closet on DGAF days, but it’s a pretty important piece of clothing in our collective cultural history. Seriously. While we were busy writing the hoodie off as an innocuous sweatshirt to be reserved for post-gym brunches or shameless evenings of Netflix and chill, it was subverting its way right into the fabric of our cultural consciousness. We don’t often think of clothing as having an agenda, but the hoodie definitely does.','<p>The hoodie is not only the most important item of clothing in your closet on DGAF days, but it’s a pretty important piece of clothing in our collective cultural history. Seriously. While we were busy writing the hoodie off as an innocuous sweatshirt to be reserved for post-gym brunches or shameless evenings of Netflix and chill, it was subverting its way right into the fabric of our cultural consciousness. We don’t often think of clothing as having an agenda, but the hoodie definitely does.</p><p><br></p><p>“Most people see the hoodie as the representation of anything anti-social,” says Laura McLaws Helms, a New York–based fashion historian. “It’s this anti-establishment, anti-social thing, and probably the ultimate garment that represents those ideas.”</p><p><br></p><p>The hoodie has what you might call a paradoxical history. When it first hit the retail scene in the ’30s, the hoodie had a pretty practical intent: keeping athletes warm, a purpose that was quickly appropriated by blue-collar laborers. But not too long after its vanilla beginnings, the hoodie started to get a rep on the streets. According to McLaws Helms, this, too, was purely practical—the hood provided the perfect shroud for ne’er-do-wells up to no good. From there it really took off. In the ‘70s, the hoodie solidified its counterculture rep, largely thanks to the army of graffiti artists sporting the style as they left their marks on major urban centers. In rapid succession came the hip-hop crowd and the skater scene of the ‘80s and ‘90s—two more countercultures borrowing the uniform of their predecessors.</p>','From Streetwear to Fashion Mainstay','street wear,fashion','The hoodie is not only the most important item of clothing in your closet on DGAF days, but it’s a pretty important piece of clothing in our collective cultural history. Seriously.','2022-03-05 20:35:21','2022-03-05 20:35:21',1),
	(2,'th','จากสตรีทแวร์สู่กระแสหลักแฟชั่น','จากสตรีทแวร์-สู่-กระแสหลักแฟชั่น','เสื้อฮู้ดไม่ได้เป็นเพียงเสื้อผ้าที่สำคัญที่สุดในตู้เสื้อผ้าของคุณในวัน DGAF แต่ยังเป็นเสื้อผ้าที่สำคัญมากในประวัติศาสตร์วัฒนธรรมส่วนรวมของเรา อย่างจริงจัง. ในขณะที่เรากำลังยุ่งอยู่กับการเขียนเสื้อฮู้ดดี้เป็นเสื้อสเวตเตอร์ไร้พิษภัยเพื่อสงวนไว้สำหรับมื้อสายหลังออกกำลังกายหรือตอนเย็นที่ไร้ยางอายของ Netflix และทำใจให้สบาย มันก็บ่อนทำลายเส้นทางสู่ผืนผ้าแห่งจิตสำนึกทางวัฒนธรรมของเรา เรามักไม่คิดว่าเสื้อผ้ามีวาระการประชุม แต่เสื้อฮู้ดมีแน่นอน','<p>เสื้อฮู้ดไม่ได้เป็นเพียงเสื้อผ้าที่สำคัญที่สุดในตู้เสื้อผ้าของคุณในวัน DGAF แต่ยังเป็นเสื้อผ้าที่สำคัญมากในประวัติศาสตร์วัฒนธรรมส่วนรวมของเรา อย่างจริงจัง. ในขณะที่เรากำลังยุ่งอยู่กับการเขียนเสื้อฮู้ดดี้เป็นเสื้อสเวตเตอร์ไร้พิษภัยเพื่อสงวนไว้สำหรับมื้อสายหลังออกกำลังกายหรือตอนเย็นที่ไร้ยางอายของ Netflix และทำใจให้สบาย มันก็บ่อนทำลายเส้นทางสู่ผืนผ้าแห่งจิตสำนึกทางวัฒนธรรมของเรา เรามักไม่คิดว่าเสื้อผ้ามีวาระการประชุม แต่เสื้อฮู้ดมีแน่นอน</p><p><br></p><p>Laura McLaws Helms นักประวัติศาสตร์ด้านแฟชั่นจากนิวยอร์กกล่าวว่า \"คนส่วนใหญ่มองว่าเสื้อฮู้ดเป็นตัวแทนของสิ่งที่ต่อต้านสังคม “นี่คือสิ่งที่ต่อต้านการก่อตั้ง ต่อต้านสังคม และอาจเป็นเสื้อผ้าที่ดีที่สุดที่แสดงถึงความคิดเหล่านั้น”</p><p><br></p><p>เสื้อฮู้ดมีสิ่งที่คุณอาจเรียกว่าประวัติศาสตร์ที่ขัดแย้งกัน เมื่อเปิดตัวครั้งแรกในวงการค้าปลีกในช่วงทศวรรษที่ 30 เสื้อฮู้ดมีจุดประสงค์ที่ใช้งานได้จริง: ทำให้นักกีฬาอบอุ่น ซึ่งเป็นจุดประสงค์ที่เหมาะสมอย่างรวดเร็วโดยคนงานปกสีฟ้า แต่ไม่นานหลังจากการเริ่มต้นของวานิลลา เสื้อฮู้ดเริ่มมีตัวแทนตามท้องถนน ตามคำกล่าวของ McLaws Helms สิ่งนี้ก็ใช้ได้จริงเช่นกัน หมวกคลุมนั้นเป็นเกราะป้องกันที่สมบูรณ์แบบสำหรับผู้ที่ไม่เคยทำมาก่อนเลยแม้แต่น้อย จากนั้นมันก็เริ่มต้นจริงๆ ในยุค 70 เสื้อฮู้ดมีความแข็งแกร่งให้กับตัวแทนวัฒนธรรม โดยส่วนใหญ่ต้องขอบคุณกองทัพของศิลปินกราฟฟิตี้ที่สวมสไตล์นี้ในขณะที่พวกเขาทิ้งร่องรอยไว้บนใจกลางเมืองใหญ่ๆ ฝูงชนฮิปฮอปและนักเล่นสเก็ตในยุค 80 และ 90 เข้ามาติดต่อกันอย่างรวดเร็ว—อีกสองวัฒนธรรมที่ขัดแย้งกันยืมชุดเครื่องแบบของรุ่นก่อน</p>','จากสตรีทแวร์สู่กระแสหลักแฟชั่น','สตรีทแวร์,แฟชั่น','เสื้อฮู้ดไม่ได้เป็นเพียงเสื้อผ้าที่สำคัญที่สุดในตู้เสื้อผ้าของคุณในวัน DGAF แต่ยังเป็นเสื้อผ้าที่สำคัญมากในประวัติศาสตร์วัฒนธรรมส่วนรวมของเรา อย่างจริงจัง.','2022-03-05 20:35:21','2022-03-05 20:35:21',1),
	(3,'en','Our Styling Guide for Men’s Sweatshirts','our-styling-guide-for-men-sweatshirts','Anything that Paul Newman wore for decades becomes a vital part of men’s wear. There is nothing more comfortable yet stylish than a sweatshirt in winter. A sweatshirt makes an ideal option for a casual yet considered look and a trendy yet athletic look. Sweatshirt goes perfectly with every body shape and size, and it is easy to layer.','<p>Anything that Paul Newman wore for decades becomes a vital part of men’s wear. There is nothing more comfortable yet stylish than a sweatshirt in winter. A sweatshirt makes an ideal option for a casual yet considered look and a trendy yet athletic look. Sweatshirt goes perfectly with every body shape and size, and it is easy to layer.</p><p><br></p><p>Since its appeal is all about comfort and versatility, more and more men prefer to buy best sweatshirts online in India for both streets as well as smart-casual looks. It is considered as a trailblazer, sweatshirt falls between the blurred zone of fashion and sportswear before it was coined as ‘athleisure’.</p><p><br></p><p>The way sweatshirts are worn has evolved over the past few years. With so many styles available nowadays, the versatility of the outfit has really expanded itself into different styles. It is advised to always combine a sweatshirt with slim-fit bottoms, not only you will stay relaxed but will also look fabulous.&nbsp;</p><p><br></p><p>Listed below are two major ways for you to style it in Men’s Sweatshirt:</p><p>DRESS UP GOOD:</p><p>Just like a good pair of white sneakers, a clean-cut sweatshirt in a fabulous neutral color is enough to pull off a smart-casual look. You can add lays, execute a preppy or Ivy look. One can choose to wear a slim-fitting grey-colored style with comfy chinos or denim, with smart sneakers or a loafer. If it’s too cold, you can layer it under a coat or a designer jacket. You can pull off a smart-casual look with a bomber jacket or a varsity jacket.</p><p><br></p><p>DRESS DOWN IN COMFORT:</p><p>If you wish to step outdoors in sweatshirts, you can consider pulling off a street look. Sportswear and logomania are ruling over the current collections. With logos available on hoodies and slides, you can jump on board with this comfortable yet stylish trend. Look for block colors and logos, style it with a pair of jeans or joggers. For those who are brave enough to pull off that look, a branded tracksuit can make you look strong and confident.</p><p><br></p><p>You can find the best-hooded sweatshirt men’s online at Coloured Collar. We are the best fashion label that brings you a range of rusty yet stylish collections. Browse our collection to purchase sweatshirts, hooded jackets, and more at the best price online. We are the one-stop-shop where you can experience a trend-driven and effortless shopping journey in a few clicks.</p><p><br></p><p>With ever-changing trends and styles in the fashion industry, you can discover an extensive collection of the latest designs for any occasion. Elevate your wardrobe with new-season essentials that you can dress up in and dress it down whenever you wish to. Refresh your look with stylish fashion choices!</p>','Our Styling Guide for Men’s Sweatshirts','fuide,sweatshirts','Anything that Paul Newman wore for decades becomes a vital part of men’s wear. There is nothing more comfortable yet stylish than a sweatshirt in winter.','2022-03-05 20:54:08','2022-03-05 20:54:08',2),
	(4,'th','คู่มือการแต่งตัวด้วยเสื้อสเวตเตอร์ผู้ชาย','คู่มือการแต่งตัวด้วยเสื้อสเวตเตอร์ผู้ชาย','อะไรก็ตามที่ Paul Newman ใส่มานานหลายทศวรรษจะกลายเป็นส่วนสำคัญของเสื้อผ้าผู้ชาย ไม่มีอะไรที่สบายไปกว่าเสื้อสเวตเตอร์ในฤดูหนาว เสื้อสเวตเตอร์เป็นตัวเลือกในอุดมคติสำหรับลุคลำลองแต่ก็ดูดีและอินเทรนด์แต่สปอร์ต เสื้อสเวตเตอร์เข้าได้กับทุกรูปร่างและขนาด และง่ายต่อการจัดเป็นชั้น','<p>อะไรก็ตามที่ Paul Newman ใส่มานานหลายทศวรรษจะกลายเป็นส่วนสำคัญของเสื้อผ้าผู้ชาย ไม่มีอะไรที่สบายไปกว่าเสื้อสเวตเตอร์ในฤดูหนาว เสื้อสเวตเตอร์เป็นตัวเลือกในอุดมคติสำหรับลุคลำลองแต่ก็ดูดีและอินเทรนด์แต่สปอร์ต เสื้อสเวตเตอร์เข้าได้กับทุกรูปร่างและขนาด และง่ายต่อการจัดเป็นชั้น</p><p><br></p><p><br></p><p><br></p><p>เนื่องจากความน่าดึงดูดใจของมันคือทั้งหมดที่เกี่ยวกับความสบายและความอเนกประสงค์ ผู้ชายจำนวนมากขึ้นเรื่อยๆ จึงชอบซื้อเสื้อสเวตเตอร์ที่ดีที่สุดทางออนไลน์ในอินเดียสำหรับทั้งสตรีทวิวและลุคลำลองแบบสมาร์ท ถือเป็นผู้บุกเบิก เสื้อกันหนาวอยู่ระหว่างโซนแฟชั่นและชุดกีฬาที่เบลอก่อนที่จะได้รับการประกาศเกียรติคุณว่าเป็น \'athleisure\'</p><p><br></p><p><br></p><p><br></p><p>วิธีการสวมเสื้อสเวตเตอร์มีวิวัฒนาการในช่วงไม่กี่ปีที่ผ่านมา ด้วยสไตล์ที่มีอยู่มากมายในปัจจุบัน ความเก่งกาจของชุดได้ขยายตัวเองไปสู่สไตล์ที่แตกต่างกัน ขอแนะนำให้ใส่เสื้อสเวตเตอร์เข้ากับกางเกงทรงเข้ารูปเสมอ ไม่เพียงแต่คุณจะรู้สึกผ่อนคลายแต่ยังจะดูสวยงามอีกด้วย</p><p><br></p><p><br></p><p><br></p><p>รายการด้านล่างเป็นสองวิธีหลักสำหรับคุณในการจัดสไตล์ในเสื้อสเวตเตอร์ผู้ชาย:</p><p><br></p><p>แต่งตัวดี:</p><p><br></p><p>เช่นเดียวกับรองเท้าผ้าใบสีขาวที่ดี เสื้อสเวตเตอร์คัทคัทในสีที่เป็นกลางอย่างเหลือเชื่อก็เพียงพอที่จะดึงลุคลำลองอันชาญฉลาดออกมา คุณสามารถเพิ่มเลย์เอาต์, ลุคพรีปี้หรือไอวี่ สามารถเลือกใส่ในสไตล์สีเทาทรงเพรียวบางกับกางเกงชิโนหรือผ้าเดนิมที่ใส่สบาย กับรองเท้าผ้าใบอัจฉริยะหรือรองเท้าโลฟเฟอร์ หากอากาศเย็นเกินไป คุณสามารถวางทับไว้ใต้เสื้อโค้ทหรือแจ็กเก็ตของนักออกแบบ คุณสามารถดึงลุคลำลองแบบสมาร์ทด้วยเสื้อแจ็คเก็ตบอมเบอร์หรือแจ็คเก็ตตัวแทน</p><p><br></p><p><br></p><p><br></p><p>สวมใส่สบาย:</p><p><br></p><p>หากคุณต้องการออกไปข้างนอกโดยสวมเสื้อสเวตเตอร์ คุณสามารถลองดึงลุคสตรีทออก ชุดกีฬาและโลโก้มาเนียมีอิทธิพลเหนือคอลเลกชั่นปัจจุบัน ด้วยโลโก้ที่มีอยู่บนเสื้อมีฮู้ดและสไลเดอร์ คุณจึงก้าวกระโดดไปกับเทรนด์ที่สะดวกสบายและมีสไตล์นี้ได้ มองหาสีบล็อกและโลโก้ แต่งสไตล์ด้วยกางเกงยีนส์หรือจ็อกเกอร์ สำหรับผู้ที่กล้าพอที่จะดึงลุคนั้นออกมา ชุดวอร์มที่มีตราสินค้าสามารถทำให้คุณดูแข็งแกร่งและมั่นใจได้</p><p><br></p><p><br></p><p><br></p><p>คุณสามารถหาเสื้อสเวตเตอร์มีฮู้ดสำหรับผู้ชายที่ดีที่สุดทางออนไลน์ที่ Coloured Collar เราคือแบรนด์แฟชั่นที่ดีที่สุดที่จะนำเสนอคอลเลกชั่นที่ขึ้นสนิมแต่มีสไตล์ให้กับคุณ เรียกดูคอลเลกชั่นของเราเพื่อซื้อเสื้อสเวตเตอร์ แจ็กเก็ตมีฮู้ด และอื่นๆ ในราคาที่ดีที่สุดทางออนไลน์ เราเป็นร้านค้าครบวงจรที่คุณสามารถสัมผัสประสบการณ์การช็อปปิ้งที่ขับเคลื่อนด้วยเทรนด์และง่ายดายด้วยการคลิกเพียงไม่กี่ครั้ง</p><p><br></p><p><br></p><p><br></p><p>ด้วยเทรนด์และสไตล์ที่เปลี่ยนแปลงตลอดเวลาในอุตสาหกรรมแฟชั่น คุณจึงสามารถค้นพบคอลเล็กชั่นการออกแบบใหม่ล่าสุดสำหรับทุกโอกาส ยกระดับตู้เสื้อผ้าของคุณด้วยของจำเป็นสำหรับฤดูกาลใหม่ที่คุณสามารถแต่งตัวและแต่งตัวได้ทุกเมื่อที่คุณต้องการ รีเฟรชลุคของคุณด้วยตัวเลือกแฟชั่นสุดเก๋!</p>','คู่มือการแต่งตัวด้วยเสื้อสเวตเตอร์ผู้ชาย','วิธีแต่งตัว,สเวตเตอร์','อะไรก็ตามที่ Paul Newman ใส่มานานหลายทศวรรษจะกลายเป็นส่วนสำคัญของเสื้อผ้าผู้ชาย ไม่มีอะไรที่สบายไปกว่าเสื้อสเวตเตอร์ในฤดูหนาว','2022-03-05 20:54:08','2022-03-05 20:54:08',2),
	(5,'en','Why Proenza Schouler’s PS1 Is the Ultimate Best-to-Work Bag','why-proenza-cchouler-ps','Vogue.com editor Chioma Nnadi describes the bag as “little bit schoolgirl but downtown…. I remember getting a satchel bag, just because the shape was similar.” (She also brings up the rise of Gossip Girl, where Serena Van Der Woodsen notably toted the PS1.','<p>Vogue.com editor Chioma Nnadi describes the bag as “little bit schoolgirl but downtown…. I remember getting a satchel bag, just because the shape was similar.” (She also brings up the rise of Gossip Girl, where Serena Van Der Woodsen notably toted the PS1. That likely added to the bag’s scholastic associations). Fashion news editor Sarah Spellings recalls how she became obsessed with the bag after attending a Teen Vogue panel featuring Hernandez and McCollough. “I just thought it was so cool. I loved that it didn’t have a label,” says Spellings. “It felt like a cleanse after coveting Chanel, Louis Vuitton, and Coach logo bags. Made me feel ‘in the know.’” Senior fashion writer and style editor Janelle Okwodu notes that she had the yellow version, “which was glorious.” And fashion and style writer Christian Allaire simply says, “It brings me back to Tumblr years.”</p><p><br></p><p>Looking at old forums on the beloved late-aughts site thefashionspot.com, I found a trove of threads coveting the bag in its heyday. The user Kimair might have said it best back in 2008. “I love how un-designer these look.” Thirteen years later, I want to scoop up an anthracite medium version for myself. It’s big enough to pack in my laptop and whatever else I need for the day. Sure, it’s a time capsule bag, but it still packs a punch and a lot in it.</p>','Why Proenza Schouler’s PS1','proenza,bag','Vogue.com editor Chioma Nnadi describes the bag as “little bit schoolgirl but downtown…. I remember getting a satchel bag, just because the shape was similar.” (She also brings up the rise of Gossip Girl, where Serena Van Der Woodsen notably toted the PS1.  meta','2022-03-05 23:14:16','2022-03-05 23:14:56',3),
	(6,'th','ทำไม Proenza Schouler PS1 จึงเป็นกระเป๋า Back-to-Work ที่ดีที่สุด','ทำไม-proenza-จึงเป็นกระเป๋า-ที่ดีที่สุด','Chioma Nnadi บรรณาธิการของ Vogue.com กล่าวถึงกระเป๋าใบนี้ว่า “เด็กนักเรียนตัวน้อยแต่เป็นย่านใจกลางเมือง…. ฉันจำได้ว่าได้กระเป๋าถือมาเพราะรูปร่างคล้ายกัน” (เธอยังกล่าวถึงการเพิ่มขึ้นของ Gossip Girl ซึ่ง Serena Van Der Woodsen ได้กล่าวถึง PS1 ที่โดดเด่น','<p>Chioma Nnadi บรรณาธิการของ Vogue.com กล่าวถึงกระเป๋าใบนี้ว่า “เด็กนักเรียนตัวน้อยแต่เป็นย่านใจกลางเมือง…. ฉันจำได้ว่าได้กระเป๋าถือมาเพราะรูปร่างคล้ายกัน” (เธอยังกล่าวถึงการเพิ่มขึ้นของ Gossip Girl ซึ่ง Serena Van Der Woodsen ได้กล่าวถึง PS1 ที่โดดเด่นซึ่งน่าจะเพิ่มเข้าไปในสมาคมการศึกษาของกระเป๋า) บรรณาธิการข่าวแฟชั่น Sarah Spellings เล่าว่าเธอหมกมุ่นอยู่กับกระเป๋าใบนี้ได้อย่างไรหลังจากเข้าร่วมการประชุม Teen Vogue ที่มี Hernandez และ McCollough “ฉันแค่คิดว่ามันเจ๋งมาก ฉันชอบที่ไม่มีป้ายกำกับ” การสะกดคำกล่าว “มันให้ความรู้สึกเหมือนเป็นการชำระล้างหลังจากโลภกระเป๋าโลโก้ Chanel, Louis Vuitton และ Coach ทำให้ฉันรู้สึก \'รู้\'” นักเขียนแฟชั่นอาวุโสและบรรณาธิการด้านสไตล์ Janelle Okwodu ตั้งข้อสังเกตว่าเธอมีรุ่นสีเหลือง \"ซึ่งรุ่งโรจน์\" และนักเขียนแฟชั่นและสไตล์ Christian Allaire พูดง่ายๆ ว่า “มันทำให้ฉันหวนกลับไปสู่ปี Tumblr อีกครั้ง”</p><p><br></p><p>เมื่อดูฟอรัมเก่าในเว็บไซต์ thefashionspot.com อันเป็นที่รักของ late-aughts ฉันพบว่ามีกระทู้มากมายที่อยากได้กระเป๋าในสมัยรุ่งเรือง ผู้ใช้ Kimair อาจกล่าวได้ดีที่สุดในปี 2008 “ฉันชอบรูปลักษณ์เหล่านี้เมื่อไม่ได้ออกแบบ” สิบสามปีต่อมา ฉันต้องการตักแอนทราไซต์เวอร์ชันกลางสำหรับตัวเอง มันใหญ่พอที่จะใส่แล็ปท็อปของฉันและสิ่งอื่นๆ ที่ฉันต้องการสำหรับวันนี้ แน่นอนว่ามันเป็นกระเป๋าใส่ไทม์แคปซูล แต่ก็ยังอัดแน่นและมีอะไรอีกมากมายอยู่ในนั้น</p>','ทำไม Proenza Schouler PS1 จึงเป็นกระเป๋า ที่ดีที่สุด','proenza,กระเป๋า','Chioma Nnadi บรรณาธิการของ Vogue.com กล่าวถึงกระเป๋าใบนี้ว่า “เด็กนักเรียนตัวน้อยแต่เป็นย่านใจกลางเมือง…. ฉันจำได้ว่าได้กระเป๋าถือมาเพราะรูปร่างคล้ายกัน” (เธอยังกล่าวถึงการเพิ่มขึ้นของ Gossip Girl ซึ่ง Serena Van Der Woodsen ได้กล่าวถึง PS1 ที่โดดเด่น เมต้า','2022-03-05 23:14:16','2022-03-05 23:14:56',3),
	(7,'en','Best Vogue Editors On The Perfect Sweatpants','vogue-editors-on-the-perfect-sweatpants','As fashion experts, Vogue staffers encounter all types of products, from luxury fashion to tech, beauty to basics. Yet few items inspire as many divergent opinions as sweatpants. Some editors prefer their loungewear swanky and oversized for the ultimate athleisure look,','<p>As fashion experts, Vogue staffers encounter all types of products, from luxury fashion to tech, beauty to basics. Yet few items inspire as many divergent opinions as sweatpants. Some editors prefer their loungewear swanky and oversized for the ultimate athleisure look, while others make the case for a relaxed fit and a low price—total relaxation. Then there is the camp who like more tailored or cropped-fit pieces that don’t wear as baggy as classic sweats. And when it comes to track pants, two of our editors happen to agree on retro styles and (of all colors!) slime green. If the pandemic taught us anything, it’s perfectly ok to wear whatever comfortwear you love in and out of the house.</p><p><br></p><p>The Get has helped you shop for everything from the best gift ideas to wardrobe essentials, and now we’re weighing in on some of the most comfortable loungewear and the best sweatpants to sport at the airport during travels, hanging out at home, or after indulgent holiday meals. Whatever option you choose, don’t be afraid to let loose—after all, comfort is the end goal.</p>','Vogue Editors On The Perfect Sweatpants','Vogue,fashion','As fashion experts, Vogue staffers encounter all types of products, from luxury fashion to tech, beauty to basics. Yet few items inspire as many divergent opinions as sweatpants. Some editors prefer their loungewear swanky and oversized for the ultimate athleisure look, meta','2022-03-05 23:18:20','2022-03-05 23:18:20',4),
	(8,'th','Vogue แฟชั่นเหมาะกับการพักผ่อนและดีที่สุดในช่วงวันหยุดนี้','vogue-แฟชั่นเหมาะกับการพักผ่อนในช่วงวันหยุดนี้','ในฐานะผู้เชี่ยวชาญด้านแฟชั่น พนักงานของ Vogue จะพบกับสินค้าทุกประเภท ตั้งแต่แฟชั่นหรูหราไปจนถึงเทคโนโลยี ความงาม ไปจนถึงสินค้าพื้นฐาน มีเพียงไม่กี่รายการเท่านั้นที่สร้างแรงบันดาลใจให้กับความคิดเห็นที่แตกต่างกันมากเท่ากับกางเกงวอร์ม บรรณาธิการบางคนชอบชุดลำลองที่โอ่อ่าและโอ่อ่าเกินไปสำหรับลุคที่ดูเคร่งขรึม','<p>ในฐานะผู้เชี่ยวชาญด้านแฟชั่น พนักงานของ Vogue จะพบกับสินค้าทุกประเภท ตั้งแต่แฟชั่นหรูหราไปจนถึงเทคโนโลยี ความงาม ไปจนถึงสินค้าพื้นฐาน มีเพียงไม่กี่รายการเท่านั้นที่สร้างแรงบันดาลใจให้กับความคิดเห็นที่แตกต่างกันมากเท่ากับกางเกงวอร์ม บรรณาธิการบางคนชอบชุดลำลองที่โอ่อ่าและโอ่อ่าเกินไปสำหรับลุคที่ดูเคร่งขรึม ในขณะที่คนอื่นๆ เลือกใช้เสื้อผ้าที่ใส่สบายและมีราคาที่ต่ำ จากนั้นก็มีค่ายที่ชอบเสื้อผ้าที่สั่งตัดหรือครอปพอดีตัวมากกว่าที่ไม่ใส่หลวมๆ เหมือนกับเสื้อสเวตเตอร์แบบคลาสสิก และเมื่อพูดถึงกางเกงวอร์ม บรรณาธิการของเราสองคนก็เห็นด้วยกับสไตล์ย้อนยุคและสีเขียวเมือก (ทุกสี) หากการระบาดใหญ่สอนอะไรเรา การสวมใส่ชุดลำลองที่คุณชอบในบ้านและนอกบ้านก็ไม่เป็นไร</p><p><br></p><p>The Get ช่วยให้คุณซื้อของได้ทุกอย่างตั้งแต่ไอเดียของขวัญที่ดีที่สุดไปจนถึงของจำเป็นสำหรับตู้เสื้อผ้า และตอนนี้เรากำลังพิจารณาชุดเลานจ์ที่ใส่สบายที่สุดและกางเกงวอร์มที่ดีที่สุดสำหรับเล่นกีฬาที่สนามบินระหว่างการเดินทาง ไปเที่ยวที่บ้าน หรือหลังเลิกงาน อาหารวันหยุดตามใจชอบ ไม่ว่าคุณจะเลือกตัวเลือกใด อย่ากลัวที่จะปล่อยมือ เพราะความสะดวกสบายคือเป้าหมายสุดท้าย</p>','Vogue แฟชั่นเหมาะกับการพักผ่อน','vogue,แฟชั่น','ในฐานะผู้เชี่ยวชาญด้านแฟชั่น พนักงานของ Vogue จะพบกับสินค้าทุกประเภท ตั้งแต่แฟชั่นหรูหราไปจนถึงเทคโนโลยี ความงาม ไปจนถึงสินค้าพื้นฐาน มีเพียงไม่กี่รายการเท่านั้นที่สร้างแรงบันดาลใจให้กับความคิดเห็นที่แตกต่างกันมากเท่ากับกางเกงวอร์ม บรรณาธิการบางคนชอบชุดลำลองที่โอ่อ่าและโอ่อ่าเกินไปสำหรับลุคที่ดูเคร่งขรึม  เมต้า','2022-03-05 23:18:20','2022-03-05 23:18:20',4),
	(9,'en','The Best Street Style at London Fashion Week Spring 2022','the-best-street-style-at-london','London Fashion Week is back in full swing, albeit with a smaller schedule and a mix of physical and digital shows. The city still feels more alive than it has in months as summer winds down and COVID restrictions ease.','<p>London Fashion Week is back in full swing, albeit with a smaller schedule and a mix of physical and digital shows. The city still feels more alive than it has in months as summer winds down and COVID restrictions ease. Style du Monde’s Acielle is on the ground to shoot the best looks outside the shows and presentations, from Erdem at the British Museum to Simone Rocha at a medieval church. Scroll through her latest coverage here and come back for her daily updates.</p>','The Best Street Style at London','the best,street style','London Fashion Week is back in full swing, albeit with a smaller schedule and a mix of physical and digital shows. The city still feels more alive than it has in months as summer winds down and COVID restrictions ease. meta','2022-03-05 23:21:30','2022-03-05 23:21:30',5),
	(10,'th','สไตล์สตรีทที่ดีที่สุดในลอนดอนแฟชั่นวีคฤดูใบไม้ผลิปี 2022','สไตล์สตรีท-ที่ดีที่สุดในลอนดอน-แฟชั่นวีค','London Fashion Week กลับมาอย่างเต็มรูปแบบแล้ว แม้ว่าจะมีตารางงานที่เล็กกว่า และการแสดงทั้งแบบกายภาพและแบบดิจิทัลผสมกัน เมืองนี้ยังคงให้ความรู้สึกมีชีวิตชีวามากกว่าในช่วงหลายเดือนเนื่องจากช่วงฤดูร้อนสิ้นสุดลงและข้อจำกัดด้านโควิดก็ผ่อนคลายลง Acielle','<p>London Fashion Week กลับมาอย่างเต็มรูปแบบแล้ว แม้ว่าจะมีตารางงานที่เล็กกว่า และการแสดงทั้งแบบกายภาพและแบบดิจิทัลผสมกัน เมืองนี้ยังคงให้ความรู้สึกมีชีวิตชีวามากกว่าในช่วงหลายเดือนเนื่องจากช่วงฤดูร้อนสิ้นสุดลงและข้อจำกัดด้านโควิดก็ผ่อนคลายลง Acielle แห่ง Style du Monde อยู่บนพื้นเพื่อถ่ายภาพรูปลักษณ์ที่ดีที่สุดนอกการแสดงและการนำเสนอ ตั้งแต่ Erdem ที่ British Museum ไปจนถึง Simone Rocha ที่โบสถ์ยุคกลาง เลื่อนดูการรายงานข่าวล่าสุดของเธอที่นี่ แล้วกลับมาดูข้อมูลอัปเดตประจำวันของเธอ</p>','สไตล์สตรีทที่ดีที่สุดในลอนดอนแฟชั่นวีค','สไตล์สตรีท,ดีที่สุด','London Fashion Week กลับมาอย่างเต็มรูปแบบแล้ว แม้ว่าจะมีตารางงานที่เล็กกว่า และการแสดงทั้งแบบกายภาพและแบบดิจิทัลผสมกัน เมืองนี้ยังคงให้ความรู้สึกมีชีวิตชีวามากกว่าในช่วงหลายเดือนเนื่องจากช่วงฤดูร้อนสิ้นสุดลงและข้อจำกัดด้านโควิดก็ผ่อนคลายลง Acielle เมต้า','2022-03-05 23:21:30','2022-03-05 23:21:30',5),
	(11,'en','How Paris Street Style Has Evolved Best 2022','how-paris-street-style-has-evolved','In the Before Times, way back in July 2019, the fall couture season was characterized by lively summertime florals, vibrant sequined looks, and tailored blazers. Last week showgoers made their post-pandemic comeback','<p>In the Before Times, way back in July 2019, the fall couture season was characterized by lively summertime florals, vibrant sequined looks, and tailored blazers. Last week showgoers made their post-pandemic comeback with looks that ran the gamut from plaid prints to racy see-through fabrics. Below, the then and now of Paris street style in July.</p>','How Paris Street Style Has Evolved','paris,street style','In the Before Times, way back in July 2019, the fall couture season was characterized by lively summertime florals, vibrant sequined looks, and tailored blazers. Last week showgoers made their post-pandemic comeback meta','2022-03-05 23:25:55','2022-03-05 23:25:55',6),
	(12,'th','สไตล์สตรีทของปารีสมีวิวัฒนาการอย่างไรดีที่สุด 2022','สไตล์สตรีท-ของปารีส-มีวิวัฒนาการอย่างไร','ใน Before Times ย้อนกลับไปในเดือนกรกฎาคม 2019 ฤดูใบไม้ร่วงของเสื้อผ้ากูตูร์มีเอกลักษณ์เฉพาะด้วยดอกไม้ในฤดูร้อนที่มีชีวิตชีวา ลุคเลื่อมสดใส และเสื้อคลุมเบลเซอร์ที่ตัดเย็บมาอย่างดี นักแสดงเมื่อสัปดาห์ที่แล้วกลับมาหลังเกิดโรคระบาดด้วยลุคที่มีตั้งแต่ภาพพิมพ์ลายสก๊อตไปจนถึงผ้าซีทรูที่ดูมีชีวิตชีวา ด้านล่างนี้คือสไตล์สตรีทของปารีสในตอนนั้นและตอนนี้ในเดือนกรกฎาคม','<p>ใน Before Times ย้อนกลับไปในเดือนกรกฎาคม 2019 ฤดูใบไม้ร่วงของเสื้อผ้ากูตูร์มีเอกลักษณ์เฉพาะด้วยดอกไม้ในฤดูร้อนที่มีชีวิตชีวา ลุคเลื่อมสดใส และเสื้อคลุมเบลเซอร์ที่ตัดเย็บมาอย่างดี นักแสดงเมื่อสัปดาห์ที่แล้วกลับมาหลังเกิดโรคระบาดด้วยลุคที่มีตั้งแต่ภาพพิมพ์ลายสก๊อตไปจนถึงผ้าซีทรูที่ดูมีชีวิตชีวา ด้านล่างนี้คือสไตล์สตรีทของปารีสในตอนนั้นและตอนนี้ในเดือนกรกฎาคม</p>','สไตล์สตรีทของปารีสมีวิวัฒนาการอย่างไร','สไตล์สตรีท,วิวัฒนาการ','ใน Before Times ย้อนกลับไปในเดือนกรกฎาคม 2019 ฤดูใบไม้ร่วงของเสื้อผ้ากูตูร์มีเอกลักษณ์เฉพาะด้วยดอกไม้ในฤดูร้อนที่มีชีวิตชีวา ลุคเลื่อมสดใส และเสื้อคลุมเบลเซอร์ที่ตัดเย็บมาอย่างดี นักแสดงเมื่อสัปดาห์ที่แล้วกลับมาหลังเกิดโรคระบาดด้วยลุค เมต้า','2022-03-05 23:25:55','2022-03-05 23:25:55',6),
	(13,'en','The Models Changing an Industry','the-models-changing-an-industry','always knew I’d be on the cover of the September issue,” says Precious Lee, exuding the serene self-assurance of a woman who’s gotten used to her dreams coming true. “I won’t say I never doubted it would happen, but on a deeper level','<p>always knew I’d be on the cover of the September issue,” says Precious Lee, exuding the serene self-assurance of a woman who’s gotten used to her dreams coming true. “I won’t say I never doubted it would happen, but on a deeper level, I just knew.” From one angle, what Lee says makes perfect sense: The Atlanta native is not only stunning—she also boasts that oh-so-rare talent for transmitting charisma directly through the lens. The same can be said of the seven other distinctively transfixing models who joined Lee at the Vogue offices for this celebratory shoot, staged as New York City began shaking off its pandemic doldrums. “This is so nuts,” says Kaia Gerber, cracking up as she and her fellow cover stars shimmy around cubicles in their formalwear, vibing to a disco beat. And, from a different angle, a historical one, it is nuts: To see Anok Yai, Ariel Nicholson, Bella Hadid, Lola Leon, Sherry Shi, Yumi Nu, and Gerber and Lee posing together, collectively representing what you might call American beauty now, is to feel present at the revolution. The barricades have fallen. Welcome to the new world.</p>','The Models Changing','models,changing','always knew I’d be on the cover of the September issue,” says Precious Lee, exuding the serene self-assurance of a woman who’s gotten used to her dreams coming true. “I won’t say I never doubted it would happen, but on a deeper level meta','2022-03-05 23:30:29','2022-03-05 23:30:29',7),
	(14,'th','อุตสาหกรรมนางแบบตอนนี้','อุตสาหกรรม-นางแบบ','รู้อยู่เสมอว่าฉันจะได้ขึ้นปกฉบับเดือนกันยายน” พรีเชียส ลีกล่าว พร้อมเผยความมั่นใจในตนเองอันเงียบสงบของผู้หญิงคนหนึ่งที่เคยชินกับความฝันของเธอที่เป็นจริง “ฉันจะไม่พูดว่าฉันไม่เคยสงสัยเลยว่ามันจะเกิดขึ้น แต่ในระดับที่ลึกกว่านั้น ฉันเพิ่งรู้” จากมุมหนึ่ง สิ่งที่ Lee พูดนั้นสมเหตุสมผลดี','<p>รู้อยู่เสมอว่าฉันจะได้ขึ้นปกฉบับเดือนกันยายน” พรีเชียส ลีกล่าว พร้อมเผยความมั่นใจในตนเองอันเงียบสงบของผู้หญิงคนหนึ่งที่เคยชินกับความฝันของเธอที่เป็นจริง “ฉันจะไม่พูดว่าฉันไม่เคยสงสัยเลยว่ามันจะเกิดขึ้น แต่ในระดับที่ลึกกว่านั้น ฉันเพิ่งรู้” จากมุมหนึ่ง สิ่งที่ Lee พูดนั้นสมเหตุสมผลดี: ชาวแอตแลนต้าไม่เพียงแต่น่าทึ่งเท่านั้น แต่เธอยังอวดความสามารถที่หายากมากในการถ่ายทอดความสามารถพิเศษผ่านเลนส์โดยตรง อาจกล่าวได้เช่นเดียวกันกับนางแบบหุ่นจำลองอื่นๆ อีก 7 คนที่เข้าร่วมกับลีที่สำนักงานโว้กสำหรับการถ่ายทำเฉลิมฉลองนี้ ซึ่งจัดแสดงในขณะที่นิวยอร์กซิตี้เริ่มขจัดความซบเซาจากโรคระบาด “นี่มันบ้ามาก” ไคอา เกอร์เบอร์พูด เธอและเพื่อนๆ ที่หน้าปกของเธอดูตลกๆ ในชุดทางการของพวกเธอ สั่นสะท้านไปกับจังหวะดิสโก้ และจากมุมที่ต่างไปจากเดิม เรื่องราวทางประวัติศาสตร์นั้นช่างเหลือเชื่อ เมื่อได้เห็น Anok Yai, Ariel Nicholson, Bella Hadid, Lola Leon, Sherry Shi, Yumi Nu, Gerber และ Lee โพสท่าร่วมกัน แสดงถึงสิ่งที่คุณอาจเรียกได้ว่าเป็นความงามแบบอเมริกัน ตอนนี้คือความรู้สึกปัจจุบันในการปฏิวัติ เครื่องกีดขวางได้ลดลง ยินดีต้อนรับสู่โลกใหม่</p>','อุตสาหกรรมนางแบบ','อุตสาหกรรม,นางแบบ','รู้อยู่เสมอว่าฉันจะได้ขึ้นปกฉบับเดือนกันยายน” พรีเชียส ลีกล่าว พร้อมเผยความมั่นใจในตนเองอันเงียบสงบของผู้หญิงคนหนึ่งที่เคยชินกับความฝันของเธอที่เป็นจริง “ฉันจะไม่พูดว่าฉันไม่เคยสงสัยเลยว่ามันจะเกิดขึ้น แต่ในระดับที่ลึกกว่านั้น ฉันเพิ่งรู้” จากมุมหนึ่ง สิ่งที่ Lee พูดนั้นสมเหตุสมผลดี เมต้า','2022-03-05 23:30:29','2022-03-05 23:30:29',7),
	(15,'en','Best new menswear items','best-new-menswear-items','It’s no secret that we’ve just been through a period that will go down in the annals of sartorial history as the year that fashion forgot. A saggy, baggy, 12-month-long acquiescence to sweatpants, T-shirts and slippers, never have we collectively dressed so badly and for so long.','<p>It’s no secret that we’ve just been through a period that will go down in the annals of sartorial history as the year that fashion forgot. A saggy, baggy, 12-month-long acquiescence to sweatpants, T-shirts and slippers, never have we collectively dressed so badly and for so long.</p><p><br></p><p>The excellent news is that 2021, in its vast, tumultuous majority, saw a return of the high-octane dressing from the time BC (before Covid). Timothée Chalamet wore a sequin-encrusted Haider Ackermann Morph suit from the future at the Venice Film Festival! Lil Nas X wore three layers of Versace-branded armour to the Met Ball! Questlove wore gold Crocs to the Oscars! Indeed, never before has getting dressed up and making a fuss felt or looked more fun, and it’s a mood reflected in British GQ’s hot-to-trot new list of the most stylish people on the planet.</p><p><br></p><p>From the superlative Savile Row suits worn by the late, great Charlie Watts to the peaking party gear propounded by the likes of A$AP Rocky and Wizkid, there’s something for everyone</p>','Best new menswear','best,men','It’s no secret that we’ve just been through a period that will go down in the annals of sartorial history as the year that fashion forgot. A saggy, baggy, 12-month-long acquiescence to sweatpants, T-shirts and slippers, never have we collectively dressed so badly and for so long. meta','2022-03-05 23:33:40','2022-03-05 23:33:40',8),
	(16,'th','ไอเท็มเสื้อผ้าผู้ชายใหม่ที่ดีที่สุด','ไอเท็ม-เสื้อผ้าผู้ชาย-ใหม่ที่ดีที่สุด','ไม่ต้องสงสัยเลยว่าเราเพิ่งผ่านช่วงเวลาที่จะลงไปในพงศาวดารของประวัติศาสตร์การแต่งตัวผู้ชายในปีที่แฟชั่นลืมไป กางเกงวอร์ม เสื้อยืด และรองเท้าแตะเป็นเวลานาน 12 เดือน เราไม่เคยใส่ชุดที่แย่และยาวนานขนาดนี้มาก่อน','<p>ไม่ต้องสงสัยเลยว่าเราเพิ่งผ่านช่วงเวลาที่จะลงไปในพงศาวดารของประวัติศาสตร์การแต่งตัวผู้ชายในปีที่แฟชั่นลืมไป กางเกงวอร์ม เสื้อยืด และรองเท้าแตะเป็นเวลานาน 12 เดือน เราไม่เคยใส่ชุดที่แย่และยาวนานขนาดนี้มาก่อน</p><p><br></p><p>ข่าวดีก็คือในปี 2021 ซึ่งเสียงส่วนใหญ่ที่สับสนวุ่นวายนั้นได้เห็นการกลับมาของน้ำยาออกเทนสูงตั้งแต่สมัยก่อนคริสตกาล (ก่อนเกิดโควิด) Timothée Chalamet สวมชุด Haider Ackermann Morph ที่หุ้มด้วยเลื่อมจากอนาคตที่เทศกาลภาพยนตร์เวนิส! Lil Nas X สวมชุดเกราะแบรนด์ Versace สามชั้นในงาน Met Ball! Questlove สวม Crocs สีทองเพื่อรับรางวัลออสการ์! อันที่จริง ไม่เคยมีมาก่อนที่แต่งตัวและทำให้เอะอะรู้สึกหรือดูสนุกมากขึ้น และมันเป็นอารมณ์ที่สะท้อนอยู่ในรายชื่อคนทันสมัยที่สุดในโลกของ GQ ที่ร้อนแรงที่สุดในโลก</p><p><br></p><p>ตั้งแต่ชุดสูทระดับสุดยอดของ Savile Row ที่สวมใส่โดย Charlie Watts ผู้ยิ่งใหญ่ในช่วงดึก ไปจนถึงอุปกรณ์ปาร์ตี้ที่ได้รับความนิยมจาก A$AP Rocky และ Wizkid มีบางอย่างสำหรับทุกคน</p>','ไอเท็มเสื้อผ้าผู้ชายใหม่','ดีที่สุด,ผู้ชาย','ไม่ต้องสงสัยเลยว่าเราเพิ่งผ่านช่วงเวลาที่จะลงไปในพงศาวดารของประวัติศาสตร์การแต่งตัวผู้ชายในปีที่แฟชั่นลืมไป กางเกงวอร์ม เสื้อยืด และรองเท้าแตะเป็นเวลานาน 12 เดือน เราไม่เคยใส่ชุดที่แย่และยาวนานขนาดนี้มาก่อน เมต้า','2022-03-05 23:33:40','2022-03-05 23:33:40',8),
	(17,'en','Best early Black Friday fashion deals','best-early-black-friday-fashion-deals','Black Friday, which this year falls on November 26, is the biggest day on the shopping calendar bar none. With everything from consumer tech and memory foam mattresses to Christmas gifts to seasonal markdowns, it\'s easy to understand why one might be tempted to compile a shopping list and set a mass of reminders to spend wisely.','<p>Black Friday, which this year falls on November 26, is the biggest day on the shopping calendar bar none. With everything from consumer tech and memory foam mattresses to Christmas gifts to seasonal markdowns, it\'s easy to understand why one might be tempted to compile a shopping list and set a mass of reminders to spend wisely. Thankfully, this year there\'s no need. Some of the best Black Friday fashion deals have already landed, meaning you can trade in your fatigued end-of-the-year wardrobe of sweats for a slick collection of seasonal upgrades, all without breaking the bank.</p><p><br></p><p>But blindly navigating the Black Friday fashion sales is an AW21 novelty trend you\'ll never actually wear waiting to happen. That\'s why to give you a push in the right direction, we\'ve shone a stylish spotlight on all the best menswear deals to take advantage of in these early days, plus just a hint of speculation on what we\'re likely to see come the big day. Consider this your whistle-stop tour of where the discounts are hiding and how to make the most of them.&amp;nbsp;&lt;/p&gt;</p>','Best early Black Friday','best,friday','Black Friday, which this year falls on November 26, is the biggest day on the shopping calendar bar none. With everything from consumer tech and memory foam mattresses to Christmas gifts to seasonal markdowns, it\'s easy to understand why one might be tempted to compile a shopping list and set a mass of reminders to spend wisely. meta','2022-03-05 23:36:28','2022-03-05 23:36:28',9),
	(18,'th','ข้อเสนอแฟชั่นแบล็กฟรายเดย์ช่วงต้นที่ดีที่สุด','ข้อเสนอ-แฟชั่นแบล็กฟรายเดย์-ช่วงต้นที่ดีที่สุด','Black Friday ซึ่งปีนี้ตรงกับวันที่ 26 พฤศจิกายน เป็นวันที่ยิ่งใหญ่ที่สุดบนปฏิทินการช็อปปิ้งที่ไม่มีแถบเลย ด้วยทุกอย่างตั้งแต่เทคโนโลยีสำหรับผู้บริโภคและที่นอนเมมโมรี่โฟมไปจนถึงของขวัญคริสต์มาสไปจนถึงการลดราคาประจำฤดูกาล จึงเป็นเรื่องง่ายที่จะเข้าใจว่าทำไมคนๆ หนึ่งจึงอาจถูกล่อลวงให้รวบรวมรายการช้อปปิ้งและตั้งค่าการเตือนความจำจำนวนมากให้ใช้จ่ายอย่างชาญฉลาด','<p>Black Friday ซึ่งปีนี้ตรงกับวันที่ 26 พฤศจิกายน เป็นวันที่ยิ่งใหญ่ที่สุดบนปฏิทินการช็อปปิ้งที่ไม่มีแถบเลย ด้วยทุกอย่างตั้งแต่เทคโนโลยีสำหรับผู้บริโภคและที่นอนเมมโมรี่โฟมไปจนถึงของขวัญคริสต์มาสไปจนถึงการลดราคาประจำฤดูกาล จึงเป็นเรื่องง่ายที่จะเข้าใจว่าทำไมคนๆ หนึ่งจึงอาจถูกล่อลวงให้รวบรวมรายการช้อปปิ้งและตั้งค่าการเตือนความจำจำนวนมากให้ใช้จ่ายอย่างชาญฉลาด โชคดีที่ปีนี้ไม่มีความจำเป็น ข้อเสนอแฟชั่นแบล็กฟรายเดย์ที่ดีที่สุดบางรายการได้มาถึงแล้ว ซึ่งหมายความว่าคุณสามารถแลกเปลี่ยนเสื้อผ้าเหงื่อออกส่งท้ายปีเพื่อซื้อคอลเลกชันอัปเกรดตามฤดูกาลที่ลื่นไหล ทั้งหมดนี้ทำได้โดยไม่ต้องเสียเงิน</p><p><br></p><p>แต่การมองข้ามการขายแฟชั่นในวัน Black Friday เป็นเทรนด์แปลกใหม่ของ AW21 ที่คุณจะไม่มีวันสวมใส่เพื่อรอที่จะเกิดขึ้น นั่นเป็นเหตุผลที่ผลักดันให้คุณไปในทิศทางที่ถูกต้อง เราได้ให้ความสำคัญกับข้อเสนอเสื้อผ้าบุรุษที่ดีที่สุดทั้งหมดเพื่อใช้ประโยชน์จากในช่วงแรก ๆ นี้ บวกกับการคาดเดาว่าเราน่าจะได้เห็นอะไรบ้าง วันสำคัญ ลองพิจารณาทัวร์นี้เพื่อบอกเล่าถึงสถานที่ที่ส่วนลดซ่อนอยู่และวิธีใช้ประโยชน์สูงสุดจากส่วนลดเหล่านี้</p>','ข้อเสนอแฟชั่นแบล็กฟรายเดย์','ดีที่สุด,วันศุกร์','Black Friday ซึ่งปีนี้ตรงกับวันที่ 26 พฤศจิกายน เป็นวันที่ยิ่งใหญ่ที่สุดบนปฏิทินการช็อปปิ้งที่ไม่มีแถบเลย ด้วยทุกอย่างตั้งแต่เทคโนโลยีสำหรับผู้บริโภคและที่นอนเมมโมรี่โฟมไปจนถึงของขวัญคริสต์มาสไปจนถึงการลดราคาประจำฤดูกาล จึงเป็นเรื่องง่ายที่จะเข้าใจว่าทำไมคนๆ หนึ่งจึงอาจถูกล่อลวงให้รวบรวมรายการช้อปปิ้งและตั้งค่าการเตือนความจำจำนวนมากให้ใช้จ่ายอย่างชาญฉลาด เมต้า','2022-03-05 23:36:28','2022-03-05 23:36:28',9),
	(19,'en','Best men gym clothes for a personal','best-men-gym-clothes','Athleisure has well and truly been adopted by the mainstream, with Nike and Adidas topping the biggest grossing names in the clothes business. As more and more of us take to regular fitness routines, we’re spending more time in sweat-wicking shorts than suits','<p>Athleisure has well and truly been adopted by the mainstream, with Nike and Adidas topping the biggest grossing names in the clothes business. As more and more of us take to regular fitness routines, we’re spending more time in sweat-wicking shorts than suits, so why wouldn’t you treat these clothes like the rest of your wardrobe and express your stylistic idiosyncrasies?</p><p><br></p><p>At the very least, replace the worn, mud-stained sports top you used through school with some purpose-built, lean gym attire. There’s no better time to be dressing shipshape when you exercise, so here’s everything you should know before upgrading your fit kit, plus the GQ edit of the best gym clothes for men you can buy right now. And if you\'re looking for something to stow your new purchases, or some functional training shoes to go with, check out our picks of the best gym bags and workout trainers.</p><p><br></p><p>1. The top Sweat-wicking is the name of the game when it comes to gym tops. If you’re working out at max effort – be that at the gym or at home with a resistance band, kettlebell and dumbbells set-up – you’ll want a top that can quickly mop up any moisture perspiring from your back and underarms, and dry just as fast Different sports brands have trademarked their own technologies to do this. The most renowned is Nike’s Dri-Fit, a polyester fabric with high-performance microfibre construction to support the body’s natural cooling system by taking sweat and dispersing it evenly throughout the surface of the garment to speed up evaporation. Lululemon’s Metal Vent tech, meanwhile, boasts smart sweat- and odour-resistant features knitted into the fabric where it’s needed most thanks to is tops’ seamless design.</p><p>2. The bottoms What’s the difference between running shorts and training shorts? Typically, the training kind will be a little longer, falling just above the knee, constructed so as to inhibit the movement of your leg during a given exercise. They’ll also tend to be a little more convenient for the gym as they’ll feature pockets, something running shorts often come without. That said, if you can find a good running short that works for the gym, then winner, winner, chicken broccoli and sweet potato dinner. Running shorts are primed for freedom of movement, so are an optimal choice for cardio-focused workouts.</p><p>3. The base layers Let’s get one thing straight: no matter how good you think your derrière looks in them, men’s tights should only be worn underneath a pair of shorts. There’s not a single person in the gym who wants to see the outline of your member as you perform a hip thrust. That established, it’s well worth incorporating base layers into your gym kit for a few reasons.</p><p><br></p><p>For one, base layers keep you warm when you train outdoors while also absorbing sweat for enhanced comfort. From a performance perspective, they also provide support thanks to their snug fit, thereby reducing risk of injury, while some fitness experts swear by base layers for better activation of the muscles. They look good too, exaggerating the silhouette of your harder-worked muscles, especially the calves and shoulders.&lt;/p&gt;</p>','Best men gym clothes','best,men,gym','Athleisure has well and truly been adopted by the mainstream, with Nike and Adidas topping the biggest grossing names in the clothes business. As more and more of us take to regular fitness routines, we’re spending more time in sweat-wicking shorts than suits meta','2022-03-05 23:41:11','2022-03-05 23:41:11',10),
	(20,'th','สุดยอดเสื้อผ้าออกกำลังกายสำหรับผู้ชายดีที่สุด','สุดยอด-เสื้อผ้าออกกำลังกาย-สำหรับ-ผู้ชาย','Athleisure ได้รับการยอมรับอย่างดีจากกระแสหลักโดย Nike และ Adidas เป็นชื่อที่ทำรายได้สูงสุดในธุรกิจเสื้อผ้า ในขณะที่พวกเราทำกิจวัตรการออกกำลังกายเป็นประจำมากขึ้นเรื่อยๆ เราก็ใช้เวลากับกางเกงซับเหงื่อมากกว่าชุด ดังนั้นทำไมคุณไม่ปฏิบัติกับเสื้อผ้าเหล่านี้เหมือนเสื้อผ้าที่เหลือในตู้เสื้อผ้าของคุณและแสดงความมีสไตล์เฉพาะตัวออกมา','<p>Athleisure ได้รับการยอมรับอย่างดีจากกระแสหลักโดย Nike และ Adidas เป็นชื่อที่ทำรายได้สูงสุดในธุรกิจเสื้อผ้า ในขณะที่พวกเราทำกิจวัตรการออกกำลังกายเป็นประจำมากขึ้นเรื่อยๆ เราก็ใช้เวลากับกางเกงซับเหงื่อมากกว่าชุด ดังนั้นทำไมคุณไม่ปฏิบัติกับเสื้อผ้าเหล่านี้เหมือนเสื้อผ้าที่เหลือในตู้เสื้อผ้าของคุณและแสดงความมีสไตล์เฉพาะตัวออกมา</p><p><br></p><p>อย่างน้อยที่สุด ให้เปลี่ยนเสื้อกีฬาที่เปื้อนและเปื้อนโคลนที่คุณใช้ในโรงเรียนด้วยชุดออกกำลังกายทรงเพรียวบางที่สร้างขึ้นโดยเฉพาะ ไม่มีเวลาไหนที่ดีไปกว่านี้แล้วที่จะแต่งตัวให้มีรูปร่างเหมือนเรือเมื่อคุณออกกำลังกาย ดังนั้นนี่คือทุกสิ่งที่คุณควรรู้ก่อนอัปเกรดชุดฟิตของคุณ บวกกับ GQ ของชุดออกกำลังกายสำหรับผู้ชายที่ดีที่สุดที่คุณสามารถซื้อได้ในตอนนี้ และถ้าคุณกำลังมองหาของที่จะเก็บของที่ซื้อใหม่ของคุณ หรือรองเท้าเทรนนิ่งที่ใช้งานได้จริง ลองดูตัวเลือกกระเป๋ายิมและรองเท้าออกกำลังกายที่ดีที่สุดของเรา</p><p><br></p><p>1. ด้านบน ซับเหงื่อเป็นชื่อของเกมเมื่อพูดถึงเสื้อยิม หากคุณกำลังออกกำลังกายอย่างเต็มที่ ไม่ว่าจะเป็นที่ยิมหรือที่บ้านโดยใช้แถบยางยืด กาเบลล์เบลล์ และดัมเบลล์ คุณจะต้องการเสื้อที่ซับความชื้นจากหลังและใต้วงแขนได้อย่างรวดเร็ว และแห้งเร็วเหมือนกัน แบรนด์กีฬาต่างๆ ได้จดทะเบียนเครื่องหมายการค้าเทคโนโลยีของตนเองเพื่อทำเช่นนี้ ที่มีชื่อเสียงที่สุดคือ Nike\'s Dri-Fit ซึ่งเป็นผ้าโพลีเอสเตอร์ที่มีโครงสร้างไมโครไฟเบอร์ประสิทธิภาพสูงเพื่อรองรับระบบระบายความร้อนตามธรรมชาติของร่างกายโดยการดูดซับเหงื่อและกระจายไปทั่วพื้นผิวของเสื้อผ้าเพื่อเร่งการระเหย ในขณะเดียวกันเทคโนโลยี Metal Vent ของ Lululemon ก็มีคุณสมบัติป้องกันเหงื่อและกลิ่นอันชาญฉลาดที่ถักทออยู่ในเนื้อผ้าซึ่งจำเป็นที่สุด ต้องขอบคุณการออกแบบที่ไร้รอยต่อของตัวเสื้อ</p><p>2. ท่อนล่าง กางเกงวิ่งกับกางเกงเทรนนิ่งต่างกันอย่างไร? โดยปกติ ประเภทการฝึกจะนานขึ้นเล็กน้อย โดยอยู่เหนือเข่าพอดี สร้างขึ้นเพื่อยับยั้งการเคลื่อนไหวของขาระหว่างการออกกำลังกายที่กำหนด พวกเขายังมีแนวโน้มที่จะสะดวกขึ้นเล็กน้อยสำหรับโรงยิมเนื่องจากมีกระเป๋ากางเกงวิ่งขาสั้นมักจะไม่มี ที่กล่าวว่า หากคุณสามารถหากางเกงวิ่งขาสั้นที่เหมาะกับยิมได้ ก็ต้องเป็นผู้ชนะ ผู้ชนะ บร็อคโคลี่ไก่ และอาหารเย็นมันฝรั่งหวาน กางเกงวิ่งขาสั้นออกแบบมาเพื่ออิสระในการเคลื่อนไหว ดังนั้นจึงเป็นตัวเลือกที่ดีที่สุดสำหรับการออกกำลังกายที่เน้นเรื่องหัวใจ</p><p>3. ชั้นฐาน มาพูดกันตรงๆ กันดีกว่า ไม่ว่าคุณจะคิดว่ากางเกงในของคุณจะดูดีแค่ไหน กางเกงรัดรูปของผู้ชายควรสวมไว้ใต้กางเกงขาสั้นเท่านั้น ไม่มีใครในยิมที่ต้องการเห็นโครงร่างของสมาชิกของคุณในขณะที่คุณทำท่าสะโพก ด้วยเหตุผลบางประการ การรวมชั้นฐานเข้ากับชุดออกกำลังกายของคุณจึงคุ้มค่า</p><p><br></p><p>ประการแรกคือ ชั้นฐานรองช่วยให้คุณอบอุ่นเมื่อออกกำลังกายกลางแจ้ง พร้อมดูดซับเหงื่อเพื่อความสบายยิ่งขึ้น จากมุมมองของประสิทธิภาพ พวกเขายังให้การสนับสนุนด้วยความพอดีซึ่งช่วยลดความเสี่ยงของการบาดเจ็บในขณะที่ผู้เชี่ยวชาญด้านการออกกำลังกายบางคนสาบานโดยชั้นฐานเพื่อการกระตุ้นกล้ามเนื้อที่ดีขึ้น พวกมันก็ดูดีเช่นกัน ทำให้ภาพเงาของกล้ามเนื้อที่ทำงานหนักของคุณเกินจริง โดยเฉพาะน่องและไหล่</p>','สุดยอดเสื้อผ้าออกกำลังกาย','สุดยอด,เสื้อผ้าออกกำลังกาย','Athleisure ได้รับการยอมรับอย่างดีจากกระแสหลักโดย Nike และ Adidas เป็นชื่อที่ทำรายได้สูงสุดในธุรกิจเสื้อผ้า ในขณะที่พวกเราทำกิจวัตรการออกกำลังกายเป็นประจำมากขึ้นเรื่อยๆ เราก็ใช้เวลากับกางเกงซับเหงื่อมากกว่าชุด ดังนั้นทำไมคุณไม่ปฏิบัติกับเสื้อผ้าเหล่านี้เหมือนเสื้อผ้าที่เหลือในตู้เสื้อผ้าของคุณและแสดงความมีสไตล์เฉพาะตัวออกมา เมต้า','2022-03-05 23:41:11','2022-03-05 23:41:11',10);

/*!40000 ALTER TABLE `blog_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blogs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blogs`;

CREATE TABLE `blogs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Disabled','Enabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;

INSERT INTO `blogs` (`id`, `image`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'/storage/blogs/1-tf7VKFmD.jpg','Enabled','2022-03-05 20:35:20','2022-03-05 20:35:21'),
	(2,'/storage/blogs/2-BoDVddfr.jpg','Enabled','2022-03-05 20:54:08','2022-03-05 20:54:08'),
	(3,'/storage/blogs/3-QSrHMkqr.jpg','Enabled','2022-03-05 23:14:16','2022-03-05 23:14:16'),
	(4,'/storage/blogs/4-f7Hk9lpq.jpg','Enabled','2022-03-05 23:18:20','2022-03-05 23:18:20'),
	(5,'/storage/blogs/5-SbwbGKfb.jpg','Enabled','2022-03-05 23:21:29','2022-03-05 23:21:30'),
	(6,'/storage/blogs/6-hlqWwAe2.jpg','Enabled','2022-03-05 23:25:55','2022-03-05 23:25:55'),
	(7,'/storage/blogs/7-2CkF1tYC.jpg','Enabled','2022-03-05 23:30:29','2022-03-05 23:30:29'),
	(8,'/storage/blogs/8-IwBkOdSI.jpg','Enabled','2022-03-05 23:33:40','2022-03-05 23:44:04'),
	(9,'/storage/blogs/9-rVN5fzI7.jpg','Enabled','2022-03-05 23:36:28','2022-03-05 23:41:47'),
	(10,'/storage/blogs/10-FfjBcEV5.jpg','Enabled','2022-03-05 23:41:11','2022-03-05 23:41:11');

/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`id`, `sort_order`, `created_at`, `updated_at`, `parent_id`)
VALUES
	(1,0,'2022-03-05 23:59:39','2022-03-05 23:59:39',0),
	(2,0,'2022-03-06 00:00:48','2022-03-06 00:00:48',1),
	(3,0,'2022-03-06 00:02:03','2022-03-06 00:02:03',2),
	(4,1,'2022-03-06 00:03:09','2022-03-06 00:03:09',2),
	(5,0,'2022-03-06 00:04:47','2022-03-06 00:04:47',4),
	(6,1,'2022-03-06 00:05:47','2022-03-06 00:05:47',4),
	(7,2,'2022-03-06 00:06:53','2022-03-06 00:06:53',2),
	(8,1,'2022-03-06 00:08:00','2022-03-06 00:08:00',1),
	(9,0,'2022-03-06 00:09:14','2022-03-06 00:09:14',8),
	(10,1,'2022-03-06 00:10:10','2022-03-06 00:10:10',8),
	(11,1,'2022-03-06 00:11:17','2022-03-06 00:11:17',0),
	(12,0,'2022-03-06 00:13:01','2022-03-06 00:13:01',11),
	(13,0,'2022-03-06 00:14:03','2022-03-06 00:14:03',12),
	(14,1,'2022-03-06 00:14:56','2022-03-06 00:14:56',12),
	(15,1,'2022-03-06 00:15:51','2022-03-06 00:15:51',11),
	(16,2,'2022-03-06 00:16:54','2022-03-06 00:16:54',0);

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_locales`;

CREATE TABLE `category_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_locales` WRITE;
/*!40000 ALTER TABLE `category_locales` DISABLE KEYS */;

INSERT INTO `category_locales` (`id`, `locale`, `name`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `category_id`)
VALUES
	(1,'en','Men','fashion-for-men','Fashion for Men','men,fashion','Get ready for the coming season with our new men\'s arrivals. Build your capsule wardrobe in clean classic lines or mix and match the latest trends using inspiration from street style looks. Stay true to your individual style and wear it your way.','2022-03-05 23:59:39','2022-03-05 23:59:39',1),
	(2,'th','ผู้ชาย','แฟชั่น-สำหรับ-ผู้ชาย','แฟชั่น สำหรับ ผู้ชาย','ผู้ชาย,แฟชั่น','เตรียมตัวให้พร้อมสำหรับฤดูกาลที่จะถึงนี้ด้วยการมาถึงของผู้ชายคนใหม่ของเรา สร้างตู้เสื้อผ้าแคปซูลของคุณในแนวคลาสสิกที่สะอาดตา หรือผสมผสานและเข้ากับเทรนด์ล่าสุดโดยใช้แรงบันดาลใจจากสไตล์สตรีท เข้ากับสไตล์เฉพาะตัวและสวมใส่ในแบบของคุณ','2022-03-05 23:59:39','2022-03-05 23:59:39',1),
	(3,'en','Tops','tops-for-men','Tops for Men','men,fashion,top',NULL,'2022-03-06 00:00:48','2022-03-06 00:00:48',2),
	(4,'th','เสื้อผ้า','เสื้อผ้า-สำหรับ-ผู้ชาย','เสื้อผ้า สำหรับ ผู้ชาย','เสื้อผ้า,แฟชั่น,ผู้ชาย',NULL,'2022-03-06 00:00:48','2022-03-06 00:00:48',2),
	(5,'en','T-Shirt','t-shirt-for-men','T-Shirt for Men','t-shirt,fashion,men',NULL,'2022-03-06 00:02:03','2022-03-06 00:02:03',3),
	(6,'th','เสื้อยืด','เสื้อยืด-สำหรับ-ผู้ชาย','เสื้อยืด สำหรับ ผู้ชาย','เสื้อยืด,แฟชั่น,ผู้ชาย',NULL,'2022-03-06 00:02:03','2022-03-06 00:02:03',3),
	(7,'en','Hoodies','hoodie-for-men','Hoodies for Men','hoodies,fashion,men',NULL,'2022-03-06 00:03:09','2022-03-06 00:03:09',4),
	(8,'th','เสื้อฮู้ด','เสื้อฮู้ด-สำหรับ-ผู้ชาย','เสื้อฮู้ด สำหรับ ผู้ชาย','เสื้อฮู้ด,แฟชั่น,ผู้ชาย',NULL,'2022-03-06 00:03:09','2022-03-06 00:03:09',4),
	(9,'en','Jumper Hoodies','jumper-hoodies-for-men','Jumper Hoodies for men','jumper hoodies,fashion,men',NULL,'2022-03-06 00:04:47','2022-03-06 00:04:47',5),
	(10,'th','จั้มเปอร์ฮู้ด','จั้มเปอร์ฮู้ด-สำหรับ-ผู้ชาย','จั้มเปอร์ฮู้ด สำหรับ ผู้ชาย','จั้มเปอร์ฮู้ด,แฟชั่น,ผู้ชาย',NULL,'2022-03-06 00:04:47','2022-03-06 00:04:47',5),
	(11,'en','Zip Up Hoodies','zip-up-hoodies-for-men','Zip Up Hoodies for Men','zip up hoodies,fashion,men',NULL,'2022-03-06 00:05:47','2022-03-06 00:05:47',6),
	(12,'th','ฮู้ดมีซิบ','ฮู้ดมีซิบ-สำหรับ-ผู้ชาย','ฮู้ดมีซิบ สำหรับ ผู้ชาย','ฮู้ดมีซิบ,แฟชั่น,ผู้ชาย',NULL,'2022-03-06 00:05:47','2022-03-06 00:05:47',6),
	(13,'en','Kimonos','kimonos-for-men','Kimonos for Men','kimono,fashion,men',NULL,'2022-03-06 00:06:53','2022-03-06 00:06:53',7),
	(14,'th','กิโมโน','กิโมโน-สำหรับ-ผู้ชาย','กิโมโน สำหรับ ผู้ชาย','กิโมโน,แฟชั่น,ชาย',NULL,'2022-03-06 00:06:53','2022-03-06 00:06:53',7),
	(15,'en','Bottoms','Bottoms-for-men','Bottoms for Men','bottoms,fashion,men',NULL,'2022-03-06 00:08:00','2022-03-06 00:08:00',8),
	(16,'th','กางเกง','กางเกง-สำหรับ-ผู้ชาย','กางเกง สำหรับ ผู้ชาย','กางเกง,แฟชั่น,ผู้ชาย',NULL,'2022-03-06 00:08:00','2022-03-06 00:08:00',8),
	(17,'en','Joggers','joggers-for-men','Joggers for Men','joggers,fashion,men',NULL,'2022-03-06 00:09:14','2022-03-06 00:09:14',9),
	(18,'th','กางเกงจ๊อกเกอร์','กางเกงจ๊อกเกอร์-สำหรับ-ผู้ชาย','กางเกงจ๊อกเกอร์ สำหรับ ผู้ชาย','กางเกงจ๊อกเกอร์,แฟชั่น,ชาย',NULL,'2022-03-06 00:09:14','2022-03-06 00:09:14',9),
	(19,'en','Shorts','short-for-men','Shorts for Men','shorts,fashion,men',NULL,'2022-03-06 00:10:10','2022-03-06 00:10:10',10),
	(20,'th','กางเกงขาสั้น','กางเกงขาขั้น-สำหรับ-ผู้ชาย','กางเกงขาสั้น สำหรับ ผู้ชาย','กางเกงขาสั้น,แฟชั่น,ผู้ชาย',NULL,'2022-03-06 00:10:10','2022-03-06 00:10:10',10),
	(21,'en','Women','fashion-for-Women','Fashion for Women','fashion,women',NULL,'2022-03-06 00:11:17','2022-03-06 00:11:17',11),
	(22,'th','ผู้หญิง','แฟชั่น-สำหรับ-ผู้หญิง','แฟชั่น สำหรับ ผู้หญิง','แฟชั่น,ผู้หญิง',NULL,'2022-03-06 00:11:17','2022-03-06 00:11:17',11),
	(23,'en','Tops','tops-for-women','Tops for Women','tops,fashion,women',NULL,'2022-03-06 00:13:01','2022-03-06 00:13:01',12),
	(24,'th','เสื้อผ้า','เสื้อผ้า-สำหรับ-ผู้หญิง','เสื้อผ้า สำหรับ ผู้หญิง','เสื้อผ้า,แฟชั่น,ผู้หญิง',NULL,'2022-03-06 00:13:01','2022-03-06 00:13:01',12),
	(25,'en','Hoodies','hoodies-for-women','Hoodies for Women','hoodies,fashion,women',NULL,'2022-03-06 00:14:03','2022-03-06 00:14:03',13),
	(26,'th','เสื้อฮู้ด','เสื้อฮู้ด-สำหรับ-ผู้หญิง','เสื้อฮู้ด สำหรับ ผู้หญิง','เสื้อฮู้ด,แฟชั่น,ผู้หญิง',NULL,'2022-03-06 00:14:03','2022-03-06 00:14:03',13),
	(27,'en','Tank Tops','tank-tops-for-women','Tank Tops for Women','tank tops,fashion,women',NULL,'2022-03-06 00:14:56','2022-03-06 00:14:56',14),
	(28,'th','เสื้อกล้าม','เสื้อกล้าม-สำหรับ-ผู้หญิง','เสื้อกล้าม สำหรับ ผู้หญิง','เสื้อกล้าม,แฟชั่น,ผู้หญิง',NULL,'2022-03-06 00:14:56','2022-03-06 00:14:56',14),
	(29,'en','Bottoms','bottom-for-women','Bottoms for Women','bottoms,fashion,women',NULL,'2022-03-06 00:15:51','2022-03-06 00:15:51',15),
	(30,'th','กางเกง','กางเกง-สำหรับ-ผู้หญิง','กางเกง สำหรับ ผู้หญิง','กางเกง,แฟชั่น,ผู้หญิง',NULL,'2022-03-06 00:15:51','2022-03-06 00:15:51',15),
	(31,'en','Accessories','accessories','Accessories','accessory,fashion',NULL,'2022-03-06 00:16:54','2022-03-06 00:16:54',16),
	(32,'th','เครื่องประดับ','เครื่องประดับ','เครื่องประดับ','เครื่องประดับ,แฟชั่น',NULL,'2022-03-06 00:16:54','2022-03-06 00:16:54',16);

/*!40000 ALTER TABLE `category_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table category_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `category_product`;

CREATE TABLE `category_product` (
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `category_product` WRITE;
/*!40000 ALTER TABLE `category_product` DISABLE KEYS */;

INSERT INTO `category_product` (`category_id`, `product_id`)
VALUES
	(16,1),
	(16,4),
	(16,3),
	(16,2),
	(1,5),
	(2,5),
	(3,5),
	(1,10),
	(2,10),
	(3,10),
	(1,14),
	(2,14),
	(3,14),
	(1,17),
	(2,17),
	(7,17),
	(1,19),
	(2,19),
	(7,19),
	(1,22),
	(2,22),
	(7,22),
	(1,27),
	(2,27),
	(4,27),
	(6,27),
	(1,32),
	(2,32),
	(4,32),
	(5,32),
	(1,37),
	(2,37),
	(4,37),
	(5,37),
	(1,43),
	(2,43),
	(4,43),
	(6,43),
	(1,46),
	(2,46),
	(4,46),
	(6,46),
	(1,52),
	(2,52),
	(4,52),
	(5,52);

/*!40000 ALTER TABLE `category_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contact_us
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact_us`;

CREATE TABLE `contact_us` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` mediumtext COLLATE utf8mb4_unicode_ci,
  `instagram` mediumtext COLLATE utf8mb4_unicode_ci,
  `twitter` mediumtext COLLATE utf8mb4_unicode_ci,
  `youtube` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contact_us` WRITE;
/*!40000 ALTER TABLE `contact_us` DISABLE KEYS */;

INSERT INTO `contact_us` (`id`, `email`, `telephone`, `fax`, `facebook`, `instagram`, `twitter`, `youtube`, `created_at`, `updated_at`)
VALUES
	(1,'info.vuexy@gmail.com','+66945678126','+6625266328','https://www.facebook.com','https://www.instagram.com','https://www.twitter.com','https://www.youtube.com','2022-03-05 19:50:02','2022-03-05 19:50:02');

/*!40000 ALTER TABLE `contact_us` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table contact_us_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contact_us_locales`;

CREATE TABLE `contact_us_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_us_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `contact_us_locales` WRITE;
/*!40000 ALTER TABLE `contact_us_locales` DISABLE KEYS */;

INSERT INTO `contact_us_locales` (`id`, `locale`, `company`, `address`, `contact_us_id`, `created_at`, `updated_at`)
VALUES
	(1,'en','Vuexy Company Limited','8 Phiboonsongkharm Rd. Nonthaburi 11000 Thailand',1,'2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(2,'th','วิวซี่ คอมพานี ลิมิเต็ด','8 ถนน พิบูลสงคราม จังหวัด นนทบุรี ประเทศไทย',1,'2022-03-05 19:50:02','2022-03-05 19:50:02');

/*!40000 ALTER TABLE `contact_us_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table coupons
# ------------------------------------------------------------

DROP TABLE IF EXISTS `coupons`;

CREATE TABLE `coupons` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `percentage` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` enum('Disabled','Enabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `coupons` WRITE;
/*!40000 ALTER TABLE `coupons` DISABLE KEYS */;

INSERT INTO `coupons` (`id`, `name`, `code`, `start_date`, `end_date`, `percentage`, `amount`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'Open Outlet','Vuexy8','2022-03-01','2022-03-31',20,10,'Enabled','2022-03-06 13:21:36','2022-03-06 13:21:36');

/*!40000 ALTER TABLE `coupons` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table emails
# ------------------------------------------------------------

DROP TABLE IF EXISTS `emails`;

CREATE TABLE `emails` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `to` enum('All','Customers','Subscribes') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'All',
  `subject` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `signature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table failed_jobs
# ------------------------------------------------------------

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table filter_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filter_category`;

CREATE TABLE `filter_category` (
  `filter_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `filter_category` WRITE;
/*!40000 ALTER TABLE `filter_category` DISABLE KEYS */;

INSERT INTO `filter_category` (`filter_id`, `category_id`)
VALUES
	(1,1),
	(15,1),
	(1,2),
	(15,2),
	(1,3),
	(15,3),
	(1,4),
	(15,4),
	(1,5),
	(15,5),
	(1,6),
	(15,6),
	(1,7),
	(15,7),
	(1,8),
	(15,8),
	(1,9),
	(15,9),
	(1,10),
	(15,10),
	(1,11),
	(15,11),
	(1,12),
	(15,12),
	(1,13),
	(15,13),
	(1,14),
	(15,14),
	(1,15),
	(15,15);

/*!40000 ALTER TABLE `filter_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table filter_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filter_locales`;

CREATE TABLE `filter_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `filter_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `filter_locales` WRITE;
/*!40000 ALTER TABLE `filter_locales` DISABLE KEYS */;

INSERT INTO `filter_locales` (`id`, `locale`, `name`, `created_at`, `updated_at`, `filter_id`)
VALUES
	(1,'en','Colour','2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(2,'th','สี','2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(3,'en','Black','2022-03-05 23:55:23','2022-03-05 23:55:23',2),
	(4,'th','ดำ','2022-03-05 23:55:23','2022-03-05 23:55:23',2),
	(5,'en','Blue','2022-03-05 23:55:23','2022-03-05 23:55:23',3),
	(6,'th','น้ำเงิน','2022-03-05 23:55:23','2022-03-05 23:55:23',3),
	(7,'en','Brown','2022-03-05 23:55:23','2022-03-05 23:55:23',4),
	(8,'th','น้ำตาล','2022-03-05 23:55:23','2022-03-05 23:55:23',4),
	(9,'en','Green','2022-03-05 23:55:23','2022-03-05 23:55:23',5),
	(10,'th','เขียว','2022-03-05 23:55:23','2022-03-05 23:55:23',5),
	(11,'en','Gray','2022-03-05 23:55:23','2022-03-05 23:55:23',6),
	(12,'th','เทา','2022-03-05 23:55:23','2022-03-05 23:55:23',6),
	(13,'en','Orange','2022-03-05 23:55:23','2022-03-05 23:55:23',7),
	(14,'th','ส้ม','2022-03-05 23:55:23','2022-03-05 23:55:23',7),
	(15,'en','Pink','2022-03-05 23:55:23','2022-03-05 23:55:23',8),
	(16,'th','ชมพู','2022-03-05 23:55:23','2022-03-05 23:55:23',8),
	(17,'en','Purple','2022-03-05 23:55:23','2022-03-05 23:55:23',9),
	(18,'th','ม่วง','2022-03-05 23:55:23','2022-03-05 23:55:23',9),
	(19,'en','Red','2022-03-05 23:55:23','2022-03-05 23:55:23',10),
	(20,'th','แดง','2022-03-05 23:55:23','2022-03-05 23:55:23',10),
	(21,'en','Silver','2022-03-05 23:55:23','2022-03-05 23:55:23',11),
	(22,'th','เงิน','2022-03-05 23:55:23','2022-03-05 23:55:23',11),
	(23,'en','White','2022-03-05 23:55:23','2022-03-05 23:55:23',12),
	(24,'th','ขาว','2022-03-05 23:55:23','2022-03-05 23:55:23',12),
	(25,'en','Yellow','2022-03-05 23:55:23','2022-03-05 23:55:23',13),
	(26,'th','เหลือง','2022-03-05 23:55:23','2022-03-05 23:55:23',13),
	(27,'en','Muti-Color','2022-03-05 23:55:23','2022-03-05 23:55:23',14),
	(28,'th','หลายสี','2022-03-05 23:55:23','2022-03-05 23:55:23',14),
	(29,'en','Size','2022-03-05 23:56:48','2022-03-05 23:56:48',15),
	(30,'th','ขนาด','2022-03-05 23:56:48','2022-03-05 23:56:48',15),
	(31,'en','S','2022-03-05 23:56:48','2022-03-05 23:56:48',16),
	(32,'th','เล็กมาก (S)','2022-03-05 23:56:48','2022-03-05 23:56:48',16),
	(33,'en','M','2022-03-05 23:56:48','2022-03-05 23:56:48',17),
	(34,'th','เล็ก (M)','2022-03-05 23:56:48','2022-03-05 23:56:48',17),
	(35,'en','L','2022-03-05 23:56:48','2022-03-05 23:56:48',18),
	(36,'th','กลาง (L)','2022-03-05 23:56:48','2022-03-05 23:56:48',18),
	(37,'en','XL','2022-03-05 23:56:48','2022-03-05 23:56:48',19),
	(38,'th','ใหญ่ (XL)','2022-03-05 23:56:48','2022-03-05 23:56:48',19),
	(39,'en','2XL','2022-03-05 23:56:48','2022-03-05 23:58:02',20),
	(40,'th','ใหญ่มาก (2XL)','2022-03-05 23:56:48','2022-03-05 23:58:02',20);

/*!40000 ALTER TABLE `filter_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table filter_product
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filter_product`;

CREATE TABLE `filter_product` (
  `filter_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `filter_product` WRITE;
/*!40000 ALTER TABLE `filter_product` DISABLE KEYS */;

INSERT INTO `filter_product` (`filter_id`, `product_id`)
VALUES
	(12,1),
	(10,4),
	(13,3),
	(3,2),
	(2,5),
	(16,5),
	(17,5),
	(18,5),
	(19,5),
	(3,10),
	(17,10),
	(18,10),
	(19,10),
	(12,14),
	(16,14),
	(18,14),
	(9,17),
	(14,19),
	(17,19),
	(18,19),
	(2,22),
	(12,22),
	(16,22),
	(17,22),
	(18,22),
	(19,22),
	(2,27),
	(12,27),
	(16,27),
	(17,27),
	(18,27),
	(19,27),
	(9,32),
	(16,32),
	(17,32),
	(18,32),
	(19,32),
	(2,37),
	(13,37),
	(16,37),
	(17,37),
	(18,37),
	(19,37),
	(20,37),
	(8,43),
	(16,43),
	(18,43),
	(14,46),
	(16,46),
	(17,46),
	(18,46),
	(19,46),
	(20,46),
	(7,52),
	(16,52),
	(17,52),
	(18,52);

/*!40000 ALTER TABLE `filter_product` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table filters
# ------------------------------------------------------------

DROP TABLE IF EXISTS `filters`;

CREATE TABLE `filters` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `filters` WRITE;
/*!40000 ALTER TABLE `filters` DISABLE KEYS */;

INSERT INTO `filters` (`id`, `sort_order`, `created_at`, `updated_at`, `parent_id`)
VALUES
	(1,0,'2022-03-05 23:55:23','2022-03-05 23:55:23',0),
	(2,0,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(3,1,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(4,2,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(5,3,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(6,4,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(7,5,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(8,6,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(9,7,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(10,8,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(11,9,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(12,10,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(13,11,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(14,12,'2022-03-05 23:55:23','2022-03-05 23:55:23',1),
	(15,0,'2022-03-05 23:56:48','2022-03-05 23:56:48',0),
	(16,0,'2022-03-05 23:56:48','2022-03-05 23:56:48',15),
	(17,1,'2022-03-05 23:56:48','2022-03-05 23:56:48',15),
	(18,2,'2022-03-05 23:56:48','2022-03-05 23:56:48',15),
	(19,3,'2022-03-05 23:56:48','2022-03-05 23:56:48',15),
	(20,4,'2022-03-05 23:56:48','2022-03-05 23:56:48',15);

/*!40000 ALTER TABLE `filters` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table information
# ------------------------------------------------------------

DROP TABLE IF EXISTS `information`;

CREATE TABLE `information` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sort_order` int(11) NOT NULL,
  `status` enum('Disabled','Enabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `information` WRITE;
/*!40000 ALTER TABLE `information` DISABLE KEYS */;

INSERT INTO `information` (`id`, `sort_order`, `status`, `created_at`, `updated_at`)
VALUES
	(1,0,'Enabled','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(2,1,'Enabled','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(3,2,'Enabled','2022-03-05 19:50:02','2022-03-05 19:50:02');

/*!40000 ALTER TABLE `information` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table information_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `information_locales`;

CREATE TABLE `information_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `information_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `information_locales` WRITE;
/*!40000 ALTER TABLE `information_locales` DISABLE KEYS */;

INSERT INTO `information_locales` (`id`, `locale`, `title`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `information_id`)
VALUES
	(1,'en','Terms and Conditions','terms-and-conditions','<p><strong>1. WEBSITE TERMS AND CONDITIONS</strong></p>\n                                        <p>Welcome to www.ccdoubleo.com (the Website), operated by Jaspal Group and its subsidiaries and affiliates. These are the Terms and Conditions (&ldquo;Terms&rdquo;) of your agreement with Jaspal Group (&ldquo;Jaspal&rdquo;) which apply to all products and/or services purchased by you from the Website. Please read the following Terms and Conditions carefully. If you visit, or continue to browse and use this Website, you are agreeing to comply with and be bound by the Website Terms and Conditions together with our Privacy Policy which govern Jaspal and its use by you in relation to this Website.</p>\n                                        <p>Jaspal reserves the right to change the Terms from time to time at its sole discretion, and your rights under this agreement will be subject to the most current version of the Terms posted on this page at the time of your use or purchase. You and your company rely on the information contained on this Website at your own risk. If you do not agree with these or revised Terms of use, please discontinue your use of the Website. If you find an error or omission on this Website, please let us know.</p>\n                                        <p>If you have any questions, comments or concerns arising from the Website, the Privacy Policy or any other relevant Terms and Conditions, policies and notices or the way in which we are handling your personal information please contact us.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>2. INFORMATION AND LICENSE</strong></p>\n                                        <p>Jaspal grants you a limited license to access and make personal use of this Website and not to download or modify it, or any portion of it, except with express written consent of Jaspal. This license does not include any resale or commercial use of the Website or its contents; any collection and use of any product listings, descriptions, or prices; any derivative use of www.ccdoubleo.com or its contents; or any use of data mining, robots, or similar data gathering and extraction tools. The Website or any portion of it may not be reproduced, duplicated, copied, sold, resold, visited, or otherwise exploited for any commercial purpose without express written consent of Jaspal.</p>\n                                        <p>Jaspal attempts to be as accurate as possible in its product descriptions. However, Jaspal does not warrant that product and price descriptions or other content of this Website are accurate, complete, reliable, current, or error-free. Neither Jaspal nor any third party or data or content provider make any representations or warranties, whether express, implied in law or residual, as to the sequence, accuracy, completeness or reliability of information, opinions, any pricing information, research information, data and/or content contained on the Website (including but not limited to any information which may be provided by any third party or data or content providers) and shall not be bound in any manner by any information contained on the Website.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>3. INTELLECTUAL PROPERTY</strong></p>\n                                        <p>The copyrights, trademarks, names, graphics, designs, logos, service marks, service names, scripts, commercial markings, and trade dress (collectively Intellectual Property) displayed on this Website are all registered and unregistered intellectual properties of Jaspal or its licensors, sponsors or suppliers and are protected by intellectual property laws. Nothing contained on this Website should be construed as granting any license or right to use any intellectual property without the prior written permission of Jaspal.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>4. EXTERNAL LINKS</strong></p>\n                                        <p>External links may be provided for your convenience, but they are beyond the control of www.ccdoubleo.com and no representation is made as to their content. Use or reliance on any external links and the content thereon provided is at your own risk. When visiting external links you must refer to the terms and conditions of use for that external Website.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>5. PUBLIC FORUMS AND USER SUBMISSIONS</strong></p>\n                                        <p>Jaspal is not responsible for any material submitted to the public areas by you (which include bulletin boards, hosted pages, chat rooms, or any other public area found on the Website. Any material (whether submitted by you or any other user) is not endorsed, reviewed or approved by Jaspal. We reserve the right to remove any material submitted or posted by you in the public areas, without notice to you, if it becomes aware and determines, in its sole and absolute discretion that you are or there is the likelihood that you may, including but not limited to:</p>\n                                        <p>5.1 defame, abuse, harass, stalk, threaten or otherwise violate the rights of other users or any third parties;</p>\n                                        <p>5.2 publish, post, distribute or disseminate any defamatory, obscene, indecent or unlawful material or information;</p>\n                                        <p>5.3 post or upload files that contain viruses, corrupted files or any other similar software or programs that may damage the operation of Jaspal and/or a third party computer system and/or network;</p>\n                                        <p>5.4 violate any copyright, trade mark, other applicable Thailand or international laws or intellectual property rights of Jaspal or any other third party;</p>\n                                        <p>5.5 submit content containing marketing or promotional material which is intended to solicit business.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>6. MEMBERSHIP</strong></p>\n                                        <p>Jaspal Website is not available to users under the age of 13, outside the demographic target, or to any members previously banned by Jaspal. Users are allowed only one active account. Breeching these conditions could result in account termination.</p>\n                                        <p>Jaspal on occasion will offer its members promotions. In connection with these promotions, any user that receives Rewards (prizes, credits, gift cards, coupons or other benefits) from Jaspal through the use of multiple accounts, email addresses, falsified information or fraudulent conduct, shall forfeit any Rewards gained through such activity and may be liable for civil and/or criminal penalties by law.</p>\n                                        <p>By using the Jaspal Website, you acknowledge that you are of legal age to form a binding contract and are not a person barred from receiving services under the laws of the Thailand or other applicable jurisdiction. You agree to provide true and accurate information about yourself when requested by Jaspal Website. If you provide any information that is untrue, inaccurate, or incomplete, Jaspal has the right to suspend or terminate your account and refuse future use of its services. You are responsible for maintaining the confidentiality of your account and password, and accept all responsible for activities that occur under your account.</p>\n                                        <p>Any benefits or rewards offered through the Website are at the discretion of Jaspal. Jaspal has the right to modify or discontinue, temporarily or permanently, the services offered at its sole discretion, with or without prior notice to its members.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>7. COMMUNICATIONS AND OTHER CONTENT</strong></p>\n                                        <p>You may submit suggestions, ideas, comments, questions, or other information to us so long as the content is not illegal, obscene, threatening, defamatory, invasive of privacy, infringing of intellectual property rights, or otherwise injurious to third parties or objectionable and does not consist of or contain software viruses, political campaigning, commercial solicitation, chain letters, mass mailings, or any form of spam. You may not use a false e-mail address, impersonate any person or entity, or otherwise mislead as to the origin of any content.</p>\n                                        <p>If you do submit material, you automatically grant Jaspal and its affiliates a nonexclusive, royalty-free, perpetual, irrevocable, and fully sub-licensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, and display such content in any media throughout the world.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>8. CANCELLATION DUE TO ERRORS</strong></p>\n                                        <p>Jaspal has the right to cancel an order at anytime due to typographical or unforeseen errors that results in the product(s) on the site being listed inaccurately (having the wrong price or descriptions etc.). In the event a cancellation occurs and payment for the order has been received, Jaspal shall issue a full refund for the product in the amount in question.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>9. CANCELLATIONS AND RETURNS</strong></p>\n                                        <p>Orders can be cancelled if their products have not yet be delivered. Once products are delivered to the users account, they are no longer permitted to cancel. Any returns after that are handled on a case-by-case basis. Within reason, we will do what we can to ensure customer satisfaction. Unless there is something wrong with the purchase, we are generally unable to offer refunds.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>9. SPECIFIC USE</strong></p>\n                                        <p>You further agree not to use the Website to send or post any message or material that is unlawful, harassing, defamatory, abusive, indecent, threatening, harmful, vulgar, obscene, sexually orientated, racially offensive, profane, pornographic or violates any applicable law and you hereby indemnify Jaspal against any loss, liability, damage or expense of whatever nature which Jaspal or any third party may suffer which is caused by or attributable to, whether directly or indirectly, your use of the Website to send or post any such message or material.</p>\n                                        <p>10. DISCLAIMER OF WARRANTIES AND LIMTATION OF LIABILITY</p>\n                                        <p>This website and all information contained herein are provided by Jaspal on an as is and as available basis. Jaspal makes no representations or warranties of any kind, express or implied, as to the operation and availability of this website or the information, content, materials, or products presented on the website. You expressly agree that your use of this website is at your sole risk. To the full extent permissible by applicable law, Jaspal disclaims all warranties, express or implied, including, but not limited to, implied warranties of merchantability and fitness for a particular purpose. Jaspal does not warrant that the website, its servers, or e-mail sent from Jaspal are free of viruses or other harmful components or errors. Jaspal will not be liable for any damages of any kind arising from the use of this website, including, but not limited to direct, indirect, incidental, punitive, and consequential damages.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>9. INDEMNIFICATION</strong></p>\n                                        <p>Jaspal makes no warranties, representations, statements or guarantees (whether express, implied in law or residual) regarding the Website, the information contained on the Website, you or your company\'s personal information or material and information transmitted over our system.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>12. PRIVACY AND SECURITY</strong></p>\n                                        <p>Please review our Privacy Policy containing our privacy and security practices, which also governs your visit to the Website.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>13. ENTIRE AGREEMENT</strong></p>\n                                        <p>These Terms and Conditions constitute the sole record of the agreement between you and Jaspal in relation to your use of the Website. Neither you nor Jaspal shall be bound by any expressed or implied representation, warranty, or promise not recorded herein. Unless otherwise specifically stated, these Terms supersede and replace all prior commitments, undertakings or representations, whether written or oral, between you and Jaspal in respect of your use of the Website.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>14. CONFLICT</strong></p>\n                                        <p>Where any conflict or contradiction appears between the provisions of these Website terms and conditions and any other relevant terms and conditions, policies or notices, the other relevant terms and conditions, policies or notices which relate specifically to a particular section or module of the Website shall prevail in respect of your use of the relevant section or module of the Website.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>15. WAIVER</strong></p>\n                                        <p>No indulgence or extension of time which either you or Jaspal may grant to the other will constitute a waiver of or, whether by law or otherwise, limit any of the existing or future rights of the grantor in terms hereof, save in the event or to the extent that the grantor has signed a written document expressly waiving or limiting such rights.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>16. CESSION</strong></p>\n                                        <p>Jaspal shall be entitled to cede, assign and delegate all or any of its rights and obligations in terms of any relevant terms and conditions, policies and notices to any third party.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>17. SEVERABILITY</strong></p>\n                                        <p>All provisions of any relevant terms and conditions, policies and notices are, notwithstanding the manner in which they have been grouped together or linked grammatically, severable from each other. Any provision of any relevant terms and conditions, policies and notices, which is or becomes unenforceable in any jurisdiction, whether due to void, invalidity, illegality, unlawfulness or for any reason whatever, shall, in such jurisdiction only and only to the extent that it is so unenforceable, be treated as pro non-scripto and the remaining provisions of any relevant terms and conditions, policies and notices shall remain in full force and effect.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>18. GOVERNING LAW; EXCLUSIVE JURISDICTION</strong></p>\n                                        <p>This Agreement shall be governed by and construed in accordance with the laws of the Kingdom of Thailand, without giving effect to its conflict of law rules and applicable Thai law. In the event of any dispute hereunder, you and Jaspal hereby consent to the exclusive jurisdiction and venue of the courts of the Kingdom of Thailand. The parties expressly disclaim the application of the United Nations Convention on Contracts for the International Sale of Goods.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>19. TERMINATION</strong></p>\n                                        <p>These terms and conditions are applicable to you upon your accessing the Website and/or completing the registration or shopping process. These terms and conditions, or any of them, may be modified or terminated by Jaspal without notice at any time for any reason. The provisions relating to Copyrights and Trademarks, Disclaimer, Claims, Limitation of Liability, Indemnification, Applicable Laws, Arbitration and General, shall survive any termination.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>20. FORCE MAJEURE</strong></p>\n                                        <p>Jaspal shall have no liability to you for any delay or failure in carrying out its obligations to any customer for reasons beyond Jaspal&rsquo;s control, including without limitation, acts of God, war or terrorism, natural disasters, charges in or compliance with laws, regulations or governmental policies and shortages of supplies and services. Jaspal may extend delivery of an order so affected without liability to the customer except for the return of any payment made by the customer to Jaspal with respect to any undelivered portion of the order so canceled.</p>\n                                        <p>&nbsp;</p>\n                                        <h2><strong>PRIVACY POLICY</strong></h2>\n                                        <p><strong>1. INTRODUCTION</strong></p>\n                                        <p>Welcome to www.ccdoubleo.com (the Website), operated by Jaspal Group and its subsidiaries and affiliates. We value our customers\' privacy and appreciate your confidence that we will respect your privacy in a careful and sensible manner. By visiting the Website and/or using the products and services made available to you on the Website, you are agreeing to the terms of this Privacy Policy. Please read this policy carefully.</p>\n                                        <p>Jaspal reserves the right to change the Privacy Policy from time to time at its sole discretion, and your rights under this agreement will be subject to the most current version of the policy posted on this page at the time of your use or purchase. By using or continuing to use the Website, you are accepting the practices described in the most current version of this Privacy Policy.</p>\n                                        <p>If you have any questions, comments or concerns arising from the Website, the Privacy Policy or any other relevant Terms and Conditions, policies and notices or the way in which we are handling your personal information please contact us.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>2. COLLECTION AND STORAGE OF INFORMATION</strong></p>\n                                        <p>Welcome to www.ccdoubleo.com (the Website), operated by Jaspal Group and its subsidiaries and affiliates. We value our customers\' privacy and appreciate your confidence that we will respect your privacy in a careful and sensible manner. By visiting the Website and/or using the products and services made available to you on the Website, you are agreeing to the terms of this Privacy Policy. Please read this policy carefully.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>3. USAGE AND SHARING OF INFORMATION COLLECTED</strong></p>\n                                        <p>Jaspal may share customer information only on a limited basis and with our parent company and affiliates. We share it on a limited basis with agents we use from time to time to send postal mail and e-mail, remove repetitive information from customer lists, analyze data, provide marketing assistance, and provide customer service.</p>\n                                        <p>We use information about our customers for the specific purpose for which it was volunteered. In addition, if you supply us with your postal address online, you may receive periodic mailings from us with information regarding a new collection, new products, new store locations, or upcoming promotional offers or events.</p>\n                                        <p>Jaspal may also share information with governmental agencies or other companies assisting us in fraud prevention or investigation. We may do so when: (1) permitted or required by law; or, (2) trying to protect against or prevent actual or potential fraud or unauthorized transactions; or, (3) investigating fraud which has already taken place. The information is not provided to these companies for marketing purposes.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>4. COOKIES</strong></p>\n                                        <p>Jaspal uses cookies and web beacons (also referred to as Web bugs, pixel tags or clear GIFs) to manage the Website and e-mail programs. We do not use cookies or web beacons to collect or store personal information. Cookies and web beacons help us understand how consumers use the Website and e-mail and measure the effectiveness of our online advertising so we can design better services in the future.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>5. CHILDREN\'S PRIVACY</strong></p>\n                                        <p>This Website is not intended for children under the age of 13, and Jaspal does not knowingly request and collect personally identifiable information online from anyone under the age of 13 without prior verifiable parental consent.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>6. COMMITMENT TO DATA SECURITY</strong></p>\n                                        <p>Your personally identifiable information is kept secure. Only authorized employees, agents and contractors (who have agreed to keep information secure and confidential) will have access to this information. All emails and newsletters from this site allow you to opt-out of further mailings.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>7. CHANGES TO YOUR PERSONAL INFORMATION</strong></p>\n                                        <p>If you wish to make any changes to the information you provided, please take the following actions: Please enter the website using the account in which you wish to change the information. - Click on &ldquo;user account&rdquo; - Choose the menu &ldquo;change personal information&rdquo; which will be on a menu tab located on the left of your screen - Click on &ldquo;save&rdquo; Or email us at contact@ccdoubleo.com.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>8. LINKS TO THIRD PARTY WEBSITES</strong></p>\n                                        <p>External links may be provided for your convenience, but they are beyond the control of www.ccdoubleo.com and no representation is made as to their content. Use or reliance on any external links and the content thereon provided is at your own risk. When visiting external links you must refer to the privacy policy and terms of use for that external Website.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>9. UNSUBSCRIBE NEWSLETTER</strong></p>\n                                        <p>If you are not willing to receive newsletter from us, you can modify your e-mail subscriptions by unsubscribing to our email lists through various channels on the Website or by unsubscribing through the emails/newsletters that you receive.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>10. PRIVACY CONTACT INFORMATION</strong></p>\n                                        <p>If you have any questions regarding our Privacy Policy, please contact us at: Jaspal Company Limited 1054 Soi Sukhumvit 66/1 Bangchak, Prakanong, 10260 Tel: 02-367-2055-6 Or email us at contact@ccdoubleo.com We reserve the right to make changes to this policy. Any changes to this policy will be posted on the Website.</p>','Terms and Conditions','terms,conditions','Welcome to www.ccdoubleo.com (the \"Website\"), operated by Jaspal Group and its subsidiaries and affiliates. These are the Terms and Conditions (“Terms”) of your agreement with Jaspal Group (“Jaspal”) which apply to all products and/or services purchased by you from the Website. Please read the following Terms and Conditions carefully. If you visit, or continue to browse and use this Website, you are agreeing to comply with and be bound by the Website Terms and Conditions together with our Privacy Policy which govern Jaspal and its use by you in relation to this Website.','2022-03-05 19:50:02','2022-03-05 19:50:02',1),
	(2,'th','ข้อกำหนด และ นโยบาย','ข้อกำหนด-และ-นโยบาย','<p><strong>1. บทนำ</strong></p>\n                                        <p>เหล่านี้เป็นข้อกำหนดและเงื่อนไขของข้อตกลงของเราซึ่งใช้กับการซื้อผลิตภัณฑ์ทั้งหมดของคุณจาก www.ccdoubleo.com ดำเนินการโดย Jaspal Group รวมถึง บริษัท ในเครือและ บริษัท ในเครือที่ให้บริการแก่คุณ (ในที่นี้เรียกว่า เว็บไซต์) ภายใต้ เงื่อนไขต่อไปนี้ โปรดอ่านข้อกำหนดต่อไปนี้อย่างละเอียด หากคุณไม่ยอมรับข้อกำหนดและเงื่อนไขดังต่อไปนี้คุณไม่สามารถเข้าหรือใช้เว็บไซต์นี้ หากคุณยังคงเรียกดูและใช้เว็บไซต์นี้คุณตกลงที่จะปฏิบัติตามและผูกพันตามข้อกำหนดและเงื่อนไขการใช้งานต่อไปนี้ซึ่งรวมถึงนโยบายความเป็นส่วนตัวของเราจะบังคับ Jaspal และการใช้งานเว็บไซต์ของคุณที่เกี่ยวข้องกับเว็บไซต์นี้.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>2. ข้อมูลและรายละเอียดสินค้า</strong></p>\n                                        <p>ในขณะที่มีความพยายามทุกวิถีทางในการอัพเดทข้อมูลที่มีอยู่ในเว็บไซต์นี้ Jaspal หรือบุคคลที่สามหรือข้อมูลหรือผู้ให้บริการเนื้อหาไม่สามารถรับรองหรือรับประกันใด ๆ ไม่ว่าจะโดยชัดแจ้งโดยนัยในกฎหมายหรือสิ่งที่เหลือ ข้อมูลความคิดเห็นข้อมูลการกำหนดราคาข้อมูลการวิจัยข้อมูลและ / หรือเนื้อหาที่มีอยู่ในเว็บไซต์ (รวมถึง แต่ไม่ จำกัด เฉพาะข้อมูลใด ๆ ที่อาจจัดทำโดยบุคคลที่สามหรือข้อมูลหรือผู้ให้บริการเนื้อหา) และจะไม่ผูกพันใด ๆ ลักษณะโดยข้อมูลใด ๆ ที่มีอยู่ในเว็บไซต์.</p>\n                                        <p>Jaspal ขอสงวนสิทธิ์ในการเปลี่ยนแปลงหรือยกเลิกโดยไม่ต้องแจ้งให้ทราบล่วงหน้าลักษณะหรือคุณสมบัติของเว็บไซต์นี้ ไม่มีข้อมูลใดที่จะถูกตีความว่าเป็นคำแนะนำและข้อมูลที่นำเสนอเพื่อจุดประสงค์ในการให้ข้อมูลเท่านั้นและไม่ได้มีวัตถุประสงค์เพื่อการค้า คุณและ บริษัท ของคุณต้องพึ่งพาข้อมูลที่มีอยู่ในเว็บไซต์นี้ด้วยความเสี่ยงของคุณเอง หากคุณพบข้อผิดพลาดหรือการละเว้นที่เว็บไซต์นี้โปรดแจ้งให้เราทราบ.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>3. เครื่องหมายการค้าและลิขสิทธิ์</strong></p>\n                                        <p>เครื่องหมายการค้าชื่อโลโก้และเครื่องหมายบริการ (รวมเรียกว่า เครื่องหมายการค้า) ที่ปรากฏบนเว็บไซต์นี้เป็นเครื่องหมายการค้าจดทะเบียนและไม่จดทะเบียนของ Jaspal ไม่มีสิ่งใดในเว็บไซต์นี้ที่ถูกตีความว่าเป็นการให้อนุญาตหรือสิทธิ์ในการใช้เครื่องหมายการค้าใด ๆ โดยไม่ได้รับอนุญาตเป็นลายลักษณ์อักษรจาก Jaspal.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>4. ลิงค์จากภายนอก</strong></p>\n                                        <p>อาจมีลิงก์ภายนอกเพื่อความสะดวกของคุณ แต่มันอยู่นอกเหนือการควบคุมของ www.ccdoubleo.com และไม่มีการแสดงเนื้อหาของพวกเขา การใช้หรือการอ้างอิงลิงค์ภายนอกใด ๆ และเนื้อหาที่ให้ไว้นั้นเป็นความเสี่ยงของคุณเอง เมื่อเยี่ยมชมลิงค์ภายนอกคุณต้องอ้างถึงข้อกำหนดและเงื่อนไขการใช้งานสำหรับเว็บไซต์ภายนอกนั้น ห้ามสร้างลิงก์ไฮเปอร์เท็กซ์จากเว็บไซต์ใด ๆ ที่ควบคุมโดยคุณหรืออย่างอื่นไปยังเว็บไซต์นี้โดยไม่ได้รับอนุญาตเป็นลายลักษณ์อักษรล่วงหน้าจาก Jaspal กรุณาติดต่อเราหากคุณต้องการที่จะเชื่อมโยงไปยังเว็บไซต์นี้หรือต้องการที่จะขอลิงค์ไปยังเว็บไซต์ของคุณ.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>5. ฟอรัมสาธารณะและข้อมูลที่ส่งโดยผู้ใช้</strong></p>\n                                        <p>Jaspal จะไม่รับผิดชอบต่อเนื้อหาใด ๆ ที่ส่งไปยังพื้นที่สาธารณะโดยคุณ (ซึ่งรวมถึงกระดานข่าวหน้าโฮสต์ห้องแชทหรือพื้นที่สาธารณะอื่น ๆ ที่พบในเว็บไซต์เนื้อหาใด ๆ (ไม่ว่าจะส่งโดยคุณหรือผู้ใช้รายอื่น) รับรองตรวจสอบหรืออนุมัติโดย Jaspal เราขอสงวนสิทธิ์ในการลบเนื้อหาใด ๆ ที่ส่งหรือโพสต์โดยคุณในพื้นที่สาธารณะโดยไม่ต้องแจ้งให้คุณทราบหากมีการรับรู้และพิจารณาตามดุลยพินิจของคุณ แต่เพียงผู้เดียว โอกาสที่คุณอาจรวมถึง แต่ไม่ จำกัด เพียง</p>\n                                        <p>5.1 ทำให้เสียชื่อเสียงล่วงละเมิดก่อกวนคุกคามหรือละเมิดสิทธิ์ของผู้ใช้รายอื่นหรือบุคคลที่สามใด ๆ;</p>\n                                        <p>5.2 เผยแพร่โพสต์แจกจ่ายหรือเผยแพร่เนื้อหาหรือข้อมูลที่ทำให้เสื่อมเสียชื่อเสียงลามกอนาจารหรือไม่ชอบด้วยกฎหมาย;</p>\n                                        <p>5.3 โพสต์หรืออัปโหลดไฟล์ที่มีไวรัสไฟล์ที่เสียหายหรือซอฟต์แวร์หรือโปรแกรมอื่นที่คล้ายคลึงกันซึ่งอาจทำให้การทำงานของ Jaspal และ / หรือระบบคอมพิวเตอร์ของบุคคลที่สามและ / หรือเครือข่าย;</p>\n                                        <p>5.4 ละเมิดลิขสิทธิ์เครื่องหมายการค้าใด ๆ ที่เกี่ยวข้องในประเทศไทยหรือกฎหมายระหว่างประเทศหรือสิทธิในทรัพย์สินทางปัญญาของ Jaspal หรือบุคคลที่สามอื่น ๆ;</p>\n                                        <p>5.5 ส่งเนื้อหาที่มีเนื้อหาด้านการตลาดหรือส่งเสริมการขายซึ่งมีวัตถุประสงค์เพื่อชักชวนธุรกิจ.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>6. การเป็นสมาชิก</strong></p>\n                                        <p>เว็บไซต์ Jaspal ไม่สามารถให้บริการแก่ผู้ใช้ที่มีอายุต่ำกว่า 18 ปีซึ่งอยู่นอกเป้าหมายด้านประชากรศาสตร์หรือแก่สมาชิกใด ๆ ที่ Jaspal ห้ามไว้ก่อนหน้านี้ ผู้ใช้จะได้รับอนุญาตเพียงหนึ่งบัญชีที่ใช้งานอยู่ การตกลงเงื่อนไขเหล่านี้อาจทำให้บัญชีถูกยกเลิก.</p>\n                                        <p>Jaspal ในบางโอกาสจะเสนอโปรโมชั่นสำหรับสมาชิก ในการเชื่อมต่อกับโปรโมชั่นเหล่านี้ผู้ใช้ที่ได้รับรางวัล (รางวัลเครดิตบัตรของขวัญคูปองหรือผลประโยชน์อื่น ๆ ) จาก Jaspal ผ่านการใช้หลายบัญชีที่อยู่อีเมลข้อมูลปลอมหรือการกระทำที่หลอกลวงจะต้องริบรางวัลใด ๆ ที่ได้รับผ่านกิจกรรมดังกล่าว และอาจต้องรับผิดทั้งทางแพ่งและ / หรือทางอาญาตามกฎหมาย.</p>\n                                        <p>ในการใช้เว็บไซต์ Jaspal คุณรับทราบว่าคุณมีอายุถึงเกณฑ์ตามกฎหมายในการทำสัญญาที่มีผลผูกพันและไม่ใช่บุคคลที่ถูกห้ามไม่ให้รับบริการภายใต้กฎหมายของประเทศไทยหรือเขตอำนาจศาลอื่นที่เกี่ยวข้อง คุณตกลงที่จะให้ข้อมูลที่ถูกต้องเกี่ยวกับตัวคุณเมื่อเว็บไซต์ Jaspal ร้องขอ หากคุณให้ข้อมูลใด ๆ ที่ไม่เป็นความจริงไม่ถูกต้องหรือไม่สมบูรณ์ Jaspal มีสิทธิ์ในการระงับหรือยกเลิกบัญชีของคุณและปฏิเสธการใช้บริการในอนาคต คุณมีความรับผิดชอบในการรักษาความลับของบัญชีและรหัสผ่านของคุณและยอมรับทุกความรับผิดชอบต่อกิจกรรมที่เกิดขึ้นภายใต้บัญชีของคุณ.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>7. การยกเลิกเนื่องจากข้อผิดพลาด</strong></p>\n                                        <p>Jaspal มีสิทธิ์ที่จะยกเลิกคำสั่งซื้อได้ตลอดเวลาเนื่องจากข้อผิดพลาดในการพิมพ์หรือที่ไม่คาดฝันส่งผลให้ผลิตภัณฑ์ในเว็บไซต์ที่มีการระบุรายการไม่ถูกต้อง (มีราคาหรือคำอธิบายที่ผิด ฯลฯ ) ในกรณีที่มีการยกเลิกและการชำระเงินสำหรับคำสั่งซื้อที่ได้รับ Jaspal จะคืนเงินเต็มจำนวนสำหรับผลิตภัณฑ์ตามจำนวนที่มีปัญหา.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>8. การใช้งานเฉพาะ</strong></p>\n                                        <p>นอกจากนี้คุณตกลงที่จะไม่ใช้เว็บไซต์นี้เพื่อส่งหรือโพสต์ข้อความหรือเนื้อหาใด ๆ ที่ผิดกฎหมาย, ล่วงละเมิด, หมิ่นประมาท, ดูหมิ่นเหยียดหยาม, ไม่เหมาะสม, ข่มขู่, เป็นอันตราย, หยาบคาย, หยาบคาย, หยาบคาย, หยาบคายทางเพศ และคุณขอชดใช้ค่าเสียหายจาก Jaspal ต่อการสูญเสียความรับผิดความเสียหายหรือค่าใช้จ่ายใด ๆ ที่ Jaspal หรือบุคคลที่สามอาจประสบซึ่งเกิดจากหรือเนื่องมาจากการใช้งานเว็บไซต์ของคุณเพื่อส่งหรือโพสต์ข้อความใด ๆ หรือวัสดุ.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>9. การรับประกัน</strong></p>\n                                        <p>Jaspal ไม่รับประกันการรับรองแถลงการณ์หรือการรับประกัน (ไม่ว่าโดยชัดแจ้งโดยนัยทางกฎหมายหรือส่วนที่เหลือ) เกี่ยวกับเว็บไซต์ข้อมูลที่มีอยู่ในเว็บไซต์คุณหรือข้อมูลส่วนบุคคลของ บริษัท หรือวัสดุและข้อมูลที่ส่งผ่านระบบของเรา.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>10. คำปฏิเสธ</strong></p>\n                                        <p>Jaspal จะไม่รับผิดชอบและรับผิดชอบต่อความสูญเสียความรับผิดความเสียหายใด ๆ (ไม่ว่าทางตรงทางอ้อมหรือผลสืบเนื่อง) การบาดเจ็บส่วนบุคคลหรือค่าใช้จ่ายในลักษณะใด ๆ ก็ตามที่คุณหรือบุคคลที่สามอาจได้รับความเดือดร้อน (รวมถึง บริษัท ของคุณ) นอกเหนือจากผลลัพธ์หรือซึ่งอาจเป็นผลโดยตรงหรือโดยอ้อมต่อการเข้าถึงและการใช้งานเว็บไซต์ของคุณข้อมูลใด ๆ ที่มีอยู่ในเว็บไซต์คุณหรือข้อมูลส่วนบุคคลของ บริษัท ของคุณหรือวัสดุและข้อมูลที่ส่งผ่านระบบของเรา โดยเฉพาะอย่างยิ่ง Jaspal หรือบุคคลที่สามหรือข้อมูลหรือผู้ให้บริการเนื้อหาจะไม่รับผิดชอบใด ๆ ต่อคุณหรือกับบุคคลอื่น บริษัท หรือ บริษัท ใด ๆ สำหรับการสูญเสียความรับผิดความเสียหาย (ไม่ว่าโดยตรงหรือเป็นผลสืบเนื่อง) การบาดเจ็บหรือค่าใช้จ่าย ไม่ว่าในลักษณะใด ๆ ก็ตามที่เกิดขึ้นจากความล่าช้าความไม่ถูกต้องข้อผิดพลาดหรือการละเว้นข้อมูลราคาหุ้นหรือการส่งผ่านข้อมูลหรือการกระทำใด ๆ ที่เกิดขึ้นโดยอาศัยเหตุผลหรือด้วยเหตุนี้หรือด้วยเหตุผลที่ไม่ใช่ประสิทธิภาพหรือขัดจังหวะ.</p>\n                                        <p>www.ccdoubleo.com เครดิตผู้อ้างอิงและโปรแกรมรางวัลและสิทธิประโยชน์นั้นขึ้นอยู่กับดุลยพินิจของ Jaspal Jaspal มีสิทธิ์ในการแก้ไขหรือยกเลิกบริการชั่วคราวหรือถาวรที่ให้บริการรวมถึงระดับคะแนนทั้งหมดหรือบางส่วนด้วยเหตุผลใดก็ตามขึ้นอยู่กับดุลยพินิจของสมาชิกโดยไม่ต้องแจ้งให้ทราบล่วงหน้า Jaspal อาจเพิกถอน จำกัด หรือปรับเปลี่ยนเหนือสิ่งอื่นใด เพิ่มและลดเครดิตที่จำเป็นสำหรับข้อเสนอพิเศษใด ๆ ที่เกี่ยวข้องกับเครดิตผู้อ้างอิงและโปรแกรมรางวัล โดยการเป็นสมาชิกของ www.ccdoubleo.com คุณยอมรับว่า www.ccdoubleo.com เครดิตโปรแกรมการอ้างอิงและรางวัลจะไม่รับผิดชอบต่อคุณหรือบุคคลที่สามใด ๆ สำหรับการเปลี่ยนแปลงหรือการหยุดโปรแกรมดังกล่าว.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>11. การป้องกัน</strong></p>\n                                        <p>ผู้ใช้ตกลงที่จะชดใช้ค่าเสียหายและไม่ถือ Jaspal (และพนักงาน, กรรมการ, ซัพพลายเออร์, บริษัท ย่อย, กิจการร่วมค้าและพันธมิตรทางกฎหมาย) จากการเรียกร้องหรือความต้องการใด ๆ รวมถึงค่าธรรมเนียมทนายความที่สมเหตุสมผลจากและต่อการสูญเสียค่าใช้จ่ายความเสียหายและค่าใช้จ่ายที่เกิดจากการละเมิดข้อกำหนดและเงื่อนไขเหล่านี้หรือกิจกรรมใด ๆ ที่เกี่ยวข้องกับบัญชีสมาชิกของผู้ใช้เนื่องจากการกระทำที่ประมาทเลินเล่อหรือผิดกฎหมาย.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>12. การใช้งานเว็บไซต์</strong></p>\n                                        <p>Jaspal ไม่รับประกันหรือรับรองว่าข้อมูลในเว็บไซต์นั้นเหมาะสมสำหรับใช้ในเขตอำนาจศาลใด ๆ (นอกเหนือจากราชอาณาจักรไทย) ในการเข้าถึงเว็บไซต์คุณรับรองและรับรองต่อ Jaspal ว่าคุณมีสิทธิ์ตามกฎหมายที่จะทำเช่นนั้นและเพื่อใช้ประโยชน์จากข้อมูลที่มีให้ผ่านทางเว็บไซต์.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>13. ทั่วไป</strong></p>\n                                        <p>13.1 ข้อตกลงทั้งหมด . ข้อกำหนดและเงื่อนไขของเว็บไซต์เหล่านี้ถือเป็นการบันทึกข้อตกลงระหว่างคุณกับ Jaspal แต่เพียงผู้เดียวซึ่งเกี่ยวข้องกับการใช้งานเว็บไซต์ของคุณ ทั้งคุณและ Jaspal จะไม่ผูกพันกับการเป็นตัวแทนการรับประกันหรือสัญญาที่ไม่ได้ระบุไว้ ข้อกำหนดและเงื่อนไขของเว็บไซต์เหล่านี้มีผลแทนที่และแทนที่ข้อผูกพันการรับรองหรือการเป็นตัวแทนก่อนหน้านี้ไม่ว่าจะเป็นลายลักษณ์อักษรหรือด้วยวาจาระหว่างคุณและ Jaspal เกี่ยวกับการใช้งานเว็บไซต์ของคุณ.</p>\n                                        <p>13.2 การเปลี่ยนแปลง . Jaspal อาจแก้ไขข้อกำหนดและเงื่อนไขนโยบายหรือประกาศที่เกี่ยวข้องได้ตลอดเวลา คุณรับทราบว่าโดยการเยี่ยมชมเว็บไซต์เป็นครั้งคราวคุณจะผูกพันกับเวอร์ชันปัจจุบันของข้อกำหนดและเงื่อนไขที่เกี่ยวข้อง (เวอร์ชันปัจจุบัน) และเว้นแต่จะระบุไว้ในเวอร์ชันปัจจุบันเวอร์ชั่นก่อนหน้านี้ทั้งหมดจะถูกแทนที่โดย รุ่นปัจจุบัน คุณจะต้องรับผิดชอบในการตรวจสอบเวอร์ชันปัจจุบันทุกครั้งที่คุณเยี่ยมชมเว็บไซต์.</p>\n                                        <p>13.3 ขัดแย้ง . ในกรณีที่ความขัดแย้งหรือความขัดแย้งปรากฏขึ้นระหว่างบทบัญญัติของข้อกำหนดและเงื่อนไขของเว็บไซต์เหล่านี้และข้อกำหนดและเงื่อนไขนโยบายหรือประกาศอื่น ๆ ที่เกี่ยวข้องข้อกำหนดและเงื่อนไขนโยบายหรือประกาศอื่น ๆ ที่เกี่ยวข้องซึ่งเกี่ยวข้องกับส่วนหรือโมดูลของเว็บไซต์โดยเฉพาะ เหนือกว่าด้วยการใช้งานส่วนหรือโมดูลที่เกี่ยวข้องของเว็บไซต์ของคุณ.</p>\n                                        <p>13.4 การสละสิทธิ . ไม่มีการปล่อยตัวหรือขยายเวลาที่คุณหรือ Jaspal อาจมอบให้กับผู้อื่นจะเป็นการสละสิทธิ์หรือไม่ว่าจะตามกฎหมายหรือมิฉะนั้นให้ จำกัด สิทธิ์ที่มีอยู่หรือในอนาคตของผู้อนุญาตในแง่นี้บันทึกไว้ในเหตุการณ์หรือ ขอบเขตที่ผู้อนุญาตได้ลงนามในเอกสารเป็นลายลักษณ์อักษรอย่างชัดแจ้งการสละสิทธิ์หรือ จำกัด สิทธิดังกล่าว.</p>\n                                        <p>13.5 การยอมยกให้. Jaspal shall be entitled to cede, assign and delegate all or any of its rights and obligations in terms of any relevant terms and conditions, policies and notices to any third party.</p>\n                                        <p>13.6 การเป็นโมฆะ. บทบัญญัติทั้งหมดของข้อกำหนดและเงื่อนไขนโยบายและประกาศใด ๆ ที่เกี่ยวข้องแม้จะมีลักษณะที่จัดกลุ่มเข้าด้วยกันหรือเชื่อมโยงทางไวยากรณ์สามารถแยกจากกันได้ บทบัญญัติใด ๆ ของข้อกำหนดและเงื่อนไขนโยบายและประกาศที่เกี่ยวข้องหรือกลายเป็นไม่มีผลบังคับใช้ในเขตอำนาจศาลใด ๆ ไม่ว่าจะเนื่องมาจากความว่างเปล่าความไม่ถูกกฎหมายความผิดกฏหมายหรือด้วยเหตุผลใดก็ตามก็ตามในเขตอำนาจศาลดังกล่าวเท่านั้น มันไม่มีผลบังคับใช้ดังนั้นจะถือว่าเป็นโปรที่ไม่ใช่สคริปต์และบทบัญญัติที่เหลืออยู่ของข้อกำหนดและเงื่อนไขนโยบายและประกาศใด ๆ ที่เกี่ยวข้องจะยังคงมีผลบังคับใช้อย่างเต็มที่และมีผลบังคับใช้.</p>\n                                        <p>13.7 กฎหมายที่ใช้บังคับ. ข้อกำหนดและเงื่อนไขนโยบายและประกาศที่เกี่ยวข้องใด ๆ จะอยู่ภายใต้และตีความตามกฎหมายของประเทศไทยโดยไม่ส่งผลกระทบต่อหลักการของความขัดแย้งทางกฎหมาย คุณยินยอมในเขตอำนาจศาลพิเศษของศาลสูงแห่งประเทศไทยในส่วนที่เกี่ยวกับข้อพิพาทใด ๆ ที่เกิดขึ้นเกี่ยวกับเว็บไซต์หรือข้อกำหนดและเงื่อนไขนโยบายและประกาศหรือสิ่งใด ๆ ที่เกี่ยวข้องหรือเกี่ยวข้องกับหรือเกี่ยวข้อง.</p>\n                                        <p>13.8 ความเห็นหรือคำถาม . หากคุณมีคำถามความคิดเห็นหรือข้อกังวลใด ๆ ที่เกิดขึ้นจากเว็บไซต์นโยบายความเป็นส่วนตัวหรือข้อกำหนดและเงื่อนไขนโยบายและประกาศหรือวิธีการที่เราจัดการกับข้อมูลส่วนบุคคลของคุณโปรดติดต่อเรา.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>14. การสิ้นสุด</strong></p>\n                                        <p>ข้อกำหนดและเงื่อนไขเหล่านี้มีผลบังคับใช้กับคุณเมื่อคุณเข้าสู่เว็บไซต์และ / หรือดำเนินการลงทะเบียนหรือช็อปปิ้งให้เสร็จสิ้น ข้อกำหนดและเงื่อนไขเหล่านี้หรือหนึ่งในนั้นอาจถูกแก้ไขหรือยกเลิกโดย Jaspal โดยไม่ต้องแจ้งให้ทราบล่วงหน้าไม่ว่าด้วยเหตุผลใด ๆ บทบัญญัติที่เกี่ยวข้องกับลิขสิทธิ์และเครื่องหมายการค้าการจำกัดความรับผิดการเรียกร้องข้อจำกัดความรับผิดการชดใช้ค่าเสียหายกฎหมายที่บังคับใช้การอนุญาโตตุลาการและทั่วไป.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>15. การยกเลิกและการส่งคืน</strong></p>\n                                        <p>คำสั่งซื้อสามารถยกเลิกได้หากผลิตภัณฑ์ยังไม่ได้ส่งมอบ เมื่อผลิตภัณฑ์ถูกส่งไปยังบัญชีผู้ใช้พวกเขาจะไม่ได้รับอนุญาตให้ยกเลิกอีกต่อไป ผลตอบแทนใด ๆ หลังจากนั้นจะได้รับการจัดการเป็นกรณีไป ด้วยเหตุผลเราจะทำสิ่งที่เราสามารถทำได้เพื่อให้ลูกค้าพึงพอใจ หากไม่มีสิ่งผิดปกติในการซื้อเรามักจะไม่สามารถคืนเงินให้ได้.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>16. เครดิต</strong></p>\n                                        <p>โปรแกรมการอ้างอิงเครดิตและรางวัลและผลประโยชน์นั้นจะขึ้นอยู่กับดุลยพินิจของ Jaspal Jaspal มีสิทธิ์ในการแก้ไขหรือยกเลิกบริการชั่วคราวหรือถาวรที่ให้บริการรวมถึงระดับคะแนนทั้งหมดหรือบางส่วนด้วยเหตุผลใดก็ตามขึ้นอยู่กับดุลยพินิจของสมาชิกโดยไม่ต้องแจ้งให้ทราบล่วงหน้า Jaspal อาจเพิกถอน จำกัด หรือปรับเปลี่ยนเหนือสิ่งอื่นใด เพิ่มและลดเครดิตที่จำเป็นสำหรับข้อเสนอพิเศษใด ๆ ที่เกี่ยวข้องกับเครดิตผู้อ้างอิงและโปรแกรมรางวัล โดยการเป็นสมาชิกของ www.ccdoubleo.com คุณยอมรับว่าโปรแกรมการอ้างอิงเครดิตและรางวัลจะไม่รับผิดชอบต่อคุณหรือบุคคลที่สามใด ๆ สำหรับการแก้ไขหรือการหยุดโปรแกรมดังกล่าว.</p>\n                                        <p>&nbsp;</p>\n                                        <p><strong>17. ความเป็นส่วนตัว</strong></p>\n                                        <p>สำหรับบริการจัดส่งเราตระหนักถึงหน้าที่ของเราในการเก็บข้อมูลของลูกค้าเป็นความลับ นอกเหนือจากหน้าที่ของเราในการรักษาความลับให้กับลูกค้าเราจะต้องปฏิบัติตามกฎหมายข้อมูลส่วนบุคคล (ความเป็นส่วนตัว) (กฎหมาย) อย่างเต็มที่ในการเก็บรักษาและใช้ข้อมูลส่วนบุคคลของลูกค้า โดยเฉพาะอย่างยิ่งเราปฏิบัติตามหลักการดังต่อไปนี้บันทึกเป็นอย่างอื่นตกลงโดยลูกค้าอย่างเหมาะสม:</p>\n                                        <p>17.1 การรวบรวมข้อมูลส่วนบุคคลจากลูกค้าจะใช้เพื่อจุดประสงค์ที่เกี่ยวข้องกับการให้บริการโลจิสติกส์หรือบริการที่เกี่ยวข้อง;</p>\n                                        <p>17.2 ทุกขั้นตอนการปฏิบัติจะถูกนำไปใช้เพื่อให้แน่ใจว่าข้อมูลส่วนบุคคลนั้นถูกต้องและจะไม่ถูกเก็บไว้นานเกินความจำเป็นหรือจะถูกทำลายตามระยะเวลาการเก็บรักษาภายในของเรา;</p>\n                                        <p>17.3 ข้อมูลส่วนบุคคลจะไม่ถูกนำไปใช้เพื่อจุดประสงค์อื่นใดนอกเหนือจากข้อมูลที่จะถูกนำไปใช้ในเวลาที่รวบรวมหรือวัตถุประสงค์ที่เกี่ยวข้องโดยตรง</p>\n                                        <p>17.4 ข้อมูลส่วนบุคคลจะได้รับการปกป้องจากการเข้าถึงการประมวลผลหรือลบโดยไม่ได้รับอนุญาต;</p>\n                                        <p>17.5 ลูกค้าจะมีสิทธิ์ในการแก้ไขข้อมูลส่วนบุคคลของพวกเขาที่เราเก็บไว้และการร้องขอของลูกค้าสำหรับการเข้าถึงหรือการแก้ไขจะได้รับการจัดการตามกฎหมาย.</p>','ข้อกำหนด และ นโยบาย','ข้อกำหนด,นโยบาย','เหล่านี้เป็นข้อกำหนดและเงื่อนไขของข้อตกลงของเราซึ่งใช้กับการซื้อผลิตภัณฑ์ทั้งหมดของคุณจาก www.ccdoubleo.com ดำเนินการโดย Jaspal Group รวมถึง บริษัท ในเครือและ บริษัท ในเครือที่ให้บริการแก่คุณ (ในที่นี้เรียกว่า \"เว็บไซต์\") ภายใต้ เงื่อนไขต่อไปนี้ โปรดอ่านข้อกำหนดต่อไปนี้อย่างละเอียด หากคุณไม่ยอมรับข้อกำหนดและเงื่อนไขดังต่อไปนี้คุณไม่สามารถเข้าหรือใช้เว็บไซต์นี้ หากคุณยังคงเรียกดูและใช้เว็บไซต์นี้คุณตกลงที่จะปฏิบัติตามและผูกพันตามข้อกำหนดและเงื่อนไขการใช้งานต่อไปนี้ซึ่งรวมถึงนโยบายความเป็นส่วนตัวของเราจะบังคับ Jaspal และการใช้งานเว็บไซต์ของคุณที่เกี่ยวข้องกับเว็บไซต์นี้.','2022-03-05 19:50:02','2022-03-05 19:50:02',1),
	(3,'en','Delivery and Returns','delivery-and-returns','<h2><strong>PAYMENT METHODS</strong></h2>\n                                            <ul>\n                                            <li>You can pay via Debit cards, Master cards, Visa cards, or American Express cards. (If your card is rejected please contact your bank for clarification)&nbsp;</li>\n                                            <li>Cash on Delivery (COD) can be done by making payment directly with a delivery staff.&nbsp;</li>\n                                            </ul>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>PRODUCT DELIVERY</strong></h2>\n                                            <ul>\n                                            <li>Product delivery within Bangkok and vicinity will take 2-3 business days and 3-5 business days for other provinces (during sale and promotion period delivery might take longer than expected). Please note that it may take longer in some areas, but our team will try our best to deliver the products as soon as possible.&nbsp;</li>\n                                            <li>International Shipping is available.</li>\n                                            <li>Delivery fee is 80 Baht for Standard Delivery in Thailand and free for purchases more than 1,500 Baht.</li>\n                                            <li>International Delivery Fee is 800 Baht</li>\n                                            <li>You can track your order by clicking on the link provided in your purchase confirmation email.&nbsp;</li>\n                                            </ul>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>RETURN POLICY</strong></h2>\n                                            <ul>\n                                            <li>Return products must be in good condition with price tag on and with the receipt. It should not be worn, washed, or altered.&nbsp;</li>\n                                            <li>Products can be returned no longer than 14 days after the delivering date.&nbsp;</li>\n                                            <li>Customers must receive the products before requesting for refunds.&nbsp;</li>\n                                            <li>Products with discount and/or promotion cannot be exchanged or returned.&nbsp;</li>\n                                            <li>Please submit the Return Request Form on the website, our customer service representative will contact you to verify the return address,&nbsp;our courier will then contact you to arrange the pick-up of the item(s).</li>\n                                            <li>Once we received and confirmed the returned products, our customer service representative will contact you back to verify and proceed in giving you your money back within 10 days.&nbsp;</li>\n                                            <li>For purchases done via credit cards, the money will be wired back into your account which may take up to 30 business days depending on your bank.&nbsp;</li>\n                                            <li>For purchases done via COD, you will receive store credits instead of cash for your next purchases.&nbsp;</li>\n                                            <li>If the amount is incorrect, please contact our customer service department so we can assist you as soon as possible.&nbsp;</li>\n                                            </ul>\n                                            <p>* www.ccdoubleo.com reserves the rights to decline any return requests that exceed the set timeframe or if the products are not in the same condition as the day it was delivered.&nbsp;</p>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>EXCHANGE</strong></h2>\n                                            <p>You cannot exchange products, but you may return the products and make new purchases. Please kindly see our return policy for more details.&nbsp;</p>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>DEFECTIVE PRODUCT</strong></h2>\n                                            <p>For defective or damaged products please contact our customer service department at 02-367-2055 , 02-367-2056 We will give you store credits for mailing expenses. Please attach the mailing receipt for us. (Only apply for cases that products are confirmed to be defected or damaged)&nbsp;</p>\n                                            <p>*This does not apply to products that are damaged after usage.&nbsp;</p>','Delivery and Returns','delivery,returns','You can pay via Debit cards, Master cards, Visa cards, or American Express cards. (If your card is rejected please contact your bank for clarification)','2022-03-05 19:50:02','2022-03-05 19:50:02',2),
	(4,'th','การจัดส่ง และ การคืนเงิน','การจัดส่ง-และ-การคืนเงิน','<h2><strong>การชำระเงิน</strong></h2>\n                                            <ul>\n                                            <li>รับชำระเงินผ่านบัตรเครดิต&nbsp;หรือบัตรเดบิต&nbsp;Visa, Master card, American Express (กรณีบัตรถูกปฏิเสธ&nbsp;กรุณาติดต่อธนาคารผู้ให้บริการบัตรเครดิตของท่าน)</li>\n                                            <li>การชำระเงินปลายทาง&nbsp;(COD)&nbsp;&nbsp;สามารถชำระค่าสินค้าโดยตรงให้กับพนักงานจัดส่งเมื่อได้รับสินค้า</li>\n                                            </ul>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>การจัดส่งสินค้า</strong></h2>\n                                            <ul>\n                                            <li>จัดส่งสินค้าทั้งในประเทศและต่างประเทศ</li>\n                                            <li>ระยะเวลาการจัดส่งสินค้าถึงมือคุณ 2 - 3 วันทำการในเขตกรุงเทพและปริมณฑล และ 3 - 5 วันทำการในต่างจังหวัด (สำหรับช่วงเวลาการจัดโปรโมชั่นอาจใช้ระยะเวลาการจัดส่งที่มากขึ้น) โดยในบางพื้นที่อาจใช้ระยะเวลาการจัดส่งที่เกินกว่าเวลาที่กำหนด&nbsp;&nbsp;อย่างไรก็ตามทีมงานของเราจะพยายามจัดส่งสินค้าถึงมือคุณอย่างเร็วที่สุด&nbsp;</li>\n                                            <li>ค่าบริการจัดส่งแบบปกติในประเทศ&nbsp;80 บาท&nbsp;และจัดส่งฟรี! เมื่อสั่งสินค้าตั้งแต่ 1,500 บาทขึ้นไป</li>\n                                            <li>ค่าบริการจัดส่งแบบปกติไปต่างประเทศ 800 บาท</li>\n                                            <li>ติดตามสถานะการจัดส่งได้ที่&nbsp;Link&nbsp;จากอีเมล&nbsp;ยืนยันการสั่งสินค้า</li>\n                                            </ul>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>นโยบายการส่งคืนสินค้า</strong></h2>\n                                            <ul>\n                                            <li>สินค้าต้องอยู่ในสภาพที่สมบูรณ์ โดยยังมีป้ายสินค้าติดอยู่และรายการต้องตรงกับใบจัดส่งสินค้า&nbsp;โดยสินค้าไม่เคยสวมใส่ ซักหรือดัดแปลงใดๆ</li>\n                                            <li>สามารถคืนสินค้าได้ภายใน 14 วัน นับจากวันที่จัดส่งสินค้า</li>\n                                            <li>ลูกค้าจำเป็นต้องได้รับสินค้าก่อนที่จะทำรายการคืนสินค้าและขอคืนเงิน</li>\n                                            <li>สินค้าในหมวดลดราคาและสินค้าที่จัดรายการส่งเสริมการขายไม่สามารถเปลี่ยนหรือคืนได้</li>\n                                            <li>โปรดกรอกแบบฟอร์มขอคืนสินค้าบนเวบไซต์ และ ผู้ให้บริการจัดส่งของเราจะติดต่อเพื่อเข้ารับสินค้าคืน</li>\n                                            <li>เมื่อทางเราได้รับสินค้าและอนุมัติรายการแล้ว ฝ่ายบริการลูกค้าจะทำการติดต่อคุณเพื่อยืนยันรายการที่อนุมัติ และดำเนินการขอคืนเงินค่าสินค้าภายใน 10 วัน&nbsp;</li>\n                                            <li>สำหรับการทำรายการผ่านบัตรเครดิต จะได้รับการโอนเงินคืนกลับไปยังวิธีการชำระเงินเดิม อาจใช้เวลาถึง 30 วันทำการ ในการปรากฏเงินในบัญชีของคุณขึ้นอยู่กับรอบบิลของแต่ละธนาคาร&nbsp;</li>\n                                            <li>สำหรับการซื้อสินค้าที่ชำระเงินปลายทาง (COD) จะได้รับการคืนเป็นรหัสเครดิตแทนเงินสดเพื่อใช้ทำรายการซื้อสินค้าในครั้งถัดไป&nbsp;</li>\n                                            <li>หากยอดเงินคืนไม่ถูกต้อง กรุณาติดต่อฝ่ายบริการลูกค้าของเรา โดยเราจะพยายามแก้ปัญหาให้โดยเร็วที่สุด</li>\n                                            </ul>\n                                            <p>* www.ccdoubleo.com ขอสงวนสิทธิ์ในการปฏิเสธการรับคืนสินค้าที่เกินกว่าระยะเวลาที่กำหนด หรือสินค้าที่ไม่ได้อยู่ในสภาพเดียวกับที่ได้จัดส่ง</p>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>การเปลี่ยนสินค้า</strong></h2>\n                                            <p>ไม่สามารถเปลี่ยนสินค้าได้ แต่คุณสามารถทำตามขั้นตอนการคืนสินค้าของเราและซื้อสินค้าที่คุณต้องการใหม่ โปรดดูนโยบายการคืนสินค้าของเรา</p>\n                                            <p>&nbsp;</p>\n                                            <h2><strong>กรณีสินค้ามีตำหนิ</strong></h2>\n                                            <p>หากคุณพบว่าสินค้ามีตำหนิ หรือชำรุด กรุณาติดต่อฝ่ายบริการลูกค้าของเราที่เบอร์ 02-367-2055 , 02-367-2056 โดยค่าจัดส่งสินค้าถึงเราจะถูกคืนเป็นรหัสเครดิตแทนเงิน เพื่อใช้ทำรายการซื้อสินค้าในครั้งถัดไป โดยแนบหลักฐานค่าใช้จ่ายในการส่งคืนกลับมาหาเรา (ในกรณีสินค้าได้รับการตรวจสอบแล้วว่าเป็นสินค้ามีตำหนิ หรือชำรุดจริง)&nbsp;*สินค้าที่เสียหายอันเป็นผลจากการสวมใส่หรือการใช้งาน ไม่ถือว่าเป็นสินค้ามีตำหนิ&nbsp;</p>','การจัดส่ง และ การคืนเงิน','การจัดส่ง,การคืนเงิน','รับชำระเงินผ่านบัตรเครดิต หรือบัตรเดบิต Visa, Master card, American Express (กรณีบัตรถูกปฏิเสธ กรุณาติดต่อธนาคารผู้ให้บริการบัตรเครดิตของท่าน)','2022-03-05 19:50:02','2022-03-05 19:50:02',2),
	(5,'en','About Us','about-us','<p>Vuexy began its business in the United States in the 80s, by two Marciano brothers\' who lived in Marseilles in the south of France who had a strong passion for the Western way of life in the United States and Pompey. Moving to California in 1977, they began a fashion business focusing on Street Fashion with classic\n                                            American fashion concept through European perspectives that made them famous in the United States. Vuexy quickly became a symbol of a young, sexy and adventurous lifestyle. Throughout the decades Vuexy invited people to dream with its iconic and timeless advertising campaigns that turned unknown faces into famous models. In 2004, the company expanded with a new retail concept for its contemporary collection called Marciano. The Marciano brand offers a fashion-forward collection designed for trend-setting women and men. In 2007, the G by Vuexy retail concept was born, gaining its Southern California aesthetic from the Marciano brothers\' personal passion for the young in California. These days, Vuexy is a truly world-class lifestyle brand with a wide range of clothing and accessories available in more than 80 countries around the world.</p>','About Us','about us','Vuexy began its business in the United States in the 80s, by two Marciano brothers who lived in Marseilles in the south of France who had a strong passion for the Western way of life in the United States and Pompey. Moving to California in 1977','2022-03-05 19:50:02','2022-03-05 19:50:02',3),
	(6,'th','เกี่ยวกับเรา','เกี่ยวกับเรา','<p>Vuexy เริ่มต้นธุรกิจในสหรัฐอเมริกาในช่วงทศวรรษที่ 80 โดยพี่น้อง Marciano สองคนที่อาศัยอยู่ใน Marseilles ทางตอนใต้ของฝรั่งเศสซึ่งหลงใหลในวิถีชีวิตแบบตะวันตกในสหรัฐอเมริกาและ Pompey ย้ายไปแคลิฟอร์เนียในปี 2520 พวกเขาเริ่มธุรกิจแฟชั่นโดยเน้นที่ สตรีทแฟชั่น ด้วยแนวคิดแฟชั่นอเมริกันคลาสสิกผ่านมุมมองของยุโรปที่ทำให้พวกเขาโด่งดังในสหรัฐอเมริกา Vuexy กลายเป็นสัญลักษณ์ของชีวิตวัยรุ่น เซ็กซี่\n                                            และการผจญภัยอย่างรวดเร็ว ตลอดหลายทศวรรษที่ผ่านมา Vuexy      เชิญผู้คนมาฝันด้วยแคมเปญโฆษณาอันโดดเด่นและเหนือกาลเวลาที่เปลี่ยนใบหน้าที่ไม่รู้จักให้กลายเป็นนางแบบที่มีชื่อเสียง ในปี 2547 บริษัทได้ขยายแนวคิดการค้าปลีกแบบใหม่สำหรับคอลเลคชันร่วมสมัยที่เรียกว่า Marciano แบรนด์ Marciano นำเสนอคอลเลกชันแฟชั่นล้ำยุคที่ออกแบบมาสำหรับผู้หญิงและผู้ชายที่นำเทรนด์ ในปี 2550 แนวคิดการค้าปลีก G by Vuexy ถือกำเนิดขึ้นโดยได้รับสุนทรียภาพทางตอนใต้ของแคลิฟอร์เนียจากความหลงใหลส่วนตัวของพี่น้อง Marciano ที่มีต่อคนหนุ่มสาวในแคลิฟอร์เนีย ปัจจุบัน Vuexy เป็นแบรนด์ไลฟ์สไตล์ระดับโลกอย่างแท้จริง โดยมีเสื้อผ้าและเครื่องประดับมากมายในกว่า 80 ประเทศทั่วโลก</p>','เกี่ยวกับเรา','เกี่ยวกับเรา','Vuexy เริ่มต้นธุรกิจในสหรัฐอเมริกาในช่วงทศวรรษที่ 80 โดยพี่น้อง Marciano สองคนที่อาศัยอยู่ใน Marseilles ทางตอนใต้ของฝรั่งเศสซึ่งหลงใหลในวิถีชีวิตแบบตะวันตกในสหรัฐอเมริกาและ Pompey ย้ายไปแคลิฟอร์เนียในปี 2520','2022-03-05 19:50:02','2022-03-05 19:50:02',3);

/*!40000 ALTER TABLE `information_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(1,'2014_10_12_000000_create_users_table',1),
	(2,'2014_10_12_100000_create_password_resets_table',1),
	(3,'2019_08_19_000000_create_failed_jobs_table',1),
	(4,'2021_09_04_112508_create_modules_table',1),
	(5,'2021_09_04_112526_create_permissions_table',1),
	(6,'2021_09_04_130849_create_user_permission_table',1),
	(7,'2021_09_09_014506_create_user_verifies_table',1),
	(8,'2021_09_16_180451_create_filters_table',1),
	(9,'2021_09_16_180726_create_filter_locales_table',1),
	(10,'2021_10_03_214548_create_categories_table',1),
	(11,'2021_10_03_214633_create_category_locales_table',1),
	(12,'2021_10_04_194821_create_filter_category_table',1),
	(13,'2021_10_29_115849_create_products_table',1),
	(14,'2021_10_29_115908_create_product_locales_table',1),
	(15,'2021_10_29_115958_create_product_images_table',1),
	(16,'2021_10_30_223828_create_category_product_table',1),
	(17,'2021_10_30_223843_create_filter_product_table',1),
	(18,'2021_11_10_094654_create_slideshows_table',1),
	(19,'2021_11_10_211344_create_slideshow_locales_table',1),
	(20,'2021_11_11_142830_create_tags_table',1),
	(21,'2021_11_11_142852_create_tag_locales_table',1),
	(22,'2021_11_13_181303_create_blogs_table',1),
	(23,'2021_11_13_181321_create_blog_locales_table',1),
	(24,'2021_11_13_181348_create_tag_blog_table',1),
	(25,'2021_11_13_233130_create_contact_us_table',1),
	(26,'2021_11_13_233153_create_contact_us_locales_table',1),
	(27,'2021_11_15_103434_create_information_table',1),
	(28,'2021_11_15_103510_create_information_locales_table',1),
	(29,'2021_11_15_233425_create_coupons_table',1),
	(30,'2021_12_08_013156_create_subscribes_table',1),
	(31,'2021_12_21_134016_create_address_books_table',1),
	(32,'2022_01_06_113407_create_emails_table',1),
	(33,'2022_02_20_132832_create_orders_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table modules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `modules`;

CREATE TABLE `modules` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `modules` WRITE;
/*!40000 ALTER TABLE `modules` DISABLE KEYS */;

INSERT INTO `modules` (`id`, `name`, `created_at`, `updated_at`)
VALUES
	(1,'Dashboards','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(2,'Staff','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(3,'Filters','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(4,'Categories','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(5,'Products','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(6,'Customers','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(7,'Orders','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(8,'Slideshows','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(9,'Tags','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(10,'Blogs','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(11,'Contact Us','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(12,'Information','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(13,'Coupons','2022-03-05 19:50:02','2022-03-05 19:50:02'),
	(14,'Emails','2022-03-05 19:50:02','2022-03-05 19:50:02');

/*!40000 ALTER TABLE `modules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table orders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping` longtext COLLATE utf8mb4_unicode_ci,
  `billing` longtext COLLATE utf8mb4_unicode_ci,
  `cart` longtext COLLATE utf8mb4_unicode_ci,
  `summary` longtext COLLATE utf8mb4_unicode_ci,
  `transaction` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parcel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('Order Placed','Shipped','In Transit','In Dispatch','Waiting to be Picked Up','Have Been Signed') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `module_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`, `module_id`)
VALUES
	(1,'create dashboards','2022-03-05 19:50:02','2022-03-05 19:50:02',1),
	(2,'read dashboards','2022-03-05 19:50:02','2022-03-05 19:50:02',1),
	(3,'update dashboards','2022-03-05 19:50:02','2022-03-05 19:50:02',1),
	(4,'delete dashboards','2022-03-05 19:50:02','2022-03-05 19:50:02',1),
	(5,'create staff','2022-03-05 19:50:02','2022-03-05 19:50:02',2),
	(6,'read staff','2022-03-05 19:50:02','2022-03-05 19:50:02',2),
	(7,'update staff','2022-03-05 19:50:02','2022-03-05 19:50:02',2),
	(8,'delete staff','2022-03-05 19:50:02','2022-03-05 19:50:02',2),
	(9,'create filters','2022-03-05 19:50:02','2022-03-05 19:50:02',3),
	(10,'read filters','2022-03-05 19:50:02','2022-03-05 19:50:02',3),
	(11,'update filters','2022-03-05 19:50:02','2022-03-05 19:50:02',3),
	(12,'delete filters','2022-03-05 19:50:02','2022-03-05 19:50:02',3),
	(13,'create categories','2022-03-05 19:50:02','2022-03-05 19:50:02',4),
	(14,'read categories','2022-03-05 19:50:02','2022-03-05 19:50:02',4),
	(15,'update categories','2022-03-05 19:50:02','2022-03-05 19:50:02',4),
	(16,'delete categories','2022-03-05 19:50:02','2022-03-05 19:50:02',4),
	(17,'create products','2022-03-05 19:50:02','2022-03-05 19:50:02',5),
	(18,'read products','2022-03-05 19:50:02','2022-03-05 19:50:02',5),
	(19,'update products','2022-03-05 19:50:02','2022-03-05 19:50:02',5),
	(20,'delete products','2022-03-05 19:50:02','2022-03-05 19:50:02',5),
	(21,'create customers','2022-03-05 19:50:02','2022-03-05 19:50:02',6),
	(22,'read customers','2022-03-05 19:50:02','2022-03-05 19:50:02',6),
	(23,'update customers','2022-03-05 19:50:02','2022-03-05 19:50:02',6),
	(24,'delete customers','2022-03-05 19:50:02','2022-03-05 19:50:02',6),
	(25,'create orders','2022-03-05 19:50:02','2022-03-05 19:50:02',7),
	(26,'read orders','2022-03-05 19:50:02','2022-03-05 19:50:02',7),
	(27,'update orders','2022-03-05 19:50:02','2022-03-05 19:50:02',7),
	(28,'delete orders','2022-03-05 19:50:02','2022-03-05 19:50:02',7),
	(29,'create slideshows','2022-03-05 19:50:02','2022-03-05 19:50:02',8),
	(30,'read slideshows','2022-03-05 19:50:02','2022-03-05 19:50:02',8),
	(31,'update slideshows','2022-03-05 19:50:02','2022-03-05 19:50:02',8),
	(32,'delete slideshows','2022-03-05 19:50:02','2022-03-05 19:50:02',8),
	(33,'create tags','2022-03-05 19:50:02','2022-03-05 19:50:02',9),
	(34,'read tags','2022-03-05 19:50:02','2022-03-05 19:50:02',9),
	(35,'update tags','2022-03-05 19:50:02','2022-03-05 19:50:02',9),
	(36,'delete tags','2022-03-05 19:50:02','2022-03-05 19:50:02',9),
	(37,'create blogs','2022-03-05 19:50:02','2022-03-05 19:50:02',10),
	(38,'read blogs','2022-03-05 19:50:02','2022-03-05 19:50:02',10),
	(39,'update blogs','2022-03-05 19:50:02','2022-03-05 19:50:02',10),
	(40,'delete blogs','2022-03-05 19:50:02','2022-03-05 19:50:02',10),
	(41,'create contact us','2022-03-05 19:50:02','2022-03-05 19:50:02',11),
	(42,'read contact us','2022-03-05 19:50:02','2022-03-05 19:50:02',11),
	(43,'update contact us','2022-03-05 19:50:02','2022-03-05 19:50:02',11),
	(44,'delete contact us','2022-03-05 19:50:02','2022-03-05 19:50:02',11),
	(45,'create information','2022-03-05 19:50:02','2022-03-05 19:50:02',12),
	(46,'read information','2022-03-05 19:50:02','2022-03-05 19:50:02',12),
	(47,'update information','2022-03-05 19:50:02','2022-03-05 19:50:02',12),
	(48,'delete information','2022-03-05 19:50:02','2022-03-05 19:50:02',12),
	(49,'create coupons','2022-03-05 19:50:02','2022-03-05 19:50:02',13),
	(50,'read coupons','2022-03-05 19:50:02','2022-03-05 19:50:02',13),
	(51,'update coupons','2022-03-05 19:50:02','2022-03-05 19:50:02',13),
	(52,'delete coupons','2022-03-05 19:50:02','2022-03-05 19:50:02',13),
	(53,'create emails','2022-03-05 19:50:02','2022-03-05 19:50:02',14),
	(54,'read emails','2022-03-05 19:50:02','2022-03-05 19:50:02',14),
	(55,'update emails','2022-03-05 19:50:02','2022-03-05 19:50:02',14),
	(56,'delete emails','2022-03-05 19:50:02','2022-03-05 19:50:02',14);

/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_images
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_images`;

CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `path` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;

INSERT INTO `product_images` (`id`, `path`, `created_at`, `updated_at`, `product_id`)
VALUES
	(1,'/storage//products/1-HdhSPBvj.jpg','2022-03-06 00:52:05','2022-03-06 00:52:09',1),
	(2,'/storage//products/2-eVUqEk9n.jpg','2022-03-06 00:54:41','2022-03-06 00:55:25',2),
	(3,'/storage//products/3-n56XDI8G.jpg','2022-03-06 00:58:17','2022-03-06 00:58:20',3),
	(4,'/storage//products/4-SoOB9yLq.jpg','2022-03-06 01:00:47','2022-03-06 01:00:50',4),
	(5,'/storage//products/5-6biD4Kpu.jpg','2022-03-06 01:30:17','2022-03-06 01:34:05',5),
	(6,'/storage//products/6-Dni4kVnD.jpg','2022-03-06 01:30:17','2022-03-06 01:34:05',5),
	(7,'/storage//products/7-XyTHBgmp.jpg','2022-03-06 01:30:18','2022-03-06 01:34:05',5),
	(8,'/storage//products/8-ofI8s0u7.jpg','2022-03-06 01:34:59','2022-03-06 01:38:35',10),
	(9,'/storage//products/9-7IPCfKBN.jpg','2022-03-06 01:34:59','2022-03-06 01:38:35',10),
	(10,'/storage//products/10-2Ln4S6v0.jpg','2022-03-06 01:34:59','2022-03-06 01:38:35',10),
	(11,'/storage//products/11-5De73hVa.jpg','2022-03-06 01:42:09','2022-03-06 01:42:11',14),
	(12,'/storage//products/12-c1Y9lXLV.jpg','2022-03-06 01:42:09','2022-03-06 01:42:11',14),
	(13,'/storage//products/13-KKMCNjK0.jpg','2022-03-06 01:42:09','2022-03-06 01:42:11',14),
	(14,'/storage//products/14-rzIkG3in.jpg','2022-03-06 02:06:57','2022-03-06 02:07:00',17),
	(15,'/storage//products/15-8WwYp2v7.jpg','2022-03-06 02:06:57','2022-03-06 02:07:00',17),
	(16,'/storage//products/16-MvldIQJD.jpg','2022-03-06 02:09:53','2022-03-06 02:10:17',19),
	(17,'/storage//products/17-dQCc7NvZ.jpg','2022-03-06 02:09:53','2022-03-06 02:10:17',19),
	(18,'/storage//products/18-DXAU5UYD.jpg','2022-03-06 02:14:01','2022-03-06 02:14:23',22),
	(19,'/storage//products/19-dmMGrB9S.jpg','2022-03-06 02:14:02','2022-03-06 02:14:23',22),
	(20,'/storage//products/20-jI2ZD0KO.jpg','2022-03-06 12:02:27','2022-03-06 12:02:30',27),
	(21,'/storage//products/21-hC6Owkji.jpg','2022-03-06 12:02:27','2022-03-06 12:02:30',27),
	(22,'/storage//products/22-jRd3Ur6f.jpg','2022-03-06 12:02:27','2022-03-06 12:02:30',27),
	(23,'/storage//products/23-zWE0dXPU.jpg','2022-03-06 12:06:03','2022-03-06 12:06:06',32),
	(24,'/storage//products/24-5jTqkXgu.jpg','2022-03-06 12:06:03','2022-03-06 12:06:06',32),
	(25,'/storage//products/25-iQfLbyXh.jpg','2022-03-06 12:06:03','2022-03-06 12:06:06',32),
	(26,'/storage//products/26-oUiSPAwK.jpg','2022-03-06 12:12:10','2022-03-06 12:12:31',37),
	(27,'/storage//products/27-xPtpm4lu.jpg','2022-03-06 12:12:10','2022-03-06 12:12:31',37),
	(28,'/storage//products/28-3IvyY0Qj.jpg','2022-03-06 12:12:11','2022-03-06 12:12:31',37),
	(29,'/storage//products/29-iuS8jkfW.jpg','2022-03-06 12:16:30','2022-03-06 12:17:04',43),
	(30,'/storage//products/30-UlTlniQa.jpg','2022-03-06 12:16:30','2022-03-06 12:17:04',43),
	(31,'/storage//products/31-XX9yBgRC.jpg','2022-03-06 12:16:30','2022-03-06 12:17:04',43),
	(32,'/storage//products/32-JL0SAAGN.jpg','2022-03-06 12:20:56','2022-03-06 12:21:12',46),
	(33,'/storage//products/33-kVrt24WX.jpg','2022-03-06 12:20:56','2022-03-06 12:21:12',46),
	(34,'/storage//products/34-cnk5RcA3.jpg','2022-03-06 12:20:56','2022-03-06 12:21:12',46),
	(35,'/storage//products/35-eBfdSthC.jpg','2022-03-06 12:24:39','2022-03-06 12:24:51',52),
	(36,'/storage//products/36-GTYeU4rT.jpg','2022-03-06 12:24:39','2022-03-06 12:24:51',52),
	(37,'/storage//products/37-eK42jSj6.jpg','2022-03-06 12:24:39','2022-03-06 12:24:51',52);

/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table product_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `product_locales`;

CREATE TABLE `product_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` mediumtext COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `product_locales` WRITE;
/*!40000 ALTER TABLE `product_locales` DISABLE KEYS */;

INSERT INTO `product_locales` (`id`, `locale`, `name`, `slug`, `description`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `product_id`)
VALUES
	(1,'en','Embroidered Musical Note Cap','embroidered-musical-note-cap','<p>This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.</p><p><br></p><p>It has a soft and relaxing material to keep you cool and snug as long as you wear it.</p>','Embroidered Musical Note Cap','note,cap','This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.','2022-03-06 00:52:09','2022-03-06 00:52:09',1),
	(2,'th','หมวก Embroidered Musical Note','หมวก-embroidered-musical-note','<p>หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น</p><p><br></p><p>มีวัสดุที่นุ่มและผ่อนคลายเพื่อให้คุณรู้สึกเย็นและสบายตราบเท่าที่คุณสวมใส่</p>','หมวก Embroidered Musical Note','note,หมวก','หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น','2022-03-06 00:52:09','2022-03-06 00:52:09',1),
	(3,'en','Embroidered Simple Skull Cap','embroidered-simple-skull-cap','<p>This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.</p><p><br></p><p>It has a soft and relaxing material to keep you cool and snug as long as you wear it.</p>','Embroidered Simple Skull Cap','skull,cap','This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.','2022-03-06 00:55:25','2022-03-06 00:55:25',2),
	(4,'th','หมวก Embroidered Simple Skull','หมวก-embroidered-simple-skull','<p>หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น</p><p><br></p><p>มีวัสดุที่นุ่มและผ่อนคลายเพื่อให้คุณรู้สึกเย็นและสบายตราบเท่าที่คุณสวมใส่</p>','หมวก Embroidered Simple Skull','skull,หมวก','หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น','2022-03-06 00:55:25','2022-03-06 00:55:25',2),
	(5,'en','Embroidered Rock On Cap','Embroidered-rock-on-cap','<p>This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.</p><p><br></p><p>It has a soft and relaxing material to keep you cool and snug as long as you wear it.</p>','Embroidered Rock On Cap','rock on,cap','This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.','2022-03-06 00:58:20','2022-03-06 00:58:20',3),
	(6,'th','หมวก Embroidered Rock On','หมวก-embroidered-rock-on','<p>หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น</p><p><br></p><p>มีวัสดุที่นุ่มและผ่อนคลายเพื่อให้คุณรู้สึกเย็นและสบายตราบเท่าที่คุณสวมใส่</p>','หมวก Embroidered Rock On','rock onหมวก','หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น','2022-03-06 00:58:20','2022-03-06 00:58:20',3),
	(7,'en','Embroidered Heart Cap','embroidered-heart-cap','<p>This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.</p><p><br></p><p>It has a soft and relaxing material to keep you cool and snug as long as you wear it.</p>','Embroidered Heart Cap','heart,cap','This ball cap features a stretchy, elastic sweatband that conforms to your head comfortable, with a breathable, unlined interior. An adjustable snapback sizing piece offers a custom fit, while sewn eyelets provide ventilation for a fresh feel.','2022-03-06 01:00:50','2022-03-06 01:00:50',4),
	(8,'th','หมวก Embroidered Heart','หมวก-embroidered-heart','<p>หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น</p><p><br></p><p>มีวัสดุที่นุ่มและผ่อนคลายเพื่อให้คุณรู้สึกเย็นและสบายตราบเท่าที่คุณสวมใส่</p>','หมวก Embroidered Heart','หัวใจ,หมวก','หมวกแก๊ปแบบลูกบอลนี้มีแถบกันเหงื่อที่ยืดหยุ่นและยืดหยุ่นซึ่งรับกับศีรษะได้สบาย พร้อมการตกแต่งภายในแบบไม่มีซับในที่ระบายอากาศได้ ชิ้นส่วนปรับขนาดแบบ snapback ที่ปรับได้ให้ความพอดีแบบเฉพาะตัว ขณะที่ตาไก่แบบเย็บให้การระบายอากาศเพื่อให้รู้สึกสดชื่น','2022-03-06 01:00:50','2022-03-06 01:00:50',4),
	(9,'en','Shiro T-Shirt','shiro-t-Shirt','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Shiro T-Shirt','shiro,t-shirt','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 01:34:05','2022-03-06 01:34:05',5),
	(10,'th','เสื้อยืด Shiro','เสื้อยืด-shiro','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อยืด Shiro','shiro,เสื้อยืด','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 01:34:05','2022-03-06 01:34:05',5),
	(11,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',6),
	(12,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',6),
	(13,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',7),
	(14,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',7),
	(15,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',8),
	(16,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',8),
	(17,'en','XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',9),
	(18,'th','ไซส์ XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',9),
	(19,'en','Drip Bear T-Shirt','drip-bear-t-shirt','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Drip Bear T-Shirt','drip bear,t-shirt','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 01:38:35','2022-03-06 01:38:35',10),
	(20,'th','เสื้อยืด Drip Bear','เสื้อยืด-drip-bear','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อยืด Drip Bear','drip bear,เสื้อยืด','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 01:38:35','2022-03-06 01:38:35',10),
	(21,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',11),
	(22,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',11),
	(23,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',12),
	(24,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',12),
	(25,'en','XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',13),
	(26,'th','ไซส์ XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',13),
	(27,'en','Cosmic Rotation T-Shirt','cosmic-rotation-t-shirt','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Cosmic Rotation T-Shirt','cosmic,t-shirt','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 01:42:11','2022-03-06 01:42:11',14),
	(28,'th','เสื้อยืด Cosmic Rotation','เสื้อยืด-cosmic-rotation','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อยืด Cosmic Rotation','cosmic,เสื้อยืด','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 01:42:11','2022-03-06 01:42:11',14),
	(29,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:42:11','2022-03-06 01:42:11',15),
	(30,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:42:11','2022-03-06 01:42:11',15),
	(31,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:42:11','2022-03-06 01:42:11',16),
	(32,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 01:42:11','2022-03-06 01:42:11',16),
	(33,'en','True Mind Kimono','true-mind-kimono','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','True Mind Kimono','true mind,kimono','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 02:07:00','2022-03-06 02:07:00',17),
	(34,'th','เสื้อกิโมโน True Mind','เสื้อกิโมโน-true-mind','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อกิโมโน True Mind','true mind,กิโมโน','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 02:07:00','2022-03-06 02:07:00',17),
	(35,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:07:00','2022-03-06 02:07:00',18),
	(36,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:07:00','2022-03-06 02:07:00',18),
	(37,'en','Freshhoods x Smiley Kimono','freshhoods-x-Smiley-kimono','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Freshhoods x Smiley Kimono','smiley,kimono','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 02:10:17','2022-03-06 02:10:17',19),
	(38,'th','เสื้อกิโมโน Freshhoods x Smiley','เสื้อกิโมโน-freshhoods-x-smiley','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อกิโมโน Freshhoods x Smiley','smiley,กิโมโน','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 02:10:17','2022-03-06 02:10:17',19),
	(39,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:10:17','2022-03-06 02:10:17',20),
	(40,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:10:17','2022-03-06 02:10:17',20),
	(41,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:10:17','2022-03-06 02:10:17',21),
	(42,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:10:17','2022-03-06 02:10:17',21),
	(43,'en','Dark Floral Kimono','dark-floral-kimono','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Dark Floral','floral,kimono','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 02:14:23','2022-03-06 02:14:23',22),
	(44,'th','เสื้อกิโมโน Floral Kimono','เสื้อกิโมโน-Floral-Kimono','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อ Floral Kimono','floral,กิโมโน','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 02:14:23','2022-03-06 02:14:23',22),
	(45,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',23),
	(46,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',23),
	(47,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',24),
	(48,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',24),
	(49,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',25),
	(50,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',25),
	(51,'en','XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',26),
	(52,'th','ไซส์ XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',26),
	(53,'en','Together In Peace Zip Up Hoodie','together-in-peace-zip-up-hoodie','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Together In Peace','together,zip up hoodie','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 12:02:30','2022-03-06 12:02:30',27),
	(54,'th','เสื้อฮู้ดซิบ Together In Peace','เสื้อฮู้ดซิบ-together-in-peace','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อฮู้ด Together In Peace','together in peace,เสื้อฮู้ด','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 12:02:30','2022-03-06 12:02:30',27),
	(55,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',28),
	(56,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',28),
	(57,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',29),
	(58,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',29),
	(59,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',30),
	(60,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',30),
	(61,'en','XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',31),
	(62,'th','ไซส์ XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',31),
	(63,'en','Dinner Time Jumper Hoodie','dinner-time-jumper-hoodie','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Dinner Time Hoodie','hoodie,dinner time','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 12:06:06','2022-03-06 12:06:06',32),
	(64,'th','เสื้อฮู้ดจัมเปอร์ Dinner Time','เสื้อฮู้ดจัมเปอร์-dinner-time','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อฮู้ด Dinner Time','dinner time,เสื้อฮู้ด','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 12:06:06','2022-03-06 12:06:06',32),
	(65,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',33),
	(66,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',33),
	(67,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',34),
	(68,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',34),
	(69,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',35),
	(70,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',35),
	(71,'en','XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',36),
	(72,'th','ไซส์ XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',36),
	(73,'en','Caution x PUBG Jumper Hoodie','caution-x-pubg-hoodie','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Caution x PUBG Jumper','hoodie,pubg','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 12:12:31','2022-03-06 12:12:31',37),
	(74,'th','เสื้อฮู้ดจัมเปอร์ Caution x PUBG','เสื้อฮู้ด-caution-x-pubg','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อฮู้ด Caution x PUBG','เสื้อฮู้ด,pubg','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 12:12:31','2022-03-06 12:12:31',37),
	(75,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',38),
	(76,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',38),
	(77,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',39),
	(78,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',39),
	(79,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',40),
	(80,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',40),
	(81,'en','XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',41),
	(82,'th','ไซส์ XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',41),
	(83,'en','2XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',42),
	(84,'th','ไซส์ 2XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',42),
	(85,'en','Eliminated Zip Up Hoodie','eliminated-zip-up-hoodie','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Eliminated Hoodie','eliminated,hoodie','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 12:17:04','2022-03-06 12:17:04',43),
	(86,'th','เสื้อฮู้ดซิบ Eliminated','เสื้อฮู้ดซิบ-eliminated','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อฮู้ด Eliminated','eliminated,เสื้อฮู้ดมีซิบ','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 12:17:04','2022-03-06 12:17:04',43),
	(87,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:17:04','2022-03-06 12:17:04',44),
	(88,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:17:04','2022-03-06 12:17:04',44),
	(89,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:17:04','2022-03-06 12:17:04',45),
	(90,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:17:04','2022-03-06 12:17:04',45),
	(91,'en','Color Landscape Zip Up Hoodie By Britto','color-landscape-zip-up-hoodie-by-britto','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Color Landscape By Britto','britto,zip up hoodie','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 12:21:12','2022-03-06 12:21:12',46),
	(92,'th','เสื้อฮู้ดซิบ Color Landscape By Britto','เสื้อฮู้ดซิบ-color-landscape-by-britto','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อฮู้ด Color Landscape By Britto','britto,เสื้อฮู้ดมีซิบ','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 12:21:12','2022-03-06 12:21:12',46),
	(93,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',47),
	(94,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',47),
	(95,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',48),
	(96,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',48),
	(97,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',49),
	(98,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',49),
	(99,'en','XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',50),
	(100,'th','ไซส์ XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',50),
	(101,'en','2XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',51),
	(102,'th','ไซส์ 2XL',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',51),
	(103,'en','Bad Idea Jumper Hoodie','bad-idea-jumper-hoodie','<p>The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.</p><p><br></p><p>This is a Unisex Fitted Hoodie. For women\'s sizing, we recommend selecting 1 size down for slim fit.</p><p><br></p><p>Easy to clean, just let the washing machine do the work.</p>','Bad Idea Jumper Hoodie','bad idea,hoodie','The high-quality pre-shrunk microfiber polyester is highly resistant to wrinkles, shrinking, or abrasion while it provides the feel and looks of pure cotton. All of our products are printed using dye-sublimation technology with great attention to detail to ensure the long-lasting vividity of colors and crisp print wash after wash.','2022-03-06 12:24:51','2022-03-06 12:24:51',52),
	(104,'th','เสื้อฮู้ดจัมเปอร์ Bad Idea','เสื้อฮู้ด-จัมเปอร์-bad-idea','<p>โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก</p><p><br></p><p>นี่คือ Unisex Fitted Hoodie สำหรับไซส์ผู้หญิง ขอแนะนำให้เลือกไซส์ลง 1 ไซส์เพื่อให้เข้ารูปพอดีตัว</p><p><br></p><p>ทำความสะอาดง่าย เพียงปล่อยให้เครื่องซักผ้าทำงาน</p>','เสื้อฮุ้ด Bad Idea','bad idea,เสื้อฮู้ด','โพลีเอสเตอร์ไมโครไฟเบอร์ก่อนหดคุณภาพสูงมีความทนทานสูงต่อรอยย่น การหดตัว หรือรอยถลอก ในขณะที่ให้สัมผัสและรูปลักษณ์ของผ้าฝ้ายแท้ ผลิตภัณฑ์ทั้งหมดของเราพิมพ์โดยใช้เทคโนโลยีย้อมระเหิดด้วยความใส่ใจในรายละเอียดเพื่อให้แน่ใจว่าสีจะสดใสยาวนานและการพิมพ์ที่คมชัดหลังจากการซัก','2022-03-06 12:24:51','2022-03-06 12:24:51',52),
	(105,'en','S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',53),
	(106,'th','ไซส์ S',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',53),
	(107,'en','M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',54),
	(108,'th','ไซส์ M',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',54),
	(109,'en','L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',55),
	(110,'th','ไซส์ L',NULL,NULL,NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',55);

/*!40000 ALTER TABLE `product_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table products
# ------------------------------------------------------------

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `status` enum('Disabled','Enabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `percentage` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;

INSERT INTO `products` (`id`, `sku`, `quantity`, `price`, `status`, `start_date`, `end_date`, `percentage`, `created_at`, `updated_at`, `parent_id`)
VALUES
	(1,'ES001C',10,670.00,'Disabled',NULL,NULL,NULL,'2022-03-06 00:52:09','2022-03-06 00:55:47',0),
	(2,'ES002C',10,670.00,'Enabled',NULL,NULL,NULL,'2022-03-06 00:55:25','2022-03-06 00:55:25',0),
	(3,'ES003C',0,670.00,'Enabled',NULL,NULL,NULL,'2022-03-06 00:58:20','2022-03-06 00:58:20',0),
	(4,'ES004C',12,670.00,'Enabled','2022-03-01','2022-03-31',10,'2022-03-06 01:00:50','2022-03-06 13:18:42',0),
	(5,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',0),
	(6,'SKU-S',10,1200.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',5),
	(7,'SKU-M',0,1200.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',5),
	(8,'SKU-L',10,1200.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',5),
	(9,'SKU-XL',10,1300.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:34:05','2022-03-06 01:34:05',5),
	(10,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',0),
	(11,'SKU-M',10,1200.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',10),
	(12,'SKU-L',10,1200.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',10),
	(13,'SKU-XL',10,1300.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:38:35','2022-03-06 01:38:35',10),
	(14,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 01:42:11','2022-03-06 01:42:11',0),
	(15,'SKU-S',10,1200.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:42:11','2022-03-06 01:42:11',14),
	(16,'SKU-L',10,1200.00,'Enabled',NULL,NULL,NULL,'2022-03-06 01:42:11','2022-03-06 01:42:11',14),
	(17,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 02:07:00','2022-03-06 02:07:00',0),
	(18,'SKU-M',10,1500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 02:07:00','2022-03-06 02:10:29',17),
	(19,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 02:10:17','2022-03-06 02:10:17',0),
	(20,'SKU-M',10,1500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 02:10:17','2022-03-06 02:10:17',19),
	(21,'SKU-L',10,1500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 02:10:17','2022-03-06 02:10:17',19),
	(22,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',0),
	(23,'SKU-S',10,1500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',22),
	(24,'SKU-M',0,1500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',22),
	(25,'SKU-L',10,1500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',22),
	(26,'SKU-XL',10,1600.00,'Enabled',NULL,NULL,NULL,'2022-03-06 02:14:23','2022-03-06 02:14:23',22),
	(27,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',0),
	(28,'SKU-S',0,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',27),
	(29,'SKU-M',0,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',27),
	(30,'SKU-L',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',27),
	(31,'SKU-XL',0,2700.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:02:30','2022-03-06 12:02:30',27),
	(32,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',0),
	(33,'SKU-S',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',32),
	(34,'SKU-M',0,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',32),
	(35,'SKU-L',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',32),
	(36,'SKU-XL',0,2700.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:06:06','2022-03-06 12:06:06',32),
	(37,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:12:31',0),
	(38,'SKU-S',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:50:37',37),
	(39,'SKU-M',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:50:37',37),
	(40,'SKU-L',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:50:37',37),
	(41,'SKU-XL',10,2700.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:50:37',37),
	(42,'SKU-2XL',10,2700.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:12:31','2022-03-06 12:50:37',37),
	(43,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 12:17:04','2022-03-06 12:17:04',0),
	(44,'SKU-S',0,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:17:04','2022-03-06 12:50:12',43),
	(45,'SKU-L',0,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:17:04','2022-03-06 12:50:12',43),
	(46,NULL,NULL,NULL,'Enabled',NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',0),
	(47,'SKU-S',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',46),
	(48,'SKU-M',0,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',46),
	(49,'SKU-L',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',46),
	(50,'SKU-XL',10,2700.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',46),
	(51,'SKU-2XL',0,2700.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:21:12','2022-03-06 12:21:12',46),
	(52,NULL,NULL,NULL,'Enabled','2022-03-01','2022-03-31',10,'2022-03-06 12:24:51','2022-03-06 13:18:25',0),
	(53,'SKU-S',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',52),
	(54,'SKU-M',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',52),
	(55,'SKU-L',10,2500.00,'Enabled',NULL,NULL,NULL,'2022-03-06 12:24:51','2022-03-06 12:24:51',52);

/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table slideshow_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slideshow_locales`;

CREATE TABLE `slideshow_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slideshow_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `slideshow_locales` WRITE;
/*!40000 ALTER TABLE `slideshow_locales` DISABLE KEYS */;

INSERT INTO `slideshow_locales` (`id`, `locale`, `title`, `url`, `description`, `created_at`, `updated_at`, `slideshow_id`)
VALUES
	(1,'en','Amazing Outlet !!','https://www.siampremiumoutlets.com/en/store/50/JP-TRAVEL-STORE?location=jptravelstore','<p>Cooming Zoom @ Siam Premium</p>','2022-03-05 20:58:04','2022-03-06 12:36:12',1),
	(2,'th','ตื่นตาตื่นใจที่ Outlet','https://www.siampremiumoutlets.com/th/store/50/JP-TRAVEL-STORE?location=jptravelstore','<p>ตื่นตาตื่นใจเร็วๆนี้ที่ @สยามพรีเมียม</p>','2022-03-05 20:58:04','2022-03-06 12:36:12',1),
	(3,'en','Black Firday Sale','http://vuexy.test/blogs/best-early-black-friday-fashion-deals','<p>Promotion Black Friday Sale ALL Brand</p>','2022-03-05 20:59:06','2022-03-05 20:59:06',2),
	(4,'th','ลดราคาเทศกาลแบล๊คฟรายเดย์','http://vuexy.test/blogs/ข้อเสนอ-แฟชั่นแบล็กฟรายเดย์-ช่วงต้นที่ดีที่สุด','<p>ลดกระหน่ำเทศกาลแบล๊อคฟรายเดย์ ทุกแบรนดัง</p>','2022-03-05 20:59:06','2022-03-06 12:31:50',2);

/*!40000 ALTER TABLE `slideshow_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table slideshows
# ------------------------------------------------------------

DROP TABLE IF EXISTS `slideshows`;

CREATE TABLE `slideshows` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_order` int(11) NOT NULL,
  `status` enum('Disabled','Enabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `slideshows` WRITE;
/*!40000 ALTER TABLE `slideshows` DISABLE KEYS */;

INSERT INTO `slideshows` (`id`, `image`, `sort_order`, `status`, `created_at`, `updated_at`)
VALUES
	(1,'/storage/slideshows/1-w0JBJG5r.jpg',0,'Enabled','2022-03-05 20:58:04','2022-03-05 20:59:18'),
	(2,'/storage/slideshows/2-XZHZokbo.jpg',1,'Enabled','2022-03-05 20:59:06','2022-03-05 20:59:06');

/*!40000 ALTER TABLE `slideshows` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table subscribes
# ------------------------------------------------------------

DROP TABLE IF EXISTS `subscribes`;

CREATE TABLE `subscribes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Disabled','Enabled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



# Dump of table tag_blog
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag_blog`;

CREATE TABLE `tag_blog` (
  `tag_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tag_blog` WRITE;
/*!40000 ALTER TABLE `tag_blog` DISABLE KEYS */;

INSERT INTO `tag_blog` (`tag_id`, `blog_id`)
VALUES
	(3,1),
	(1,2),
	(3,2),
	(2,3),
	(3,4),
	(1,4),
	(2,5),
	(3,5),
	(2,6),
	(3,6),
	(2,7),
	(1,8),
	(1,9),
	(2,9),
	(3,9),
	(1,10),
	(3,10);

/*!40000 ALTER TABLE `tag_blog` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tag_locales
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tag_locales`;

CREATE TABLE `tag_locales` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `locale` enum('en','th') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_keyword` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_description` mediumtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tag_locales` WRITE;
/*!40000 ALTER TABLE `tag_locales` DISABLE KEYS */;

INSERT INTO `tag_locales` (`id`, `locale`, `name`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `created_at`, `updated_at`, `tag_id`)
VALUES
	(1,'en','Men','fashion-for-men','Fashion for Men','fashion,men','Dressing trends for men','2022-03-05 20:29:11','2022-03-05 20:29:11',1),
	(2,'th','ผู้ชาย','แฟชั่น-สำหรับ-ผู้ชาย','แฟชั่น สำหรับ ผู้ชาย','แฟชั่น,ผู้ชาย','เทรนการแต่งตัวสำหรับผู้ชาย','2022-03-05 20:29:11','2022-03-05 20:29:11',1),
	(3,'en','Women','fashion-for-women','Fashion for Women','fashion,women','Dressing trends for women','2022-03-05 20:30:02','2022-03-05 20:30:02',2),
	(4,'th','ผู้หญิง','แฟชั่น-สำหรับ-ผู้หญิง','แฟชั่น สำหรับ ผู้หญิง','แฟนนี่,ผู้หญิง','เทรนการแต่งตัวสำหรับผู้หญิง','2022-03-05 20:30:02','2022-03-05 20:30:02',2),
	(5,'en','2022','2022','2022','2022','Dressing trends 2022','2022-03-05 20:31:27','2022-03-05 20:31:27',3),
	(6,'th','2564','2564','2564','2564','เทรนการแต่งตัว 2564','2022-03-05 20:31:27','2022-03-05 20:31:27',3);

/*!40000 ALTER TABLE `tag_locales` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table tags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tags`;

CREATE TABLE `tags` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;

INSERT INTO `tags` (`id`, `created_at`, `updated_at`)
VALUES
	(1,'2022-03-05 20:29:11','2022-03-05 20:29:11'),
	(2,'2022-03-05 20:30:02','2022-03-05 20:30:02'),
	(3,'2022-03-05 20:31:27','2022-03-05 20:31:27');

/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_permission
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_permission`;

CREATE TABLE `user_permission` (
  `user_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_permission` WRITE;
/*!40000 ALTER TABLE `user_permission` DISABLE KEYS */;

INSERT INTO `user_permission` (`user_id`, `permission_id`)
VALUES
	(1,1),
	(1,2),
	(1,3),
	(1,4),
	(1,5),
	(1,6),
	(1,7),
	(1,8),
	(1,9),
	(1,10),
	(1,11),
	(1,12),
	(1,13),
	(1,14),
	(1,15),
	(1,16),
	(1,17),
	(1,18),
	(1,19),
	(1,20),
	(1,21),
	(1,22),
	(1,23),
	(1,24),
	(1,25),
	(1,26),
	(1,27),
	(1,28),
	(1,29),
	(1,30),
	(1,31),
	(1,32),
	(1,33),
	(1,34),
	(1,35),
	(1,36),
	(1,37),
	(1,38),
	(1,39),
	(1,40),
	(1,41),
	(1,42),
	(1,43),
	(1,44),
	(1,45),
	(1,46),
	(1,47),
	(1,48),
	(1,49),
	(1,50),
	(1,51),
	(1,52),
	(1,53),
	(1,54),
	(1,55),
	(1,56);

/*!40000 ALTER TABLE `user_permission` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_verifies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_verifies`;

CREATE TABLE `user_verifies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `user_verifies` WRITE;
/*!40000 ALTER TABLE `user_verifies` DISABLE KEYS */;

INSERT INTO `user_verifies` (`id`, `token`, `created_at`, `updated_at`, `user_id`)
VALUES
	(1,'H6ZZATVBEUoPAVt3ObNc7ZtW8pxRDPELgGGZ0luU','2022-03-05 19:50:02','2022-03-05 19:50:02',1);

/*!40000 ALTER TABLE `user_verifies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `profile_picture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('Admin','User') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'User',
  `status` enum('Active','Blocked','Deactivated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Active',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `full_name`, `email`, `email_verified_at`, `profile_picture`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Vuexy','info.vuexy@gmail.com','2022-03-05 19:50:02',NULL,'$2y$10$6HXtoGiC.kuZIDEcznBjK.fjVlRCZVpVZuN7QlfrAelpCcm.XjoAS','Admin','Active',NULL,'2022-03-05 19:50:02','2022-03-05 19:50:02');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
