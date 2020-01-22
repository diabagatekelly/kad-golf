/*!40101 SET NAMES binary*/;
/*!40014 SET FOREIGN_KEY_CHECKS=0*/;

CREATE TABLE `wp_Aalb_Asin_Response` (
  `asin` varchar(10) NOT NULL,
  `marketplace` varchar(5) NOT NULL,
  `item_lookup_response` text,
  `last_updated_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_access_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`asin`,`marketplace`),
  KEY `index_last_updated_time` (`last_updated_time`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
