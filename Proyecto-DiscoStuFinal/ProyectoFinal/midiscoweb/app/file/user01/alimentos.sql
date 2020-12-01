
CREATE TABLE IF NOT EXISTS `alimentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `energia` decimal(10,0) NOT NULL,
  `proteina` decimal(10,0) NOT NULL,
  `hidratocarbono` decimal(10,0) NOT NULL,
  `fibra` decimal(10,0) NOT NULL,
  `grasatotal` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;


INSERT INTO `alimentos` (`id`, `nombre`, `energia`, `proteina`, `hidratocarbono`, `fibra`, `grasatotal`) VALUES
(1, 'Chorizo', 100, 10, 10, 10, 10),
(2, 'Chocolate', 300, 10, 101, 101, 20),
(3, 'Queso fresco', 100, 20, 10, 10, 0),
(4, 'Atun', 100, 10, 10, 10, 10),
(5, 'Miel', 400, 10, 2, 101, 0),
(6, 'Lentejas', 100, 20, 10, 30, 100),
(7, 'Garbanzos', 160, 10, 10, 30, 10),
(9, 'Queso curado', 300, 10, 101, 101, 10),
(10, 'Pan blanco', 100, 20, 10, 30, 80),
(11, 'Morcilla', 200, 10, 10, 40, 10);
