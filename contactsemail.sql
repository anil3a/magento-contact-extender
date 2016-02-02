
CREATE TABLE `contactsusemail` (
  `contactemails_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `message` text NOT NULL,
  `created_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`contactemails_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

