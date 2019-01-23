SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `bookrecord` (
  `bookid` int(11) NOT NULL AUTO_INCREMENT,
  `bid` int(11) NOT NULL,
  `issued` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bookid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

INSERT INTO `bookrecord` (`bookid`, `bid`, `issued`) VALUES
(1, 1, 0),
(2, 1, 0),
(3, 1, 0),
(4, 2, 1),
(5, 2, 0),
(6, 3, 0),
(7, 3, 0),
(8, 3, 1),
(9, 3, 0),
(10, 3, 1),
(11, 4, 0),
(12, 4, 0),
(13, 5, 1),
(14, 5, 0),
(15, 5, 0);

CREATE TABLE IF NOT EXISTS `books` (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(100) DEFAULT NULL,
  `bauth` varchar(100) DEFAULT NULL,
  `bcopies` int(11) NOT NULL DEFAULT '1',
  `bpub` varchar(40) DEFAULT NULL,
  `bsup` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`bid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

INSERT INTO `books` (`bid`, `bname`, `bauth`, `bcopies`, `bpub`, `bsup`) VALUES
(1, 'Gone with the Wind', 'Margret Mitchell', 3, NULL, NULL),
(2, 'Twilight The Saga', 'Stephenie Meyer', 2, NULL, NULL),
(3, 'The Da vince code', 'Dan brown', 5, NULL, NULL),
(4, 'Harry Potter', 'J K rowling', 2, NULL, NULL),
(5, 'Hunger Games', 'Suzanne Collins', 3, NULL, NULL);

CREATE TABLE IF NOT EXISTS `members` (
  `mid` int(11) NOT NULL AUTO_INCREMENT,
  `mname` varchar(100) DEFAULT NULL,
  `mph` varchar(12) DEFAULT NULL,
  `mbook` tinyint(1) NOT NULL DEFAULT '0',
  `mad` varchar(250) DEFAULT NULL,
  `mdoj` date DEFAULT NULL,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

INSERT INTO `members` (`mid`, `mname`, `mph`, `mbook`, `mad`, `mdoj`) VALUES
(1, 'Oliver', '9879879877', 0, NULL, NULL),
(2, 'Phineas', '7897897899', 1, NULL, NULL),
(3, 'Andrew', '8528528522', 1, NULL, NULL),
(4, 'Philip', '9898989898', 1, NULL, NULL),
(5, 'John', '7537537532', 0, NULL, NULL),
(6, 'Katelyn', '7899877899', 0, NULL, NULL),
(7, 'Samuel', '8495622587', 0, NULL, NULL),
(8, 'Sam', '9879855632', 1, NULL, NULL);

CREATE TABLE IF NOT EXISTS `register` (
  `iid` int(11) NOT NULL AUTO_INCREMENT,
  `bookid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `idate` date NOT NULL,
  `ireturn` date DEFAULT NULL,
  `remarks` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`iid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

INSERT INTO `register` (`iid`, `bookid`, `mid`, `idate`, `ireturn`, `remarks`) VALUES
(1, 1, 1, '2015-06-10', '2015-06-17', NULL),
(2, 8, 2, '2015-06-11', '2015-06-27', NULL),
(3, 11, 3, '2015-06-13', '2015-06-27', 'REISSUED'),
(4, 9, 5, '2015-06-20', '2015-06-27', 'REISSUED'),
(5, 5, 7, '2015-06-22', '2015-06-27', 'REISSUED'),
(6, 12, 1, '2015-06-27', '2015-06-27', NULL),
(7, 8, 2, '2015-06-27', '2015-06-27', NULL),
(8, 11, 3, '2015-06-27', '2015-06-29', ''),
(9, 9, 5, '2015-06-27', '2015-06-29', 'fine'),
(10, 5, 7, '2015-06-27', '2015-06-29', 'good condition'),
(11, 11, 3, '2015-06-29', '2015-06-29', 'page 20 torn'),
(12, 10, 4, '2015-06-29', '2015-06-29', 'REISSUED'),
(13, 8, 2, '2015-06-29', NULL, NULL),
(14, 13, 8, '2015-06-29', NULL, NULL),
(15, 4, 3, '2015-06-29', NULL, NULL),
(16, 10, 4, '2015-06-29', NULL, NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
