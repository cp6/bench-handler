/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

CREATE TABLE IF NOT EXISTS `nench` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `server` varchar(128) DEFAULT NULL,
  `cpu_model` varchar(128) DEFAULT NULL,
  `cpu_cores` int(11) DEFAULT NULL,
  `cpu_freq` decimal(10,2) DEFAULT NULL,
  `disk` decimal(10,2) DEFAULT NULL,
  `mem` decimal(10,2) DEFAULT NULL,
  `mem_swap` decimal(10,2) DEFAULT NULL,
  `kernel` varchar(128) DEFAULT NULL,
  `hash` decimal(10,3) DEFAULT NULL,
  `compress` decimal(10,3) DEFAULT NULL,
  `encrypt` decimal(10,3) DEFAULT NULL,
  `iop_seek_min` decimal(10,2) DEFAULT NULL,
  `iop_seek_avg` decimal(10,2) DEFAULT NULL,
  `iop_seek_max` decimal(10,2) DEFAULT NULL,
  `iop_seek_mdev` decimal(10,2) DEFAULT NULL,
  `iop_read_req` decimal(10,2) DEFAULT NULL,
  `iop_read_speed` decimal(10,2) DEFAULT NULL,
  `iop_read_iops` decimal(10,2) DEFAULT NULL,
  `iop_read_write` decimal(10,2) DEFAULT NULL,
  `io1` decimal(10,2) DEFAULT NULL,
  `io2` decimal(10,2) DEFAULT NULL,
  `io3` decimal(10,2) DEFAULT NULL,
  `io_avg` decimal(10,2) DEFAULT NULL,
  `cachefly` decimal(10,2) DEFAULT NULL,
  `l_nl` decimal(10,2) DEFAULT NULL,
  `s_dallas` decimal(10,2) DEFAULT NULL,
  `o_france` decimal(10,2) DEFAULT NULL,
  `ovh_bhs` decimal(10,2) DEFAULT NULL,
  `datetime` datetime DEFAULT NULL,
  KEY `Index 1` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
