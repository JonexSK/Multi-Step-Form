SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `data` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `meno` varchar(50) NOT NULL,
  `priezvisko` varchar(50) NOT NULL,
  `ulica` varchar(100) NOT NULL,
  `cislo_domu` varchar(20) NOT NULL,
  `psc` varchar(5) NOT NULL,
  `mesto` varchar(100) NOT NULL,
  `iban` varchar(100) NOT NULL,
  `datum` TIMESTAMP NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
