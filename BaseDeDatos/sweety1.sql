-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-05-2019 a las 03:42:03
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sweety1`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarEstadoPedido` (IN `idPedido` INT, IN `estado` INT)  NO SQL
UPDATE tbl_pedido P SET P.Id_Estado_pedido = estado WHERE P.Id_Pedido = idPedido$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ActualizarStockInsumo` (IN `stockRestante` INT, IN `id` INT)  NO SQL
UPDATE tbl_insumo  SET cantidad = stockRestante WHERE Codigo_insumo = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AplicarRecargo` (IN `idPedido` INT, IN `Valor` INT)  NO SQL
UPDATE tbl_pedido P SET P.Aplicar_recargo = Valor WHERE P.Id_Pedido = idPedido$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `BuscarItem` (IN `id` INT)  NO SQL
SELECT * FROM tbl_ancheta WHERE Codigo_Ancheta = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `consultarAnchetasCatalogo` (IN `Buscar` VARCHAR(100), IN `primero` INT, IN `ultimo` INT)  NO SQL
SELECT * FROM tbl_ancheta  WHERE Nombre_Ancheta LIKE concat('%',Buscar,'%') ORDER BY Descuento DESC  LIMIT primero,ultimo$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarAnchetasPedido` (IN `IdPedido` INT)  NO SQL
SELECT A.Nombre_Ancheta,PA.Cantidad,PA.SubTotal,A.Precio,A.Descuento  FROM tbl_pedido_has_ancheta PA INNER JOIN tbl_ancheta A ON  PA.Codigo_Ancheta = A.Codigo_Ancheta WHERE PA.Id_Pedido = IdPedido$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDireccionTienda` ()  NO SQL
SELECT * FROM tbl_empresa WHERE Nit_Empresa = 51551$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarDireccionUser` (IN `documento` INT)  NO SQL
SELECT Direccion FROM tbl_persona where id_Persona = documento$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEstadoPedido` (IN `id` INT)  NO SQL
SELECT P.id_Pedido,P.Fecha_Pedido ,P.Hora_Pedido ,E.Nombre AS estado_pedido, E.Id_Estado_Pedido FROM tbl_pedido P  INNER JOIN  tbl_estado_pedido E ON P.Id_Estado_pedido = E.Id_Estado_Pedido AND P.Id_Pedido = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarEstadosPedido` ()  NO SQL
SELECT * FROM tbl_estado_pedido$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarOfertas` (IN `Buscar` VARCHAR(200))  NO SQL
SELECT Codigo_Ancheta,Nombre_Ancheta,Precio,Descuento,Foto1 FROM tbl_ancheta WHERE Descuento IS  NOT null AND Estado = 1 AND Nombre_Ancheta LIKE concat('%',Buscar,'%') LIMIT 5$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedido` (IN `id` INT)  NO SQL
SELECT * FROM tbl_pedido WHERE id_Pedido = id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedidos` (IN `Persona` INT)  NO SQL
SELECT P.id_Pedido,P.Fecha_Pedido ,P.Hora_Pedido ,E.Nombre AS estado_pedido, E.Id_Estado_Pedido ,te.Nombre FROM tbl_pedido P  INNER JOIN  tbl_estado_pedido E ON P.Id_Estado_pedido = E.Id_Estado_Pedido INNER JOIN tbl_tipo_envio te ON te.Id_Tipo_Envio = P.Id_Tipo_Envio WHERE P.Id_Persona = Persona ORDER BY P.Id_Pedido DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPedidosAdmin` ()  NO SQL
SELECT pe.Documento_Identificacion,CONCAT(pe.Nombre,pe.Apellido) AS Nombre_Completo,pe.Celular,pe.Telefono,P.Id_Pedido,P.Direccion_Envio,P.Fecha_Pedido,T.Nombre as tipo_envio,T.Id_Tipo_Envio,EP.Nombre as Estado,P.Aplicar_recargo FROM tbl_pedido P INNER JOIN tbl_persona Pe ON P.Id_Persona = Pe.Id_Persona INNER JOIN tbl_tipo_envio T ON t.Id_Tipo_Envio = P.Id_Tipo_Envio INNER JOIN tbl_estado_pedido EP ON EP.Id_Estado_Pedido = P.Id_Estado_pedido ORDER BY P.Id_Pedido DESC$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarPersona` (IN `documento` INT)  NO SQL
SELECT *  from tbl_persona P WHERE P.Documento_Identificacion = documento$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ConsultarUltimoPedido` (IN `Persona` INT)  NO SQL
SELECT * FROM tbl_pedido WHERE id_Persona = Persona AND id_Estado_pedido = 2 ORDER BY id_Pedido DESC LIMIT 1$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `PlantillaInsumos` (IN `Plantilla` INT, IN `Num_Ancheta` INT)  NO SQL
SELECT I.Codigo_insumo,I.Nombre_Insumo,(I.cantidad-(IP.Cantidad*Num_Ancheta)) AS Insumos_Restantes, I.cantidad as Cantidad_insumo,IP.Cantidad as cantidad FROM tbl_insumo_has_plantilla IP INNER JOIN tbl_insumo I ON IP.Codigo_insumo = I.Codigo_insumo WHERE IP.Codigo_Plantilla = plantilla$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarDetallePedido` (IN `Pedido` INT, IN `Ancheta` INT, IN `cantidad` INT, IN `subtotal` INT)  NO SQL
BEGIN
INSERT INTO tbl_pedido_has_ancheta(id_Pedido,Codigo_Ancheta,Cantidad,Subtotal) VALUES (Pedido,Ancheta,cantidad,subtotal);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `RegistrarPedido` (IN `Direccion` VARCHAR(45), IN `Fecha` DATE, IN `Envio` INT, IN `Persona` INT, IN `hora` TIME)  BEGIN
INSERT INTO tbl_pedido(Direccion_Envio,Fecha_Pedido,Id_Estado_pedido,Id_Tipo_Envio,id_Persona,Hora_Pedido) VALUES (Direccion,fecha,2,Envio,Persona,hora);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `totalProductosBuscar` (IN `Buscar` VARCHAR(100))  NO SQL
SELECT count(*) AS num_registros FROM tbl_ancheta WHERE Nombre_Ancheta LIKE CONCAT('%',Buscar,'%')$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarInsumoLicor` (IN `plantilla` INT)  NO SQL
SELECT I.Nombre_Insumo, IP.Codigo_Plantilla FROM tbl_insumo_has_plantilla IP INNER JOIN tbl_insumo I ON IP.Codigo_insumo = I.Codigo_insumo WHERE IP.Codigo_Plantilla = plantilla AND I.id_Categoria = 2$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ValidarLogin` (IN `email` VARCHAR(200), IN `pwd` VARCHAR(200))  NO SQL
SELECT P.Id_Persona,P.Documento_Identificacion,P.Nombre, P.Apellido,P.Direccion,P.Telefono,P.Celular,P.Fecha_Nacimiento,P.Estado,U.Email,U.Id_Rol,P.Genero FROM tbl_persona P INNER JOIN tbl_usuario U ON P.Id_Persona=U.id_Persona WHERE U.Email= email AND U.Pass = pwd$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ancheta`
--

CREATE TABLE `tbl_ancheta` (
  `Codigo_Ancheta` int(11) NOT NULL,
  `Nombre_Ancheta` varchar(45) NOT NULL,
  `Descripcion` longtext NOT NULL,
  `Precio` int(11) NOT NULL,
  `Foto1` varchar(255) NOT NULL,
  `Foto2` varchar(255) DEFAULT NULL,
  `Foto3` varchar(255) DEFAULT NULL,
  `Descuento` int(11) DEFAULT NULL,
  `Tipo_Base` int(11) NOT NULL,
  `Estado` tinyint(1) NOT NULL,
  `Id_Plantilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_ancheta`
--

INSERT INTO `tbl_ancheta` (`Codigo_Ancheta`, `Nombre_Ancheta`, `Descripcion`, `Precio`, `Foto1`, `Foto2`, `Foto3`, `Descuento`, `Tipo_Base`, `Estado`, `Id_Plantilla`) VALUES
(5, 'Ancheta Amigo', 'Base de madera 15 cm x 15 cm ,Cerveza Corona  y Heineken personal,milky way pequeña,papas pringles BBQ , m & m pequeño , many la especial pequeño ,2 afiches de decoración  ', 35000, 'ancheta-amigo.jpg', NULL, NULL, 5, 3, 1, 1),
(6, 'Ancheta Madre', 'Base madera 20 cm x 20 cm , globo  mediano decoración ,picada de frutas mediana,posillo pequeño ,sobre de chocolate mexicano ,pan italiano pequeño,plata decoración pequeña, bebida natural de mango y de guanabana personal,flor de tela decorativa .', 60000, 'ancheta-mama.jpg', NULL, NULL, NULL, 3, 1, 2),
(7, 'Ancheta Madre 2 ', 'Base de papel globo , Crema para peinar mediana , 2 Flores de peluche mediana,globo feliz dia mamá ,locion francesa , 2 decorativos(Moño,rositas de tela)', 30000, 'ancheta1.jpg', 'cumpleanos2.jpg', 'anchetacumple.jpg', 10, 2, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `Id_Categoria` int(11) NOT NULL,
  `Nombre_Categoria` varchar(40) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`Id_Categoria`, `Nombre_Categoria`, `Estado`) VALUES
(1, 'Peluche ', 1),
(2, 'Licor', 1),
(3, 'Dulces', 0),
(4, 'Dulces', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_compra`
--

CREATE TABLE `tbl_compra` (
  `Id_Compra` int(11) NOT NULL,
  `Precio_Unidad` int(11) NOT NULL,
  `Fecha_Compra` date DEFAULT NULL,
  `Nit_Empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empresa`
--

CREATE TABLE `tbl_empresa` (
  `Nit_Empresa` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_empresa`
--

INSERT INTO `tbl_empresa` (`Nit_Empresa`, `Nombre`, `Telefono`, `Direccion`) VALUES
(1147, 'WONKA', '3145210', '3201457525'),
(1547, 'Carlos el carpintero', '1424525', 'calle 87'),
(5789, 'Cervezas', '2589866', 'Diagonal 3 cc'),
(51551, 'Dulces Momentos', '2345874', 'Calle 76 # 67-32 poblado'),
(104001, 'Peluchelandia', '2345874', 'Calle 89 # 76 -1'),
(154874, 'Coca Cola', '3254147', 'Calle 47 #  83-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_pedido`
--

CREATE TABLE `tbl_estado_pedido` (
  `Id_Estado_Pedido` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_estado_pedido`
--

INSERT INTO `tbl_estado_pedido` (`Id_Estado_Pedido`, `Nombre`) VALUES
(2, 'Aprobado'),
(3, 'Producción'),
(4, 'Enviado'),
(5, 'Entregado'),
(6, 'Cancelado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_insumo`
--

CREATE TABLE `tbl_insumo` (
  `Codigo_insumo` int(11) NOT NULL,
  `Nombre_Insumo` varchar(50) NOT NULL,
  `Fecha_Vencimiento` date DEFAULT NULL,
  `Estado` bit(1) NOT NULL,
  `Precio_Entrada` int(11) NOT NULL,
  `Precio_Cliente` int(11) NOT NULL,
  `StockMinimo` int(11) NOT NULL,
  `id_Categoria` int(11) NOT NULL,
  `Id_Tamano` int(11) NOT NULL,
  `Id_Tipo_Envoltura` int(11) NOT NULL,
  `Nit_Proveedor` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Imagen` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_insumo`
--

INSERT INTO `tbl_insumo` (`Codigo_insumo`, `Nombre_Insumo`, `Fecha_Vencimiento`, `Estado`, `Precio_Entrada`, `Precio_Cliente`, `StockMinimo`, `id_Categoria`, `Id_Tamano`, `Id_Tipo_Envoltura`, `Nit_Proveedor`, `cantidad`, `Imagen`) VALUES
(1, 'Wisky', '2019-05-26', b'1', 40000, 55000, 5, 2, 2, 3, 5789, 1, NULL),
(2, 'Oso de peluche', '2019-05-30', b'1', 50000, 69999, 3, 1, 3, 6, 104001, 2, NULL),
(3, 'Aguardiente', '2019-06-04', b'1', 45000, 52000, 8, 2, 2, 3, 5789, 50, NULL),
(4, 'pandas de peluche', NULL, b'0', 40000, 50000, 10, 1, 2, 6, 104001, 15, 'ImagenInsumo/'),
(5, 'Coca Zero', NULL, b'0', 500, 1500, 2, 2, 1, 5, 154874, 5, 'ImagenInsumo/'),
(6, 'Chocolatina Wonka', NULL, b'0', 2500, 5000, 5, 4, 2, 1, 1147, 8, 'ImagenInsumo/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_insumo_has_compra`
--

CREATE TABLE `tbl_insumo_has_compra` (
  `Id_Compra` int(11) NOT NULL,
  `Codigo_Insumo` int(11) NOT NULL,
  `SubTotal` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_insumo_has_plantilla`
--

CREATE TABLE `tbl_insumo_has_plantilla` (
  `id_Detalle_InsumoPlan` int(11) NOT NULL,
  `Codigo_insumo` int(11) NOT NULL,
  `Codigo_Plantilla` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_insumo_has_plantilla`
--

INSERT INTO `tbl_insumo_has_plantilla` (`id_Detalle_InsumoPlan`, `Codigo_insumo`, `Codigo_Plantilla`, `Cantidad`) VALUES
(1, 2, 1, 3),
(2, 1, 1, 2),
(3, 4, 2, 3),
(4, 2, 2, 7),
(5, 3, 2, 3),
(7, 4, 3, 5),
(8, 5, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido`
--

CREATE TABLE `tbl_pedido` (
  `Id_Pedido` int(11) NOT NULL,
  `Direccion_Envio` varchar(50) NOT NULL,
  `Fecha_Pedido` date DEFAULT NULL,
  `Hora_Pedido` time NOT NULL,
  `Aplicar_recargo` float DEFAULT NULL,
  `Id_Estado_pedido` int(11) NOT NULL,
  `Id_Tipo_Envio` int(11) NOT NULL,
  `Id_Persona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_pedido`
--

INSERT INTO `tbl_pedido` (`Id_Pedido`, `Direccion_Envio`, `Fecha_Pedido`, `Hora_Pedido`, `Aplicar_recargo`, `Id_Estado_pedido`, `Id_Tipo_Envio`, `Id_Persona`) VALUES
(74, 'Calle 87 # 72-21 medellin', '2019-05-23', '08:13:25', 2500, 3, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_pedido_has_ancheta`
--

CREATE TABLE `tbl_pedido_has_ancheta` (
  `id_Detalle_PedidoAnche` int(11) NOT NULL,
  `Id_Pedido` int(11) NOT NULL,
  `Codigo_Ancheta` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `SubTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_pedido_has_ancheta`
--

INSERT INTO `tbl_pedido_has_ancheta` (`id_Detalle_PedidoAnche`, `Id_Pedido`, `Codigo_Ancheta`, `Cantidad`, `SubTotal`) VALUES
(66, 74, 7, 1, 27000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_persona`
--

CREATE TABLE `tbl_persona` (
  `Id_Persona` int(11) NOT NULL,
  `Documento_Identificacion` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Genero` char(1) NOT NULL,
  `Direccion` varchar(50) DEFAULT NULL,
  `Telefono` varchar(10) NOT NULL,
  `Celular` varchar(10) DEFAULT NULL,
  `Fecha_Nacimiento` date DEFAULT NULL,
  `Estado` bit(1) NOT NULL,
  `Nit_Empresa` int(11) DEFAULT NULL,
  `Id_Tipo_Persona` int(11) NOT NULL,
  `Id_Tipo_Documento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_persona`
--

INSERT INTO `tbl_persona` (`Id_Persona`, `Documento_Identificacion`, `Nombre`, `Apellido`, `Genero`, `Direccion`, `Telefono`, `Celular`, `Fecha_Nacimiento`, `Estado`, `Nit_Empresa`, `Id_Tipo_Persona`, `Id_Tipo_Documento`) VALUES
(1, 1023833417, 'Alexander ', 'Agudelo', 'M', 'Calle 87 # 72-21 castilla city', '2838323', '3218321233', '1999-05-30', b'1', NULL, 2, 1),
(4, 102857485, 'Esteven', 'Gonzales', 'M', 'Calle 89 # 76 -1', '2345874', '3145202144', '2000-06-20', b'1', NULL, 1, 1),
(5, 102544855, 'jose', 'Alzate', '', 'Calle 72 -14', '3012541', '3132564147', '2009-11-21', b'0', 154874, 3, 1),
(6, 70471698, 'Sara ', 'Bustamante', 'F', NULL, '2665898', NULL, '2002-05-15', b'1', NULL, 2, 1),
(7, 1000098814, 'Steven', 'Ortiz', '1', 'cra 45 robledo', '6033241', '3508476352', '2000-11-18', b'0', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_plantilla`
--

CREATE TABLE `tbl_plantilla` (
  `Codigo_Plantilla` int(11) NOT NULL,
  `Fecha_Registro` date DEFAULT NULL,
  `Id_Tipo_Plantilla` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_plantilla`
--

INSERT INTO `tbl_plantilla` (`Codigo_Plantilla`, `Fecha_Registro`, `Id_Tipo_Plantilla`) VALUES
(1, '2019-05-01', 1),
(2, '2019-05-13', 1),
(3, '2019-05-12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_rol`
--

CREATE TABLE `tbl_rol` (
  `Id_Rol` int(11) NOT NULL,
  `NombreRol` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_rol`
--

INSERT INTO `tbl_rol` (`Id_Rol`, `NombreRol`) VALUES
(1, 'Admin'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salida`
--

CREATE TABLE `tbl_salida` (
  `Codigo_Salida` int(11) NOT NULL,
  `Fecha_Salida` date DEFAULT NULL,
  `Motivo_Salida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_salida`
--

INSERT INTO `tbl_salida` (`Codigo_Salida`, `Fecha_Salida`, `Motivo_Salida`) VALUES
(1, '2019-11-12', 'Se las llevo mi madre'),
(2, '2019-02-02', 'La policia se las llevo'),
(3, '2019-03-03', 'mi perro'),
(4, '2019-11-11', 'mi gato'),
(5, '2019-12-14', 'caballos'),
(6, '2019-05-11', 'El aguardiente se quebro'),
(7, '2019-05-20', 'Licor aduterado'),
(8, '2019-05-20', 'Licor aduterado'),
(9, '2019-05-20', 'Licor aduterado'),
(10, '2019-05-20', 'Licor aduterado'),
(11, '2019-11-11', 'licor adulterado'),
(12, '2019-06-20', 'El perro se comio el peluche'),
(13, '2019-06-20', 'El perro se comio el peluche'),
(14, '2019-06-20', 'El perro se comio el peluche'),
(15, '2019-06-06', 'Carlos ayudemeeee'),
(16, '2019-06-06', 'Carlos ayudemeeee'),
(17, '2019-07-07', 'Nunca infame'),
(18, '2019-07-07', 'Nunca infame'),
(19, '2019-07-07', 'Nunca infame'),
(20, '2019-07-07', 'Nunca infame'),
(21, '2019-11-15', 'Que esta si de'),
(22, '2019-11-15', 'Que esta si de'),
(23, '2019-11-15', 'Que esta si de'),
(24, '2019-11-15', 'Que esta si de'),
(25, '2019-05-18', 'Se perdio'),
(26, '2019-05-18', 'Accidente'),
(27, '2019-05-18', 'Accidente '),
(28, '2019-05-22', 'hola');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_salida_has_insumo`
--

CREATE TABLE `tbl_salida_has_insumo` (
  `Codigo_Salida` int(11) NOT NULL,
  `Codigo_Insumo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_salida_has_insumo`
--

INSERT INTO `tbl_salida_has_insumo` (`Codigo_Salida`, `Codigo_Insumo`, `Cantidad`) VALUES
(1, 1, 0),
(1, 2, 0),
(2, 1, 0),
(2, 2, 0),
(3, 1, 0),
(4, 2, 0),
(5, 1, 2),
(6, 3, 2),
(7, 3, 2),
(11, 1, 4),
(12, 3, 4),
(16, 1, 4),
(16, 1, 4),
(18, 3, 2),
(19, 3, 2),
(20, 3, 2),
(21, 3, 6),
(22, 3, 6),
(23, 3, 6),
(24, 3, 6),
(25, 2, 8),
(25, 4, 2),
(26, 1, 20),
(26, 2, 5),
(27, 1, 10),
(27, 2, 15),
(28, 1, 20),
(28, 2, 3),
(28, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tamano`
--

CREATE TABLE `tbl_tamano` (
  `Id_Tamano` int(11) NOT NULL,
  `Nombre_Tamano` varchar(40) NOT NULL,
  `Estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tamano`
--

INSERT INTO `tbl_tamano` (`Id_Tamano`, `Nombre_Tamano`, `Estado`) VALUES
(1, 'Pequeño', 1),
(2, 'Mediano', 1),
(3, 'Grande', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_base`
--

CREATE TABLE `tbl_tipo_base` (
  `Id_Tipo_Base` int(11) NOT NULL,
  `Nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_base`
--

INSERT INTO `tbl_tipo_base` (`Id_Tipo_Base`, `Nombre`) VALUES
(2, 'Papelito'),
(3, 'Madera'),
(4, 'Plastico'),
(5, 'Aluminio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_documento`
--

CREATE TABLE `tbl_tipo_documento` (
  `Id_Tipo_Documento` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_documento`
--

INSERT INTO `tbl_tipo_documento` (`Id_Tipo_Documento`, `Nombre`) VALUES
(1, 'Cédula de ciudadania'),
(2, 'Tarjeta de identidad'),
(3, 'Cédula de extranjeria'),
(4, 'Pasaporte'),
(5, 'Nit');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_envio`
--

CREATE TABLE `tbl_tipo_envio` (
  `Id_Tipo_Envio` int(11) NOT NULL,
  `Nombre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_envio`
--

INSERT INTO `tbl_tipo_envio` (`Id_Tipo_Envio`, `Nombre`) VALUES
(1, 'Domicilio'),
(2, 'Tienda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_envoltura`
--

CREATE TABLE `tbl_tipo_envoltura` (
  `Id_Tipo_Envoltura` int(11) NOT NULL,
  `Nombre_Tipo_Envoltura` varchar(40) DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_envoltura`
--

INSERT INTO `tbl_tipo_envoltura` (`Id_Tipo_Envoltura`, `Nombre_Tipo_Envoltura`, `Estado`) VALUES
(1, 'Papel', 0),
(2, 'Carton', 0),
(3, 'Vidrio', 0),
(4, 'Lata', 0),
(5, 'Plastico', 0),
(6, 'Telas', 0),
(7, 'Madera', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_persona`
--

CREATE TABLE `tbl_tipo_persona` (
  `Id_Tipo_Persona` int(11) NOT NULL,
  `Rol_Persona` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_persona`
--

INSERT INTO `tbl_tipo_persona` (`Id_Tipo_Persona`, `Rol_Persona`) VALUES
(1, 'Administrador'),
(2, 'Cliente'),
(3, 'Proveedor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipo_plantilla`
--

CREATE TABLE `tbl_tipo_plantilla` (
  `Id_Tipo_Plantilla` int(11) NOT NULL,
  `Nombre_Tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_tipo_plantilla`
--

INSERT INTO `tbl_tipo_plantilla` (`Id_Tipo_Plantilla`, `Nombre_Tipo`) VALUES
(1, 'Producto terminado'),
(2, 'Personalizada');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuario`
--

CREATE TABLE `tbl_usuario` (
  `Id_Usuario` int(11) NOT NULL,
  `Email` varchar(45) NOT NULL,
  `Pass` varchar(45) NOT NULL,
  `RestablecerPass` varchar(45) DEFAULT NULL,
  `Fecha_recuperacion` datetime NOT NULL,
  `id_Persona` int(11) NOT NULL,
  `Id_Rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbl_usuario`
--

INSERT INTO `tbl_usuario` (`Id_Usuario`, `Email`, `Pass`, `RestablecerPass`, `Fecha_recuperacion`, `id_Persona`, `Id_Rol`) VALUES
(1, 'waagudelo04@misena.edu.co', '321a7827d4b43e61dedc9434177a2df6', '1557706875efgh', '2019-05-14 02:21:15', 1, 2),
(2, 'zthiven45@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, '0000-00-00 00:00:00', 4, 1),
(3, 'sara@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, '0000-00-00 00:00:00', 6, 2),
(4, 'ortizgarciastiven3@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, '0000-00-00 00:00:00', 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tmp`
--

CREATE TABLE `tmp` (
  `id_tmp` int(11) NOT NULL,
  `Codigo_Salida` int(11) NOT NULL,
  `Codigo_Insumo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `session_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_ancheta`
--
ALTER TABLE `tbl_ancheta`
  ADD PRIMARY KEY (`Codigo_Ancheta`),
  ADD UNIQUE KEY `Id_Plantilla_2` (`Id_Plantilla`),
  ADD KEY `FK_Base_Ancheta` (`Tipo_Base`),
  ADD KEY `Id_Plantilla` (`Id_Plantilla`);

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  ADD PRIMARY KEY (`Id_Compra`),
  ADD KEY `FK_Nit_Empresa` (`Nit_Empresa`);

--
-- Indices de la tabla `tbl_empresa`
--
ALTER TABLE `tbl_empresa`
  ADD PRIMARY KEY (`Nit_Empresa`);

--
-- Indices de la tabla `tbl_estado_pedido`
--
ALTER TABLE `tbl_estado_pedido`
  ADD PRIMARY KEY (`Id_Estado_Pedido`);

--
-- Indices de la tabla `tbl_insumo`
--
ALTER TABLE `tbl_insumo`
  ADD PRIMARY KEY (`Codigo_insumo`),
  ADD KEY `FK_Categoria` (`id_Categoria`),
  ADD KEY `FK_Tamaño` (`Id_Tamano`),
  ADD KEY `FK_Tipo_Envoltura` (`Id_Tipo_Envoltura`),
  ADD KEY `Nit_Proveedor` (`Nit_Proveedor`);

--
-- Indices de la tabla `tbl_insumo_has_compra`
--
ALTER TABLE `tbl_insumo_has_compra`
  ADD KEY `FK_DT_Insumo` (`Codigo_Insumo`),
  ADD KEY `FK_DT_Compra` (`Id_Compra`);

--
-- Indices de la tabla `tbl_insumo_has_plantilla`
--
ALTER TABLE `tbl_insumo_has_plantilla`
  ADD PRIMARY KEY (`id_Detalle_InsumoPlan`),
  ADD KEY `FK_Codigo_Insumo` (`Codigo_insumo`),
  ADD KEY `FK_Codigo_Plantilla` (`Codigo_Plantilla`);

--
-- Indices de la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD PRIMARY KEY (`Id_Pedido`),
  ADD KEY `FK_Pedido_Estado` (`Id_Estado_pedido`),
  ADD KEY `FK_Tipo_Envio` (`Id_Tipo_Envio`),
  ADD KEY `Id_Persona` (`Id_Persona`);

--
-- Indices de la tabla `tbl_pedido_has_ancheta`
--
ALTER TABLE `tbl_pedido_has_ancheta`
  ADD PRIMARY KEY (`id_Detalle_PedidoAnche`),
  ADD KEY `FK_ID_Pedido` (`Id_Pedido`),
  ADD KEY `FK_Cod_Ancheta` (`Codigo_Ancheta`);

--
-- Indices de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD PRIMARY KEY (`Id_Persona`),
  ADD KEY `FK_Tipo_Documento` (`Id_Tipo_Documento`),
  ADD KEY `FK_Tipo_Persona` (`Id_Tipo_Persona`),
  ADD KEY `FK_Empresa` (`Nit_Empresa`);

--
-- Indices de la tabla `tbl_plantilla`
--
ALTER TABLE `tbl_plantilla`
  ADD PRIMARY KEY (`Codigo_Plantilla`),
  ADD KEY `FK_Tipo_Plantilla` (`Id_Tipo_Plantilla`);

--
-- Indices de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  ADD PRIMARY KEY (`Id_Rol`);

--
-- Indices de la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  ADD PRIMARY KEY (`Codigo_Salida`);

--
-- Indices de la tabla `tbl_salida_has_insumo`
--
ALTER TABLE `tbl_salida_has_insumo`
  ADD KEY `FK_Salida` (`Codigo_Salida`),
  ADD KEY `FK_S_Insumo` (`Codigo_Insumo`);

--
-- Indices de la tabla `tbl_tamano`
--
ALTER TABLE `tbl_tamano`
  ADD PRIMARY KEY (`Id_Tamano`);

--
-- Indices de la tabla `tbl_tipo_base`
--
ALTER TABLE `tbl_tipo_base`
  ADD PRIMARY KEY (`Id_Tipo_Base`);

--
-- Indices de la tabla `tbl_tipo_documento`
--
ALTER TABLE `tbl_tipo_documento`
  ADD PRIMARY KEY (`Id_Tipo_Documento`);

--
-- Indices de la tabla `tbl_tipo_envio`
--
ALTER TABLE `tbl_tipo_envio`
  ADD PRIMARY KEY (`Id_Tipo_Envio`);

--
-- Indices de la tabla `tbl_tipo_envoltura`
--
ALTER TABLE `tbl_tipo_envoltura`
  ADD PRIMARY KEY (`Id_Tipo_Envoltura`);

--
-- Indices de la tabla `tbl_tipo_persona`
--
ALTER TABLE `tbl_tipo_persona`
  ADD PRIMARY KEY (`Id_Tipo_Persona`);

--
-- Indices de la tabla `tbl_tipo_plantilla`
--
ALTER TABLE `tbl_tipo_plantilla`
  ADD PRIMARY KEY (`Id_Tipo_Plantilla`);

--
-- Indices de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD PRIMARY KEY (`Id_Usuario`),
  ADD KEY `FK_Persona` (`id_Persona`),
  ADD KEY `FK_Rol` (`Id_Rol`);

--
-- Indices de la tabla `tmp`
--
ALTER TABLE `tmp`
  ADD PRIMARY KEY (`id_tmp`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_ancheta`
--
ALTER TABLE `tbl_ancheta`
  MODIFY `Codigo_Ancheta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  MODIFY `Id_Compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_pedido`
--
ALTER TABLE `tbl_estado_pedido`
  MODIFY `Id_Estado_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_insumo`
--
ALTER TABLE `tbl_insumo`
  MODIFY `Codigo_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tbl_insumo_has_plantilla`
--
ALTER TABLE `tbl_insumo_has_plantilla`
  MODIFY `id_Detalle_InsumoPlan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  MODIFY `Id_Pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `tbl_pedido_has_ancheta`
--
ALTER TABLE `tbl_pedido_has_ancheta`
  MODIFY `id_Detalle_PedidoAnche` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  MODIFY `Id_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_plantilla`
--
ALTER TABLE `tbl_plantilla`
  MODIFY `Codigo_Plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_rol`
--
ALTER TABLE `tbl_rol`
  MODIFY `Id_Rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_salida`
--
ALTER TABLE `tbl_salida`
  MODIFY `Codigo_Salida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `tbl_tamano`
--
ALTER TABLE `tbl_tamano`
  MODIFY `Id_Tamano` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_base`
--
ALTER TABLE `tbl_tipo_base`
  MODIFY `Id_Tipo_Base` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_documento`
--
ALTER TABLE `tbl_tipo_documento`
  MODIFY `Id_Tipo_Documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_envio`
--
ALTER TABLE `tbl_tipo_envio`
  MODIFY `Id_Tipo_Envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_envoltura`
--
ALTER TABLE `tbl_tipo_envoltura`
  MODIFY `Id_Tipo_Envoltura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_persona`
--
ALTER TABLE `tbl_tipo_persona`
  MODIFY `Id_Tipo_Persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_tipo_plantilla`
--
ALTER TABLE `tbl_tipo_plantilla`
  MODIFY `Id_Tipo_Plantilla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tmp`
--
ALTER TABLE `tmp`
  MODIFY `id_tmp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_ancheta`
--
ALTER TABLE `tbl_ancheta`
  ADD CONSTRAINT `FK_Base_Ancheta` FOREIGN KEY (`Tipo_Base`) REFERENCES `tbl_tipo_base` (`Id_Tipo_Base`),
  ADD CONSTRAINT `tbl_ancheta_ibfk_1` FOREIGN KEY (`Id_Plantilla`) REFERENCES `tbl_plantilla` (`Codigo_Plantilla`);

--
-- Filtros para la tabla `tbl_compra`
--
ALTER TABLE `tbl_compra`
  ADD CONSTRAINT `FK_Nit_Empresa` FOREIGN KEY (`Nit_Empresa`) REFERENCES `tbl_empresa` (`Nit_Empresa`);

--
-- Filtros para la tabla `tbl_insumo`
--
ALTER TABLE `tbl_insumo`
  ADD CONSTRAINT `FK_Categoria` FOREIGN KEY (`id_Categoria`) REFERENCES `tbl_categoria` (`Id_Categoria`),
  ADD CONSTRAINT `FK_Tamaño` FOREIGN KEY (`Id_Tamano`) REFERENCES `tbl_tamano` (`Id_Tamano`),
  ADD CONSTRAINT `FK_Tipo_Envoltura` FOREIGN KEY (`Id_Tipo_Envoltura`) REFERENCES `tbl_tipo_envoltura` (`Id_Tipo_Envoltura`),
  ADD CONSTRAINT `tbl_insumo_ibfk_1` FOREIGN KEY (`Nit_Proveedor`) REFERENCES `tbl_empresa` (`Nit_Empresa`);

--
-- Filtros para la tabla `tbl_insumo_has_compra`
--
ALTER TABLE `tbl_insumo_has_compra`
  ADD CONSTRAINT `FK_DT_Compra` FOREIGN KEY (`Id_Compra`) REFERENCES `tbl_compra` (`Id_Compra`),
  ADD CONSTRAINT `FK_DT_Insumo` FOREIGN KEY (`Codigo_Insumo`) REFERENCES `tbl_insumo` (`Codigo_insumo`);

--
-- Filtros para la tabla `tbl_insumo_has_plantilla`
--
ALTER TABLE `tbl_insumo_has_plantilla`
  ADD CONSTRAINT `FK_Codigo_Insumo` FOREIGN KEY (`Codigo_insumo`) REFERENCES `tbl_insumo` (`Codigo_insumo`),
  ADD CONSTRAINT `FK_Codigo_Plantilla` FOREIGN KEY (`Codigo_Plantilla`) REFERENCES `tbl_plantilla` (`Codigo_Plantilla`);

--
-- Filtros para la tabla `tbl_pedido`
--
ALTER TABLE `tbl_pedido`
  ADD CONSTRAINT `FK_Pedido_Estado` FOREIGN KEY (`Id_Estado_pedido`) REFERENCES `tbl_estado_pedido` (`Id_Estado_Pedido`),
  ADD CONSTRAINT `FK_Tipo_Envio` FOREIGN KEY (`Id_Tipo_Envio`) REFERENCES `tbl_tipo_envio` (`Id_Tipo_Envio`),
  ADD CONSTRAINT `tbl_pedido_ibfk_1` FOREIGN KEY (`Id_Persona`) REFERENCES `tbl_persona` (`Id_Persona`);

--
-- Filtros para la tabla `tbl_pedido_has_ancheta`
--
ALTER TABLE `tbl_pedido_has_ancheta`
  ADD CONSTRAINT `FK_Cod_Ancheta` FOREIGN KEY (`Codigo_Ancheta`) REFERENCES `tbl_ancheta` (`Codigo_Ancheta`),
  ADD CONSTRAINT `FK_ID_Pedido` FOREIGN KEY (`Id_Pedido`) REFERENCES `tbl_pedido` (`Id_Pedido`);

--
-- Filtros para la tabla `tbl_persona`
--
ALTER TABLE `tbl_persona`
  ADD CONSTRAINT `FK_Empresa` FOREIGN KEY (`Nit_Empresa`) REFERENCES `tbl_empresa` (`Nit_Empresa`),
  ADD CONSTRAINT `FK_Tipo_Documento` FOREIGN KEY (`Id_Tipo_Documento`) REFERENCES `tbl_tipo_documento` (`Id_Tipo_Documento`),
  ADD CONSTRAINT `FK_Tipo_Persona` FOREIGN KEY (`Id_Tipo_Persona`) REFERENCES `tbl_tipo_persona` (`Id_Tipo_Persona`);

--
-- Filtros para la tabla `tbl_plantilla`
--
ALTER TABLE `tbl_plantilla`
  ADD CONSTRAINT `FK_Tipo_Plantilla` FOREIGN KEY (`Id_Tipo_Plantilla`) REFERENCES `tbl_tipo_plantilla` (`Id_Tipo_Plantilla`);

--
-- Filtros para la tabla `tbl_salida_has_insumo`
--
ALTER TABLE `tbl_salida_has_insumo`
  ADD CONSTRAINT `FK_S_Insumo` FOREIGN KEY (`Codigo_Insumo`) REFERENCES `tbl_insumo` (`Codigo_insumo`),
  ADD CONSTRAINT `FK_Salida` FOREIGN KEY (`Codigo_Salida`) REFERENCES `tbl_salida` (`Codigo_Salida`);

--
-- Filtros para la tabla `tbl_usuario`
--
ALTER TABLE `tbl_usuario`
  ADD CONSTRAINT `FK_Persona` FOREIGN KEY (`id_Persona`) REFERENCES `tbl_persona` (`Id_Persona`),
  ADD CONSTRAINT `FK_Rol` FOREIGN KEY (`Id_Rol`) REFERENCES `tbl_rol` (`Id_Rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
