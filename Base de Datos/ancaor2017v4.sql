-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-03-2017 a las 19:13:02
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ancaor2017`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dato`
--

CREATE TABLE `dato` (
  `id_Dato` int(6) NOT NULL,
  `nom_Dato` varchar(50) NOT NULL,
  `descrip_Dato` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dato`
--

INSERT INTO `dato` (`id_Dato`, `nom_Dato`, `descrip_Dato`) VALUES
(1, 'Proyecto', ''),
(2, 'Tecnologia', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_proyecto`
--

CREATE TABLE `estado_proyecto` (
  `id_Estado` int(4) NOT NULL,
  `nom_EstadoProyecto` varchar(30) NOT NULL,
  `descrip_EstadoProyecto` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_proyecto`
--

INSERT INTO `estado_proyecto` (`id_Estado`, `nom_EstadoProyecto`, `descrip_EstadoProyecto`) VALUES
(1, 'Finalizado', ''),
(2, 'En Proceso', ''),
(3, 'Abandonado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `include`
--

CREATE TABLE `include` (
  `id_Include` int(4) NOT NULL,
  `nom_Include` varchar(40) NOT NULL,
  `html_Include` varchar(70) NOT NULL,
  `id_User` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina`
--

CREATE TABLE `pagina` (
  `id_Pagina` int(6) NOT NULL,
  `nom_Pagina` text NOT NULL,
  `cuerpo_Pagina` text NOT NULL,
  `id_User` int(4) NOT NULL,
  `id_TipoPagina` int(3) NOT NULL,
  `link_Pagina` varchar(120) NOT NULL,
  `id_Da` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagina`
--

INSERT INTO `pagina` (`id_Pagina`, `nom_Pagina`, `cuerpo_Pagina`, `id_User`, `id_TipoPagina`, `link_Pagina`, `id_Da`) VALUES
(1, 'Inicio', 'inicio.phtml', 1, 1, 'http://localhost/ancaor2017/inicio', 0),
(2, 'Proyectos', 'proyectos.phtml', 1, 1, 'http://localhost/ancaor2017/proyectos', 0),
(3, 'Informacion', 'informacion.phtml', 1, 1, 'http://localhost/ancaor2017/informacion', 0),
(5, 'Lykrune', 'lykrune.phtml', 1, 1, 'http://localhost/ancaor2017/lykrune', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id_Persona` int(4) NOT NULL,
  `nom_Persona` varchar(50) NOT NULL,
  `ape_Persona` varchar(50) NOT NULL,
  `fnac_Persona` date NOT NULL,
  `sexo_Persona` char(1) NOT NULL,
  `frase_Persona` varchar(60) NOT NULL,
  `id_User` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id_Persona`, `nom_Persona`, `ape_Persona`, `fnac_Persona`, `sexo_Persona`, `frase_Persona`, `id_User`) VALUES
(0, 'Anthony', 'Cajacuri Ordoñez', '1995-05-20', 'M', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_Proyecto` int(4) NOT NULL,
  `id_TipoProyecto` int(4) NOT NULL,
  `nom_Proyecto` varchar(30) NOT NULL,
  `descrip_Proyecto` varchar(80) NOT NULL,
  `enlace_Proyecto` varchar(30) NOT NULL,
  `git_Proyecto` varchar(30) NOT NULL,
  `id_Estado` int(4) NOT NULL,
  `id_User` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_Proyecto`, `id_TipoProyecto`, `nom_Proyecto`, `descrip_Proyecto`, `enlace_Proyecto`, `git_Proyecto`, `id_Estado`, `id_User`) VALUES
(1, 2, 'Base MVC Project', 'Programación Back-End, Base Para varios proyectos', '', '', 1, 1),
(2, 4, 'Jinesis 6.0', 'Página web para Jinesis 6.0', '', '', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto_tecnologia`
--

CREATE TABLE `proyecto_tecnologia` (
  `id_ProyectoTecnologia` int(4) NOT NULL,
  `id_Proyecto` int(4) NOT NULL,
  `id_Tecnologia` int(4) NOT NULL,
  `descrip_TP` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyecto_tecnologia`
--

INSERT INTO `proyecto_tecnologia` (`id_ProyectoTecnologia`, `id_Proyecto`, `id_Tecnologia`, `descrip_TP`) VALUES
(1, 1, 1, ''),
(2, 1, 2, ''),
(3, 1, 3, ''),
(4, 1, 4, ''),
(5, 1, 5, ''),
(6, 1, 6, ''),
(7, 1, 7, ''),
(8, 2, 1, ''),
(9, 2, 6, ''),
(10, 2, 7, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnologia`
--

CREATE TABLE `tecnologia` (
  `id_Tecnologia` int(4) NOT NULL,
  `nom_Tecnologia` varchar(40) CHARACTER SET latin1 NOT NULL,
  `descrip_Tecnologia` varchar(80) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tecnologia`
--

INSERT INTO `tecnologia` (`id_Tecnologia`, `nom_Tecnologia`, `descrip_Tecnologia`) VALUES
(1, 'PHP', ''),
(2, 'JS', ''),
(3, 'APACHE', ''),
(4, 'AJAX', ''),
(5, 'JQUERY', ''),
(6, 'HTML5', ''),
(7, 'CSS3', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pagina`
--

CREATE TABLE `tipo_pagina` (
  `id_TipoPagina` int(3) NOT NULL,
  `nom_TipoPagina` varchar(30) NOT NULL,
  `descrip_TipoPagina` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pagina`
--

INSERT INTO `tipo_pagina` (`id_TipoPagina`, `nom_TipoPagina`, `descrip_TipoPagina`) VALUES
(1, 'Interno', ''),
(2, 'Externo', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proyecto`
--

CREATE TABLE `tipo_proyecto` (
  `id_TipoProyecto` int(4) NOT NULL,
  `nom_TipoProyecto` varchar(40) NOT NULL,
  `descrip_TipoProyecto` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_proyecto`
--

INSERT INTO `tipo_proyecto` (`id_TipoProyecto`, `nom_TipoProyecto`, `descrip_TipoProyecto`) VALUES
(1, 'Back-End + Front-End ', ''),
(2, 'Back-End', ''),
(3, 'Front-End', ''),
(4, 'Pagina Web', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_TiposUser` int(4) NOT NULL,
  `nom_TipoUser` varchar(40) NOT NULL,
  `descrip_TipoUser` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_TiposUser`, `nom_TipoUser`, `descrip_TipoUser`) VALUES
(1, 'Programador', ''),
(2, 'Administrador', ''),
(3, 'Moderador', ''),
(4, 'Normal', ''),
(5, 'Invitado', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_User` int(4) NOT NULL,
  `nom_User` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pass_User` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_TipoUser` int(4) NOT NULL,
  `mail_User` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_User` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_User`, `nom_User`, `pass_User`, `id_TipoUser`, `mail_User`, `img_User`) VALUES
(1, 'Unknown', 'plZzAWLSJwrMz3zVX+g0v1yvWQSF366m5BwTah//Hsc=+/0LPdc1>Nw==', 1, 'ancaor_s1@hotmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dato`
--
ALTER TABLE `dato`
  ADD PRIMARY KEY (`id_Dato`),
  ADD KEY `nom_Dato` (`nom_Dato`);

--
-- Indices de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  ADD PRIMARY KEY (`id_Estado`);

--
-- Indices de la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD PRIMARY KEY (`id_Pagina`),
  ADD KEY `id_User` (`id_User`),
  ADD KEY `id_TipoPagina` (`id_TipoPagina`),
  ADD KEY `id_User_2` (`id_User`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD KEY `id_User` (`id_User`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_Proyecto`),
  ADD KEY `id_TipoProyecto` (`id_TipoProyecto`),
  ADD KEY `id_Estado` (`id_Estado`),
  ADD KEY `id_User` (`id_User`),
  ADD KEY `id_Estado_2` (`id_Estado`);

--
-- Indices de la tabla `proyecto_tecnologia`
--
ALTER TABLE `proyecto_tecnologia`
  ADD PRIMARY KEY (`id_ProyectoTecnologia`),
  ADD KEY `id_Proyecto` (`id_Proyecto`),
  ADD KEY `id_Tecnologia` (`id_Tecnologia`);

--
-- Indices de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  ADD PRIMARY KEY (`id_Tecnologia`);

--
-- Indices de la tabla `tipo_pagina`
--
ALTER TABLE `tipo_pagina`
  ADD PRIMARY KEY (`id_TipoPagina`);

--
-- Indices de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  ADD PRIMARY KEY (`id_TipoProyecto`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_TiposUser`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_User`),
  ADD KEY `id_TipoUser` (`id_TipoUser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dato`
--
ALTER TABLE `dato`
  MODIFY `id_Dato` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `estado_proyecto`
--
ALTER TABLE `estado_proyecto`
  MODIFY `id_Estado` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pagina`
--
ALTER TABLE `pagina`
  MODIFY `id_Pagina` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_Proyecto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `proyecto_tecnologia`
--
ALTER TABLE `proyecto_tecnologia`
  MODIFY `id_ProyectoTecnologia` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `tecnologia`
--
ALTER TABLE `tecnologia`
  MODIFY `id_Tecnologia` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `tipo_pagina`
--
ALTER TABLE `tipo_pagina`
  MODIFY `id_TipoPagina` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_proyecto`
--
ALTER TABLE `tipo_proyecto`
  MODIFY `id_TipoProyecto` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_TiposUser` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_User` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pagina`
--
ALTER TABLE `pagina`
  ADD CONSTRAINT `pagina_ibfk_1` FOREIGN KEY (`id_TipoPagina`) REFERENCES `tipo_pagina` (`id_TipoPagina`),
  ADD CONSTRAINT `pagina_ibfk_2` FOREIGN KEY (`id_User`) REFERENCES `usuario` (`id_User`);

--
-- Filtros para la tabla `persona`
--
ALTER TABLE `persona`
  ADD CONSTRAINT `persona_ibfk_1` FOREIGN KEY (`id_User`) REFERENCES `usuario` (`id_User`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`id_TipoProyecto`) REFERENCES `tipo_proyecto` (`id_TipoProyecto`),
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`id_Estado`) REFERENCES `estado_proyecto` (`id_Estado`),
  ADD CONSTRAINT `proyecto_ibfk_3` FOREIGN KEY (`id_User`) REFERENCES `usuario` (`id_User`);

--
-- Filtros para la tabla `proyecto_tecnologia`
--
ALTER TABLE `proyecto_tecnologia`
  ADD CONSTRAINT `proyecto_tecnologia_ibfk_1` FOREIGN KEY (`id_Tecnologia`) REFERENCES `tecnologia` (`id_Tecnologia`),
  ADD CONSTRAINT `proyecto_tecnologia_ibfk_2` FOREIGN KEY (`id_Proyecto`) REFERENCES `proyecto` (`id_Proyecto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_TipoUser`) REFERENCES `tipo_usuario` (`id_TiposUser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
