-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 03 Tem 2024, 01:23:59
-- Sunucu sürümü: 8.0.32
-- PHP Sürümü: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `medescare_panel`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `agency`
--

CREATE TABLE `agency` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Logo` text,
  `Mail` varchar(255) DEFAULT NULL,
  `Tell` varchar(255) DEFAULT NULL,
  `Fax` varchar(255) DEFAULT NULL,
  `ParentId` varchar(255) DEFAULT NULL,
  `Whatsapp` varchar(255) DEFAULT NULL,
  `Instagram` varchar(255) DEFAULT NULL,
  `Facebook` varchar(255) DEFAULT NULL,
  `WebPage` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `CountryCode` varchar(55) DEFAULT NULL,
  `Province` varchar(255) DEFAULT NULL,
  `City` varchar(255) DEFAULT NULL,
  `Adress` text,
  `VatNumber` varchar(255) DEFAULT NULL,
  `AgencyFee` int NOT NULL DEFAULT '0',
  `CommissionRate` int NOT NULL DEFAULT '0',
  `Rate` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `agency`
--

INSERT INTO `agency` (`Id`, `uid`, `Title`, `Logo`, `Mail`, `Tell`, `Fax`, `ParentId`, `Whatsapp`, `Instagram`, `Facebook`, `WebPage`, `Country`, `CountryCode`, `Province`, `City`, `Adress`, `VatNumber`, `AgencyFee`, `CommissionRate`, `Rate`, `create_at`, `update_at`, `Status`) VALUES
(1012, 'Kelzf93Bpi7295Mr7n7kY2m1P70F6g', 'Meavilla', 'assets/upload/default-logo.png', 'mucella@meavilla.com.tr', '(533) 422-0449', NULL, '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1', '(533) 422-0449', '', NULL, 'www.meavilla.com.tr', 'Afghanistan', NULL, 'İzmir', '35920 Selçuk', 'Şirince Mah. Küme evleri No.30', 'Selçuk V.D. 6130524470', 0, 15, '0', '2023-11-24 10:08:53', '2024-06-27 05:41:31', '1'),
(1013, 'aVAgj4hsM7uDObKW2TB92m182XyUcL', 'Taner Reisen', 'assets/upload/default-logo.png', 'korkmay9@hotmail.de', '(163) 700-4941', NULL, '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1', '(163) 700-4941', NULL, NULL, 'www.tatilatesi.com', 'Almanya', NULL, 'Dortmund', 'Dortmund', 'Berg Str. 27 44339, Dortmund', '000000000', 0, 15, '0', '2023-11-24 10:10:25', '2023-11-24 10:10:25', '1'),
(1014, 'FjXeVsoQLNEx96OC26vPzl3G6RTq3I', 'KOC REISEN TRAVEL AGENCY', 'assets/upload/default-logo.png', 'koc-reisen@t-online.de', '(172) 280-9707', '(172) 280-9707', '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1', '(172) 280-9707', 'instagram', NULL, 'www.koc-reisen.de', 'Germany', NULL, 'Brambauer', 'Lünen', 'Waltroper Str. 58 44536', '00000000', 0, 10, '0', '2023-11-24 11:58:15', '2024-06-27 11:10:36', '1'),
(1016, '7FKEgk038VXY5qCsirW1SH1vywNjec', 'Medescare AR', 'assets/upload/default-logo.png', 'sami@medescare.com', '(501) 260-5591', '', 'DjMxa9bd2pSZLfGuF1cI86iK33omOR', '(501) 260-5591', '', NULL, '', 'Türkiye', NULL, 'İstanbul', 'Bakırköy', 'Florya', '99681732690', 0, 15, '0', '2023-11-30 12:15:49', '2024-01-03 09:32:29', '1'),
(1017, 'ogBlH5nROVN7Msk1CzvE45S7I2DWy7', 'Vitalia Medicare', 'assets/upload/default-logo.png', 'contact@vitaliamedicare.com', '(507) 037-7760', NULL, 'GOTv80aslR0LQPrNEkcudDIwAMbpz3', '(507) 037-7760', '', NULL, 'vitaliamedicare.com', 'Algeria', NULL, 'Algiers', 'Bordj Elkiffane', '14 Bordj Elkiffane, Algiers, Algeria', '00000000', 0, 0, '0', '2023-12-26 11:11:10', '2024-02-09 09:05:48', '1'),
(1018, 'ZOaID6Eney3X4r8fJmibSQosK5hc0t', 'Hala Group', 'assets/upload/default-logo.png', 'info@halagr.com', '(544) 104-8819', NULL, 'DjMxa9bd2pSZLfGuF1cI86iK33omOR', '(544) 104-8819', '', NULL, 'www.halagr.com', 'Türkiye', NULL, 'İstanbul', 'Fatih', 'Akşemsettin, Akdeniz Cd 61/1, 34080', '4551009062', 0, 0, '0', '2024-01-03 12:36:23', '2024-01-03 12:36:23', '1'),
(1020, 'gRwtyzMrKIN2kYxnZo5GL5aP9d8e7X', 'INTERNATIONAL SALES SPECIALIST', 'assets/upload/default-logo.png', 'yektaberk2@gmail.com', '(545) 905-1200', NULL, 'Kpg7B3fVwPGEz1Hoqa4XCDuh3L900t', '', '', NULL, '', 'Afghanistan', NULL, 'MARMARA', 'ISTANBUL', 'BEYLIKDUZU', '11111111111', 20, 20, '0', '2024-01-09 17:26:03', '2024-07-02 11:45:14', '1'),
(1023, '58VaRr4C1iBLfNmAE6nq1Wlszdb28j', 'Msmt', '/assets/upload/default-logo.png', 'msmtozkan@hotmail.com', '75773478', NULL, 'RzLD3NVEm88skxZCglJdWKacjBU2rT', '', NULL, NULL, '', 'Germany', NULL, 'Nrw', 'Bochum', 'Sfhjk dyjjn', '356890', 15, 15, '0', '2024-03-22 12:39:08', '2024-03-22 12:39:08', '1'),
(1041, 's32KcvjXWLeJ1RkM8Hg5zVhrAyxNZp', 'Mozaikreisen', '', 'saka6161@gmx.de', '(172) 234-5659', NULL, '', '', '', NULL, '', 'Germany', NULL, NULL, NULL, 'Nrw', '1111', 0, 0, '0', '2024-06-27 08:15:57', '2024-06-27 08:15:57', '1'),
(1042, 'Rz4d2TBapxLb0HY2DW9gcqMlVj8EuI', 'soyreisen', '', 'soyreisen@gmx.de', '(163) 919-3184', NULL, '', '', '', NULL, '', 'Germany', NULL, NULL, NULL, 'Nrw', '111', 0, 0, '0', '2024-06-27 08:16:57', '2024-06-27 08:16:57', '1'),
(1043, 'qs7CW4o3D26mr0yPTONSRj6c9E5hfn', 'AytoursReisebüro', '', 'aytours@web.de', '(172) 988-2222', NULL, '', '', '', NULL, '', 'Germany', NULL, NULL, NULL, 'Nrw', '1111', 0, 0, '0', '2024-06-27 08:17:51', '2024-06-27 08:17:51', '1'),
(1046, 'ZlODrV3eY4aPxh79Q4HU2j3NMps3zc', 'Test Agency', '/assets/upload/default-logo.png', 'hknersan@gmail.com', '05455410395', NULL, 'mKOroqWzTbAv6U981cPfR7LXnF621G', '', NULL, NULL, 'magicmedical.de', '', NULL, '', '', 'Kartaltepe Mh.', '1111', 15, 15, '0', '2024-06-27 17:36:31', '2024-06-27 17:36:31', '1'),
(1048, 'VxGHlaA4kmv2YMdDi10Kr30hItRoNL', 'Magic Medical Acente', '/assets/upload/default-logo.png', 'magicmedicalagency@gmail.com', '05455410395', NULL, '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1', '', NULL, NULL, 'magicmedical.de', '', NULL, '', '', 'Bakırköy', '23984068774', 15, 15, '0', '2024-07-01 01:39:13', '2024-07-01 01:39:13', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `announcement`
--

CREATE TABLE `announcement` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `Content` text,
  `Target` enum('0','1','2') NOT NULL DEFAULT '0',
  `Lang` enum('en','de','tr') NOT NULL DEFAULT 'en',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `api`
--

CREATE TABLE `api` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Type` enum('0','1') NOT NULL DEFAULT '0',
  `ApiKey` varchar(255) DEFAULT NULL,
  `ApiUser` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `application`
--

CREATE TABLE `application` (
  `Id` int NOT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Cell` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `CountryCode` varchar(255) DEFAULT NULL,
  `ReferenceCode` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1','2') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `application`
--

INSERT INTO `application` (`Id`, `FullName`, `Mail`, `Cell`, `Title`, `CountryCode`, `ReferenceCode`, `create_at`, `update_at`, `Status`) VALUES
(11, 'Ercan Özen', 'koberg-reisewelt@gmx.de', '45171001', 'Koberg Reiswewelt', '49', '999', '2024-01-27 12:28:10', '2024-01-27 15:28:10', '0'),
(15, 'Ismail Soy', 'isttur@gmx.de', '201754240', 'Istanbul Touristik', '49', '998', '2024-02-06 16:04:54', '2024-02-06 19:04:54', '0'),
(21, 'Ismail Soy', 'soyreisen@gmx.de', '(163) 919-3184', 'soyreisen', '49', '1020', '2024-04-03 17:27:44', '2024-04-03 20:27:44', '2'),
(25, 'Abdullah Saka', 'saka6161@gmx.de', '(172) 234-5659', 'Mozaikreisen', '49', 'magic2024', '2024-06-15 08:31:36', '2024-06-15 11:31:36', '2'),
(26, 'Terzi Meral', 'aytours@web.de', '(172) 988-2222', 'AytoursReisebüro', '49', 'magic2024', '2024-06-18 12:02:43', '2024-06-18 15:02:43', '2'),
(33, 'Hakan Ersan', 'magicmedicalagency@gmail.com', '(545) 541-0395', 'Magicmedical', '90', 'magic2024', '2024-07-01 00:49:34', '2024-07-01 03:49:34', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `appointment`
--

CREATE TABLE `appointment` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `UserId` varchar(255) DEFAULT NULL,
  `ClientId` varchar(255) DEFAULT NULL,
  `TreatmentId` varchar(255) DEFAULT NULL,
  `TreatmentCost` float(9,2) NOT NULL DEFAULT '0.00',
  `CategoryId` varchar(255) DEFAULT NULL,
  `ClinicId` varchar(255) DEFAULT NULL,
  `AgencyId` varchar(255) DEFAULT NULL,
  `PackageId` int DEFAULT NULL,
  `Features` text,
  `AppointmentDate` date DEFAULT NULL,
  `Cost` float(9,2) NOT NULL DEFAULT '0.00',
  `PaidAmount` float(9,2) DEFAULT NULL,
  `AgencyFee` int NOT NULL DEFAULT '0',
  `CommissionRate` int NOT NULL DEFAULT '0',
  `PaymentMethod` varchar(255) DEFAULT NULL,
  `PaymentDate` datetime DEFAULT NULL,
  `PaymentStatus` enum('0','1') NOT NULL DEFAULT '0',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1','2') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `article`
--

CREATE TABLE `article` (
  `Id` int NOT NULL,
  `Img` varchar(255) DEFAULT NULL,
  `Slug` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Order` int NOT NULL DEFAULT '1',
  `Content` text,
  `Lang` enum('en','de','tr') NOT NULL DEFAULT 'en',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `article`
--

INSERT INTO `article` (`Id`, `Img`, `Slug`, `Title`, `Order`, `Content`, `Lang`, `create_at`, `update_at`, `Status`) VALUES
(1, 'https://careinturkey.com/wp-content/uploads/2023/08/how-much-mini-bbl-3.jpg', 'how-much-bbl-cost-in-uk-vs-turkey-bbl-price', 'How Much BBL Cost in UK vs Turkey BBL Price ', 1, '<p>\n  The desire to sculpt and enhance one’s body, specifically the rear end, has made the Brazilian Buttock Lift (BBL) one of the most sought-after cosmetic procedures worldwide.\n\nBut, diving into the realm of BBL isn’t merely about the surgical procedure; it’s about understanding its costs too.\n\nHere, we’ll juxtapose the BBL costs across the globe, with an emphasis on the UK and Turkey, two of the key players in the cosmetic surgery industry.\n\nThe Brazilian Butt Lift (BBL) has risen to be one of the most sought-after cosmetic surgeries globally, coveted for its ability to provide a more contoured, fuller, and youthful posterior.\n\nWhile it may seem like a straightforward surgery, it involves meticulous attention to detail and a clear understanding of body aesthetics.\n\nLet’s delve into the specifics of the BBL procedure:\n\nBefore any surgical procedure, a thorough consultation is conducted. This is an opportunity for the patient to discuss desired outcomes, potential risks, and ask questions.\n\nThe surgeon will evaluate the patient’s overall health, examine the buttocks and surrounding areas, and determine the amount of fat available for transfer.\n\nThe surgery is typically conducted under general anesthesia, meaning the patient will be asleep and won’t feel any pain during the procedure. In some minor cases, local anesthesia with sedation might be used.\n\nThe first main step involves liposuction. Fat is removed from donor areas like the abdomen, flanks, thighs, or lower back. These areas are carefully chosen based on the patient’s body and where excess fat is available.\n\n* Incisions for Liposuction: Small, inconspicuous incisions are made in the donor areas.\n\n* Fat Removal: A thin tube, called a cannula, is inserted into these incisions to loosen and extract the fat. The extracted fat is then purified, ensuring that only the best quality fat cells are used for injection.\n\nRelated content: Is Liposuction Right For Me?\n\nOnce the fat is harvested, it undergoes a purification process. This involves spinning the fat at high speeds to separate impurities. Only the best quality fat cells are retained for the BBL. This step is crucial, as purified fat increases the likelihood of successful fat grafting.\n\nThe purified fat is then meticulously injected into the buttocks at various depths and areas. The surgeon uses a refined technique to ensure even distribution and sculpt the buttocks into the desired shape.\n\n* Layering Technique: By layering the fat, the surgeon ensures that the transferred fat has a good blood supply, which increases the survival rate of the grafted fat cells.\n\n* Final Contouring: After the fat has been transferred, the surgeon makes any final adjustments to the shape to ensure a natural and aesthetic result.\n\nThe incisions are then sutured closed. In most cases, dissolvable sutures are used, which will naturally absorb into the body.\n\nAfter the procedure, patients will be dressed in a compression garment to reduce swelling and aid in the healing process. It’s essential to avoid sitting directly on the buttocks or lying on the back for at least two weeks to maximize the survival of the transferred fat cells.\n\nThe Brazilian Butt Lift, while transformative, requires skill, artistry, and an understanding of body proportions. When performed by an experienced surgeon, it offers natural-looking results that can significantly boost confidence and body satisfaction.\n\nAs with any surgery, it’s imperative to understand the process, set realistic expectations, and follow post-operative care recommendations for the best results.\n\nCosts for a BBL can vary considerably depending on geographical location, surgeon’s expertise, facility standards, and other factors.\n\nThe average BBL surgery cost in the US ranges from $5,000 to $15,000.\n\nWhen you ask “how much is bbl cost uk?”, you’re looking at an average range from £6,500 to £10,000.\n\nPrices vary by country, with Eastern European nations often offering cheaper rates. On average, it’s around €5,000 to €10,000.\n\nTurkey, a burgeoning hub for medical tourism, offers competitive prices for cosmetic procedures. A BBL surgery in Turkey can range from $2,500 to $5,000, which includes not just the surgery, but often other amenities like hotel stays, private transportation, and post-operative care.\n\nTurkey has grown to be one of the most popular destinations for medical tourism, especially for cosmetic procedures such as the Brazilian Butt Lift (BBL). An often-asked question is: Why is it more affordable in Turkey compared to other countries?\n\nThe cost of living in Turkey is significantly lower than in many Western countries. This has a direct impact on operational costs, staff salaries, and overheads for clinics and hospitals, making it possible to offer services at a lower price.\n\nThe boom in medical tourism has led to the establishment of numerous state-of-the-art clinics and hospitals, fostering a competitive environment. To attract patients from various countries, these facilities often provide competitive pricing, without compromising on quality.\n\nMany Turkish surgeons and medical professionals have trained abroad, equipping them with international standards and expertise. Yet, due to the reasons mentioned earlier, they’re able to offer their services at a fraction of the cost you might expect in the US, UK, or other European countries.\n\nRecognizing the potential of medical tourism, the Turkish government offers incentives to hospitals and clinics catering to foreign patients. These incentives can help reduce operational costs, which in turn reduces the price for the patient.\n\nThe high demand for cosmetic surgeries in Turkey means that surgeons perform a larger number of procedures, allowing them to achieve economies of scale. This volume can often lead to reduced prices per surgery.\n\nTo cater to international patients, many clinics offer all-inclusive packages. These often combine the surgery, accommodation, transfers, and sometimes even sightseeing. Bundling these services together can lead to cost savings.\n\nThe strength of the US dollar, euro, or pound against the Turkish lira means that international patients get more value for their money. When converted, many medical procedures can be availed at a fraction of the cost that patients would pay in their home country.\n\nWhile the prices for procedures like BBL are more affordable in Turkey, it’s essential to ensure you’re choosing a reputable and accredited facility with experienced surgeons.\n\nThe combination of high-quality healthcare and affordability is what makes Turkey an attractive destination for many looking to undergo cosmetic procedures.\n\nHowever, as always, thorough research and consultation are paramount before making a decision.\n\nConsidering the lower bbl turkey cost, many would assume the quality might be compromised. However, that’s far from the truth. Turkey’s medical infrastructure, state-of-the-art facilities, and highly-trained surgeons offer services that often surpass international standards.\n\nRelated content: Is It Safe to Get Plastic Surgery in Turkey?\n\nTurkey, over the years, has firmly positioned itself as a go-to destination for cosmetic surgery, particularly for the Brazilian Butt Lift (BBL). But what exactly makes Turkey stand out?\n\nLet’s delve into the primary reasons why one might opt for this nation for their BBL procedure:\n\nTurkey boasts numerous state-of-the-art hospitals and clinics, equipped with the latest technology in cosmetic surgery. Many of these facilities have achieved international accreditation, ensuring they meet the highest global standards in healthcare.\n\nThe country’s surgeons are not only well-trained within its borders but many have also received training and certifications from countries known for their medical excellence, such as the US and various European nations. This international exposure ensures that they’re adept at catering to the diverse needs and expectations of foreign patients.\n\nAs previously mentioned, the BBL procedure in Turkey is significantly more affordable than in Western countries. However, this doesn’t mean there’s a compromise on quality. The competitive prices are mainly due to operational reasons and government incentives, not a reduction in the procedure’s quality or safety.\n\nRecognizing the influx of international patients, many Turkish clinics offer packages tailored for this demographic. These packages can include consultations, the surgery, post-operative care, accommodation, transport, and even tourism opportunities. This holistic approach ensures a seamless experience for the patient.\n\nTurkey is not just a medical hub; it’s also a nation rich in culture, history, and natural beauty. Opting for a BBL in Turkey can also provide patients with the unique opportunity to explore renowned sites like Istanbul’s historic spots, the unique landscapes of Cappadocia, or the beautiful beaches of Antalya.\n\nThe positive reviews and testimonials from patients worldwide are testament to Turkey’s excellence in delivering BBL procedures. Many patients cite not only their satisfaction with the results but also the entire medical journey – from consultation to recovery.\n\nPost-operative care is crucial for any surgery. In Turkey, clinics often provide extensive aftercare services, ensuring that the patient’s recovery is on the right track. This care might include regular check-ups, physiotherapy if needed, and 24/7 medical assistance.\n\nMajor cities in Turkey, such as Istanbul and Ankara, are well connected with direct flights from numerous countries, making the journey relatively hassle-free.\n\nIt’s not uncommon for patients to pair their BBL with other cosmetic enhancements:\n\nThese combinations can be more cost-effective and require only one recovery period.\n\nWhen considering a BBL, the cost is inevitably a crucial factor. While the UK offers excellent services, Turkey presents itself as a competitive alternative, providing world-class procedures without the hefty price tag. Weigh your options, conduct thorough research, and choose the best fit for your needs and budget.\n\n Ready to embark on your BBL journey? Let’s shape your dreams! \n\nConnect with us now!              </p>', 'en', '2023-09-27 22:15:19', '2023-10-19 11:41:13', '1'),
(2, 'https://careinturkey.com/wp-content/uploads/2023/08/hair-transplant-swelling-2-2.jpg', 'hair-transplant-swelling-causes-risks-prevent', 'Hair Transplant Swelling Causes Risks Prevent', 2, '<p>\r\n     Hair transplantation has evolved dramatically over the years. Though it offers promising results in restoring hairlines and density, some post-procedure effects can be alarming to patients. Among them, hair transplant swelling is a common concern.\r\n\r\nThis article delves into the causes, areas of concern, and ways to manage swelling post hair transplant.\r\n\r\nSwelling is a natural response after undergoing a surgical procedure like hair transplantation. However, the intensity and duration of this swelling can vary from one patient to another.\r\n\r\nGenerally, the signs of swelling become evident 2-3 days post-surgery and gradually wane after 3-4 days.\r\n\r\nThe affected regions predominantly include the forehead and the areas around the eyes. For some lucky ones, the swelling might be so subtle that it’s barely perceptible. Yet, others might experience a pronounced puffiness, particularly during the initial healing phase.\r\n\r\nTo help individuals understand and gauge their situation, medical professionals classify swelling post hair transplant into distinct grades:\r\n\r\n* Stage 1 — Minimal swelling noticeable only on the upper forehead.\r\n\r\n* Stage 2 — The swelling expands to cover the entire forehead.\r\n\r\n* Stage 3 — Puffiness progresses further, reaching the eyes and upper cheeks.\r\n\r\n* Stage 4 — The swelling intensifies to such an extent that it gives a “black eye” appearance.\r\n\r\nDuring stages 3 and 4, the swelling can be particularly troubling. Some patients might find it challenging to open their eyes due to the extent of the puffiness, adding to their post-operative discomfort.\r\n\r\nHowever, there’s a silver lining. Even the most intense swelling post hair transplant is typically transient and diminishes on its own, rarely necessitating additional medical interventions.\r\n\r\nSwelling is a natural part of the body’s healing response, especially after surgical interventions such as hair transplantation.\r\n\r\nWhen the scalp undergoes trauma or is exposed to incisions, it triggers an inflammatory response, leading to the accumulation of fluid in the tissue. But what specifically causes this swelling in the context of a hair transplant?\r\n\r\n* Inflammatory Response: As soon as the body senses any form of injury, it dispatches white blood cells to the affected area. This sudden rush can cause fluid accumulation, leading to swelling.\r\n\r\n* Fluid Injections: During a hair transplant, surgeons use saline or other solutions to numb the scalp or keep the grafts hydrated. Excess fluid can result in temporary swelling.\r\n\r\n* Gravity’s Influence: Fluid tends to obey gravity. Thus, after a hair transplant, the injected fluid can trickle down from the scalp to the forehead and further down to the eye region, causing pronounced swelling.\r\n\r\n* Sensitivity of the Scalp: The scalp is rich in blood vessels, making it more susceptible to experiencing swelling when subjected to trauma.\r\n\r\n* Duration of Surgery: Longer surgical sessions mean extended exposure to trauma, which can amplify the body’s inflammatory response, leading to more significant swelling.\r\n\r\n* Surgical Technique: The technique employed for transplantation, such as FUE or FUT, can influence the extent of swelling. Some methods might be more invasive than others.\r\n\r\n* Patient’s Individual Reaction: Everyone’s body is different. Some might have a heightened inflammatory response compared to others, leading to varying levels of swelling.\r\n\r\nUnderstanding the causes behind post-operative swelling can be reassuring for patients. It’s crucial to remember that while swelling is a typical part of the post-surgery phase, it’s temporary.\r\n\r\nWith appropriate care and following the surgeon’s post-operative instructions, one can minimize discomfort and expedite the recovery process.\r\n\r\n* Donor Area (usually the back of the scalp).\r\n\r\n* In severe cases, cheeks and further down the face.\r\n\r\nSwelling after a hair transplant is a common occurrence and usually isn’t a cause for concern. However, if left unchecked or in rare circumstances, it can lead to complications or indicate underlying issues.\r\n\r\n* Discomfort and Pain: While swelling in itself isn’t harmful, it can cause discomfort. Swollen areas, especially around the forehead and eyes, can feel tight and tender.\r\n\r\n* Impaired Vision: In cases of pronounced swelling, the eyes can become puffy and partially closed, potentially hampering vision temporarily. This can make everyday tasks challenging and require patients to rest and avoid activities that demand visual precision.\r\n\r\n* Extended Recovery Time: Severe swelling might lengthen the recovery phase. While mild to moderate swelling subsides in a few days, excessive puffiness might take longer, potentially delaying your return to regular activities.\r\n\r\n* Potential for Infection: If the swelling isn’t just a result of the body’s natural response but due to an infection, it’s a serious concern. Infections can cause additional complications, scarring, and may impact the success of the hair transplant.\r\n\r\n* Hematoma Formation: A hematoma is a collection of blood outside of blood vessels, often resulting from trauma or injury. In the context of hair transplantation, if the swelling is accompanied by pain, firmness, and discoloration, it might be a hematoma.\r\n\r\n* Scarring: In rare cases, prolonged swelling might interfere with the healing process, leading to noticeable scars. It’s vital to minimize swelling to ensure the scalp heals smoothly.\r\n\r\n* Aesthetic Concerns: Temporary disfigurement from pronounced swelling can be distressing for patients, impacting their confidence and mental well-being during the recovery phase.\r\n\r\n* Underlying Complications: While rare, excessive swelling can sometimes indicate underlying complications such as an allergic reaction to medications used during the procedure or other unforeseen issues.\r\n\r\nIt’s essential to differentiate between routine post-operative swelling and swelling that might signal complications. Patients should be educated on what to expect post-surgery and when to seek medical attention.\r\n\r\nIf the swelling is accompanied by severe pain, fever, pus, or other unexpected symptoms, it’s crucial to consult with the surgeon immediately. Regular follow-up appointments post-surgery can also help monitor and address any swelling-related concerns promptly.\r\n\r\nIf swelling is accompanied by severe pain, oozing, fever, or hasn’t subsided after 7-10 days, it could indicate an issue. Persistent swelling might hint at issues like infections or an allergic reaction.\r\n\r\nMild to moderate swelling is very common, occurring in about 70% of patients. However, severe swelling extending down to the eyes and face is less frequent.\r\n\r\nTypically, the swelling peaks around the 2nd or 3rd day and gradually subsides. By the end of the first week, most swelling should have resolved.\r\n\r\nSwelling is a natural reaction of the body to surgery, including hair transplantation. While complete prevention may not always be possible due to individual body responses, there are several measures that can be taken to significantly reduce the intensity and duration of post-operative swelling.\r\n\r\n* Elevate Your Head: During the initial days post-surgery, it’s beneficial to keep your head elevated, even while sleeping. Using multiple pillows or a recliner can be helpful. This aids in reducing the fluid accumulation in the facial area.\r\n\r\n* Avoid Physical Exertion: Strenuous activities, workouts, or bending over can increase blood flow to the scalp, potentially exacerbating the swelling. It’s best to rest and relax for the first few days after the procedure.\r\n\r\n* Cold Compress: Applying a cold compress around the swollen area (but not directly on the grafts) can soothe and reduce puffiness. Remember to wrap the ice pack in a cloth to avoid direct contact with the skin.\r\n\r\n* Medication: Some surgeons prescribe specific anti-inflammatory medications or steroids to manage swelling. Always follow the prescribed dosage and consult your doctor if you notice any unusual side effects.\r\n\r\n* Stay Hydrated: Drinking ample water can aid in flushing out toxins and reducing fluid accumulation in the body.\r\n\r\n* Avoid Alcohol and Smoking: Both alcohol and nicotine can interfere with the body’s natural healing processes. It’s best to abstain from both at least a week before and after the surgery.\r\n\r\n* Salt Intake: Reduce your salt intake. Excess sodium can lead to water retention, potentially intensifying swelling.\r\n\r\n* Gentle Massaging: Gentle massaging (as directed by the surgeon) around the swollen area can improve blood circulation and alleviate swelling. Never massage directly on the grafts.\r\n\r\n* Stay Informed: It’s crucial to follow all post-operative care instructions provided by your surgeon. Being informed about what to expect can help you take timely measures if something doesn’t seem right.\r\n\r\n* Regular Check-ups: Attend all your scheduled post-surgery check-ups. This ensures that any signs of unusual swelling can be promptly addressed by the medical professional.\r\n\r\nWhile some degree of swelling is to be expected after a hair transplant, following these tips can help in minimizing its intensity and ensuring a more comfortable recovery.\r\n\r\nAlways remember that communication with your surgeon is key: if you notice anything out of the ordinary or have concerns, reach out to them for guidance.\r\n\r\nSwelling after a hair transplant, while common, can be managed effectively with proper care and guidance. It’s crucial to understand the procedure’s nuances, have realistic expectations, and follow the surgeon’s advice diligently. If you’re considering or have undergone a hair transplant, knowing what to expect post-surgery can offer peace of mind.\r\n\r\nFor more personalized advice or concerns, feel free to reach out to us at Care in Turkey.            </p>', 'en', '2023-09-27 22:17:05', '2023-12-06 14:44:40', '1'),
(3, 'https://images.pexels.com/photos/4226924/pexels-photo-4226924.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260', 'transform-your-shape-with-a-mini-bbl', 'Transform Your Shape with a Mini BBL', 3, '<p>In today’s world, a strong, firm, and shapely buttock is a symbol of feminine beauty and vitality. However, not everyone is blessed with a naturally round and firm derriere, which is why many turn to plastic surgery.\n\nA popular choice is the Brazilian Butt Lift (BBL), but for those looking for a less invasive and more affordable option, the mini BBL has emerged as an attractive alternative. In this article, we will delve into the finer details of the mini BBL, covering aspects from cost to recovery, and from risks to results.\n\nA mini Brazilian Butt Lift (BBL) is a less invasive version of the traditional BBL. It involves the transfer of a smaller volume of fat to the buttocks to create a more subtle enhancement. Unlike a full BBL, which may require general anesthesia, a mini BBL can often be performed under local anesthesia.\n\nYou might be a suitable candidate for a mini BBL if you want a subtle buttock enhancement without the need for large amounts of fat transfer. Those with a smaller frame or those who do not require or desire a significant size increase can also benefit from a mini BBL. Additionally, the procedure is suitable for those who prefer a shorter recovery time and a less invasive surgery.\n\nThe cost of a mini BBL varies depending on a number of factors, including geographical location, the surgeon’s experience, and the complexity of the procedure. On average, it can range from $4,000 to $10,000.\n\nThe cost of a mini BBL in Turkey is typically between $2,500 and $5,000, which is considerably less than the costs often encountered in Western countries.\n\nThe reason for this affordability is largely due to the lower operational and labor costs in the country, as well as a favorable exchange rate for many international patients.\n\nFurthermore, Turkey has made significant investments in its healthcare infrastructure, striving to become a leading destination for medical tourism. As such, patients not only benefit from the cost-effectiveness but also from high-quality medical care, state-of-the-art facilities, and experienced surgeons specializing in the field of cosmetic surgery.\n\nWhile both procedures aim to enhance the buttocks, the primary difference lies in the volume of fat transferred.\n\nA standard BBL aims to provide a significant enhancement and requires a larger volume of fat, often sourced from multiple areas of the body.\n\nOn the other hand, a mini BBL involves a smaller fat transfer for a more subtle result and is ideal for those looking for a modest size increase or those with limited fat resources.\n\n• Less invasive: Mini BBL requires less fat transfer and can often be done under local anesthesia.\n\n• Shorter recovery time: As a less invasive procedure, the recovery time for a mini BBL is generally shorter.\n\n• Subtle enhancement: The procedure is ideal for individuals seeking a subtle increase in buttock size and shape.\n\n• Fewer donor sites needed: With less fat required for the procedure, fewer areas of the body are needed for fat harvesting.\n\nPreparation for a mini BBL is similar to that of a standard BBL. It includes a pre-operative consultation, getting a medical evaluation, adjusting current medications if needed, avoiding smoking, and avoiding certain medications that can increase bleeding.\n\nIn a mini BBL procedure, fat is harvested from one or two areas of the body, processed, and then injected into the buttocks. The procedure usually takes 2 to 3 hours and is performed under local anesthesia.\n\nRecovery from a mini BBL usually takes about 2 weeks, but the precise timeline varies from patient to patient. During this period, you will need to avoid sitting directly on your buttocks and sleeping on your back to prevent pressure on the treated areas.\n\nTypically, about 60 to 80 percent of the transferred fat survives after a mini BBL. The rest is naturally absorbed by the body. The survival of the fat depends on factors such as the technique used by the surgeon, the patient’s lifestyle, and post-operative care.\n\nA mini BBL can help enhance the size and shape of the buttocks, giving them a more rounded and uplifted appearance. The results are usually more subtle compared to a standard BBL, making it a great option for individuals seeking a natural-looking enhancement.\n\nThe results of a mini BBL are immediately noticeable, but the final results can take up to 6 months to become apparent. This is due to the time it takes for the transferred fat to establish a blood supply and for swelling to subside.\n\nAs with any surgical procedure, a mini BBL carries risks such as bleeding, infection, and complications related to anesthesia. However, the risks are generally lower compared to a full BBL due to the procedure’s less invasive nature.\n\nBefore and after pictures are a great way to understand the potential results of a mini BBL. They show real outcomes and provide a tangible way for you to visualize what the procedure can achieve.\n\nA mini BBL is a great option for those seeking a less invasive, more subtle buttock enhancement. Always make sure to choose a certified and experienced plastic surgeon to ensure safe and satisfying results.\n\nYes, a mini BBL can help fill in hip dips or ‘violin hips’, creating a smoother and rounder silhouette.\n\nIn Turkey, a mini BBL generally costs between $2,500 and $5,000, significantly less than in many Western countries due to lower operational and labor costs.\n\nTurkey is known for its high-quality cosmetic surgery clinics and experienced surgeons. Many people choose to have their mini BBL surgery in Turkey due to the affordable prices and excellent patient care. Check out our blog post about Is It Safe to Get Plastic Surgery in Turkey?\n\nThe results of a mini BBL are long-lasting. The transferred fat that survives will stay in the buttocks permanently. However, significant weight changes and aging can still affect the results over time.\n\nAfter a mini Brazilian Butt Lift, it’s generally recommended to avoid sitting directly on your buttocks for at least two weeks post-surgery. This is because sitting can put pressure on the newly transferred fat cells, possibly causing them to die.\n\nAfter this period, it’s suggested to use a BBL pillow, which allows you to sit without putting pressure on the buttocks, until you reach the six-week mark post-surgery.\n\nThe ideal Body Mass Index (BMI) for a mini BBL procedure is typically between 20 and 30. This range allows surgeons to have an adequate amount of fat to transfer while ensuring the patient is healthy enough for surgery.\n\nHowever, the exact BMI requirement may vary depending on the individual’s health status and the surgeon’s discretion.\n\nPatients are usually advised to avoid tight clothing, such as jeans, for at least six to eight weeks after a BBL. Tight clothing can compress and damage the newly transferred fat cells, potentially affecting the final results of the surgery. It’s recommended to wear loose, comfortable clothing during the recovery period.\n\nAfter a BBL, you should avoid sleeping on your back to prevent any pressure on the buttocks area. Instead, sleep on your stomach or side. You may also use specially designed post-surgery pillows to keep pressure off the buttocks while sleeping. Following these instructions is critical for the first few weeks after the procedure to help maximize the survival rate of the transferred fat cells.         </p>', 'en', '2023-09-27 22:15:19', '2023-10-19 11:35:43', '1'),
(4, 'https://careinturkey.com/wp-content/uploads/2023/08/breast-reduction-on-nhs-blog-1.jpg', 'is-turkeys-cosmetic-surgery-safe', 'Is Turkey&#039;s Cosmetic Surgery Safe?', 4, '<p>In recent years, Turkey has become a notable hub for medical tourism, with plastic surgery leading the pack. Tourists from all corners of the globe are increasingly exploring Turkey for their cosmetic transformations.\r\n\r\nBut the main question remains: Is it safe to get plastic surgery in Turkey? Let’s delve into this in detail.\r\n\r\nSafety has been a paramount concern for patients considering surgery in Turkey. The answer, based on numerous factors, is yes — Turkey is a safe destination for plastic surgery. However, just as with any medical procedure, anywhere in the world, certain guidelines should be followed.\r\n\r\nMedical tourism in Turkey has experienced significant growth over the past few years, transforming the nation into a key global player in the sector. With its strategic geographical location, combining elements of both the East and the West, high-quality healthcare services at affordable rates, and state-of-the-art facilities, Turkey presents an attractive destination for international patients. Here’s an overview of the scale and significance of medical tourism in the country:\r\n\r\nAccording to various reports and studies, Turkey ranks among the top 10 destinations worldwide for medical tourism.\r\n\r\nThe country receives over 700,000 medical tourists annually, generating a revenue that exceeds a billion US dollars.\r\n\r\nWhile Turkey offers a broad range of medical services to tourists, it’s particularly renowned for its dental care, cosmetic surgeries, hair transplants, cardiology, and orthopedics.\r\n\r\nAdditionally, the country has seen a surge in patients seeking oncology, neurosurgery, and fertility treatments.\r\n\r\nCities such as Istanbul, Ankara, Antalya, and Izmir are the primary hubs for medical tourism. Istanbul alone hosts several internationally accredited hospitals.\r\n\r\nTurkish hospitals in the medical tourism sector often possess international accreditations, such as from the Joint Commission International (JCI).\r\n\r\nThe healthcare professionals, including many doctors and surgeons, have trained or practiced abroad, ensuring they’re familiar with the latest techniques and standards in the medical field.\r\n\r\nRecognizing the potential of medical tourism, the Turkish government has introduced several incentives and initiatives to boost this sector. This includes promoting Turkish medical tourism at international fairs, easing visa regulations for medical tourists, and establishing the “Health Tourism Coordination Council” to oversee and develop strategies for the industry.\r\n\r\nOne of the primary reasons for the surge in Turkey’s medical tourism is the cost advantage. Medical services in Turkey can be 50-70% cheaper than in Europe, the US, or the UK, without compromising on quality.\r\n\r\nBeyond the medical services, patients are also drawn to Turkey’s rich cultural heritage, scenic beauty, and therapeutic natural resources like thermal springs. This provides an opportunity for patients to combine their medical trips with leisure and relaxation.\r\n\r\nThe medical tourism industry in Turkey is robust and continues to flourish, driven by the combination of quality healthcare services, competitive prices, government initiatives, and the country’s natural and historical attractions. As Turkey continues to invest in its healthcare infrastructure and maintains its focus on high standards, it’s poised to become an even bigger powerhouse in global medical tourism in the years to come.\r\n\r\n* World-class Medical Standards: Many Turkish hospitals are internationally accredited by top healthcare organizations, ensuring they meet global standards.\r\n\r\n* Experienced Surgeons: Turkish plastic surgeons often train globally, acquiring the highest quality of education and experience, on par with their Western counterparts.\r\n\r\nThe cost of plastic surgery in Turkey is significantly lower than in many Western countries. Factors influencing this include:\r\n\r\nUndergoing surgery abroad, often referred to as “medical tourism,” has gained popularity due to potential cost savings, access to specialized treatments, and the opportunity to combine medical care with travel. However, there are inherent risks associated with getting surgical procedures in a foreign country. By taking some careful steps, these risks can be minimized:\r\n\r\n* Accreditations: Check if the hospital or clinic is accredited by internationally recognized organizations like the Joint Commission International (JCI) or the International Society for Quality in Health Care (ISQua).\r\n\r\n* Facilities: Ensure the institution has up-to-date equipment, modern facilities, and adheres to international standards of care.\r\n\r\nEnsure the surgeon has the necessary qualifications and training. Many surgeons practicing in top-tier hospitals abroad have received training or certifications from western countries.\r\n\r\nAsk about their experience with the specific procedure you’re considering and the number of such surgeries they’ve performed.\r\n\r\nLook for reviews from previous patients. Websites, forums, and medical tourism platforms can provide insights into patient experiences.\r\n\r\nRemember to approach overly positive or negative reviews with a degree of skepticism and look for consistent patterns in feedback.\r\n\r\nEnsure you have a clear understanding of all costs involved, including post-surgical care, accommodation, and any potential follow-up treatments.\r\n\r\nRemember, while cost savings is a significant factor for many, it should not be at the expense of quality and safety.\r\n\r\nPost-surgical care is crucial for recovery. Ensure you understand the recovery timeline and have arrangements for staying nearby during the initial recovery phase.\r\n\r\nDiscuss follow-up care once you return to your home country. Ensure your local healthcare provider knows about your surgery abroad and is prepared to assist in post-operative care.\r\n</p><p><br></p><p>\r\nPost-surgery, traveling, especially flying, can pose risks due to potential complications like blood clots. Discuss the best time to travel post-surgery with your surgeon.\r\n\r\nConsider travel insurance that covers medical procedures abroad and potential complications.\r\n\r\nEnsure that the medical team speaks your language or provides a translator. Effective communication is vital to understand pre-surgery instructions and post-operative care.\r\n\r\nUnderstand your rights as a patient in the foreign country. In case of complications or malpractice, know the legal recourse available.\r\n\r\nSome countries might have practices or standards different from your home country. Ensure that you’re comfortable with these differences.\r\n\r\nBe aware of cultural norms, practices, and expectations. This understanding will help in smoother interactions and a more comfortable stay.\r\n\r\nAlthough one always hopes for the best outcomes, it’s essential to have a plan in place if complications arise. Know the nearest emergency facilities and have a local contact or advocate who can assist if needed.\r\n\r\nTurkey, particularly cities like Istanbul and Antalya, has become a major hub for medical tourism, with plastic surgery being among the most sought-after specialties.\r\n\r\nThe combination of top-notch medical facilities, highly skilled surgeons, and competitive prices makes Turkey a preferred destination for a variety of cosmetic procedures. Below, we dive into some of the most popular types of plastic surgeries available in Turkey:\r\n\r\nOne of the most common cosmetic surgeries globally, rhinoplasty involves reshaping or resizing the nose to achieve a desired aesthetic or functional outcome.\r\n\r\nTurkish surgeons are renowned for their expertise in this intricate procedure, often combining traditional methods with the latest techniques.\r\n\r\n* Breast Augmentation: Involves using implants or fat transfer to increase breast size.\r\n\r\n* Breast Lift: Raises sagging breasts by removing excess skin and tightening the surrounding tissue.\r\n\r\n* Face Lift (Rhytidectomy): Removes wrinkles and provides a more youthful appearance by tightening the skin.\r\n\r\n* Blepharoplasty: A surgery for eyelids, it can be performed on the upper lids, lower lids, or both.\r\n\r\nA procedure to remove excess body fat from specific areas, providing a more contoured shape. Common areas include the abdomen, thighs, buttocks, and arms.\r\n\r\nThis surgery removes excess fat and skin from the abdominal region, often post-pregnancy or significant weight loss, to give a firmer and smoother appearance.\r\n\r\nWith advanced techniques like Follicular Unit Extraction (FUE) and Follicular Unit Transplantation (FUT), Turkey has become a global leader in hair transplantation, drawing patients from around the world.\r\n\r\nProcedures like arm lift (brachioplasty), thigh lift, and body lift are performed to remove excess skin and fat from specific areas, typically after substantial weight loss.\r\n\r\nThis includes procedures like labiaplasty, vaginoplasty, and penile enlargement surgeries.\r\n\r\nWhile the focus here is on aesthetic procedures, it’s important to note that many plastic surgeons in Turkey also specialize in reconstructive surgeries, addressing congenital disabilities, trauma-related injuries, and post-cancer reconstructions.\r\n\r\nTurkey’s reputation in the field of plastic surgery continues to grow, backed by state-of-the-art facilities and surgeons trained in some of the world’s best institutions. Whether you’re seeking subtle changes or transformative results, Turkey offers a comprehensive range of procedures to cater to diverse aesthetic goals.        </p>', 'en', '2023-09-27 22:17:05', '2024-06-03 04:00:58', '1'),
(5, 'https://careinturkey.com/wp-content/uploads/2023/08/hair-transplant-after-10-years-header-1.jpg', 'hair-transplant-after-10-years', 'Hair Transplant After 10 Years', 5, '<p>For those looking to combat hair loss, hair transplant surgeries have emerged as a groundbreaking solution. As a procedure that’s been around for decades, questions arise about its long-term sustainability, especially what to expect from a hair transplant after 10 years.\n\nLet’s dive deep into this topic and shed some light on those long-term results and considerations.\n\nHair transplantation is a surgical procedure where hair follicles are harvested from a donor area (typically the back or sides of the scalp) and implanted into thinning or balding regions.\n\n* FUT (Follicular Unit Transplantation): Also known as strip harvesting, a strip of the scalp is removed, and individual hair follicles are extracted and implanted.\n\n* DHI (Direct Hair Implantation): A more advanced form of FUE where hair follicles are implanted directly without prior holes being made.\n\n* Robotic Hair Transplant: Utilizes robotic technology for precision in extracting and implanting hair follicles.\n\nWith advancements in technology, the success rate of hair transplants has increased to above 90%, meaning a significant majority of the transplanted hairs will grow successfully.\n\nUnderstanding how hair regrows after a transplantation procedure requires a glimpse into both the mechanics of the surgery and the biology of hair growth.\n\nFirst and foremost, it’s crucial to understand what happens during the hair transplantation surgery:\n\n* Hair Follicle Extraction: The process begins by harvesting healthy hair follicles, typically from the back or sides of the scalp. This area is known as the ‘donor site’.\n\n* Site Preparation: Small incisions are made at the target area, known as the ‘recipient site’, where hair growth is desired.\n\n* Implantation: The harvested follicles are then meticulously implanted into these incisions.\n\nAfter the transplantation, most of the newly transplanted hairs undergo a shedding phase. This is completely normal and is a part of the natural hair growth cycle. The initial shedding usually occurs within 2 to 6 weeks post-surgery. At this stage, the hair shaft falls off, but the root remains intact and goes into a resting phase.\n\nOnce the transplanted hair sheds, the follicles enter a dormancy period that can last anywhere from 2 to 4 months. During this time, little to no hair growth is observed.\n\nAfter the dormancy period, the transplanted hair follicles start to produce new hair shafts. This growth phase, also known as the anagen phase, can last for several years. The new hairs gradually become thicker and longer over the next 6 to 12 months.\n\nBy the 12th to the 18th month, the results of the hair transplant are typically fully visible. The transplanted hairs will continue to go through the regular phases of the hair growth cycle, including the growth (anagen), transitional (catagen), and resting (telogen) phases.\n\nIt’s worth noting that while the transplanted hairs are resistant to the hormone DHT (which causes hair thinning and loss in genetically predisposed individuals), surrounding non-transplanted hair may still be susceptible to thinning. This is why some patients might opt for subsequent procedures to maintain a fuller appearance over time.\n\nHair regrowth post-transplantation is a process that requires patience. It’s a journey that unfolds over months, not days, but the results—natural-looking, fuller hair—are often well worth the wait.\n\nThe scalp is made up of layers, and hair follicles are implanted into the dermis, where they establish a blood supply and grow.        </p>', 'en', '2023-09-27 22:15:19', '2023-10-19 11:53:11', '1');
INSERT INTO `article` (`Id`, `Img`, `Slug`, `Title`, `Order`, `Content`, `Lang`, `create_at`, `update_at`, `Status`) VALUES
(6, 'https://careinturkey.com/wp-content/uploads/2023/08/full-mouth-dent-blog-1.jpg', 'full-mouth-dental-implants-turkey-package-deals', 'Full Mouth Dental Implants Turkey Package Deals', 6, '<p>Full mouth dental implants, as the name suggests, offer a comprehensive solution for individuals who have lost most or all of their teeth, be it due to trauma, disease, or age. This method provides a permanent, fixed alternative to traditional dentures, ensuring functionality similar to natural teeth and eliminating many of the challenges associated with removable dentures.\n\nA full mouth dental implant procedure involves placing a series of titanium posts into the jawbone, which act as artificial tooth roots. These posts anchor a set of prosthetic teeth, giving patients a full set of teeth that are not only aesthetically pleasing but also highly functional.\n\n* Personalized Treatment: One of the remarkable aspects of full mouth dental implants is the personalized treatment approach. Every individual’s dental structure is unique, and so is their need for implants. The number of implants required, the positioning, and the type of prosthesis chosen are all tailored to meet the specific needs of the patient.\n\n* Restoration of Functionality: Losing teeth can severely impact an individual’s ability to chew and speak correctly. Full mouth implants restore this lost functionality, allowing individuals to eat a wider variety of foods and speak without the fear of slipping dentures.\n\n* Aesthetic Excellence: With advancements in dental technology, the prosthetic teeth used in full mouth implants are meticulously designed to look and feel like natural teeth. Their color, shape, and size are matched to ensure they blend seamlessly, enhancing the facial aesthetics of the individual.\n\n* Bone Health: Just like individual dental implants, full mouth implants play a crucial role in preserving the jawbone. They provide the necessary stimulation to prevent bone deterioration, commonly seen after the loss of teeth.\n\n* Durability and Longevity: Given the robust nature of the titanium posts and the quality of prosthetic teeth, full mouth dental implants are built to last. With proper oral hygiene and regular dental check-ups, they can serve the individual for a lifetime.\n\n* Convenience and Comfort: Unlike removable dentures that require daily removal, cleaning, and the application of adhesives, full mouth implants are fixed. This eliminates the daily hassles associated with dentures. Moreover, they feel more comfortable as they are anchored firmly, eliminating the typical discomfort or sore spots caused by dentures.\n\n* Improved Quality of Life: The psychological impact of losing teeth can’t be overlooked. Many individuals feel self-conscious about their appearance, which affects their social interactions and self-esteem. Full mouth dental implants provide a renewed sense of confidence, allowing individuals to smile, laugh, and engage in social activities without any reservations.\n\nIn essence, full mouth dental implants offer a transformative experience. They address not just the dental needs but also significantly enhance the overall quality of life, making them an invaluable solution for those looking to regain their oral health and confidence.\n\nFull mouth dental implants have revolutionized the way dental professionals’ approach total tooth loss. Tailored to meet the varied needs of patients, these implant systems have distinct features and benefits. Let’s delve into the three primary types of full mouth dental implants: All on 4, All on 6, and All on 8.\n\nThe “All on 4” system relies on placing four dental implants strategically in the jawbone to support an entire arch of prosthetic teeth. Two implants are positioned vertically in the front, while the other two are tilted at angles (usually around 45 degrees) in the back. This angulation provides additional stability and takes advantage of the available bone.\n\n* Minimized Bone Grafting: The unique angulation often eliminates the need for bone grafting, even in patients with reduced bone volume.\n\n* Speedy Treatment and Recovery: The All on 4 approach can often allow immediate loading, meaning a provisional prosthetic can be placed on the same day as the implants.\n\n* Cost-Effective: Requiring fewer implants than other methods, this can be a more affordable full mouth restoration option.\n\nPatients with significant bone loss, who want a quicker solution without the extensive process of bone grafting.\n\nThis system involves placing six dental implants in the jaw to anchor a full arch of teeth. The distribution is such that it provides a wider spread and more robust support for the prosthetic.\n\n* Greater Stability: With six points of contact, the prosthetic arch enjoys enhanced stability and strength.\n\n* Distributed Load: The forces exerted during chewing are better distributed, mimicking the natural distribution of tooth roots.\n\n* Flexibility: The additional implants offer more flexibility in placement, accommodating variations in jawbone structures.\n\nPatients with a good amount of residual bone and seeking a balance between stability and cost.\n\nAs the name suggests, this system employs eight dental implants to support the full arch of prosthetic teeth. This is often considered the most robust and stable among the three options.\n\n* Maximum Stability: With eight implants, the prosthesis is anchored firmly, ensuring minimal movement.\n\n* Longevity: The distribution of force across more implants reduces the wear and tear on individual implant sites.\n\n* Optimal Load Distribution: More implants mean the chewing forces are dispersed more evenly, closely resembling natural tooth function.\n\nPatients seeking the most durable and stable option, especially those with ample jawbone volume and density.\n\nIn determining which type of full mouth dental implant system is best for an individual, various factors come into play, such as bone density, patient’s oral habits, budget, and desired outcomes. A comprehensive evaluation by a dental implant specialist is essential to guide patients toward the most appropriate solution.\n\nTurkey has emerged as a leading destination for dental tourism, attracting patients from all corners of the globe. Full mouth dental implants, in particular, are one of the most sought-after procedures. The reasons for this boom are numerous, and they highlight the unique advantages of undergoing this transformative treatment in Turkey:\n\n* Affordability: Turkey offers full mouth dental implant procedures at a fraction of the cost found in Western Europe, North America, or Australia. This price difference does not equate to a compromise in quality. Instead, it’s due to the favorable exchange rates, lower operational costs, and different healthcare infrastructures.\n\n* Comprehensive Package Deals: Many dental clinics offer package deals that include the treatment, accommodation, and sometimes even sightseeing. These all-inclusive packages further reduce the financial strain on patients.\n\n* Skilled Specialists: Turkish dental surgeons and implantologists are often trained in some of the world’s best institutions. Many have international exposure and certifications.\n\n* State-of-the-Art Facilities: Dental clinics in Turkey, especially those catering to international patients, are equipped with the latest technology and adhere to global standards of sterilization and patient care.\n\n* Top-Notch Brands: As mentioned, some clinics, like Care in Turkey, employ Swiss-made Straumann implants and German-made Ivoclar crowns, which are internationally recognized for their quality and longevity.\n\n* Regulated Products: The dental products used are strictly regulated to ensure they meet international quality and safety standards.\n\nHolistic Patient Experience:\n\n* Dental Tourism: Beyond the dental treatment, patients can enjoy the rich cultural, historical, and natural beauty of Turkey. From the unique landscapes of Cappadocia to the stunning architecture of Istanbul, it becomes more than just a medical trip.\n\n* Personalized Care: The hospitality in Turkey is renowned. Dental clinics often offer personalized services, including airport pickups, dedicated translators, and post-treatment care.\n\n* Streamlined Processes: Thanks to the influx of international patients, many clinics have optimized their procedures to offer quick yet comprehensive treatments. This means shorter waiting times and more efficient treatment processes.\n\n* Immediate Loading: Some implant procedures, like All-on-4, allow for immediate loading, so patients can walk out with a full set of teeth after their appointment.\n\n* Guarantees and Warranties: Many dental clinics in Turkey offer extended warranties on their dental implants, reflecting their confidence in the treatment’s success and durability.\n\n* Continuous Support: Even after patients return to their home countries, many Turkish clinics offer guidance and support for post-procedure care and any concerns.\n\nOpting for full mouth dental implants in Turkey is not merely a decision based on cost. It’s a comprehensive experience that blends top-tier dental care with the opportunity to explore one of the world’s most enchanting destinations. The blend of professional expertise, state-of-the-art facilities, and the warmth of Turkish hospitality makes it an unbeatable choice for many.\n\nMany patients have seen a transformative change, not just in their smiles but in their overall facial structure and confidence levels. Reviews often touch upon the life-changing benefits they’ve enjoyed post-procedure.   </p>', 'en', '2023-09-27 22:17:05', '2023-10-19 11:52:33', '1'),
(7, 'https://careinturkey.com/wp-content/uploads/2023/08/anterior-open-bite-surgery-1.jpg', 'complete-guide-to-anterior-open-bite-surgery', 'Complete Guide to Anterior Open Bite Surgery', 7, '<p>An open, confident smile is a powerful communication tool. It radiates warmth, friendliness, and positivity. But what if you’re hesitant to smile because of an anterior open bite?\n\nThis orthodontic condition can affect not only your appearance but also your ability to speak, eat, and sometimes even breathe correctly. The good news is, medical advancements have led to solutions like anterior open bite surgery, which can significantly improve your oral functionality and enhance your confidence.\n\nIn this article, we’ll delve into the details of anterior open bite, its implications, and the corrective procedures available.\n\nAn open bite refers to a condition where the upper and lower teeth do not meet when the mouth is closed, leading to a space or gap between the teeth. The condition can be categorized into anterior and posterior open bites.\n\nAn anterior open bite, our main focus, is when there’s a noticeable gap between your upper and lower front teeth while your back teeth are clenched together. This can cause difficulty biting into foods, speaking, and may impact your overall appearance.\n\nSeveral signs and symptoms could suggest that you have an open bite. These include:\n\n* Difficulty biting into foods without your front teeth\n\n* Appearance of a gap between your upper and lower front teeth when your mouth is closed\n\n* Breathing through the mouth instead of the nose\n\n“There are two types of open bite, anterior and posterior. Anterior open bite is more common and occurs in 1.5% to 11% of open bite cases; the percentage varies among ethnicity and age.”\n\nAn Anterior Open Bite (AOB) is a type of malocclusion where the front teeth, both upper and lower, do not touch when the mouth is closed. This leaves a gap or an opening, often making it difficult to bite into thin objects such as a slice of cheese or apple. While this condition can sometimes be genetic, it’s also commonly associated with habits like thumb sucking or prolonged pacifier use during childhood, tongue thrusting, or jaw misalignment.\n\nIf not treated early, an anterior open bite can result in speech problems such as lisping and can also affect facial aesthetics.\n\nA Posterior Open Bite refers to the condition where the back teeth (molars and premolars) don’t make contact when the jaw is closed, leaving a space between the upper and lower sets of teeth. This type of open bite can be a result of various factors such as abnormal growth of the jawbone, thumb sucking, or other oral habits. A posterior open bite can lead to difficulties in chewing and may put undue pressure on the front teeth, potentially leading to premature wear.\n\nMoreover, like an anterior open bite, this condition might impact speech and the overall appearance of the individual.\n\nThe causes of an open bite are often multi-factorial. They include:\n\nTreatment options for open bite range from orthodontic appliances like braces and retainers to surgical interventions. The choice depends on the severity of the open bite and the patient’s age, overall health, and personal preferences.\n\nOrthognathic surgery, also known as corrective jaw surgery, can be a highly effective solution for severe open bite cases. It involves repositioning the upper jaw, lower jaw, or both to ensure that the teeth meet correctly. This helps improve biting and chewing functionality, speech, and appearance.\n\nLeaving an open bite untreated can lead to several problems over time. These include difficulty in biting and chewing, speech issues, breathing problems, jaw pain, and self-esteem issues due to the gap between the front teeth. An untreated open bite can also worsen over time.\n\nA thorough evaluation by an experienced orthodontist or oral surgeon can help determine whether you need jaw surgery to correct an open bite. They would assess the severity of your condition, the impact on your life, your overall health, and discuss your personal goals and preferences.\n\nPost-surgery, you might experience some swelling and discomfort, which are manageable with prescribed medications. A specific diet and oral hygiene routine may also be recommended. Regular follow-ups with your surgeon are critical to monitor your recovery and ensure the best outcome.\n\nYes, anterior open bite can be fixed through orthodontic treatment or surgery, depending on its severity.\n\nYes, an open bite can contribute to TMJ disorders, leading to jaw pain and discomfort.\n\nYes, correcting an open bite through jaw surgery can change your facial appearance, often enhancing the profile and improving aesthetics.\n\nIn most cases, jaw surgery does not affect the voice. However, some changes in resonance might be noticed initially after surgery, which usually resolves with time.\n\nRecovery times vary among individuals but typically range from a few weeks to a few months.\n\nIn most cases, the jaw isn’t wired shut after surgery. However, your surgeon might use rubber bands to guide your jaw into the correct position.\n\nYou can open your mouth immediately after surgery. However, significant movements should be limited initially to avoid disrupting the healing process.\n\nNot all open bites require surgery. Mild cases can be corrected with orthodontic treatment alone.\n\nWithout intervention, an open bite can worsen over time, leading to more pronounced symptoms.\n\nYes, an open bite can affect the jawline, often making it appear less defined. Correcting an open bite can enhance the jawline’s appearance.\n\nIf you’re facing challenges due to an anterior open bite, there are effective solutions available, including jaw surgery. Make sure to seek the help of an experienced professional who can guide you through the process. Remember, the first step towards a confident smile is just a consultation away. Reach out to us today to explore your options. Your perfect smile awaits you!  </p>', 'en', '2023-09-27 22:15:19', '2023-10-19 11:51:54', '1'),
(8, 'https://careinturkey.com/wp-content/uploads/2023/08/breast-reduction-nhs.jpg', 'breast-reduction-on-nhs-what-to-know', 'Breast Reduction on NHS: What to Know', 8, '<p>Breast reduction surgery can be a life-changing procedure for many, offering both physical and psychological relief. A common question that arises for many potential patients in the UK is: “Can I get a breast reduction on the NHS?”\n\nLet’s delve deep into the criteria and processes associated with NHS breast reduction services.\n\nTo have a breast reduction through the NHS, specific eligibility criteria must be met. These typically include:\n\n* Physical symptoms: Chronic back or neck pain, rash or skin irritation under the breasts, and indentations caused by bra straps.\n\n* BMI: Typically, a stable BMI of less than 27 for a defined period.\n\n* Other treatments: Unsuccessful trials of other treatments like physiotherapy.\n\n* Non-smoking: Smoking can increase the risk of complications.\n\nYour GP is your first port of call. They’ll discuss your physical and psychological symptoms with you and, if they believe you may meet the criteria, they’ll refer you to a breast surgeon for an expert opinion.\n\nBefore embarking on this surgical journey, some essential factors demand consideration.\n\nWhen contemplating breast reduction surgery, it’s crucial to have a comprehensive discussion with both a GP and a qualified surgeon. This ensures you’re fully informed about the expected outcomes and understand the risks involved.\n\nBefore you make a decision, consider the following:\n\n* A significant reduction might drastically change the appearance and contour of your breasts.\n\n* Post-surgery, there’s potential for scarring and potential changes in nipple sensitivity or sensation.\n\n* Even after surgery, factors like weight gain or loss can cause your breasts to alter in size and shape.\n\n* Pregnancy can lead to an increase in breast size, and post-reduction surgery might impede your ability to breastfeed. If you’re considering having more children, this is a factor to weigh.\n\n* For those with exceptionally large breasts, the advantages of a reduction might be overwhelmingly positive, making potential issues negligible.\n\nHowever, for individuals with only moderately enlarged breasts, the potential benefits might not outweigh the associated risks. Making an informed choice is essential.\n\nYes, males can also get a breast reduction on the NHS, especially if they suffer from gynecomastia, which leads to enlarged breast tissues. The criteria for eligibility can be different and often hinges on related physical or psychological distress.\n\nYou might be ineligible if you:\n\n* Have a high BMI without trying to reduce it first.\n\n* Are a smoker who hasn’t tried quitting.\n\n* I’m not eligible, what can I do?\n\nIf you’re not eligible for an NHS breast reduction, consider consultations with private clinics or exploring surgery abroad.\n\nUpon meeting the criteria and after consultations, your healthcare provider can place you on the NHS waiting list. This varies in length based on demand and regional factors.\n\nThis varies by region, hospital, and the current demand for the surgery. Generally, wait times can range from a few months to over a year.\n\nAbsolutely. Many individuals opt for private clinics in the UK, although this comes with significant costs.\n\nMany countries offer breast reduction surgery at a lower cost than the UK. However, ensure thorough research on the hospital’s credentials, surgeon’s expertise, and the country’s medical standards.\n\nIn recent years, Turkey has emerged as a top destination for cosmetic surgery, particularly breast reduction. Several factors contribute to its rising popularity:\n\nTurkey offers breast reduction surgeries at a fraction of the cost compared to the USA, UK, and many European countries. Even with travel and accommodation expenses, the overall cost often remains significantly lower.\n\nTurkey boasts modern medical facilities that adhere to international standards. Many are accredited by global healthcare organizations, ensuring top-tier treatment.\n\nMany Turkish cosmetic surgeons have international training and vast experience. Their expertise ensures patients receive world-class care.\n\nSeveral Turkish clinics provide all-inclusive packages for international patients, encompassing surgery, post-op care, and accommodation.\n\nApart from medical excellence, Turkey offers rich cultural and historical sites. Many patients combine their medical trips with a bit of sightseeing.\n\nConsidering quality and affordability, Turkey stands out as an ideal destination for breast reduction surgery, blending top-notch medical care with cultural experiences.\n\nWhile the NHS provides an invaluable service for many, it’s essential to be informed about the process and criteria for a breast reduction. Whether through the NHS or privately, always make an informed decision.     </p>', 'en', '2023-09-27 22:17:05', '2023-10-19 11:51:08', '1'),
(9, 'https://careinturkey.com/wp-content/uploads/2023/08/breast-reduction-nhs.jpg', 'breast-reduction-on-nhs-what-to-know', 'Breast Reduction on NHS: What to Know', 8, '<p>Breast reduction surgery can be a life-changing procedure for many, offering both physical and psychological relief. A common question that arises for many potential patients in the UK is: “Can I get a breast reduction on the NHS?”\r\n\r\nLet’s delve deep into the criteria and processes associated with NHS breast reduction services.\r\n\r\nTo have a breast reduction through the NHS, specific eligibility criteria must be met. These typically include:\r\n\r\n* Physical symptoms: Chronic back or neck pain, rash or skin irritation under the breasts, and indentations caused by bra straps.\r\n\r\n* BMI: Typically, a stable BMI of less than 27 for a defined period.\r\n\r\n* Other treatments: Unsuccessful trials of other treatments like physiotherapy.\r\n\r\n* Non-smoking: Smoking can increase the risk of complications.\r\n\r\nYour GP is your first port of call. They’ll discuss your physical and psychological symptoms with you and, if they believe you may meet the criteria, they’ll refer you to a breast surgeon for an expert opinion.\r\n\r\nBefore embarking on this surgical journey, some essential factors demand consideration.\r\n\r\nWhen contemplating breast reduction surgery, it’s crucial to have a comprehensive discussion with both a GP and a qualified surgeon. This ensures you’re fully informed about the expected outcomes and understand the risks involved.\r\n\r\nBefore you make a decision, consider the following:\r\n\r\n* A significant reduction might drastically change the appearance and contour of your breasts.\r\n\r\n* Post-surgery, there’s potential for scarring and potential changes in nipple sensitivity or sensation.\r\n\r\n* Even after surgery, factors like weight gain or loss can cause your breasts to alter in size and shape.\r\n\r\n* Pregnancy can lead to an increase in breast size, and post-reduction surgery might impede your ability to breastfeed. If you’re considering having more children, this is a factor to weigh.\r\n\r\n* For those with exceptionally large breasts, the advantages of a reduction might be overwhelmingly positive, making potential issues negligible.\r\n\r\nHowever, for individuals with only moderately enlarged breasts, the potential benefits might not outweigh the associated risks. Making an informed choice is essential.\r\n\r\nYes, males can also get a breast reduction on the NHS, especially if they suffer from gynecomastia, which leads to enlarged breast tissues. The criteria for eligibility can be different and often hinges on related physical or psychological distress.\r\n\r\nYou might be ineligible if you:\r\n\r\n* Have a high BMI without trying to reduce it first.\r\n\r\n* Are a smoker who hasn’t tried quitting.\r\n\r\n* I’m not eligible, what can I do?\r\n\r\nIf you’re not eligible for an NHS breast reduction, consider consultations with private clinics or exploring surgery abroad.\r\n\r\nUpon meeting the criteria and after consultations, your healthcare provider can place you on the NHS waiting list. This varies in length based on demand and regional factors.\r\n\r\nThis varies by region, hospital, and the current demand for the surgery. Generally, wait times can range from a few months to over a year.\r\n\r\nAbsolutely. Many individuals opt for private clinics in the UK, although this comes with significant costs.\r\n\r\nMany countries offer breast reduction surgery at a lower cost than the UK. However, ensure thorough research on the hospital’s credentials, surgeon’s expertise, and the country’s medical standards.\r\n\r\nIn recent years, Turkey has emerged as a top destination for cosmetic surgery, particularly breast reduction. Several factors contribute to its rising popularity:\r\n\r\nTurkey offers breast reduction surgeries at a fraction of the cost compared to the USA, UK, and many European countries. Even with travel and accommodation expenses, the overall cost often remains significantly lower.\r\n\r\nTurkey boasts modern medical facilities that adhere to international standards. Many are accredited by global healthcare organizations, ensuring top-tier treatment.\r\n\r\nMany Turkish cosmetic surgeons have international training and vast experience. Their expertise ensures patients receive world-class care.\r\n\r\nSeveral Turkish clinics provide all-inclusive packages for international patients, encompassing surgery, post-op care, and accommodation.\r\n\r\nApart from medical excellence, Turkey offers rich cultural and historical sites. Many patients combine their medical trips with a bit of sightseeing.\r\n\r\nConsidering quality and affordability, Turkey stands out as an ideal destination for breast reduction surgery, blending top-notch medical care with cultural experiences.\r\n\r\nWhile the NHS provides an invaluable service for many, it’s essential to be informed about the process and criteria for a breast reduction. Whether through the NHS or privately, always make an informed decision.     </p>', 'tr', '2023-09-27 22:17:05', '2023-10-19 11:51:08', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `background`
--

CREATE TABLE `background` (
  `Id` int NOT NULL,
  `ClientId` varchar(255) DEFAULT NULL,
  `PrevDiagnosis` text,
  `PrevOperations` text,
  `Alergy` varchar(255) DEFAULT NULL,
  `Smoke` varchar(255) DEFAULT NULL,
  `Alcohol` varchar(255) DEFAULT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `background`
--

INSERT INTO `background` (`Id`, `ClientId`, `PrevDiagnosis`, `PrevOperations`, `Alergy`, `Smoke`, `Alcohol`, `Status`) VALUES
(17, '40ef355e-668a-4b62-826d-bee42ca735f7', 'none', 'none', NULL, NULL, NULL, '1'),
(18, '8be23eb3-c6a3-48fe-8d74-d8d26586751e', 'none', 'none', NULL, NULL, NULL, '1'),
(19, '8c151dbb-8cf3-4c2c-b121-0fa5c70a5904', 'yok', 'yok', NULL, 'her gün', 'hafta 1', '1'),
(20, '43a00fbb-53a1-4c82-acbb-8c97d847cb38', 'nonoe', 'nonoe', NULL, NULL, NULL, '1'),
(21, 'b5f2e059-0207-4036-8065-76936bbca1b5', 'Hayır', 'Hayır', NULL, NULL, NULL, '1'),
(22, '4e06d043-6af5-4fab-8725-43bca3d645ce', 'sinizüt', 'yok', NULL, NULL, NULL, '1'),
(23, 'c56405ef-3325-46fc-80b8-91b746ab2ae6', 'sinizüt', 'yok', NULL, NULL, NULL, '1'),
(24, '6df39f73-122f-4c63-80c6-d1de7f750dc0', 'Yok', 'Yok', NULL, NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `campain`
--

CREATE TABLE `campain` (
  `Id` int NOT NULL,
  `Type` enum('0','1') NOT NULL DEFAULT '0',
  `Title` varchar(255) DEFAULT NULL,
  `Discount` varchar(55) DEFAULT NULL,
  `DiscountType` enum('0','1','2') NOT NULL DEFAULT '0',
  `Text` text,
  `Slogan` varchar(255) DEFAULT NULL,
  `Img` varchar(255) DEFAULT NULL,
  `Lang` enum('en','de','tr') NOT NULL DEFAULT 'en',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `campain`
--

INSERT INTO `campain` (`Id`, `Type`, `Title`, `Discount`, `DiscountType`, `Text`, `Slogan`, `Img`, `Lang`, `create_at`, `update_at`, `Status`) VALUES
(1, '0', 'Check up', '30', '1', 'u may see the current campain info in this area if its exist', 'Check-up now, smile later', '/assets/img/banner/cta-doctor.webp', 'en', '2023-07-03 04:58:04', '2023-08-12 10:12:43', '1'),
(2, '0', 'örnek kampanta bildirimi', '25', '0', 'text samples test 13.5', 'sloganımınz şekülll', '/assets/upload/0ZjGIP0W0vpl1DU.png', 'en', '2023-08-12 09:58:58', '2023-08-12 10:13:38', '0'),
(4, '0', 'selamlar. ', '22', '0', 'test text 14', 'test slogan 14', '/assets/upload/oQ1gDLj0mv3FnVE.png', 'en', '2023-08-12 10:06:07', '2023-08-12 10:13:30', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `category`
--

CREATE TABLE `category` (
  `Id` int NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Img` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `Lang` enum('en','de','tr') NOT NULL DEFAULT 'en',
  `create_et` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `category`
--

INSERT INTO `category` (`Id`, `Title`, `Img`, `Lang`, `create_et`, `update_at`, `Status`) VALUES
(1, 'HAIR TRANSPLANT', '/assets/upload/lv0wrMVDnHpu7UF.jpeg', 'en', '2023-06-21 13:45:59', '2023-12-07 01:39:35', '1'),
(2, 'DENTAL CARE', '/assets/upload/0OTK9aI3UgVupm0.jpeg', 'en', '2023-06-21 13:46:15', '2023-12-07 01:39:43', '1'),
(3, 'PLASTIC SURGERY', '/assets/upload/Y11C0RpycESHzg8.jpeg', 'en', '2023-06-21 13:46:15', '2023-12-07 01:39:53', '1'),
(4, 'Eye Care', '/assets/img/Default-Package.jpg', 'en', '2023-06-21 13:46:41', '2023-12-04 20:15:24', '0'),
(5, 'OBESITY TREATMENT', '/assets/upload/Ab0zF1CRqYtMgxG.jpeg', 'en', '2023-06-21 13:46:41', '2023-12-04 20:16:59', '1'),
(6, 'Orthopedic Surgery', '/assets/img/Default-Package.jpg', 'en', '2023-06-21 13:46:51', '2023-12-04 20:15:40', '0'),
(7, 'MALE UROLOGY', '/assets/upload/icAahUgXoeHqILR.jpg', 'en', '2023-11-29 14:52:08', '2023-12-07 21:02:10', '1'),
(8, 'SAÇ EKİMİ', '/assets/upload/P770511uosQeqaH.jpeg', 'tr', '2023-12-06 20:42:08', '2023-12-07 16:49:17', '1'),
(12, 'MALE UROLOGY', '/assets/upload/0yRBj0EvUS2pbu1.jpg', 'en', '2023-12-06 20:43:32', '2023-12-07 21:01:33', '0'),
(27, 'DİŞ VE GÜLÜŞ ESTETİĞİ', '/assets/upload/HkQnmGMgRI03T0j.jpeg', 'tr', '2023-12-07 19:50:53', '2023-12-07 16:58:16', '1'),
(28, 'ESTETİK CERRAHİ', '/assets/upload/wBYJ1hqigsDOCb2.jpeg', 'tr', '2023-12-07 19:51:33', '2023-12-07 16:51:33', '1'),
(29, 'OBEZİTE TEDAVİSİ', '/assets/upload/FEfcV1HPwoS3MjA.jpeg', 'tr', '2023-12-07 19:52:08', '2023-12-07 16:58:52', '1'),
(30, 'ERKEK ÜROLOJİ ', '/assets/upload/N2t71kg1pxXSocu.jpg', 'tr', '2023-12-07 19:52:37', '2023-12-07 21:03:16', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `chat`
--

CREATE TABLE `chat` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `UserTo` varchar(255) DEFAULT NULL,
  `UserFrom` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `chat`
--

INSERT INTO `chat` (`Id`, `uid`, `Title`, `UserTo`, `UserFrom`, `create_at`, `update_at`, `Status`) VALUES
(46, 'Nru2nDa6pZOkYyMt1fTi434qUJBz3Q', 'deneme', 'All', 'Z0BHVz0Nou3e7r6CTq6EK4LtdJ5y39', '2023-11-29 09:19:17', '2023-11-29 12:19:17', '1'),
(47, 'oP02zg5QXdVr49ScyFeqwI9n4pKRbt', 'Test Agency', 'All', '8V2XTYIKCtzN0RdhUeS9lGHfpxvByc', '2024-05-22 21:47:08', '2024-05-23 00:47:08', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `client`
--

CREATE TABLE `client` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Cell` varchar(55) DEFAULT NULL,
  `Mail` varchar(55) DEFAULT NULL,
  `Identification` varchar(55) DEFAULT NULL,
  `FirstName` varchar(55) DEFAULT NULL,
  `LastName` varchar(55) DEFAULT NULL,
  `Height` varchar(55) DEFAULT NULL,
  `Weight` varchar(55) DEFAULT NULL,
  `BirthDate` date DEFAULT NULL,
  `Gender` enum('0','1') DEFAULT NULL,
  `Treatment` enum('0','1','2') NOT NULL DEFAULT '0',
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `client`
--

INSERT INTO `client` (`Id`, `uid`, `Cell`, `Mail`, `Identification`, `FirstName`, `LastName`, `Height`, `Weight`, `BirthDate`, `Gender`, `Treatment`, `Status`) VALUES
(116, '40ef355e-668a-4b62-826d-bee42ca735f7', '(534) 290-6990', 'recepozmen_67@hotmail.com', '23984068774', 'recep', 'özmen', '175', '90', '1996-01-19', '1', '0', '1'),
(117, '8be23eb3-c6a3-48fe-8d74-d8d26586751e', '(534) 290-6990', 'recepozmen_67@hotmail.com', 'e23984068774', 'recep', 'özmen', '175', '90', '1996-01-19', '1', '0', '1'),
(118, '8c151dbb-8cf3-4c2c-b121-0fa5c70a5904', '(539) 282-1855', 'Agency@medescare.com', 'A39840687', 'sami', 'tayyah', '170', '75', '1997-08-18', '1', '0', '1'),
(119, '43a00fbb-53a1-4c82-acbb-8c97d847cb38', '(534) 290-6990', 'recepozmen_67@hotmail.om', '13979997622', 'recep', 'özmen', '173', '85', '1996-10-10', '1', '0', '1'),
(120, 'b5f2e059-0207-4036-8065-76936bbca1b5', '123-4567', 'hakanersan@gmail.com', 'U123456789', 'Hakan', 'Ersan', '180', '70', '1990-01-01', '1', '0', '1'),
(121, '4e06d043-6af5-4fab-8725-43bca3d645ce', '555555555', 'aliveli@muell.io', '123456789', 'ali', 'veli', '200', '80', '1982-12-22', '1', '0', '1'),
(122, 'c56405ef-3325-46fc-80b8-91b746ab2ae6', '555256987', 'aliveli@muell.io', '12455679632258632', 'Ali', 'veli', '200', '80', '1981-12-22', '1', '0', '1'),
(123, '6df39f73-122f-4c63-80c6-d1de7f750dc0', '(451) 111-1111', 'magicmedicalagency@gmail.com', '1111111', 'Hakan', 'Ersan', '180', '80', '2000-01-14', '1', '0', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `clinic`
--

CREATE TABLE `clinic` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Tell` varchar(55) DEFAULT NULL,
  `Fax` varchar(55) DEFAULT NULL,
  `Country` varchar(255) DEFAULT NULL,
  `Province` varchar(55) DEFAULT NULL,
  `City` varchar(55) DEFAULT NULL,
  `Adress` text,
  `Rate` enum('0','1','2','3','4','5') NOT NULL DEFAULT '0',
  `Categories` text,
  `Treatments` text,
  `CommissionRate` int DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `clinic`
--

INSERT INTO `clinic` (`Id`, `uid`, `Title`, `Logo`, `Mail`, `Tell`, `Fax`, `Country`, `Province`, `City`, `Adress`, `Rate`, `Categories`, `Treatments`, `CommissionRate`, `create_at`, `update_at`, `Status`) VALUES
(1, 'jqZeMON9z5Xudk8Elaiwv1K3pVPDy3', 'Cihan tıp merkezleri', 'https://www.istanbultipmerkezi.com.tr/images/logo.png', 'info@cihantipmerkezi.com', '444-5456', '(534) 290-6990', 'turkey', 'Istanbul', 'Pendik', 'adress adress', '3', '[\"2\",\"3\",\"4\"]', '[{\"Id\":\"15\",\"Cost\":\"5000\"},{\"Id\":\"1\",\"Cost\":\"1800\"},{\"Id\":\"11\",\"Cost\":\"3450\"},{\"Id\":\"14\",\"Cost\":\"5000\"},{\"Id\":\"16\",\"Cost\":\"3000\"},{\"Id\":\"31\",\"Cost\":\"3245\"},{\"Id\":\"4\",\"Cost\":\"1000\"}]', 7, '2023-06-21 11:11:36', '2023-07-26 14:01:07', '1'),
(8, '757iNJ3hs1PS6E2ZKBR0cCtfWyF0YM', 'New Clinic', 'logo yok', 'new@clinic.com', '(534) 280-6880', '(534) 280-6880', 'Turkey', 'Istanbul', 'Pendik', 'Adress adress', '2', '[\"2\"]', '[{\"Id\":\"1\",\"Cost\":\"1600\"},{\"Id\":\"6\",\"Cost\":\"1550\"}]', 6, '2023-07-11 11:02:37', '2023-07-11 11:03:24', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feature`
--

CREATE TABLE `feature` (
  `Id` int NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Icon` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT 'book',
  `Cost` float(9,2) NOT NULL DEFAULT '0.00',
  `ParentId` varchar(255) DEFAULT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Multiply` enum('0','1') NOT NULL DEFAULT '0',
  `Checked` enum('0','1') NOT NULL DEFAULT '0',
  `Order` int NOT NULL DEFAULT '0',
  `Lang` enum('en','de','tr') NOT NULL DEFAULT 'en',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `feature`
--

INSERT INTO `feature` (`Id`, `Title`, `Icon`, `Cost`, `ParentId`, `Description`, `Multiply`, `Checked`, `Order`, `Lang`, `create_at`, `update_at`, `Status`) VALUES
(1, 'VIP Transfer', 'book', 200.00, '1', NULL, '0', '1', 0, 'en', '2023-09-11 11:31:04', '2023-12-08 12:19:02', '1'),
(2, 'Guided City Tour (4 hours)', 'book', 230.00, '1', NULL, '0', '0', 3, 'en', '2023-09-11 11:31:04', '2023-12-08 06:16:39', '1'),
(3, 'Guided City Tour (8 hours)', 'book', 230.00, '1', NULL, '0', '0', 0, 'en', '2023-09-11 11:31:04', '2023-11-28 15:10:47', '0'),
(4, 'VIP Transfer', 'book', 200.00, '2', NULL, '0', '1', 0, 'en', '2023-09-11 11:31:04', '2023-12-08 12:19:17', '1'),
(5, 'Guided City Tour (All Day)', 'book', 350.00, '2', NULL, '0', '0', 3, 'en', '2023-09-11 11:31:04', '2023-12-08 06:18:13', '1'),
(6, 'Bosphorus Yacht Tour', 'book', 350.00, '2', NULL, '0', '0', 4, 'en', '2023-09-11 11:31:04', '2023-12-08 10:05:02', '1'),
(10, 'Accommodation', 'book', 100.00, '2', NULL, '1', '1', 2, 'en', '2023-11-28 15:12:19', '2024-02-11 17:50:47', '1'),
(11, 'Accommodation', 'book', 75.00, '1', NULL, '1', '1', 2, 'en', '2023-11-28 15:15:02', '2023-12-16 00:50:19', '1'),
(12, 'Free Medical Insurance', 'book', 170.00, '1', NULL, '0', '1', 1, 'en', '2023-12-01 11:37:55', '2023-12-16 01:37:51', '1'),
(13, 'Free Medical Insurance', 'book', 170.00, '2', NULL, '0', '1', 1, 'en', '2023-12-01 11:38:30', '2023-12-08 06:18:01', '1'),
(14, 'VIP Transfer', 'book', 200.00, '5', NULL, '0', '1', 0, 'tr', '2023-12-08 09:39:01', '2023-12-16 01:30:56', '1'),
(15, 'Konaklama ', 'book', 75.00, '5', NULL, '1', '1', 1, 'tr', '2023-12-08 09:39:44', '2023-12-16 01:31:02', '1'),
(16, 'Ücretsiz Sağlık Sigortası', 'book', 170.00, '5', NULL, '0', '1', 2, 'tr', '2023-12-08 09:40:25', '2024-01-25 11:49:33', '1'),
(17, 'Rehberli Şehir Turu (4 Saat)', 'book', 230.00, '5', NULL, '0', '0', 3, 'tr', '2023-12-08 09:45:28', '2024-01-25 11:49:02', '1'),
(18, 'VIP Transfer', 'book', 200.00, '6', NULL, '0', '1', 0, 'tr', '2023-12-08 09:46:06', '2024-01-25 11:48:47', '1'),
(19, 'Konaklama ', 'book', 100.00, '6', NULL, '1', '1', 1, 'tr', '2023-12-08 10:01:54', '2024-01-25 11:48:40', '1'),
(20, 'Ücretsiz Sağlık Sigortası', 'book', 170.00, '6', NULL, '0', '1', 2, 'tr', '2023-12-08 10:02:19', '2024-01-25 11:50:28', '1'),
(21, 'Rehberli Şehir Turu (Tüm Gün)', 'book', 350.00, '6', NULL, '0', '0', 3, 'tr', '2023-12-08 10:02:48', '2024-01-25 11:48:52', '1'),
(22, 'Boğaz Yat Turu (2 Saat)', 'book', 350.00, '6', NULL, '0', '0', 4, 'tr', '2023-12-08 10:04:50', '2024-01-25 11:48:57', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `feedback`
--

CREATE TABLE `feedback` (
  `Id` int NOT NULL,
  `UserId` varchar(255) DEFAULT NULL,
  `AppointmentId` int DEFAULT NULL,
  `ClinicId` varchar(255) DEFAULT NULL,
  `Message` text,
  `FileUrl` varchar(255) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `main`
--

CREATE TABLE `main` (
  `Id` int NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Description` text,
  `KeyWords` text,
  `Mail` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Port` varchar(55) DEFAULT NULL,
  `Status` enum('0','1') DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `main`
--

INSERT INTO `main` (`Id`, `Title`, `Description`, `KeyWords`, `Mail`, `Password`, `Port`, `Status`) VALUES
(1, 'Medescare | Agency', 'MedesCare, We Care', 'heatlh, dental treatment, eye treatment, doctor', 'info@medescare.com', 'somepass.com', '573', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `message`
--

CREATE TABLE `message` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `ChatId` varchar(255) DEFAULT NULL,
  `UserId` varchar(255) DEFAULT NULL,
  `Content` text,
  `Attachments` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Seen` text,
  `Status` enum('0','1','2') NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `message`
--

INSERT INTO `message` (`Id`, `uid`, `ChatId`, `UserId`, `Content`, `Attachments`, `create_at`, `update_at`, `Seen`, `Status`) VALUES
(77, '2s3GoWagONXSEdf8Jy1qF1nr961pmQ', 'Nru2nDa6pZOkYyMt1fTi434qUJBz3Q', 'Z0BHVz0Nou3e7r6CTq6EK4LtdJ5y39', '<p>deneme</p>', '[]', '2023-11-29 09:19:17', '2024-03-11 00:24:58', '[\"Z0BHVz0Nou3e7r6CTq6EK4LtdJ5y39\",\"7Y26i0bhE5aHs1JcCDXutU932lAs5S6VqGZwmpx8zQNgO0\"]', '0'),
(78, '4dI21fm9TzVPgAuMiRvXl760sKpyrQ', 'oP02zg5QXdVr49ScyFeqwI9n4pKRbt', '8V2XTYIKCtzN0RdhUeS9lGHfpxvByc', '<p>Deneme deneme</p>', '[{\"name\":\"10iu1LgTz8IG00Z.jpg\",\"src\":\"\\/assets\\/upload\\/10iu1LgTz8IG00Z.jpg\"}]', '2024-05-22 21:47:08', '2024-05-24 14:55:47', '[\"8V2XTYIKCtzN0RdhUeS9lGHfpxvByc\",\"7Y26i0bhE5aHs1JcCDXutU932lAs5S6VqGZwmpx8zQNgO0\"]', '0');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `note`
--

CREATE TABLE `note` (
  `Id` int NOT NULL,
  `UserId` varchar(255) DEFAULT NULL,
  `Note` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `note`
--

INSERT INTO `note` (`Id`, `UserId`, `Note`, `create_at`, `update_at`, `Status`) VALUES
(1, 'DFASa2a22SDFA6a5aSDFS5dfGSDFGS563sdfg33S', 'Take notes if u want', '2023-07-02 18:35:47', '2023-07-02 21:35:47', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `notification`
--

CREATE TABLE `notification` (
  `Id` int NOT NULL,
  `UserId` varchar(255) DEFAULT NULL,
  `Target` varchar(255) DEFAULT NULL,
  `Content` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `notification`
--

INSERT INTO `notification` (`Id`, `UserId`, `Target`, `Content`, `create_at`, `update_at`, `Status`) VALUES
(1, 'System', '[\"7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1\"]', '<a href=\"/panel/Manage/Agencies?Agency=cIk6EqdTL9NMlJvtU2Q41js6pGerFC\">derya shop Joined Us</a>', '2024-06-21 05:24:16', '2024-06-21 08:24:16', '1'),
(2, 'System', '[\"mKOroqWzTbAv6U981cPfR7LXnF621G\"]', '<a href=\"/panel/Manage/Agencies?Agency=ZlODrV3eY4aPxh79Q4HU2j3NMps3zc\">Test Agency Joined Us</a>', '2024-06-27 17:36:31', '2024-06-27 20:36:31', '1'),
(3, 'System', '[\"7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1\"]', '<a href=\"/panel/Manage/Agencies?Agency=1kQardl3Syq6x5NRYovc1IUm75A4OG\">Magicmedical is Added by Mehmet</a>', '2024-06-30 23:23:14', '2024-07-01 02:23:14', '1'),
(4, 'System', '[\"7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1\"]', '<a href=\"/panel/Manage/Agencies?Agency=VxGHlaA4kmv2YMdDi10Kr30hItRoNL\">Magic Medical Acente Joined Us</a>', '2024-07-01 01:39:13', '2024-07-01 04:39:13', '1'),
(5, 'System', '[\"Kpg7B3fVwPGEz1Hoqa4XCDuh3L900t\"]', '<a href=\"/panel/Appointments/90-1020-119-353\">New Appointment is Scheduled by Recep</a>', '2024-07-01 15:32:50', '2024-07-01 18:32:50', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `package`
--

CREATE TABLE `package` (
  `Id` int NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Logo` varchar(255) DEFAULT NULL,
  `Description` text,
  `Rate` int NOT NULL DEFAULT '0',
  `Lang` enum('en','de','tr') NOT NULL DEFAULT 'en',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `package`
--

INSERT INTO `package` (`Id`, `Title`, `Logo`, `Description`, `Rate`, `Lang`, `create_at`, `update_at`, `Status`) VALUES
(1, 'STANDARD PACKAGE', '/assets/upload/yS1ck00QxaDZBgr.jpg', ' ', 0, 'en', '2023-06-24 01:52:11', '2023-06-24 04:52:11', '1'),
(2, 'CARE+ PACKAGE', '/assets/upload/XQo1iVHT0fOUDgK.jpg', ' ', 25, 'en', '2023-06-24 01:52:11', '2023-06-24 04:52:11', '1'),
(5, 'STANDART PAKET', '/assets/upload/qc7dyUjzskE0Igf.jpg', NULL, 0, 'tr', '2023-12-08 09:35:50', '2023-12-08 12:35:50', '1'),
(6, 'CARE+ PAKET', '/assets/upload/R0pUMIxfuW1vL10.jpg', NULL, 25, 'tr', '2023-12-08 09:36:12', '2023-12-08 12:36:12', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `payment_method`
--

CREATE TABLE `payment_method` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `ApiId` varchar(255) DEFAULT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `payment_method`
--

INSERT INTO `payment_method` (`Id`, `uid`, `Title`, `ApiId`, `create_at`, `update_at`, `Status`) VALUES
(1, NULL, 'Credit Card', NULL, '2023-07-11 19:31:07', '2023-07-11 19:31:07', '1'),
(2, NULL, 'Cash', NULL, '2023-07-11 19:31:27', '2023-07-11 19:31:27', '1'),
(3, NULL, 'Bank Transfer', NULL, '2023-07-11 19:31:36', '2023-07-11 19:31:36', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `results`
--

CREATE TABLE `results` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `AppId` varchar(255) DEFAULT NULL,
  `UserId` varchar(255) DEFAULT NULL,
  `Content` text,
  `Attachments` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `results`
--

INSERT INTO `results` (`Id`, `uid`, `AppId`, `UserId`, `Content`, `Attachments`, `create_at`, `update_at`, `Status`) VALUES
(1, 'a3116ee6669011ee8c990242ac120002', '90-1009-1-572\r\n', '7Y26i0bhE5aHBs1JcCDXutU932lAs5S6VqGZwmpx8zQNgO1', 'test içeriğidir ;', '[\"/assets/img/results/90-1009-1-572.pdf\"]', '2023-10-09 14:29:59', '2023-10-09 14:41:20', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `treatment`
--

CREATE TABLE `treatment` (
  `Id` int NOT NULL,
  `Img` varchar(255) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `ParentId` int DEFAULT NULL,
  `EstimatedTime` int NOT NULL DEFAULT '1',
  `Cost` float(10,2) NOT NULL DEFAULT '0.00',
  `Lang` enum('en','de','tr') NOT NULL DEFAULT 'en',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `treatment`
--

INSERT INTO `treatment` (`Id`, `Img`, `Title`, `ParentId`, `EstimatedTime`, `Cost`, `Lang`, `create_at`, `update_at`, `Status`) VALUES
(35, '/assets/upload/kmj08o0ciWvO1IN.jpg', 'DHI STANDART (0-4500 GREFT)', 1, 6, 1274.00, 'en', '2023-10-13 13:50:40', '2023-11-01 13:43:00', '1'),
(36, '/assets/upload/Vi1yTGxR9Omj0SN.jpg', 'SAPPHIRE FUE', 1, 6, 1179.00, 'en', '2023-10-13 13:52:38', '2023-11-01 12:05:51', '1'),
(39, '/assets/upload/F6W0Aa110g6j10s.png', 'RHINOPLASTY - NOSE AESTHETICS', 3, 6, 2117.00, 'en', '2023-10-13 14:00:44', '2024-01-24 21:00:51', '1'),
(40, '/assets/upload/YH1mtSV0W1O0zjf.jpg', 'GASTRIC BALOON (1 YEAR) SPATZ', 5, 6, 3186.00, 'en', '2023-10-13 14:02:27', '2024-01-24 22:14:56', '0'),
(41, '/assets/upload/K00gx9U2l4qinwP.jpg', 'JAW SURGERY', 3, 7, 1000.00, 'en', '2023-10-19 04:49:55', '2023-12-07 22:14:08', '0'),
(42, '/assets/upload/7fBU1MyijKZrAWb.jpg', 'BROW LIFTING', 3, 7, 1000.00, 'en', '2023-10-19 04:54:30', '2023-12-07 22:14:31', '0'),
(43, '/assets/upload/xeJKrQ3Ck9iL0Mc.jpg', 'FACELIFT', 3, 7, 1000.00, 'en', '2023-10-19 05:03:48', '2023-12-07 22:14:15', '0'),
(44, '/assets/upload/zqd3l8ytSHwvDIu.jpeg', 'BISECTOMY (HOLLYWOOD CHEEK)', 3, 6, 1453.00, 'en', '2023-10-19 05:07:36', '2024-01-24 21:01:20', '1'),
(45, '/assets/upload/y8mdD16pWuefC2K.jpg', 'ABDOMINAL ETCHING', 3, 7, 1000.00, 'en', '2023-10-19 05:11:57', '2023-12-07 22:14:22', '0'),
(46, '/assets/upload/qGUroOlHgw1jP1W.jpg', 'LIPOSUCTION', 3, 7, 1000.00, 'en', '2023-10-19 05:13:36', '2023-12-07 22:14:43', '0'),
(47, '/assets/upload/SB0WMYD0ra0bCcV.jpg', 'BUT LIFT', 3, 6, 2412.00, 'en', '2023-10-19 05:21:49', '2024-01-14 11:20:52', '1'),
(48, '/assets/upload/00wMcXK1d1Wjnvq.jpg', 'GASTRIC BALLOON (6 MONTHS)', 5, 6, 2587.00, 'en', '2023-10-19 05:42:48', '2024-01-24 22:07:01', '1'),
(49, '/assets/upload/TNHp5GEFMQR0JXb.jpg', 'GASTRIC SLEEVE', 5, 6, 3060.00, 'en', '2023-10-19 05:46:39', '2024-01-24 21:59:44', '1'),
(50, '/assets/upload/pORfWSQ3Vhb1gKu.jpeg', 'MEGA FUE (2 SESSIONS)', 1, 6, 1653.00, 'en', '2023-11-01 14:02:43', '2023-12-07 20:12:11', '1'),
(51, '/assets/upload/rVpbUOcI01F1PRo.png', 'BEARD TRANSPLANTATION', 1, 6, 1179.00, 'en', '2023-11-01 14:24:40', '2023-12-07 20:11:33', '1'),
(52, '/assets/upload/V81UYrv6OG0m0aJ.png', 'DHI EXTREME (4500-5500 GREFT)', 1, 6, 1369.00, 'en', '2023-11-01 14:32:08', '2023-11-01 14:45:10', '1'),
(53, '/assets/upload/0kr0cRnVY10pfBw.jpeg', 'DHI MEGA (2 SESSIONS - 5500+ GREFT)', 1, 6, 2033.00, 'en', '2023-11-01 14:35:33', '2023-12-07 20:12:40', '1'),
(54, '/assets/upload/r1TiCYfH0MeBV0w.jpeg', 'PRP (1 SESSION)', 1, 6, 610.00, 'en', '2023-11-01 14:59:45', '2023-12-07 20:14:35', '1'),
(55, '/assets/upload/vG1b1lfRTquSdmY.jpeg', 'LASER THERAPY (3 SESSIONS)', 1, 6, 1463.00, 'en', '2023-11-01 15:02:47', '2023-12-07 20:15:33', '1'),
(56, '/assets/upload/Cw5Wrq4sEueHZft.jpeg', 'REV RHINOPLASTY - REVISION NOSE AESTHETICS', 3, 6, 3092.00, 'en', '2023-11-01 15:14:11', '2024-01-24 21:05:52', '1'),
(57, '/assets/upload/8PFz0GWDX3MTJYR.jpeg', 'BREAST LIFT + REDUCTION', 3, 6, 2927.00, 'en', '2023-11-01 15:23:33', '2024-01-24 21:11:57', '1'),
(58, '/assets/upload/OM7071bW0sP9v1A.jpeg', 'BREAST AUGMENTATION + PROSTHESIS', 3, 6, 3720.00, 'en', '2023-11-01 15:27:15', '2024-01-24 21:13:10', '1'),
(59, '/assets/upload/01YsAROzWc0VDbX.jpeg', 'BREAST LIFT + PROSTHESIS (ARION)', 3, 6, 4020.00, 'en', '2023-11-01 15:36:58', '2024-01-24 21:13:31', '1'),
(60, '/assets/upload/e115600jHmTgMJX.jpeg', 'MINI TUMMY TUCK', 3, 6, 2401.00, 'en', '2023-11-01 15:40:57', '2024-01-24 21:14:55', '1'),
(61, '/assets/upload/01u8XjncJLFDMIg.jpeg', '270&amp;#039; TUMMY TUCK', 3, 6, 2927.00, 'en', '2023-11-01 15:42:27', '2024-01-24 21:15:23', '1'),
(62, '/assets/upload/Hi1cCtR141D47hJ.jpeg', '360&amp;#039; TUMMY TUCK', 3, 6, 3970.00, 'en', '2023-11-01 15:43:07', '2024-01-24 21:15:42', '1'),
(63, '/assets/upload/zLR1p0P6JGKCjnQ.jpeg', 'SIX PACK - ABDOMINAL MUSCLES', 3, 6, 3870.00, 'en', '2023-11-01 15:45:48', '2024-01-24 21:16:10', '1'),
(64, '/assets/upload/zQ2GPlcdDSLKNwI.jpeg', 'BACK LIFT', 3, 6, 2762.00, 'en', '2023-11-01 15:51:13', '2024-01-24 21:16:36', '1'),
(65, '/assets/upload/XmxNyBO2jMnW20Q.jpeg', '360 LIPO (ABOME+SIDES+BACK+BOTTOM)', 3, 6, 3470.00, 'en', '2023-11-01 15:54:23', '2024-01-24 21:16:59', '1'),
(66, '/assets/upload/1TtrbG0AC2vS1Id.jpeg', 'LIPOSUCTION', 3, 6, 2117.00, 'en', '2023-11-01 16:00:42', '2024-01-24 21:24:56', '1'),
(67, '/assets/upload/n1QJWuRGzrI00Z1.jpeg', 'ADDITIONAL LIPOSUCTION', 3, 6, 978.00, 'en', '2023-11-01 16:05:13', '2024-01-24 21:25:36', '1'),
(68, '/assets/upload/NTld1bIt1JOku1P.jpeg', 'CHIN LIPOSUCTION', 3, 6, 2117.00, 'en', '2023-11-02 03:34:16', '2024-01-24 21:26:02', '1'),
(69, '/assets/upload/MfW1J0d4UaVs2BS.jpeg', 'VAGINAPLASTY', 3, 6, 2117.00, 'en', '2023-11-02 03:39:26', '2024-01-24 21:27:57', '1'),
(70, '/assets/upload/Ek7wraZHLlJpTj1.jpeg', 'LABIOPLASTY', 3, 6, 1737.00, 'en', '2023-11-02 03:43:15', '2024-01-24 21:29:11', '1'),
(71, '/assets/upload/yRAHML2b0skeEO1.jpeg', 'JAW IMPLANT AESTHETICS', 3, 6, 3370.00, 'en', '2023-11-02 03:46:48', '2024-01-24 21:29:43', '1'),
(72, '/assets/upload/1EOyM1PbD1H45fj.jpeg', 'ARM LIFT', 3, 6, 2680.00, 'en', '2023-11-02 03:49:03', '2024-01-24 21:30:05', '1'),
(73, '/assets/upload/AvyWwBHZG64EISr.jpeg', 'THIGH LIFT', 3, 6, 2762.00, 'en', '2023-11-02 03:52:58', '2024-01-24 21:31:10', '1'),
(74, '/assets/upload/07oREamyknpYMOL.png', 'EYEBROW LIFT', 3, 6, 1927.00, 'en', '2023-11-02 03:58:47', '2024-01-24 21:32:44', '1'),
(75, '/assets/upload/grRH001aDkwNZxs.jpeg', 'FACE AND NECK LIFT', 3, 6, 3470.00, 'en', '2023-11-02 04:01:14', '2024-01-24 21:34:32', '1'),
(76, '/assets/upload/7jg0JBXH9v02n1m.jpeg', 'FACE LIFT', 3, 6, 2927.00, 'en', '2023-11-02 04:07:18', '2024-01-24 21:35:15', '1'),
(77, '/assets/upload/qy4ig214Ox10ftl.jpeg', 'MID FACELIFT', 3, 6, 2762.00, 'en', '2023-11-02 04:08:54', '2024-01-24 21:35:40', '1'),
(78, '/assets/upload/TuIeOwPWsNqr01z.jpeg', 'MINI FACELIFT', 3, 6, 2402.00, 'en', '2023-11-02 04:10:31', '2024-01-24 21:36:06', '1'),
(79, '/assets/upload/rqb1YkmAfvy70WM.jpeg', 'TEMPLE LIFT', 3, 6, 2164.00, 'en', '2023-11-02 04:15:09', '2024-01-24 21:37:23', '1'),
(80, '/assets/upload/n0T9uzlOKFov0Pw.jpeg', 'GYNECOMASTIA SURGERY', 3, 6, 2402.00, 'en', '2023-11-02 04:22:09', '2024-01-24 21:39:05', '1'),
(81, '/assets/upload/10fBNEH015VZ1w7.jpeg', 'GYNECOMASTIA LIPOSUCTION', 3, 6, 2117.00, 'en', '2023-11-02 04:23:11', '2024-01-24 21:37:53', '1'),
(82, '/assets/upload/qCKsDNVbLG7rQw1.jpeg', 'ALMOND EYE', 3, 6, 2307.00, 'en', '2023-11-02 04:25:58', '2024-01-24 21:39:40', '1'),
(83, '/assets/upload/vim710DzuCacUI1.jpeg', 'UPPER EYELID ', 3, 6, 1263.00, 'en', '2023-11-02 04:29:32', '2024-01-24 21:41:53', '1'),
(84, '/assets/upload/kp8Gb7n0fc5ru6A.jpeg', 'LOWER EYELID', 3, 6, 2164.00, 'en', '2023-11-02 04:30:33', '2024-01-24 21:42:30', '1'),
(85, '/assets/upload/QUrXpycBs0wOjKn.jpeg', 'LOWER AND UPPER EYELID', 3, 6, 2927.00, 'en', '2023-11-02 04:35:54', '2024-01-24 21:43:27', '1'),
(86, '/assets/upload/rKcXRBHU1bfiuQ2.jpeg', 'SCAR REVISION', 3, 6, 1642.00, 'en', '2023-11-02 04:39:04', '2024-01-24 21:44:02', '1'),
(87, '/assets/upload/xsd4JoTrGlcbP21.jpeg', 'PROWING EAR', 3, 6, 1737.00, 'en', '2023-11-02 04:41:44', '2024-01-24 21:45:01', '1'),
(88, '/assets/upload/h112nlMB0CtjkFy.jpeg', 'FACE FAT INJECTION ', 3, 6, 1737.00, 'en', '2023-11-02 04:43:18', '2024-01-24 21:45:37', '1'),
(89, '/assets/upload/0mWRg7r0C01I0Ku.jpeg', 'BBL ALL INCLUDED (ABOME+SIDES+BACK+LOWER LIPO)', 3, 6, 3820.00, 'en', '2023-11-02 04:48:04', '2024-01-24 21:46:33', '1'),
(90, '/assets/upload/kDVtJuKSMdzR1f0.jpeg', 'BUTT PROTHESIS', 3, 6, 4620.00, 'en', '2023-11-02 04:51:58', '2024-01-24 21:47:08', '1'),
(91, '/assets/upload/KUDsbE1n0ltq3GQ.jpeg', 'CAT EYE', 3, 6, 2591.00, 'en', '2023-11-02 04:56:45', '2024-01-24 21:48:12', '1'),
(92, '/assets/upload/gLIsrmUOvMEG9K8.jpeg', 'LIP LIFT', 3, 6, 1453.00, 'en', '2023-11-02 05:00:26', '2024-01-24 21:48:49', '1'),
(93, '/assets/upload/0xcN0FChjL1iPrM.jpeg', 'STEM CELL (SVG TEKNİK, MINI LIPOSUCTION)', 1, 6, 978.00, 'en', '2023-11-02 05:12:14', '2024-01-24 21:54:02', '1'),
(94, '/assets/upload/W0rLQMRmvfEXtI5.jpeg', 'ALL ON FOR MEDIGMA - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 3700.00, 'en', '2023-11-02 05:21:09', '2023-12-07 20:59:51', '1'),
(95, '/assets/upload/1MLpVO0b0ohX2Ut.jpeg', 'ALL ON FOUR BEGO - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 4035.00, 'en', '2023-11-02 05:23:53', '2023-12-07 21:00:54', '1'),
(96, '/assets/upload/bhjYtn0mL1GRAl4.jpeg', 'ALL ON FOUR NOBEL - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 4536.00, 'en', '2023-11-02 05:33:00', '2023-12-07 21:01:48', '1'),
(97, '/assets/upload/cXEQB1T4WfyDU0q.jpeg', 'ALL ON FOUR SWISS - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 3700.00, 'en', '2023-11-02 05:35:35', '2023-12-07 21:03:38', '1'),
(98, '/assets/upload/J0zi1IuXGm0PNKW.jpeg', 'ALL ON FOUR VENUS - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 3477.00, 'en', '2023-11-02 05:38:20', '2023-12-07 21:05:09', '1'),
(99, '/assets/upload/1DePcE6CiUzphX1.jpeg', '3-PIECE PENILE PROSTHESIS', 7, 6, 7700.00, 'en', '2023-11-29 15:29:36', '2023-12-08 00:08:08', '1'),
(100, '/assets/upload/oZDNU10GcqERa3C.jpeg', 'PENILE THICKENING WITH DERMAL GRAFT (PERMANENT)', 7, 6, 7700.00, 'en', '2023-11-29 15:34:30', '2023-12-08 00:09:10', '1'),
(101, '/assets/upload/i10151UVmJaouMe.jpeg', 'SINGLE PIECE PENILE PROSTHESIS', 7, 6, 6700.00, 'en', '2023-11-29 15:41:04', '2023-12-08 00:07:43', '1'),
(102, '/assets/upload/DoahHqlBcSQR1iv.jpeg', 'PENILE THICKENING WITH FILLER', 7, 6, 5200.00, 'en', '2023-11-29 16:02:01', '2023-12-08 00:10:06', '1'),
(103, '/assets/upload/DsLmE3bQkzHuF01.jpeg', 'PENILE EXTENSION', 7, 6, 5300.00, 'en', '2023-11-29 16:04:47', '2023-12-08 00:10:54', '1'),
(104, '/assets/upload/11fJ1u0rlon110P.jpeg', 'PENILE CURVATURE CORRECTION', 7, 6, 5300.00, 'en', '2023-11-29 16:07:11', '2023-12-08 00:11:43', '1'),
(105, '/assets/upload/0QR1I9dZN1kE1rt.jpeg', 'PRP APPLICATION (3 SESSIONS)', 7, 2, 2785.00, 'en', '2023-11-29 16:08:28', '2023-12-08 00:12:34', '1'),
(106, '/assets/upload/91ybsZwSartcdEq.jpeg', 'SWT SHOCK APPLICATION (6 SESSIONS)', 7, 2, 2785.00, 'en', '2023-11-29 16:22:01', '2023-12-08 00:13:59', '1'),
(107, '/assets/upload/1aLxhsJbVGy0ojK.jpeg', 'STEM CELL APPLICATION', 7, 2, 2950.00, 'en', '2023-11-29 16:27:27', '2023-12-08 00:15:47', '1'),
(108, '/assets/upload/M1QuwgX9N1U531p.jpeg', 'PRIMARY EJACULATION FILLER', 7, 2, 2620.00, 'en', '2023-11-29 16:29:59', '2023-12-08 00:16:31', '1'),
(111, '/assets/upload/zQKXP1nsR9BcUtD.jpeg', 'ALL ON SIX MEDIGMA - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 4258.00, 'en', '2023-11-29 21:01:18', '2023-12-07 21:06:42', '1'),
(112, '/assets/upload/X1eQJIF1k1ULa06.jpeg', 'ALL ON SIX BEGO - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 4704.00, 'en', '2023-11-29 21:16:16', '2023-12-07 21:14:27', '1'),
(113, '/assets/upload/wA10t50ivRZUcW3.jpeg', 'ALL ON SIX NOBEL - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 5373.00, 'en', '2023-11-29 21:17:26', '2023-12-07 21:16:14', '1'),
(114, '/assets/upload/TmCx0N1s0P1SeXB.jpeg', 'ALL ON SIX SWISS - HYBRID PROSTHESIS (SINGLE JAW)', 2, 6, 4592.00, 'en', '2023-11-29 21:18:26', '2023-12-07 21:17:28', '1'),
(115, '/assets/upload/Bl4KqS0UEv7sL1V.jpeg', 'ALL ON SIX VENUS - HİBRİT PROTEZ (TEK ÇENE)', 2, 6, 3979.00, 'en', '2023-11-29 21:22:11', '2023-11-30 00:22:11', '1'),
(116, '/assets/upload/FlCyBODS0fuV5rx.jpeg', 'MOVABLE PROSTHESIS (SINGLE JAW)', 2, 2, 812.00, 'en', '2023-11-29 21:29:26', '2023-12-07 21:24:46', '1'),
(196, '/assets/upload/1kh00z05a1jl11e.jpg', 'DHI STANDART (0-4500 GREFT / KÖK) ', 8, 6, 1274.00, 'tr', '2023-12-07 20:18:46', '2023-12-07 23:18:46', '1'),
(197, '/assets/upload/1T4A1u1hwHl4t0x.jpg', 'DHI EXTREME (4500-5500 GREFT / KÖK)', 8, 6, 1369.00, 'tr', '2023-12-07 20:21:25', '2023-12-07 23:21:25', '1'),
(198, '/assets/upload/d1wHlPR0oAOg0ue.jpg', 'DHI MEGA (2 SEANS - 5500+ GREFT / KÖK)', 8, 6, 2033.00, 'tr', '2023-12-07 20:23:02', '2023-12-07 21:24:20', '1'),
(199, '/assets/upload/4X1KO8gHzcPR00i.jpeg', 'SAPPHIRE FUE ', 8, 6, 1179.00, 'tr', '2023-12-07 20:24:18', '2023-12-07 23:24:18', '1'),
(200, '/assets/upload/CO8nPT11hFupEbQ.jpeg', 'MEGA FUE (2 SEANS)', 8, 6, 1653.00, 'tr', '2023-12-07 20:25:08', '2023-12-07 23:25:08', '1'),
(201, '/assets/upload/MU011zOZfireqEb.jpeg', 'PRP (TEK SEANS)', 8, 6, 610.00, 'tr', '2023-12-07 20:26:42', '2023-12-07 23:26:42', '1'),
(202, '/assets/upload/Mb9BvftlXWpeVE8.jpeg', 'SAÇ KÖK HÜCRE TEDAVİSİ', 8, 6, 978.00, 'tr', '2023-12-07 20:27:25', '2024-01-24 20:29:20', '1'),
(203, '/assets/upload/91yL7WqP1Ci8d1S.jpeg', 'LAZER TERAPİ (3 SEANS)', 8, 6, 1463.00, 'tr', '2023-12-07 20:28:07', '2023-12-07 23:28:07', '1'),
(204, '/assets/upload/7veboRXsc9111dm.png', 'SAKAL EKİMİ', 8, 6, 1179.00, 'tr', '2023-12-07 20:28:44', '2023-12-07 23:28:44', '1'),
(205, '/assets/upload/Go0vxF1O52jY10i.jpeg', 'ALL ON FOR MEDIGMA - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 3700.00, 'tr', '2023-12-07 20:51:24', '2023-12-07 23:51:24', '1'),
(206, '/assets/upload/wKraMq14XPZm0ek.jpeg', 'ALL ON FOR BEGO - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 4035.00, 'tr', '2023-12-07 20:59:36', '2023-12-07 23:59:36', '1'),
(207, '/assets/upload/E0RFufYvm1Iriba.jpeg', 'ALL ON FOUR NOBEL - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 4536.00, 'tr', '2023-12-07 21:01:33', '2023-12-08 00:01:33', '1'),
(208, '/assets/upload/kBq7PwmUt6VXiDN.jpeg', 'ALL ON FOUR SWISS - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 3700.00, 'tr', '2023-12-07 21:04:03', '2023-12-08 00:04:03', '1'),
(209, '/assets/upload/1UXSj3s3wxgI0a1.jpeg', 'ALL ON FOUR VENUS - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 3477.00, 'tr', '2023-12-07 21:05:00', '2023-12-08 00:05:00', '1'),
(210, '/assets/upload/sC0TigNX7raDJKm.jpeg', 'ALL ON SIX MEDIGMA - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 4258.00, 'tr', '2023-12-07 21:06:49', '2023-12-08 00:06:49', '1'),
(211, '/assets/upload/I1HtsWregNj3vPb.jpeg', 'ALL ON SIX BEGO - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 4704.00, 'tr', '2023-12-07 21:14:31', '2023-12-08 00:14:31', '1'),
(212, '/assets/upload/cj01uzTFd1mX19G.jpeg', 'ALL ON SIX NOBEL - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 5373.00, 'tr', '2023-12-07 21:15:14', '2023-12-08 00:15:14', '1'),
(213, '/assets/upload/xA04zS1nQVN1b15.jpeg', 'ALL ON SIX SWISS- HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 4592.00, 'tr', '2023-12-07 21:17:31', '2023-12-08 00:17:31', '1'),
(214, '/assets/upload/11uNxOPpvQafnYV.jpeg', 'ALL ON SIX VENUS - HİBRİT PROTEZ (TEK ÇENE)', 27, 6, 3979.00, 'tr', '2023-12-07 21:19:41', '2023-12-08 00:19:41', '1'),
(215, '/assets/upload/xwdR7uiqQkpIe0J.jpg', 'SEDASYON', 27, 0, 1015.00, 'tr', '2023-12-07 21:23:11', '2023-12-08 00:23:11', '1'),
(216, '/assets/upload/50ZYK2H1LIe17P1.jpeg', 'HAREKETLİ PROTEZ (TEK ÇENE)', 27, 2, 812.00, 'tr', '2023-12-07 21:24:08', '2023-12-08 00:24:08', '1'),
(217, '/assets/upload/1WAOVGT9iSCDEZn.jpg', 'SEDATION', 2, 0, 1015.00, 'en', '2023-12-07 21:25:39', '2023-12-08 00:25:39', '1'),
(218, '/assets/upload/ztOCmpBQw53xry1.png', 'RINOPLASTI - BURUN ESTETİĞİ', 28, 6, 2117.00, 'tr', '2023-12-07 22:28:55', '2024-01-24 19:27:43', '1'),
(219, '/assets/upload/1G11TMBZ1DrUaeR.jpeg', 'RINOPLASTI - REVİZYON BURUN ESTETİĞİ', 28, 6, 3092.00, 'tr', '2023-12-07 22:30:17', '2024-01-24 19:31:27', '1'),
(220, '/assets/upload/OLaZYTv0gV1WU1M.jpeg', 'MEME DİKLEŞTİRME + KÜÇÜLTME', 28, 6, 2927.00, 'tr', '2023-12-07 22:31:16', '2024-01-24 19:32:57', '1'),
(221, '/assets/upload/QmivXoE1I0GdFUe.jpeg', 'MEME BÜYÜTME + PROTEZ', 28, 6, 3720.00, 'tr', '2023-12-07 22:32:23', '2024-01-24 19:35:25', '1'),
(222, '/assets/upload/TtP11R3cz1IFVvH.jpeg', 'MEME DİKLEŞTİRME + PROTEZ (ARION)', 28, 6, 4020.00, 'tr', '2023-12-07 22:34:04', '2024-01-24 19:36:17', '1'),
(223, '/assets/upload/0uZK1XB1lHNbSqR.jpeg', 'MİNİ KARIN GERME', 28, 6, 2402.00, 'tr', '2023-12-07 22:35:11', '2024-01-24 19:38:15', '1'),
(224, '/assets/upload/qp18o1Rg1aNHib1.jpeg', '270&quot; KARIN GERME', 28, 6, 2927.00, 'tr', '2023-12-07 22:36:22', '2024-06-25 15:33:39', '1'),
(225, '/assets/upload/jT8s1ykG01d1Lqh.jpeg', '360&quot; KARIN GERME', 28, 6, 3970.00, 'tr', '2023-12-07 22:37:49', '2024-06-25 15:33:49', '1'),
(226, '/assets/upload/880j1lo0DQbVirJ.jpeg', 'SIRT GERME', 28, 6, 2762.00, 'tr', '2023-12-07 22:39:36', '2024-01-24 19:41:59', '1'),
(227, '/assets/upload/1ydn1DihMsrv1LP.jpeg', 'SIX PACK - KARIN KASI', 28, 6, 3870.00, 'tr', '2023-12-07 22:40:57', '2024-01-24 19:41:40', '1'),
(228, '/assets/upload/s2gFxRNrPXdVeC6.jpeg', 'LIPOSUCTION', 28, 6, 2117.00, 'tr', '2023-12-07 22:42:23', '2024-01-24 19:45:01', '1'),
(229, '/assets/upload/lizX1JEL0IP1QoS.jpeg', '360 LIPO (KARIN+YANLAR+SIRT+ALT)', 28, 6, 3470.00, 'tr', '2023-12-07 22:43:10', '2024-01-24 19:44:19', '1'),
(230, '/assets/upload/1t2rvhyP0FsR1p0.jpeg', 'İLAVE LIPOSUCTION', 28, 6, 978.00, 'tr', '2023-12-07 22:44:32', '2024-01-24 19:45:27', '1'),
(231, '/assets/upload/e8U0piV1b0l01f1.jpeg', 'GIDI LIPOSUCTION', 28, 6, 2117.00, 'tr', '2023-12-07 22:47:56', '2024-01-24 19:45:46', '1'),
(232, '/assets/upload/eFV1qSfdAJ01Zzu.jpeg', 'ÇENE IMPLANT ESTETİĞİ', 28, 6, 3370.00, 'tr', '2023-12-07 22:50:43', '2024-01-24 19:49:07', '1'),
(233, '/assets/upload/V10mM0OwXn3KdAZ.jpeg', 'VAJİNAPLASTİ', 28, 6, 2117.00, 'tr', '2023-12-07 22:53:39', '2024-01-24 19:46:55', '1'),
(234, '/assets/upload/bEuqcY5pKeZ2s0S.jpeg', 'LABİOPLASTİ', 28, 6, 1737.00, 'tr', '2023-12-07 22:54:51', '2024-01-24 19:48:32', '1'),
(235, '/assets/upload/dSh1H21zbi6qARl.jpeg', 'KOL GERME', 28, 6, 2680.00, 'tr', '2023-12-07 22:55:42', '2024-01-24 19:52:05', '1'),
(236, '/assets/upload/zDOxEk11Wemu5Jy.jpeg', 'UYLUK GERME ', 28, 6, 2762.00, 'tr', '2023-12-07 22:56:53', '2024-01-24 19:52:27', '1'),
(237, '/assets/upload/8jPJ1H1dMqgYReb.png', 'KAŞ KALDIRMA', 28, 6, 1927.00, 'tr', '2023-12-07 22:58:01', '2024-01-24 19:52:45', '1'),
(238, '/assets/upload/GwRl1QIPDzqfbBZ.jpeg', 'YÜZ VE BOYUN GERME', 28, 6, 3470.00, 'tr', '2023-12-07 22:58:43', '2024-01-24 19:53:11', '1'),
(239, '/assets/upload/qcndeRD0hIHj010.jpeg', 'YÜZ GERME', 28, 6, 2927.00, 'tr', '2023-12-07 22:59:41', '2024-01-24 20:00:25', '1'),
(240, '/assets/upload/1mTUNG00HdC6Jzc.jpeg', 'ORTA YÜZ GERME', 28, 6, 2762.00, 'tr', '2023-12-07 23:00:08', '2024-01-24 20:00:49', '1'),
(241, '/assets/upload/jlY1kPo0RsG1guT.jpeg', 'MİNİ YÜZ GERME', 28, 6, 2401.00, 'tr', '2023-12-07 23:02:21', '2024-01-24 20:01:08', '1'),
(242, '/assets/upload/01rRhPyTINALjS1.jpeg', 'ŞAKAK GERME', 28, 6, 2164.00, 'tr', '2023-12-07 23:02:53', '2024-01-24 20:04:41', '1'),
(243, '/assets/upload/MdeWS1Hr6i1awDo.jpeg', 'JİNEKOMASTİ CERRAHİ', 28, 6, 2401.00, 'tr', '2023-12-07 23:03:45', '2024-01-24 20:05:42', '1'),
(244, '/assets/upload/0D1bnHOctkTFv0z.jpeg', 'JİNEKOMASTİ LIPOSUCTION', 28, 6, 2117.00, 'tr', '2023-12-07 23:04:57', '2024-01-24 20:06:07', '1'),
(245, '/assets/upload/pt0bL15ZoGi1QOm.jpeg', 'BADEM GÖZ ', 28, 6, 2307.00, 'tr', '2023-12-07 23:05:37', '2024-01-24 20:06:33', '1'),
(246, '/assets/upload/bL1xkD1RGcj710K.jpeg', 'ÜST GÖZ KAPAĞI', 28, 6, 1263.00, 'tr', '2023-12-07 23:20:43', '2024-01-24 20:07:29', '1'),
(247, '/assets/upload/3XvCxOF1VHznoL0.jpeg', 'ALT GÖZ KAPAĞI', 28, 6, 2164.00, 'tr', '2023-12-07 23:23:39', '2024-01-24 20:07:51', '1'),
(248, '/assets/upload/i0C0wapmsNer11J.jpeg', 'ALT VE ÜST GÖZ KAPAĞI', 28, 6, 2927.00, 'tr', '2023-12-07 23:26:24', '2024-01-24 20:08:07', '1'),
(249, '/assets/upload/1yTUjz0fS11B1Nk.jpeg', 'SKAR (YARA) REVİZYONU', 28, 6, 1642.00, 'tr', '2023-12-07 23:27:30', '2024-01-24 20:12:03', '1'),
(250, '/assets/upload/BDMQ10S8zU7GHlF.jpeg', 'KEPÇE KULAK', 28, 6, 1737.00, 'tr', '2023-12-07 23:28:40', '2024-01-24 20:12:31', '1'),
(251, '/assets/upload/tIPAECLb1onzD4Z.jpeg', 'YÜZE YAĞ ENJEKSİYONU', 28, 6, 1737.00, 'tr', '2023-12-07 23:29:34', '2024-01-24 20:13:09', '1'),
(252, '/assets/upload/1Nr9xGtIvHpE1Q1.jpeg', 'BBL HERŞEY DAHİL (KARIN+YANLAR+SIRT+ALT LIPO)', 28, 5, 3820.00, 'tr', '2023-12-07 23:31:15', '2024-01-24 20:13:44', '1'),
(253, '/assets/upload/gcfb0HBY70isqp1.jpeg', 'POPO PROTEZİ', 28, 6, 4620.00, 'tr', '2023-12-07 23:32:29', '2024-01-24 20:14:10', '1'),
(254, '/assets/upload/XZSqT01R0U0WeYF.jpg', 'POPO KALDIRMA', 28, 6, 2762.00, 'tr', '2023-12-07 23:34:38', '2024-01-24 20:15:35', '1'),
(255, '/assets/upload/jNP020IC5HSA1lg.jpg', 'BUTT LIFT', 3, 6, 2762.00, 'en', '2023-12-07 23:36:27', '2024-01-24 21:47:39', '1'),
(256, '/assets/upload/0Euq10zopryb3S1.jpg', 'MASSAGE (SINGLE SESSION)', 3, 0, 325.00, 'en', '2023-12-07 23:38:37', '2023-12-08 02:38:37', '1'),
(257, '/assets/upload/af00JK2R4L1uHxb.jpeg', 'KEDİ GÖZ', 28, 6, 2591.00, 'tr', '2023-12-07 23:39:57', '2024-01-24 20:25:20', '1'),
(258, '/assets/upload/EOD14JPWk0lpX0U.jpg', 'MASAJ (TEK SEANS)', 28, 0, 325.00, 'tr', '2023-12-07 23:40:29', '2023-12-08 02:40:29', '1'),
(259, '/assets/upload/1WsY0vxdUwiHjRp.jpg', 'NEVÜS EKSİZYONU', 28, 1, 409.00, 'tr', '2023-12-07 23:43:39', '2024-01-24 20:30:01', '1'),
(260, '/assets/upload/BW1Joe0lKrmGZdM.jpg', 'NEVUS EXCISION', 3, 1, 409.00, 'en', '2023-12-07 23:44:21', '2024-01-24 21:55:17', '1'),
(261, '/assets/upload/3JjPVTvn18qOraB.jpg', 'J PLASMA', 28, 1, 1737.00, 'tr', '2023-12-07 23:45:53', '2024-01-24 20:30:21', '1'),
(262, '/assets/upload/3dP4EUt5qi0LyFO.jpg', 'J PLASMA', 3, 1, 1737.00, 'en', '2023-12-07 23:46:20', '2024-01-24 21:55:41', '1'),
(263, '/assets/upload/A3F3nwKz6Nlm9xJ.jpeg', 'BOTOX', 28, 0, 267.00, 'tr', '2023-12-07 23:47:30', '2024-01-24 20:31:14', '1'),
(264, '/assets/upload/cdaWwpGhHL3OTRm.jpeg', 'BOTOX', 3, 0, 267.00, 'en', '2023-12-07 23:48:05', '2024-01-24 21:56:03', '1'),
(265, '/assets/upload/SRxD4dGcyrOq3Bl.jpg', 'DOLGU', 28, 0, 352.00, 'tr', '2023-12-07 23:49:12', '2024-01-24 20:31:40', '1'),
(266, '/assets/upload/MfIxzey1mv0Ftk0.jpg', 'FILLING', 3, 0, 352.00, 'en', '2023-12-07 23:49:44', '2024-01-24 21:56:42', '1'),
(267, '/assets/upload/kFy5lg1bhHnrYwM.jpg', 'PRP - YÜZ', 28, 0, 125.00, 'tr', '2023-12-07 23:51:29', '2024-01-24 20:32:37', '1'),
(268, '/assets/upload/e1og1upTirYmQXC.jpg', 'PRP - YÜZ', 3, 0, 124.00, 'en', '2023-12-07 23:52:09', '2024-01-24 21:57:28', '1'),
(269, '/assets/upload/8Ho0dBVK7RCTIu1.jpeg', '3 PARÇALI PENİS PROTEZİ', 30, 6, 7700.00, 'tr', '2023-12-08 00:06:19', '2023-12-08 03:06:19', '1'),
(270, '/assets/upload/1fkclInYpbMLhd1.jpeg', 'TEK PARÇALI PENİZ PROTEZİ', 30, 6, 6700.00, 'tr', '2023-12-08 00:07:12', '2023-12-08 03:07:12', '1'),
(271, '/assets/upload/p4xGoP1FsbiwMWk.jpeg', 'DERMAL GREFT İLE PENİS KALINLAŞTIRMA (KALICI)', 30, 6, 7700.00, 'tr', '2023-12-08 00:08:48', '2023-12-08 03:08:48', '1'),
(272, '/assets/upload/Gpl0k0a1TO0tFC2.jpeg', 'DOLGU İLE PENİS KALINLAŞTIRMA', 30, 6, 5200.00, 'tr', '2023-12-08 00:09:50', '2023-12-08 03:09:50', '1'),
(273, '/assets/upload/bF0qQxlc01E9D1e.jpeg', 'PENİS UZATMA', 30, 6, 5300.00, 'tr', '2023-12-08 00:10:36', '2023-12-08 03:10:36', '1'),
(274, '/assets/upload/R7014LYqn18I1d0.jpeg', 'PENİS EĞRİLİĞİ DÜZELTMESİ', 30, 6, 5300.00, 'tr', '2023-12-08 00:11:26', '2023-12-08 03:11:26', '1'),
(275, '/assets/upload/sGbaMI1JB8vUyNZ.jpeg', 'PRP UYGULAMASI (3 SEANS)', 30, 2, 2785.00, 'tr', '2023-12-08 00:12:22', '2023-12-08 03:12:22', '1'),
(276, '/assets/upload/a1IbQwzu1OJPWDo.jpeg', 'SWT ŞOK UYGULAMASI (6 SEANS)', 30, 2, 2785.00, 'tr', '2023-12-08 00:13:09', '2023-12-08 00:13:57', '1'),
(277, '/assets/upload/nHcp2S8e1RFX0W0.jpeg', 'KÖK HÜCRE UYGULAMASI', 30, 2, 2950.00, 'tr', '2023-12-08 00:15:37', '2023-12-08 03:15:37', '1'),
(278, '/assets/upload/IAN0s0WaTJ8gCo0.jpeg', 'ERKEN BOŞALMA DOLGUSU', 30, 2, 2620.00, 'tr', '2023-12-08 00:16:19', '2023-12-08 03:16:19', '1'),
(279, '/assets/upload/1p5l1VgHfv10cSR.jpg', 'STANDART FUE', 8, 6, 1084.00, 'tr', '2023-12-08 00:23:00', '2023-12-08 03:23:00', '1'),
(280, '/assets/upload/KOXaP19dhlby3Q1.jpg', 'STANDARD FUE', 1, 6, 1084.00, 'en', '2023-12-08 00:23:35', '2023-12-08 03:23:35', '1'),
(281, '/assets/upload/1C1t3BOL10s0U0K.jpeg', 'BİŞEKTOMİ', 28, 6, 1453.00, 'tr', '2024-01-24 20:49:13', '2024-01-24 23:49:13', '1'),
(282, '/assets/upload/gSVOXNDxheWK0Ha.jpeg', 'DUDAK KALDIRMA', 28, 6, 1453.00, 'tr', '2024-01-24 20:52:53', '2024-01-24 23:52:53', '1'),
(283, '/assets/upload/D1Lw010h1Q1CluA.jpeg', 'BICHECTOMY (HOLLYWOOD CHEEK)', 3, 6, 1453.00, 'en', '2024-01-24 21:52:29', '2024-01-25 00:52:29', '1'),
(284, '/assets/upload/w4Yy1nsJC04M04W.png', 'GASTRIC BALOON (1 YEAR) ORBERA', 5, 6, 3690.00, 'en', '2024-01-24 22:14:26', '2024-01-25 01:14:26', '1'),
(285, '/assets/upload/e11G71Nrf0bBp0q.jpeg', 'MINI GASTRIC BYPASS', 5, 6, 4099.00, 'en', '2024-01-24 22:18:53', '2024-01-25 01:18:53', '1'),
(286, '/assets/upload/0VnuBLIhgCdvsyc.jpeg', 'RNY GASTRIC BYPASS', 5, 6, 4383.00, 'en', '2024-01-24 22:20:05', '2024-01-25 01:20:05', '1'),
(287, '/assets/upload/pL6vPqWujZE4XIM.jpeg', 'GASTRİK TÜP MİDE', 29, 6, 3060.00, 'tr', '2024-01-24 22:23:10', '2024-01-25 01:23:10', '1'),
(288, '/assets/upload/HJDZVERguOPy0FI.jpg', 'MİDE BALONU (6 AYLIK)', 29, 6, 2587.00, 'tr', '2024-01-24 22:26:37', '2024-01-25 01:26:37', '1'),
(289, '/assets/upload/pTROe1K1xzLUwVa.jpg', 'MİDE BALONU (1 YILLIK) SPATZ', 29, 6, 3186.00, 'tr', '2024-01-24 22:27:12', '2024-01-25 01:27:12', '1'),
(290, '/assets/upload/Tfz0iuE0DUx0goe.png', 'MİDE BALONU (1 YILLIK) ORBERA', 29, 6, 3690.00, 'tr', '2024-01-24 22:27:42', '2024-01-25 01:27:42', '1'),
(291, '/assets/upload/e10JIx0FEX1Z1iw.jpeg', 'MİNİ GASTRİK BYPASS', 29, 6, 4099.00, 'tr', '2024-01-24 22:28:20', '2024-01-25 01:28:20', '1'),
(292, '/assets/upload/0A00i11x1Z117Mv.jpeg', 'RNY GASTRİK BYPASS', 29, 6, 4383.00, 'tr', '2024-01-24 22:28:59', '2024-01-25 01:28:59', '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `user`
--

CREATE TABLE `user` (
  `Id` int NOT NULL,
  `uid` varchar(255) DEFAULT NULL,
  `Type` enum('0','1','2') NOT NULL DEFAULT '0',
  `ProfilPic` varchar(255) DEFAULT NULL,
  `Invitation` varchar(255) DEFAULT NULL,
  `ParentId` varchar(255) DEFAULT NULL,
  `FirstName` varchar(55) DEFAULT NULL,
  `LastName` varchar(55) DEFAULT NULL,
  `Mail` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL,
  `Cell` varchar(55) DEFAULT NULL,
  `Permission` text,
  `CommissionRate` int DEFAULT NULL,
  `TimeZone` varchar(55) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` enum('0','1') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Tablo döküm verisi `user`
--

INSERT INTO `user` (`Id`, `uid`, `Type`, `ProfilPic`, `Invitation`, `ParentId`, `FirstName`, `LastName`, `Mail`, `Password`, `Cell`, `Permission`, `CommissionRate`, `TimeZone`, `create_at`, `update_at`, `Status`) VALUES
(2, '7Y26i0bhE5aHs1JcCDXutU932lAs5S6VqGZwmpx8zQNgO0', '2', '/assets/upload/Pt1Q1fm11NrYg00.png', NULL, NULL, 'Faruk', 'Aksoy', 'Administrator@medescare.com', 'AQBkyEXD3/lEjPkdEnRFzA==', '(534) 290-6990', '', 0, NULL, '2023-07-03 17:19:00', '2024-06-02 14:10:50', '1'),
(34, '9MhHDV6zG7uY5JWSRK5wjtoql2mgvc', '0', NULL, NULL, 'aVAgj4hsM7uDObKW2TB92m182XyUcL', 'Güner', 'Korkmaz', 'korkmaz9@hotmail.de', '4ZVSW6lZ2cz0zMSfywQNCw==', '(163) 700-4941', NULL, NULL, NULL, '2023-11-24 10:19:34', '2023-11-24 13:19:34', '1'),
(36, '1QZ122GAvXHCO96hkxDn53TqLymzlU', '0', NULL, NULL, 'Kelzf93Bpi7295Mr7n7kY2m1P70F6g', 'Mücella', 'KANTAROĞLU', 'mucella@meavilla.com.tr', 'gm2V72zf+tl2uOK0Sq2oJg==', '(533) 422-0449', NULL, NULL, NULL, '2023-11-24 11:54:40', '2023-11-24 14:54:40', '1'),
(37, 'j4WILgY0ftNBv7O9Ewi82db5K933J1', '0', NULL, NULL, 'FjXeVsoQLNEx96OC26vPzl3G6RTq3I', 'Fevzi', 'Koç', 'koc-reisen@t-online.de', 'KNJ4kkMK7YZkDDi9mWNeqQ==', '(172) 280-9707', NULL, NULL, NULL, '2023-11-24 12:00:39', '2023-11-24 15:00:39', '1'),
(43, 'DjMxa9bd2pSZLfGuF1cI86iK33omOR', '1', NULL, NULL, NULL, 'Sami', 'Tayah', 'sami@medescare.com', 'JVwwXrillhHAMvTkeSutog==', '(501) 260-5591', NULL, 0, NULL, '2023-11-30 12:17:40', '2024-01-08 11:59:48', '1'),
(997, 'Kpg7B3fVwPGEz1Hoqa4XCDuh3L900t', '1', NULL, NULL, NULL, 'Recep', 'özmen', 'recep_ozmen_67@hotmail.com', 'AQBkyEXD3/lEjPkdEnRFzA==', '(534) 290-6990', NULL, 30, NULL, '2023-11-28 11:05:33', '2024-01-09 17:21:09', '1'),
(998, 'mKOroqWzTbAv6U981cPfR7LXnF621G', '1', NULL, 'mgc', NULL, 'Samet', 'Özkan', 'samet@magicmedical.de', 'AQBkyEXD3/lEjPkdEnRFzA==', '(543) 811-4119', NULL, 15, NULL, '2023-11-28 11:04:10', '2024-06-27 12:20:11', '1'),
(999, '7Y26i0bhE5aHBs1JcCDXutU932lnoj7AK3vVqGZwmpx8zQNgO1', '1', '/assets/upload/1Zvr1JOmoaQTIfG.png', 'magic2024', NULL, 'Mehmet', 'Demir', 'mehmet@magicmedical.de', 'AQBkyEXD3/lEjPkdEnRFzA==', '(534) 290-6990', '', 15, NULL, '2023-06-20 11:31:52', '2024-01-08 11:59:59', '1'),
(1000, 'GOTv80aslR0LQPrNEkcudDIwAMbpz3', '1', NULL, NULL, NULL, 'Fuat', 'Güvenlidal', 'fuat@medescare.com', 'AufQQHukL1Zaoaq1CKmsQg==', '(532) 583-2639', NULL, 0, NULL, '2023-12-26 10:54:08', '2024-01-08 12:00:04', '1'),
(1001, '9ioP26XNLGr7Ou2hMfK0BjIzQm9qpv', '1', NULL, NULL, 'GOTv80aslR0LQPrNEkcudDIwAMbpz3', 'Kacem', 'Addaoud', 'kacem.adda@gmail.com', '63+56QTj0zyBuvzVBAGz2A==', '(507) 037-7760', NULL, 0, NULL, '2023-12-26 11:23:34', '2024-01-08 12:00:24', '1'),
(1003, 'w16EX2eSlfmFvkz95y4HJb1PRDo4ar', '1', NULL, NULL, 'ZOaID6Eney3X4r8fJmibSQosK5hc0t', 'Asım', 'Khalifa', 'info@halagr.com', 'vLy/7t3pjHHVTL3vzVcUcA==', '(544) 104-8819', NULL, 0, NULL, '2024-01-03 12:37:27', '2024-01-08 12:00:32', '1'),
(1011, 'dEZy4xuhXGRgU8t50cWB8aD53wSAHK', '1', NULL, NULL, NULL, 'Rana', 'Öztürk', 'rana@invitexpo.com', 'Ll/iGMTl24Jyg+PPJhxqEw==', '(012) 260-5590', NULL, 0, NULL, '2024-01-04 13:43:19', '2024-01-04 13:43:32', '1'),
(1015, 'vnzXDaH8f8qLc2P470FtubErBOAimk', '0', NULL, NULL, 'gRwtyzMrKIN2kYxnZo5GL5aP9d8e7X', 'YEKTA BERK', 'YAVUZ', 'yektaberk2@gmail.com', 'i1Q94gXy3bBZojawxK5Qfg==', '(545) 905-1200', NULL, 15, NULL, '2024-01-09 17:30:09', '2024-01-09 20:30:09', '1'),
(1020, 'RzLD3NVEm88skxZCglJdWKacjBU2rT', '1', NULL, NULL, NULL, 'Magic', 'Medical', 'info@magicmedical.de', 'iOX6bUy/+Ey5NWGWI1cHDg==', '(555) 555-5555', NULL, 20, NULL, '2024-03-22 00:38:06', '2024-03-22 03:38:06', '1'),
(1022, 'UH4J81Qn1o5d2RBkY7ACTPIjKr5576', '0', NULL, NULL, '58VaRr4C1iBLfNmAE6nq1Wlszdb28j', 'Msmt', 'Ozkan', 'msmtozkan@hotmail.com', 'V/9JCmyFyPrTE/h+V4iBcg==', '75773478', NULL, 15, NULL, '2024-03-22 12:39:08', '2024-03-22 15:39:08', '1'),
(1024, 'f4eE52AkPqFXGHm3zYi8yQj12L7TrJ', '0', NULL, NULL, 'hXdWR6vM1Z9SQzcN8n4Vwf2GIqb1u5', 'Ulrich', 'Bergmann', 'kliniken@existiert.net', 'tg+jgNtoA7LmqQrPrFUSdQ==', '00498569654788', NULL, 15, NULL, '2024-04-03 15:17:39', '2024-04-03 18:17:39', '1'),
(1039, '8Zh1L731rOJDs2xbB9KyuloGTpv346', '0', NULL, NULL, 'ZlODrV3eY4aPxh79Q4HU2j3NMps3zc', 'Hakan', 'Ersan', 'hknersan@gmail.com', 'U7S1cPJ6mmz4PJmevdqs1Q==', '05455410395', NULL, 15, NULL, '2024-06-27 17:36:31', '2024-06-27 20:36:31', '1'),
(1041, 'tR6i8e7Lk0cv1NjACsquzm9T0EwZxd', '0', NULL, NULL, 'VxGHlaA4kmv2YMdDi10Kr30hItRoNL', 'Hakan', 'Ersan', 'magicmedicalagency@gmail.com', 'Gf1k1SCEgBPMLFyUZk7Efg==', '05455410395', NULL, 15, NULL, '2024-07-01 01:39:13', '2024-07-01 04:39:13', '1'),
(1043, 'YBNlq28UZnJcbRihWCz30M920DHmXE', '0', NULL, NULL, 'gRwtyzMrKIN2kYxnZo5GL5aP9d8e7X', 'Recep', 'Özmen(test)', 'recepozmen_67@hotmail.com', 'kL3LOoQ3s0ByXsnjRbomaw==', '(534) 290-6990', NULL, 20, NULL, '2024-07-01 15:26:01', '2024-07-01 18:26:01', '1');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `agency`
--
ALTER TABLE `agency`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `api`
--
ALTER TABLE `api`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `campain`
--
ALTER TABLE `campain`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `clinic`
--
ALTER TABLE `clinic`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `feature`
--
ALTER TABLE `feature`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `main`
--
ALTER TABLE `main`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `payment_method`
--
ALTER TABLE `payment_method`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`Id`);

--
-- Tablo için indeksler `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `agency`
--
ALTER TABLE `agency`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1049;

--
-- Tablo için AUTO_INCREMENT değeri `announcement`
--
ALTER TABLE `announcement`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `api`
--
ALTER TABLE `api`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `application`
--
ALTER TABLE `application`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Tablo için AUTO_INCREMENT değeri `appointment`
--
ALTER TABLE `appointment`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Tablo için AUTO_INCREMENT değeri `article`
--
ALTER TABLE `article`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Tablo için AUTO_INCREMENT değeri `background`
--
ALTER TABLE `background`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Tablo için AUTO_INCREMENT değeri `campain`
--
ALTER TABLE `campain`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `category`
--
ALTER TABLE `category`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Tablo için AUTO_INCREMENT değeri `chat`
--
ALTER TABLE `chat`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Tablo için AUTO_INCREMENT değeri `client`
--
ALTER TABLE `client`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Tablo için AUTO_INCREMENT değeri `clinic`
--
ALTER TABLE `clinic`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `feature`
--
ALTER TABLE `feature`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Tablo için AUTO_INCREMENT değeri `feedback`
--
ALTER TABLE `feedback`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `main`
--
ALTER TABLE `main`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `message`
--
ALTER TABLE `message`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- Tablo için AUTO_INCREMENT değeri `note`
--
ALTER TABLE `note`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `notification`
--
ALTER TABLE `notification`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `package`
--
ALTER TABLE `package`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `payment_method`
--
ALTER TABLE `payment_method`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `results`
--
ALTER TABLE `results`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `treatment`
--
ALTER TABLE `treatment`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- Tablo için AUTO_INCREMENT değeri `user`
--
ALTER TABLE `user`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
