/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_aal_request_cache` (
  `name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `request_uri` text COLLATE utf8mb4_unicode_520_ci,
  `type` varchar(20) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `charset` varchar(20) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `cache` mediumblob,
  `modified_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `expiration_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
