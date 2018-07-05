-- Database: `cisociall_db`

# --------------- Create Table: `cisociall_sessions` --------------- #
CREATE TABLE IF NOT EXISTS `cisociall_sessions` (
	`id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
	`ip_address` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
	`timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
	`data` blob NOT NULL,
	KEY `cisociall_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
ALTER TABLE `cisociall_sessions` ADD PRIMARY KEY (`id`, `ip_address`);

# --------------- Create Table: `cisociall_users` --------------- #
CREATE TABLE IF NOT EXISTS `cisociall_users` (
`id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT,
`ip_address` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
`provider_name` varchar(24) COLLATE utf8_unicode_ci NOT NULL,
`identifier` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
`displayName` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
`firstName` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
`lastName` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
`email` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`emailVerified` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`phone` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
`gender` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
`age` int(3) UNSIGNED DEFAULT NULL,
`birthDay` int(2) UNSIGNED DEFAULT NULL,
`birthMonth` int(2) UNSIGNED DEFAULT NULL,
`birthYear` int(4) UNSIGNED DEFAULT NULL,
`job_title` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`organization_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`webSiteURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`city` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`region` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`country` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`zip` int(24) UNSIGNED DEFAULT NULL,
`address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`language` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`active` tinyint(1) UNSIGNED NOT NULL DEFAULT '1',
`user_type` varchar(24) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'social',
`referrer` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`platform` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`mobile` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`browser` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`browser_version` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`profileURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`photoURL` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`created_date` int(24) UNSIGNED  NOT NULL,
`modified_date` int(24) UNSIGNED  DEFAULT NULL,
`g_l_status` int(6) UNSIGNED  DEFAULT NULL,
`g_l_city` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_region` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_areaCode` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_dmaCode` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_countryCode` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_countryName` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_continentCode` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_latitude` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_longitude` varchar(24) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_regionCode` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_regionName` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_currencyCode` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_currencySym` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,
`g_l_currencyConv` varchar(12) COLLATE utf8_unicode_ci DEFAULT NULL,

 PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# --------------- Insert Main Datas Into The cisociall_users Table --------------- #
INSERT INTO `cisociall_users` (`id`, `ip_address`, `provider_name`, `identifier`, `displayName`, `firstName`, `lastName`, `email`, `emailVerified`, `phone`, `gender`, `age`, `birthDay`, `birthMonth`, `birthYear`, `job_title`, `organization_name`, `webSiteURL`, `description`, `city`, `region`, `country`, `zip`, `address`, `language`, `active`, `user_type`, `referrer`, `platform`, `mobile`, `browser`, `browser_version`, `profileURL`, `photoURL`, `created_date`, `modified_date`, `g_l_status`, `g_l_city`, `g_l_region`, `g_l_areaCode`, `g_l_dmaCode`, `g_l_countryCode`, `g_l_countryName`, `g_l_continentCode`, `g_l_latitude`, `g_l_longitude`, `g_l_regionCode`, `g_l_regionName`, `g_l_currencyCode`, `g_l_currencySym`, `g_l_currencyConv`) VALUES
(1, '212.174.15.5', 'Google', '106739428297397232594', 'Kaan Trak', 'Kaan', 'Trak', 'cisociall@gmail.com', 'cisociall@gmail.com', '', 'male', 0, 0, 0, 0, NULL, NULL, '', '', NULL, '', '', 0, NULL, '', 1, 'social', 'http://cisociall.eu/social', 'Windows 10', '', 'Spartan', '14.14393', 'https://plus.google.com/106739428297397232594', 'https://lh6.googleusercontent.com/-Aue3Tkia_pU/AAAAAAAAAAI/AAAAAAAAABQ/fimDVmp_Qmw/photo.jpg?sz=200', 1497225601, 1497225601, 200, 'Istanbul', 'Istanbul', '0', '0', 'TR', 'Turkey', 'EU', '41.0986', '29.1979', '34', 'Istanbul', 'TRY', 'YTL', '3.7257'),
(2, '203.145.131.164', 'Facebook', '115438265694369', 'Kaan Trak', 'Kaan', 'Trak', 'cisociall@gmail.com', 'cisociall@gmail.com', NULL, 'male', NULL, 19, 9, 1985, NULL, NULL, '', 'Codeigniter Social Login', NULL, '', NULL, NULL, NULL, 'tr_TR', 1, 'social', 'http://cisociall.eu/social', 'Windows 10', '', 'Spartan', '14.14393', 'https://www.facebook.com/app_scoped_user_id/115438265694369/', 'https://graph.facebook.com/115438265694369/picture?width=150&height=150', 1497225601, 1497225601, 200, 'Delhi', 'Delhi', '0', '0', 'IN', 'India', 'AS', '28.6667', '77.2167', '07', 'Delhi', 'INR', '₨', '66.5249'),
(3, '14.17.37.146', 'Twitter', '861206209642233856', 'cisociall', 'Kaan Trak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, 'İstanbul, Türkiye', NULL, NULL, NULL, NULL, 1, 'social', '', 'Android', 'Android', 'Chrome', '58.0.3029.110', 'http://twitter.com/cisociall', 'http://pbs.twimg.com/profile_images/868544524926279684/fclqsKmh.jpg', 1497225601, 1497225601, 200, 'Guangzhou', 'Guangdong', '0', '0', 'CN', 'China', 'AS', '23.1167', '113.25', '30', 'Guangdong', 'CNY', '元', '6.9112'),
(4, '151.96.254.4', 'Instagram', '5429831325', 'Kaan Trak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Codeigniter Social Login', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'social', '', 'Windows 10', '', 'Chrome', '58.0.3029.110', NULL, 'https://scontent.cdninstagram.com/t51.2885-19/s150x150/18646601_1338900956147235_2234188480676626432_a.jpg', 1497225601, 1497225601, 200, 'Milano', 'Umbria', '0', '0', 'IT', 'Italy', 'EU', '42.7833', '12.6', '18', 'Umbria', 'EUR', '€', '0.9348'),
(5, '89.246.253.44', 'LinkedIn', 'HtRia24_lf', 'Kaan Trak', 'Kaan', 'Trak', 'cisociall@gmail.com', 'cisociall@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'OKG şirketinde General Manager', NULL, NULL, 'Bursa, Turkey', NULL, NULL, NULL, 1, 'social', 'https://www.linkedin.com/', 'Windows 10', '', 'Opera', '45.0.2552.888', 'https://www.linkedin.com/in/kaan-trak-43a958142', 'https://media.licdn.com/mpr/mprx/0_1J2xFlHQ9MzaalC5yeNOivtb94k7ah8HzjqAGXgbtpwaarAkMeZ0ul5QNgMtSruHJeNlf6E6xxomHXfMsEd_f5woVxofHXveJEdyXkYFAY0_G-mqvRx-krK9sor0TXGMKdSP_9EcSKo', 1497225601, 1497225601, 200, 'Berlin', 'Berlin', '0', '0', 'DE', 'Germany', 'EU', '52.5285', '13.4109', '16', 'Berlin', 'EUR', '€', '0.9348'),
(6, '159.253.145.150', 'Vimeo', '66305307', 'Kaan Trak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'It helps you to integrate social login in your CodeIgniter Website or wherever you would like to use it. This plugin is uses different customized libraries for top 16 social network providers.', NULL, NULL, NULL, NULL, 'istanbul', NULL, 1, 'social', '', 'Windows 7', '', 'Chrome', '58.0.3029.110', 'https://vimeo.com/user66305307', 'https://i.vimeocdn.com/portrait/19549099_300x300?r=pad', 1497225601, 1497225601, 200, 'Amsterdam', 'North Holland', '0', '0', 'NL', 'Netherlands', 'EU', '52.35', '4.9167', '07', 'North Holland', 'EUR', '€', '0.9348'),
(7, '147.6.1.21', 'Foursquare', '420679534', 'Kaan Trak', 'Kaan', 'Trak', 'cisociall@gmail.com', 'cisociall@gmail.com', NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Istanbul, 34', NULL, NULL, NULL, NULL, NULL, 1, 'social', '', 'Windows 10', '', 'Opera', '45.0.2552.888', 'https://www.foursquare.com/user/420679534', 'https://igx.4sqi.net/img/user/100x100/420679534_l50w851s_3ORv996ZcrccVRyszzGQBDTHKviq3mMa1CyGX5-XIwZR_owlZxMmMxSdcBD6Eigb', 1497225601, 1497225601, 200, 'Seoul', 'Seoul', '0', '0', 'KR', 'Korea, Republic of', 'AS', '37.5111', '126.9743', '11', 'Seoul', 'KRW', '₩', '1148.974'),
(8, '27.131.11.254', 'Dribbble', '1719256', 'Kaan Trak', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Codeigniter Social Login', NULL, NULL, NULL, NULL, NULL, NULL, 1, 'social', '', 'Linux', '', 'Firefox', '53.0.3', 'https://dribbble.com/cisociall', 'https://cdn.dribbble.com/users/1719256/avatars/normal/2e260f454994174d36ee250e7776551f.jpg?1495911450', 1497225601, 1497225601, 200, 'Tokyo', 'Tōkyō', '0', '0', 'JP', 'Japan', 'AS', '35.6427', '139.7677', '40', 'Tōkyō', 'JPY', '¥', '114.6938'),
(9, '195.91.224.113', 'Odnoklassniki', '575480726411', 'cisociall Social Login', 'cisociall', 'Social Login', '', '', NULL, 'male', NULL, 19, 9, 1985, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'social', '', 'Windows 10', '', 'Chrome', '58.0.3029.110', '', 'https://i.mycdn.me/image?id=856476454539&t=33&plc=API&ts=000000000000000366&aid=1251032064&tkn=*wzoVa1gTikLnSLLk_75WBsjtu70', 1497225601, 1497225601, 200, 'Moscow', 'Moscow', '0', '0', 'RU', 'Russian Federation', 'EU', '55.752', '37.615', '48', 'Moscow', 'RUB', 'руб', '58.9819'),
(10, '93.100.118.94', 'Vkontakte', '427554739', 'id427554739', 'Kaan', 'Trak', 'cisociall@gmail.com', NULL, NULL, 'male', NULL, 19, 9, 1985, NULL, NULL, NULL, NULL, 'İstanbul', NULL, 'Turkey', NULL, NULL, NULL, 1, 'social', '', 'Linux', '', 'Firefox', '53.0.3', 'http://vk.com/id427554739', 'https://pp.userapi.com/c639623/v639623739/219e1/WDe4LPJpFN8.jpg', 1497225601, 1497225601, 200, 'Saint Petersburg', 'Sankt-Peterburg', '0', '0', 'RU', 'Russian Federation', 'EU', '59.8944', '30.2642', '66', 'Sankt-Peterburg', 'RUB', 'руб', '58.9819'),
(11, '176.36.52.189', 'Yandex', '500608728', 'cisociall', 'Kaan Trak', '', 'cisociall@yandex.com', 'cisociall@yandex.com', NULL, 'male', NULL, 19, 9, 1985, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'social', '', 'iOS', '', 'Safari', '10.1', '', 'http://upics.yandex.net/500608728/normal', 1497225601, 1497225601, 200, 'Kiev', 'Misto Kyyiv', '0', '0', 'UA', 'Ukraine', 'EU', '50.4333', '30.5167', '12', 'Misto Kyyiv', 'UAH', '₴', '0'),
(12, '91.215.55.32', 'Mailru', '3784282341590699797', 'Kaan Trak', 'Kaan', 'Trak', 'cisociall@mail.ru', 'cisociall@mail.ru', NULL, '0', NULL, 19, 9, 1985, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'social', '', 'iOS', '', 'Safari', '10.1', 'https://my.mail.ru/mail/cisociall/', 'http://avt-30.foto.mail.ru/mail/cisociall/_avatar?1495911090', 1497225601, 1497225601, 200, 'Dnepropetrovsk', 'Dnipropetrovs&#039;ka Oblast&#039;', '0', '0', 'UA', 'Ukraine', 'EU', '48.463', '35.039', '04', 'Dnipropetrovs&#039;ka Oblast&#039;', 'UAH', '₴', '0'),
(13, '85.203.17.254', 'px500', '22122035', 'cisociall', 'Kaan', 'Trak', NULL, NULL, NULL, 'male', NULL, NULL, NULL, NULL, NULL, NULL, '', 'Codeigniter Social Login', 'istanbul', '', 'Turkey', NULL, NULL, NULL, 1, 'social', '', 'iOS', '', 'Safari', '10.1', 'http://cisociall.500px.com', 'https://pacdn.500px.org/22122035/5c588f72b9489316345bca7e5a383765bbb29d6e/1.jpg?3', 1497225601, 1497225601, 200, 'Paris', '&Icirc;le-de-France', '0', '0', 'FR', 'France', 'EU', '48.8448', '2.3471', 'A8', '&Icirc;le-de-France', 'EUR', '€', '0.9348'),
(14, '131.228.29.71', 'TwitchTv', '156155310', 'cisociall', NULL, NULL, 'cisociall@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'social', 'http://cisociall.eu/social', 'Windows 8.1', '', 'Chrome', '58.0.3029.110', 'http://www.twitch.tv/cisociall', 'https://static-cdn.jtvnw.net/jtv_user_pictures/2333c2a078c3f355-profile_image-300x300.png', 1497225601, 1497225601, 200, 'London', 'London', '0', '0', 'GB', 'United Kingdom', 'EU', '51.5092', '-0.0955', 'H9', 'London', 'GBP', '£', '0.821'),
(15, '84.205.231.39', 'BitBucket', '{a4814ab0-72c7-465c-a18b-fa1718661c7a}', 'Kaan Trak', NULL, NULL, 'cisociall@gmail.com', '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'social', '', 'Windows 10', '', 'Spartan', '14.14393', NULL, 'https://bitbucket.org/account/cisociall/avatar/320', 1497225601, 1497225601, 200, 'Athens', 'Attik&iacute;', '0', '0', 'GR', 'Greece', 'EU', '37.9833', '23.7333', '35', 'Attik&iacute;', 'EUR', '€', '0.9348'),
(16, '107.170.17.131', 'GitHub', '28503339', 'cisociall', NULL, NULL, 'cisociall@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Codeigniter Social Login', NULL, 'istanbul', NULL, NULL, NULL, NULL, 1, 'social', 'https://github.com/', 'iOS', 'Apple iPhone', 'Safari', '602.1', 'https://github.com/cisociall', 'https://avatars0.githubusercontent.com/u/28503339?v=3', 1497225601, 1497225601, 200, 'New York', 'NY', '212', '501', 'US', 'United States', 'NA', '40.7308', '-73.9975', 'NY', 'New York', 'USD', '$', '1');
