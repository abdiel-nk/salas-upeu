-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-10-2024 a las 17:17:41
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `programacion_salas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `assembly_hall`
--

CREATE TABLE `assembly_hall` (
  `id` int(10) NOT NULL,
  `fecha` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `hinicio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `hfinal` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `tiempo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `taller` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `room_name` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `escuela` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `location` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `description` varchar(300) COLLATE utf8_spanish2_ci NOT NULL,
  `status` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `assembly_hall`
--

INSERT INTO `assembly_hall` (`id`, `fecha`, `hinicio`, `hfinal`, `tiempo`, `taller`, `room_name`, `escuela`, `location`, `description`, `status`, `date_created`, `date_updated`) VALUES
(28, '', '', '', '00:0:00', '', 'US-VISIT', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, '', '', '', '00:0:00', '', 'US-10', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(30, '', '', '', '00:0:00', '', 'US-09', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(31, '', '', '', '00:0:00', '', 'Sofia Dora Vivanco Hilario', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, '', '', '', '00:0:00', '', 'Karen Leonor Martinez Ojeda', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, '', '', '', '00:0:00', '', 'Cinthya Collantes', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, '', '', '', '00:0:00', '', 'Evelyn Mirkala Mamani Vilca', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(36, '', '', '', '00:0:00', '', 'Delia Luz León Castro', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(37, '', '', '', '00:0:00', '', 'Osclaris Jhoanna Martinez Avila', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(39, '', '', '', '00:0:00', '', 'Mg. Tabita Lozano', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(40, '', '', '', '00:0:00', '', 'Celeste Abigail Mauricio Esteban', '', '', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinador_all`
--

CREATE TABLE `coordinador_all` (
  `id` int(20) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `grado` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `coordinador_all`
--

INSERT INTO `coordinador_all` (`id`, `dni`, `nombre`, `apellidos`, `telefono`, `grado`) VALUES
(1, '001660870', 'Osclaris Jhoanna', 'Martinez Avila', '+51 989 597 383', 'Licenciada'),
(2, '73492023', 'Evelyn Mirkala', 'Mamani Vilca', '+51 926 011 800', 'Licenciada'),
(3, '06808632', 'Sofia Dora', 'Vivanco Hilario', '+51 959 803 468', 'Magister'),
(4, '48122291', 'Celeste Abigail', 'Mauricio Esteban', '+51 969 332 670', 'Magister'),
(5, '70958377', 'Karen Leonor', 'Martinez Ojeda', '+51 993 532 063', 'Licenciada'),
(6, '12345678', 'Cinthya', 'Collantes', '+51 993 504 651', 'Licenciada'),
(7, '32773786', 'Delia Luz', 'León Castro', '+51 989 059 323', 'Magister'),
(8, '18158368', 'Tabita Eleyda', 'Lozano Lopez', '+51 994 385 465', 'Magister');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docentes_all`
--

CREATE TABLE `docentes_all` (
  `id` int(11) NOT NULL,
  `dni` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `correo` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `telefono` varchar(20) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `docentes_all`
--

INSERT INTO `docentes_all` (`id`, `dni`, `nombre`, `apellidos`, `correo`, `telefono`) VALUES
(1, '09429302', 'Monica Elisa', 'Meneses La Riva', 'monicameneses@upeu.edu.pe', ''),
(2, '16662187', 'Luis Javier', 'Bazan Tanchiva', 'luisbazan@infometriaperu.com', ''),
(3, '07686215', 'Susana', 'Aska Nakamatsu', 'susyna-11@hotmail.com', ''),
(4, '96857412', 'Erika María del Carmen', 'Benavides Silva De Sender', 'daleth1705@gmail.com', ''),
(5, ' 06785522', 'Patricia Eleana', 'Gomez Taguchi', 'patriciatagu2401@gmail.com', '123456789'),
(6, '21133901', 'Zulma Nelsa', 'Adama Rosales', 'zulmy_adama@hotmail.com', ''),
(7, '44097230', 'Herlen Dorthy', 'Sanchez Mayta', 'dorthysanchez@upeu.edu.pe', ''),
(8, '40288982', 'Janet Mercedes ', 'Arévalo Ipanaqué', 'janetarevaloi@gmail.com', ''),
(9, '09382595', 'Roxana', 'Obando Zegarra', 'robando_z@yahoo.es', ''),
(10, '25689959', 'Carmen Sara', 'Luna Ricalde', 'carmensaralunaricalde@gmail.com', ''),
(11, '32964459', 'Ruben Enrique', 'Flores Melón', 'rubenejafm@hotmail.com', ''),
(12, '10106423', 'Yrma', 'Broncano Vargas', 'yrma.nilda@hotmail.com', '997694867'),
(13, '25621724', 'Eudosia Victoria', 'Lovera Avilés', 'victoria_c3@hotmail.com', '966551129'),
(14, '21448664', 'Hugo', 'Delgado Bartra', 'hude60@gmail.com', '999412676'),
(15, '41103677', 'Karina Liliana', 'Orbegozo Hoyos ', 'karina_orbegozo@hotmail.com', '945007471'),
(16, '09264802', 'Zena Alejandrina', 'Villaorduña Martinez', 'zena5820@outlook.com', '934831355'),
(17, '06808632', 'Sofia Dora', 'Vivanco Hilario ', 'Coordinadora5.esp@upeu.edu.pe', '959803468'),
(18, '10427030', 'Nelsa Alina ', 'Pacheco Baldeon', 'nelsaalina@yahoo.com.pe', '954174917'),
(19, '10151457', 'Sara Karina ', 'Torpoco Rodrigez ', 'saratorpoco2004@hotmail.com', '996786023'),
(20, '43329321', 'José Luis                             ', 'Miranda Fernández', 'jmiranda-500@hotmail.com', '990189600'),
(21, '10028340', 'Zulema Teresa', 'Vera Valdivia', 'veravaldiviazulemateresa0@gmail.com', '987645409'),
(22, '41792164', 'Marco Antonio', 'Medicna Quispe ', 'makro_415@hotmail.com', '991979867'),
(23, '10270476', 'Nella Roxana     ', 'Trujillo Vassallo', 'roxanatruva@hotmal.com', '986 680 401'),
(24, '08692637', 'Irma Massiel', ' Yaranga  Samamé ', 'yarangamassiel@gmail.com', '961725399'),
(25, ' 22700761', 'Rosario', 'Palacios Cevallos ', 'rpalacios@gmail.com', '990991209'),
(26, '09559796', 'Sara Graciela', 'Talledo Vela ', 'sara_talledo@hotmail.com', '999353015'),
(27, '08834154', 'Margarita  ', 'Bernabé Ascencio ', 'margarita101163@gmail.com', '987002122'),
(28, '07826937', 'Mayela', 'Cajachagua Castro', 'mayela@upeu.edu.pe', '989249771'),
(29, '20894196 ', 'Armando ', 'Pizarro Guere', 'armandopizarroguere@gmail.com', '992428944'),
(30, '08613218', 'María Guima', 'Reynoso Huerta ', 'guimareinosohuerta@gmail.com', '999605965'),
(31, '72812244', 'Katerin Melchorita', 'Tapia Colca ', 'kmtapiac@gmail.com', '937266395'),
(32, '07097768', 'José Miguel', 'Grados Apolinario ', 'josemiguelgrados@gmail.com', '954152685'),
(33, '07621180', 'Jaime', 'Zevallos Vásquez ', 'jaime_zevallos@yahoo.com', '999870602'),
(34, '08576350', 'Gaby Sonia', 'Chávez Zegarra ', 'gchavezz@hotmail.com', '985648703'),
(35, '45197097', 'Jessica Rosa Stefani', 'Loyola Coronado ', 'jessica.loyola.c@gmail.com', '941385222'),
(36, '10206305', 'Irene Mercedes', 'Zapata Silva', 'Irenem.zapatas18@gmail.com', '982057498'),
(37, '22700761', 'Maria del Rosario ', 'Palacios Zevallos', 'rpalacios@gmail.com', '990991209'),
(38, '21821747', 'Betty Carol', 'Flores Lopez', 'floresv87@hotmail.com', '123456789'),
(39, '10383551', 'Priscila Paola', 'Toledo Rodriguez', 'paolatoledo2410@gmail.com', '987654321'),
(40, '25470704', 'Alicia Elizabeth', 'Brophy Felles', 'aliciaelizaabethbrophyfelles@gmail.com', '123456789'),
(41, '09607664', 'Fabian', 'Julca Grovas', 'fabianminterna@hotmail.com', '996870206'),
(42, '40249916', 'Miriam Evelyn', 'Tapia Colca ', 'miriamevtaco@hotmail.com', '951795287'),
(43, '46181023', 'Hidelith', 'Quino Bueno', 'hide_qb@hotmail.com', '929722372'),
(44, '10120020', 'Genny Teofila', 'Aquino Trujillo', 'gennyenfer@hotmail.com', '990952178'),
(45, '40901900', 'Yassubey', 'Zanabria Segovia', 'yassubeyzs@hotmail.com', '959782666'),
(46, '20894702', 'Emperatríz Aurelia', 'Gomez Carmelo', 'emperita15@gmail.com', '996786023'),
(47, '08578564', 'Cecilia Ormeño', 'Ormeño Bonifaz', 'cecilia@upeu.edu.pe', '992243122'),
(48, '27437465', 'Carlos', 'Perez Perez', 'carlosperez100@gmail.com', '994984228'),
(49, '06960477', 'Maria Angela', 'Paredes Aguirre De Beltran', 'angela@upeu.edu.pe', '939076992'),
(50, '07640671', 'Lucia Del Pilar', 'Lozano Velasquez', 'lucia@upeu.edu.pe', '958539691'),
(51, '28251474', 'Maria Elena', 'Ochatoma Paravicino', 'ochatomamaria@hotmail.com', '123456789'),
(52, '06001598', 'Ana Maria Penelope', 'Miranda Huaman', 'Siany_34@hotmail.com', '123456789'),
(53, '06811007', 'Blanca Soledad', 'Quispe Cristobal', 'bquispe@yahoo.com', '987456321'),
(54, '15405616', 'Janeth', 'Sánchez Moreyra', 'Yanetsm05@hotmail.com', '123456789'),
(55, '80129984', 'Yordaks Ramiro', 'Echegaray Ugarte', 'rodrigogabriel3110@hotmail.com', ''),
(56, '32773786', 'Delia Luz', 'León Castro', 'delialc@upeu.edu.pe', '989059323'),
(57, '32844023', 'Maria Teresa', 'Cabanillas Chavez', 'maritere@upeu.edu.pe', '123456789'),
(58, '08416279', 'Mery Luz', 'Medrano Rios', 'domiluz2012@gmail.com', ''),
(59, '31664948', 'Violeta Benita', 'Gomez Gamarra', 'viobgomezg@hotmail.com', ''),
(60, '09943231', 'Elizabeth', 'Gonzales Cárdenas', 'goncare2202@gmail.com', ''),
(61, '18172409', 'Ana Judith', 'Ramos García', 'ana.ramos@upeu.edu.pe', '964924900'),
(62, '17635317', 'Blanca Katiuzca', 'Loayza Enriquez', 'investigabkle@gmail.com', ''),
(63, '40755058', 'Elsa', 'Vargas Vilca', 'elsa.vargas@upeu.edu.pe', ''),
(64, '44187598', 'Neal Wilson', 'Zuta Choroco', 'wilsonzuta@gmail.com', ''),
(65, '46817952', 'Juan Roberto', 'Munayco Mendieta', 'jmunayco.capacitaciones@gmail.com', ''),
(66, '46501510', 'Wilter Eyvi Mardel', 'Morales García', 'mardelmorales@upeu.edu.pe', ''),
(67, '07519390', 'Liliana', 'Rodriguez Saavedra', 'lilianaunife2018@gmail.com', ''),
(68, '08654805', 'Flor de María', 'Huamán Velazco', 'florhv2008@hotmail.com', ''),
(69, '07393534', 'Rosa Luz', 'Rosales Cusichaqui', 'rlrosalesc@gmail.com', ''),
(70, '40589854', 'María Gioconda', 'Levano Cardenas', 'magileca1@hotmail.com', ''),
(71, '06100978', 'Olivia Rita', 'Zavaleta Grados', 'oliviazg5@hotmail.com', ''),
(72, '41843625', 'Nataly Susan', 'Saez Zevallos ', 'sulys20@hotmail.com', '+51 949 759 177'),
(73, '31674865', 'Daniel William', 'Richard Perez', 'danielr@upe.edu.pe', ''),
(74, '02422595', 'Rafael', 'Calla Mercado', 'vqc711@gmail.com', ''),
(75, '06107248', 'Gabriel', 'Vela Vasquez', 'gavela@upeu.edu.pe', ''),
(76, '41233864', 'Keila Esther', 'Miranda Limachi', 'ketrijes@upeu.edu.pe', ''),
(77, '16499368', 'Donal', 'Jaimes Zubieta', 'donald@upeu.edu.pe', ''),
(78, '01459093', 'Michael', 'White', 'm.t.white@outlook.com', ''),
(79, '16735701', 'Pedro Salvador', 'Leyva Carhuatanta', 'salvador.leyvacarhuatanta1@gmail.com', ''),
(80, '23985475', 'Orfelina', 'Arpasi Quispe', 'orfelina123@gmail.com', ''),
(81, '10298809', 'Wilma', 'Villanueva Quispe', 'wilvil@upeu.edu.pe', ''),
(82, '40502656', 'Ruth Ester', 'Moreno Leyva', 'rutimor6@gmail.com', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad_all`
--

CREATE TABLE `especialidad_all` (
  `id` int(11) NOT NULL,
  `especialidad` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `especialidad_all`
--

INSERT INTO `especialidad_all` (`id`, `especialidad`) VALUES
(1, 'SEE Gineco Obstetricia'),
(2, 'SEE Centro Quir&uacute;rgico'),
(3, 'SEE Cuidados Quir&uacute;rgicos'),
(4, 'SEE Cuidados Quir&uacute;rgicos con menci&oacute;n en Traumatolog&iacute;a y Ortopedia'),
(5, 'SEE Oncolog&iacute;a'),
(6, 'SEE Cuidados Intensivos'),
(7, 'SEE Cuidados Intensivos Neonatales'),
(8, 'SEE Cuidados Intensivos Pedi&aacute;tricos'),
(9, 'SEE Administraci&oacute;n y Gesti&oacute;n'),
(10, 'SEE Salud Ocupacional'),
(11, 'SEE Emergencias y Desastres'),
(12, 'SEE Gesti&oacute;n de Central de Estirilizaci&oacute;n'),
(13, 'SEE Geriatr&iacute;a'),
(14, 'SEE Cuidados Quir&uacute;rgicos con menci&oacute;n en Recuperaci&oacute;n Posanest&eacute;sica'),
(15, 'SEE Cuidado Integral Infantil'),
(16, 'SEE Neurolog&iacute;a y Neurocirug&iacute;a'),
(17, 'SEE Cardiolog&iacute;a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial`
--

CREATE TABLE `historial` (
  `id_historial` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `nota` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `referencia` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes_all`
--

CREATE TABLE `incidentes_all` (
  `id` int(10) NOT NULL,
  `fechain` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `laboratorio` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `docente` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `producto` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `observacion` varchar(500) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `incidentes_all`
--

INSERT INTO `incidentes_all` (`id`, `fechain`, `laboratorio`, `docente`, `producto`, `observacion`, `estado`) VALUES
(1, '2024-05-29T17:01', 'US-03', 'Estefany', 'maniquie 2', 'perfecto', '1'),
(2, '2024-05-29T17:01', 'US-03', 'Estefany', 'maniquie 2', 'en buen estado', '1'),
(3, '2024-05-29T18:04', 'US-01', 'Willy', 'maniquie 2', 'dar de baja', '0'),
(4, '2024-06-05T11:46', 'US-01', 'Estefany', 'maniquie 2', 'esta por resolver', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insumo_all`
--

CREATE TABLE `insumo_all` (
  `id` int(10) NOT NULL,
  `codigo` varchar(150) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `serie` varchar(200) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `ubicacion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `insumo_all`
--

INSERT INTO `insumo_all` (`id`, `codigo`, `serie`, `nombre`, `ubicacion`, `cantidad`) VALUES
(2, '001/20256', '000222RFGT', 'Maniquie Niño', 'Almacen Washintong', '5'),
(4, '00/0023', '00FRD123FF', 'Desfibrilador', 'Almacen Washintong', '20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maniquie_all`
--

CREATE TABLE `maniquie_all` (
  `id` int(10) NOT NULL,
  `codigo` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `maniquie` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fcompra` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `tmantenimiento` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fmantenimiento` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `condicion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `observacion` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `cantidad` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `maniquie_all`
--

INSERT INTO `maniquie_all` (`id`, `codigo`, `maniquie`, `fcompra`, `tmantenimiento`, `fmantenimiento`, `condicion`, `observacion`, `estado`, `cantidad`) VALUES
(2, '0012', 'maniquie 4', '2024-05-17', 'Preventivo', '2024-05-17', 'buena por reparar', 'buena', 'Usado', '13'),
(3, '001', 'maniquie 288', '2024-05-16', 'Proximo', '2024-05-17', 'barato', 'buena', 'Reparado', '20'),
(4, '004', 'Maniequie 6', '2024-06-19', 'Ultimo', '2024-06-25', 'por reprar', 'buena', 'Usado', '15'),
(5, '006', 'prueba 5', '2024-07-07', 'Preventivo', '2024-07-09', 'buena por reparar', 'hola', 'Nuevo', '15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(10) NOT NULL,
  `assembly_hall_id` int(10) NOT NULL,
  `reserved_by` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `especialidad` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ciclo` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `aula` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `taller` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `participantes` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `schedule_remarks` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `presupuesto` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `soporte` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `datetime_start` datetime NOT NULL,
  `datetime_end` datetime NOT NULL,
  `status` int(10) NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `assembly_hall_id`, `reserved_by`, `especialidad`, `ciclo`, `aula`, `taller`, `participantes`, `schedule_remarks`, `presupuesto`, `soporte`, `datetime_start`, `datetime_end`, `status`, `date_created`, `date_updated`) VALUES
(1, 40, 'Monica Elisa Meneses La Riva', 'SEE Gineco Obstetricia', 'Ciclo I', 'Aula 801 B', 'FUNCNIONES VITALES', '12', 'holas idisndiasinin, nasnoa niasndiasndiansida moasdoas khjkhjk. dfgdfg', '120', '', '2024-08-02 13:14:00', '2024-08-02 16:14:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 40, 'Monica Elisa Meneses La Riva', 'SEE Gineco Obstetricia', 'Ciclo II', 'Aula 801 A', 'FUNCNIONES VITALES', '12', 'prueba', '54', 'Ing Willy Medina Bacalla P/A S/54.00', '2024-08-12 10:55:00', '2024-08-12 14:55:00', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_info`
--

CREATE TABLE `system_info` (
  `id` int(10) NOT NULL,
  `meta_field` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `meta_value` varchar(100) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Aulas Talleres UPG Salud - Washintong - UPeU'),
(2, 'short_name', 'UPG-SALUD'),
(3, 'logo', 'uploads/1715796540_logo-upeu.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `firstname` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `username` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `img` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `img`) VALUES
(1, 'Posgrado', 'Salud', 'admin', '202cb962ac59075b964b07152d234b70', 0x30),
(3, 'Estefany', 'Ayala Poma', 'tefy', '81dc9bdb52d04dc20036dbd8313ed055', ''),
(4, 'Roger', 'Ayala Poma', 'roger', '12345', ''),
(7, 'kike', 'Ayala Poma', 'admin', '123456', ''),
(9, 'maik', 'Ayala', 'admin', '', ''),
(10, 'maik', 'Ayala Poma', 'maicolayala', '123456', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `assembly_hall`
--
ALTER TABLE `assembly_hall`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `coordinador_all`
--
ALTER TABLE `coordinador_all`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `docentes_all`
--
ALTER TABLE `docentes_all`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `especialidad_all`
--
ALTER TABLE `especialidad_all`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `historial`
--
ALTER TABLE `historial`
  ADD PRIMARY KEY (`id_historial`);

--
-- Indices de la tabla `incidentes_all`
--
ALTER TABLE `incidentes_all`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insumo_all`
--
ALTER TABLE `insumo_all`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maniquie_all`
--
ALTER TABLE `maniquie_all`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `assembly_hall`
--
ALTER TABLE `assembly_hall`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `coordinador_all`
--
ALTER TABLE `coordinador_all`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `docentes_all`
--
ALTER TABLE `docentes_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de la tabla `especialidad_all`
--
ALTER TABLE `especialidad_all`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `historial`
--
ALTER TABLE `historial`
  MODIFY `id_historial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `incidentes_all`
--
ALTER TABLE `incidentes_all`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `insumo_all`
--
ALTER TABLE `insumo_all`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `maniquie_all`
--
ALTER TABLE `maniquie_all`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
