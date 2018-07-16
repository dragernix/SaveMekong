CREATE DATABASE IF NOT EXISTS `unesco` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `unesco`;

DROP TABLE IF EXISTS `suggestion`;
CREATE TABLE IF NOT EXISTS `suggestions` (
  `sid` int NOT NULL auto_increment,
  `suggestion` varchar(256) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;