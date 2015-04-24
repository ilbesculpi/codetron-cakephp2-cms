-- administrators --
DROP TABLE IF EXISTS `administrators`;
CREATE TABLE `administrators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(128) NOT NULL,
  `password` char(64) NOT NULL,
  `name` varchar(64) DEFAULT NULL,
  `role` varchar(32) NOT NULL DEFAULT 'admin',
  `last_login` timestamp NULL DEFAULT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` smallint(6) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;
