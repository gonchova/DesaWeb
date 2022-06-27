--
-- Estructura de tabla para la tabla `clientes`
--



CREATE TABLE `clientes` (
  `idcliente` INT(11) NOT NULL COMMENT 'Id de cliente autoincremental',
  `Nombre` VARCHAR(150) NOT NULL COMMENT 'Nombre del cliente',
  `Apellido` VARCHAR(150) NOT NULL COMMENT 'Apellido del cliente',
  `dni` INT(11) NOT NULL COMMENT 'dni del cliente',
  `direccion` VARCHAR(100) NOT NULL COMMENT 'direccion del cliente',
  `email` VARCHAR(50) NOT NULL COMMENT 'email del cliente',
  `telefono` VARCHAR(50) NOT NULL COMMENT 'telefono del cliente',
  `observaciones` VARCHAR(250) NOT NULL
) ENGINE=INNODB DEFAULT CHARSET=utf8mb4 COMMENT='tabla de clientes';


ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idcliente`);
  
ALTER TABLE `clientes`
  MODIFY `idcliente` INT(11) NOT NULL AUTO_INCREMENT COMMENT 'Id de cliente autoincremental';
COMMIT;



INSERT INTO `clientes` (`Nombre`, `Apellido`, `dni`, `direccion`, `email`, `telefono`, `observaciones`) 
VALUES
('Ramon', 'Gomez', 29789325, 'Rivadavia 15464, haedo', 'rgomez@asf.com', '1155665544', 'Nuevo'),
('Lucia', 'Gomez', 12312334, 'Rivadavia 15464, haedo', 'lugomez@asf.com', '11233555', ''),
('Diego', 'Sanchez', 12312312, 'palparata 124, liniers', 'dsanchez_2@mailes.com', '112312323', ''),
('Juan', 'Chomtez', 2231234, 'Cartanada 1524, Cordoba', 'jCom123@asf.com', '1152265544', 'Corresponde otra direccion'),
('Raul', 'lopez', 135783534, 'San martin 64, Villa Mitre', '', '114564454', ''),
('Fernanda', 'Marciotta', 23456325, 'peperonnio 12234, Lujan', 'fesfz@gmail.com', '113245544', ''),
('Josefina', 'Diaz', 29333325, 'Los alerces 215464, santa fe', 'jdiaz@asf.com', '1153335544', ''),
('Marcela', 'Castellano', 21229334, 'Rojas 1364, Capital Federal', 'marcecaste@farca.com', '112323544', ''),
('Mirco', 'Sorteado', 28123123, 'Malasia 2364, Chipoletti', 'malasor@aaa.com', '1155665533', '');
