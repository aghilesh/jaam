CREATE TABLE IF NOT EXISTS `reg_test_preparation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reg_id` int(11) NOT NULL,
  `toffel` int(11) NOT NULL,
  `ielts` int(11) NOT NULL,
  `gmat` int(11) NOT NULL,
  `gre` int(11) NOT NULL,
  `sat` int(11) NOT NULL,
  `started_coaching` tinyint(1) NOT NULL,
  `looking_for_coaching` tinyint(1) NOT NULL,
  `looking_for_waier` tinyint(1) NOT NULL,
  `regular_or_fasttrack` varchar(50) NOT NULL,
  `work_experiance` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;