CREATE TABLE IF NOT EXISTS `donor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_type` varchar(255) NOT NULL,
  `donor` varchar(255) DEFAULT NULL,
  `charity_no` int(11) DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;

CREATE TABLE IF NOT EXISTS `donation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `donor_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


insert  into `donation`(`id`,`donor_id`,`date`,`amount`) values (1,1,'2014-07-09 00:00:00',123);
insert  into `donation`(`id`,`donor_id`,`date`,`amount`) values (2,1,'2014-06-02 00:00:00',432);

insert  into `donor`(`id`,`donor_type`,`donor`,`charity_no`,`grants`,`town`,`postcode`) values (1,'1','Test Donor Name',35467,456587,'NY','111222333');

insert  into `user`(`id`,`email`,`password`,`name`) values (1,'test','098f6bcd4621d373cade4e832627b4f6','Test User');