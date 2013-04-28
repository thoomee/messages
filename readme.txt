Létrehozzuk a következő adatbázist

	CREATE DATABASE `messages` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
	USE `messages`;


A hozzá tartozó táblákat

	CREATE TABLE IF NOT EXISTS `msg` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`group_random` int(10) NOT NULL,
		`from_id` int(10) NOT NULL,
		`message` varchar(255) NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;


	CREATE TABLE IF NOT EXISTS `msg_group` (
		`from_user` int(10) NOT NULL,
		`to_user` int(10) NOT NULL,
		`random` int(20) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=latin1;


	CREATE TABLE IF NOT EXISTS `users` (
		`id` int(11) NOT NULL AUTO_INCREMENT,
		`username` varchar(255) NOT NULL,
		`password` varchar(255) NOT NULL,
		PRIMARY KEY (`id`)
	) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

	##################################################
	
